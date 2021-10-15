<?php

namespace Dao;

use Connexion;


use Model\Utilisateur;

class ProduitDao extends BaseDao
{



    public function ajouterProduit($nom, $description, $image, $prix, $stock)
    {

        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "INSERT INTO produit ( nom, description,image, prix, stock)
             VALUES (?,?,?,?,?)"
        );

        $requete->execute(
            [

                $nom,
                $description,
                $image,
                $prix,
                $stock
            ]
        );
    }

    public function modifierProduit($id_produit,  $nom, $description, $image, $prix, $stock)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "UPDATE produit 
             SET image = ?, nom =?, description = ?, prix = ?, stock =?
             WHERE id_produit = ?"
        );

        $requete->execute(
            [

                $nom,
                $description,
                $image,
                $prix,
                $stock,
                $id_produit
            ]
        );
    }

    public function findById($id_produit)
    {
        $connexion = new Connexion();

        $requete = $connexion->prepare(
            "SELECT * FROM produit WHERE id_produit = ?"
        );

        $requete->execute([$id_produit]);

        $tableauProduit = $requete->fetch();

        //si un produit a bien cet id
        if ($tableauProduit) {
            return $this->transformeTableauEnObjet($tableauProduit);
        } else {
            return false;
        }
    }

    public function fetchAll()
    {
        $connexion = new Connexion();

        $resultat = $connexion->query(
            "SELECT id_produit,  nom, description, image, prix, stock
                        
            FROM produit 
           
            "
        );

        $listeProduits = [];
        foreach ($resultat->fetchAll() as $ligneProduit) {
            $produit = $this->transformeTableauEnObjet($ligneProduit);
            $listeProduits[] = $produit;
        }

        return $listeProduits;
    }
}
