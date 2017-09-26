<?php
include_once (ROOT.'views'.DS.'header.php');
include_once (ROOT.'views'.DS.'sidebar.php');
?>
    <div class="col-lg-10 col-sm-10 col-xs-8">
<form id="newTask" action="<?php print HOST?>/main/save" method="POST" enctype="multipart/form-data">
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
    <button type="button" id="preview" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalWindow">Preview</button>
    </div>

    <div>
    <div class="form-group">
    <input type="submit" class="btn btn-sm btn-success" value="Save">
    <input type="reset" class="btn btn-sm btn-default" value="clear">
</div>
</form>
    </div>
    <div class="modal fade" id="modalWindow"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Preview: </h4>
                </div>
                    <div class="modal-body" id="previewBlock">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
<?php
include_once (ROOT.'views'.DS.'footer.php');