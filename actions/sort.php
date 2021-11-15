<?php
require'../db.php';

$book_category = $_POST['book_category'];

$check = $db->prepare("SELECT * FROM books WHERE id_category = $book_category ");
    $check->execute();
    header('Location: ../adminpanel.php');

?>