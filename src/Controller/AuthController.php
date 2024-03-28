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

        
        $authError = "";
        if ($request->getMethod() == 'POST') {
            $params = $request->request->all();
            try {
                $userId = $auth->register($params['email'], $params['password'], $params['username']);

                $auth->loginWithUsername($params['username'], $params['password'], null);
                Router::push(Router::route('index'));
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                $authError = 'Invalid email address';
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                $authError = 'Invalid password';
            }
            catch (\Delight\Auth\UserAlreadyExistsException $e) {
                $authError = 'User already exists';
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
            }
        }

        echo $twig->render('auth/register.html.twig', [
            'authError' => $authError
        ]);

    }

    public function login(Request $request, Auth $auth, Environment $twig) {
        if ($auth->isLoggedIn()) {
            Router::push(Router::route('index'));
        }

        $authError = "";
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
                $authError = 'Wrong email address';
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                $authError = 'Wrong password';
            }
            catch (\Delight\Auth\EmailNotVerifiedException $e) {
                $authError = 'Email not verified';
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                $authError = 'Too many requests';
            }
        }

        echo $twig->render('auth/login.html.twig', [
            'authError' => $authError
        ]);
    }

    public function logout(Auth $auth) {
        $auth->logOut();
        Router::push(Router::route('index'));
    }
}