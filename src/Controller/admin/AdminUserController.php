<?php

namespace App\Controller\admin;

use AllowDynamicProperties;
use App\Entity\Paint;
use App\Repository\UserRepository;
use App\service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[AllowDynamicProperties] #[Route ('/admin_user', name: 'admin_user')]
class AdminUserController extends AbstractController
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #[Route('/user', name: 'list')]
    public function index(UserRepository $userRepository): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $users = $userRepository->findAll();
        return $this->render('admin/user/liste.html.twig', [
            'users' => $users,
            'categories' => $categories,
        ]);
    }
}
