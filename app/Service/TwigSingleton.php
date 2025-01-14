<?php

namespace App\Service;

class TwigSingleton {
    private static ?\Twig\Environment $instance = null;

    private function __construct() {
        
    }

    public static function getInstance(): \Twig\Environment {
        if (self::$instance === null) {
            $loader = new \Twig\Loader\FilesystemLoader('../templates/');
            self::$instance = new \Twig\Environment($loader);
        }
        return self::$instance;
    }

}