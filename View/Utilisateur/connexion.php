<section class="formulaireconnexion">

  <article class="cadreconnexion">
    <article class="authentification">
      Authentification
    </article>

    <div class="leformulaire">

      <form action="" method="post">

        <div class="divpseudo">
        </div> <label>Email</label>
        <input id="email" value="<?= $email ?>" name="email" type="text" placeholder="Email">

        <div class="divmotdepasse">
          <label>Mot de passe</label>
          <input id="motdepasse" name="motDePasse" type="password" placeholder="Mot de passe">

        </div>

        <div class=placerbouton>
          <input type="submit" class="btn btn-info" value="Connexion">
        </div>

      </form>
    </div>
    <a id="L" href="<?= config::$baseUrl ?>/utilisateur/emailReinit">Mot de passe oublié ?</a>

    <a class="D" href="<?= config::$baseUrl ?>/utilisateur/inscription">Pas de compte, inscrivez vous ici ! </a>

  </article>

</section>