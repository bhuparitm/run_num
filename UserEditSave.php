<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) header('Location: login.php');
require_once('./config/connect_database.php');
$id = $_SESSION['id'];

if (isset($_POST) && !empty($_POST)) {
    $cardid = $_POST['cardid'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pos = $_POST['pos'];
    $pwd = $_POST['pwd'];

    $conn = connect();
    $sql = "";
    if (chkUsernameCardID($id, $_POST['cardid'])) {
        echo "dupcardid";
    } else if (chkLenCardID($cardid)) {
        echo "lencardid";
    } else {
        /*
        $_SESSION['fullname'] = $row['title'] . $row['name'] . ' ' . $row['surname'];
            $_SESSION['UserID'] = $row['userID'];
        */
        $_SESSION['fullname'] = $title . $name . ' ' . $surname;
        $_SESSION['UserID'] = $cardid;
        if ($pwd != "") {
            if (chkLenPassword($pwd)) {
                echo "lenpwd";
            } else {
                $sql = "UPDATE account SET userID='{$cardid}', title='{$title}', name='{$name}', surname='{$surname}', position='{$pos}', pwd=PASSWORD('{$pwd}') ";
                $sql .= "WHERE id={$id}";
                $conn->query($sql);
                echo "pass";
            }
        } else {
            $sql = "UPDATE account SET userID='{$cardid}', title='{$title}', name='{$name}', surname='{$surname}', position='{$pos}' ";
            $sql .= "WHERE id={$id}";
            $conn->query($sql);
            echo "pass";
        }
    }
}
