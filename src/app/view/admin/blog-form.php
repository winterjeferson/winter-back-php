<h1 class="page__title"><?php echo $translation['register']; ?></h1>
<form class="row form form--grey" data-id="formRegister">
    <div class="row">
        <div class="column form__field">
            <label class="form__label"><?php echo $translation['title']; ?></label>
            <input class="form__fill" type="text" data-id="fieldTitle" aria-label="<?php echo $translation['title']; ?>">
        </div>
        <div class="column form__field">
            <label class="form__label"><?php echo $translation['friendlyUrl']; ?></label>
            <input class="form__fill" type="text" data-id="fieldUrl" aria-label="<?php echo $translation['pageAdminBlogTitle']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="column form__field">
            <label class="form__label"><?php echo $translation['tags']; ?></label>
            <input class="form__fill" type="text" data-id="fieldTag" aria-label="<?php echo $translation['pageAdminBlogTagsSeparator']; ?>" placeholder="<?php echo $translation['pageAdminBlogTagsSeparator']; ?>">
        </div>
        <div class="column form__field">
            <label class="form__label"><?php echo $translation['author']; ?></label>
            <select class="form__fill" aria-label="select" data-id="author">
                <?php
                $string = '';

                foreach ($arrContent['blog']['selectAuthor'] as $key => &$valueAuthor) {
                    $string .= '<option value="' . $valueAuthor['id'] . '">' . $valueAuthor['name'] . '</option>';
                }

                echo $string;
                ?>
            </select>
        </div>
        <div class="column form__field">
            <label class="form__label"><?php echo $translation['datePost']; ?></label>
            <input class="form__fill" type="date" data-id="fieldDatePost" aria-label="<?php echo $translation['datePost']; ?>">
        </div>
        <div class="column form__field">
            <label class="form__label"><?php echo $translation['dateEdit']; ?></label>
            <input class="form__fill" type="date" data-id="fieldDateEdit" aria-label="<?php echo $translation['dateEdit']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="column form__field">
            <label class="form__label"><?php echo $translation['content']; ?></label>
            <textarea class="form__fill" id="fieldContent" data-id="fieldContent" aria-label="<?php echo $translation['content']; ?>"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="column form__field" data-id="thumbnailWrapper">
            <label class="form__label"><?php echo $translation['thumbnail']; ?></label>
            <table class="table table--grey thumbnail-table">
                <thead>
                    <tr>
                        <th><?php echo $translation['image']; ?></th>
                        <th><?php echo $translation['name']; ?></th>
                        <th><?php echo $translation['menu']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="minimum">
                            <img src="assets/img/blog-thumbnail.jpg" data-id="thumbnail">
                        </td>
                        <td data-id="name">blog-thumbnail.jpg</td>
                        <td class="minimum">
                            <div class="button-wrapper row">
                                <button type="button" class="button button--small button--small--proportional button--blue" data-action="edit" title="<?php echo $translation['edit']; ?>">
                                    <span class="fa fa-pencil" aria-hidden="true"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>