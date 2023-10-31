<?php

namespace Iorp\Cluster\Modules;

class Extension{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function sayHello()
    {
        return "Hello, " . $this->message;
    }
}

class Extensions{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function sayHello()
    {
        return "Hello, " . $this->message;
    }
}

?>