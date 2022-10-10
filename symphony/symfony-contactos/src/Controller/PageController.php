<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
    * #[Route('/page', name: 'app_page')]
    */
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/", name = "inicio")
     */
    public function inicio(){
        return $this->render('inicio.html.twig');

    }

    /**
     * el anterior controlador es lo mismo que este solo que llama 
     * a una pagina para decir el contenido mientras que este lo escribe 
     * directamente.
     * 
     * @Route("/", name = "inicio")
     *
     * public function inicio(): Response{
     * return new Response("Bienvenido a la web de contactos");
     * return $this->render('inicio.html.twig');
     * }
     */
}

