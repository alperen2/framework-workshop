<?php
declare(strict_types=1);

use Leaf\Router;

require __DIR__.'/../vendor/autoload.php';



require_once __DIR__.'/../config/routes.php';
Router::run();