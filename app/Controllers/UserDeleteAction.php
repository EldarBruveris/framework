<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Models\User;
use app\Repository\UserRepository;
use FTP\Connection;

final class UserDeleteAction
{
    public function __invoke($userID)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            // Читаем сырые данные из тела запроса
            $putData = file_get_contents('php://input');
        
            // Если данные в формате JSON, декодируем их
            $data = json_decode($putData, true);
        
            // Если данные не в формате JSON, обрабатываем как обычные данные
            if (json_last_error() !== JSON_ERROR_NONE) {
                parse_str($putData, $data);
            }
            //print_r($data);
            $db = new UserRepository();
            $db->delete($userID);

            echo json_encode(['status' => 'success', 'message' => 'Data deleted successfully']);
        } else {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Server error']);   
        }
    }
}