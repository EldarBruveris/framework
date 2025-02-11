<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use App\Service\TwigSingleton;
use GuzzleHttp\Client;

final class UserAction
{
    public function __invoke()
    {
        $client = new Client([
            'base_uri' => 'https://gorest.co.in/public/v2/',
        ]);
        $response = $client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $usersAPI = json_decode($body, true);

        
        $db = new UserRepository;
        $page = (int)($_GET['page'] ?? 1);
        $perPage = 10;
        
        $paginatedData = $db->getPaginatedData($page, $perPage);
        $totalPages = $db->getMaxPages($perPage);

        echo TwigSingleton::getInstance()->render('users.html.twig', [
            'users' => $paginatedData,
            'pagination' => [
                    'page' => $page,
                    'totalPages' => $totalPages,
                ],
        ]);
        //require_once __DIR__ . '/../Views/user/list.php';
    }
}
