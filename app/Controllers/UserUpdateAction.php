<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use FTP\Connection;

final class UserUpdateAction extends AbstractUserAction
{
    public function __invoke($userID)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            // Читаем сырые данные из тела запроса
            $putData = file_get_contents('php://input');
        
            // Если данные в формате JSON, декодируем их
            $data = json_decode($putData, true);
        
            // Если данные не в формате JSON, обрабатываем как обычные данные
            if (json_last_error() !== JSON_ERROR_NONE) {
                parse_str($putData, $data);
            }

            $user =  $this->repository->show((int)$userID);
            $user->email = $data["email"];
            $user->status = $data["status"];
            $user->gender = $data["gender"];
            $user->name = $data["name"];
            $this->repository->update($user);

            echo json_encode(['status' => 'success', 'message' => 'Data updated successfully']);
        } else {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Server error']);   
        }
    }
}
