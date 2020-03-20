{% set arr = [
    {id: 'admin', translation: 'administrativePanel'},
    {id: 'blog', translation: 'blog'}
] %}

<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $WbTranslation['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                {% for i in arr %}
                <li>
                    <a href="<?php echo $objWbUrl->getUrlPage(); ?>{{i.id}}/" data-id="{{i.id}}" class="bt bt-sm bt-fu bt-blue">
                        <?php echo $WbTranslation['{{i.translation | safe}}']; ?>
                    </a>
                </li>
                {% endfor %}
            </ul>
        </nav>
    </div>
</div>