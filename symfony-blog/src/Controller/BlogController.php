<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;
use App\Form\PostFormType;
use App\Form\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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

    //CONTROLADOR PÁGINA NEW POST
    #[Route('/blog/new', name: 'new_post')]
    public function newPost(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger): Response
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();   
            $post->setSlug($slugger->slug($post->getTitle()));
            $post->setPostUser($this->getUser());
            $post->setNumLikes(0);
            $post->setNumComments(0);
            $entityManager = $doctrine->getManager();    
            $entityManager->persist($post);
            $entityManager->flush();
            return $this->render('blog/new_post.html.twig', array(
                'form' => $form->createView()    
            ));
        }
        return $this->render('blog/new_post.html.twig', array(
            'form' => $form->createView()    
        ));
    }
/*
    //CONTROLADOR SINGLE POST CON IDENTIFICADOR
    #[Route('/single_post/{slug}', name: 'single_post')]
    public function post(ManagerRegistry $doctrine, $slug): Response
    {
        $repositorio = $doctrine->getRepository(Post::class);
        $post = $repositorio->findOneBy(["slug"=>$slug]);
        return $this->render('blog/single_post.html.twig', [
            'post' => $post,
        ]);
        return $this->redirectToRoute('single_post', ["slug" => $post->getSlug()]);
    }
    */



}

