<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyThanksController extends AbstractController
{
    #[Route('/my/thanks', name: 'app_my_thanks')]
    public function index(): Response
    {
        return $this->render('my_thanks/index.html.twig', [
            'controller_name' => 'MyThanksController',
        ]);
    }
}
