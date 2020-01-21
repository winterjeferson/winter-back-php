{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
{% set arrColorModifier = ['-darken-15', '-darken-14', '-darken-13', '-darken-12', '-darken-11', '-darken-10', '-darken-9', '-darken-8', '-darken-7', '-darken-6', '-darken-5', '-darken-4', '-darken-3', '-darken-2', '-darken-1', '', '-lighten-1', '-lighten-2', '-lighten-3', '-lighten-4', '-lighten-5', '-lighten-6', '-lighten-7', '-lighten-8', '-lighten-9', '-lighten-10', '-lighten-11', '-lighten-12', '-lighten-13', '-lighten-14', '-lighten-15'] %}

<div class="row" id="page_palette">
    <h1 class="page-title">
        <?php echo $frameworkTranslation['template']['color_palette']; ?>
    </h1>
    <div class="row">
        {% for color in arrColor %}
        <div class="col-es-12">
            {% for modifier in arrColorModifier %}
            <div class="color-{{color}}{{modifier}}" title="color-{{color}}{{modifier}}"></div>
            {% endfor %}
        </div>
        {% endfor %}
    </div>
</div>