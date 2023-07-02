<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\service\CategoryService;
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

   #[Route('/category', name: 'app_category')]
   public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $this->categoryService->getAllCategories();
        return $this->render('category/index.html.twig', [
            'categories'=> $category,
        ]);
    }

#[Route('/category/show/{id}', name: 'show_cat',methods: ['GET'])]
    public function show(CategoryRepository $categoryRepository, int $id): Response
    {
        $category = $categoryRepository->findOneById($id);
        $categories = $this->categoryService->getAllCategories();
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

}
