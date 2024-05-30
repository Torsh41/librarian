<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

    <!--?php print_r($meta); echo $metaKey;?-->
    <!-- Основное содержание страницы книги -->
    <main class="main_work_info">
        <div class="general_work_info">
            <div class="img_and_action_work_info">
                <img src="" alt="обложка" class="oblozhka_work_info">
                <div class="action_with_boo_work_info">
                    <a href="#frombd" class="cover_read_online_work_info"><div class="read_online_work_info">Начать читать</div></a>
                    <a href="#frombd" download>
                        <img src="/assets/icons/download-96.png" alt="J" class="download_work_info">
                    </a>
                </div>
            </div>
            <div class="text_info_about_book">
                <div class="data_work_info">
                    <div class="name_work_info">Название из бд</div>
                    <!-- Дополнительно нужно передавать тип в href -->
                    <div class="type_work_info">Тип: <a href="/php/template/pages/unique/catalog.php">тип из бд</a></div>
                    <!-- Дополнительно нужно передавать нидекс пользователя из бд -->
                    <div class="hwo_upload_work_info">Загружено: <a href="/php/template/pages/reccurring/cabinet.php">имя аккаунта</a></div>
                    <!-- <hr> -->
                    <div class="short_text_work_info">Краткое описание</div>
                    <div class="big_text_work_info">И вот Какое-то очень интересное и интригующее описание тут тут тут тут тут. Какое-то очень интересное и интригующее описание тут тут тут тут тут. Какое-то очень интересное и интригующее описание тут тут тут тут тут. Какое-то очень интересное и интригующее описание тут тут тут тут тут. Какое-то очень интересное и интригующее описание тут тут тут тут тут. Какое-то очень интересное и интригующее описание тут тут тут тут тут. Какое-то очень интересное и интригующее описание тут тут тут тут тут.</div>
                </div>
                <div class="tags_and_user_info_work_info">
                    <div class="rate_work_info">
                        <img src="/assets/icons/star-96.png" alt="*" class="star"> 
                        <div class="text_rate">8.8</div>
                    </div>
                    <!-- И дополнительно нужно передавать индекс категории в href -->
                    <div class="cover_categorii">
                        <div class="categorii">
                            <div class="name_categor">Категории: </div>
                            <!-- через цикл ссылки из бд -->
                            <a href="/php/template/pages/unique/catalog.php" class="categ_book_info">Категория1</a>
                            <a href="/php/template/pages/unique/catalog.php" class="categ_book_info">Категория2222</a>
                            <a href="/php/template/pages/unique/catalog.php" class="categ_book_info">Катег4</a>
                            <a href="/php/template/pages/unique/catalog.php" class="categ_book_info">Кат5</a>
                            <a href="/php/template/pages/unique/catalog.php" class="categ_book_info">Категория6</a>
                            <a href="/php/template/pages/unique/catalog.php" class="categ_book_info">Категория77</a>
                        </div>
                    </div>
                    <div>Добавить в избранное <img src="" alt="флажок js+db"></div>
                </div>
            </div>
        </div>
        <div>
            <!-- <hr> -->
            <!-- <p>Вам может быть интересно</p> -->
            <?php /*тут какая-то переменная определяющая поведение карусели*/ 
                $name_razdela_slider = "Вам может быть интересно";
            ?>
            <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php'); ?>
        </div>
    </main>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>