<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Document</title>
    
</head>

<body>
    <?php
    include("../headerPlusNav.php");
    ?>
    
    <section class="main">
        <table width="80%" cellpadding="5" class="table-main">
            <?php
            $records = get_records_all(3);
            $i = 1 ;
            foreach ($records as $record){
                if($i % 3 == 1 )
                echo "<tr>";?>
                <td class="card">
                        <img src="../<?php echo $record["img"] ?>" alt="#" width="150px" class="card-img">
                        <a href="bookinfo.php?id=<?php echo $record["id"] ?>">
                            <button class="button__wraper"> Купить!</button>
                        </a> 
                        <div class="book__description">
                            <dl class="dl-inline">
                                <dt class="dt-dotted">
                                    <span>Название</span>
                                </dt>
                                <dd><?php echo $record["title"] ?></dd>
                            </dl>
                            <dl class="dl-inline">
                                <dt class="dt-dotted">
                                    <span>Автор</span>
                                </dt>
                                <dd><?php echo $record["author"] ?></dd>
                            </dl>
                            <dl class="dl-inline">
                                <dt class="dt-dotted">
                                    <span>Цена</span>
                                </dt>
                                <dd><?php echo $record["price"] ?> ₽</dd>
                            </dl>
                        </div>
                </td>
                <?php
                if($i % 3 == 0 )
                echo "<tr>";
                $i = $i + 1;
            }?>

        </table>
    </section>

    </div>
    
    <script src="../js/script.js"></script>



</body>

</html>