<?php
require'../db.php';
session_start();
if($_SESSION['admin'] = true){

    $filename = $_POST["img_adress"];
    $price = $_POST["price"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $book_category = $_POST["book_category"];
    $id = $_POST["id"];
    $img = $_FILES["image"];
    ?><pre><?php var_dump($id); ?></pre><?php
    ?><pre><?php var_dump($path_of_deleted_img); ?></pre><?php
    ?><pre><?php var_dump($price); ?></pre><?php
    ?><pre><?php var_dump($title); ?></pre><?php
    ?><pre><?php var_dump($book_category); ?></pre><?php
    ?><pre><?php var_dump($img); ?></pre><?php

    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

        unlink($path_of_deleted_img);//удаляем картинку по старому пути
        //добавляем новую
        if(!is_dir("../img")){
            mkdir("../img", 0777, true);//даем самые широкие права + возможность создавать вложенные дирректории 
        }
        $extention = pathinfo($img["name"], PATHINFO_EXTENSION); // вытягиваем расширение из названия нашего изначального файла чреез константу
        $filename = time() . ".$extention"; // создаем временную метку для уникальности названия файла
        move_uploaded_file($img["tmp_name"], "../img/" . $filename);

        $filename = "img/" . $filename; // Готовим отправку пути в бд с указанием папки
    } 

    $updated_record = $db->prepare("UPDATE books SET 
                                    img = '$filename',
                                    price = $price,
                                    title = '$title',
                                    author = '$author',
                                    id_category = $book_category
                                    WHERE id = $id;"); 
    $updated_record->execute();
    ?><pre><?php var_dump($updated_record); ?></pre><?php
    header('Location: ../adminpanel.php');
    
}

?>