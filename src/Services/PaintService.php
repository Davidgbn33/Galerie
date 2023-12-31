<?php

namespace App\Services;

use App\Entity\Category;
use App\Repository\PaintRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class PaintService
{

    public function __construct(
        private RequestStack $requestStack,
        private PaintRepository       $paintRepository,
        private PaginatorInterface    $paginator
    )
    {
        
    }

    public function getPaginatedPaints(?Category $category = null): object
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getint('page', 1);
        $limit = 9;

       $paintsQuery = $this->paintRepository->findForPagination($category);

       return $this->paginator->paginate($paintsQuery, $page, $limit);
    }
    public function getPaginatedPaintsAdmin(?Category $category = null): object
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getint('page', 1);
        $limit = 20;

        $paintsQuery = $this->paintRepository->findForPagination($category);

        return $this->paginator->paginate($paintsQuery, $page, $limit);
    }
}