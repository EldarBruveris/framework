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
}
