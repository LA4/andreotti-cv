<?php

namespace App\Controller\admin;

use App\Entity\Pictures;
use App\Form\PictureType;
use App\Repository\CategoriesRepository;
use App\Repository\PicturesRepository;
use App\Services\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/admin/images', name: 'app_admin_pictures_')]
class PictureController extends AbstractController
{
    #[Route('/', name: 'add')]
    public function pictures(
        EntityManagerInterface $em,
        Request $request,
        PicturesRepository $picturesRepository,
        SluggerInterface $slugger,
        CategoriesRepository $categoriesRepository
        ): Response
    {

        $picture = new Pictures();
        $formPicture = $this->createForm(PictureType::class,$picture);

        $formPicture -> handleRequest($request);
        if($formPicture -> isSubmitted() && $formPicture -> isValid())
        {
            $fileName = $formPicture->get('filename')->getData();
            if ($fileName) {

                $originalFilename = pathinfo($fileName->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$fileName->guessExtension();

                try {
                    $fileName->move(
                        $this->getParameter('image_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }
            $picture->setFilename($newFilename);

            $picture = $formPicture -> getData();
            $em->persist($picture);
            $em-> flush();

            $this->addFlash(
               'success',
               'c\'est bien enregistr??'
            );
            return $this->redirectToRoute('app_admin_pictures_add');
        }

        $pictures = $picturesRepository->findAll();
        $category = $categoriesRepository->findAll();

        return $this->render('admin/pictures.html.twig', [
            'formPicture' => $formPicture->createView(),
            'pictures'    => $pictures,
            'category' => $category,
        ]);
    }

    #[route('/voir/{id}', name: 'show')]
    public function shox($id, PicturesRepository $picturesRepository)
    {
        $image = $picturesRepository->findOneBy(['id'=>$id]);

        return $this->render('admin/pictures.show.html.twig', [
            'image' => $image
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Pictures $picture, EntityManagerInterface $em)
    {
        $pictureToDelete = $this->getParameter('image_directory') . "/" . $picture->getFilename();
        $succes = false;
        if(file_exists($pictureToDelete))
        {
            unlink($pictureToDelete);
            $succes = true;
        }
        if($succes)
        {
            $em->remove($picture);
            $em->flush();

            $this -> addFlash('succes','c\'est supprim??');

            return $this-> redirectToRoute('app_admin_home');
        }
        
      return $this-> redirectToRoute('app_admin_pictures_add');
    }
}
