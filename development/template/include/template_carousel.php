<div class="carousel" data-current-slide="0">
    <div class="row carousel-slide">
        <div class="col-es-12">
            <ul class="carousel-list">
                {% set arr = [
                    {color: 'cyan', translation: 'page_initial_language'},
                    {color: 'orange', translation: 'blog'},
                    {color: 'red', translation: 'friendly_url'}
                ] %}
                {% for i in arr %}
                <li>
                    <div class="slide bg-{{i.color}}">
                        <div class="col-middle slide-content">
                            <?php echo $WBTranslation['{{i.translation | safe}}']; ?>
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
                <button type="button" class="bt bt-big" data-id="nav-left" aria-label="<?php echo $WBTranslation['previous']; ?>">
                    <span class="fa fa-angle-left fa-4x" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button type="button" class="bt bt-big" data-id="nav-right" aria-label="<?php echo $WBTranslation['next']; ?>">
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