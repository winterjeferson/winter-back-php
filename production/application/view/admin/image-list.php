<?php
$list = 'list' . ucfirst($temp);
?> <div class="col-es-12 col-eb-6"><h2 class="page-title"> <?php echo $arrContent['head']['translation'][$temp]; ?> </h2><div class="padding-bi"><form class="row form form-grey text-left" ]><div class="col-es-12 form-field"><label> <?php
                    if ($temp === 'thumbnail') {
                        echo $arrContent['head']['translation']['recommendedSize150'];
                    } else {
                        echo $arrContent['head']['translation']['recommendedSize1300'];
                    }
                    ?> </label> <input class="custom-file-input" type="file"></div><div class="col-es-12 form-field"><nav class="menu menu-horizontal text-right"><ul><li><button type="button" class="bt bt-re bt-green" data-id="btUpload<?php echo ucfirst($temp); ?>"> <?php echo $arrContent['head']['translation']['send']; ?> </button></li></ul></nav></div></form><div class="padding-bi"><table class="table table-grey thumbnail-table" data-path="blog/<?php echo $temp; ?>"><thead><tr><th><?php echo $arrContent['head']['translation']['image']; ?></th><th><?php echo $arrContent['head']['translation']['name']; ?></th><th><?php echo $arrContent['head']['translation']['menu']; ?></th></tr></thead><tbody> <?php
                    if ($$list['isEmpty']) {
                        $string =  '
                        <tr>
                            <td colspan="3" class="text-center">
                                ' . $arrContent['head']['translation']['emptyList'] . '
                            </td>
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
                                <td data-id="fileName">
                                    ' . $value[1] . '
                                </td>
                                <td class="minimum">
                                    <nav class="menu menu-horizontal text-right">           
                                        <ul>           
                                            <li>
                                                <button type="button" class="bt bt-red bt-sm" data-action="delete" title="' . $arrContent['head']['translation']['delete'] . '">   
                                                    <span class="fa fa-close" aria-hidden="true"></span>
                                                </button>
                                            </li>           
                                        </ul>        
                                    </nav>
                                </td>
                            </tr>
                        ';
                        }

                        echo removeLineBreak($string);
                    }
                    ?> </tbody></table></div></div></div>