<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OiseauController extends AbstractController
{
    /**
     * @Route("/oiseau", name="oiseau")
     */
    public function index()
    {
        return $this->render('oiseau/index.html.twig', [
            'controller_name' => 'OiseauController',
        ]);
    }
}
