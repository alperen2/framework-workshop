<?php

namespace App\Controller;

use App\Entity\Candidate;
use Delight\Auth\Auth;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class CandidateController {
    public function show(Environment $twig, EntityManager $em, Request $request, Auth $auth) {
        $candidates = $em->getRepository(Candidate::class)->findAll();

        echo $twig->render('index.html.twig', [
            'candidates' => $candidates,
        ]);
    }

    public function add(EntityManager $em, Request $request, Auth $auth, Environment $twig) {
        if ($request->getMethod() === 'POST') {
            $params = $request->request->all();
            $name = $params['name'];
            $email = $params['email'];
            $phone = $params['phone'];
            
            $candidates = new Candidate();
            $candidates->setName($name);
            $candidates->setEmail($email);
            $candidates->setPhone($phone);


            $em->persist($candidates);
            $em->flush();

            $redirectResponse = new RedirectResponse('/');
            $redirectResponse->send();
        }

        echo $twig->render('candidate/add.html.twig');
    }

    public function delete($id, EntityManager $em, Environment $twig) {
        $candidate = $em->getRepository(Candidate::class)->findOneBy(['id' => $id]);

        if (!$candidate) {
            echo $twig->render('404.html.twig');
            exit;
        }

        $em->remove($candidate);
        $em->flush();

        $redirectResponse = new RedirectResponse('/');
        $redirectResponse->send();
    }

    public function update($id, EntityManager $em, Request $request, Environment $twig) {
        $candidate = $em->getRepository(Candidate::class)->findOneBy(['id' => $id]);
        if (!$candidate) {
            echo $twig->render('404.html.twig');
            exit;
        }
        if ($request->getMethod() === 'POST') {
            $params = $request->request->all();

            $name = $params['name'];
            $email = $params['email'];
            $phone = $params['phone'];

            $candidate->setName($name);
            $candidate->setEmail($email);
            $candidate->setPhone($phone);

            $em->persist($candidate);
            $em->flush();

            $redirectResponse = new RedirectResponse('/');
            $redirectResponse->send();
        }

        echo $twig->render('candidate/update.html.twig', [
            'candidate' => $candidate
        ]);
    }

}