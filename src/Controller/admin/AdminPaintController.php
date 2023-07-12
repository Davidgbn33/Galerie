<?php

namespace App\Controller\admin;

use AllowDynamicProperties;
use App\Entity\Paint;
use App\Form\PaintType;
use App\Repository\PaintRepository;
use App\service\CategoryService;
use App\service\PaintService;
use App\service\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AllowDynamicProperties] #[Route('/admin', name: 'admin')]
class AdminPaintController extends AbstractController
{
    private  $uploadFile;
    public function __construct(CategoryService $categoryService,UploadFile $uploadFile,EntityManagerInterface $em)
    {
        $this->categoryService = $categoryService;
        $this->uploadFile = $uploadFile;
        $this->em = $em;
    }

    #[Route('/', name: '_list', methods: ['GET'])]
    public function index(PaintService $paintService): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $pagination = $paintService->getPaginatedPaintsAdmin();
        return $this->render('admin/paint/liste.html.twig', [
            'pagination' => $pagination,
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
            $file = $paintForm["paintImageFile"]->getData();
            $filename = $this->uploadFile->saveFile($file);
            $paint->setpaintImage($filename);
            $this->em->persist($paint);
            $this->em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('admin/paint/new.html.twig', [
            'paint' => $paint,
            'categories' => $categories,
            'paintForm' => $paintForm->createView(),
        ]);
    }
    #[Route('/{id}/edit', name: '_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request,PaintRepository $paintRepository, Paint $paint ): Response
    {
        $categories = $this->categoryService->getAllCategories();

        $paintForm = $this->createForm(PaintType::class, $paint);
        $paintForm->handleRequest($request);

        if ($paintForm->isSubmitted() && $paintForm->isValid()) {
            $file = $paintForm["paintImageFile"]->getData();
            if($file){
                $filename = $this->uploadFile->updateFile($file, $paint->getPaintImage());
                $paint->setPaintImage($filename);
            }
            $paintRepository->save($paint, true);


            return $this->redirectToRoute('admin_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/paint/new.html.twig', [
            'paint' => $paint,
            'paintForm' => $paintForm,
            'categories' => $categories,
        ]);
    }

    #[Route('/{id}', name: '_delete', methods: ['GET','POST'])]
    public function delete(
        Request $request,
        Paint $paint,
        PaintRepository $paintRepository,
        EntityManagerInterface $manager
    ): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paint->getId(), $request->request->get('_token'))) {

            $paintRepository->remove($paint, true);
        }
        /*$this->addFlash('danger', 'le tableau va être supprimé');*/

        return $this->redirectToRoute('admin_list',[], Response::HTTP_SEE_OTHER);
    }
}