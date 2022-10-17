<?php
$title = "Modifier mot de passe | No Wayste";
$description = "Avec Prepa Drone, ...";
$otherMeta = "<script src=\"../script/affichePassWord.js\" defer></script>";
?>

<?php ob_start(); ?>

    <main>
        <section class="connection-form-background">
            <form class="form" action="<?= $router->generate('logginModifyPasswordTreatment') ?>" method="POST">
                <h1 class="form__title"><span class="maj-title">M</span>odifier mot de passe</h1>
                <div class="form__element">
                    <label class="form__element__label" for="currentPassword">Ancien mot de passe</label>
                    <input class="form__element__input" type="password" id="currentPassword" name="currentPassword" autofocus required>
                </div>
                <div class="form__element">
                    <label class="form__element__label" for="newPassword">Nouveau mot de passe</label>
                    <input class="form__element__input password" type="password" id="newPassword" name="newPassword" required><button class="unmask" type="button" title="Mask/Unmask password to check content"></button></input>
                </div class="form__element">
                <div class="form__element">
                    <label class="form__element__label" for="newPasswordConf">Confirmer mot de passe</label>
                    <input class="form__element__input password" type="password" id="newPasswordConf" name="newPasswordConf" required><button class="unmask" type="button" title="Mask/Unmask password to check content"></button></input>
                </div class="form__element">
                <?= $message ?>
                <input class="form__button" type="submit" value="Valider">
            </form>
        </section>
    </main>

<?php $content = ob_get_clean(); ?>