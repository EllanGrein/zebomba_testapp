<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_making_an_api_auth_request()
    {
        $response = $this->getJson('/user_auth?access_token=07b38cd0e778340eb40b25e005476ce8&id=1&first_name=Иван&last_name=Иванов&city=Москва&country=Россия&sig=5427b31460cd807aab7e184364960958');

        $response
            ->assertStatus(200)
            ->assertExactJson([
                "access_token" => "07b38cd0e778340eb40b25e005476ce8",
                "user_info" => [
                    "id" => 1,
                    "first_name" => "Иван",
                    "last_name" => "Иванов",
                    "city" => "Москва",
                    "country" => "Россия"
                ],
                "error" => "",
                "error_key" => ""
            ]);
    }
}
