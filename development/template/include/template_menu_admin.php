{% set arrMenu = [
'admin-blog',
'admin-logout'
] %}

<div class="padding-re">
    <nav class="menu-tab menu-tab-blue text-center menu menu-horizontal menu-drop-down">
        <ul>
            {% for menu in arrMenu %}
            <li>
                <a href="<?php echo $objWBPUrl->getUrlPage(); ?>{{menu}}/" data-id="{{menu}}" class="menu-tab-bt bt-re bt">
                    {{menu}}
                </a>
            </li>
            {% endfor %}
        </ul>
    </nav>
</div>