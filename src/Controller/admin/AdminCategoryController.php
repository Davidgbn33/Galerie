<?php

namespace App\Controller\admin;

use AllowDynamicProperties;
use App\service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AllowDynamicProperties] #[Route('/admin', name: 'admin')]
class AdminCategoryController extends AbstractController
{
    public function __construct(CategoryService $categoryService)
    {

        $this->categoryService = $categoryService;
    }
    #[Route('/category', name: 'admin_category')]
    public function index(): Response
    {
        $categories = $this->categoryService->getAllCategories();

        return $this->render('admin/category/liste.html.twig', [

            'categories' => $categories,
        ]);

    }
}
