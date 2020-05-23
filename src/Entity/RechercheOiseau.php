<?php

namespace App\Entity;


class RechercheOiseau {
    private $oiseauMotcl;

    public function getOiseauMotcl(){
        return $this->oiseauMotcl;
    }

    public function setOiseauMotcl($motcl){
        $this->oiseauMotcl = $motcl;
        return $this;
    }

}
