<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>
<!-- Подключаем заголовок -->

<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');
    $db = new ConnectionDB(); 
?>
<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

    <!-- Основное содержание главной страницы -->
    <div>
    <?php
        $resources = $db->getRandomBooks(11);
        require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/big_slider.php');
    ?>
    </div>
    <div>
        <!-- <hr> -->
        <!-- <p>Вам может быть интересно</p> -->
    <?php /*тут какая-то переменная определяющая поведение карусели*/ 
        $name_razdela_slider = "Вам может быть интересно";
        $resources = $db->getRandomBooks(10);
        require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php');
    ?>
    </div>

    <div class="categoriii_index">
        <div class="name_raz_index">Популярные категории</div>
        <!-- это тоже делается через бд, и через foreach, но ниже пока пусть будут приведены 2 элемента-->
        <div class="every_cat_index">
            <a href="/php/template/pages/unique/catalog.php" class="img_cat_index"><img src="" alt=""><div>Название</div></a>
            <a href="/php/template/pages/unique/catalog.php" class="img_cat_index"><img src="" alt=""><div>Название</div></a>
            <a href="/php/template/pages/unique/catalog.php" class="img_cat_index"><img src="" alt=""><div>Название</div></a>
            <a href="/php/template/pages/unique/catalog.php" class="img_cat_index"><img src="" alt=""><div>Название</div></a>
            <a href="/php/template/pages/unique/catalog.php" class="img_cat_index"><img src="" alt=""><div>Название</div></a>
            <a href="/php/template/pages/unique/catalog.php" class="img_cat_index"><img src="" alt=""><div>Название</div></a>
        </a>
    </div>
    
    <div>
        <!-- <hr> -->
        <!-- <p>Последнии добавления</p> -->
    <?php /*тут какая-то переменная определяющая поведение карусели*/ 
        $name_razdela_slider = "Последнии добавления";
        $resources = $db->getRandomBooks(16);
        require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php');
    ?>
    </div>


    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>