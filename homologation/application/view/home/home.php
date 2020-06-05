<?php
include __DIR__ . '/../shared/head.php';
include __DIR__ . '/../shared/loading.php';
include __DIR__ . '/../shared/header.php';
?>
<main class="grid">
    <section id="mainMenu" class="grid-menu">
        <?php
        include __DIR__ . '/../shared/menu.php';
        ?>
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageHome" class="row">
            <div class="col-es-12">
                <?php
                include __DIR__ . '/../shared/carousel.php';
                ?>
            </div>
        </div>
    </section>
</main>
<?php
include __DIR__ . '/../shared/signature.php';
include __DIR__ . '/../shared/footer.php';
?>