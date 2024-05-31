<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>
<!-- Подключаем заголовок -->

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

    <!-- Проверяем, если пользователь залогинен -->
    <?php if (isset($_SESSION['user_ID'])) { ?>

    <?php
        $error_message = "";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');
        $db = new ConnectionDB();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $publisher_id = $_SESSION['user_ID'];

            $preview = $_FILES['preview'];
            $resource = $_FILES['resource'];

            // TODO: return to some other page after success
            // TODO: check preview size via getimagesize(...)
            // TODO: Expand on upload errors
            // TODO: test
            if ($preview['error'] != UPLOAD_ERR_OK) {
                $error_message = "Плохая превью картинка";
                goto skip_upload;
            }

            if ($resource['error'] != UPLOAD_ERR_OK) {
                $error_message = "Плохой основной файл";
                goto skip_upload;
            }

            require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/FileStorage.php');

            $preview_file_name = FileStorage::resource_add(
                FileStorage::PREVIEW_UPLOAD_DIR,
                FileStorage::PREVIEW_EXT_REGEX,
                $preview['name'],
                $preview['tmp_name'],
                $preview['size']
            );
            switch ($preview_file_name) {
            case FSResourceResult::InvalidSize:
                $error_message = "Превью картинка слишком большого размера";
                break;
            case FSResourceResult::InvalidExt:
                $error_message = "Формат превью картинки не поддерживается";
                break;
            case FSResourceResult::InvalidUploadFile:
                $error_message = "Ошибка заугрузки превью файла";
                break;
            }

            $resource_file_name = FileStorage::resource_add(
                FileStorage::RESOURCE_UPLOAD_DIR,
                FileStorage::RESOURCE_EXT_REGEX,
                $resource['name'],
                $resource['tmp_name'],
                $resource['size']
            );
            switch ($preview_file_name) {
            case FSResourceResult::InvalidSize:
                $error_message = "Основной файл слишком большого размера";
                break;
            case FSResourceResult::InvalidExt:
                $error_message = "Формат основного файла не поддерживается";
                break;
            case FSResourceResult::InvalidUploadFile:
                $error_message = "Ошибка заугрузки основного файла";
                break;
            }

            $title = $_POST['title'];
            $publication_name = $_POST['publication_name'];
            $type = $_POST['type'];
            $category = $_POST['category'];
            $author = $_POST['author'];
            $description = $_POST['description'];

            $res = $db->resource_insert(
                $publisher_id,
                $type,
                $category,
                $resource_file_name,
                $preview_file_name,
                $author,
                $title,
                $publication_name,
                $description
            );
        }
        skip_upload: // goto label
    ?>
    
    <!-- Основное содержание формы добавления файла -->
    <div class="main_add_work">
        <h2>Добавление файла</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="add_work_form1">
            <label for="fileUpload">
                <img src="placeholder.png" alt="Обложка"> Нажмите или перетащите изображение на обложку
            </label>
            <input type="file" id="fileUpload" name="preview">
            
            <label>Выберите файл для загрузки</label>
            <input type="file" name="resource" >

            <label>Укажите короткое название</label>
            <input type="text" name="title" placeholder="Короткое название" class="add_work_text">

            <label>Укажите полное название</label>
            <input type="text" name="publication_name" placeholder="Полное название" class="add_work_text">

            <label>Укажите тип произведения</label>
            <select name="type" >
                <option value="" disabled selected>Выберите из выпадающего списка</option>
                <?php
                    $types = $db->getAllTypes();
                    foreach ($types as $type) {
                        echo '<option value="' . $type['type_ID'] . '">' . $type['type_name'] . '</option>';
                    }
                ?>
            </select>

            <label>Укажите авторов (если они есть)</label>
            <input type="text" name="author" placeholder="Авторы" class="add_work_text">

            <label>Укажите категории</label>
            <select name="category" >
                <option value="" disabled selected>Выберите из выпадающего списка</option>
                <?php
                    $tags = $db->getAllCategories();
                    foreach ($tags as $tag) {
                        echo '<option value="' . $tag['tags_ID'] . '">' . $tag['tag_name'] . '</option>';
                    }
                ?>
            </select>

            <label>Напишите краткое описание</label>
            <textarea name="description" placeholder="Текст" ></textarea>
            
            <div class="button_cover_add_work">    
                <button type="submit" >Отправить на модерацию</button>
            </div>
        </form>
    </div>

    <?php } else /* $_SESSION['user_ID'] */ { ?>

    <div>
        <p>Пожалуйста, войдите в свою учетную запись.</p>
    </div>

    <?php } ?>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>
