<?php
include_once (ROOT.'views'.DS.'header.php');
include_once (ROOT.'views'.DS.'sidebar.php');
?>

        <div class="col-lg-10 col-sm-10 col-xs-8">
<div class="table table-responsive">
    <table class="table-bordered table-condensed table-stripped">
        <thead>
        <th>Author</th>
        <th>Email</th>
        <th>Text of task</th>
        <th>Photo</th>
        <th>Status</th>
    <?php if($data['admin']==true):?>
    <th>Action</th>
    <?php endif?>
    </thead>
        <tbody>
    <?php
foreach ($data['tasks'] as $task) {
    print '<tr>';
    print '<td>' . $task['user_name'] . '</td>';
    print '<td>' . $task['user_email'] . '</td>';
    print '<td class="description">' . $task['description'] . '</td>';
    print '<td><img src='.ROOT.'images'.DS.$task['photo_path'] . '></td>';
    print '<td class="status">' . $task['status'] . '</td>';
    if($data['admin']==true) {
       print '<td><button type="button" class="btn btn-xs btn-info editBut" value="'.$task['id'].'" data-toggle="modal" data-target="#modalWindow">Edit</button></td>';
    }
    print '</tr>';
}
?>
        </tbody>
    </table>
</div>
            <div class="col-lg-1 col-sm-1 -col-xs-1">
                <a class="btn btn-sm btn-success" style="margin:5px" href="<?php print HOST?>/main/add">+ Add Task</a>
            </div>
<div class="col-lg-4 col-sm-4 col-xs-4 text-center">
            <?php
    $i=1;
while($i<=$data['pages'])
{
    if($i==$data['activePage'])
    {
        print '<button class="btn btn-sm btn-default" disabled style="margin:5px">' . $i . '</button>';
    }
    else
    {
        print '<a class="btn btn-sm btn-info" style="margin:5px" href="/main?page=' . $i . '">' . $i . '</a>';

    }
    $i++;
}
?>
</div>
            <div class="modal fade" id="modalWindow"  tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Edit kask: </h4>
                        </div>
                        <form id="editTask" action="<?php echo HOST?>/main/edit"; method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id">
                                <textarea name="description" style="width:100%"></textarea>
                                <label><input type="radio" name="status" value="opened" selected>Opened</label>
                                <label><input type="radio" name="status" value="closed">Closed</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
include_once (ROOT.'views'.DS.'footer.php');
