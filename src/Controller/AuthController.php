<?php

namespace App\Controller;

use Cake\Log\Log;
use Delight\Auth\Auth;
use Leaf\Router;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class AuthController {
    public function register(Request $request, Auth $auth, Environment $twig) {
        if ($auth->isLoggedIn()) {
            Router::push(Router::route('index'));
        }

        $params = $request->request->all();

        if ($request->getMethod() === 'POST') {
            try {
                $userId = $auth->register($params['email'], $params['password'], $params['username']);
            
                echo 'We have signed up a new user with the ID ' . $userId;
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                die('Invalid email address');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Invalid password');
            }
            catch (\Delight\Auth\UserAlreadyExistsException $e) {
                die('User already exists');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }

        echo $twig->render('auth/register.html.twig');

    }

    public function login(Request $request, Auth $auth, Environment $twig) {
        if ($auth->isLoggedIn()) {
            Router::push(Router::route('index'));
        }

        if ($request->getMethod() === 'POST') {
            $params = $request->request->all();

            $rememberDuration = null;
            if (isset($params['remember_me'])) {
                $rememberDuration = (int) (60 * 60 * 24 * 365.25);
            }

            try {
                $auth->login($params['email'], $params['password'], $rememberDuration);
                Router::push(Router::route('index'));
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                die('Wrong email address');
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                die('Wrong password');
            }
            catch (\Delight\Auth\EmailNotVerifiedException $e) {
                die('Email not verified');
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                die('Too many requests');
            }
        }

        echo $twig->render('auth/login.html.twig');
    }

    public function logout(Auth $auth) {
        $auth->logOut();
        Router::push(Router::route('index'));
    }
}