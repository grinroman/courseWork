<?php
require'../db.php';

$price = $_POST['price'];
$title = $_POST['title'];
$author =  $_POST['author'];
$book_category = $_POST['book_category'];

//работа с загрузкой файла
$img = $_FILES["image"];

?><pre><?php var_dump($img); ?></pre><?php
if(!is_dir("../img")){
    mkdir("../img", 0777, true);//даем самые широкие права + возможность создавать вложенные дирректории 
}
$extention = pathinfo($img["name"], PATHINFO_EXTENSION); // вытягиваем расширение из названия нашего изначального файла чреез константу
$filename = time() . ".$extention"; // создаем временную метку для уникальности названия файла
move_uploaded_file($img["tmp_name"], "../img/" . $filename);
?><pre><?php var_dump($filename); ?></pre><?php
$filename = "img/" . $filename; //Отправляем путь в бд с указанием папки


//работка с отправкой в бд
$add_record = $db->prepare("INSERT INTO `books` (`id`, `img`, `price`, `title`, `author`, `id_category`) 
             VALUES (NULL, '$filename', '$price', '$title', '$author', '$book_category');"); 
             $add_record->execute();

header('Location: ../adminpanel.php')

?>

