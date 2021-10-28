<div class="container">
    <form class="form black">
        <h1 class="page__title"><?php echo $translation['form'] ?></h1>
        <div class="row form__field">
            <label class="form__label" for="formEmail"><?php echo $translation['email'] ?></label>
            <input class="form__fill" data-id="email" id="formEmail" type="email" maxlength="40" placeholder="<?php echo $translation['email']; ?>">
        </div>
        <div class="row form__field">
            <label class="form__label" for="formMessage"><?php echo $translation['message'] ?></label>
            <textarea class="form__fill" data-id="message" aria-label="textarea" required></textarea>
        </div>
        <div class="row form__field">
            <button type="button" class="button button--regular button--blue" id="pageFormBtSend">
                <?php echo $translation['send'] ?>
            </button>
        </div>
    </form>
</div>