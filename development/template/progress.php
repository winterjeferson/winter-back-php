{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
{% for size in arrSize %}

<h1 class="page-title">
    {% if size !== 'fu' %}
    <?php echo $frameworkTranslation['template']['progress_es']; ?> ({{size}})
    {% endif %}
</h1>
<div class="row">
    {% for color in arrColor %}
    <div class="col-es-3">
        <div class="padding-re">
            {% if size !== 'fu' %}
            <div class="progress progress-style-{{color}} progress-{{size}}">
                <div class="progress-bar" style="width: 80%"></div>
            </div>
            {% endif %}
        </div>
    </div>
    {% endfor %}
</div>
{% endfor %}