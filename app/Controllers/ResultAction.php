<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Models\UserSave;
use App\Repository\UserRepository;

final class ResultAction extends AbstractUserAction
{
    public function __invoke()
    {

        $user = new UserSave($_POST['name'], $_POST['email'], $_POST['gender'], $_POST['status']);
        $db = $this->repository->create($user);
        if ($db){
            header("Location:/users");
        }
    }
}
