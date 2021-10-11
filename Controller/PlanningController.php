<?php

namespace Controller;

use Config;
use Controller\BaseController;
use Dao\Planning2Dao;
use Dao\PlanningDao;
use Dao\PlanningoccazDao;
use Model\Planning2;
use Model\Planning;

class PlanningController extends BaseController
{  
  

    public function afficherTout()
    {
        $dao = new PlanningDao();
             $listePlanning = $dao->fetchAll();
        $dao = new Planning2Dao();
            $listePlanning2 = $dao->fetchAll();
        $dao = new PlanningoccazDao();
            $listePlanningOccaz = $dao->fetchAll();

            $donnees = compact('listePlanning','listePlanning2','listePlanningOccaz',);

        $this->afficherVue("emplacement", $donnees);
    }

    public function modifier($parametres)
    {
        $modification = true;
        $id_planning = $parametres[0];
        $cp= "";
        $ville = "";
        $detail_emplacement = "";
        $horaires = "";
        

        $daoPlanning = new planningDao();
        if (isset($_POST["cp"])) {

            $daoPlanning->modifierPlanning($id_planning, 
            $_POST['cp'],
            $_POST['ville'],
            $_POST['detail_emplacement'],
            $_POST["horaires"]
            );

            $this->afficherMessage("Le planning paire a bien été modifiée");

            
        }

        $Planning = $daoPlanning->findById($id_planning);
        $cp = $Planning->getCp();
        $ville = $Planning->getVille();
        $detail_emplacement = $Planning->getDetailEmplacement();
        $horaires = $Planning->getHoraires();

        $listePlanning = $daoPlanning->fetchAll($id_planning);


        $donnees = compact(
            "id_planning",
            "modification",
            "cp",
            "ville",
            "detail_emplacement",
            "horaires",
            "listePlanning"
            
        );

        $this->afficherVue("editer_planning", $donnees);
    }

   
    public function modifier2($parametres)
    {
        $modification = true;
        $id_planning = $parametres[0];
        $cp= "";
        $ville = "";
        $detail_emplacement = "";
        $horaires = "";
        

      
        $daoPlanning = new planning2Dao();
        if (isset($_POST["cp"])) {

            $daoPlanning->modifierPlanning($id_planning, 
            $_POST['cp'],
            $_POST['ville'],
            $_POST['detail_emplacement'],
            $_POST["horaires"]
            );

            $this->afficherMessage("Le planning impaire a bien été modifiée");

            
        }

       

        $Planning2 = $daoPlanning->findById($id_planning);
        $cp = $Planning2->getCp();
        $ville = $Planning2->getVille();
        $detail_emplacement = $Planning2->getDetailEmplacement();
        $horaires = $Planning2->getHoraires();
        




        $listePlanning = $daoPlanning->fetchAll($id_planning);


        $donnees = compact(
            "id_planning",
            "modification",
            "cp",
            "ville",
            "detail_emplacement",
            "horaires",
            "listePlanning"
            
        );

        $this->afficherVue("editer_planning", $donnees);
    }

    public function modifier3($parametres)
    {
        $modification = true;
        $id_planning = $parametres[0];
        $jour="";
        $date="";
        $cp= "";
        $ville = "";
        $detail_emplacement = "";
        $horaires = "";
        $information ="";
        

      
        $daoPlanningOccaz = new planningOccazDao();
        if (isset($_POST["cp"])) {

            $daoPlanningOccaz->modifierPlanning($id_planning, 
            $_POST['jour'],
            $_POST['date'],
            $_POST['cp'],
            $_POST['ville'],
            $_POST['detail_emplacement'],
            $_POST["horaires"],
            $_POST['information']
            );

            $this->afficherMessage("Le planning occasionnel a bien été modifiée");

            
        }
 

        $PlanningOccaz = $daoPlanningOccaz->findById($id_planning);
        $jour = $PlanningOccaz->getJour();
        $date = $PlanningOccaz->getDate();
        $cp = $PlanningOccaz->getCp();
        $ville = $PlanningOccaz->getVille();
        $detail_emplacement = $PlanningOccaz->getDetailEmplacement();
        $horaires = $PlanningOccaz->getHoraires();
        $information = $PlanningOccaz->getInformation();
        




        $listePlanning = $daoPlanningOccaz->fetchAll($id_planning);


        $donnees = compact(
            "id_planning",
            "modification",
            "jour",
            "date",
            "cp",
            "ville",
            "detail_emplacement",
            "horaires",
            "information",
            "listePlanning"
            
        );

        $this->afficherVue("editer_planning2", $donnees);
    }

    public function ajouteroccaz()
    {
        $jour ="";
        $date="";
        $cp = "";
        $ville = "";
        $detail_emplacement = "";
        $horaires="";
        $information="";

        if (isset($_POST["cp"])) {

            $dao = new PlanningOccazDao();

            $dao->ajouter($_POST['jour'],
            $_POST['date'],
            $_POST['cp'],
            $_POST['ville'],
            $_POST['detail_emplacement'],
            $_POST['horaires'],
            $_POST['information']
        );

            $this->afficherMessage("Votre evenement occasionnel a bien été ajoutée", "success");
            $this->redirection("planning/afficherTout");
        }

        $donnees = compact( "jour","date", "cp", "ville", "detail_emplacement", "horaires", "information");
        $this->afficherVue("ajoutemplacement", $donnees);
    }

    public function supprimer($parametres)
    {
        $id_planning = $parametres[0];

        if (isset($_POST["confirmation"])) {

            $dao = new PlanningOccazDao();
            $dao->deleteById($id_planning);
            $this->afficherMessage("L'évenement a bien été supprimée");
            $this->redirection("planning/afficherTout");
        }

        $this->afficherVue("confirmation-suppression");
    }



}