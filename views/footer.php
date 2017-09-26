</div>
</div>
<script>
    $('.editBut').click(function()
    {
        var form=$('#editTask');
        var status=$(this).parent().siblings('.status').html();
        console.log(status);
        form.find("input[name=id]").val($(this).val());
        form.find("textarea[name=description]").val($(this).parent().siblings('.description').html());
        form.find("input[name=status]").attr('checked', false);
        form.find("input[name=status][value="+status+"]").attr('checked', true);
    });
    $('#preview').click(function()
    {
       var data=$('#newTask').serialize();
                $.ajax({
            type: "POST",
            url: '<?php echo HOST . '/main/preview' ?>',
            data: data,
            success: function (response) {
                $('#previewBlock').html(response);
            }
        });
    });
</script>
</body>
</html>