<?php

namespace App\Controller;

use App\Entity\Paint;
use App\Repository\PaintRepository;

use App\service\PaintService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PaintService $paintService, PaintRepository $paintRepository, Request $request,): Response
    {
        /*$paints = $paintRepository->findAll();*/

        $pagination = $paintService->getPaginatedPaints();

        return $this->render('home/index.html.twig', [
            /*'paints' => $paints,*/
            'pagination' => $pagination,
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
