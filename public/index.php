<?php
declare(strict_types=1);

use Leaf\Router;

require __DIR__.'/../vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions(__DIR__.'/../config/container.php');
$container = $builder->build();

require __DIR__.'/../config/log.php';

if (PHP_SAPI != 'cli') {
    require_once __DIR__.'/../config/routes.php';
    require_once __DIR__.'/../config/middlewares.php';
    Router::setContainer($container);
    Router::run();
}
