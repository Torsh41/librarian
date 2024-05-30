<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');

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
                        <div class="name_categor">Категории: </div>
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
                    Добавить в избранное
                    <img src="/assets/icons/flag-96.png" alt="флажок js+db" class="flag-icon">
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
