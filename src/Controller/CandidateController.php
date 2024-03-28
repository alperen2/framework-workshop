<?php

namespace App\Controller;

use App\Entity\Candidate;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class CandidateController {
    public function show(EntityManager $entityManager, Environment $twig) {
        $candidates = $entityManager->getRepository(Candidate::class)->findAll();

        echo $twig->render('candidate/index.html.twig', [
            'candidates' => $candidates,
        ]);
    }

    public function add(EntityManager $entityManager, Request $request, Environment $twig) {
        if ($request->getMethod() === 'POST') {
            $params = $request->request->all();
            $name = $params['name'];
            $entityManagerail = $params['email'];
            $phone = $params['phone'];
            
            $candidates = new Candidate();
            $candidates->setName($name);
            $candidates->setEmail($entityManagerail);
            $candidates->setPhone($phone);


            $entityManager->persist($candidates);
            $entityManager->flush();

            $redirectResponse = new RedirectResponse('/candidate');
            $redirectResponse->send();
        }

        echo $twig->render('candidate/add.html.twig');
    }

    public function delete($id, EntityManager $entityManager, Environment $twig) {
        $candidate = $entityManager->getRepository(Candidate::class)->findOneBy(['id' => $id]);

        if (!$candidate) {
            echo $twig->render('404.html.twig');
            exit;
        }

        $entityManager->remove($candidate);
        $entityManager->flush();

        $redirectResponse = new RedirectResponse('/candidate');
        $redirectResponse->send();
    }

    public function update($id, EntityManager $entityManager, Request $request, Environment $twig) {
        $candidate = $entityManager->getRepository(Candidate::class)->findOneBy(['id' => $id]);
        if (!$candidate) {
            echo $twig->render('404.html.twig');
            exit;
        }
        if ($request->getMethod() === 'POST') {
            $params = $request->request->all();

            $name = $params['name'];
            $entityManagerail = $params['email'];
            $phone = $params['phone'];

            $candidate->setName($name);
            $candidate->setEmail($entityManagerail);
            $candidate->setPhone($phone);

            $entityManager->persist($candidate);
            $entityManager->flush();
            
            $redirectResponse = new RedirectResponse('/candidate');
            $redirectResponse->send();
        }

        echo $twig->render('candidate/update.html.twig', [
            'candidate' => $candidate
        ]);
    }

}