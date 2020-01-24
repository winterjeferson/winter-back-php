{% set arrMenu = [
'panel',
'blog'
] %}

<div class="row">
    <div class="col-es-12">
        <button type="button" class="bt bt-re bt-toggle bt-grey" aria-label="<?php echo $frameworkTranslation['default']['menu']; ?>">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <nav class="menu menu-vertical text-center menu-drop-down">
            <ul>
                {% for menu in arrMenu %}
                <li>
                    <a href="<?php echo $objFrameworkUrl->getUrlPage(); ?>{{menu}}/" data-id="{{menu}}" class="bt bt-sm bt-fu bt-blue">
                        {{menu}}
                    </a>
                </li>
                {% endfor %}
            </ul>
        </nav>
    </div>
</div>