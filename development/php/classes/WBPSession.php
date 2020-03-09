<?php

class WBPSession {

    public function __construct() {
        $this->startSession();
    }

    function clearSession() {
        $_SESSION = array();
    }

    function setSession($target, $value) {
        $_SESSION[$target] = $value;
    }

    function setSessionArray($target, $value) {
        if ($this->verifyIsSet($target)) {
            array_push($_SESSION[$target], $value);
        } else {
            $_SESSION[$target] = array();
            array_push($_SESSION[$target], $value);
        }
    }

    function getSessionValue($target) {
        return $_SESSION[$target];
    }

    function startSession() {
        if (session_id() == '') {
            session_start();
        }
    }

    function unsetSession() {
        session_unset();
    }

    function verifyIsSet($target) {
        if (isset($_SESSION[$target])) {
            return true;
        } else {
            return false;
        }
    }

}
