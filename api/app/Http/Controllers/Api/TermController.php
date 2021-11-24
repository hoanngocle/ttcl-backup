<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TermService;
use Illuminate\Http\Request;

class TermController extends Controller
{

    protected $message;

    /**
     * @var TermService
     */
    protected $termService;

    /**
     * TermController constructor.
     * @param TermService $termService
     */
    public function __construct(TermService $termService)
    {
        $this->termService = $termService;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListTermBySet(Request $request)
    {
        $listTerm = $this->termService->getListTerms($request->all());
        $typeKanji = $listTerm->shuffle()->pluck('vietnamese', 'kanji');
        $typeJapanese = $listTerm->shuffle()->pluck('kanji', 'japanese');

        $response = [
            'list_term' => $listTerm,
            'kanji' => $typeKanji,
            'japanese' => $typeJapanese,
        ];

        $this->message = __('message.success.get', ['name' => 'Terms']);

        if (!$response) {
            $this->message = __('message.error.get', ['name' => 'Terms']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Create Term
     *
     * @param TermStoreRequest $TermStoreRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TermStoreRequest $TermStoreRequest)
    {
        $params = $TermStoreRequest->all();
        $response = $this->termService->createTerm($params);
        $this->message = __('message.success.create', ['name' => 'Term']);

        if (!$response) {
            $this->message = __('message.error.create', ['name' => 'Term']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }

    /**
     * Update Term
     *
     * @param TermUpdateRequest $TermUpdateRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TermUpdateRequest $TermUpdateRequest)
    {
        $params = $TermUpdateRequest->all();
        $response = $this->termService->updateTerm($params);
        $this->message = __('message.success.update', ['name' => 'Term']);

        if (!$response) {
            $this->message = __('message.error.update', ['name' => 'Term']);
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
        $response = $this->termService->deleteTerm($id);
        $this->message = __('message.success.delete', ['name' => 'Term']);

        if (!$response) {
            $this->message = __('message.error.delete', ['name' => 'Term']);
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }
}
