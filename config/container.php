<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Twig\Environment;

return [
    Environment::class => function () {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../view');
        return new \Twig\Environment($loader, [
            // 'cache' => __DIR__.'/../view/cache',
        ]);
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
    }
];