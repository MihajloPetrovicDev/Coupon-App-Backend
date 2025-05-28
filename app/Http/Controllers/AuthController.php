<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\ErrorService;
use Illuminate\Support\Facades\DB;
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
        $data = $request->validated();

        try {
            DB::beginTransaction();
            $user = $this->authService->createUser($data);
            $token = $user->createToken('auth-token', ['*'], now()->addMonths(6))->plainTextToken;

            DB::commit();
            return response()->json([
                'message' => __('messages.register.successfully_registered'),
                'auth_token' => $token,
            ], 201);
        }
        catch(Exception $e) {
            DB::rollBack();
            return $this->errorService->handleException($e);
        }
    }
}
