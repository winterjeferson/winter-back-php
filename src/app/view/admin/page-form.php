 <h2 class="page__title"><?php echo $translation['register']; ?></h2>
 <form class="row form form--grey" data-id="formRegister">
     <div class="row">
         <div class="column form__field">
             <label class="form__label"><?php echo $translation['menu']; ?></label>
             <input class="form__fill" type="text" value="" maxlength="100" data-id="formFieldMenu">
         </div>
         <div class="column form__field">
             <label class="form__label"><?php echo $translation['title']; ?></label>
             <input class="form__fill" type="text" value="" maxlength="100" data-id="formFieldTitle">
         </div>
         <div class="column form__field">
             <label class="form__label"><?php echo $translation['url']; ?></label>
             <input class="form__fill" type="text" value="" maxlength="100" data-id="formFieldUrl">
         </div>
     </div>
     <div class="row">
         <div class="column form__field">
             <label class="form__label"><?php echo $translation['content']; ?></label>
             <textarea class="form__fill" id="fieldContent" data-id="fieldContent" aria-label="<?php echo $arrContent['page']['page']['content']; ?>"></textarea>
         </div>
     </div>
 </form>