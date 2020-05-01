<?php

namespace App\Entity;

class RechercheOiseau {
    private $oiseauNom;

    public function getOiseauNom(){
        return $this->oiseauNom;

    }

    public function setOiseauNom($nom){
        $this->oiseauNom = $nom;
        return $this;
    }
}