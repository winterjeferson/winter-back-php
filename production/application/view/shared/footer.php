<script>var globalLanguage = '<?php echo $arrContent['head']['lang'] ?>';
            var globalUrl = '<?php echo $arrContent['head']['urlMain'] ?>';
            var globalTranslation = <?php echo $arrContent['head']['translationJson']; ?>;
            var globalToken = '<?php echo $arrContent['head']['token']; ?>';</script><script src="<?php echo $arrContent['head']['urlFrontEnd'] . 'assets/js/wf-plugin.js'; ?>"></script><script src="<?php echo $arrContent['head']['urlMain'] . 'assets/js/wb-theme.js'; ?>"></script> <?php 
        if($arrContent['head']['isAdmin']){
            $string = '';
            
            $string .= '<link href="' . $arrContent['head']['urlMain'] . 'assets/css/wb-admin.css" rel="stylesheet">';
            $string .= '<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>';
            $string .= '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">';
            $string .= '<script src="' . $arrContent['head']['urlMain'] . 'assets/js/wb-admin.js"></script>';

            echo $string;
        }

        if($arrContent['head']['isNoIdex']){
            echo '<meta name="robots" content="noindex">';
        }   
        ?>