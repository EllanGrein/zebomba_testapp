<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserSession;

class AuthService
{
    /**
     * Проверка авторизационной подписи
     *
     * @param array $data
     * @return bool
     */
    public function checkSignature(array $data): bool
    {
        // Исключаем подпись (но оставляем в исходном массиве $data)
        $params = array_diff_key($data, array_flip(["sig"]));

        // Сортируем
        ksort($params);

        // Формируем проверочную строку
        $str = $this->formSignature($params);

        // Возвращаем результат сравнения с подписью
        return $str === $data['sig'];
    }

    /**
     * Формирование проверочной строки для сверки с подписью
     *
     * @param $params
     * @return string
     */
    protected function formSignature($params): string
    {
        $str = '';

        foreach ($params as $key => $value) {
            $str .= $key . '=' . $value;
        }

        $str .= config('app.secret_key');

        return mb_strtolower(md5($str), 'UTF-8');
    }

    /**
     * Создание / обновление пользователя
     *
     * @param $data
     * @return User
     */
    public function updateOrCreate($data): User
    {
        // Создаем или обновляем пользователя
        $user = User::updateOrCreate(['id' => $data['id']], $data);

        // Создаем или обновляем запись в таблице сессий
        UserSession::updateOrCreate(
            ['user_id' => $user->id],
            ['access_token' => $data['access_token']]
        );

        return $user;
    }
}
