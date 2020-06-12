<?php
require __DIR__ . '/shared/header.php';
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="text-align: center; padding: 20px;">
    <tbody>
        <tr>
            <td>
                <h1 style="text-align: center;  font-family: Arial, Helvetica, sans-serif; color: #626262; font-size: 32px;">
                    <?php echo $arrTranslation['contactForm']; ?>:
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align: left;  font-family: Arial, Helvetica, sans-serif; color: #626262; font-size: 16px;">
                    <b><?php echo $arrTranslation['email']; ?>: </b><?php echo $name; ?>
                </p>
                <p style="text-align: left;  font-family: Arial, Helvetica, sans-serif; color: #626262; font-size: 16px;">
                    <b><?php echo $arrTranslation['message']; ?>: </b><?php echo $message; ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>
<?php
require __DIR__ . '/shared/footer.php';
?>