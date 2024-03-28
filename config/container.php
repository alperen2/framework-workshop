<?php

use Twig\Environment;

return [
    Environment::class => function () {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../view');
        return new \Twig\Environment($loader, [
            // 'cache' => __DIR__.'/../view/cache',
        ]);
    }
];