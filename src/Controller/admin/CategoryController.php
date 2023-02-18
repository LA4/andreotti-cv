<?php

namespace App\Controller\admin;

use App\Entity\Categories;
use App\Entity\Pictures;
use App\Form\CategoryType;
use App\Repository\CategoriesRepository;
use App\Repository\PicturesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/categories', name: 'app_admin_category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'add')]
    public function category(
        EntityManagerInterface $em,
        Request $request,
        CategoriesRepository $categoriesRepository): Response
    {
        $category = new Categories();
        $formCategories = $this->createForm(CategoryType::class, $category);
        
        $formCategories -> handleRequest($request);
        if($formCategories-> isSubmitted() && $formCategories-> isValid() )
        {
            $category = $formCategories ->getData();
            $em -> persist($category);
            $em -> flush();

            $this -> addFlash('succes','c\'est enregistré');

            return $this-> redirectToRoute('app_admin_category_add');
        }

        $categories = $categoriesRepository->findAll();

        return $this->render('admin/category.html.twig', [
            'form' => $formCategories ->createView(),
            'categories' => $categories
        ]);
    }

    #[Route('/categories/{id}/supprimer',name:'delete')]
    public function DeleteCategory(EntityManagerInterface $em, Categories $category)
    {
        $em -> remove($category);
        $em -> flush();

         return $this->redirectToRoute('app_admin_category_add');
    }

    #[Route('/{name}',name:'show')]
    public function show(CategoriesRepository $categoriesRepository,$name)
    {

        $category = $categoriesRepository-> findBy(['name'=> $name]);


        return $this->render('admin/category-pictures.html.twig', [
            'category' => $category,
        ]);
    }
}
