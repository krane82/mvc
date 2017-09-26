<?php
//include ROOT.'controllers/MainController.php';
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.09.2017
 * Time: 23:30
 */
class App
{
    private static $instance = null;
    public $router;
    private $config;
    private $role;
    private function __construct($config)
    {
        $this->config=$config;
    }

    public static function getInstance($config=null)
    {
    //    $instance = self::$instance;
        if(self::$instance === null)
        {
            self::$instance = new self($config);
        }
//        die(123);
        return self::$instance;
    }
    private function __wake(){}
    private function __clone(){}
public function run($url)
{
    $this->router=new Router($url);
    return $this->router;
}
public function getConfig()
{
    return $this->config;
}

    public function setRole($role)
    {
        $this->role=$role;
    }
    public function getRole()
    {
        return $this->role;
    }
}