<div class="col-es-12">
    <div class="padding-bi">
        <div class="card card-es card-grey">
            <header>
                <h4>
                    <?php echo $arrContent['head']['translation']['pageAdminBlogTitle'] . ' (' . ucfirst($arrContent['head']['lang']) . ')' ?>
                </h4>
            </header>
            <div class="row card-body">
                <div class="padding-re">
                    <form class="row form form-grey" data-id="formRegister">
                        <div class="col-es-12 col-eb-6 form-field text-left">
                            <label><?php echo $arrContent['head']['translation']['title']; ?></label>
                            <input type="text" data-id="fieldTitle" aria-label="<?php echo $arrContent['head']['translation']['title']; ?>">
                        </div>
                        <div class="col-es-12 col-eb-6 form-field text-left">
                            <label><?php echo $arrContent['head']['translation']['friendlyUrl']; ?></label>
                            <input type="text" data-id="fieldUrl" aria-label="<?php echo $arrContent['head']['translation']['pageAdminBlogTitle']; ?>">
                        </div>
                        <div class="col-es-12 form-field text-left">
                            <label><?php echo $arrContent['head']['translation']['content']; ?></label>
                            <textarea id="fieldContent" data-id="fieldContent" aria-label="<?php echo $arrContent['head']['translation']['content']; ?>"></textarea>
                        </div>
                        <div class="col-es-12 col-eb-6 form-field text-left">
                            <label><?php echo $arrContent['head']['translation']['tags']; ?></label>
                            <input type="text" data-id="fieldTag" aria-label="<?php echo $arrContent['head']['translation']['pageAdminBlogTagsSeparator']; ?>" placeholder="<?php echo $arrContent['head']['translation']['pageAdminBlogTagsSeparator']; ?>">
                        </div>
                        <div class="col-es-12 col-eb-6 form-field text-left">
                            <label><?php echo $arrContent['head']['translation']['author']; ?></label>
                            <select aria-label="select" data-id="author">
                                <?php
                                $string = '';

                                foreach ($arrContent['blog']['selectAuthor'] as $key => &$valueAuthor) {
                                    $string .= '<option value="' . $valueAuthor['id'] . '">' . $valueAuthor['name'] . '</option>';
                                }

                                echo $string;
                                ?>
                            </select>
                        </div>
                        <div class="col-es-6 form-field text-left">
                            <label><?php echo $arrContent['head']['translation']['datePost']; ?></label>
                            <input type="date" data-id="fieldDatePost" aria-label="<?php echo $arrContent['head']['translation']['datePost']; ?>">
                        </div>
                        <div class="col-es-6 form-field text-left">
                            <label><?php echo $arrContent['head']['translation']['dateEdit']; ?></label>
                            <input type="date" data-id="fieldDateEdit" aria-label="<?php echo $arrContent['head']['translation']['dateEdit']; ?>">
                        </div>
                        <div class="col-es-12 form-field text-left" data-id="thumbnailWrapper">
                            <label><?php echo $arrContent['head']['translation']['thumbnail']; ?></label>
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
                                        <td data-id="name">default.jpg</td>
                                        <td class="minimum">
                                            <nav class="menu menu-horizontal text-right">
                                                <ul>
                                                    <li>
                                                        <button type="button" class="bt bt-sm bt-blue" data-action="edit" title="<?php echo $arrContent['head']['translation']['edit']; ?>">
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
                    </form>
                </div>
            </div>
            <footer>
            </footer>
        </div>
    </div>
</div>