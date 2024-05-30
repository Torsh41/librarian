<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

    <!-- Основное содержание главной страницы -->
    <div><?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/big_slider.php'); ?></div>
    <div>
        <!-- <hr> -->
        <!-- <p>Вам может быть интересно</p> -->
        <?php /*тут какая-то переменная определяющая поведение карусели*/ 
            $name_razdela_slider = "Вам может быть интересно";
        ?>
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php'); ?>
    </div>
    <div>
        <hr>
        <p>Популярные категории</p>
        <!-- это тоже делается через бд, и через foreach, но ниже пока пусть будут приведены 2 элемента-->
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/covers/one_category.php'); ?>
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/covers/one_category.php'); ?>
    </div>
    <div>
        <!-- <hr> -->
        <!-- <p>Последнии добавления</p> -->
        <?php /*тут какая-то переменная определяющая поведение карусели*/ 
            $name_razdela_slider = "Последнии добавления";
        ?>
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php'); ?>
    </div>


    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>