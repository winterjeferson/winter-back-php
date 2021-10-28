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
                <td><div class="table-td-wrapper">' . encode(strip_tags($value['content_' . $language])) . '</div></td>
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
?> <section id="pageAdminBlogEdit" class="row"> <?php
    include __DIR__ . '/blog-form.php';
    ?> <div class="row"><button type="button" class="button button--regular button--green" id="btRegister"> <?php echo $translation['save']; ?> </button></div></section><section id="pageAdminBlogList" class="row"> <?php
    $temp = 'active';
    include __DIR__ . '/blog-list.php';
    $temp = 'inactive';
    include __DIR__ . '/blog-list.php';
    ?> </section>