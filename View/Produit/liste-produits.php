<section class="produit">

    <h1 class="titre">LA BOUTIQUE POWERBANK </h1>

    <div class=" table">

        <?php

        foreach ($listeProduits as $produit) {
        ?>


            <div class="card">
                <h3 class="cardheader"><?php echo $produit->getNom(); ?></h3>

                <img class="imgproduit" src="<?= config2::$baseUrlImages . $produit->getImage() ?>" alt="Images Produits Powerbank"></img>

                <h5 class="cardtitle"><?php echo $produit->getDescription(); ?></h5>


                <h3 class="cardfooter">Quantité en stock :<?php echo $produit->getStock() ?> </h3>
                <h3 class="cardfooter"><?php echo $produit->getPrix() ?> € TTC</h3>
            </div>

            <?php

            if (isset($_SESSION["utilisateur"])) {
                $utilisateur = unserialize($_SESSION["utilisateur"]);

            ?>
                <a href="" class="btn btn-primary">Ajouter au panier</a>



                <?php

                if (isset($admin) == 1) {

                ?>
                    <a href="<?= Config::$baseUrl ?>/produit/modifier/<?php echo $produit->getId_produit(); ?>" class="btn btn-info">Modifier le produit</a>

                    <a href="<?= Config::$baseUrl ?>/produit/supprimer/<?php echo $produit->getId_produit(); ?>" class="btn btn-danger">Supprimer le produit</a>

                <?php }
            } else {
                ?>
                <a href="" class="btn btn-primary">Veuillez vous connecter <br>
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


<a class="H" href="<?= config::$baseUrl ?>"><i class="fas fa-sign-out-alt"></a></i>
</section>