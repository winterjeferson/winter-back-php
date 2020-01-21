{% from 'include/template_nunjucks.php' import arrColor %}

<section id="page_scroll">
    <h1 class="page-title">
        Scroll
    </h1>
    <div class="row">
        {% for color in arrColor %}
        <div class="col-es-3 col-re-2 col-eb-1">
            <div class="scrollbar scrollbar-style-{{color}}">
                <div class="scrollbar-force-overflow"></div>
            </div>
        </div>
        {% endfor %}
    </div>
</section>
