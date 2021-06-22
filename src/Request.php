<?php

namespace MVC;

class Request
{
    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $controller;

    /**
     * @var string
     */
    public $action;

    /**
     * @var array
     */
    public $params;

    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
    }
}
