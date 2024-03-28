<?php
namespace App\Controller;

use App\Entity\Candidate;
use Cake\Log\Log;
use Doctrine\ORM\EntityManager;
use Twig\Environment;

class HomeController {
    public function index(Environment $twig, EntityManager $entityManager) {
        
        $candidates = $entityManager->getRepository(Candidate::class)->findAll();
        Log::debug('bu debug başka debug');
       echo $twig->render('index.html.twig');
    }
}