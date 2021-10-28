<?php
include __DIR__ . '/../shared/head.php';
include __DIR__ . '/../shared/loading.php';
?>
<main class="grid">
    <?php
    include __DIR__ . '/../shared/header.php';
    ?>
    <section id="mainMenu" class="grid__menu">
        <?php
        include __DIR__ . '/../shared/menu.php';
        ?>
    </section>
    <article id="<?php echo $templateId ?>" class="grid__content page">
        <?php
        include __DIR__ . '/../' . $templateFolder . '/' . $templateFile . '.php';
        ?>
    </article>
    <?php
    include __DIR__ . '/../shared/signature.php';
    ?>
</main>
<?php
include __DIR__ . '/../shared/footer.php';
?>