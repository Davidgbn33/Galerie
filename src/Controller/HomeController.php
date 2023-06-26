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
        $paints = $paintRepository->findAll();
        return $this->render('home/index.html.twig', [
            'paints' => $paints,
        ]);
    }
#[Route('/show/{id}', name: 'show',methods: ['GET'])]
    public function show(Paint $paint): Response
    {

        return $this->render('home/show.html.twig', [
            'paint' => $paint,
        ]);
    }
}
