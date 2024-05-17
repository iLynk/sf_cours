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

class AddController extends AbstractController
{
    #[Route('/categorie-de-gateaux/nouvelle', name: 'app_cakecategory_add')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cakeCategory = (new CakeCategory())
            ->setActive(true);

        $form = $this->createForm(CakeCategoryType::class, $cakeCategory);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cakeCategory);
            $entityManager->flush();

            $this->addFlash('success', 'Votre catégorie de gâteaux a bien été ajoutée !');

            return $this->redirectToRoute('app_cakecategory_default_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cake_category/add/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}