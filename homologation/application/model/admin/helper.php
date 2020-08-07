<?php

function separateList($arrList)
{
    $arrActive = [];
    $arrInactive = [];

    foreach ($arrList as $key => &$value) {
        if ($value['active'] === '1') {
            $arrActive[] = $value;
        } else {
            $arrInactive[] = $value;
        }
    }

    return [
        'active' => $arrActive,
        'inactive' => $arrInactive,
    ];
}
