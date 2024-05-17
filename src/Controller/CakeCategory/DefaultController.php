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

#[Route('/categories-de-gateaux')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_cakecategory_default_index', methods: ['GET'])]
    public function index(CakeCategoryRepository $cakeCategoryRepository): Response
    {
        return $this->render('cake_category/default/index.html.twig', [
            'cake_categories' => $cakeCategoryRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_cakecategory_default_delete', methods: ['POST'])]
    public function delete(Request $request, CakeCategory $cakeCategory, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cakeCategory->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($cakeCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cakecategory_default_index', [], Response::HTTP_SEE_OTHER);
    }
}