<?php

declare(strict_types=1);

namespace App\Controllers;


final class UserSourceAction
{
    public function __invoke()
    {       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $_SESSION['user_source'] = $data['user_source']; 
        }
    }
}
