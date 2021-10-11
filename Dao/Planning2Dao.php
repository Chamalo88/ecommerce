<?php

namespace Dao;

use Connexion;

use Model\Planning2;

class Planning2Dao extends BaseDao
{
    public function fetchAll()
    {
        $connexion = new Connexion();

        $resultat = $connexion->query(
            "SELECT id_planning, jour, cp, ville, detail_emplacement, horaires
                    
             FROM planning2
            
             "
        );

        $listePlanning2 = [];

        foreach ($resultat->fetchAll() as $lignePlanning2) {
            $planning2 = $this->transformeTableauEnObjet($lignePlanning2);
            $listePlanning2[] = $planning2;
        
        }

        return $listePlanning2;
    }



    public function findById($id_planning)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "SELECT * FROM planning2 WHERE id_planning = ?"
        );

        $requete->execute([$id_planning]);

        $tableauPlanning2 = $requete->fetch();

       
        if ($tableauPlanning2) {
            return $this->transformeTableauEnObjet($tableauPlanning2);
        } else {
            return false;
        }
    }

    public function modifierPlanning($id_planning, $cp, $ville, $detail_emplacement, $horaires)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "UPDATE planning2
             SET cp = ?, ville =?, detail_emplacment = ?, horaires = ?
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