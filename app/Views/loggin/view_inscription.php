<?php
$title = "Inscription | Prepa Drone";
$description = "Avec Prepa Drone, ...";
$otherMeta = "<script src=\"../script/affichePassWord.js\" defer></script>";
?>

<?php ob_start(); ?>

    <main>
        <section class="inscription-form-background">
            <form class="form" action="<?= $router->generate('logginInscriptionTreatment') ?>" method="POST">
                <h1 class="form__title"><span class="maj-title">I</span>nscription</h1>
                <p class="form__sub-title">Inscrivez-vous pour profiter de l'ensemble de la plateforme</p>
                <div class="form__element">
                    <label class="form__element__label" for="name">Name</label>
                    <input class="form__element__input" type="text" id="name" name="name" autofocus required minlength="4" title="Veuillez entrer un nom valide">
                </div>
                <div class="form__element">
                    <label class="form__element__label" for="email">Adresse mail</label>
                    <input class="form__element__input" type="email" id="email" name="email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Veuillez entrer une adresse mail valide">
                </div>
                <div class="form__element">
                    <label class="form__element__label" for="password">Mot de passe</label>
                    <input class="form__element__input password" type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-zA-Z]).{6,}" title="Veuillez entrer un mot de passe avec au minimum une lettre, un chiffre, et 6 caractères" required> <button class="unmask" type="button" title="Mask/Unmask password to check content"></button></input>
                </div>
                <div class="form__element">
                    <label class="form__element__label" for="password-confirmation">Confirmation du mot de passe</label>
                    <input class="form__element__input password" type="password" id="password-confirmation" name="password-confirmation" pattern="(?=.*\d)(?=.*[a-zA-Z]).{6,}" title="Veuillez entrer un mot de passe avec au minimum une lettre, un chiffre, et 6 caractères" required> <button class="unmask" type="button" title="Mask/Unmask password to check content"></button></input>
                </div>

                <?php if(isset($_SESSION['sponsor'])): ?>
                    <input type="hidden" name="sponsor" value=<?= $_SESSION['sponsor'] ?>>
                <?php endif; ?>
                
                <?= $message ?>

                <input class="form__button" type="submit" value="S'inscrire">
                <p class="form__comment">Vous avez déjà un compte, <a href="<?= $router->generate('logginConnection') ?>">connectez-vous</a>.</p>
              
            </form>
        </section>
    </main>

<?php $content = ob_get_clean(); ?>