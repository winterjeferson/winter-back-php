<?php
include __DIR__ . '/admin-layout.php';

function buildListHTML($value, $language, $status)
{
    $thumbnail = !is_null($value['thumbnail']) && $value['thumbnail'] !== '' ? $value['thumbnail'] : 'default.jpg';
    $explodeTag = explode('#',  encode($value['tag_' . $language]));
    $lengthExplode = count($explodeTag);
    $string = '';
    $btActive = $status === 'active' ? buildHTMLBt('active', $value['id']) : buildHTMLBt('inactive', $value['id']);

    $string .= '
            <tr>
                <td class="minimum">' . $value['id'] . '</td>
                <td class="minimum"><img data-src="assets/img/blog/thumbnail/' . $thumbnail . '" data-lazy-load="true"></td>
                <td><b>' . encode($value['title_' . $language]) . '</b></td>
                <td><div class="td-wrapper">' . encode(strip_tags($value['content_' . $language])) . '</div></td>
                <td class="minimum">' . $value['url_' . $language] . '</td>
                <td class="minimum">
        ';

    for ($i = 0; $i < $lengthExplode; $i++) {
        if ($explodeTag[$i] !== '') {
            $string .= '<small>#' . $explodeTag[$i] . '</small>';
            $string .= '<br/>';
        }
    }

    $string .= '
                </td>
                <td class="minimum"><small>' . $value['date_post_' . $language] . '</small></td>
                <td class="minimum"><small>' . $value['date_edit_' . $language] . '</small></td>
                <td class="minimum">
                    <nav class="menu menu-horizontal">
                        <ul>
                            <li>' . buildHTMLBt('edit', $value['id']) . '</li>
                            <li>' . $btActive . '</li>
                            <li>' . buildHTMLBt('delete', $value['id']) . '</li>
                        </ul>
                    </nav>
                </td>
            </tr>
        ';

    return $string;
}

?>



<div class="col-es-12">
    <section id="pageAdminBlogEdit" class="row">
        <?php
        $temp = 'Pt';
        include __DIR__ . '/blog-form.php';
        $temp = 'En';
        include __DIR__ . '/blog-form.php';
        ?>

        <div class="col-es-12" data-id="thumbnailWrapper">
            <div class="padding-bi">
                <div class="card card-es card-grey">
                    <header>
                        <h4>
                            <?php echo $arrContent['head']['translation']['thumbnail']; ?>
                        </h4>
                    </header>
                    <div class="row card-body">
                        <div class="col-es-12">
                            <div class="padding-re">
                                <table class="table table-grey thumbnail-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo $arrContent['head']['translation']['image']; ?></th>
                                            <th><?php echo $arrContent['head']['translation']['name']; ?></th>
                                            <th><?php echo $arrContent['head']['translation']['menu']; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="minimum">
                                                <img src="assets/img/blog/thumbnail/default.jpg" data-id="thumbnail">
                                            </td>
                                            <td data-id="name">
                                                default.jpg
                                            </td>
                                            <td class="minimum">
                                                <nav class="menu menu-horizontal text-right">
                                                    <ul>
                                                        <li>
                                                            <button type="button" class="bt bt-sm bt-blue" data-action="edit" data-tooltip="true" data-tooltip-color="black" title="<?php echo $arrContent['head']['translation']['edit']; ?>">
                                                                <span class="fa fa-pencil" aria-hidden="true"></span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <footer>
                    </footer>
                </div>
            </div>
        </div>

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

    <section id="pageAdminBlogList" class="row">
        <?php
        $temp = 'active';
        include __DIR__ . '/blog-list.php';
        $temp = 'inactive';
        include __DIR__ . '/blog-list.php';
        ?>
    </section>
</div>