<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: adminUserList.php');
} else {
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        $conn = connect();
        $rs = "";
        if ($_GET['type'] == 'normal') {
            $sql = "UPDATE doc_normal SET status='ลบ' WHERE id={$_GET['id']}";            
            $rs = "0";
        } elseif ($_GET['type'] == 'secret1') {
            $sql = "UPDATE doc_secret1 SET status='ลบ' WHERE id={$_GET['id']}";
            $rs = "0";
        } elseif ($_GET['type'] == 'secret2') {
            $sql = "UPDATE doc_secret2 SET status='ลบ' WHERE id={$_GET['id']}";
            $rs = "0";
        } elseif ($_GET['type'] == 'secret3') {
            $sql = "UPDATE doc_secret3 SET status='ลบ' WHERE id={$_GET['id']}";
            $rs = "0";
        }
        if($conn->query($sql)) echo $rs;
        
    } else {
        echo "1";
    }
}
