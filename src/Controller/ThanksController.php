<?php

namespace App\Controller;

use App\Repository\ThanksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThanksController extends AbstractController
{
    #[Route('/thanks', name: 'app_thanks')]
    public function index(ThanksRepository $thanksRepository): Response
    {
        $thanks = $thanksRepository->findAll();

        return $this->render('thanks/index.html.twig', [
            'thanks' => $thanks,
        ]);
    }
}
