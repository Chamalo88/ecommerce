<?php foreach($tabProd as $produit) { ?>
<form action="">
    <table>
        <tr>
            <td>Votre panier</td>
        </tr>
        <tr>
        <tr>
            <td>Nom</td>
            <td><?php echo $produit->getNom(); ?></td>
        </tr>
        <tr>
        <tr>
            <td>Quantité</td>
            <td><?php echo $produit->getStock(); ?></td>
        </tr>
        </tr>
        <tr>
        <tr>
            <td>Prix</td>
            <td><?php echo $produit->getPrix(); ?></td>
        </tr>
        </tr>
    </table>
    <button style="margin-top:20px;" type="submit">Valider le panier</button>
</form>
<?php } ?>