<?php

namespace App\Controller;

use App\Entity\Heros;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{


    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }

    #[Route('/article', name: 'article')]
    public function index(): Response
    {

        $heros = $this->entityManager->getRepository(Heros::class)->findAll();

        return $this->render('home/index.html.twig' , [
            'heros' =>$heros
        ]);
    }

    #[Route('/article/{id}', name: 'one_article')]
    public function getArticle($id): Response
    {

        $hero = $this->entityManager->getRepository(Heros::class)->findOneById($id);

        return $this->render('home/vente.html.twig' , [
            'hero' =>$hero
        ]);
    }

}
