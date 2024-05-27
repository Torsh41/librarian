<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

    <!-- Основное содержание страницы книги -->
    <div>
        <div>
            <img src="" alt="обложка">
            <a href="#frombd">Начать читать</a>
            <a href="#frombd" download><img src="" alt="">img download</a>
        </div>
        <div>
            <p>Название из бд</p>
            <p>Тип: <a href="#ссылкаНаКаталогСПараметромСортировки">тип из бд</a></p>
            <p>Загружено: <a href="#accFromdb">имя аккаунта</a></p>
            <hr>
            <p>Описание из бд</p>
        </div>
        <div>
            <div><img src="" alt="звезда"> оценка из бд</div>
            <p>Категории: <a href="#ссылкаНаКаталогСПараметромСортировки">через цикл ссылки из бд</a></p>
            <div>Добавить в избранное <img src="" alt="флажок js+db"></div>
        </div>
    </div>
    <div>
        <hr>
        <p>Вам может быть интересно</p>
        <?php /*тут какая-то переменная определяющая поведение карусели*/ ?>
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php'); ?>
    </div>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>