<?php
require'../db.php';
session_start();

if($_SESSION['admin'] = true && isset($_POST['delete_id']) && $_POST['delete_img_path']){

    $id_to_delete = $_POST['delete_id'];
    $path_of_deleted_img = $_POST['delete_img_path'];
    
    //удаление записи из бд по айдишнику
    $deleted_record = $db->prepare("DELETE FROM `books` WHERE `books`.`id` = $id_to_delete;"); 
                 $deleted_record->execute();
    
    //удаление самой картинки если она существует
    if(file_exists($path_of_deleted_img))
        unlink($path_of_deleted_img);

    header('Location: ../adminpanel.php');
} else {
    header('Location: ../index.php');
}

?>