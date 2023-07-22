<?php

namespace App\Controller\admin;

use AllowDynamicProperties;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Services\CategoryService;
use App\Services\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AllowDynamicProperties] #[Route('/admin_cat', name: 'admin_cat_')]
class AdminCategoryController extends AbstractController
{
    public function __construct(CategoryService $categoryService, UploadFile $uploadFile, EntityManagerInterface $em)
    {

        $this->categoryService = $categoryService;
        $this->uploadFile = $uploadFile;
        $this->em = $em;
    }
    #[Route('/category', name: 'list')]
    public function index(): Response
    {
        $categories = $this->categoryService->getAllCategories();

        return $this->render('admin/category/liste.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/category/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request,CategoryRepository $categoryRepository): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $category = new Category();

        $categoryForm = $this->createForm(CategoryType::class, $category);
        $categoryForm->handleRequest($request);

        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            $file = $categoryForm['categoryFile']->getData();
            $filename = $this->uploadFile->saveFile($file);
            $category->setCategoryImage($filename);
            $this->em->persist($category);
            $this->em->flush();


            return $this->redirectToRoute('admin_cat_list');
        }
        return $this->render('admin/category/new.html.twig', [
            'category'=> $category,
            'categories' => $categories,
            'categoryForm' => $categoryForm->createView(),
        ]);
    }
    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request,CategoryRepository $categoryRepository, Category $category ): Response
    {
        $categories = $this->categoryService->getAllCategories();

        $categoryForm = $this->createForm(CategoryType::class, $category);
        $categoryForm->handleRequest($request);

        if ($categoryForm->isSubmitted() && $categoryForm->isValid()) {
            $file = $categoryForm['categoryFile']->getData();
            if($file){
                $filename = $this->uploadFile->updateFile($file, $category->getCategoryImage());
                $category->setCategoryImage($filename);
            }
            $categoryRepository->save($category, true);


            return $this->redirectToRoute('admin_cat_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/category/edit.html.twig', [
            'categoryForm' => $categoryForm,
            'categories' => $categories,
        ]);
    }
    #[Route('/{id}', name: 'delete', methods: ['GET','POST'])]
    public function delete(
        Request $request,
        Category $category,
        CategoryRepository $categoryRepository,
        EntityManagerInterface $manager
    ): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {

            $categoryRepository->remove($category, true);
        }
        /*$this->addFlash('danger', 'le tableau va être supprimé');*/

        return $this->redirectToRoute('admin_cat_list',[], Response::HTTP_SEE_OTHER);
    }
}
