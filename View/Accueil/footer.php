<div align="center">
    <div class="contener_slideshow">
        <div class="contener_slide">
            <?php

            foreach ($listeProduits as $produit) {
            ?>
                <div class="slid_1"><img src="" <?= config2::$baseUrlImages . $produit->getImage() ?>" alt="Images Produits Powerbank""></div>
        <?php } ?>
        </div>
    </div>
</div>