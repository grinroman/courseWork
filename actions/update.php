<?php
require'../db.php';
session_start();
if($_SESSION['admin'] = true){

    $path_of_deleted_img = $_POST["img_adress"];
    $price = $_POST["price"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $book_category = $_POST["book_category"];
    $img = $_FILES["image"];

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
        $filename = "img/" . $filename; //Отправляем путь в бд с указанием папки
    } 
    




    
}

?>