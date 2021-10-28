<?php
$list = 'list' . ucfirst($temp);
$size = $temp === 'thumbnail' ? 'recommendedSize150' : 'recommendedSize1300';
?> <div class="row"><h2 class="page__title"><?php echo $translation[$temp]; ?></h2><form class="row form form--grey"><div class="row form__field"><label class="form__label"><?php echo $translation[$size]; ?></label> <input class="form__fill" type="file"></div><div class="row form__field"><div class="button-wrapper row"><button type="button" class="button button--regular button--green" data-id="btUpload<?php echo ucfirst($temp); ?>"> <?php echo $translation['send']; ?> </button></div></div></form><table class="table table--grey thumbnail-table" data-path="blog/<?php echo $temp; ?>"><thead><tr><th><?php echo $translation['image']; ?></th><th><?php echo $translation['name']; ?></th><th><?php echo $translation['menu']; ?></th></tr></thead><tbody> <?php
            if ($$list['isEmpty']) {
                $string =  '
                    <tr>
                        <td colspan="3">' . $translation['emptyList'] . '</td>
                    </tr>
                ';

                echo removeLineBreak($string);
            } else {
                $string = '';

                foreach ($$list['list'] as $key => $value) {
                    $string .= '
                        <tr>
                            <td class="minimum">
                                <img data-src="assets/img/dynamic/blog/' . $value[0] . '/' . $value[1] . '" data-lazy-load="true">
                            </td>
                            <td data-id="fileName">' . $value[1] . '</td>
                            <td class="minimum">
                                <div class="button-wrapper row">
                                    <button type="button" class="button button--small button--small--proportional button--red" data-action="delete" title="' . $translation['delete'] . '">
                                        <span class="fa fa-close" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    ';
                }

                echo removeLineBreak($string);
            }
            ?> </tbody></table></div>