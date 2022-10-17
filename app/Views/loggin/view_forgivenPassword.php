<?php
$title = "Mot de passe oublié | Prepa Drone";
$description = "Avec Prepa Drone, ...";
?>

<?php ob_start(); ?>

    <main>
        <section class="forgiven-password-form-background">
            <form class="form" action="<?= $router->generate('logginForgivenPasswordTreatment') ?>" method="POST">
                <h1 class="form__title"><span class="maj-title">M</span>ot de passe oublié</h1>
                <p class="form__sub-title">Entrez votre adresse mail pour recevoir un nouveau mot de passe.</p>
                <div class="form__element">
                    <label class="form__element__label" for="email">Adresse mail</label>
                    <input class="form__element__input" type="email" id="email" name="email" autofocus required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Veuillez entrer une adresse mail valide">
                </div>

                <?= $message ?>

                <input class="form__button" type="submit" value="Envoyer">
            </form>            
        </section>
    </main>

<?php $content = ob_get_clean(); ?>