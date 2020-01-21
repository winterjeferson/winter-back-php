{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
{% set arrStatus = ['', 'active', 'disabled'] %}

<div class="row">
    <div class="col-es-12">
        <h2 class="page-title">
            <?php echo $frameworkTranslation['template']['menu_drop_down']; ?>
        </h2>
    </div>
    <div class="col-es-12 text-center">
        <button type="button" class="bt bt-toggle bt-re bt-white">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <nav class="menu menu-drop-down menu-horizontal">
            <ul>
                <li>
                    <a href="javascript:;" class="bt bt-re bt-blue">Button</a>
                </li>
                <li>
                    <a href="javascript:;" class="bt bt-re bt-green">Drop down</a>
                    <ul>
                        <li>
                            <a href="javascript:;" class="bt bt-re bt-grey">Lorem ipsum</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="bt bt-re bt-grey">Dolor sit amet</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="bt bt-re bt-grey">Consecttur adipscing elit</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="bt bt-re bt-grey">Lorem ipsum</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="bt bt-re bt-grey">Dolor sit amet</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button" class="bt bt-re bt-blue">Button</button>
                </li>
                <li>
                    <button type="button" class="bt bt-re bt-blue" disabled>Button Disabled</button>
                </li>
                <li>
                    <a href="javascript:;" class="bt bt-re bt-blue">Button</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row text-center">
        <nav class="menu menu-vertical menu-drop-down-text">
            <ul>
                <li>
                    <a href="javascript:;" class="link link-blue">Drop Down</a>
                    <ul>
                        <li>
                            <a href="javascript:;" class="link link-black">Lorem ipsum</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="link link-black">Dolor sit amet</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="link link-black">Consecttur adipscing elit</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="link link-blue">Lorem ipsum</a>
                </li>
                <li>
                    <a href="javascript:;" class="link link-blue">Dolor sit amet</a>
                </li>
                <li>
                    <a href="javascript:;" class="link link-blue">Drop Down</a>
                    <ul>
                        <li>
                            <a href="javascript:;" class="link link-black">Lorem ipsum</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="link link-black">Dolor sit amet</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="link link-black">Consecttur adipscing elit</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-es-12">
        <h2 class="page-title">
            <?php echo $frameworkTranslation['template']['menu_tab']; ?>
        </h2>
    </div>
    {% for color in arrColor %}
    <div class="col-es-12">
        <div class="padding-re">
            <nav class="menu-tab menu-tab-{{color}} text-center menu menu-horizontal menu-drop-down">
                <ul>
                    <li class="menu-tab-active">
                        <a href="javascript:;" class="menu-tab-bt bt-re bt">
                            Regular
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-tab-bt bt-re bt">
                            Drop down
                        </a>
                        <ul>
                            <li>
                                <a href="javascript:;" class="bt bt-re">Lorem ipsum</a>
                            </li>
                            <li>
                                <a href="javascript:;" class="bt bt-re">Dolor sit amet</a>
                            </li>
                            <li>
                                <a href="javascript:;" class="bt bt-re">Consecttur adipscing elit</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-tab-bt bt-re bt">
                            Regular
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-tab-bt bt-re bt">
                            Regular
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-tab-bt bt-re bt">
                            Regular
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-tab-bt bt-re bt">
                            Regular
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    {% endfor %}
</div>
{% for size in arrSize %}
{% if size !== 'fu' %}
<div class="row">
    <div class="col-es-12">
        <h2 class="page-title">
            Pagination {{size}}
        </h2>
    </div>
    {% for color in arrColor %}
    <div class="col-es-12">
        <div class="padding-re">
            <nav class="menu menu-horizontal pagination">
                <ul>
                    <li>
                        <a href="javascript:;" class="bt-{{size}} bt bt-{{color}}" aria-label="<?php echo $frameworkTranslation['default']['first_page']; ?>">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bt-{{size}} bt bt-{{color}}" aria-label="<?php echo $frameworkTranslation['default']['previous']; ?>">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bt-{{size}} bt bt-{{color}}">
                            1
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bt-{{size}} bt bt-{{color}} active">
                            2
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bt-{{size}} bt bt-{{color}}">
                            3
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bt-{{size}} bt bt-{{color}}" aria-label="<?php echo $frameworkTranslation['default']['next']; ?>">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bt-{{size}} bt bt-{{color}}" aria-label="<?php echo $frameworkTranslation['default']['last_page']; ?>">
                            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    {% endfor %}
</div>
{% endif %}
{% endfor %}