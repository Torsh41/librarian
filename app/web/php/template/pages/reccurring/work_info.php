<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');
session_start(); // Начало сессии для проверки залогиненности пользователя

$db = new ConnectionDB();

// Получаем ID книги из URL
$bookId = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($bookId) {
    $bookInfo = $db->getBookId($bookId);
    if (!$bookInfo) {
        echo "Книга не найдена";
        exit;
    }
} else {
    echo "ID книги не указан";
    exit;
}

$relatedBooks = $db->getRandomBooks();

// Проверка, залогинен ли пользователь
$isLoggedIn = isset($_SESSION['user_id']);
$userId = $isLoggedIn ? $_SESSION['user_id'] : null;

// Обработка отправки формы оценки
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rating'])) {
    $rating = intval($_POST['rating']);
    if ($isLoggedIn && $rating >= 1 && $rating <= 5) {
        $db->updateBookRating($bookId, $rating);
    }
}

// Обработка добавления в избранное
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_favorite'])) {
    if ($isLoggedIn) {
        $db->addBookToFavorites($userId, $bookId);
    }
}

?>

<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
<!-- Подключаем header -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

<!-- Основное содержание страницы книги -->
<main class="main_work_info">
    <div class="general_work_info">
        <div class="img_and_action_work_info">
            <img src="<?= htmlspecialchars($bookInfo['icon_path'] ?? '') ?>" alt="<?= htmlspecialchars($bookInfo['title'] ?? '') ?>" class="oblozhka_work_info">
            <div class="action_with_boo_work_info">
                <a href="<?= htmlspecialchars($bookInfo['file_path'] ?? '') ?>" class="cover_read_online_work_info">
                    <div class="read_online_work_info">Начать читать</div>
                </a><?php

                require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');
                session_start(); // Начало сессии для проверки залогиненности пользователя

                $db = new ConnectionDB();

                // Получаем ID книги из URL
                $bookId = isset($_GET['id']) ? intval($_GET['id']) : null;

                if ($bookId) {
                    $bookInfo = $db->getBookId($bookId);
                    if (!$bookInfo) {
                        echo "Книга не найдена";
                        exit;
                    }
                } else {
                    echo "ID книги не указан";
                    exit;
                }

                $relatedBooks = $db->getRandomBooks();
                $resources = $relatedBooks; // Добавляем это для передачи в слайдер

                // Проверка, залогинен ли пользователь
                $isLoggedIn = isset($_SESSION['user_id']);
                $userId = $isLoggedIn ? $_SESSION['user_id'] : null;

                // Обработка отправки формы оценки
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rating'])) {
                    $rating = intval($_POST['rating']);
                    if ($isLoggedIn && $rating >= 1 && $rating <= 5) {
                        $db->updateBookRating($bookId, $rating);
                    }
                }

                // Обработка добавления в избранное
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_favorite'])) {
                    if ($isLoggedIn) {
                        $db->addBookToFavorites($userId, $bookId);
                    }
                }

                ?>

                <!-- Подключаем заголовок -->
                <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

                <body>
                <!-- Подключаем header -->
                <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

                <!-- Основное содержание страницы книги -->
                <main class="main_work_info">
                    <div class="general_work_info">
                        <div class="img_and_action_work_info">
                            <img src="<?= htmlspecialchars($bookInfo['icon_path'] ?? '') ?>" alt="<?= htmlspecialchars($bookInfo['title'] ?? '') ?>" class="oblozhka_work_info">
                            <div class="action_with_boo_work_info">
                                <a href="<?= htmlspecialchars($bookInfo['file_path'] ?? '') ?>" class="cover_read_online_work_info">
                                    <div class="read_online_work_info">Начать читать</div>
                                </a>
                                <a href="<?= htmlspecialchars($bookInfo['file_path'] ?? '') ?>" download>
                                    <img src="/assets/icons/download-96.png" alt="Download" class="download_work_info">
                                </a>
                            </div>
                        </div>
                        <div class="text_info_about_book">
                            <div class="data_work_info">
                                <div class="name_work_info"><?= htmlspecialchars($bookInfo['title'] ?? '') ?></div>
                                <div class="type_work_info">
                                    Тип: <?= isset($bookInfo['type_name']) ? '<a href="/php/template/pages/unique/catalog.php?type=' . htmlspecialchars($bookInfo['resource_type_ID']) . '">' . htmlspecialchars($bookInfo['type_name']) . '</a>' : '' ?>
                                </div>
                                <div class="hwo_upload_work_info">
                                    Загружено: Админ
                                </div>
                                <div class="short_text_work_info">Краткое описание</div>
                                <div class="big_text_work_info"><?= nl2br(htmlspecialchars($bookInfo['description'] ?? '')) ?></div>
                            </div>
                            <div class="tags_and_user_info_work_info">
                                <div class="rate_work_info">
                                    <img src="/assets/icons/star-96.png" alt="*" class="star">
                                    <div class="text_rate"><?= htmlspecialchars($bookInfo['rating'] ?? '') ?></div>
                                </div>
                                <div class="cover_categorii">
                                    <div class="categorii">
                                        <div class="name_categor">Категория: </div>
                                        <?php if (isset($bookInfo['tags'])) : ?>
                                            <?php
                                            $categoryName = $db->getCategoryNameById($bookInfo['tags']);
                                            ?>
                                            <a href="/php/template/pages/unique/catalog.php?category=<?= htmlspecialchars($bookInfo['tags']) ?>" class="categ_book_info">
                                                <?= htmlspecialchars($categoryName) ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div>
                                    <?php if ($isLoggedIn) : ?>
                                        <form method="post">
                                            <label for="rating">Оцените книгу:</label>
                                            <select name="rating" id="rating">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <button type="submit">Отправить</button>
                                        </form>
                                        <form method="post">
                                            <input type="hidden" name="add_favorite" value="1">
                                            <button type="submit">Добавить в избранное</button>
                                        </form>
                                    <?php else : ?>
                                        <p>Войдите в систему, чтобы оценить книгу или добавить её в избранное.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php $name_razdela_slider = "Вам может быть интересно"; ?>
                        <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php'); ?>
                    </div>
                </main>

                <!-- Подключаем footer -->
                <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
                </body>

                <!-- Подключаем конец файла -->
                <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>

                <a href="<?= htmlspecialchars($bookInfo['file_path'] ?? '') ?>" download>
                    <img src="/assets/icons/download-96.png" alt="Download" class="download_work_info">
                </a>
            </div>
        </div>
        <div class="text_info_about_book">
            <div class="data_work_info">
                <div class="name_work_info"><?= htmlspecialchars($bookInfo['title'] ?? '') ?></div>
                <div class="type_work_info">
                    Тип: <?= isset($bookInfo['type_name']) ? '<a href="/php/template/pages/unique/catalog.php?type=' . '">' . htmlspecialchars($bookInfo['type_name']) . '</a>' : '' ?>
                </div>
                <div class="hwo_upload_work_info">
                    Загружено: Админ
                </div>
                <div class="short_text_work_info">Краткое описание</div>
                <div class="big_text_work_info"><?= nl2br(htmlspecialchars($bookInfo['description'] ?? '')) ?></div>
            </div>
            <div class="tags_and_user_info_work_info">
                <div class="rate_work_info">
                    <img src="/assets/icons/star-96.png" alt="*" class="star">
                    <div class="text_rate"><?= htmlspecialchars($bookInfo['rating'] ?? '') ?></div>
                </div>
                <div class="cover_categorii">
                    <div class="categorii">
                        <div class="name_categor">Категория: </div>
                        <?php if (isset($bookInfo['tags'])) : ?>
                            <?php
                            $categoryName = $db->getCategoryNameById($bookInfo['tags']);
                            ?>
                            <a href="/php/template/pages/unique/catalog.php?category=<?= htmlspecialchars($bookInfo['tags']) ?>" class="categ_book_info">
                                <?= htmlspecialchars($categoryName) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <?php if ($isLoggedIn) : ?>
                        <form method="post">
                            <label for="rating">Оцените книгу:</label>
                            <select name="rating" id="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit">Отправить</button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="add_favorite" value="1">
                            <button type="submit">Добавить в избранное</button>
                        </form>
                    <?php else : ?>
                        <p>Войдите в систему, чтобы оценить книгу или добавить её в избранное.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php $name_razdela_slider = "Вам может быть интересно"; ?>
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/sliders/little_slider.php'); ?>
    </div>
</main>

<!-- Подключаем footer -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>
