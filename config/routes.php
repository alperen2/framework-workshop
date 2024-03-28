<?php

use App\Controller\AuthController;
use App\Controller\CandidateController;
use App\Controller\HomeController;
use Leaf\Router;

Router::match('GET', '/', [HomeController::class, 'index'], 'index');

Router::group('/auth', function () {
    Router::match('POST|GET', '/register', [AuthController::class, 'register']);
    Router::match('POST|GET', '/login', [AuthController::class, 'login']);
    Router::match('GET', '/logout', [AuthController::class, 'logout']);
});


Router::group('/candidate', function () {
    Router::match('GET', '/', [CandidateController::class, 'show']);
    Router::match('GET|POST', '/add', [CandidateController::class, 'add']);
    Router::match('GET|POST', '/update/{id}', [CandidateController::class, 'update']);
    Router::match('GET', '/delete/{id}', [CandidateController::class, 'delete']);
});
