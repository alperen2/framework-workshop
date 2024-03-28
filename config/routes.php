<?php

use App\Controller\HomeController;
use Leaf\Router;

Router::match('GET', '/', [HomeController::class, 'index']);
