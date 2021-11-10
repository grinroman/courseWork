<?php
require'../db.php';

$img_adress = $_POST['img_adress'];
$price = $_POST['price'];
$title = $_POST['title'];
$author =  $_POST['author'];
$book_category = $_POST['book_category'];

$add_record = $db->prepare("INSERT INTO `books` (`id`, `img`, `price`, `title`, `author`, `id_category`)
             VALUES (NULL, '$img_adress', '$price', '$title', '$author', '$book_category');");
             $add_record->execute();

header('Location: ../adminpanel.php')

?>

