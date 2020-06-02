<?php

namespace Application\Model\Shared;

class Head
{
    public function __construct()
    {
    }

    function build()
    {
        $arr = [
            'title' => 'header value',
        ];
        return $arr;
    }
}
