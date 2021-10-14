<form method="POST" enctype="multipart/form-data">

    <?php

    use View\ViewUtil;

    ViewUtil::ajouterChamps($utilisateur->getNom(), "nom", "Nom", $erreurNom, "Votre nom");
    ViewUtil::ajouterChamps($utilisateur->getPrenom(), "prenom", "Prenom", $erreurPrenom, "Votre prenom");
    ViewUtil::ajouterChamps($utilisateur->getAdresse(), "adresse", "Adresse", $erreurAdresse, "Votre adresse");
    ViewUtil::ajouterChamps($utilisateur->getCp(), "cp", "Cp", $erreurCp, "Votre code postal");
    ViewUtil::ajouterChamps($utilisateur->getVille(), "ville", "Ville", $erreurVille, "Votre ville");
    ViewUtil::ajouterChamps($utilisateur->getTel(), "tel", "Tel", $erreurTel, "Votre numéro de téléphone");
    ViewUtil::ajouterChamps($utilisateur->getEmail(), "email", "Email", $erreurEmail, "Votre email");
    ?>


    <input style="margin-top:20px" type="submit" class="btn btn-info" value="Modifier le profil">

</form>


<a href="<?= Config::$baseUrl ?>/utilisateur/supprimer/<?php echo $utilisateur->getIdUtilisateur(); ?>" class="btn btn-danger">Supprimer le compte</a>

<br>

<a class="H" href="<?= config::$baseUrl ?>"><i class="fas fa-sign-out-alt"></a></i>