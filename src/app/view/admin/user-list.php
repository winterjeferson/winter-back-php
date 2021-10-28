<?php
$table = 'table' . ucfirst($action);
$list = 'list' . ucfirst($action);
$listSize = count($arrContent['user'][$list]);
$classDisplay = $listSize === 0 ? 'display-none' : '';
?>
<section class="row <?php echo $classDisplay ?>">
    <h2 class="page__title">
        <?php echo $translation['users']; ?> (<?php echo $translation[$action . 's']; ?>)
    </h2>
    <table class="table table--grey" data-id="<?php echo $table; ?>">
        <thead>
            <tr>
                <th>Id</th>
                <th><?php echo $translation['name']; ?></th>
                <th><?php echo $translation['email']; ?></th>
                <th><?php echo $translation['permission']; ?></th>
                <th><?php echo $translation['actions']; ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $string = '';

            foreach ($arrContent['user'][$list] as $key => &$value) {
                $string .= '
                    <tr>
                        <td>' . $value['id'] . '</td>
                        <td>' . $value['name'] . '</td>
                        <td>' . $value['email'] . '</td>
                        <td>' . $translation[$value['permission']] . '</td>
                        <td class="minimum">
                            <div class="button-wrapper row">
                            ' . buildHTMLBt('edit', $value['id']) . '
                            ' . buildHTMLBt($action, $value['id']) . '
                            ' . buildHTMLBt('delete', $value['id']) . '
                            </div>
                        </td>
                    </tr>
                    ';
            }

            echo $string;
            ?>
        </tbody>
    </table>
</section>