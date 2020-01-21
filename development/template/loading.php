{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
{% set arrSpinner = ['fa-spinner','fa-refresh','fa-cog','fa-circle-o-notch'] %}

<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['loading']; ?> (Font Aewsome)
</h1>
<div class="row text-center">
    {% for i in arrSpinner %}
    <div class="col-es-12">
        {% for j in arrColor %}
        <span class="fa {{i}} fa-spin fa-2x color-{{j}}"></span>
        {% endfor %}
    </div>
    {% endfor %}
</div>
<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['loading']; ?> (HTML)
</h1>
<div class="row text-center">
    <div class="col-es-12">
        {% for i in arrColor %}
        <div class="fa-spin loading-sm loading-1 loading-1-{{i}}"></div>
        {% endfor %}
    </div>
    <div class="col-es-12">
        {% for i in arrColor %}
        <div class="loading-3 loading-3-{{i}}"></div>
        {% endfor %}
    </div>
    <div class="col-es-12">
        {% for i in arrColor %}
        <div class="loading-4 loading-4-{{i}}"></div>
        {% endfor %}
    </div>
    <div class="col-es-12">
        {% for i in arrColor %}
        <div class="loading-5 loading-5-{{i}}"></div>
        {% endfor %}
    </div>
    <div class="col-es-12">
        {% for i in arrColor %}
        <div class="loading-6 loading-6-{{i}}"></div>
        {% endfor %}
    </div>
    <div class="col-es-12">
        {% for i in arrColor %}
        <div class="loading-2 loading-2-{{i}}"></div>
        {% endfor %}
    </div>
</div>