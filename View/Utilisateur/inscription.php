<div id="inscription">

        <h2>FORMULAIRE D'INSCRIPTION</h2>

        <form method="POST">



                <div>
                        <label>Nom</label>
                        <input value="<?php $nom ?> " name="nom" type="text" placeholder="Nom">
                </div>

                <div>
                        <label>Prénom</label>
                        <input value="<?php $prenom ?>" name=" prenom" type="text" placeholder="Prénom">
                </div>

                <div>
                        <label>Adresse</label>
                        <input value="<?php $adresse ?>" name=" adresse" type="text" placeholder="Adresse">
                </div>

                <div>
                        <label>Code postal</label>
                        <input value="<?php $cp ?>" name=" cp" type="text" placeholder="Code postal">
                </div>

                <div>
                        <label>Ville</label>
                        <input value="<?php $ville ?>" name=" ville" type="text" placeholder="Ville">
                </div>

                <div>
                        <label>Numéro de téléphone</label>
                        <input value="<?php $tel ?>" name=" tel" type="text" placeholder="Numéro de Téléphone">
                </div>

                <div>
                        <label>Email</label>
                        <input value="<?php $email ?>" name=" mail" type="text" placeholder="Email">
                </div>

                <div>
                        <label>Mot de passe</label>
                        <input name="motDePasse" type="password" placeholder="Mot de passe">
                </div>

                <div>
                        <label>Confirmer le mot de passe</label>
                        <input name="confirmeMotDePasse" type="password" placeholder="Mot de passe">
                </div>

                <input type="submit" class="btn btn-info" value="inscription">


                <script>
                        function verification() {
                                var f = document.formulaire;
                                var nom = f.Nom.value;
                                var prenom = f.Prenom.value;
                                var adresse = f.Adresse.value;
                                var cp = f.Cp.value;
                                var ville = f.Ville.value
                                var tel = f.Tel.value;
                                var mail = f.Email.value;

                                var Errmail = /^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/
                                var erreurs = [];

                                if (!nom) erreurs.push("Le nom n'est pas renseigné.");
                                if (!prenom) erreurs.push("Le prénom n'est pas renseigné.");
                                if (!adresse) erreurs.push("L'adresse n'est pas renseigné.");
                                if (!cp) erreurs.push("Le code postal n'est pas renseigné");
                                if (!ville) erreurs.push(" La ville n'est pas renseignée.");
                                if (!tel) erreurs.push("Le numéro de téléphone n'est pas renseigné.")
                                if (!mail) erreurs.push("L'email n'est pas renseigné.");
                                if (mail && Errmail.test(mail)) erreurs.push("Le format de l'email n'est pas valide.");

                                if (erreurs.length > 0) {
                                        alert("Le formulaire n'a pas pu être validé car :\n\n" + erreurs.join("\n"));
                                }
                                return (erreurs.length == 0);
                        }
                </script>

        </form>



</div>