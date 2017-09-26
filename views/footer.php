</div>
</div>
<script>
    $('.editBut').click(function()
    {
        $('#editTask').find("input[name=id]").val($(this).val());
        $('#editTask').find("textarea[name=description]").val($(this).parent().siblings('.description').html());
        var status=$(this).parent().siblings('.status').html();
        $('#editTask').find("input[name=status][value="+status+"]").attr('checked', true);
    });
</script>
</body>
</html>