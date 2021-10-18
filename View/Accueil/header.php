<section class="navbar">

  <div class="powerbank" href="default.asp"><img class="superpile" src="assets/images/logo2.jpg" alt="Logo Powerbank">POWERBANK</div>

  <a class="A" href="<?= config::$baseUrl ?>/produit/affichertout">POWERBOUTIQUE</a>

  <a class="B" href="View/Produit/panier.php">PANIER</a>

  <div class="dropdown">
    <button class="dropbtn">UTILISATEUR</button>
    <div class="dropdown-content">
      <a class="C" href="<?= config::$baseUrl ?>/utilisateur/connexion"><i class="fas fa-key" title="CONNEXION"></i> Connexion</a>
      <a class="M" href="<?= config::$baseUrl ?>/utilisateur/inscription"><i class="fas fa-user" title="INSCRIPTION"></i> Inscription</a>
      <?php

      if (isset($_SESSION["utilisateur"])) {
        $utilisateur = unserialize($_SESSION["utilisateur"]);
      ?>


        <a class="E" href="<?= config::$baseUrl ?>/utilisateur/deconnexion"><i class="fas fa-user-slash"></i> Deconnexion</a>
        <a class="F" href="<?= config::$baseUrl ?>/utilisateur/profil"><i class="fas fa-users-cog"></i> Profil</a>
        <a class="G" href="<?= config::$baseUrl ?>/utilisateur/suivicommande"><i class="fas fa-receipt"></i> Suivi de commande</a>
      <?php } ?>

    </div>
</section>