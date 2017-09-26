<?php
include ROOT.'/core/Controller.php';

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.09.2017
 * Time: 23:33
 */
class MainController extends Controller
{
public function action_index()
{
    $model=new MainModel();
    $page=$_GET['page'];
    $data['tasks']=$model->getTasks($page);
    $data['pages']=$model->getPagination(3);
    $data['activePage']=$page?$page: 1;
    if(App::getInstance()->getRole()=='admin')
    {
        $data['admin']=true;
    }
$this->view->render('index',$data);
}
public function action_edit()
{
    if(App::getInstance()->getRole()=='admin')
    {
        $model=new MainModel();
        $id=$_POST['id'];
        $description=$_POST['description'];
        $status=$_POST['status'];
        $model->editTask($id,$description,$status);
    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}
public function action_add()
{
$this->view->render('add');
}
public function action_save()
{
    $model=new MainModel();
    $user=$_POST['user_name'];
    $email=$_POST['user_email'];
    $description=$_POST['description'];
    $photo=null;
    if($_FILES['photo']['tmp_name'])
    {
        $model->savePhoto($_FILES['photo']);
        $photo=$_FILES['photo']['name'];
    }
    if($model->saveTask($user,$email,$description,$photo))
    {
        header('location:'.HOST);
    }
    else
    {
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}
    public function action_preview()
    {
    $data=$_POST;
    $this->view->render('preview', $data);
    }
}