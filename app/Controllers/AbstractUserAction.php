<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\User\UserRepositoryFactory;
use App\Repository\User\UserRepositoryInterface;
use App\Service\TwigSingleton;

abstract class AbstractUserAction
{
    protected UserRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = UserRepositoryFactory::getRepository();
    }

    public function render(string $view, array $parameters = []): void
    {
        echo TwigSingleton::getInstance()->render($view, $parameters);
    }
    
    public function redirect(string $url){
        header("Location:".$url);
    }

    public function json($data, int $status = 200){
        http_response_code($status);
        echo json_encode($data);
    }
}
