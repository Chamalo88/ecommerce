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

   
}
