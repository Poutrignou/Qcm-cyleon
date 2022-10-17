<?php
$title = "No Wayste | Profil";
// $description = "Avec Prepa Drone, préparez efficacement votre examen théorique de télépilote de drone grâce aux cours, qcm et examens blancs mis à votre disposition.";
?>

<?php ob_start(); ?>

<main class='container-profil'>
    <a class='container-profil__mmp' href="<?= $router->generate("logginModifyPassword") ?>">Modifier le mot de passe</a>
    <a class='container-profil__connexion' href="<?= $router->generate("loginDeco") ?>">Se déconnecter</a>
</main>

<?php $content = ob_get_clean(); ?>