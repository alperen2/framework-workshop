<?php

use Delight\Auth\Auth;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

return [
    Environment::class => function (Auth $auth) {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../view');
        $twig =  new \Twig\Environment($loader, [
            // 'cache' => __DIR__.'/../view/cache',
        ]);
        
		$twig->addGlobal('username', $auth->getUsername() ?? false);

        return $twig;
    },
    EntityManager::class => function () {
        $paths = [__DIR__.'/../src/Entity'];
        $isDevMode = false;

        $dbParams = [
            'driver'   => 'pdo_mysql',
            'user'     => 'user',
            'password' => 'user',
            'dbname'   => 'framework',
            'host'     => 'db'
        ];

        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
        $connection = DriverManager::getConnection($dbParams, $config);
        return new EntityManager($connection, $config);
    },
    Auth::class => function (EntityManager $entityManager) {
        $db = $entityManager->getConnection()->getNativeConnection();
        return new \Delight\Auth\Auth($db);
    },
    Request::class => Request::createFromGlobals(),
];