{% from 'include/template_nunjucks.php' import arrSize, arrColor %}
<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['form']; ?>
</h1>
<div class="row padding-bi">
    {% for color in arrColor %}
    <div class="col-es-12 col-re-6">
        <form class="row form form-{{color}}">
            <div class="col-es-12 form-field">
                <label>Number</label>
                <input type="number" value="0" aria-label="number"/>
            </div>
            <div class="col-es-12 form-field">
                <label>Color</label>
                <input type="color" aria-label="color"/>
            </div>
            <div class="col-es-12 form-field">
                <label>Text Required</label>
                <input type="text" value="" required aria-label="text required"/>
            </div>
            <div class="col-es-12 form-field">
                <label>Text Menu Hover</label>
                <input type="text" value="" aria-label="text"/>
                <nav class="menu menu-horizontal text-center menu-hover-field">
                    <ul>
                        <li>
                            <button type="button" class="bt bt-sm bt-green" aria-label="<?php echo $frameworkTranslation['default']['add']; ?>">
                                <span class="fa fa-plus" aria-hidden="true"></span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="bt bt-sm bt-red" aria-label="<?php echo $frameworkTranslation['default']['remove']; ?>">
                                <span class="fa fa-minus" aria-hidden="true"></span>
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-es-12 form-field">
                <label>Select</label>
                <select aria-label="select">
                    <option value="0">option 0</option>
                    <option value="1">option 1</option>
                    <option value="2">option 2</option>
                    <option value="3">option 3</option>
                    <option value="4">option 4</option>
                </select>
            </div>
            <div class="col-es-12 form-field">
                <div class="radio" tabindex="0">
                    <input id="radio_1_{{color}}" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_{{color}}" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_{{color}}" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_{{color}}" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_{{color}}" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_{{color}}" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_{{color}}" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_{{color}}" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_{{color}}" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_{{color}}" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_{{color}}" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_{{color}}" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_{{color}}" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_{{color}}" class="checkbox-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <label>E-mail</label>
                <input type="email" value="email@email.com" aria-label="e-mail"/>
            </div>
            <div class="col-es-6 form-field">
                <label>Textarea</label>
                <textarea aria-label="textarea"></textarea> 
            </div>
            <div class="col-es-6 form-field">
                <label>Multiple</label>
                <select multiple="" aria-label="multiple">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="col-es-12 form-field">
                <label>Disabled</label>
                <input type="text" value="disabled" disabled aria-label="text disabled"/>
            </div>
            <div class="col-es-12 form-field">
                <label>File</label>
                <input class="custom-file-input" type="file">
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_1_{{color}}" value="1" checked>
                    <label for="checkbox_switch_1_{{color}}">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_{{color}}" value="2">
                    <label for="checkbox_switch_2_{{color}}">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_{{color}}" value="3" checked>
                    <label for="checkbox_switch_3_{{color}}">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_{{color}}" value="1" checked>
                    <label for="radio_switch_1_{{color}}">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_{{color}}" value="2">
                    <label for="radio_switch_2_{{color}}">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_{{color}}" value="3" checked>
                    <label for="radio_switch_3_{{color}}">Radio Label 3</label>
                </div>
            </div>
            <div class="col-es-4 form-field">
                <label>Mask Number</label>
                <input type="text" value="" aria-label="mask number" data-id="mask_number"/>
            </div>
            <div class="col-es-4 form-field">
                <label>Mask Phone</label>
                <input type="text" value="" aria-label="mask phone" data-id="mask_phone"/>
            </div>
            <div class="col-es-4 form-field">
                <label>Mask CPF</label>
                <input type="text" value="" aria-label="mask cpf" data-id="mask_cpf"/>
            </div>
        </form>
    </div>
    {% endfor %}
</div>