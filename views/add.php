<?php
include_once (ROOT.'views'.DS.'header.php');
include_once (ROOT.'views'.DS.'sidebar.php');
?>
    <div class="col-lg-10 col-sm-10 col-xs-8">
<form action="<?php print HOST?>/main/save" method="POST" enctype="multipart/form-data">
    <p>Your Name</p>
    <input type="text" name="user_name" class="form-group form-control" placeholder="Your Name">
    <p>Your Email</p>
    <input type="email" name="user_email" class="form-group form-control" placeholder="Your Email">
    <p>Description</p>
    <textarea name="description" class="form-group form-control" cols="60" rows="4" placeholder="Description"></textarea>
    <div class="form-group">
    <input type="file" name="photo" accept="image/*">
    </div>
        <div class="form-group">
    <input type="submit" class="btn btn-sm btn-success" value="Save">
    <input type="reset" class="btn btn-sm btn-default">
</div>
</form>
    </div>
<?php
include_once (ROOT.'views'.DS.'footer.php');