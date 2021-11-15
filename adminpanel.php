    <?php
    session_start();
    if ($_SESSION['admin'] != true) {
        header("Location: index.php");
    }
    include("db.php");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <section class="admin__wrapper">
        <div class="sort__form">
            <!-- <form action="actions\sort.php" method="POST">
                <button type="submit" name="sort_product_btn" class="change__prodcut__btn" >Изменить товар</button>
                <select name="book_category" id="book__category" size = '1'>
                    <?php $records = get_all_categories();
                    foreach ($records as $record){?>
                        <option value="<?= $record["id"] ?>"><?= $record["category"] ?></option>
                    <?php } ?>
                </select>
            </form> -->
        </div>
        <div class="admin__table">
            <table>
               
                <?php $records = get_records_all();
                 foreach ($records as $record){?>
                <tr>
                    <td inf-text><?= $record["id"] ?></td>
                    <td inf-text> <img src="../<?php echo $record["img"] ?>" alt="#" width="100px" class="card-img"></td>
                    <td inf-text><?= $record["price"] ?></td>
                    <td inf-text><?= $record["title"] ?></td>
                    <td inf-text><?= $record["author"] ?></td>
                    <td><?= get_categoty_by_id((int)$record["id_category"]) ?></td>
                    <td>
                        <button class="update__modal__open">Изменение товара</button>
                    </td>
                    <td>
                        <form action="actions\delete.php" method="POST">
                            <input type="hidden" name="delete_id" value="<?= $record["id"] ?>">
                            <input type="hidden" name="delete_img_path" value="../<?php echo $record["img"] ?>">
                            <button type="submit" name="delete_record_btn" class="delete__prodcut__btn" >Удалить товар</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="add__from_wrapper">
            <form action="actions\add.php" method = "post" enctype = "multipart/form-data">
                <div>
                    <p>Цена товара</p> 
                    <input type="number" name="price">
                </div>  
                <div>
                    <p>Наименование книги</p>
                    <input type="text" name="title">
                </div>  
                <div>
                    <p>Автор книги</p>
                    <input type="text" name="author"><br>
                <div> 
                <div class="special-add-fields">
                    <select name="book_category" id="book__category" size = '1'>
                        <?php $records = get_all_categories();
                        foreach ($records as $record){?>
                            <option value="<?= $record["id"] ?>"><?= $record["category"] ?></option>
                        <?php } ?>
                    </select>
                    <input type="file" name="image" id = "addfile"> 
                </div>   
                <div>
                    <button type="submit" >Добавить новый товар</button>
                </div>
              
            </form>
            <div class="update__pages__wrapper">
                <h3>Изменение главной страницы</h3>
               <form class="index__update__form" action="actions\changeindex.php" method='post'>
                   <textarea name="indexForm" id="index-from" cols="74" rows="40">
                        <?= get_pages_code(1) ?> 
                   </textarea>
                   <input type="hidden" name="change_id" value="1">
                   <button type="submit" name="change_page_btn" class="change__page__btn" >Изменить страницу</button>
               </form> 
               <h3>Изменение страницы "О фирме"</h3>
               <form class="firm__update__form" action="actions\changefirm.php" method='post'>
                   <textarea name="firmForm" id="firm-from" cols="74" rows="40">
                        <?= get_pages_code(5) ?> 
                   </textarea>
                   <input type="hidden" name="change_id" value="5">
                   <button type="submit" name="change_page_btn" class="change__page__btn" >Изменить страницу</button>
               </form>
               <h3>Изменение страницы "Об авторе"</h3>         
               <form class="author__update__form" action="actions\changeauthor.php" method='post'>
                   <textarea name="authorForm" id="author-from" cols="74" rows="40">
                        <?= get_pages_code(3) ?> 
                   </textarea>
                   <input type="hidden" name="change_id" value="5">
                   <button type="submit" name="change_page_btn" class="change__page__btn" >Изменить страницу</button>
               </form>                 
            </div>
        </div>
       
    </section>
    <div class="modal">
        <div class="modal__dialog">
            <div class="modal__content">
                <form action="actions\update.php" method = "post" enctype = "multipart/form-data">
                    <div data-close class="modal__close">&times;</div>
                    <div class="modal__title">Изменение товара</div>
                    <input type="hidden" name="id" class=".modal__input">
                    <p>Адрес картинки</p>
                    <input type="text" name="img_adress" class=".modal__input">
                    <p>Цена товара</p>
                    <input type="number" name="price" class=".modal__input">
                    <p>Наименование книги</p>
                    <input type="text" name="title" class=".modal__input">
                    <p>Автор книги</p>
                    <input type="text" name="author" class=".modal__input"><br>
                    <select name="book_category" id="book__category" size = '1'>
                    <?php $records = get_all_categories();
                    foreach ($records as $record){?>
                        <option value="<?= $record["id"] ?>"><?= $record["category"] ?></option>
                    <?php } ?>
                </select><br>
                <input type="file" name="image"> <br>
                <button type="submit" name="change_record_btn" class="change__prodcut__btn" >Изменить товар товар</button>
                </form>
            </div>
            <div class="modal__picture__wrapper">

            </div>
        </div>
    </div>
    
</body>
</html>
<script src = "js\modal.js"></script>
