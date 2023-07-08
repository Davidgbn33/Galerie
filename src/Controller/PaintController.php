<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Paint;
use App\Form\CommentType;
use App\Form\PaintType;
use App\Repository\CategoryRepository;
use App\Repository\PaintRepository;
use App\Service\CategoryService;
use App\service\PaintService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaintController extends AbstractController
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
#[Route('/show/{id}', name: 'show',methods: ['GET', 'POST'])]
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
#[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request,PaintRepository $paintRepository): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $paint = new Paint();

        $paintForm = $this->createForm(PaintType::class, $paint);
        $paintForm->handleRequest($request);

        if ($paintForm->isSubmitted() && $paintForm->isValid()) {
            $paintRepository->save($paint, true);

            return $this->redirectToRoute('home');
        }
        return $this->render('admin/index.html.twig', [
            'paint' => $paint,
            'categories' => $categories,
            'paintForm' => $paintForm->createView(),
        ]);
    }

}
