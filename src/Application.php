<?php

namespace Src;

use Http\Route;
use Http\Request;
use Http\Response;
use Support\config;

class Application
{
    protected Route $route;
    protected Request $request;
    protected Response $response;
    protected config $config;
    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
        $this->route = new Route($this->request, $this->response);
        $this->config = new config($this->loadconfigurations());
    }

    public function loadconfigurations()
    {
        foreach (scandir(config_path()) as $file) {
            if ($file == "." || $file == "..") {
                continue;
            }
            $filename = explode(".", $file)[0];
            yield $filename => require config_path() . $file;
        }
    }

    public function run()
    {
        $this->route->resolve();
    }
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
