<?php

namespace Controller;

use Config;
use Controller\BaseController;
use Dao\UtilisateurDao;
use Model\Utilisateur;

class UtilisateurController extends BaseController
{
    public function connexion()
    {
        $email = "";


        if (isset($_POST['email'])) {

            $email = $_POST['email'];
            $dao = new UtilisateurDao();
            $utilisateur = $dao->findByEmail($_POST['email']);


            if ($utilisateur && password_verify($_POST['motDePasse'], $utilisateur->getMotDePasse())) {
                $_SESSION["utilisateur"] = serialize($utilisateur);
                $this->afficherMessage("Vous êtes connecté");
                $this->redirection();
            } else {
                $this->afficherMessage("mauvais email / mot de passe", "danger");
            }
        }

        $donnees = compact("email");
        $this->afficherVue("connexion", $donnees);
    }

    public function deconnexion()
    {
        session_destroy();
        session_start();
        $this->afficherMessage("Vous êtes deconnecté");
        $this->redirection();
    }
    public function inscription()
    {

        $nom = "";
        $prenom = "";
        $adresse = "";
        $cp = "";
        $ville = "";
        $tel = "";
        $email = "";
        $admin = "";


        if (isset($_POST["email"])) {

            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $adresse = $_POST["adresse"];
            $cp = $_POST["cp"];
            $ville = $_POST["ville"];
            $tel = $_POST["tel"];
            $email = $_POST["email"];
            $admin = isset($_POST['admin']);

            if ($_POST["motDePasse"] == $_POST["confirmeMotDePasse"]) {

                $dao = new UtilisateurDao();

                $dao->ajoutUtilisateur(
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['adresse'],
                    $_POST['cp'],
                    $_POST['ville'],
                    $_POST['tel'],
                    $_POST['email'],
                    $_POST['motDePasse'],
                    isset($_POST['admin'])
                );
                $this->afficherMessage("Vous êtes bien inscrit, veuillez vous connecter", "success");
                $this->redirection("utilisateur/connexion");
            } else {

                $this->afficherMessage("Les mots de passes sont différents", "danger");
            }
        }

        $donnees = compact('nom', 'prenom', 'adresse', 'cp', 'ville', 'tel', 'email');

        $this->afficherVue("inscription", $donnees);
    }
    public function emailReinit()
    {
        $entetes = "From : virginie.chamalo88@gmail.com\n";
        $email = "";
        $link = "http://localhost/ecommerce/utilisateur/newmdp";


        if (isset($_POST['email'])) {

            $email = $_POST['email'];
            $dao = new UtilisateurDao();
            $utilisateur = $dao->findByEmail($_POST['email']);


            $success = mail($email, "Lien de réinitialisation de mot de passe site The Chic'N", "cliquer ici $link", "Merci de ne pas repondre à ce mail", "$entetes");
            if (!$success) {
                $errorMessage = error_get_last();
                $this->afficherMessage('erreur ' . print_r($errorMessage, true));
            } else {
                $this->afficherMessage("Un email vient de vous être envoyé");
            }
        } else {
            $this->afficherMessage("Cet Email n'est pas valide", "warning");
        }
        $donnees = compact("email");
        $this->afficherVue("mdpoublie", $donnees);
    }

    public function reinitialisationMdp()
    {
        $utilisateur = unserialize($_SESSION["utilisateur"]);
        $idUtilisateurConnecte = $utilisateur->getIdUtilisateur();

        if ($_POST["motDePasse"] == $_POST["confirmeMotDePasse"]) {

            $utilisateurDao = new UtilisateurDao();

            $utilisateurDao->modifierMdP(
                $idUtilisateurConnecte,
                $_POST['motDePasse']

            );

            $nouvelUtilisateur = new Utilisateur();
            $nouvelUtilisateur->setIdUtilisateur($idUtilisateurConnecte);
            $nouvelUtilisateur->setMotDePasse($_POST["mot_de_passe"]);
            $_SESSION["utilisateur"] = serialize($nouvelUtilisateur);

            $this->afficherMessage("Votre mot de passe à bien été reinistialisé, veuillez vous connecter", "success");
            $this->redirection("utilisateur/connexion");
        } else {

            $this->afficherMessage("Les mots de passes sont différents", "danger");
        }


        $donnees = compact("utilisateur");

        $this->afficherVue("newmdp", $donnees);
    }

    public function contact()
    {

        if (isset($_POST["nom"])) {

            ini_set("sendmail_from", $_POST["email"]);
            $success = mail("colin_dev@outlook.fr", $_POST["objet"], $_POST["message"]);
            ini_restore("sendmail_from");

            if (!$success) {
                $errorMessage = error_get_last();
                $this->afficherMessage('erreur ' . print_r($errorMessage, true));
            } else {
                $this->afficherMessage("Un email vient de vous être envoyé");
            }
        } else {
            $this->afficherMessage('pas de nom');
        }
        $this->afficherVue("contact");
    }

    public function profil()
    {
        $erreurNom = "";
        $erreurPrenom = "";
        $erreurAdresse = "";
        $erreurCp = "";
        $erreurVille = "";
        $erreurTel = "";
        $erreurEmail = "";

        $utilisateur = unserialize($_SESSION["utilisateur"]);
        $idUtilisateurConnecte = $utilisateur->getIdUtilisateur();

        //si l'utilisateur valide le formulaire 
        if (
            isset($_POST['nom'], $_POST['prenom']) &&
            $_POST['adresse'] &&
            $_POST['cp'] &&
            $_POST['ville'] &&
            $_POST['tel'] &&
            $_POST['email']
        ) {

            $utilisateurDao = new UtilisateurDao();


            if (
                $erreurNom == "" && $erreurPrenom == "" && $erreurAdresse == "" && $erreurCp == "" &&
                $erreurVille == "" && $erreurTel == "" && $erreurEmail == ""
            ) {

                $utilisateurDao->modifierUtilisateur(
                    $idUtilisateurConnecte,
                    $_POST["nom"],
                    $_POST["prenom"],
                    $_POST["adresse"],
                    $_POST["cp"],
                    $_POST["ville"],
                    $_POST["tel"],
                    $_POST["email"]
                );

                //on met l'utilisateur à jour dans la session
                $nouvelUtilisateur = new Utilisateur();
                $nouvelUtilisateur->setIdUtilisateur($idUtilisateurConnecte);
                $nouvelUtilisateur->setNom($_POST["nom"]);
                $nouvelUtilisateur->setPrenom($_POST["prenom"]);
                $nouvelUtilisateur->setAdresse($_POST["adresse"]);
                $nouvelUtilisateur->setCp($_POST["cp"]);
                $nouvelUtilisateur->setVille($_POST["ville"]);
                $nouvelUtilisateur->setTel($_POST["tel"]);
                $nouvelUtilisateur->setEmail($_POST["email"]);

                $_SESSION["utilisateur"] = serialize($nouvelUtilisateur);

                $this->afficherMessage("Votre profil a bien été mis à jour");
            } else {
                $this->afficherMessage("Certains champs comportent des erreurs", "warning");
            }
        }



        $donnees = compact(
            "utilisateur",
            "erreurNom",
            "erreurPrenom",
            "erreurAdresse",
            "erreurCp",
            "erreurVille",
            "erreurTel",
            "erreurEmail"
        );

        $this->afficherVue("profil", $donnees);
    }


    public function supprimer($parametres)
    {
        $id = $parametres[0];

        if (isset($_POST["confirmation"])) {

            $dao = new UtilisateurDao();
            $dao->deleteById($id);
            $this->afficherMessage("Votre profil a bien été supprimée");
            $this->redirection();
        }

        $this->afficherVue("confirmation-suppression");
    }
}
