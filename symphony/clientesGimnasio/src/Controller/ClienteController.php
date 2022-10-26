<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clientes;
use Doctrine\Persistence\ManagerRegistry;

class ClienteController extends AbstractController
{
    /*private $clientes = [

        1 => ["nombre" => "Carmen", "apellidos" => "García Monreal" , "email" => "carmeng@ieselcaminas.org", "telefono" => "601756498", "f_nacimiento" => "2003-10-02", "dni" => "20478596N", "n_cuenta" => "ES355785985598728578", "id_tarifa" => "jovenes"] ,

        2 => ["nombre" => "Maria", "apellidos" => "Fernandez Jimenez" , "email" => "mariaf@ieselcaminas.org", "telefono" => "524142432", "f_nacimiento" => "2003-08-22", "dni" => "15789840G", "n_cuenta" => "ES385785995598757578", "id_tarifa" => "jovenes"] ,

        3 => ["nombre" => "Marta", "apellidos" => "Fernandez Jimenez" , "email" => "martaf@ieselcaminas.org", "telefono" => "524142572", "f_nacimiento" => "2003-08-22", "dni" => "16889840G", "n_cuenta" => "ES385785995598757578", "id_tarifa" => "jovenes"] ,

        5 => ["nombre" => "Elena", "apellidos" => "Miralles Monreal" , "email" => "elenamp@ieselcaminas.org", "telefono" => "627142432", "f_nacimiento" => "1965-10-02", "dni" => "20478598N", "n_cuenta" => "ES355785985598728578", "id_tarifa" => "adultos"] ,

        9 => ["nombre" => "Juan", "apellidos" => "Pallarés Felicidad" , "email" => "juanp@ieselcaminas.org", "telefono" => "824172432", "f_nacimiento" => "2003-10-02", "dni" => "20478596N", "n_cuenta" => "ES355785985598728578", "id_tarifa" => "jovenes"] 

    ];     */

//ESTA APARTADO ES PARA INSERTAR CLIENTES EN EL GIMNASIO 
/**
 * @Route("/clientes/insertar", name="insertar_cliente")
 */
public function insertar_cliente(ManagerRegistry $doctrine){
    $entityManager = $doctrine-> getManager();
    foreach($this->clientes as $c){
        $cliente = new Clientes();
        $cliente-> setNombre($c["nombre"]);
        $cliente-> setApellidos($c["apellidos"]);
        $cliente-> setEmail($c["email"]);
        $cliente-> setTelefono($c["telefono"]);
        $cliente-> setFNacimiento(new \DateTime($c["f_nacimiento"]));
        $cliente-> setDni($c["dni"]);
        $cliente-> setNCuenta($c["n_cuenta"]);
        $cliente-> setIdTarifa($c["id_tarifa"]);
        $entityManager->persist($cliente);
    }
    try{
        $entityManager->flush();
        return new Response("Clientes insertado correctamente");
    }catch(\Exception $e){
        return new Response("ERROR AL INSERTAR AL CLIENTE" ."<br>" . $e->getMessage());
    }
}


    /**
     * @Route("/clientes/{codigo<\d+>?1}", name = "ficha_cliente")
     */
    //VER FICHA DE UN CLIENTE COMPLETA
    public function ficha_cliente(ManagerRegistry $doctrine, $codigo): Response{
       $repositorio = $doctrine->getRepository(Clientes::class);
       $cliente = $repositorio->find($codigo);
       
       return $this->render('ficha_clientes.html.twig', ['cliente' => $cliente]);
    }

    //ESTE APARTADO SERÁ SOLO PARA LOS TRABAJADORES, YA QUE AL BUSCAR UN CLIENTE PODRÁN ENCONTRAR SUS DATOS MUCHO MÁS RÁPIDO

    /**
     * @Route("/clientes/buscar/{nombre}/{ape}", name = "buscar_cliente")
     */

     public function buscar($nombre, $ape): Response{
        $resultados = array_filter($this->clientes, function($cliente) use($nombre, $ape){
            if (strpos($cliente["nombre"], $nombre) !== FALSE){
                return (strpos($cliente["apellidos"], $ape) !== FALSE);
            }else{
             return false;
            }
        });
        
        return $this ->render('lista_clientes.html.twig', ['clientes' => $resultados]);
        }


    }
