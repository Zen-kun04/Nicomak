<?php

namespace App\Controller;

use App\Form\ThanksType;
use App\Repository\ThanksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    #[Route('/edit/{id}', name: 'app_edit')]
    public function index(string $id, ThanksRepository $thanksRepository, Request $request, EntityManagerInterface $objectManager): Response
    {
        $thanks = $thanksRepository->find($id);
        
        if($thanks === null || (!in_array("ROLE_ADMIN", $this->getUser()->getRoles()) && $thanks->getFromUser() !== $this->getUser())) {
            return $this->redirectToRoute("app_thanks");
        }

        $form = $this->createForm(ThanksType::class, $thanks, [
            'to_user' => $thanks->getToUser()
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $thank = $form->getData();
            $to = $form->getData()->getToUser();
            $thank->setToUser($to);
            $objectManager->persist($thank);
            $objectManager->flush();
            return $this->redirectToRoute('app_thanks');
        }

        return $this->render('edit/index.html.twig', [
            'thanks' => $thanks,
            'form' => $form->createView()
        ]);
    }
}