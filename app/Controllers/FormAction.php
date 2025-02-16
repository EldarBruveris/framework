<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Service\TwigSingleton;

final class FormAction extends AbstractUserAction
{
    public function __invoke()
    {

        $this->render('addForm.html.twig');
        //require_once __DIR__ . '/../Views/form/form.html';
    }
}
