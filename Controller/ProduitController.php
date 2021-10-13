<?php

namespace Controller;

use Controller\BaseController;
use Dao\ProduitDao;


class ProduitController extends BaseController
{
   public function afficherTout()
   {
      $dao = new ProduitDao();

      $listeProduits = $dao->fetchAll();

      $donnees = compact('listeProduits');


      $this->afficherVue("liste-produits", $donnees);
   }



   public function ajouter()
   {
      $modification = false;
      $nom = "";
      $description = "";
      $image = "";
      $prix = "";
      $stock = "";

      if (isset($_POST["nom"])) {

         $dao = new ProduitDao();

         $dao->ajouterProduit(
            $_POST['nom'],
            $_POST['description'],
            $_POST['image'],
            $_POST['prix'],
            $_POST['stock']
         );

         $this->afficherMessage("Votre produit a bien été ajoutée", "success");
         $this->redirection("produit/afficherTout");
      }

      $donnees = compact("modification", "nom", "description", "image", "prix", "stock");
      $this->afficherVue("editer-produit", $donnees);
   }

   public function supprimer($parametres)
   {
      $id = $parametres[0];

      if (isset($_POST["confirmation"])) {

         $dao = new ProduitDao();
         $dao->deleteById($id);
         $this->afficherMessage("Le produit a bien été supprimée");
         $this->redirection("produit/afficherTout");
      }

      $this->afficherVue("confirmation-suppression");
   }

   public function modifier($parametres)
   {
      $modification = true;
      $id = $parametres[0];
      $nom = "";
      $description = "";
      $image = "";
      $prix = "";
      $stock = "";

      $daoProduit = new produitDao();

      if (isset($_POST["nom"])) {

         $daoProduit->modifierProduit(
            $id,
            $_POST['nom'],
            $_POST['description'],
            $_POST['image'],
            $_POST["prix"],
            $_POST["stock"]
         );

         $this->afficherMessage("Le produit a bien été modifiée");
      }

      $produit = $daoProduit->findById($id);
      $nom = $produit->getNom();
      $description = $produit->getDescription();
      $image = $produit->getImage();
      $prix = $produit->getPrix();
      $stock = $produit->getStock();




      $listeProduits = $daoProduit->fetchAll($id);


      $donnees = compact(
         "id",
         "modification",
         "nom",
         "description",
         "image",
         "prix",
         "stock",
         "listeProduits"

      );

      $this->afficherVue("editer-produit", $donnees);
   }
}
