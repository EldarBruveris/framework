<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Models\User;
use app\Models\UserSave;
use app\Repository\UserRepository;

final class ResultAction
{
    public function __invoke()
    {

        $user = new UserSave($_POST['name'], $_POST['email'], $_POST['gender'], $_POST['status']);
        $db = new UserRepository;
        if ($db->save($user)){
            require_once __DIR__ . '/../Views/result.php'; 
        }
    }
}
