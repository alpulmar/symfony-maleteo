<?php

namespace App\Controller;

/*use symfony\Component\HttpFoundation\Response;*/
use symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController{
  /**
   * @Route("/maleteo")
   */
  public function index(){
    return $this -> render('base.html.twig');
  }

  /**
   * @Route("/maleteo/login")
   */
  public function acceder(){
    return $this -> render('login.html.twig');
  }

  /**
   * @Route("/maleteo/register")
   */
  public function registrarse(){
    return $this -> render('register.html.twig');
  }

  /**
   * @Route("/maleteo/comentar")
   */
  public function comentar(){
    return $this -> render('opinion.html.twig');
  }
}