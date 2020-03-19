<?php

class WbHelp
{

    public function buildJson($array)
    {
        $arr = [];

        foreach ($array as $key => $value) {
            $arr[$key] = is_string($value) ? utf8_encode($value) : $value;
        }

        return json_encode($arr);
    }
}
