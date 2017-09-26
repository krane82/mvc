<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.09.2017
 * Time: 23:51
 */
class Router
{
    protected $controller = 'MainController';
    protected $action = 'index';
    protected $url;
 public function __construct($url)
{
    $this->url=$url;
}

    public function run()
    {
        $url = str_replace('?'.$_SERVER['QUERY_STRING'], '', $this->url);
        $arrUrl=explode('/',$url);
        array_shift($arrUrl);

        if(empty($arrUrl[0]))
        {
            $controllerPart='main';
        }
        else {
            $controllerPart = array_shift($arrUrl);
        }
        $controllerPart=ucfirst($controllerPart);
        $controllerName=$controllerPart.'Controller';
        $controllerFile=ROOT.'controllers'.DS.$controllerName.'.php';
//        var_dump($controllerFile);
//        die();

        if(!file_exists($controllerFile))
        {
            $controllerName='Controller404';
        }
        $controller=new $controllerName();
        $actionName=array_shift($arrUrl);
        if($actionName)
        {
            $action='action_'.$actionName;
        }
        else
        {
            $action='action_index';
        }
        if(!method_exists($controller,$action))
        {
            $action='action_index';
        }
        $params='';
        if($arrUrl)
        {
            $params=$arrUrl;
        }
        $controller->$action($params);
    }
}