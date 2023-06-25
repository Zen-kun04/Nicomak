<?php

namespace App\Controller;

use App\Form\CreateThanksType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    #[Route('/create', name: 'app_create')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(CreateThanksType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $thank = $form->getData();
            $thank
            ->setFromUser($this->getUser())
            ->setThankedAt(new \DateTimeImmutable);
            $manager->persist($thank);
            $manager->flush();
            return $this->redirectToRoute("app_thanks");
        }

        return $this->render('create/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
