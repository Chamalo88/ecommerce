<?php

namespace Dao;

use Connexion;

use Model\Planning;

class PlanningDao extends BaseDao
{
    public function fetchAll()
    {
        $connexion = new Connexion();

        $resultat = $connexion->query(
            "SELECT id_planning, jour, cp, ville, detail_emplacement, horaires
                    
             FROM planning
            
             "
        );

        $listePlanning = [];

        foreach ($resultat->fetchAll() as $lignePlanning) {
            $planning = $this->transformeTableauEnObjet($lignePlanning);
            $listePlanning[] = $planning;
        
        }

        return $listePlanning;
    }
    public function findById($id_planning)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "SELECT * FROM planning WHERE id_planning = ?"
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

    public function modifierPlanning($id_planning, $cp, $ville, $detail_emplacement, $horaires)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "UPDATE planning
             SET cp = ?, ville =?, detail_emplacement = ?, horaires = ?
             WHERE id_planning = ?"
        );

        $requete->execute(
            [   
                $cp, 
                $ville, 
                $detail_emplacement, 
                $horaires,
                $id_planning
            ]
        );
    }



}



