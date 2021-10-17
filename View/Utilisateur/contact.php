<div class="contact">
    <form action="/ecommerce/utilisateur/contact" method="post">
    <div class="class">
        <h1>Contact</h1>
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div>
            <label for="mail">e-mail :</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div>
            <label for="objet">Objet :</label>
            <input type="text" name="objet" class="form-control">
        </div>
        <div>
            <label for="message" class="form-label mt-4">Message</label>
            <textarea class="form-control" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn" value="Envoyer">Envoyer</button>

    </div>
    </form>
</div>