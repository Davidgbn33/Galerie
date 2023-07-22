<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Services\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AllowDynamicProperties]
class MentionController extends AbstractController
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #[Route('/mention', name: 'app_mention')]
    public function index(): Response
    {
        $categories = $this->categoryService->getAllCategories();

        return $this->render('mention/index.html.twig', [
            'categories'=> $categories,
        ]);
    }
}
