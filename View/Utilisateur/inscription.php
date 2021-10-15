<div class="inscription">
        <form method="POST">
                <div class="log">
                        <h1>INSCRIPTION</h1>
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

                        <input type="submit" class="button1" value="Valider">
                </div>
        </form>



</div>