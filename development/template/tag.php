{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['tag']; ?>
</h1>
<div class="row">
    <div class="col-es-12">
        <ul class="tag-list">
            {% for color in arrColor %}
            <li>
                <div class="tag-item tag-{{color}}">
                    <span class="text">tag-{{color}}</span>
                </div>
            </li>
            {% endfor %}
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-es-12">
        <ul class="tag-list">
            {% for color in arrColor %}
            <li>
                <div class="tag-item-bt tag-{{color}}">
                    <span class="text">
                        {{color}}
                        <button type="button" class="tag-bt" aria-label="<?php echo $frameworkTranslation['default']['close']; ?>">
                            <span class="fa fa-times" aria-hidden="true"></span>
                        </button>
                    </span>
                </div>
            </li>
            {% endfor %}
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-es-12">
        <ul class="tag-list">
            {% for color in arrColor %}
            <li>
                <div class="tag-item-bt tag-{{color}}">
                    <a href="javascript:;" class="link link-{{color}}">
                        {{color}}
                    </a>
                    <button type="button" class="tag-bt" aria-label="<?php echo $frameworkTranslation['default']['close']; ?>">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </button>
                </div>
            </li>
            {% endfor %}
        </ul>
    </div>
</div>