<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\articles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/addcontact', name: 'contactpost', methods: "POST")]
    public function connectionAction(Request $request) {
        $subject = $request->request->get('subject');
        $message = $request->request->get('message');
        $prenom=  $request->request->get('prenom');
        $email=  $request->request->get('email');
        $nom=  $request->request->get('nom');

        $contact = new Contact();
        $contact->setSubject($subject);;
        $contact->setMessage($message);
        $contact->setPrenom($prenom);
        $contact->setEmail($email);
        $contact->setNom($nom);
        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
        return $this->redirect("/contact");
    }

    #[Route('/messages', name: 'messages')]
    public function messages(): Response
    {
        $messages = $this->entityManager->getRepository(Contact::class)->findAll();

        return $this->render('messages/messages.html.twig', [
            'messages' => $messages
        ]);
    }



    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {

        $articles = $this->entityManager->getRepository(articles::class)->findAll();

        return $this->render('contact/contact.html.twig', [
            'articles' => $articles
        ]);
    }


}
