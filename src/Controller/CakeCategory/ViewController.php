<?php

namespace App\Controller\CakeCategory;

use App\Entity\CakeCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ViewController extends AbstractController
{
    #[Route('/categorie-de-gateaux/details/{slug}', name: 'app_cakecategory_view')]
    public function index(CakeCategory $cakeCategory): Response
    {
        return $this->render('cake_category/view/index.html.twig', [
            'cake_category' => $cakeCategory,
        ]);
    }
}