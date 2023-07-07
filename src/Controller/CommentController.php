<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Repository\PaintRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/show/ajax/comments', name: 'comment_add', methods: 'POST')]
    public function index(Request $request, PaintRepository $paintRepository, UserRepository $userRepository, EntityManagerInterface $em, CommentRepository $commentRepository): Response
    {


        $commentData = $request->request->all('comment');

        if (!$this->isCsrfTokenValid('comment_add', $commentData['_token'])) {
            return $this->json([
                'code' => 'INVALID_CSRF_TOKEN'
            ], Response::HTTP_BAD_REQUEST);
        }

        $paint = $paintRepository->findOneBy(['id' => $commentData['paint']]);

        if (!$paint) {
            return $this->json([
                'code' => 'ARTICLE_NOT_FOUND'
            ], Response::HTTP_BAD_REQUEST);
        }
        $user = $this->getUser();
        $comment = new Comment($paint);
        $comment->setComment($commentData['comment']);
        $comment->setUser($user);
        $comment->setCreatedAT(new DateTime());

        $em->persist($comment);
        $em->flush();

        $html = $this->renderView('comment/show.html.twig', [
                'comment' => $comment,
            ]
        );


        return $this->json([
            'code' => 'COMMENT_ADDED_SUCCESSFULLY',
            'message' => $html,
            'numberOfComment' => $commentRepository->count(['paint' => $paint]),
        ]);
// ...

    }
}
