<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    
    <!-- Основное содержание каталог -->
    <div>
        <div>
            <h2>Каталог</h2>
            <hr>
            <div>
            <form action="" method="get">
                <input type="text" name="query" placeholder="Поиск...">
                <button type="submit">Искать</button>
            </form>
            <select name="sort_to">
                <option value="var1">Вариант 1</option>
                <option value="var2" selected>Вариант 2</option>
                <option value="var3">Вариант 3</option>
            </select>
            <img src="" alt="картинка сортировки">
            </div>
        </div>
        <div>
            <!-- Через цикл из бд -->
            <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/covers/one_book.php'); ?>
        </div>
    </div>
    <div></div> <!-- Вертикальная линия -->
    <div>
        <!--Прикреплен к правой стороне экрана-->
        <h2>Фильтры</h2>
        <form action="" method="post">
            <fieldset>
                <legend>Категории</legend>
                <div>
                    <input type="checkbox" id="scales" name="scales" checked />
                    <label for="scales">категория из бд в цикле</label>
                </div>
                <div>
                    <input type="checkbox" id="horns" name="horns" />
                    <label for="horns">категория из бд в цикле</label>
                </div>
            </fieldset>

            <fieldset>
                <legend>Тип</legend>
                <label for="option1">
                    <input type="radio" id="option1" name="group1" value="option1"> Тип из бд в цикле
                </label>
                <label for="option2">
                    <input type="radio" id="option2" name="group1" value="option2"> Тип из бд в цикле
                </label>
            </fieldset>

            <button type="submit">Показать</button>
        </form>
    </div>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>