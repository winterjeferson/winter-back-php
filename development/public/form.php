
<h1 class="page-title">
    <?php echo $frameworkTranslation['template']['form']; ?>
</h1>
<div class="row padding-bi">
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-blue">
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
                    <input id="radio_1_blue" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_blue" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_blue" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_blue" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_blue" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_blue" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_blue" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_blue" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_blue" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_blue" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_blue" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_blue" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_blue" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_blue" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_blue" value="1" checked>
                    <label for="checkbox_switch_1_blue">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_blue" value="2">
                    <label for="checkbox_switch_2_blue">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_blue" value="3" checked>
                    <label for="checkbox_switch_3_blue">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_blue" value="1" checked>
                    <label for="radio_switch_1_blue">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_blue" value="2">
                    <label for="radio_switch_2_blue">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_blue" value="3" checked>
                    <label for="radio_switch_3_blue">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-green">
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
                    <input id="radio_1_green" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_green" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_green" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_green" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_green" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_green" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_green" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_green" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_green" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_green" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_green" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_green" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_green" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_green" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_green" value="1" checked>
                    <label for="checkbox_switch_1_green">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_green" value="2">
                    <label for="checkbox_switch_2_green">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_green" value="3" checked>
                    <label for="checkbox_switch_3_green">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_green" value="1" checked>
                    <label for="radio_switch_1_green">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_green" value="2">
                    <label for="radio_switch_2_green">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_green" value="3" checked>
                    <label for="radio_switch_3_green">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-cyan">
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
                    <input id="radio_1_cyan" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_cyan" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_cyan" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_cyan" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_cyan" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_cyan" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_cyan" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_cyan" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_cyan" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_cyan" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_cyan" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_cyan" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_cyan" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_cyan" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_cyan" value="1" checked>
                    <label for="checkbox_switch_1_cyan">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_cyan" value="2">
                    <label for="checkbox_switch_2_cyan">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_cyan" value="3" checked>
                    <label for="checkbox_switch_3_cyan">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_cyan" value="1" checked>
                    <label for="radio_switch_1_cyan">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_cyan" value="2">
                    <label for="radio_switch_2_cyan">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_cyan" value="3" checked>
                    <label for="radio_switch_3_cyan">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-red">
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
                    <input id="radio_1_red" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_red" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_red" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_red" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_red" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_red" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_red" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_red" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_red" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_red" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_red" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_red" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_red" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_red" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_red" value="1" checked>
                    <label for="checkbox_switch_1_red">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_red" value="2">
                    <label for="checkbox_switch_2_red">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_red" value="3" checked>
                    <label for="checkbox_switch_3_red">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_red" value="1" checked>
                    <label for="radio_switch_1_red">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_red" value="2">
                    <label for="radio_switch_2_red">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_red" value="3" checked>
                    <label for="radio_switch_3_red">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-orange">
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
                    <input id="radio_1_orange" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_orange" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_orange" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_orange" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_orange" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_orange" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_orange" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_orange" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_orange" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_orange" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_orange" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_orange" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_orange" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_orange" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_orange" value="1" checked>
                    <label for="checkbox_switch_1_orange">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_orange" value="2">
                    <label for="checkbox_switch_2_orange">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_orange" value="3" checked>
                    <label for="checkbox_switch_3_orange">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_orange" value="1" checked>
                    <label for="radio_switch_1_orange">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_orange" value="2">
                    <label for="radio_switch_2_orange">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_orange" value="3" checked>
                    <label for="radio_switch_3_orange">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-purple">
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
                    <input id="radio_1_purple" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_purple" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_purple" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_purple" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_purple" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_purple" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_purple" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_purple" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_purple" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_purple" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_purple" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_purple" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_purple" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_purple" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_purple" value="1" checked>
                    <label for="checkbox_switch_1_purple">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_purple" value="2">
                    <label for="checkbox_switch_2_purple">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_purple" value="3" checked>
                    <label for="checkbox_switch_3_purple">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_purple" value="1" checked>
                    <label for="radio_switch_1_purple">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_purple" value="2">
                    <label for="radio_switch_2_purple">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_purple" value="3" checked>
                    <label for="radio_switch_3_purple">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-pink">
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
                    <input id="radio_1_pink" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_pink" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_pink" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_pink" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_pink" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_pink" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_pink" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_pink" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_pink" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_pink" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_pink" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_pink" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_pink" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_pink" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_pink" value="1" checked>
                    <label for="checkbox_switch_1_pink">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_pink" value="2">
                    <label for="checkbox_switch_2_pink">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_pink" value="3" checked>
                    <label for="checkbox_switch_3_pink">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_pink" value="1" checked>
                    <label for="radio_switch_1_pink">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_pink" value="2">
                    <label for="radio_switch_2_pink">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_pink" value="3" checked>
                    <label for="radio_switch_3_pink">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-yellow">
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
                    <input id="radio_1_yellow" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_yellow" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_yellow" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_yellow" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_yellow" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_yellow" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_yellow" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_yellow" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_yellow" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_yellow" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_yellow" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_yellow" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_yellow" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_yellow" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_yellow" value="1" checked>
                    <label for="checkbox_switch_1_yellow">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_yellow" value="2">
                    <label for="checkbox_switch_2_yellow">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_yellow" value="3" checked>
                    <label for="checkbox_switch_3_yellow">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_yellow" value="1" checked>
                    <label for="radio_switch_1_yellow">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_yellow" value="2">
                    <label for="radio_switch_2_yellow">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_yellow" value="3" checked>
                    <label for="radio_switch_3_yellow">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-brown">
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
                    <input id="radio_1_brown" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_brown" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_brown" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_brown" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_brown" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_brown" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_brown" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_brown" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_brown" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_brown" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_brown" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_brown" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_brown" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_brown" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_brown" value="1" checked>
                    <label for="checkbox_switch_1_brown">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_brown" value="2">
                    <label for="checkbox_switch_2_brown">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_brown" value="3" checked>
                    <label for="checkbox_switch_3_brown">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_brown" value="1" checked>
                    <label for="radio_switch_1_brown">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_brown" value="2">
                    <label for="radio_switch_2_brown">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_brown" value="3" checked>
                    <label for="radio_switch_3_brown">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-black">
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
                    <input id="radio_1_black" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_black" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_black" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_black" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_black" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_black" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_black" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_black" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_black" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_black" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_black" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_black" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_black" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_black" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_black" value="1" checked>
                    <label for="checkbox_switch_1_black">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_black" value="2">
                    <label for="checkbox_switch_2_black">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_black" value="3" checked>
                    <label for="checkbox_switch_3_black">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_black" value="1" checked>
                    <label for="radio_switch_1_black">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_black" value="2">
                    <label for="radio_switch_2_black">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_black" value="3" checked>
                    <label for="radio_switch_3_black">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-grey">
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
                    <input id="radio_1_grey" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_grey" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_grey" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_grey" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_grey" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_grey" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_grey" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_grey" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_grey" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_grey" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_grey" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_grey" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_grey" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_grey" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_grey" value="1" checked>
                    <label for="checkbox_switch_1_grey">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_grey" value="2">
                    <label for="checkbox_switch_2_grey">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_grey" value="3" checked>
                    <label for="checkbox_switch_3_grey">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_grey" value="1" checked>
                    <label for="radio_switch_1_grey">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_grey" value="2">
                    <label for="radio_switch_2_grey">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_grey" value="3" checked>
                    <label for="radio_switch_3_grey">Radio Label 3</label>
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
    
    <div class="col-es-12 col-re-6">
        <form class="row form form-white">
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
                    <input id="radio_1_white" name="radio" type="radio" tabindex="-1" checked="checked">
                    <label for="radio_1_white" class="radio-label">Checked</label>
                </div>
                <div class="radio" tabindex="0">
                    <input id="radio_2_white" name="radio" type="radio" tabindex="-1">
                    <label  for="radio_2_white" class="radio-label">Unchecked</label>
                </div>
                <div class="radio">
                    <input id="radio_3_white" name="radio" type="radio" tabindex="-1" disabled>
                    <label for="radio_3_white" class="radio-label">Disabled</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_1_white" name="checkbox" type="checkbox" checked="checked" tabindex="-1">
                    <label for="checkbox_1_white" class="checkbox-label">Checked</label>
                </div>
                <div class="checkbox" tabindex="0">
                    <input id="checkbox_2_white" name="checkbox" type="checkbox" tabindex="-1">
                    <label for="checkbox_2_white" class="checkbox-label">Unchecked</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_3_white" name="checkbox" type="checkbox" disabled="disabled" tabindex="-1">
                    <label for="checkbox_3_white" class="checkbox-label">Disabled</label>
                </div>
                <div class="checkbox">
                    <input id="checkbox_4_white" name="checkbox" type="checkbox" disabled="disabled" checked="checked" tabindex="-1">
                    <label for="checkbox_4_white" class="checkbox-label">Disabled</label>
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
                    <input type="checkbox" id="checkbox_switch_1_white" value="1" checked>
                    <label for="checkbox_switch_1_white">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_2_white" value="2">
                    <label for="checkbox_switch_2_white">Checkbox</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="checkbox" id="checkbox_switch_3_white" value="3" checked>
                    <label for="checkbox_switch_3_white">Checkbox</label>
                </div>
            </div>
            <div class="col-es-12 form-field">
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_1_white" value="1" checked>
                    <label for="radio_switch_1_white">Radio Label 1</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_2_white" value="2">
                    <label for="radio_switch_2_white">Radio Label 2</label>
                </div>
                <div class="input-switch" tabindex="0">
                    <input type="radio" name="radio_switch" id="radio_switch_3_white" value="3" checked>
                    <label for="radio_switch_3_white">Radio Label 3</label>
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
    
</div>