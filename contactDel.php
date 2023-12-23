<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');

if(!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: adminUserList.php');
} else {
    $conn = connect();
    $sql = "DELETE FROM contact WHERE id={$_GET['id']}";
    $conn->query($sql);
    return "0";
}
?>