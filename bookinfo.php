<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>Document</title>
</head>
<body>
    <?php
    include("headerPlusNav.php");
        $record = get_record_by_id($_GET["id"])
    ?>
   
    <section class="main">
       <div class="bookinfo__wrap">
            <div class="picture__wrap">
                <img src="<?php echo $record["img"] ?>" alt="#">
            </div>
            <div class="info__wrap">
              <h5>Информация о товаре</h5>
                <div class="info__characteristic__wrap">
                   <span>Название</span><?php echo $record["title"] ?> <br>
                   <span>Автор</span> <?php echo $record["author"] ?> <br>
                   <span>Цена</span> <?php echo $record["price"] ?> ₽ <br>
                </div>
                <div class="text__product">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, maiores ipsam suscipit alias voluptatibus eius voluptatem ducimus quas ea provident minima incidunt, cupiditate vero possimus rem. Voluptate doloremque doloribus dolore.
                    Deserunt, architecto repellendus quis a sit eaque vitae atque reprehenderit numquam porro voluptatibus labore tenetur voluptates voluptate id cumque.<br><br> Reiciendis natus nulla odit quis atque voluptatum eum ad suscipit inventore.
                    Minima mollitia, facere, laudantium tempore recusandae aliquid dolore deleniti iste neque ea, porro odio laboriosam aliquam vitae quae sequi dolor vel sunt! Corrupti, nesciunt dolorum architecto commodi blanditiis officiis qui.
                    Dolore natus eveniet dolores obcaecati.<br><br> Vitae voluptas esse aspernatur nemo dignissimos nostrum ab quis ea voluptatem recusandae molestias incidunt odit nobis autem, velit neque deleniti dolorum ipsa, veritatis non dicta!
                    Laboriosam reprehenderit iure facere exercitationem eveniet magni similique ipsum repellendus sapiente tempora. Tempora quisquam quas laudantium! Et expedita beatae assumenda! Quos sed, temporibus hic molestiae dolor obcaecati atque culpa voluptate.
                </div>
                
            </div>
       </div>
    </section>
   
</body>
    <script src="js/script.js"></script>
</html>