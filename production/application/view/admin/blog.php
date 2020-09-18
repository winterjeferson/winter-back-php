<?php
function buildListHTML($value, $language, $status)
{
    $thumbnail = !is_null($value['thumbnail']) && $value['thumbnail'] !== '' ? 'dynamic/blog/thumbnail/' . $value['thumbnail'] : 'blog-thumbnail.jpg';
    $explodeTag = explode('#',  encode($value['tag_' . $language]));
    $lengthExplode = count($explodeTag);
    $string = '';
    $btActive = $status === 'active' ? buildHTMLBt('active', $value['id']) : buildHTMLBt('inactive', $value['id']);

    $string .= '
            <tr>
                <td class="minimum">' . $value['id'] . '</td>
                <td class="minimum"><img data-src="assets/img/' . $thumbnail . '" data-lazy-load="true"></td>
                <td><b>' . encode($value['title_' . $language]) . '</b></td>
                <td class="minimum">' . $value['view'] . '</td>
                <td class="minimum">' . $value['name'] . '</td>
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
?> <div class="col-es-12"><section id="pageAdminBlogEdit" class="row"> <?php
        include __DIR__ . '/blog-form.php';
        ?> <div class="col-es-12 form-field"><nav class="menu menu-horizontal text-right"><ul><li><button type="button" class="bt bt-re bt-green" data-id="btRegister"> <?php echo $arrContent['head']['translation']['save']; ?> </button></li></ul></nav></div></section><section id="pageAdminBlogList" class="row"> <?php
        $temp = 'active';
        include __DIR__ . '/blog-list.php';
        $temp = 'inactive';
        include __DIR__ . '/blog-list.php';
        ?> </section></div>