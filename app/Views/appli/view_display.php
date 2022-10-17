<?php
$title = "Prepa Drone | Préparation à l'examen Télépilote de drone";
$description = "Avec Prepa Drone, ...";
$otherMeta = "<script src=\"script/display_products.js\" defer></script>";
?>

<?php ob_start(); ?>
    <div class="body-display">
         <div class="main2">
            <section class="main__section2">
                    <div class="main__section__container  affichage">     
                        <?php foreach($products as $product): ?>
                            <div class="main__section__container__card product">
                                <div class="main__section__container__card__image" >
                                    <img id="image" src="" alt="image de produit">
                                </div>
                                <div class="main__section__container__card__text">
                                    <h5><?= $product->p_bar_code ?></h5>                                
                                    <p class="main__section__container__card__text__date main__section__container__card__text__date--<?= $product->color ?>"><?= date('d-m-Y', strtotime($product->up_use_by_date)) ?></p>
                                </div>
                                <div class="main__section__container__card__btn">
                                    <a href="<?= $router->generate('appliDeleteProduct', ['id'=> $product->up_id ]) ?>"><img src="image/delete-icon.png" alt=""></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </section>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>