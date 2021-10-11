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
        $image="";
        $nom = "";
        $description = "";
        $poidsMoyen = "";
        $prixTTC="";

        if (isset($_POST["nom"])) {

            $dao = new ProduitDao();

            $dao->ajouterProduit($_POST['image'],
            $_POST['nom'],
            $_POST['description'],
            $_POST['poidsMoyen'],
            $_POST['prixTTC']);

            $this->afficherMessage("Votre produit a bien été ajoutée", "success");
            $this->redirection("produit/afficherTout");
        }

        $donnees = compact("modification", "image","nom", "description", "poidsMoyen", "prixTTC");
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
        $image= "";
        $nom = "";
        $description = "";
        $poidsMoyen = "";
        $prixTTC = "";

        $daoProduit = new produitDao();
    
        if (isset($_POST["nom"])) {

            $daoProduit->modifierProduit($id_produit, 
            $_POST['image'],
            $_POST['nom'],
            $_POST['description'],
            $_POST["poidsMoyen"],
            $_POST["prixTTC"] );

            $this->afficherMessage("Le produit a bien été modifiée");

            
        }

        $produit = $daoProduit->findById($id_produit);
        $image = $produit->getImage();
        $nom = $produit->getNom();
        $description = $produit->getDescription();
        $poidsMoyen = $produit->getPoidsMoyen();
        $prixTTC = $produit-> getPrixTTC();




        $listeProduits = $daoProduit->fetchAll($id_produit);


        $donnees = compact(
            "id_produit",
            "modification",
            "image",
            "nom",
            "description",
            "poidsMoyen",
            "prixTTC",
            "listeProduits"
            
        );

        $this->afficherVue("editer-produit", $donnees);
    }

    public function panier()
    {
      $panierDao = new ProduitDao();

      $erreur = false;

      $action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
      if($action !== null)
      {
         if(!in_array($action,array('ajout', 'suppression', 'refresh')))
         $erreur=true;
      
         //récupération des variables en POST ou GET
         $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
         $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
         $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
      
         //Suppression des espaces verticaux
         $l = preg_replace('#\v#', '',$l);
         //On vérifie que $p est un float
         $p = floatval($p);
      
         //On traite $q qui peut être un entier simple ou un tableau d'entiers
          
         if (is_array($q)){
            $QteArticle = array();
            $i=0;
            foreach ($q as $contenu){
               $QteArticle[$i++] = intval($contenu);
            }
         }
         else
         $q = intval($q);
          
      }
      
      if (!$erreur){
         switch($action){
            Case "ajout":
               ajouterArticle($l,$q,$p);
               break;
      
            Case "suppression":
               supprimerArticle($l);
               break;
      
            Case "refresh" :
               for ($i = 0 ; $i < count($QteArticle) ; $i++)
               {
                  modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
               }
               break;
      
            Default:
               break;
         }
        if (creationPanier())
      {
         $nbArticles=count($_SESSION['panier']['libelleProduit']);
         if ($nbArticles <= 0)
         echo "<tr><td>Votre panier est vide </ td></tr>";
         else
         {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
               echo "<tr>";
               echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
               echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
               echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
               echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
               echo "</tr>";
            }
  
            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"2\">";
            echo "Total : ".MontantGlobal();
            echo "</td></tr>";
  
            echo "<tr><td colspan=\"4\">";
            echo "<input type=\"submit\" value=\"Rafraichir\"/>";
            echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
  
            echo "</td></tr>";
         }
      
      $panierDao-> creationPanier();
      $panierDao->ajouterArticle($libelleProduit,$qteProduit,$prixProduit);
      $panierDao->supprimerArticle($libelleProduit);
      $panierDao->modifierQTeArticle($libelleProduit,$qteProduit);
      $panierDao-> MontantGlobal();
      $panierDao->compterArticles();
      $panierDao->supprimePanier();

      
    }
    
      }
      $this->afficherVue("panier");
  }

   

}
