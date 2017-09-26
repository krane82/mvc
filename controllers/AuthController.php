<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 26.09.2017
 * Time: 1:19
 */
class AuthController extends Controller
{
public function action_check()
{
    $model=new AuthModel();
    $login=$_POST['login'];
    $password=$_POST['password'];
    $userData=$model->checkUser($login,$password);
    if($userData['is_admin']=='1')
    {
        session_start();
        $_SESSION['is_admin']=$userData['is_admin'];
    }

    header('location:'.$_SERVER['HTTP_REFERER']);
}
    public function action_logout()
    {
        session_start();
        session_destroy();
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}