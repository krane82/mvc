<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 26.09.2017
 * Time: 1:11
 */
class Controller404 extends Controller
{
public function action_index()
{
    $this->view->render('404');
}
}