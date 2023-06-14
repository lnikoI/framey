<?php


namespace Assistants;

class Superglobal
{
    private $_SERVER;
    private $_POST;
    private $_GET;
    private $_SESSION;

    public function __construct()
    {
        $this->setSuperglobals();
    }

    public function get_SERVER($key = null)
    {
        if (! is_null($key)) {
            return $this->_SERVER[strtoupper($key)] ?? null;
        }

        return $this->_SERVER;
    }

    public function get_POST($key = null)
    {
        if (! is_null($key)) {
            return $this->_POST[strtoupper($key)] ?? null;
        }

        return $this->_POST;
    }

    public function get_GET($key = null)
    {
        if (! is_null($key)) {
            return $this->_GET[strtoupper($key)] ?? null;
        }

        return $this->_GET;
    }

    public function get_SESSION($key = null)
    {
        if (! is_null($key)) {
            return $this->_SESSION[strtoupper($key)] ?? null;
        }

        return $this->_SESSION;
    }

    public function setSuperglobals()
    {
        $this->_SERVER = $_SERVER ?? null;
        $this->_POST = $_POST ?? null;
        $this->_GET = $_GET ?? null;
        $this->_SESSION = $_SESSION ?? null;

    }

    public function unsetSuperglobals()
    {
        unset($_SERVER);
        unset($_POST);
        unset($_GET);
        unset($_SESSION);

    }
}