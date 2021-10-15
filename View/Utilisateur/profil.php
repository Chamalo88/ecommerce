<div class="profil">
    <form method="POST" enctype="multipart/form-data">
        <div class="log">
            <h1>MON PROFIL</h1>
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
                <a class="P" href="<?= Config::$baseUrl ?>/utilisateur/modifier/<?php echo $utilisateur->getIdUtilisateur(); ?>">Modifier</a>
                <a class="W" href="<?= Config::$baseUrl ?>/utilisateur/supprimer/<?php echo $utilisateur->getIdUtilisateur(); ?>">Supprimer</a>
            </div>
    </form>

</div>
<div class="profilbis">
    <a class="H" href="<?= config::$baseUrl ?>"><i class="fas fa-sign-out-alt"></a></i>
</div>