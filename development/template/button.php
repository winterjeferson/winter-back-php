{% from 'include/template_nunjucks.php' import arrSize, arrColor %}

<div class="row">
    {% for size in arrSize %}
    <div class="col-es-12 text-center">
        <h1 class="page-title">
            <?php echo $frameworkTranslation['template']['button']; ?> ({{size}})
        </h1>
        <nav class="menu {% if size === 'fu' %}menu-vertical{% else %}menu-horizontal{% endif %}">
            <ul>
                {% for color in arrColor %}
                <li>
                    <button type="button" class="bt bt-{{size}} bt-{{color}}">
                        bt bt-{{size}} bt-{{color}}
                    </button>
                </li>
                {% endfor %}
            </ul>
        </nav>
    </div>
    {% endfor %}
</div>
<div class="row">
    {% for size in arrSize %}
    <div class="col-es-12">
        <div class="col-es-12">
            <h2 class="page-title">
                <?php echo $frameworkTranslation['template']['button_outline']; ?> ({{size}})
            </h2>
        </div>
        <nav class="menu {% if size === 'fu' %}menu-vertical{% else %}menu-horizontal{% endif %} text-center">
            <ul>
                {% for color in arrColor %}
                <li>
                    <button type="button" class="bt bt-{{size}} bt-outline bt-outline-{{color}}">
                        bt bt-{{size}} bt-outline bt-outline-{{color}}
                    </button>
                </li>
                {% endfor %}
            </ul>
        </nav>
    </div>
    {% endfor %}
</div>
<div class="row">
    <div class="col-es-12">
        <h2 class="page-title">
            <?php echo $frameworkTranslation['template']['button_link']; ?>
        </h2>
    </div>
    <div class="col-es-12 text-center">
        <nav class="menu menu-horizontal">
            <ul>
                {% for color in arrColor %}
                <li>
                    <a href="javascript:;"  class="link link-{{color}}">
                        link-{{color}}
                    </a>
                </li>
                {% endfor %}
            </ul>
        </nav>
    </div>
</div>

{% set arrSocial = [
['facebook', 'fa-facebook'],
['twitter', 'fa-twitter'],
['youtube', 'fa-youtube-play'],
['linkedin', 'fa-linkedin'], 
['pinterest', 'fa-pinterest-p'],
['instagram', 'fa-instagram']
] %}

<div class="row">
    <h2 class="page-title">
        <?php echo $frameworkTranslation['template']['button_social']; ?>
    </h2>
</div>
<div class="row">
    {% for size in arrSize %}
    <div class="col-es-12 text-center">
        <nav class="menu menu-horizontal">
            <ul>
                {% for name, icon in arrSocial %}
                {% if size !== 'fu' %}
                <li>
                    <a href="javascript:;" rel="noopener" class="bt bt-{{size}} bt-square-{{size}} bt-{{name}}" aria-label="{{name}}" >
                        <span class="fa fa-fw {{icon}}" aria-hidden="true"></span>
                    </a>
                </li>
                {% endif %}
                {% endfor %}
            </ul>
        </nav>
    </div>
    {% endfor %}
</div>