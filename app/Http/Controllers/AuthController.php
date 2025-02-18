<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends AppBaseController
{
    /**
     * @var AuthService $authService
     */
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Метод авторизации/регистрации
     * URI: /user_auth
     *
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function auth(AuthRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Если подпись совпадает - делаем updateOrCreate для пользователя и возвращаем данные
        if ($this->authService->checkSignature($data)) {

            $user = $this->authService->updateOrCreate($data);

            return $this->sendResponse([
                'access_token' => $data['access_token'],
                'user_info'    => UserResource::make($user),
            ]);
        } else {
            return $this->sendError(
                'Ошибка авторизации в приложении',
                'signature_error',
                403
            );
        }
    }
}
