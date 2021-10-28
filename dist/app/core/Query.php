<?php

namespace  App\Core;

use  Exception;

class Query
{

    public function __construct()
    {
    }

    public function build($query)
    {
        try {
            return $query;
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}
