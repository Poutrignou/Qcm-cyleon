<?php
$title = "Prepa Drone | Préparation à l'examen Télépilote de drone";
$description = "Avec Prepa Drone, ...";
$otherMeta = "<script src=...></script>";
?>

<?php ob_start(); ?>

    <div class="bg-image">
        <img class="bg-image__image active" src="images/hero1.jpg" alt="Drone vu de face">
        <img class="bg-image__image" src="images/hero2.jpg" alt="Drone sur une main">
        <img class="bg-image__image" src="images/hero3.jpg" alt="Drone en montagne">
    </div>

<?php $content = ob_get_clean(); ?>