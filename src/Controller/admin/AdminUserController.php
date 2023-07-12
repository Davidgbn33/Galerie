<?php

namespace App\Controller\admin;

use AllowDynamicProperties;
use App\Entity\Paint;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\service\CategoryService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[AllowDynamicProperties] #[Route ('/admin_user', name: 'admin_user_')]
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

    #[Route('/user/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request,UserRepository $userRepository, User $user ): Response
    {
        $categories = $this->categoryService->getAllCategories();

        $userForm = $this->createForm(UserType::class, $user);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {

            $userRepository->save($user, true);


            return $this->redirectToRoute('admin_user_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/user/edit.html.twig', [
            'user'=> $user,
            'userForm' => $userForm,
            'categories' => $categories,
        ]);
    }
    #[Route('/user/{id}', name: 'delete', methods: ['GET','POST'])]
    public function delete(
        Request $request,
        User $user,
        UserRepository $userRepository,
        EntityManagerInterface $manager
    ): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {

            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('admin_user_list',[], Response::HTTP_SEE_OTHER);
    }
}
