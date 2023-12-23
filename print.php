<?php
require_once('./config/connect_database.php');
$conn = connect();
$sql = "";
if ($_GET['type'] == 'normal') {
    $sql = "SELECT * FROM doc_normal WHERE YEAR(create_date)='{$_GET['year']}' ORDER BY num_doc";
    $msg = "ปกติ";
} elseif ($_GET['type'] == 'secret1') {
    $sql = "SELECT * FROM doc_secret1 WHERE YEAR(create_date)='{$_GET['year']}' ORDER BY num_doc";
    $msg = "ลับ";
} elseif ($_GET['type'] == 'secret2') {
    $sql = "SELECT * FROM doc_secret2 WHERE YEAR(create_date)='{$_GET['year']}' ORDER BY num_doc";
    $msg = "ลับมาก";
} elseif ($_GET['type'] == 'secret3') {
    $sql = "SELECT * FROM doc_secret3 WHERE YEAR(create_date)='{$_GET['year']}' ORDER BY num_doc";
    $msg = "ลับที่สุด";
}
if (!empty($sql)) {
    $result = $conn->query($sql) or die(mysqli_error($conn));
} else {
?>
    <center>
        <p style="color: red;">เกิดข้อผิดพลาด</p>
    </center>
<?php
    echo mysqli_error($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ทะเบียส่ง<?= $msg; ?></title>
    <style>
        @font-face {
            font-family: 'THSarabun';
            src:
                url('./fonts/THSarabun.ttf') format('truetype'),
                url('./fonts/THSarabun\ Bold.ttf') format('truetype');

        }

        body {
            font-family: 'THSarabun';
            font-size: 22;

        }

        thead {
            font-family: 'THSarabun';
            font-size: 18px;
        }

        td,
        tr {
            font-family: 'THSarabun';
            font-size: 16px;
        }
    </style>
</head>

<body>
    <center>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <td align="right"><b>(ทขล.๒)</b></td>
                </tr>
                <tr>
                    <td align="center">
                        <h1>ทะเบียนส่ง</h1>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table width="100%" border="1" cellspacing="0" cellpadding="0">
                            <thead>
                                <th align="center" width="5%">เลขที่ส่ง</th>
                                <th align="center" width="5%">ชั้นความลับ</th>
                                <th align="center" width="8%">จาก</th>
                                <th align="center" width="8%">ถึง</th>
                                <th align="center" width="15%">เรื่อง</th>
                                <th align="center" width="10%">ส่งชื่อ</th>
                                <th align="center" width="15%">หมายเหตุ</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr style="vertical-align: top;">
                                        <td align="center" style="vertical-align: top;">กห 0207/ <?= $row['num_doc']; ?></td>
                                        <td align="center" style="vertical-align: top;">
                                            <font style="color: red;"><?= $msg; ?></font>
                                        </td>
                                        <td align="center" style="vertical-align: top;"><?= $row['from_dep']; ?></td>
                                        <td align="center" style="vertical-align: top;"><?= $row['to_dep']; ?></td>
                                        <td style="vertical-align: top;">
                                            <?= $row['subject']; ?>
                                        </td>
                                        <td align="center" style="vertical-align: top;"><?= $row['signer']; ?></td>
                                        <td><?= $row['note']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align: left; font-size: 20px; margin-top:20px">
                        หมายเหตุ ช่องเลขที่ส่ง ให้ปฏิบัติดังนี้<br>
                        ๑. ให้ลงเลขที่ส่งต่อเนื่องกันไป<br>
                        ๒. เมื่อขึ้นวันใหม่ ให้ลงวันที่คั่นไว้ในทะเบียน
                    </td>
                </tr>
            </tfoot>
        </table>
    </center>


</body>
<script src="./jquery/jquery-3.7.0.js"></script>
<script>
    $(function() {
        window.print();
        window.onfocus = function() {
            window.close();
        }
    });
</script>

</html>