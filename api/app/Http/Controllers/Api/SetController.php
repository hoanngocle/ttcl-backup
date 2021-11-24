<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SetService;
use Illuminate\Http\Request;

class SetController extends Controller
{

    protected $message;

    /**
     * @var SetService
     */
    protected $setService;

    /**
     * SetController constructor.
     * @param SetService $setService
     */
    public function __construct(SetService $setService)
    {
        $this->setService = $setService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = $this->setService->getListSets();
        $this->message = __('message.success.get', ['name' => 'Sets']);

        if (!$response) {
            $this->message = __('message.error.get', ['name' => 'Sets']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListSetByCourse(Request $request)
    {
        $response = $this->setService->getListSetByCourse($request->all());
        $this->message = __('message.success.get', ['name' => 'Sets']);

        if (!$response) {
            $this->message = __('message.error.get', ['name' => 'Sets']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }


    /**
     * Create Set
     *
     * @param SetStoreRequest $SetStoreRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SetStoreRequest $SetStoreRequest)
    {
        $params = $SetStoreRequest->all();
        $response = $this->setService->createSet($params);
        $this->message = __('message.success.create', ['name' => 'Set']);

        if (!$response) {
            $this->message = __('message.error.create', ['name' => 'Set']);
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
        $idSet = $request->id;
        $response = $this->setService->getSetDetails($idSet);

        $this->message = __('message.success.get', ['name' => 'Set']);

        if (!$response) {
            $this->message = __('message.error.get', ['name' => 'Set']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Update Set
     *
     * @param SetUpdateRequest $SetUpdateRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SetUpdateRequest $SetUpdateRequest)
    {
        $params = $SetUpdateRequest->all();
        $response = $this->setService->updateSet($params);
        $this->message = __('message.success.update', ['name' => 'Set']);

        if (!$response) {
            $this->message = __('message.error.update', ['name' => 'Set']);
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
        $response = $this->setService->deleteSet($id);
        $this->message = __('message.success.delete', ['name' => 'Set']);

        if (!$response) {
            $this->message = __('message.error.delete', ['name' => 'Set']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }
}
