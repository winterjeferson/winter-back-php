<div class="col-es-12"><div class="container"><div class="row"><div class="col-es-12"><h2 class="page-title"> <?php echo $arrContent['head']['translation']['register']; ?> </h2></div><form class="row form form-grey" data-id="formRegister"><div class="col-es-12 col-eb-3"><div class="form-field"><label><?php echo $arrContent['head']['translation']['name']; ?>:</label> <input type="text" value="" data-id="name"></div></div><div class="col-es-12 col-eb-3"><div class="form-field"><label><?php echo $arrContent['head']['translation']['email']; ?>:</label> <input type="text" value="" data-id="email"></div></div><div class="col-es-12 col-eb-3"><div class="form-field"><label><?php echo $arrContent['head']['translation']['password']; ?>:</label> <input type="password" value="" placeholder="" data-id="password"></div></div><div class="col-es-12 col-eb-3"><div class="form-field"><label><?php echo $arrContent['head']['translation']['permission']; ?>:</label> <select aria-label="select" data-id="permission"> <?php
                            $string = '';

                            foreach ($arrContent['user']['permission'] as $key => &$valuePermission) {
                                $string .= '<option value="' . $valuePermission['value'] . '">' . $valuePermission['text'] . '</option>';
                            }

                            echo $string;
                            ?> </select></div></div><div class="col-es-12"><div class="form-field text-right"><div class="menu menu-horizontal"><ul><li><button type="button" class="bt bt-re bt-blue" data-id="send"> <?php echo $arrContent['head']['translation']['register']; ?> </button></li></ul></div></div></div></form></div></div></div><div class="col-es-12"> <?php
    $action = 'active';
    include __DIR__ . '/user-list.php';
    $action = 'inactive';
    include __DIR__ . '/user-list.php';
    ?> </div>