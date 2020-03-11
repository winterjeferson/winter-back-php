<?php

class WBPSession
{

    public function __construct()
    {
        $this->start();
    }

    function clear()
    {
        $_SESSION = [];
    }

    function set($target, $value)
    {
        $_SESSION[$target] = $value;
    }

    function setArray($target, $value)
    {
        if ($this->verify($target)) {
            array_push($_SESSION[$target], $value);
        } else {
            $_SESSION[$target] = [];
            array_push($_SESSION[$target], $value);
        }
    }

    function get($target)
    {
        if ($this->verify($target)) {
            return $_SESSION[$target];
        }
    }

    function getArray($array, $target)
    {
        if ($this->verify($array, $target)) {
            return $_SESSION[$array][$target];
        }
    }

    function start()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    function unset()
    {
        session_unset();
    }

    function verify($target)
    {
        if (isset($_SESSION[$target])) {
            return true;
        } else {
            return false;
        }
    }

    function verifyArray($array, $target)
    {
        if (isset($_SESSION[$array][$target])) {
            return true;
        } else {
            return false;
        }
    }
}
