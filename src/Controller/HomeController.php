<?php
namespace App\Controller;

use App\Entity\Candidate;
use Doctrine\ORM\EntityManager;
use Twig\Environment;

class HomeController {
    public function index(Environment $twig, EntityManager $entityManager) {
        
        $candidates = $entityManager->getRepository(Candidate::class)->findAll();
        dump($candidates[0]->getId());
       echo $twig->render('index.html.twig');
    }
}