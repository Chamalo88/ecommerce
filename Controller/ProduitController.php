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
      $image = "";
      $nom = "";
      $poidsMoyen = "";
      $prixTTC = "";

      if (isset($_POST["nom"])) {

         $dao = new ProduitDao();

         $dao->ajouterProduit(
            $_POST['image'],
            $_POST['nom'],
            $_POST['poidsMoyen'],
            $_POST['prixTTC']
         );

         $this->afficherMessage("Votre produit a bien été ajoutée", "success");
         $this->redirection("produit/afficherTout");
      }

      $donnees = compact("modification", "image", "nom", "poidsMoyen", "prixTTC");
      $this->afficherVue("editer-produit", $donnees);
   }

   public function supprimer($parametres)
   {
      $id_produit = $parametres[0];

      if (isset($_POST["confirmation"])) {

         $dao = new ProduitDao();
         $dao->deleteById($id_produit);
         $this->afficherMessage("Le produit a bien été supprimée");
         $this->redirection("produit/afficherTout");
      }

      $this->afficherVue("confirmation-suppression");
   }

   public function modifier($parametres)
   {
      $modification = true;
      $id_produit = $parametres[0];
      $image = "";
      $nom = "";
      $poidsMoyen = "";
      $prixTTC = "";

      $daoProduit = new produitDao();

      if (isset($_POST["nom"])) {

         $daoProduit->modifierProduit(
            $id_produit,
            $_POST['image'],
            $_POST['nom'],
            $_POST["poidsMoyen"],
            $_POST["prixTTC"]
         );

         $this->afficherMessage("Le produit a bien été modifiée");
      }

      $produit = $daoProduit->findById($id_produit);
      $image = $produit->getImage();
      $nom = $produit->getNom();
      $poidsMoyen = $produit->getPoidsMoyen();
      $prixTTC = $produit->getPrixTTC();




      $listeProduits = $daoProduit->fetchAll($id_produit);


      $donnees = compact(
         "id_produit",
         "modification",
         "image",
         "nom",
         "poidsMoyen",
         "prixTTC",
         "listeProduits"

      );

      $this->afficherVue("editer-produit", $donnees);
   }
}
