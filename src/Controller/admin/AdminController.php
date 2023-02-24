<?php

namespace App\Controller\admin;

use App\Repository\PicturesRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[route('/admin', name:'app_admin_')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function admin(CategoriesRepository $categoriesRepository, PicturesRepository $picturesRepository): Response
    {
        $categories = $categoriesRepository->findAll();
        $pictures = $picturesRepository->findAll();


        return $this->render('admin/index.html.twig', [
            'categories' => $categories,
            'pictures' => $pictures
        ]);
    }
  
}
