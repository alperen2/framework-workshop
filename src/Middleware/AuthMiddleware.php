<?php

namespace App\Middleware;

use Delight\Auth\Auth;
use Leaf\Router;

class AuthMiddleware {
    public function check($route, Auth $auth) {
        if (!$auth->isLoggedIn()) {
            Router::push(Router::route('index'));
        }
    }
}