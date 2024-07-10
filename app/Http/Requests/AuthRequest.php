<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'access_token' => 'required|string|max:50',
            'id'           => 'required|integer',
            'first_name'   => 'required|string|max:50',
            'last_name'    => 'required|string|max:50',
            'city'         => 'required|string|max:50',
            'country'      => 'required|string|max:50',
            'sig'          => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'access_token.required' => 'Токен доступа обязателен',
            'first_name.required'   => 'Имя обязательно',
            'last_name.required'    => 'Фамилия обязательна',
            'city.required'         => 'Город обязателен',
            'country.required'      => 'Страна обязательна',
            'sig.required'          => 'Подпись обязательна',
            'access_token.max'      => 'Токен доступа не должен превышать 50 символов',
            'first_name.max'        => 'Имя не должно превышать 50 символов',
            'last_name.max'         => 'Фамилия не должна превышать 50 символов',
            'city.max'              => 'Город не должен превышать 50 символов',
            'country.max'           => 'Страна не должна превышать 50 символов',
            'sig.max'               => 'Подпись не должна превышать 50 символов',
        ];
    }
}
