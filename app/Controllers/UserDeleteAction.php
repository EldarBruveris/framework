<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use FTP\Connection;

final class UserDeleteAction extends AbstractUserAction
{
    public function __invoke($userID)
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $db = $this->repository->delete($userID);
            $this->json(['status' => 'success', 'message' => 'Data deleted successfully']);
        } else {
            $this->json(['status' => 'error', 'message' => 'Server error'], 500);   
        }
    }
}
