<?php
require'../db.php';
session_start();

    $id = $_POST['change_id'];
    $page_text = $_POST['autorForm'];

    ?><pre><?php var_dump($id); ?></pre><?php

$updated_record = $db->prepare("UPDATE mainpages SET 
                                page_text = '$page_text'
                                WHERE id = $id;"); 
$updated_record->execute();
 header('Location: ../adminpanel.php');
?>