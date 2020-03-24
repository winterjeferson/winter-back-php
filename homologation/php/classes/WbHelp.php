<?php

class WbHelp
{

    public function buildJson($array)
    {
        $arr = [];

        foreach ($array as $key => $value) {
            $arr[$key] = is_string($value) ? $this->encode($value) : $value;
        }

        return json_encode($arr);
    }

    public function verifyLocalhost()
    {
        getcwd();
        $isLocalhost = filter_input(INPUT_SERVER, 'HTTP_HOST') === 'localhost' ? true : false;

        return $isLocalhost;
    }

    public function encode($text)
    {
        return iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text);
    }
}
