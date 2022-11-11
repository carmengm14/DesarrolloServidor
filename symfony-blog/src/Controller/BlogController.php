<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    //CONTROLADOR PAGINA BLOG
    #[Route('/blog', name: 'blog')]
    public function about(): Response
    {
        return $this->render('page/blog.html.twig', []);
    }

    //CONTROLADOR PAGINA SINGLE_POST
    #[Route('/single-post', name: 'single-post')]
    public function single_post(): Response
    {
        return $this->render('page/single_post.html.twig', []);
    }
   
}

