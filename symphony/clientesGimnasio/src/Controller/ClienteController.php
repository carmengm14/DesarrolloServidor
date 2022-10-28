<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clientes;
use DateTime;
use App\Entity\Tarifas;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\Date;

class ClienteController extends AbstractController
{
    /*private $clientes = [

        1 => ["nombre" => "Carmen", "apellidos" => "García Monreal" , "email" => "carmeng@ieselcaminas.org", "telefono" => "601756498", "f_nacimiento" => "2003-10-02", "dni" => "20478596N", "n_cuenta" => "ES355785985598728578", "tarifa_id" => "jovenes"] ,

        2 => ["nombre" => "Maria", "apellidos" => "Fernandez Jimenez" , "email" => "mariaf@ieselcaminas.org", "telefono" => "524142432", "f_nacimiento" => "2003-08-22", "dni" => "15789840G", "n_cuenta" => "ES385785995598757578", "tarifa_id" => "jovenes"] ,

        3 => ["nombre" => "Marta", "apellidos" => "Fernandez Jimenez" , "email" => "martaf@ieselcaminas.org", "telefono" => "524142572", "f_nacimiento" => "2003-08-22", "dni" => "16889840G", "n_cuenta" => "ES385785995598757578", "tarifa_id" => "jovenes"] ,

        5 => ["nombre" => "Elena", "apellidos" => "Miralles Monreal" , "email" => "elenamp@ieselcaminas.org", "telefono" => "627142432", "f_nacimiento" => "1965-10-02", "dni" => "20478598N", "n_cuenta" => "ES355785985598728578", "tarifa_id" => "adultos"] ,

        9 => ["nombre" => "Juan", "apellidos" => "Pallarés Felicidad" , "email" => "juanp@ieselcaminas.org", "telefono" => "824172432", "f_nacimiento" => "2003-10-02", "dni" => "20478596N", "n_cuenta" => "ES355785985598728578", "tarifa_id" => "jovenes"] 

    ];     */

//ESTA APARTADO ES PARA INSERTAR CLIENTES EN EL GIMNASIO 
/**
 * @Route("/clientes/insertarLocales", name="insertar_clienteLocal")
 */
public function insertar_clienteLocal(ManagerRegistry $doctrine){
    $entityManager = $doctrine-> getManager();
    foreach($this->clientes as $c){
        $cliente = new Clientes();
        $cliente-> setNombre($c["nombre"]);
        $cliente-> setApellidos($c["apellidos"]);
        $cliente-> setEmail($c["email"]);
        $cliente-> setTelefono($c["telefono"]);
        $cliente-> setFNacimiento(new \DateTime($c["FNacimiento"]));
        $cliente-> setDni($c["dni"]);
        $cliente-> setNCuenta($c["Ncuenta"]);
        $cliente-> setTarifas($c["tarifa_id"]);
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
       //var_dump($cliente);
       //exit;
       return $this->render('ficha_clientes.html.twig', ['cliente' => $cliente]);
    }

    //ESTE APARTADO SERÁ SOLO PARA LOS TRABAJADORES, YA QUE AL BUSCAR UN CLIENTE PODRÁN ENCONTRAR SUS DATOS MUCHO MÁS RÁPIDO

    /**
     * @Route("/clientes/buscar/{nombre}/{ape}", name = "buscar_cliente")
     */

     public function buscar(ManagerRegistry $doctrine,$nombre, $ape): Response{
       $repositorio = $doctrine->getRepository(Clientes::class);
       $clientes= $repositorio->findByNombreyApellido($nombre,$ape);
       
       return $this->render('lista_clientes.html.twig',['clientes' => $clientes]);
    }


    //MODIFICAR CONTACTO, AQUI SE CAMBIARÁ EL NOMBRE DEL CLIENTE QUE LE PASEMOS EL DNI, OSEA PONEMOS EL DNI Y EL NOMBRE NUEVO.
    /**
     * @Route("/clientes/update/{id}/{nombre}", name= "modificar_cliente")
     */
    public function modificar_cliente(ManagerRegistry $doctrine, $id, $nombre): Response{
        $entityManager = $doctrine -> getManager();
        $repositorio = $doctrine -> getRepository(Clientes::class);
        $cliente = $repositorio -> find($id);
        if ($cliente) {
            $cliente -> setNombre($nombre);
            try {
                $entityManager ->flush();
                return $this -> render('ficha_clientes.html.twig', [ 'cliente' => $cliente]);
            } catch (\Exception $e) {
                return new Response("ERROR ACTUALIZANDO AL CLIENTE"); 
            }
        }else{
            return $this -> render('ficha_clientes.html.twig', ['cliente' => null]);
        }
    }


    //ELIMINAR CONTACTO, AQUI SE ELIMINARÁ EL CLIENTE QUE LE PASEMOS EL id, OSEA PONEMOS EL id Y ADIÓS.
    /**
     * @Route("/clientes/delete/{id}", name= "eliminar_cliente")
     */
    public function eliminar_cliente(ManagerRegistry $doctrine, $id): Response{
        $entityManager = $doctrine -> getManager();
        $repositorio = $doctrine -> getRepository(Clientes::class);
        $cliente = $repositorio -> find($id);
        if ($cliente) {
            try {
                $entityManager ->remove($cliente);
                $entityManager ->flush();
                return new Response('CLIENTE ELIMINADO CORRECTAMENTE');
            } catch (\Exception $e) {
                return new Response("ERROR ELIMINANDO AL CLIENTE"); 
            }
        }else{
            return $this -> render('ficha_clientes.html.twig', ['cliente' => null]);
        }
    }

    //INSERTAR LOS CLIENTES CON LA TARIFA ESCOGIDA
    /**
     * @Route("/clientes/insertar", name= "insertar_cliente")
     */
    public function insertar_cliente (ManagerRegistry $doctrine): Response{
        $entityManager = $doctrine -> getManager();
        $tarifa = new Tarifas();
        
        $tarifa -> setTarifa("joven");
        $cliente = new Clientes();

        $cliente -> setNombre("Magdalena");
        $cliente -> setApellidos("Castilla Romero");
        $cliente -> setEmail("magdalenac@ieselcaminas.org");
        $cliente -> setTelefono("601741587");
        $cliente -> setNCuenta("ES157894582368459784");
        $cliente -> setFNacimiento(new DateTime("2002"));
        $cliente -> setDni("20484680R");
        $cliente -> setTarifas($tarifa);

        $entityManager -> persist($tarifa);
        $entityManager -> persist($cliente);
        
        $entityManager -> flush();
        return $this->render('ficha_clientes.html.twig',['cliente' => $cliente]);
    }
}