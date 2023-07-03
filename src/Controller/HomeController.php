<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Paint;
use App\Repository\CategoryRepository;
use App\Repository\PaintRepository;
use App\Service\CategoryService;
use App\service\PaintService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #[Route('/', name: 'home')]
    public function index(PaintService $paintService, Request $request,): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $pagination = $paintService->getPaginatedPaints();

        return $this->render('home/index.html.twig', [
            'pagination' => $pagination,
            'categories'=> $categories,
        ]);
    }
#[Route('/show/{id}', name: 'show',methods: ['GET'])]
    public function show(Paint $paint,CategoryRepository $categoryRepository): Response
    {
        $categories = $this->categoryService->getAllCategories();
        return $this->render('home/show.html.twig', [
            'paint' => $paint,
            'categories' => $categories,
        ]);
    }
}
