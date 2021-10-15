<form method="POST" enctype="multipart/form_data">
    <h1>Produit</h1>
    <div class="form-group">
        <label>Image</label>
        <input value="<?= $image ?>" style="max-width:300px" name="image" type="file" class="form-control" placeholder="Image du produit">
    </div>


    <div class="form-group">
        <label>Nom</label>
        <input value="<?= $nom ?>" style="max-width:300px" name="nom" type="text" class="form-control" placeholder="Nom du produit">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" placeholder="Description du produit"><?= $description ?></textarea>
    </div>

    <div class="form-group">
        <label>Poids Moyen : </label>
        <input value="<?= $poidsMoyen ?>" style="max-width:300px" name="poidsMoyen" type="text" class="form-control" placeholder="Poids moyen">
    </div>

    <div class="form-group">
        <label>Prix TTC : </label>
        <input value="<?= $prixTTC ?>" style="max-width:300px" name="prixTTC" type="text" class="form-control" placeholder="Prix TTC">
    </div>

    <?php if ($modification) { ?>
        <ul>

        </ul>
    <?php } ?>



    <input style="margin-top:20px" type="submit" class="btn btn-success" value="<?php echo $modification ? "Modifier produit" : "Ajouter produit" ?>">

</form>