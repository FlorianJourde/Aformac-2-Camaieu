<?php

namespace App\Controller;


use App\Entity\Favorites;
use App\Entity\Palette;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Palette::class);
        $colors = $repository->findAll();
        $favoriteRepository = $this->getDoctrine()->getRepository(Favorites::class);
        $favoriteColors = $favoriteRepository->findAll();
        // dump($colors);

        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
            'colors' => $colors,
            'favoriteColors' => $favoriteColors,
        ]);
    }
}
