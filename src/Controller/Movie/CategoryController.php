<?php

declare(strict_types=1);

namespace App\Controller\Movie;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\SecurityBundle\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'movie_category')]
    public function category(Category $category): Response
    {
        return $this->render('movie/category.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/discover', name: 'movie_discover')]
    public function discover(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('movie/discover.html.twig', [
            'categories' => $categories,
        ]);
    }
}
