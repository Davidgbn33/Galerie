<?php

namespace App\Controller;

use App\Entity\Paint;
use App\Repository\PaintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PaintRepository $paintRepository): Response
    {
        $paint = $paintRepository->findAll();
        return $this->render('home/index.html.twig', [
            'paint' => $paint,
        ]);
    }
}
