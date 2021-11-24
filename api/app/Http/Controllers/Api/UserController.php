<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    protected $message;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get user info
     *
     * @param $id
     * @return mixed
     */
    public function getUserInfo()
    {
        $url =
            'https://static.wikia.nocookie.net/ragnaly-brave/images/4/44/Yuki_Nagato_Battle_Victory.gif';

        $img = 'Yuki_Nagato_Battle_Victory.gif';

        $a = file_put_contents($img, file_get_contents($url));

        echo $a;
//        $response = $this->userService->getCurrentUserInfo();
//        $character = $response->character;
//        $this->message = __('message.success.get', ['name' => 'user']);
//
//        if (!$response) {
//            $this->message = __('message.error.get', ['name' => 'user']);
//            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
//        }

//        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }
}
