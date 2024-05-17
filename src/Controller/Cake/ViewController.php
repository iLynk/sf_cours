<?php

namespace App\Controller\Cake;

use App\Entity\Cake;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ViewController extends AbstractController
{
    #[Route('/cake/details/{slug}', name: 'app_cake_view')]
    public function index(Cake $cake): Response
    {
        return $this->render('cake/view/index.html.twig', [
            'cake' => $cake,
        ]);
    }
}
