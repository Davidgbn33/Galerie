<?php

namespace App\Controller\admin;

use App\Entity\Paint;
use App\Form\PaintType;
use App\Repository\PaintRepository;
use App\service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin')]
class AdminPaintController extends AbstractController
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #[Route('/', name: '_list', methods: ['GET'])]
    public function index(PaintRepository $paintRepository): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $paints = $paintRepository->findAll();
        return $this->render('admin/liste.html.twig', [
            'paints' => $paints,
            'categories' => $categories,
        ]);
    }

    #[Route('/new', name: '_new', methods: ['GET', 'POST'])]
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
        return $this->render('admin/new.html.twig', [
            'paint' => $paint,
            'categories' => $categories,
            'paintForm' => $paintForm->createView(),
        ]);
    }
    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request,PaintRepository $paintRepository, Paint $paint ): Response
    {
        $categories = $this->categoryService->getAllCategories();

        $paintForm = $this->createForm(PaintType::class, $paint);
        $paintForm->handleRequest($request);

        if ($paintForm->isSubmitted() && $paintForm->isValid()) {
            $paintRepository->save($paint, true);


            return $this->redirectToRoute('admin_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/new.html.twig', [
            'paint' => $paint,
            'paintForm' => $paintForm,
            'categories' => $categories,
        ]);
    }
}