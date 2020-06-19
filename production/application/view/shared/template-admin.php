<?php
include __DIR__ . '/../shared/head.php';
include __DIR__ . '/../shared/loading.php';
?> <main class="grid"> <?php
    include __DIR__ . '/../shared/header.php';
    ?> <section id="mainMenu" class="grid-menu"> <?php
        include __DIR__ . '/../shared/menu.php';
        ?> </section><section id="mainContent" class="grid-content"><div id="<?php echo $arrDefinedVars['data']['content']['id'] ?>" class="row"><div class="col-es-12"><div class="padding-re"><nav class="menu-tab menu-tab-orange text-center menu menu-horizontal menu-drop-down" id="pageAdminMenu"><ul> <?php
                            $arr = [
                                ['id' => 'blog', 'translation' => 'blogAdmin'],
                                ['id' => 'image', 'translation' => 'uploadImage'],
                                ['id' => 'logout', 'translation' => 'logout'],
                            ];
                            $string = '';

                            foreach ($arr as $key => &$value) {
                                $string .= '
                                    <li>
                                        <a href="' . $arrContent['head']['urlMainLanguage'] . 'admin/' . $value['id'] . '" data-id="btAdmin' . ucfirst($value['id']) . '" class="menu-tab-bt bt-re bt">
                                            ' . $arrContent['head']['translation'][$value['translation']] . '
                                        </a>
                                    </li>
                                ';
                            }

                            echo removeLineBreak($string);
                            ?> </ul></nav></div></div><div class="col-es-12"> <?php
                include  __DIR__ . '/../' . $arrDefinedVars['data']['content']['folder'] . '/' . $arrDefinedVars['data']['content']['file'] . '.php';
                ?> </div></div></section> <?php
    include __DIR__ . '/../shared/signature.php';
    ?> </main> <?php
include __DIR__ . '/../shared/footer.php';
?>