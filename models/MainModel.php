<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 25.09.2017
 * Time: 0:05
 */
class MainModel extends Model
{
public function getTasks($page=null)
{
    $con = $this->db->connect();
    if ($page == null) {
        $page = 1;
    }
    $limit = 3;
    $offset = ($page - 1) * $limit;
    $query = $con->query("SELECT * FROM tasks LIMIT $offset,$limit ");
    if($query)
    {
    while ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $result[] = $row;
    }
        if($result) return $result;
    }
        return false;
}
public function getPagination($limit)
{
    $con=$this->db->connect();
    $query=$con->query('SELECT count(id) FROM tasks');
    $result=$query->fetch();
    return(ceil($result["count(id)"]/$limit));

}
public function editTask($id,$description,$status)
{
    $con=$this->db->connect();
    $query=$con->prepare("UPDATE tasks SET description=?, status=? WHERE id=?");
    $query->execute(array($description,$status,$id));
}
public function saveTask($user,$email,$description,$photo)
{
    $con=$this->db->connect();
    $query=$con->prepare("INSERT INTO tasks (user_name, user_email, description, photo_path) VALUES (?,?,?,?)");
    if($query->execute(array($user,$email,$description,$photo))) return true;
    return false;
}
public function savePhoto($arr)
{
    $dir=ROOT.'images';
    if(!is_dir($dir))
    {
        mkdir($dir);
    }
        $input=$arr['tmp_name'];
        $output=$dir.DS.$arr['name'];
        $imgSize=getimagesize($input);
        if($imgSize[0]>320 || $imgSize[1]>240)
        {
            $resizer=new SimpleImage();
            $resizer->load($input);
            if(($imgSize[1]/$imgSize[0])>0.75)
            {
                $resizer->resizeToHeight(240);
            }
            else
            {
                $resizer->resizeToWidth(320);

            }
            $resizer->save($output);
        }
        else{
            move_uploaded_file($input,$output);
        }
    }
    public function images($item)
    {
        $model=new MainModel();
        $model->getPhoto($item);
    }
}