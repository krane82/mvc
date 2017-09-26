<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 26.09.2017
 * Time: 1:48
 */
class AuthModel extends Model
{
public function checkUser($login,$password)
{
    $con=$this->db->connect();
    $password=md5($password);
    $query=$con->prepare("SELECT * FROM users WHERE login=? AND password=?");
    $res=$query->execute(array($login,$password));
    if($res)
    {
        return $query->fetch();
    }
    return false;
}
}