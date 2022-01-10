<?php

namespace App\Controller;

use App\Entity\articles;
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

        $articles = $this->entityManager->getRepository(articles::class)->findAll();

        return $this->render('home/index.html.twig' , [
            'articles' =>$articles
        ]);
    }

    #[Route('/article/{id}', name: 'one_article')]
    public function getArticle($id): Response
    {

        $article = $this->entityManager->getRepository(articles::class)->findOneById($id);

        return $this->render('home/vente.html.twig' , [
            'article' =>$article
        ]);
    }

}
