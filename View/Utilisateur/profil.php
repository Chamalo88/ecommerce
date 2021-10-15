<div class="profil">
    <h5>MON PROFIL</h5>


    <form  method="POST" enctype="multipart/form-data">

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
        <div class="action">
            <a class="L" href="<?= Config::$baseUrl ?>/utilisateur/modifier/<?php echo $utilisateur->getIdUtilisateur(); ?>">Modifier le compte</a>
            <a class="W" href="<?= Config::$baseUrl ?>/utilisateur/supprimer/<?php echo $utilisateur->getIdUtilisateur(); ?>">Supprimer le compte</a>
        </div>
    </form>

</div>
<div class="profilbis">
    <a class="H" href="<?= config::$baseUrl ?>"><i class="fas fa-sign-out-alt"></a></i>
</div>