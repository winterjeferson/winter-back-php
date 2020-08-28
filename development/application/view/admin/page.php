<?php
function buildListHTML($value, $language, $status)
{
    $string = '';
    $btActive = $status === 'active' ? buildHTMLBt('active', $value['id']) : buildHTMLBt('inactive', $value['id']);

    $string .= '
            <tr>
                <td class="minimum">' . $value['id'] . '</td>
                <td><b>' . encode($value['title']) . '</b></td>
                <td>' . $value['menu'] . '</td>
                <td><div class="td-wrapper">' . encode(strip_tags($value['content'])) . '</div></td>
                <td class="minimum">' . $value['url'] . '</td>
                <td class="minimum">
                    <div class="menu menu-horizontal">
                        <ul>
                            <li>' . buildHTMLBt('edit', $value['id']) . '</li>
                            <li>' . $btActive . '</li>
                            <li>' . buildHTMLBt('delete', $value['id']) . '</li>
                        </ul>
                    </div>
                </td>
            </tr>
        ';

    return removeLineBreak($string);
}
?>



<div class="col-es-12">
    <section id="pageAdminPageEdit" class="row">
        <?php
        include __DIR__ . '/page-form.php';
        ?>

        <div class="col-es-12 form-field">
            <nav class="menu menu-horizontal text-right">
                <ul>
                    <li>
                        <button type="button" class="bt bt-re bt-green" data-id="btRegister">
                            <?php echo $arrContent['head']['translation']['save']; ?>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

    </section>

    <section id="pageAdminPageList" class="row">
        <?php
        $temp = 'active';
        include __DIR__ . '/page-list.php';
        $temp = 'inactive';
        include __DIR__ . '/page-list.php';
        ?>
    </section>
</div>