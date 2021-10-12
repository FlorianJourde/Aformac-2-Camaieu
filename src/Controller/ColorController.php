<?php

namespace App\Controller;

use App\Entity\Favorites;
use App\Entity\Palette;
use App\Entity\User;
use App\Form\FavoriteFormType;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController
{
  /**
   * @Route("/color/{id}", name="color")
   */
  public function index($id, Request $request): Response
  {
    $user = $this->getUser();
    $repository = $this->getDoctrine()->getRepository(Palette::class);
    $color = $repository->find($id);
    $colors = $repository->findAll();
    $favoriteRepository = $this->getDoctrine()->getRepository(Favorites::class);
    $favoriteColors = $favoriteRepository->findAll();

    // $colorReference = [];
    // for (color)
    // $colors = $repository->findByColor($color);

    $favorite = new Favorites;
    $form = $this->createForm(FavoriteFormType::class, $favorite);
    $form->handleRequest($request);

    // $addFavorite = addColorId($this);

    if ($user != null) {
      $userId = $user->getId();
    }
    
    $colorId = $color->getId();
    
    // if ($form->isSubmitted() && $form->isValid()) {
    //   $favorite = $form->getData();
    //   $form->user_id = $userId;
    //   $form->color_id = $colorId;
    //   $entityManager = $this->getDoctrine()->getManager();
    //   $entityManager->persist($favorite);
    //   $entityManager->flush();
    //   return $this->redirectToRoute('index');
    // }

    return $this->render('color/index.html.twig', [
      'controller_name' => 'ColorController',
      // 'addFavorite' => $addFavorite,
      'color' => $color,
      'colors' => $colors,
      'favoriteColors' => $favoriteColors,

      // 'form' => $form->createView(),
    ]);
  }
}
