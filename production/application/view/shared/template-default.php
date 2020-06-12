<?php
include __DIR__ . '/../shared/head.php';
include __DIR__ . '/../shared/loading.php';
?>
<main class="grid">
    <?php
    include __DIR__ . '/../shared/header.php';
    ?>
    <section id="mainMenu" class="grid-menu">
        <?php
        include __DIR__ . '/../shared/menu.php';
        ?>
    </section>
    <section id="mainContent" class="grid-content">
        <div id="<?php echo $arrDefinedVars['data']['content']['id'] ?>" class="row">
            <div class="col-es-12">
                <?php
                include  __DIR__ . '/../' . $arrDefinedVars['data']['content']['folder'] . '/' . $arrDefinedVars['data']['content']['file'] . '.php';
                ?>
            </div>
        </div>
    </section>
    <?php
    include __DIR__ . '/../shared/signature.php';
    ?>
</main>
<?php
include __DIR__ . '/../shared/footer.php';
?>