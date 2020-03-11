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
        return $_SESSION[$target];
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
}
