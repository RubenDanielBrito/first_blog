<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/', name: 'root')]
    public function root(EntityManagerInterface $entityManager): Response
    {
        $useRepo = $entityManager->getRepository(User::class);
        $postRepo = $entityManager->getRepository(Post::class);

        $userCollection = $useRepo->findAll();
        $postCollection = $postRepo->findAll();

        $instance_variables = [
            "controller_name" => "BaseController",
            "userCollection" => $userCollection,
            "postCollection" => $postCollection,
        ];

        return $this->render('base/root.html.twig', $instance_variables);
    }
}
