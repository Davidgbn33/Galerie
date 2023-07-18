<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\service\CategoryService;
use App\service\PaintService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

#[Route('/category/show/{slug}', name: 'show_cat',methods: ['GET'])]
    public function show(Category $category, PaintService $paintService): Response
    {

        $categories = $this->categoryService->getAllCategories();


        return $this->render('category/show.html.twig', [
            'pagination' => $paintService->getPaginatedPaints($category),
            'categories' => $categories,
            'category' => $category
        ]);
    }

}
