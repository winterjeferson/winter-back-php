<html xmlns="http://www.w3.org/1999/xhtml"> <?php
require_once __DIR__ . '/../../../../core/Session.php';

$objSession = new App\Core\Session();
$language = $objSession->get('language');

require_once __DIR__ . '/../../../../translation/' . ucfirst($language) . '.php';

$class = '\\App\Translation\\' . ucfirst($language);
$obj = new $class();
$translation = $obj->translation;
?> <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title></title></head><body><center><table width="600" border="0" cellpadding="0" cellspacing="0" style="text-align: center; border: 1px solid #cccccc;"><tbody><tr><td></td></tr></tbody></table></center></body></html>