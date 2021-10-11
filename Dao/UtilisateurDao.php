<?php

namespace Dao;

use Connexion;

class UtilisateurDao extends BaseDao
{

    public function ajoutUtilisateur($nom, $prenom, $adresse, $cp, $ville, $tel, $email,$motDePasse, $admin)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "INSERT INTO utilisateur (nom, prenom, adresse , cp, ville, tel, email, motDepasse, admin )
             VALUES (?,?,?,?,?,?,?,?,?)"
        );

        $requete->execute(
            [
                $nom,
                $prenom,
                $adresse,
                $cp,
                $ville,
                $tel,
                $email,
                password_hash($motDePasse, PASSWORD_BCRYPT),
                $admin==0
            ]
        );
    }

    public function findByEmail($email)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "SELECT * FROM utilisateur WHERE email = ?"
        );

        $requete->execute([$email]);

        $tableauUtilisateur = $requete->fetch();

        //si un utilisateur a bien cet email
        if ($tableauUtilisateur) {
            return $this->transformeTableauEnObjet($tableauUtilisateur);
        } else {
            return false;
        }
    }
    
    public function findById($id_utilisateur)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "SELECT * FROM utilisateur WHERE id_utilisateur= ?"
        );

        $requete->execute([$id_utilisateur]);

        $tableauUtilisateur = $requete->fetch();

        //si un utilisateur a bien cet email
        if ($tableauUtilisateur) {
            return $this->transformeTableauEnObjet($tableauUtilisateur);
        } else {
            return false;
        }
    }

    public function modifierUtilisateur($id_utilisateur, $nom, $prenom, $adresse, $cp, $ville, $tel, $email)
    {
        $connexion = new Connexion();

      
            $requete = $connexion->prepare(
                "UPDATE utilisateur 
                SET nom = ?, prenom = ?, adresse = ?, cp = ?, ville = ?, tel = ?, email = ?
                WHERE id_utilisateur = ?"
            );
            $requete->execute(
                [$nom, $prenom, $adresse, $cp, $ville, $tel, $email, $id_utilisateur]
            );
       
    }
    public function modifierMdP($id_utilisateur, $motDePasse)
    {
        $connexion = new Connexion();

      
            $requete = $connexion->prepare(
                "UPDATE utilisateur 
                SET motDepasse = ?
                WHERE id_utilisateur = ?"
            );
            $requete->execute(
                [$motDePasse, $id_utilisateur]
            );
       
    }
}
