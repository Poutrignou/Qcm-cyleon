<?php
$title = "";
$description = "";
$otherMeta = "<script src=\"../script/affichePassWord.js\"  defer></script>";
?>

<?php ob_start(); ?>

    <main>
        <section class="connection-form-background">
            <form class="form" action="<?= $router->generate('logginConnectionTreatment') ?>" method="POST">
                <h1 class="form__title"><span class="maj-title">C</span>onnexion</h1>
                <p class="form__sub-title">Connectez-vous pour profiter de l'ensemble de la plateforme</p>
                <div class="form__element">
                    <label class="form__element__label" for="email">Email</label>
                    <input class="form__element__input" type="email" id="email" name="email" autofocus required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Veuillez entrer une adresse mail valide">
                </div>
                <div class="form__element">
                    <label class="form__element__label" for="password">Mot de passe</label>
                    <input class="form__element__input password" type="password" id="password" name="password" required><button class="unmask" type="button" title="Mask/Unmask password to check content"></button></input>
                </div class="form__element">

                <?= $message ?>
                
                <a class="form__link" href="<?= $router->generate('logginForgivenPassword') ?>">Mot de passe oublié</a>
                <input class="form__button" type="submit" value="Se connecter">
                <p class="form__comment">Vous n'avez pas encore de compte, <a href="<?= $router->generate('logginInscription') ?>">inscrivez-vous</a>.</p>
            </form>
        </section>
    </main>

<?php $content = ob_get_clean(); ?>