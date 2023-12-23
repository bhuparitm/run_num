<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) header('Location: login.php');
require_once("./config/connect_database.php");
$conn = connect();
if (isset($_POST)) {
    $subject = $_POST['subject'];
    $from_dep = $_POST['from'];
    $to_dep = $_POST['to'];
    $name = $_SESSION['title'] . $_SESSION['name'] . ' ' . $_SESSION['surname'];
    $urgent = $_POST['urgent'];
    $num_doc = getNumDoc($_GET['type']);
    
    if ($_GET['type'] == 'normal') {
        $sql = "INSERT INTO doc_normal(num_doc, subject, from_dep, to_dep, name, urgent, create_date) VALUES({$num_doc}, '{$subject}', '{$from_dep}', '{$to_dep}', '{$name}', '{$urgent}', NOW())";
        $sel = "SELECT * FROM doc_normal WHERE num_doc='{$num_doc}' ORDER BY num_doc LIMIT 1";
    } elseif ($_GET['type'] == 'secret1') {
        $sql = "INSERT INTO doc_secret(num_doc, subject, from_dep, to_dep, name, urgent, create_date) VALUES({$num_doc}, '{$subject}', '{$from_dep}', '{$to_dep}', '{$name}','{$urgent}', NOW())";
        $sel = "SELECT * FROM doc_secret WHERE num_doc='{$num_doc}' ORDER BY num_doc LIMIT 1";
    } elseif ($_GET['type'] == 'secret2') {
        $sql = "INSERT INTO doc_very_secret(num_doc, subject, from_dep, to_dep, name, urgent, create_date) VALUES({$num_doc}, '{$subject}', '{$from_dep}', '{$to_dep}', '{$name}','{$urgent}', NOW())";
        $sel = "SELECT * FROM doc_very_secret WHERE num_doc='{$num_doc}' ORDER BY num_doc LIMIT 1";
    } elseif ($_GET['type'] == 'secret2') {
        $sql = "INSERT INTO doc_most_secret(num_doc, subject, from_dep, to_dep, name, urgent, create_date) VALUES({$num_doc}, '{$subject}', '{$from_dep}', '{$to_dep}', '{$name}', '{$urgent}', NOW())";
        $sel = "SELECT * FROM doc_most_secret WHERE num_doc='{$num_doc}' ORDER BY num_doc LIMIT 1";
    } elseif ($_GET['type'] == 'secret3') {
        $sql = "INSERT INTO doc_most_secret(num_doc, subject, from_dep, to_dep, name, urgent, create_date) VALUES({$num_doc}, '{$subject}', '{$from_dep}', '{$to_dep}', '{$name}', '{$urgent}', NOW())";
        $sel = "SELECT * FROM doc_most_secret WHERE num_doc='{$num_doc}' ORDER BY num_doc LIMIT 1";
    }

    if($result = $conn->query($sql)) {
        if($rs = $conn->query($sel)) {
            $arr = array();
            foreach($rs as $r) {
                array_push($arr, array(
                    'id' => $r['id'],
                    'num_doc' => $r['num_doc'],
                    'subject' => $r['subject'],
                    'from_dep' => $r['from_dep'],
                    'to_dep' => $r['to_dep'], 
                    'name' => $r['name'],
                    'urgent' => $r['urgent'],
                    'create_date' => toDateThai($r['create_date'])
                ));
            }
        }
    }
    echo json_encode($arr);
}
