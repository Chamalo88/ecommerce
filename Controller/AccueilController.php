<?php

namespace Controller;

use Controller\BaseController;
use Dao\ProduitDao;

class AccueilController extends BaseController
{

    public function index()
    {
        $this->afficherVue();
    }

    public function afficherTout()
    {
        $dao = new ProduitDao();

        $listeProduits = $dao->fetchAll();

        $donnees = compact('listeProduits');


        $this->afficherVue("liste-produits", $donnees);
    }
}
