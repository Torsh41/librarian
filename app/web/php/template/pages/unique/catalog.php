<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    
    <!-- Основное содержание каталог -->
    <div class="wight_block"></div>
    <main class="catalog">
        <div class="left_side_catalog">
            <div class="catalog_fix_in_top">
                <h2 class="name_raxdel_catalog name_raxdel_catalog1">Каталог</h2>
                <!-- <hr> -->
                <div class="category_sort_and_search">
                    <form action="" method="get">
                        <input type="text" name="query" placeholder="Поиск...">
                        <button type="submit">Искать</button>
                    </form>
                    <div class="category_sort">
                    <img src="/assets/icons/sort_100.png" alt="картинка сортировки" class="sort_category">
                        <form action="">
                            <select name="sort_to">
                                <option value="var1">Вариант 1</option>
                                <option value="var2" selected>Вариант 2</option>
                                <option value="var3">Вариант 3</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="catalog_ref_works">
                <!-- Через цикл из бд один элемент а не вот это вот все-->
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="1обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="2обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="3обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="4обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="5обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="6обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="7обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="8обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="9обложка"><div class="catalog_name_work">Название</div></a>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item"><img src="" alt="10обложка"><div class="catalog_name_work">Название</div></a>
            </div>
        </div>
        <div class="right_side_catalog">
            <div class="vertikal_line"></div> <!-- Вертикальная линия -->
            <!--Прикреплен к правой стороне экрана-->
            <div class="catalog_filters">
                <h2 class="name_raxdel_catalog name_raxdel_catalog2">Фильтры</h2>
                <form action="" method="post" class="filter_categories">
                    <div class="name_filtr_categor">Категории</div>
                    <fieldset class="calatal_checkboxes calatal_checkboxes1">
                        <div>
                            <input type="checkbox" id="scales" name="scales" checked />
                            <label for="scales">категория из бд в цикле</label>
                        </div>
                        <div>
                            <input type="checkbox" id="horns" name="horns" />
                            <label for="horns">категория из бд в цикле</label>
                        </div>
                        <div>
                            <input type="checkbox" id="horns" name="horns" />
                            <label for="horns">категория из бд в цикле</label>
                        </div>
                        <div>
                            <input type="checkbox" id="horns" name="horns" />
                            <label for="horns">категория из бд в цикле</label>
                        </div>
                        <div>
                            <input type="checkbox" id="horns" name="horns" />
                            <label for="horns">категория из бд в цикле</label>
                        </div>
                        <div>
                            <input type="checkbox" id="horns" name="horns" />
                            <label for="horns">категория из бд в цикле</label>
                        </div>
                        <div>
                            <input type="checkbox" id="horns" name="horns" />
                            <label for="horns">категория из бд в цикле</label>
                        </div>
                        <div>
                            <input type="checkbox" id="horns" name="horns" />
                            <label for="horns">категория из бд в цикле</label>
                        </div>
                    </fieldset>



                    <div class="name_filtr_categor">Тип</div>
                    <fieldset class="calatal_checkboxes calatal_checkboxes2">
                        <div>
                            <input type="radio" id="option1" name="group1" value="option1"> 
                            <label for="option1">Тип из бд в цикле</label>
                        </div>
                        <div>
                            <input type="radio" id="option2" name="group1" value="option2"> 
                            <label for="option2"> Тип из бд в цикле</label>
                        </div>
                        <div>
                            <input type="radio" id="option3" name="group1" value="option3"> 
                            <label for="option3"> Тип из бд в цикле</label>
                        </div>
                        <div>
                            <input type="radio" id="option3" name="group1" value="option3"> 
                            <label for="option3"> Тип из бд в цикле</label>
                        </div>
                        <div>
                            <input type="radio" id="option3" name="group1" value="option3"> 
                            <label for="option3"> Тип из бд в цикле</label>
                        </div>
                        <div>
                            <input type="radio" id="option3" name="group1" value="option3"> 
                            <label for="option3"> Тип из бд в цикле</label>
                        </div>
                        <div>
                            <input type="radio" id="option3" name="group1" value="option3"> 
                            <label for="option3"> Тип из бд в цикле</label>
                        </div>
                    </fieldset>

                    <button type="submit" class="catalog_butt_filter">Показать</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>


</body>
<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>