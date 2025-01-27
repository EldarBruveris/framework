<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Models\UserSave;
use App\Repository\UserRepository;

final class ResultAction
{
    public function __invoke()
    {

        $user = new UserSave($_POST['name'], $_POST['email'], $_POST['gender'], $_POST['status']);
        $db = new UserRepository;
        if ($db->save($user)){
            header("Location:/users");
        }
    }
}
