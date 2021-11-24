<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Services\AuthService;

class AuthController extends Controller
{
    const INVALID_GRANT = 'invalid_grant';

    protected $message;

    protected $authService;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param LoginRequest $request
     * @return string
     */
    public function login(LoginRequest $request)
    {
        $response = $this->authService->processLogin($request);
        $responseData = json_decode($response->getContent());
        $this->message = __('auth.login.success');

        if ($response->getStatusCode() === HTTP_UNAUTHORIZED || $response->getStatusCode() === HTTP_BAD_REQUEST) {
            $this->message = __('auth.login.failed');
            if ($responseData->error == self::INVALID_GRANT) {
                return response()->json(sendError($responseData, $this->message), HTTP_UNAUTHORIZED);
            }
            return response()->json(sendError($responseData, $this->message), HTTP_SUCCESS);
        }
        return response()->json(sendSuccess($responseData, $this->message), HTTP_SUCCESS);
    }

    /**
     * Handle logout function
     */
    public function logout()
    {
        $response = $this->authService->logout();
        $this->message = 'Logged out successfully';
        if (!$response) {
            $this->message = 'Logged out failed';
            return response()->json(sendError($response, $this->message), HTTP_SUCCESS);
        }

        return response()->json(sendSuccess($response, $this->message), HTTP_SUCCESS);
    }
}
