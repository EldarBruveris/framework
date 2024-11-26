<?php

declare(strict_types=1);

namespace App\Controllers;

use app\Models\User;
use app\Repository\UserRepository;

final class UserAction
{
    public function __invoke()
    {
        $db = new UserRepository;
        $users = $db->findAll();
        foreach ($users as $user) {
            echo "ID: {$user->id}, Name: {$user->name}, Email: {$user->email}, Gender: {$user->gender}, Status: {$user->status}\n";
        }
    }
}
