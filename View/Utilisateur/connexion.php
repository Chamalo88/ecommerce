<div class="connexion">



  <form method="POST">
    <div class="log">
      <h1>CONNEXION</h1>
    </div>
    <div>
      <label>Email :</label>
      <input value="<?= $email ?>" name="email" type="text" class="form-control" placeholder="Email">
    </div>

    <div>
      <label>Mot de passe :</label>
      <input name="motDePasse" type="password" class="form-control" placeholder="Mot de passe">
    </div>
    <div class="logvalid">
      <input class="button1" type="submit" class="btn btn-info" value="CONNEXION">
    </div>
  </form>

  <a class="L" href="<?= config::$baseUrl ?>/utilisateur/emailReinit">Mot de passe oublié ?</a>

  <a class="D" href="<?= config::$baseUrl ?>/utilisateur/inscription">Pas de compte, inscrivez vous ici ! </a>


  </section>