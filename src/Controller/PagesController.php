<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('pages/home.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    
    #[Route('/cv', name: 'app_cv')]
    public function cv(): Response
    {
        return $this->render('pages/cv.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    
    #[Route('/aPropos', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('pages/about.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/projets', name: 'app_projects')]
    public function project(): Response
    {
        return $this->render('pages/projects.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
}
