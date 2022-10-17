<?php
$title = "Prepa Drone | Préparation à l'examen Télépilote de drone";
$description = "Avec Prepa Drone, ...";
$otherMeta = "<script src=\"script/quagga.min.js\" defer></script>
<script src=\"script/scaner.js\" defer></script>
<script src=\"script/api.js\" defer></script>";
?>

<?php ob_start(); ?>
    <div class="main">


        <aside class="main__aside">
            <div class="main__aside__container">
                <!-- <div id="tutu" class="main__aside__container__resultat"></div> -->
                <div class="main__aside__container__box-camera">
                    <div id="camera" class="main__aside__container__box-camera__cam"></div>
                </div>
                <div class="main__aside__container__carte">
                    <div  id="box-img" class="main__aside__container__carte__image"></div>
                    <div class="main__aside__container__carte__body">
                        <div class="main__aside__container__carte__body__first">
                            <div id="box-name"  class="main__aside__container__carte__body__first__name"></div>
                            <div  id="box-nutri" class="main__aside__container__carte__body__first__nutriScore"></div>
                        </div>
                        <hr>
                        <form action="<?= $router->generate('appliScanTreatment') ?>" method="POST">
                            <input id="barCode" name="barCode" type="hidden" required>
                            <p class="main__aside__container__carte__body__text">Entrez la date limite de consommation:</p>
                            <input class="main__aside__container__carte__body__inp" type="date" name="dlc" min="<?= date("Y-m-d") ?>" required>
                            <div  class="main__aside__container__carte__body__buttons">
                                <button class="main__aside__container__carte__body__buttons__validez" type="submit" name="valider">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </aside>


        <section class="main__section">
            <div class="main__section__container">     
                <?php foreach($daysProducts as $daysProduct): ?> 
                    <div class="main__section__container__card product">
                        <div class="main__section__container__card__image" >
                        <img src="" alt="image de produit">
                        </div>
                        <div class="main__section__container__card__text">
                            <h5><?= $daysProduct->p_bar_code ?></h5>
                            <p><?= date('d-m-Y', strtotime($daysProduct->up_use_by_date)) ?></p>
                        </div>
                        <div class="main__section__container__card__btn">
                            <a href="<?= $router->generate('appliDeleteProductScan', ['id'=> $daysProduct->up_id ]) ?>"><img src="image/delete-icon.png" alt=""></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>


    </div>

<?php $content = ob_get_clean(); ?>