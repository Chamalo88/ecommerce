<?php

include("header.php")

?>
<section>

    <article class="superpile"><img src="assets/images/logo.jpg" alt=""></article>

    <article class="bienvenue">Bienvenue chez Powerbank, la qualité aux meilleurs prix !</article>

    <article class="acceder">Pour acceder à l'ensemble de notre catalogue connectez vous sur le site <br> en utilisant le bouton situé juste en dessous. </article>

    <article class="guerredesboutons">

        <button class="bouton">Connexion</button>

        <button class="bouton">Inscription</button>

    </article>

    <a class="A" href="<?= config::$baseUrl ?>/utilisateur/connexion"><i class="fas fa-key" title="CONNEXION"></i></a>
    <a class="B" href="<?= config::$baseUrl ?>/utilisateur/inscription"><i class="fas fa-user" title="INSCRIPTION"></i></a>
    <a class="C" href="<?= config::$baseUrl ?>/utilisateur/deconnexion"><i class="fas fa-user-slash" title="DECONNEXION"></i></a>
    <a class="F" href="<?= config::$baseUrl ?>/utilisateur/contact"><i class="far fa-envelope" title="CONTACT"></i></a>


</section>
<?php

include("footer.php")

?>