{% set arr = [
    {id: 'admin-blog', translation: 'blog_admin'},
    {id: 'admin-logout', translation: 'logout'}
] %}

<div class="padding-re">
    <nav class="menu-tab menu-tab-orange text-center menu menu-horizontal menu-drop-down" id="page_admin_menu">
        <ul>
            {% for i in arr %}
            <li>
                <a href="<?php echo $objWBPUrl->getUrlPage(); ?>{{i.id}}/" data-id="{{i.id}}" class="menu-tab-bt bt-re bt">
                    <?php echo $WBPTranslation['{{i.translation | safe}}']; ?>
                </a>
            </li>
            {% endfor %}
        </ul>
    </nav>
</div>