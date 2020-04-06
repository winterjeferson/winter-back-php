<?php
$objWbSession = new WbSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'home')
];
?>

{% include "include/head.php" %}
{% include "include/loading-main.php" %}
<main class="grid">
    {% include "include/template-header.php" %}
    <section id="mainMenu" class="grid-menu">
        {% include "include/template-menu.php" %}
    </section>
    <section id="mainContent" class="grid-content">
        <div id="pageHome" class="row">
            <div class="col-es-12">
                {% include "include/template-carousel.php" %}
            </div>
        </div>
    </section>
    {% include "include/template-footer.php" %}
</main>