<?php

namespace lib;

class View
{
    protected $var;

    public function display($fileName, $isReturn = false)
    {
        if ($isReturn) {
            ob_start();
            include T . $fileName . '.php';
            $content = ob_get_contents();
            ob_clean();
            return $content;
        }

        include T . $fileName . '.php';
        exit;
    }

    public function import($fileName)
    {
        include T . $fileName . '.php';
    }

    public function __get($name)
    {
        return $this->var[$name];
    }

    public function __set($name, $value)
    {
        $this->var[$name] = $value;
    }
}