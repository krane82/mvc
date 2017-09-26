<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.09.2017
 * Time: 23:28
 */
class Model
{
    protected $db;
    protected $con;
public function __construct()
{
    $this->db=new DB();
}
}