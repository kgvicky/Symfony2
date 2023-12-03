<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\SeriesRepository;

class CategoryController extends AbstractController
{
    private $categoryRepository;
    private $seriesRepository;

    public function __construct(CategoryRepository $categoryRepository, SeriesRepository $seriesRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->seriesRepository = $seriesRepository;
    }

    /**
     * @Route("/category/", name="category_index")
     */
    public function index(): Response
    {
        $categories = $this->categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{categoryName}", name="category_show")
     */
    public function show(string $categoryName): Response
    {
        $category = $this->categoryRepository->findOneBy(['name' => $categoryName]);

        if (!$category) {
            throw $this->createNotFoundException("Aucune catégorie nommée $categoryName");
        }

        $series = $this->seriesRepository->findByCategory($category, 3);

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'series' => $series,
        ]);
    }
}


