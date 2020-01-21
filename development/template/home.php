{% set arrSlide = [
['PHP, Javascript / JQuery, SASS,  Gulp JS, Nunjuck, Font Awasome' , 'cyan'],
['ES(extra small), SM(small), RE(regular), BI(big), EB(extra big) e FU(full)' , 'orange'],
['Admin / Friendly URLs' , 'purple']
] %}

<div id="page_home" class="row">
    <div class="col-es-12">
        <div class="carousel" data-current-slide="0">
            <div class="row carousel-slide">
                <div class="col-es-12">
                    <ul class="carousel-list">
                        {% for slide in arrSlide %}
                        <li>
                            <div class="slide bg-{{slide[1]}}">
                                <div class="col-middle slide-content">
                                    {{slide[0]}}
                                </div>
                            </div>
                        </li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
            <div class="menu-horizontal carousel-disabled">
                <ul class="navigation-arrow">
                    <li>
                        <button type="button" class="bt bt-big" data-id="nav-left" aria-label="<?php echo $frameworkTranslation['default']['previous']; ?>">
                            <span class="fa fa-angle-left fa-4x" aria-hidden="true"></span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="bt bt-big" data-id="nav-right" aria-label="<?php echo $frameworkTranslation['default']['previous']; ?>" >
                            <span class="fa fa-angle-right fa-4x" aria-hidden="true"></span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="menu-horizontal text-center carousel-controller-over">
                <ul class="carousel-controller carousel-controller-white">
                </ul>
            </div>
        </div>
    </div>
</div>