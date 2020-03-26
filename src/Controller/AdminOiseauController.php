<?php

namespace App\Controller;

use App\Entity\Oiseau;
use App\Form\OiseauType;
use App\Repository\OiseauRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminOiseauController extends AbstractController
{
    /**
     * @Route("/admin/oiseau", name="admin_oiseau")
     */
    public function index(OiseauRepository $repository)
    {
        $oiseaux= $repository->findAll();
        return $this->render('admin_oiseau/adminOiseau.html.twig', [
            "oiseaux" => $oiseaux,
        ]);
    }

     /**
      * @Route("/admin/oiseau/creation", name="admin_oiseau_creation")
     * @Route("/admin/oiseau{id}", name="admin_oiseau_modification", methods="GET|POST")
     */
    public function ajoutEtModif(Oiseau $oiseau = null, Request $request, EntityManagerInterface $entityManager)
    {
        if(!$oiseau) {
            $oiseau = new Oiseau();
        }

        $form = $this->createForm(OiseauType::class, $oiseau);
       
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $modif = $oiseau->getId() !== null;
            $entityManager->persist($oiseau);
            $entityManager->flush();
            $this->addFlash("success", ($modif)? "La modification a été effectuée" : "L'ajout a été effectué");
            return $this->redirectToRoute('admin_oiseau');
        }

        return $this->render('admin_oiseau/ajoutEtModif.html.twig', [
            "oiseau" => $oiseau,
            "form" => $form->createView(),
            "isModification" =>$oiseau->getId() !== null
        ]);
    }

     /**
     * @Route("/admin/oiseau{id}", name="admin_oiseau_suppression", methods="delete")
     */
    public function suppression(Oiseau $oiseau, Request $request, EntityManagerInterface $entityManager){
        if($this->isCsrfTokenValid("SUP". $oiseau->getId(),$request->get('_token'))){
         $entityManager->remove($oiseau);
         $entityManager->flush();
         $this->addFlash("success", "La suppression a été effectuée");
         return $this->redirectToRoute('admin_oiseau');
        }
     }

}
