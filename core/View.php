<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.09.2017
 * Time: 23:29
 */
class View
{
public function render($filename,$data=false,$return=false)
{
    if($data) {
        extract($data);
    }
    ob_start();
    include_once (ROOT.'views'.DS.$filename.'.php');
    $content = ob_get_clean();
    if($return)return $content;
    echo $content;
}
}