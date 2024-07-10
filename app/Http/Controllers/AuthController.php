<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * @var AuthService $authService
     */
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function auth(AuthRequest $request)
    {
        $data = $request->validated();

        // Если подпись совпадает - делаем updateOrCreate для пользователя и возвращаем данные
        if ($this->authService->checkSignature($data)) {
            $this->authService->updateOrCreate($data);
//            return $data;
        } else { // Иначе - возвращаем ошибку
//            return $error;
        }
    }
}
