<?php

namespace App\Controller\CakeCategory;

use App\Entity\CakeCategory;
use App\Form\CakeCategoryType;
use App\Repository\CakeCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditController extends AbstractController
{
    #[Route('/categorie-de-gateaux/modifier/{slug}', name: 'app_cakecategory_edit')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          CakeCategory           $cakeCategory): Response
    {
        $form = $this->createForm(CakeCategoryType::class, $cakeCategory);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cakeCategory);
            $entityManager->flush();

            $this->addFlash('success', 'Votre catégorie de gâteaux a bien été modifiée !');

            return $this->redirectToRoute('app_cakecategory_default_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cake_category/edit/index.html.twig', [
            'form' => $form->createView(),
            'cake_category' => $cakeCategory,
        ]);
    }
}