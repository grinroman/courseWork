<?php

$dbhost = "localhost";
$dbname = "bookshopcoursework";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);


//получение объекта расширения PDO

function get_current_PDO(){
    global $db;
    return $db;
}

//получение всех книжек
function get_records_all($id = null){

    global $db;
    if($id !== null){
        $records = $db->query("SELECT * FROM books WHERE id_category=$id ORDER BY id DESC");
    } else {
        $records = $db->query("SELECT * FROM books ORDER BY id DESC");
    }
    
    return $records;
}


//получение статьи по айди
function get_record_by_id($id){
    global $db;
    $records = $db->query("SELECT * FROM books WHERE id = $id");
    foreach ($records as $record ){
        return $record;
    }
}

//получение названия категории по айди
function get_categoty_by_id($id){
    global $db;
    $catgories = $db->query("SELECT * FROM categories WHERE id = $id");
    foreach ($catgories as $category ){
        return $category["category"];
    }
}

//получение данных всех категорий
function get_all_categories(){
    global $db;
    $catgories = $db->query("SELECT * FROM categories");
    return $catgories;
}

//получение логина и пароля администратора
function get_admin_login($login, $password){
    global $db;
    $check = $db->prepare("SELECT * FROM admin_access WHERE login = $login AND password = $password");
    $check->execute();
    
    return $check->fetchColumn();
}

//выгружаем информацию о страницах из бд в текст ареа
function get_pages_code($id){
    global $db;
    $pages = $db->prepare("SELECT * FROM mainpages WHERE id = $id");
    $pages->execute();

    foreach ($pages as $page ){
        return $page["page_text"];
    }
}

?>

