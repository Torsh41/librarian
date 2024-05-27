<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    
    <!-- Основное содержание формы добавления файла -->
    <div>
        <h2>Добавление файла</h2>
        <form action="upload_handler.php" method="post" enctype="multipart/form-data">
            <label for="fileUpload">
                <img src="placeholder.png" alt="Обложка"> Нажмите или перетащите изображение на обложку
            </label>
            <input type="file" id="fileUpload" name="fileUpload">
            
            <label>Выберите файл для загрузки</label>
            <input type="file" name="file" >

            <llabel>Укажите название</label>
            <input type="text" name="title" placeholder="Название" >

            <label>Укажите тип произведения</label>
            <select name="type" >
                <option value="" disabled selected>Выберите из выпадающего списка</option>
                <!-- Добавьте ваши опции здесь -->
            </select>

            <label>Укажите авторов (если они есть)</label>
            <input type="text" name="authors" placeholder="Авторы" >

            <label>Укажите категории</label>
            <select name="category" >
                <option value="" disabled selected>Выберите из выпадающего списка</option>
                <!-- Добавьте ваши опции здесь -->
            </select>

            <label>Напишите краткое описание</label>
            <textarea name="description" placeholder="Текст" ></textarea>
            
            <button type="submit" >Отправить на модерацию</button>
        </form>
    </div>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>