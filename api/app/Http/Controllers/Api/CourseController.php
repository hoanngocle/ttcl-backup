<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    protected $message;

    /**
     * @var CourseService
     */
    protected $courseService;

    /**
     * CourseController constructor.
     * @param CourseService $courseService
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = $this->courseService->getListCourses();
        $response->map(function ($item) {
            $item['thumbnail'] = 'https://i.imgur.com/xLJs5G4.jpg';
            $item['current_progress'] = '15%';
            $item['progress_goal'] = '100%';
            $item['progress_done_per'] = 15;
            return $item;
        });
        $this->message = __('message.success.get', ['name' => 'Courses']);

        if (!$response) {
            $this->message = __('message.error.get', ['name' => 'Courses']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Create Course
     *
     * @param CourseStoreRequest $courseStoreRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CourseStoreRequest $courseStoreRequest)
    {
        $params = $courseStoreRequest->all();
        $response = $this->courseService->createCourse($params);
        $this->message = __('message.success.create', ['name' => 'Course']);

        if (!$response) {
            $this->message = __('message.error.create', ['name' => 'Course']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail(Request $request)
    {
        $idCourse = $request->id;
        $response = $this->courseService->getCourseDetails($idCourse);

        $this->message = __('message.success.get', ['name' => 'Course']);

        if (!$response) {
            $this->message = __('message.error.get', ['name' => 'Course']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Update Course
     *
     * @param CourseUpdateRequest $courseUpdateRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CourseUpdateRequest $courseUpdateRequest)
    {
        $params = $courseUpdateRequest->all();
        $response = $this->courseService->updateCourse($params);
        $this->message = __('message.success.update', ['name' => 'Course']);

        if (!$response) {
            $this->message = __('message.error.update', ['name' => 'Course']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $response = $this->courseService->deleteCourse($id);
        $this->message = __('message.success.delete', ['name' => 'Course']);

        if (!$response) {
            $this->message = __('message.error.delete', ['name' => 'Course']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }
}
