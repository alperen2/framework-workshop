<?php

namespace App\Middleware;


class TestMiddleware {
    public function test() {
        echo "buradan bir middleware geçti";exit;
    }
}