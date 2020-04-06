<?php
$objWbSession = new WbSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'administrativePanel')
];
?>

{% include "include/verify-login.php" %}
{% include "include/head.php" %}
{% include "include/loading-main.php" %}
<main class="grid">
    {% include "include/template-header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template-menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageAdmin" class="row">
            <div class="col-es-12">
                {% include "include/template-menu-admin.php" %}
            </div>
            <div class="col-es-12">
                <div class="container">
                    <h1 class="page-title"><?php echo $WbTranslation['administrativePanel'] ?></h1>
                    <p class="text-center"><?php echo $WbTranslation['administrativePanelText'] ?></p>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template-footer.php" %}
</main>