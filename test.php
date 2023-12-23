<?php
require_once("./config/connect_database.php");
$conn = connect();
$result = $conn->query("Select * from test");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">

</head>

<body>
    <table id="ex" class="display" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>เลข</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['number']; ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm btn-edit" 
                        onclick="btn_edit('<?=$row['id'];?>')">แก้ไข</button> |
                        <button type="button" class="btn btn-outline-danger btn-sm btn-del">ลบ</button>
                    </td>
                </tr>
            <?php }
            $result->free_result(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>เลข</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="./bootstrap/js/bootstrap.js"></script>

<script>
    $(document).ready(function() {
        $('#ex').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'cvs', 'excel', 'pdf', 'print'
            ]
        });



        $('.btn-del').click(function() {
            alert('Delete');
        });
    });

    function btn_edit(id) {
        alert(id);
    }
</script>

</html>