<?php

namespace App\Controller\admin;

use AllowDynamicProperties;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\service\CategoryService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AllowDynamicProperties] #[Route('/admin', name: 'admin_')]
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

    #[Route('/category/new', name: 'category_new', methods: ['GET', 'POST'])]
    public function new(Request $request,CategoryRepository $categoryRepository): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $category = new Category();

        $categoryForm = $this->createForm(CategoryType::class, $category);
        $categoryForm->handleRequest($request);

        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            $categoryRepository->save($category, true);

            return $this->redirectToRoute('admin/category');
        }
        return $this->render('admin/category/new.html.twig', [
            'category'=> $category,
            'categories' => $categories,
            'categoryForm' => $categoryForm->createView(),
        ]);
    }

}
