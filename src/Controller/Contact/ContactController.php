<?php

namespace App\Controller\Contact;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request,
                          EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $contact->setSentAt(new \DateTimeImmutable());
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', "Votre demande de contact a bien été envoyée");

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
