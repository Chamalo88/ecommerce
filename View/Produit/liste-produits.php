
<section class="produit">

<h1 class="titre">Nos produits</h1>



<div class="table">
   
    <?php

foreach ($listeProduits as $produit) {
?>


<div class="card">
  <h3 class="cardheader"><?php echo $produit->getNom(); ?></h3>
 
  <img class="imgproduit" src="\ChicNSiteWeb\assets\images<?$produit-> getImage()?>" alt="Images Produits The Chic'N"></img>

    <h5 class="cardtitle"><?php echo $produit->getDescription(); ?></h5>
    <h6 class="card-subtitle"><?php echo $produit->getPoidsMoyen(); ?> Kg (poids moyen)</h6>

  
  <h3 class="cardfooter"><?php echo $produit->getPrixTTC() ?> € TTC</h3>
   

 
</div>


                         
     
                  
                   
     

<?php
        
            if (isset($_SESSION["utilisateur"])) {
                $utilisateur = unserialize($_SESSION["utilisateur"]);

               
               
            
            ?>
            <a href="<?= Config::$baseUrl ?>/produit/modifier/<?php echo $produit->getIdProduit(); ?>"
                class="btn btn-info">Modifier le produit</a>

            <a href="<?= Config::$baseUrl ?>/produit/supprimer/<?php echo $produit->getIdProduit(); ?>"
                class="btn btn-danger">Supprimer le produit</a>
            <?php
            
               
                    ?>
           
           
              
 


        
        ?> <br>
        <a href="<?= Config::$baseUrl ?>/produit/ajouter"class="btn btn-primary">Ajouter un nouveau produit</a>
           
    <?php
     }}
            ?>


           

</div>  

<section class="part2">

<h3> THE CHIC'N c'est aussi, bien d'autres produits uniquements disponibles sur commande : </h3>

<div class="listes">
        <div class="liste1">
            <p>Pintade noire fermière </p>
            <p>Canette de Barbarie</p>
            <p>Oie fermière</p>
            <p>Caille de Challans</p>
            <p>Chapon de pintade fermier</p>
        </div>

        <div class="liste2">
            <p>Chapon fermier</p>
            <p>Dinde fermière</p>
            <p>Poularde noire fermière</p>
        <p>Porcelet noir de Bigorre</p>
        <p>Cochon de lait noir de Bigorre</p>
        </div>
</div>

<h4>THE CHIC'N  s’adapte à vos demandes et envies.<br>
    N’hésitez pas à nous contacter pour de plus amples renseignements.</h4>



 <div class="label">


     <div class="l1"></div>
     <div class="l2"></div>
     <div class="l3"></div>
     <div class="l4"></div>


</div>

</section>

<a class= "H" href="<?= config::$baseUrl ?>"><i class="fas fa-sign-out-alt"></a></i>
</section>