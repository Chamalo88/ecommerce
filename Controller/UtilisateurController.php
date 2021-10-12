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

        //si l'utilisateur a valider le formulaire
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
}
