<?php
$objWbSession = new WbSession();
$metaDataCustom = [
    'title' => $objWbSession->getArray('translation', 'metaTitle') . ': ' . $objWbSession->getArray('translation', 'form')
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
        <div id="pageForm" class="container">
            <div class="row">
                <div class="col-es-12">
                    <h1 class="page-title"><?php echo $WbTranslation['form'] ?></h1>
                </div>
                <div class="col-es-12">
                    <form class="row form form-grey">
                        <div class="col-es-12 form-field">
                            <label><?php echo $WbTranslation['email'] ?></label>
                            <input type="text" value="" required aria-label="<?php echo $WbTranslation['email'] ?>" />
                        </div>
                        <div class="col-es-12 form-field">
                            <div class="checkbox" tabindex="0">
                                <input id="checkbox1" name="checkbox" type="checkbox" tabindex="-1">
                                <label for="checkbox1" class="checkbox-label">Checkbox 1</label>
                            </div>
                            <div class="checkbox" tabindex="0">
                                <input id="checkbox2" name="checkbox" type="checkbox" tabindex="-1">
                                <label for="checkbox2" class="checkbox-label">Checkbox 2</label>
                            </div>
                            <div class="checkbox">
                                <input id="checkbox3" name="checkbox" type="checkbox" tabindex="-1">
                                <label for="checkbox3" class="checkbox-label">Checkbox 3</label>
                            </div>
                        </div>
                        <div class="col-es-12 form-field">
                            <label><?php echo $WbTranslation['message'] ?></label>
                            <textarea aria-label="textarea" required></textarea>
                        </div>
                        <div class="col-es-12 form-field text-right">
                            <button type="button" class="bt bt-re bt-blue" id="pageFormBtSend">
                                <?php echo $WbTranslation['send'] ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {% include "include/template-footer.php" %}
</main>