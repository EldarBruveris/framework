<?php
declare(strict_types=1);

namespace App\Repository\User;

use App\Repository\User\Api\UserApiRepository;
use App\Repository\User\Database\UserRepository;


class UserRepositoryFactory
{
    public static function getRepository(): UserRepositoryInterface
    {
        $source = $_SESSION['user_source'] ?? 'database';
        
        return match($source){
            'database' => new UserRepository(),
            'api' => new UserApiRepository(),
            default => throw new \RuntimeException('Source does not exist. Source: ' . $source)
        };
    }
}