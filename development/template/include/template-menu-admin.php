{% set arr = [
    {id: 'admin-blog', translation: 'blogAdmin'},
    {id: 'admin-upload-image', translation: 'uploadImage'},
    {id: 'admin-logout', translation: 'logout'}
] %}

<div class="padding-re">
    <nav class="menu-tab menu-tab-orange text-center menu menu-horizontal menu-drop-down" id="pageAdminMenu">
        <ul>
            {% for i in arr %}
            <li>
                <a href="<?php echo $objWbUrl->getUrlPage(); ?>{{i.id}}/" data-id="{{i.id}}" class="menu-tab-bt bt-re bt">
                    <?php echo $WbTranslation['{{i.translation | safe}}']; ?>
                </a>
            </li>
            {% endfor %}
        </ul>
    </nav>
</div>