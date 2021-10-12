<?php

namespace App\Controller;

use App\Entity\Favorites;
use App\Entity\Palette;
use App\Form\FavoriteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavoritesController extends AbstractController
{
  /**
   * @Route("/favorites", name="favorites")
   */
  // public function index(): Response
  // {
  //   // $repository = $this->getDoctrine()->getRepository(Palette::class);
  //   // $color = $repository->find($id);
  //   // dump($color);

  //   return $this->render('favorites/index.html.twig', [
  //     'controller_name' => 'FavoritesController',
  //   ]);
  // }
  public function like(Request $request): Response
  {
    $favorite = new Favorites();
    $form = $this->createForm(FavoriteFormType::class, $favorite);
    $form->handleRequest($request);

    // $user = $this->getUser();
    $repository = $this->getDoctrine()->getRepository(Palette::class);
    $favoriteRepository = $this->getDoctrine()->getRepository(Favorites::class);
    // $color = $repository->find($id);
    $colors = $repository->findAll();
    $favoriteColors = $favoriteRepository->findAll();

    if ($form->isSubmitted() && $form->isValid()) {
      $favorite = $form->getData();

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($favorite);
      $entityManager->flush();

      return $this->redirectToRoute('index');
    }

    // if ($form->isSubmitted() && $form->isValid()) {
    //   // encode the plain password
    //   $user->setPassword(
    //     $passwordEncoder->encodePassword(
    //       $user,
    //       $form->get('plainPassword')->getData()
    //     )
    //   );

    //   $entityManager = $this->getDoctrine()->getManager();
    //   $entityManager->persist($user);
    //   $entityManager->flush();
    //   // do anything else you need here, like send an email

    //   return $this->redirectToRoute('index');
    // }

    return $this->render('favorites/index.html.twig', [
      // 'color' => $color,
      'colors' => $colors,
      'favoriteColors' => $favoriteColors,
      'form' => $form->createView(),
    ]);
  }
}
