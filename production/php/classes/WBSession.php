<?php

class WbSession
{
    public $prefix = 'Wb_';

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
        $_SESSION[$this->prefix . $target] = $value;
    }

    function setArray($target, $value)
    {
        if ($this->verify($target)) {
            array_push($_SESSION[$this->prefix . $target], $value);
        } else {
            $_SESSION[$this->prefix . $target] = [];
            array_push($_SESSION[$this->prefix . $target], $value);
        }
    }

    function get($target)
    {
        if ($this->verify($target)) {
            return $_SESSION[$this->prefix . $target];
        }
    }

    function getArray($array, $target)
    {
        if ($this->verify($array, $target)) {
            return $_SESSION[$this->prefix . $array][$target];
        }
    }

    function start()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    function unset($target = '')
    {
        if ($target === '') {
            session_unset();
        } else {
            unset($_SESSION[$this->prefix . $target]);
        }
    }

    function verify($target)
    {
        if (isset($_SESSION[$this->prefix . $target])) {
            return true;
        } else {
            return false;
        }
    }

    function verifyArray($array, $target)
    {
        if (isset($_SESSION[$this->prefix . $array][$target])) {
            return true;
        } else {
            return false;
        }
    }
}
