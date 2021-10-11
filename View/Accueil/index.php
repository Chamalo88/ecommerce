<section>
    <div id="bloc">


        <h1> La Rôtisserie autrement, les goûts d'antan.</h1>

        <img src="<?= config::$baseUrl ?>./assets/images/logo.jpg" alt="Logo The Chic'N Rôtisserie"></img>


        <div id="menu">


            <a id="a" href="<?= config::$baseUrl ?>/produit/afficherTout">Produits</a>



            <a id="b" href="<?= config::$baseUrl ?>/planning/afficherTout">Emplacements</a>




        </div>
    </div>


    <div class="view_port">
        <div class="polling_message">

        </div>
        <div class="cylon_eye"></div>
    </div>


    <div id="footer">

        <div>
            <a href="..\Chicn\mentionLeg.html"><i class="fas fa-file-contract"></i> Mentions Légales</a>
        </div>

        <div>
            <a href="..\Chicn\Contacteznous.html"></i><i class="far fa-address-card"></i> Contactez-nous!</a>
        </div>

        <div>
            <a href="https://www.facebook.com/thechicn/"><i class="fab fa-facebook-f"></i> Suivez nous</a>
        </div>
    </div>

    <div class="admin">
        <a class="E" href="<?= config::$baseUrl ?>/utilisateur/connexion"><i class="fas fa-key"></i></a>
    </div>


    <?php
    if (isset($_SESSION["utilisateur"])) {
        $utilisateur = unserialize($_SESSION["utilisateur"]);

    ?>
        <a class="F" href="<?= config::$baseUrl ?>/utilisateur/inscription">Inscription</a>

    <?php } ?>






</section>