<div class="col-es-12 col-eb-6"><div class="padding-bi"><div class="card card-es card-grey"><header><h4> <?php echo $arrContent['head']['translation'][$temp]; ?> </h4></header><div class="row card-body"><div class="col-es-12"><div class="padding-re"><form class="row form form-grey text-left" ]><div class="col-es-12 form-field"><label> <?php
                                    if ($temp === 'thumbnail') {
                                        echo $arrContent['head']['translation']['recommendedSize150'];
                                    } else {
                                        echo $arrContent['head']['translation']['recommendedSize1300'];
                                    }
                                    ?> </label> <input class="custom-file-input" type="file"></div><div class="col-es-12 form-field"><nav class="menu menu-horizontal text-right"><ul><li><button type="button" class="bt bt-re bt-green" data-id="btUpload<?php echo ucfirst($temp); ?>"> <?php echo $arrContent['head']['translation']['send']; ?> </button></li></ul></nav></div></form></div></div><div class="col-es-12"><div class="padding-bi"><div class="table-wrapper"><table class="table table-grey thumbnail-table" data-path="blog/<?php echo $temp; ?>"><thead><tr><th><?php echo $arrContent['head']['translation']['image']; ?></th><th><?php echo $arrContent['head']['translation']['name']; ?></th><th><?php echo $arrContent['head']['translation']['menu']; ?></th></tr></thead><tbody> <?php
                                    $list = 'list' . ucfirst($temp);
                                    echo $$list;
                                    ?> </tbody></table></div></div></div></div><footer></footer></div></div></div>