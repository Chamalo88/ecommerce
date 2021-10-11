<?php

namespace Dao;

use Connexion;

use Model\Planning;

class PlanningoccazDao extends BaseDao
{
    public function fetchAll()
    {
        $connexion = new Connexion();

        $resultat = $connexion->query(
            "SELECT id_planning, jour,date, cp, ville, detail_emplacement, horaires, information
                    
             FROM planningoccaz
            
             "
        );

        $listePlanningOccaz = [];

        foreach ($resultat->fetchAll() as $lignePlanningOccaz) {
            $planningOccaz = $this->transformeTableauEnObjet($lignePlanningOccaz);
            $listePlanningOccaz[] = $planningOccaz;
        
        }

        return $listePlanningOccaz;
    }
    public function findById($id_planning)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "SELECT * FROM planningoccaz WHERE id_planning = ?"
        );

        $requete->execute([$id_planning]);

        $tableauPlanning = $requete->fetch();

        //si un produit a bien cet id
        if ($tableauPlanning) {
            return $this->transformeTableauEnObjet($tableauPlanning);
        } else {
            return false;
        }
    }

    public function modifierPlanning($id_planning,$jour, $date, $cp, $ville, $detail_emplacement, $horaires, $information)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "UPDATE planningoccaz
             SET jour= ?, date = ? , cp = ?, ville =?, detail_emplacement = ?, horaires = ?, information =?
             WHERE id_planning = ?"
        );

        $requete->execute(
            [
                $jour,
                $date,
                $cp, 
                $ville, 
                $detail_emplacement, 
                $horaires,
                $information,
                $id_planning
            ]
        );
    }
    public function ajouter($jour, $date, $cp, $ville, $detail_emplacement, $horaires, $information)
    {

        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "INSERT INTO planningoccaz (jour, date, cp, ville,detail_emplacement, horaires, information)             
            VALUES (?,?,?,?,?,?,?)"
        );

        $requete->execute(
            [
                $jour,
                $date, 
                $cp, 
                $ville, 
                $detail_emplacement, 
                $horaires, 
                $information
            ]
        );
    }
}