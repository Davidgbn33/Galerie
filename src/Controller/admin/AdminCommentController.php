<?php

namespace App\Controller\admin;

use AllowDynamicProperties;
use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Services\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[AllowDynamicProperties] #[Route ('/admin_comment', name: 'admin_comment_')]
class AdminCommentController extends AbstractController
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #[Route('/comment', name: 'list')]
    public function index(CommentRepository $commentRepository): Response
    {
        $categories = $this->categoryService->getAllCategories();
        $comments = $commentRepository->findAll();
        return $this->render('admin/comment/liste.html.twig', [
             'comments'=> $comments,
            'categories' => $categories,
        ]);
    }
    #[Route('/comment/{id}', name: 'delete', methods: ['GET','POST'])]
    public function delete(
        Request $request,
        Comment $comment,
        CommentRepository $commentRepository,
    ): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {

            $commentRepository->remove($comment, true);
        }

        return $this->redirectToRoute('admin_comment_list',[], Response::HTTP_SEE_OTHER);
    }
}