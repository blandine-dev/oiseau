<?php

namespace App\Controller;

use App\Entity\RechercheOiseau;
use App\Form\RechercheOiseauType;
use App\Repository\OiseauRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(OiseauRepository $repository, Request $request)
    {
        $oiseaux = $repository->findAll();
        return $this->render('oiseau/oiseaux.html.twig', [
            'oiseaux' => $oiseaux,
            'isLieu'=> false,
            'isVie' => false,
            'isAlimentation'=> false, 
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
     * @Route("/oiseaux", name="oiseauxTous")
     */
    public function listeOiseaux(OiseauRepository $repository,PaginatorInterface $paginatorInterface, Request $request)
    {
        $rechercheOiseau = new RechercheOiseau();
        $form = $this->createForm(RechercheOiseauType::class, $rechercheOiseau);
        $form->handleRequest($request);

        $oiseaux = $paginatorInterface->paginate(
            $repository->findAllWithPagination($rechercheOiseau), 
            $request->query->getInt('page', 1), /*page number*/
            20/*limit per page*/
        );

        return $this->render('oiseau/resultatTous.html.twig', [
            'oiseaux' => $oiseaux,
            "form" =>$form->createView(),
        ]);
    }

     /**
     * @Route("/oiseau/{id}", name="afficher_oiseau")
     */
    public function article(OiseauRepository $repository, $id)
    {
        $oiseau = $repository->find($id);
        return $this->render('oiseau/article.html.twig', [
           "oiseau" => $oiseau,
        ]);
    }

      /**
     * @Route("/oiseaux/{lieu}", name="oiseauxParLieu")
     */
    public function oiseauxLieu(OiseauRepository $repository, $lieu, PaginatorInterface $paginatorInterface, Request $request)
    {
        // $oiseaux = $repository->getOiseauxParPropriete('lieu', '=', $lieu);
            
            $oiseaux = $paginatorInterface->paginate(
            $repository->getOiseauxParProprieteWithPagination('lieu', '=', $lieu), 
            $request->query->getInt('page', 1), /*page number*/
            12 /*limit per page*/
        );
        
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
    public function oiseauxVie(OiseauRepository $repository, $vie, PaginatorInterface $paginatorInterface, Request $request)
    {
            $oiseaux = $paginatorInterface->paginate(
            $repository->getOiseauxParProprieteWithPagination('vie', '=', $vie), 
            $request->query->getInt('page', 1), /*page number*/
            12 /*limit per page*/
        );
        return $this->render('oiseau/resultat.html.twig', [
            'oiseaux' => $oiseaux,
            'isVie' => true,
            'isLieu' => false,
            'isAlimentation'=> false,
        ]);
    }

      /**
     * @Route("/oiseaux/alimentation/{alimentation}", name="oiseauxParAlimentation")
     */
    public function oiseauxAlimentation(OiseauRepository $repository, $alimentation,PaginatorInterface $paginatorInterface, Request $request)
    {
            $oiseaux = $paginatorInterface->paginate(
            $repository->getOiseauxParProprieteWithPagination('alimentation', '=', $alimentation), 
            $request->query->getInt('page', 1), /*page number*/
            12 /*limit per page*/
        );
        return $this->render('oiseau/resultat.html.twig', [
            'oiseaux' => $oiseaux,
            'isAlimentation' => true,
            'isLieu' => false,
            'isVie' => false
        ]);
    }

}
