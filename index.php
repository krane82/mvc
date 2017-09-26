<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Дата в прошлом
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.09.2017
 * Time: 23:25
 */
session_start();
define('DS', DIRECTORY_SEPARATOR);
define ('ROOT',dirname(__FILE__).DS);
define ('HOST','http://'.$_SERVER['HTTP_HOST']);
include_once(ROOT.'config'.DS.'config.php');
spl_autoload_register(function ($class){
  $directories=['controllers','core','models','views','extensions'];
    foreach($directories as $directory)
    {
        if(file_exists($directory.DS.$class . '.php'))
        {
            require_once($directory.DS.$class . '.php');
            return;
        }
    }
});
include ROOT.'/core/App.php';
$url=$_SERVER['REQUEST_URI'];
$app=App::getInstance($config);
if($_SESSION['is_admin']=='1')
{
    $app->setRole('admin');
}
$c = $app->run($url);
$c->run();
//var_dump();

