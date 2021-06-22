<?php

namespace MVC;

class Router
{

    /**
     * @param string $url
     * @param Request $request
     * @return void
     */
    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/MVC/") {
            // homepage, 'MVC' is folder name of this project
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        } else {
            // example url: /MVC/tasks/create/
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }
    }
}
