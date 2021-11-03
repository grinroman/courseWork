<?php

$dbhost = "localhost";
$dbname = "bookshopcoursework";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);

//получение всех книжек
function get_records_all_studybooks(){
    global $db;
    $reconrds = $db->query("SELECT * FROM books WHERE id_category=1");
    return $reconrds;
}

//получение статьи по айди
function get_record_by_id($id){
    global $db;
    $reconrds = $db->query("SELECT * FROM books WHERE id = $id");
    foreach ($reconrds as $record ){
        return $record;
    }
}

//получение названии категории по айди
function get_categoty_by_id($id){
    global $db;
    $catgories = $db->query("SELECT * FROM categories WHERE id = $id");
    foreach ($catgories as $catgory ){
        return $catgory["category"];
    }
}


?>

