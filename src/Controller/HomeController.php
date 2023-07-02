<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Paint;
use App\Repository\CategoryRepository;
use App\Repository\PaintRepository;

use App\service\PaintService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->findAll();
    }

    #[Route('/', name: 'home')]
    public function index(PaintService $paintService,CategoryRepository $categoryRepository, PaintRepository $paintRepository, Request $request,): Response
    {
        $category = $categoryRepository->findAll();
        $pagination = $paintService->getPaginatedPaints();

        return $this->render('home/index.html.twig', [
            /*'paints' => $paints,*/
            'pagination' => $pagination,
            'categories'=> $category,
        ]);
    }
#[Route('/show/{id}', name: 'show',methods: ['GET'])]
    public function show(Paint $paint,CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        return $this->render('home/show.html.twig', [
            'paint' => $paint,
            'categories' => $category,
        ]);
    }
}
