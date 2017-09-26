<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.09.2017
 * Time: 23:28
 */
class Controller
{
    protected $view;
    public  function __construct()
    {
        $this->view=new View();
    }

    public function index()
    {
        echo __CLASS__;
    }
}