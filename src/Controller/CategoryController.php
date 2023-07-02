<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->findAll();
    }

   #[Route('/category', name: 'app_category')]
   public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'categories'=> $category,
        ]);
    }

#[Route('/category/show/{id}', name: 'show_cat',methods: ['GET'])]
    public function show(CategoryRepository $categoryRepository, int $id): Response
    {
        $category = $categoryRepository->findOneById($id);
        $categories = $categoryRepository->findAll();
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

}
