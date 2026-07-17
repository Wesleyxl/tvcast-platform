<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        $token = Auth::guard('api')->login($user);

        return $this->respondWithToken($token, $user)->setStatusCode(201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $token = Auth::guard('api')->attempt($request->credentials());

        if (! $token) {
            return response()->json([
                'error' => [
                    'code' => 'INVALID_CREDENTIALS',
                    'message' => 'Credenciais inválidas.',
                ],
            ], 401);
        }

        return $this->respondWithToken($token, Auth::guard('api')->user());
    }

    public function me(): JsonResponse
    {
        return response()->json([
            'data' => new UserResource(Auth::guard('api')->user()),
        ]);
    }

    public function refresh(): JsonResponse
    {
        $token = Auth::guard('api')->refresh();

        return $this->respondWithToken($token, Auth::guard('api')->user());
    }

    public function logout(): JsonResponse
    {
        Auth::guard('api')->logout();

        return response()->json([
            'message' => 'Sessão encerrada com sucesso.',
        ]);
    }

    private function respondWithToken(string $token, User $user): JsonResponse
    {
        return response()->json([
            'data' => [
                'user' => new UserResource($user),
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            ],
        ]);
    }
}
