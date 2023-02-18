<?php

namespace App\Controller;

use App\Entity\Pictures;
use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class PagesController extends AbstractController
{
    #[Route('/', name:'app_index')]
    public function index()
    {
        $name = null;
        return $this->render('pages/home.html.twig',[
            'name'=> $name
        ]);
    }

    #[Route('/?{name}', name: 'app_home')]
    public function Home(EntityManagerInterface $em, $name = null ): Response
    {
        
        if($name === 'graphisme' || $name === 'dessin' || $name === 'velo')
        {
            $category = $em->getRepository(Categories::class)-> findBy(['name'=> $name]);
            foreach($category as $e){
                $categoryId = $e->getId();
            }
            $pictures = $em->getRepository(Pictures::class)-> findBy(['Categories'=> $categoryId]);
        }else{

            $pictures = null;
        }

        
        return $this->render('pages/home.html.twig', [
            'pictures' => $pictures,
            'name' => $name
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
