     <script>
        var globalLanguage = '<?php echo $arrContent['head']['urlMain'] ?>';
        var globalUrl = '<?php echo $arrContent['head']['lang'] ?>';
        var globalTranslation = <?php echo $arrContent['head']['translationJson']; ?>;
    </script>
    <script src='<?php echo $arrContent['head']['urlFrontEnd'] . 'assets/js/wf-plugin.js'; ?>'></script>
    <script src='<?php echo $arrContent['head']['urlMain'] . 'assets/js/wb-theme.js'; ?>'></script>
</body>

</html>