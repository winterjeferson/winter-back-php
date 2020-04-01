<?php

class WbAdminUploadImageList
{
    function buildList($path)
    {
        $objWbSession = new WbSession();
        $string = '';
        $arrFile = $this->getFile($path);

        if (is_null($arrFile)) {
            return $this->buildListEmpty();
        }

        foreach ($arrFile as $key => $value) {
            if ($value !== 'default.jpg') {
                $string .= $this->buildListHtml($objWbSession, $path, $value);
            }
        }

        return $string;
    }

    function buildListHtml($objWbSession, $path, $value)
    {
        $string = '
            <tr>
                <td class="minimum">
                    <img src="img/' . $path . '/' . $value . '">
                </td>
                <td data-id="fileName">
                    ' . $value . '
                </td>
                <td class="minimum">
                    <nav class="menu menu-horizontal text-right">           
                        <ul>           
                            <li>
                                <button type="button" class="bt bt-red bt-sm has-tooltip" data-action="delete" data-tooltip="true" data-tooltip-color="black" title="' . $objWbSession->getArray('translation', 'delete') . '">   
                                    <span class="fa fa-close" aria-hidden="true"></span>
                                </button>
                            </li>           
                        </ul>        
                    </nav>
                </td>
            </tr>
        ';

        return $string;
    }

    function buildListEmpty()
    {
        $objWbSession = new WbSession();
        $string = '
            <tr>
                <td colspan="2" class="text-center">
                ' . $objWbSession->getArray('translation', 'emptyList') . '
                </td>
            </tr>
        ';

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
