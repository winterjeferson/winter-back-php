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
                <td><div class="table-td-wrapper">' . encode(strip_tags($value['content'])) . '</div></td>
                <td class="minimum">' . $value['url'] . '</td>
                <td class="minimum">
                    <div class="button-wrapper row">
                    ' . buildHTMLBt('edit', $value['id']) . '
                    ' . $btActive . '
                    ' . buildHTMLBt('delete', $value['id']) . '
                    </div>
                </td>
            </tr>
        ';

    return removeLineBreak($string);
}
?>

<section id="pageAdminPageEdit" class="row">
    <?php
    include __DIR__ . '/page-form.php';
    ?>

    <div class="row">
        <button type="button" class="button button--regular button--green" id="btRegister">
            <?php echo $translation['save']; ?>
        </button>
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