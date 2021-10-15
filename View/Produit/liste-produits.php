<section class="produit">

    <h1 class="titre">Nos produits</h1>



    <div class="table">

        <?php

        foreach ($listeProduits as $produit) {
        ?>


            <div class="card">
                <h3 class="cardheader"><?php echo $produit->getNom(); ?></h3>

                <img class="imgproduit" style="width:300px;height:300px" src="<?= Config2::$baseUrlImages . $produit->getImage() ?>" alt="Images Produits The Chic'N"></img>

                <h6 class="card-subtitle"><?php echo $produit->getStock(); ?> En stock</h6>


                <h3 class="cardfooter"><?php echo $produit->getPrix() ?> € TTC</h3>


                <?php

                if (isset($_SESSION["utilisateur"])) {
                    $utilisateur = unserialize($_SESSION["utilisateur"]);

                ?>
                    <a class="panierbtn" href="panier.php" class="btn btn-primary">Ajouter au panier</a>

            </div>

            <?php

                    if (isset($admin) == 1) {

            ?>
                <a href="<?= Config::$baseUrl ?>/produit/modifier/<?php echo $produit->getId_produit(); ?>" class="btn btn-info">Modifier le produit</a>

                <a href="<?= Config::$baseUrl ?>/produit/supprimer/<?php echo $produit->getId_produit(); ?>" class="btn btn-danger">Supprimer le produit</a>

            <?php }
                } else {
            ?>
            <a href="" class="panierbtn2">Veuillez vous connecter <br>
                pour Ajouter au panier</a>
        <?php   } ?>

    </div>
    <br>
    <?php

            if (isset($_SESSION["utilisateur"])) {
                $utilisateur = unserialize($_SESSION["utilisateur"]);
                if (isset($admin) == 1) {

    ?>
            <a href="<?= Config::$baseUrl ?>/produit/ajouter" class="btn btn-primary">Ajouter un nouveau produit</a>

<?php }
            }
        }

?>


<a class="O" href="<?= config::$baseUrl ?>"><i class="fas fa-sign-out-alt"></a></i>
</section>