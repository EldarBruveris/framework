<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use FTP\Connection;

final class UserDeleteAction
{
    public function __invoke($userID)
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $db = new UserRepository();
            $db->delete($userID);
            echo json_encode(['status' => 'success', 'message' => 'Data deleted successfully']);
        } else {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Server error']);   
        }
    }
}
