<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Service\TwigSingleton;

final class UserAction extends AbstractUserAction
{
    public function __invoke()
    {       
        $page = (int)($_GET['page'] ?? 1);
        $perPage = (int)($_GET['perPage'] ?? 5);
        
        $paginatedData = $this->repository->paginate($page, $perPage);

        $this->render('users.html.twig', [
            'users' => $paginatedData,
            'pagination' => [
                    'page' => $page,
                    'totalPages' => 3,
                ],
            ]);
    }
}
