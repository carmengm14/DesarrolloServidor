<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name = "inicio")
     */
    public function inicio(): Response
    {
        return $this -> render('inicio.html.twig');
    }

    /**
     * @Route("/novedades", name = "novedades")
     */
    public function novedades(): Response
    {
        return $this -> render('novedades.html.twig');
    }
}
