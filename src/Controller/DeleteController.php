<?php

namespace App\Controller;

use App\Repository\ThanksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteController extends AbstractController
{
    #[Route('/delete/{id}', name: 'app_delete')]
    public function index(string $id, EntityManagerInterface $entityManager): Response
    {
        $thanksRepository = $entityManager->getRepository(Thanks::class);
        $thanks = $thanksRepository->find($id);
        if($thanks === null || (!in_array("ROLE_ADMIN", $this->getUser()->getRoles()) && $thanks->getFromUser() !== $this->getUser())){
            return $this->redirectToRoute("app_thanks");
        }

        $entityManager->remove($thanks);
        $entityManager->flush();

        return $this->redirectToRoute("app_thanks");
    }
}
