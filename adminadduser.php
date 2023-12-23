<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');

if(isset($_POST) && !empty($_POST)) {
    $cardid = $_POST['cardid'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pos = $_POST['pos'];
    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    if(chkIDCard($cardid)) {
        echo "dupid";
    } elseif(chkUsername($username)) {
        echo "dupuser";
    } elseif(chkLenPassword($pwd)) {
        echo "lenpass";
    }
    else {
        $conn = connect();
        $sql = "INSERT INTO account(userID, title, name, surname, position, username, pwd, user_type, create_date, create_by) ";
        $sql .= "VALUES('{$cardid}', '{$title}', '{$name}', '{$surname}', '{$pos}', '{$username}', PASSWORD('{$pwd}'), {$usertype}, NOW(), '{$_SESSION['fullname']}')";
        if($conn->query($sql)) {
            echo "pass";
        }
    }
}
?>