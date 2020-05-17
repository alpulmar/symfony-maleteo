<?php

namespace App\Controller;

/*use symfony\Component\HttpFoundation\Response;*/
use symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface as ORMEntityManagerInterface;

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

  /**
   * @Route("/maleteo/usuarios")
   */
  public function newUsuario(ORMEntityManagerInterface $em){
    
    $usuario = new Usuario();
    $usuario -> setNombre(nombre:"");
    $usuario -> setEmail(email:"");
    $usuario -> setUsername(username:"");
    $usuario -> setPassword(password:"");
    $usuario -> setDireccion(direccion:"");
    $usuario -> setTelefono(telefono:"");
    $usuario -> setCiudad(ciudad:"");
    $usuario -> setPrivacidad(privacidad:"");

    $em -> persist($usuario);

    $usuario2 = new UsuarioDemo();
    $usuario2 -> setNombre(nombre:"");
    $usuario2 -> setEmail(email:"");
    $usuario2 -> setUsername(username:"");
    $usuario2 -> setPassword(password:"");
    $usuario2 -> setDireccion(direccion:"");
    $usuario2 -> setTelefono(telefono:"");
    $usuario2 -> setCiudad(ciudad:"");
    $usuario2 -> setPrivacidad(privacidad:"");

    $em -> persist($usuario2);

    $usuario3 = new Usuario();
    $usuario3 -> setNombre(nombre:"");
    $usuario3 -> setEmail(email:"");
    $usuario3 -> setUsername(username:"");
    $usuario3 -> setPassword(password:"");
    $usuario3 -> setDireccion(direccion:"");
    $usuario3 -> setTelefono(telefono:"");
    $usuario3 -> setCiudad(ciudad:"");
    $usuario3 -> setPrivacidad(privacidad:"");

    $em -> persist($usuario3);
    
    $em -> flush();

    return $this -> render(view:"usuarios.html.twig");
  }

  /**
   * @Route("/maleteo/demos")
   */
  public function newUsuarioDemo(ORMEntityManagerInterface $em){
    
    $usuarioDemo = new UsuarioDemo();
    $usuarioDemo -> setNombre(nombre:"");
    $usuarioDemo -> setEmail(email:"");
    $usuarioDemo -> setCiudad(ciudad:"");
    $usuarioDemo -> setPrivacidad(privacidad:"");

    $em -> persist($usuarioDemo);

    $usuarioDemo2 = new UsuarioDemo();
    $usuarioDemo2 -> setNombre(nombre:"");
    $usuarioDemo2 -> setEmail(email:"");
    $usuarioDemo2 -> setCiudad(ciudad:"");
    $usuarioDemo2 -> setPrivacidad(privacidad:"");

    $em -> persist($usuarioDemo3);

    $usuarioDemo3 = new UsuarioDemo();
    $usuarioDemo3 -> setNombre(nombre:"");
    $usuarioDemo3 -> setEmail(email:"");
    $usuarioDemo3 -> setCiudad(ciudad:"");
    $usuarioDemo3 -> setPrivacidad(privacidad:"");

    $em -> persist($usuarioDemo3);
    
    $em -> flush();

    return $this -> render(view:"demos.html.twig");
  }

  /**
   * @Route("/maleteo/comentarios")
   */
  public function newOpinion(ORMEntityManagerInterface $em){
    
    $opinion = new Opinion();
    $opinion -> setAutor(autor:"return $this -> render(view:"opiniones.html.twig");");
    $opinion -> setCiudad(ciudad:"");
    $opinion -> setComentario(comentario:"");
    $opinion -> setPrivacidad(privacidad:"");

    $em -> persist($opinion);

    $opinion2 = new Opinion();
    $opinion2 -> setAutor(autor:"");
    $opinion2 -> setCiudad(ciudad:"");
    $opinion2 -> setComentario(comentario:"");
    $opinion2 -> setPrivacidad(privacidad:"");

    $em -> persist($opinion2);

    $opinion3 = new Opinion();
    $opinion3 -> setAutor(autor:"");
    $opinion3 -> setCiudad(ciudad:"");
    $opinion3 -> setComentario(comentario:"");
    $opinion3 -> setPrivacidad(privacidad:"");

    $em -> persist($opinion3);
    
    $em -> flush();

    return $this -> render(view:"comentarios.html.twig");
  }

  /**
   * @Route("maleteo/usuarios")
   */
  public function listUsuarios(ORMEntityManagerInterface $em){
    
    $repository = $em -> getRepository(className:Usuario::class);

    $usuario = $repository -> findAll();

    return $this -> render(view:"usuarios.html.twig"
        ["usuarios" -> $usuario]
    );
  }

  /**
   * @Route("maleteo/demos")
   */
  public function listDemos(ORMEntityManagerInterface $em){
    
    $repository = $em -> getRepository(className:UsuarioDemo::class);

    $usuarioDemo = $repository -> findAll();

    return $this -> render(view:"demos.html.twig"
        ["usuarioDemos" -> $usuarioDemo]
    );
  }

  /**
   * @Route("maleteo/comentarios")
   */
  public function listOpiniones(ORMEntityManagerInterface $em){
    
    $repository = $em -> getRepository(className:Opinion::class);

    $opinion = $repository -> findAll();

    return $this -> render(view:"comentarios.html.twig"
        ["opiniones" -> $opinion]
    );
  }
}