<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Services\AuthService;
use App\Services\ErrorService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $errorService;
    protected $authService;


    public function __construct(ErrorService $errorService, AuthService $authService) {
        $this->errorService = $errorService;
        $this->authService = $authService;
    }


    public function register(RegisterRequest $request) {
        $requestData = $request->validated();

        try {
            DB::beginTransaction();
            $user = $this->authService->createUser($requestData);
            $token = $this->authService->generateUserAuthToken($user);

            DB::commit();
            return response()->json([
                'auth_token' => $token,
            ], 201);
        }
        catch(Exception $e) {
            DB::rollBack();
            return $this->errorService->handleException($e);
        }
    }


    public function login(LoginRequest $request) {
        $requestData = $request->validated();

        try {
            $user = User::where('email', $requestData['email'])->first();

            if(!Hash::check($requestData['password'], $user->password)) {
                return response()->json(['errors' => [
                    'error' => [__('errors.login.incorrect_password')],
                ]], 422);
            }

            $token = $this->authService->generateUserAuthToken($user);

            return response()->json([
                'auth_token' => $token,
            ], 200);
        }
        catch(Exception $e) {
            return $this->errorService->handleException($e);
        }
    }
}
