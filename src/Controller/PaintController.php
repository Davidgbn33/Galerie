<?php

namespace App\Controller;


use AllowDynamicProperties;
use App\Entity\Comment;
use App\Entity\Paint;
use App\Form\CommentType;
use App\Services\CategoryService;
use App\Services\PaintService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AllowDynamicProperties]
class PaintController extends AbstractController
{

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
#[Route('/show/{slug}', name: 'show',methods: ['GET', 'POST'])]
    public function show(Paint $paint): Response
    {
        $categories = $this->categoryService->getAllCategories();

        $comment = new Comment($paint);

        $commentForm = $this->createForm(CommentType::class, $comment);

        return $this->renderForm('home/show.html.twig', [
            'paint' => $paint,
            'categories' => $categories,
            'commentForm' => $commentForm,
        ]);
    }
}
