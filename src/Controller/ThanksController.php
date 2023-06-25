<?php

namespace App\Controller;

use App\Form\FilterThanksType;
use App\Repository\ThanksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThanksController extends AbstractController
{
    #[Route('/thanks', name: 'app_thanks')]
    public function index(ThanksRepository $thanksRepository, Request $request): Response
    {
        $thanks = $thanksRepository->findAll();
        $filterForm = $this->createForm(FilterThanksType::class);
        $filterForm->handleRequest($request);

        if($filterForm->isSubmitted() && $filterForm->isValid()) {
            if($filterForm->get("From_User")->getData() === 1 && $filterForm->get("To_User")->getData() === 0) {
                $thanks = $thanksRepository->findBy(["From_User" => $this->getUser()]);
            }else if($filterForm->get("From_User")->getData() === 0 && $filterForm->get("To_User")->getData() === 1){
                $thanks = $thanksRepository->findBy(["To_User" => $this->getUser()]);
            }
        }

        return $this->render('thanks/index.html.twig', [
            'thanks' => $thanks,
            'form' => $filterForm
        ]);
    }
}
