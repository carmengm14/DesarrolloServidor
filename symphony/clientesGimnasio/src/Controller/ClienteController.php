<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;
use Symfony\Component\Routing\Annotation\Route;

class ClienteController extends AbstractController
{
    private $clientes = [

        1 => ["nombre" => "Carmen", "apellidos" => "García Monreal" , "email" => "carmeng@ieselcaminas.org", "telefono" => "601756498", "f_nacimiento" => "2003-10-02", "dni" => "20478596N", "n_cuenta" => "ES355785985598728578", "id_tarifa" => "jovenes"] ,

        2 => ["nombre" => "Maria", "apellidos" => "Fernandez Jimenez" , "email" => "mariaf@ieselcaminas.org", "telefono" => "524142432", "f_nacimiento" => "2003-08-22", "dni" => "15789840G", "n_cuenta" => "ES385785995598757578", "id_tarifa" => "jovenes"] ,

        5 => ["nombre" => "Elena", "apellidos" => "Miralles Monreal" , "email" => "elenamp@ieselcaminas.org", "telefono" => "627142432", "f_nacimiento" => "1965-10-02", "dni" => "20478598N", "n_cuenta" => "ES355785985598728578", "id_tarifa" => "adultos"] ,

        9 => ["nombre" => "Juan", "apellidos" => "Pallarés Felicidad" , "email" => "juanp@ieselcaminas.org", "telefono" => "824172432", "f_nacimiento" => "2003-10-02", "dni" => "20478596N", "n_cuenta" => "ES355785985598728578", "id_tarifa" => "jovenes"] 

    ];     


    /**
     * @Route("/cliente/{codigo}", name = "ficha_cliente")
     */
    //VER FICHA DE UN CLIENTE COMPLETA
    public function ficha_cliente($codigo){
        $resultado = ($this -> clientes[$codigo] ?? null);
        if ($resultado){
            $html = "<ul>";
                $html .= "<p>" . "ID CLIENTE = <strong>".$codigo . "</strong></p>";
                $html .= "<li><strong>" . "NOMBRE = </strong>" .$resultado['nombre'] . " " .$resultado['apellidos'] . "</li>";
                $html .= "<li><strong>" . "EMAIL = </strong>" . $resultado['email'] . "</li>";
                $html .= "<li><strong>" . "TELÉFONO = </strong>" . $resultado['telefono'] . "</li>";
                $html .= "<li><strong>" . "FECHA DE NACIMIENTO = </strong>" . $resultado['f_nacimiento'] . "</li>";
                $html .= "<li><strong>" . "DNI = </strong>" . $resultado['dni'] . "</li>";
                $html .= "<li><strong>" . "NÚMERO DE CUENTA = </strong>" . $resultado['n_cuenta'] . "</li>";
                $html .= "<li><strong>" . "TIPO DE TARIFA = </strong>" . $resultado['id_tarifa'] . "</li>";
                $html .= "</ul>";
                return new Response("<html><body>$html</body>");
        }else{
            return new Response("<html><body> Contacto $codigo no encontrado");
        }
    }

    //ESTE APARTADO SERÁ SOLO PARA LOS TRABAJADORES, YA QUE AL BUSCAR UN CLIENTE PODRÁN ENCONTRAR SUS DATOS MUCHO MÁS RÁPIDO

    /**
     * @Route("/clientes/buscar/{texto}", name = "buscar_cliente")
     */

     public function buscar($texto): Response{
        $resultados = array_filter($this->clientes, function($cliente) use($texto){
            return strpos($cliente["nombre"], $texto) !== FALSE;
        });
        
        if (count($resultados)) {
            $html = "<ul>";
            foreach($resultados as $id => $resultado){
                $html .= "<p>" . "ID CLIENTE = <strong>". $id . "</strong></p>";
                $html .= "<li><strong>" . "NOMBRE = </strong>" .$resultado['nombre'] . " " .$resultado['apellidos'] . "</li>";
                $html .= "<li><strong>" . "EMAIL = </strong>" . $resultado['email'] . "</li>";
                $html .= "<li><strong>" . "TELÉFONO = </strong>" . $resultado['telefono'] . "</li>";
                $html .= "<li><strong>" . "FECHA DE NACIMIENTO = </strong>" . $resultado['f_nacimiento'] . "</li>";
                $html .= "<li><strong>" . "DNI = </strong>" . $resultado['dni'] . "</li>";
                $html .= "<li><strong>" . "NÚMERO DE CUENTA = </strong>" . $resultado['n_cuenta'] . "</li>";
                $html .= "<li><strong>" . "TIPO DE TARIFA = </strong>" . $resultado['id_tarifa'] . "</li>";
                $html .= "</ul>";
                return new Response("<html><body>$html</body>");
        }}
        else{
            return new Response("<html><body> Contacto no encontrado");
        }
            }
        }
