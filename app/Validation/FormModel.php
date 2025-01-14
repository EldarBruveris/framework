<?php

namespace App\Validation;

class UserValidation
{
    public function validate($data)
    {
        $errors = [];

        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Некорректный email';
        }

        if (empty($data['name'])) {
            $errors['name'] = 'Имя обязательно';
        }

        if (!isset($data['gender']) || !in_array($data['gender'], ['male', 'female'])) {
            $errors['gender'] = 'Пол должен быть указан';
        }

        if (!isset($data['status']) || !in_array($data['status'], ['active', 'inactive'])) {
            $errors['status'] = 'Статус должен быть указан';
        }

        return ['data' => $data, 'errors' => $errors];
    }
}
