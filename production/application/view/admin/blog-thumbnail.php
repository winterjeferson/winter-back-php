<div class="row"><div class="col-es-12"><h1 class="text-center"> <?php
            echo $arrContent['head']['translation']['thumbnail']
            ?> </h1></div></div><div class="row"><table class="table table-grey thumbnail-table"><thead><tr><th><?php echo $arrContent['head']['translation']['image']; ?></th><th><?php echo $arrContent['head']['translation']['name']; ?></th></tr></thead><tbody> <?php
            if ($arrContent['admin']['listThumbnail']['isEmpty']) {
                $string =  '
                        <tr>
                            <td colspan="2" class="text-center">
                                ' . $arrContent['head']['translation']['emptyList'] . '
                            </td>
                        </tr>
                        ';

                echo removeLineBreak($string);
            } else {
                $string = '';

                foreach ($arrContent['admin']['listThumbnail']['list'] as $key => $value) {
                    $string .= '
                            <tr>
                                <td class="minimum">
                                    <button type="button" onclick="objWbAdminBlog.selectImage(this)" >   
                                        <img data-src="assets/img/dynamic/blog/' . $value[0] . '/' . $value[1] . '" data-lazy-load="true">
                                    </button>
                                </td>
                                <td data-id="imageName">
                                    ' . $value[1] . '
                                </td>
                            </tr>
                        ';
                }

                echo $string;
            }
            ?> </tbody></table></div>