<?php
$title = "Prepa Drone | Préparation à l'examen Télépilote de drone";
$description = "Avec Prepa Drone, préparez efficacement votre examen théorique de télépilote de drone grâce aux cours, qcm et examens blancs mis à votre disposition.";

?>

<?php ob_start(); ?>

    <div class="bg-image">
        <img class="bg-image__image active" src="images/hero1.jpg" alt="Drone vu de face">
        <img class="bg-image__image" src="images/hero2.jpg" alt="Drone sur une main">
        <img class="bg-image__image" src="images/hero3.jpg" alt="Drone en montagne">
    </div>
    <section class="container-hero">
        <div class="hero">
            <h1 class="hero__title"><span class="maj-title">P</span>réparation à l'examen<br><span class="maj-title">T</span>élépilote de drone civil</h1>
            <ul class="hero__list">
                <li class="hero__list__item" id="translate1"><h2>Un cours abordable et structuré conforme au programme de la DGAC</h2></li>
                <li class="hero__list__item" id="translate2"><h2>900 Questions à choix multiples pour vous préparer à votre examen</h2></li>
                <li class="hero__list__item" id="translate3"><h2>Analyse de vos performances et examens blancs illimités</h2></li>
            </ul>
        </div>
        <nav class="principal-nav" id="translate4">
            <div id="button-courses" class="principal-nav__button principal-nav__button--blue" onclick="redirect('<?= $router->generate('lessonModuleList') ?>')">
                <span id="span-courses" class="principal-nav__button__text">Accédez aux cours</span>
            </div>
            <div id="button-QCM" class="principal-nav__button principal-nav__button--orange" onclick="redirect('<?= $router->generate('questionModuleList') ?>')">
                <span id="span-QCM" class="principal-nav__button__text">Accédez aux QCM</span>
            </div>
        </nav>
    </section>
    <main>
        <section class="home-description">
            <h2 class="home-description__title"><span class="maj-title">Q</span>ui sommes-nous ?</h2>
            <div class="home-description__element">
                <div class="home-description__element__text-container">
                    <p class="home-description__element__text-container__text"><strong>Prepa-drone.fr</strong> est une plateforme en ligne mettant à votre disposition l'ensemble des outils nécessaires à la validation de votre examen théorique de télépilote de drone civil.<br><br>
                    Nous vous proposons un cours abordable et structuré agrémenté de schémas, et plus de 900 questions similaires à celles de votre examen ! A cela s'ajoute des outils d'analyse de vos performances, une assistance en ligne et un accès à des examens blancs en illimités.</p>
                </div>
                <div class="home-description__element__img-container">
                    <img class="home-description__element__img-container__img" src="images/page-description.jpg" alt="Utilisation de drone en ville">
                </div>
            </div>
        </section>
        <div class="free-trial">
            <div id="button-trial" class="principal-nav__button principal-nav__button--orange" onclick="redirect('<?= $router->generate('questionTrialSession') ?>')">
                <span id="span-trial" class="principal-nav__button__text">Essayer gratuitement</span>
            </div>
        </div>
        <div class="key-points">
            <ul class="key-points__container">
                <li class="key-points__container__element">
                    <div class="key-points__container__element__img">
                        <img src="images/mobile.png" alt="Icone téléphone portable">
                    </div>
                    <h3 class="key-points__container__element__title">Disponible sur tablette & mobile</h3>
                    <p class="key-points__container__element__description">Une interface optimale pour utilisation sur ordinateur, tablette et mobile.</p>
                </li>
                <li class="key-points__container__element">
                    <div class="key-points__container__element__img">
                        <img src="images/lesson.png" alt="Icone cours en ligne">
                    </div>
                    <h3 class="key-points__container__element__title">Cours simplifiés datant de 2022</h3>
                    <p class="key-points__container__element__description">Des cours mis-à-jour et adaptés en fonctions des changements législatifs.</p>
                </li>
                <li class="key-points__container__element">
                    <div class="key-points__container__element__img">
                        <img src="images/trial.png" alt="Icone tampon d'essai">
                    </div>
                    <h3 class="key-points__container__element__title">Version gratuite & sans inscription</h3>
                    <p class="key-points__container__element__description">Une session d'essais pour vous conforter dans votre choix.</p>
                </li>
                <li class="key-points__container__element">
                    <div class="key-points__container__element__img">
                        <img src="images/premium.png" alt="Icone couronne">
                    </div>
                    <h3 class="key-points__container__element__title">Accès premium illimité à un prix abordable</h3>
                    <p class="key-points__container__element__description">Un prix unique pour vous permettre de profiter de la plateforme à votre rythme.</p>
                </li>
            </ul>
        </div>
        <section class="home-comments">
            <h2 class="home-comments__title"><span class="maj-title">C</span>ommentaires</h2>
            <div class="home-comments__carousel">
                <div class="comment-box active" id="comment-box-1">
                    <div class="comment-box__header">
                        <div class="comment-box__header__img-container">
                            <img class="comment-box__header__img-container__img cb-img" src="" alt="Photo de profil">
                        </div>
                        <div class="comment-box__header__text">
                            <p class="comment-box__header__text__name cb-name"></p>
                            <p class="comment-box__header__text__title cb-title"></p>
                        </div>
                    </div>
                    <p class="comment-box__opinion cb-opinion"></p>
                    <div class="comment-box__note">
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="" alt="Dernière étoile" class="comment-box__note__star-container__star cb-star">
                        </div>
                    </div>
                </div>
                <div class="comment-box" id="comment-box-2">
                    <div class="comment-box__header">
                        <div class="comment-box__header__img-container">
                            <img class="comment-box__header__img-container__img cb-img" src="" alt="Photo de profil">
                        </div>
                        <div class="comment-box__header__text">
                            <p class="comment-box__header__text__name cb-name"></p>
                            <p class="comment-box__header__text__title cb-title"></p>
                        </div>
                    </div>
                    <p class="comment-box__opinion cb-opinion"></p>
                    <div class="comment-box__note">
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="images/full-star.png" alt="Etoile pleine" class="comment-box__note__star-container__star">
                        </div>
                        <div class="comment-box__note__star-container">
                            <img src="" alt="Dernière étoile" class="comment-box__note__star-container__star cb-star">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="partners">
            <h2 class="partners__title"><span class="maj-title">N</span>os instituts de formation partenaires</h2>
            <ul class="partners__list">
                <li class="partners__list__item">
                    <div class="partners__list__item__img">
                        <img src="images/logo-partenaire.png" alt="">
                    </div>
                </li>
            </ul>
        </section> -->
    </main>

<?php $content = ob_get_clean(); ?>