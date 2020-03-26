<?php

namespace App\Controller;

use App\Repository\OiseauRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @Route("/recherche", name="oiseaux")
     */
    public function index()
    {
       
        
        return $this->render('oiseau/oiseaux.html.twig', [
            // 'oiseaux' => $oiseaux,
            'isLieu' => false,
            'isVie' => false,
            'isAlimentation'=> false    
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
    /**
     * @Route("/oiseaux", name="oiseauxTous")
     */
    public function listeOiseaux(OiseauRepository $repository)
    {
       
        $oiseaux = $repository->findAll();
        return $this->render('oiseau/resultat.html.twig', [
            'oiseaux' => $oiseaux,
    
        ]);
    }

     /**
     * @Route("/oiseau/{id}", name="afficher_oiseau")
     */
    public function article(OiseauRepository $repository, $id)
    {
        $oiseau = $repository->find($id);
        return $this->render('oiseau/article.html.twig', [
           "oiseau" => $oiseau
        ]);
    }

      /**
     * @Route("/oiseaux/{lieu}", name="oiseauxParLieu")
     */
    public function oiseauxLieu(OiseauRepository $repository, $lieu)
    {
        $oiseaux = $repository->getOiseauxParPropriete('lieu', '=', $lieu);
        return $this->render('oiseau/resultat.html.twig', [
            'oiseaux' => $oiseaux,
            'isLieu' => true,
            'isVie' => false,
            'isAlimentation'=> false
        ]);
    }
      /**
     * @Route("/oiseaux/vie/{vie}", name="oiseauxParVie")
     */
    public function oiseauxVie(OiseauRepository $repository, $vie)
    {
        $oiseaux = $repository->getOiseauxParPropriete('vie', '=', $vie);
        return $this->render('oiseau/resultat.html.twig', [
            'oiseaux' => $oiseaux,
            'isVie' => true,
            'isLieu' => false,
            'isAlimentation'=> false
        ]);
    }

      /**
     * @Route("/oiseaux/alimentation/{alimentation}", name="oiseauxParAlimentation")
     */
    public function oiseauxAlimentation(OiseauRepository $repository, $alimentation)
    {
        $oiseaux = $repository->getOiseauxParPropriete('alimentation', '=', $alimentation);
        return $this->render('oiseau/resultat.html.twig', [
            'oiseaux' => $oiseaux,
            'isAlimentation' => true,
            'isLieu' => false,
            'isVie' => false
        ]);
    }
}
