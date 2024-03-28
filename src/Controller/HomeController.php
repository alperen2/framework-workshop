<?php
namespace App\Controller;

use Twig\Environment;

class HomeController {
    public function index(Environment $twig) {
       echo $twig->render('index.html.twig');
    }
}