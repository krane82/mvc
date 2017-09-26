<div class="table table-responsive">
    <table class="table-bordered table-condensed table-stripped">
     <thead>
        <th>Author</th>
        <th>Email</th>
        <th>Text of task</th>
        <th>Photo</th>
        <th>Status</th>
     </thead>
     <tbody>
    <tr>
        <td><?php print $data['user_name']?></td>
        <td><?php print $data['user_email']?></td>
        <td class="description"><?php print $data['description']?></td>
        <td></td>
        <td class="status">Opened</td>
    </tr>
    </tbody>
    </table>
</div>