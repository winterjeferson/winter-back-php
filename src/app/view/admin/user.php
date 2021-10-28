<div class="container">
    <div class="row">
        <h2 class="page__title"><?php echo $translation['register']; ?></h2>
        <form class="form form--grey" id="form">
            <div class="row">
                <div class="column form__field">
                    <label class="form__label" for="form_name"><?php echo $translation['name']; ?>:</label>
                    <input class="form__fill" type="text" value="" id="form_name">
                </div>
                <div class="column form__field">
                    <label class="form__label" for="form_email"><?php echo $translation['email']; ?>:</label>
                    <input class="form__fill" type="text" value="" id="form_email">
                </div>
                <div class="column form__field">
                    <label class="form__label" for="form_password"><?php echo $translation['password']; ?>:</label>
                    <input class="form__fill" type="password" value="" placeholder="" id="form_password">
                </div>
                <div class="column form__field">
                    <label class="form__label" for="form_permission"><?php echo $translation['permission']; ?>:</label>
                    <select class="form__fill" aria-label="select" id="form_permission">
                        <?php
                        $string = '';

                        foreach ($arrContent['user']['permission'] as $key => &$valuePermission) {
                            $string .= '<option value="' . $valuePermission['value'] . '">' . $valuePermission['text'] . '</option>';
                        }

                        echo $string;
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <button type="button" class="button button--regular button--blue" id="form_button_send">
                    <?php echo $translation['register']; ?>
                </button>
            </div>
        </form>
    </div>
    <div class="row">
        <?php
        $action = 'active';
        include __DIR__ . '/user-list.php';
        $action = 'inactive';
        include __DIR__ . '/user-list.php';
        ?>
    </div>
</div>