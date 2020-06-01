<script>
    var globalLanguage = '<?php //echo $objWbSession->get("language"); ?>';
    var globalUrl = '<?php //echo $objWbUrl->getUrlMain(); ?>';
    var globalTranslation = <?php //echo json_encode($objWbSession->get("translation")); ?>;
</script>
<script src='<?php //echo $urlFrontEnd . 'assets/js/wf-plugin.js'; ?>'></script>
<script src='<?php //echo $mainUrl . 'assets/js/wb-theme.js'; ?>'></script>
<?php
// if ($isAdmin) {
//     echo '<script src="' . $mainUrl . 'assets/js/wb-admin.js"></script>';
// }
?>
</body>

</html>