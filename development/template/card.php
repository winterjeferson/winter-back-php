{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
<div class="row text-center">
    {% for size in arrSize %}
    {% if size !== 'fu' %}
    <h1 class="page-title">
        <?php echo $frameworkTranslation['template']['card']; ?> ({{size}})
    </h1>
    <div class="row">
        {% for color in arrColor %}
        <div class="col-es-12 col-sm-4 padding-eb">
            <div class="card card-{{size}} card-{{color}}">
                <header>
                    <h4>{{color}}</h4>
                </header>
                <div class="row card-body">
                    <div class="col-es-12">
                        <img src="img/banner/1.png" class="img-responsive" alt="image">
                        <p class="margin-sm text-left">
                            Lorem ipsum dolor sit amet, consecttur adipscing elit. 
                            Proin ut ni diam. Nam ini pretium ligulas. 
                            Integersda dapibusa id quam non prium! 
                        </p>
                    </div>
                </div>
                <footer>
                    <nav class="menu menu-horizontal">
                        <ul>
                            <li>
                                <button type="button" class="bt bt-{{size}} bt-grey">
                                    bt-{{size}}
                                </button>
                            </li>
                            <li>
                                <button type="button" class="bt bt-{{size}} bt-blue">
                                    bt-{{size}}
                                </button>
                            </li>
                            <li>
                                <button type="button" class="bt bt-{{size}} bt-red">
                                    bt-{{size}}
                                </button>
                            </li>
                        </ul>
                    </nav>
                </footer>
            </div>
        </div>
        {% endfor %}
    </div>
    {% endif %}
    {% endfor %}
</div>