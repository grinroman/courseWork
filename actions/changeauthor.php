<?php
session_start();
require'../db.php';


if ($_SESSION['admin'] = true && $_POST['change_id']!=nULL && $_POST['authorForm']!=nULL) {
    $id = $_POST['change_id'];
    $page_text = $_POST['authorForm'];

    ?><pre><?php var_dump($id); ?></pre><?php

$updated_record = $db->prepare("UPDATE mainpages SET 
                                page_text = '$page_text'
                                WHERE id = $id;"); 
$updated_record->execute();
 header('Location: ../adminpanel.php');
} else {
    echo "Write all the information in textfields or get admin access!";
}


?>