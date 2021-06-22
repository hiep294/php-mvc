<?php

namespace MVC;

use MVC\Request;
use MVC\Router;

class Dispatcher
{

    /**
     *
     * @var Request
     */
    private $request;

    public function dispatch()
    {
        $this->request = new Request();

        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $name = 'MVC\\Controllers\\' . ucfirst($name);
        $controller = new $name();
        return $controller;
    }
}
