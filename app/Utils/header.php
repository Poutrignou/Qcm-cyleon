<header>
    <nav class="nav-container">
        <div class="nav-container__box-logo">
            <img src="/no_wayste_mvc/public/image/logo-no-wayste.jpg" alt="image logo">
            <h1 class="nav-container__box-logo__title">No Wayste</h1>
        </div>
        <div class="nav-container__box-links">
            <?php if(isset($_SESSION['userId'])): ?>
                <a  class="nav-container__box-links__nav-link-home " href="<?= $router->generate('appliDisplay') ?>">Accueil</a>
                <a  class="nav-container__box-links__nav-link-scan " href="<?= $router->generate('appliScan') ?>">Scan</a>
                <a  class="nav-container__box-links__nav-link-deco " href="<?= $router->generate('administrativeProfil') ?>">Profil</a>
            <?php endif; ?>
        </div>
    </nav>
</header>