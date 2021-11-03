<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>Document</title>

</head>

<body>

    <?php
    include("headerPlusNav.php");
    ?>

    <section class="main__books">
        <div class="flex_for_cards">

    <?php
        $singles = get_records_all_studybooks();
        
        foreach ($singles as $single): ?>

            <div class="cart__wrapper">
                <img src="<?php echo $single["img"] ?>" alt="#" width="100px" class="card-img">
                <button class="button__wraper">
                    Купить!
                </button>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Название</span>
                    </dt>
                    <dd><?php echo $single["title"] ?></dd> 
                    <dt class="dt-dotted">
                        <span>Автор</span>
                    </dt>
                    <dd><?php echo $single["author"] ?></dd> 
                    
                    <dt class="dt-dotted">
                        <span>Цена</span>
                    </dt>
                    <dd><?php echo $single["price"] ?> ₽</dd> 
                </dl>
        </div>

            <?php endforeach; ?>

            </div>
    </section>

    </div>
   
    <script src="js/script.js"></script>



</body>

</html>