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
        <div class="admin__table">
            <table>
                <tr>
                        <th>img</th>
                        <th>price</th>
                        <th>title</th>
                        <th>author</th>
                        <th>id_category</th>
                        <th>Изменить товар</th>
                        <th>Удалить товар</th>
                </tr>
                <?php $records = get_records_all();
                 foreach ($records as $record){?>
                <tr>
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
                <p>Цена товара</p>
                <input type="number" name="price">
                <p>Наименование книги</p>
                <input type="text" name="title">
                <p>Автор книги</p>
                <input type="text" name="author"><br>
                <select name="book_category" id="book__category" size = '1'>
                    <?php $records = get_all_categories();
                    foreach ($records as $record){?>
                        <option value="<?= $record["id"] ?>"><?= $record["category"] ?></option>
                    <?php } ?>
                </select><br>
                <input type="file" name="image"> <br>
                <button type="submit">Добавить новый товар</button>
            </form>
        </div>
    </section>
    <div class="modal">
        <div class="modal__dialog">
            <div class="modal__content">
                <form action="actions\update.php" method = "post" enctype = "multipart/form-data">
                    <div data-close class="modal__close">&times;</div>
                    <div class="modal__title">Изменение товара</div>
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
