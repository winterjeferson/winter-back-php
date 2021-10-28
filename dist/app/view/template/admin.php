<?php
include __DIR__ . '/../shared/head.php';
include __DIR__ . '/../shared/loading.php';
include __DIR__ . '/../admin/admin-layout.php';
?> <main class="grid"> <?php
    include __DIR__ . '/../shared/header.php';
    ?> <section id="mainMenu" class="grid-menu"> <?php
        include __DIR__ . '/../shared/menu.php';
        ?> </section><section id="mainContent" class="grid-content page"><div id="<?php echo $templateId ?>" class="row right"><div class="user"> <?php
                $wellcome = $translation['wellcome'];
                $name = $arrContent['head']['user']['name'];

                echo  $wellcome . ' <strong>' . $name . '</strong>'
                ?>!</div><div class="button-wrapper row center tab tab--blue" id="pageAdminMenu"> <?php
                $string = '';

                foreach ($arrContent['admin']['menu'] as $key => &$value) {
                    $string .= '
                        <a href="' . $urlBackEnd . $lang . '/' . 'admin/' . $value['id'] . '/" data-id="button_admin_' . $value['id'] . '" class="button button--regular button--blue">
                            ' . $translation[$value['translation']] . '
                        </a>
                    ';
                }

                echo removeLineBreak($string);
                ?> </div><div class="row"> <?php
                include __DIR__ . '/../' . $templateFolder . '/' . $templateFile . '.php';
                ?> </div></div></section> <?php
    include __DIR__ . '/../shared/signature.php';
    ?> </main> <?php
include __DIR__ . '/../shared/footer.php';
?>