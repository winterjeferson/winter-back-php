<?php

class WBAdminUploadImageList
{
    function buildList($path)
    {
        $string = '';
        $arrFile = $this->getFile($path);

        if (is_null($arrFile)) {
            return $this->buildListEmpty();
        }

        foreach ($arrFile as $key => $value) {
            $string .= $this->buildListHtml($path, $value);
        }

        return $string;
    }

    function buildListHtml($path, $value)
    {
        $string = '';

        $string .= '<tr>';
        $string .= '     <td class="minimum">';
        $string .= '         <img src="img/' . $path . '/' . $value . '">';
        $string .= '     </td>';
        $string .= '     <td>';
        $string .= $value;
        $string .= '     </td>';
        $string .= '</tr>';

        return $string;
    }

    function buildListEmpty()
    {
        $objWbSession = new WbSession();
        $string = '';

        $string .= '<tr>';
        $string .= '    <td colspan="2" class="text-center">';
        $string .=  $objWbSession->getArray('translation', 'emptyList');
        $string .= '    </td>';
        $string .= '</tr>';

        return $string;
    }

    function getFile($path)
    {
        $directory = 'img/' . $path;
        $isDir = is_dir($directory);

        if ($isDir) {
            $scannedDirectory = array_diff(scandir($directory), array('..', '.'));
            return $scannedDirectory;
        }
    }
}
