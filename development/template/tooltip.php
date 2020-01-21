{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
{% set arrPosition = ['top', 'right', 'bottom', 'left'] %}

<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['tooltip']; ?>
</h1>
<div class="row">
    {% for color in arrColor %}
    <div class="col-es-12 text-center">
        <nav class="menu menu-horizontal">
            <ul>
                {% for position in arrPosition %}
                <li>
                    <a href="javascript:;" class="link link-{{color}} has-tooltip" 
                       title="Lorem <strong class='color-red'>ipsum</strong> dolor sit amet, consecttur adipscing elit. <img src='img/banner/1.png' style='width: 100px; height: auto; padding: 10px;'>" 
                       alt="" data-tooltip-placement="{{position}}" data-tooltip-color="{{color}}">
                        {{color}} - ({{position}})
                    </a>
                </li>
                {% endfor %}
            </ul>
        </nav>
    </div>
    {% endfor %}
</div>