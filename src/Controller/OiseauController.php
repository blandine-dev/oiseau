<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OiseauController extends AbstractController
{
     /**
     * @Route("/", name="home")
     */
    public function accueil()
    {
       
        return $this->render('oiseau/accueil.html.twig');
    }
    /**
     * @Route("/oiseau", name="oiseau")
     */
    public function index()
    {
        return $this->render('oiseau/index.html.twig', [
            'controller_name' => 'OiseauController',
        ]);
    }

     /**
     * @Route("/apropos", name="apropos")
     */
    public function apropos()
    {
       
        return $this->render('oiseau/apropos.html.twig');
    }

     /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
       
        return $this->render('oiseau/contact.html.twig');
    }
}
