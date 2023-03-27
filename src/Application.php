<?php

namespace Src;
use Http\Route;
use Http\Request;
use Http\Response;
use Support\config;
use Src\Database\DB;
use Src\Support\Session;
use Src\Database\Managers\MySqlManager;
use Src\Database\Managers\SQLiteManager;

class Application
{
    protected Route $route;
    protected Request $request;
    protected Response $response;
    protected config $config;
    protected Session $session;
    protected DB $db;
    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
        $this->session = new Session;
        $this->route = new Route($this->request, $this->response);
        $this->config = new config($this->loadconfigurations());
        $this->db = new DB($this->getDatabaseDriver());
    }
    protected function getDatabaseDriver()
    {
        return match (env('DB_DRIVER')) {
            "mysql"=> new MySqlManager,
            default=>new SQLiteManager
        };
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
        $this->db->init();
        $this->route->resolve();

    }
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
