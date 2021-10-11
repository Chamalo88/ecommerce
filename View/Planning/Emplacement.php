

<section class="planning">


<h2 id="Text1"> Nous sommes le : <?php setlocale(LC_TIME, 'fra_fra'); echo strftime('%A %d %B %Y') ?> 
<h1 id="Text2"> TRAINER FOOD DISPONIBLE A  : </h1>
<table> 

<th>Jour</th><th>Détail emplacement</th><th>Code postal</th><th>Ville</th><th>Horaires</th>
  <?php 
 $S = strftime('%W');
 $A =('%A');
 if (($S== 2) || ($S== 4)  ||($S== 6)  || ($S== 8) || ($S== 10) || ($S== 12) || ($S== 14) || ($S== 16)|| ($S== 18) || ($S== 20) || ($S== 22) || ($S== 24) 
 || ($S== 26) || ($S== 28) || ($S== 30)|| ($S== 32) || ($S== 34) || ($S== 36)|| ($S== 38) || ($S== 40) || ($S== 42)|| ($S== 44) || ($S== 46)|| ($S== 48) 
 || ($S== 50) || ($S== 52)){
     

foreach ($listePlanning as $Planning) {
?>

<br>
    <td><?php echo $Planning->getJour()?></td>

    <td><?php echo $Planning->getDetailEmplacement()?></td>

    <td> <?php echo $Planning->getCp()?></td>

    <td><?php echo $Planning->getVille()?></td>

    <td><?php echo $Planning->getHoraires()?></td><br><br>
   
    <?php
         if (isset($_SESSION["utilisateur"])) {
                $utilisateur = unserialize($_SESSION["utilisateur"]);

                //si l'utilisateur connecté est l'admin',
                // alors on affiche le bouton "modifier" "
                if (isset($admin)==0){
                    
            
            ?>
            <a href="<?= Config::$baseUrl ?>/planning/modifier/<?php echo $Planning->getIdPlanning(); ?>"
                class="btn btn-info">Modifier</a>

            <?php
         }} 
                ?>  
    

<?php
 }}else{
 ?>

        <?php

foreach ($listePlanning2 as $Planning2) {
    ?>    
    <td><?php echo $Planning2->getJour()?></td>
    <td><?php echo $Planning2->getDetailEmplacement()?></td>
    <td> <?php echo $Planning2->getCp()?></td>
    <td><?php echo $Planning2->getVille()?></td>
    <td><?php echo $Planning2->getHoraires()?></td><br>
    <?php
         if (isset($_SESSION["utilisateur"])) {
                $utilisateur = unserialize($_SESSION["utilisateur"]);

                //si l'utilisateur connecté est l'admin',
                // alors on affiche le bouton "modifier" "
                if (!isset($admin)==0){
                    
            
            ?>
            <a href="<?= Config::$baseUrl ?>/planning/modifier2/<?php echo $Planning2->getIdPlanning(); ?>"
                class="btn btn-info">Modifier</a>

            <?php
                }} 
                ?>  
    
   
    <?php
     }
     ?>
    </table> 
     <h2>INFORMATIONS ET CHANGEMENTS DE PLANNING : </h2> 
     <table class="tableauOccaz">
     <?php
     foreach ($listePlanningOccaz as $PlanningOccaz) {
         ?>
        <td><?php echo $PlanningOccaz->getJour()?></td>
        <td><?php echo $PlanningOccaz->getDate()?></td>
        <td><?php echo $PlanningOccaz->getDetailEmplacement()?></td>
        <td> <?php echo $PlanningOccaz->getCp()?></td>
        <td><?php echo $PlanningOccaz->getVille()?></td>
        <td><?php echo $PlanningOccaz->getHoraires()?></td>
        <td><?php echo $PlanningOccaz->getInformation()?></td>
        <br>
        <?php
         if (isset($_SESSION["utilisateur"])) {
                $utilisateur = unserialize($_SESSION["utilisateur"]);

                //si l'utilisateur connecté est l'admin',
                // alors on affiche le bouton "modifier" "
                if (!isset($admin)==0){
                    
            
            ?>

            <a href="<?= Config::$baseUrl ?>/planning/modifier3/<?php echo $PlanningOccaz->getIdPlanning(); ?>"
                class="btn btn-info">Modifier</a>
                <a href="<?= Config::$baseUrl ?>/planning/supprimer/<?php echo $PlanningOccaz->getIdPlanning(); ?>"
                class="btn btn-danger">Supprimer</a>
            <?php
                }} 
                ?> 
               
    
               </table> 



<?php
 }}
 if (!isset($admin)==0){
                    
            
 ?>
    <a href="<?= Config::$baseUrl ?>/planning/ajouteroccaz/"class="btn btn-primary">Ajouter evenement occasionnel au planning</a>  

<?php } ?>
<a id= "H" href="<?= config::$baseUrl ?>">Retour</a>
 </section>
