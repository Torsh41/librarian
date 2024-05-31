<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>
<!-- Подключаем заголовок -->

<body>
<!-- Подключаем header -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');

$db = new ConnectionDB();

// Получение данных из базы данных
$query = $_GET['query'] ?? ''; // Поиск
$filters = [
    'category' => $_GET['category'] ?? '', // Изменено на единственное значение
    'type' => $_GET['type'] ?? '' // Изменено на GET
];
$sort = $_GET['sort_to'] ?? ''; // Сортировка
$order = $_GET['order'] ?? ''; // Порядок сортировки

$resources = $db->getResources($query, $filters, $sort, $order); // Получение ресурсов

?>

<!-- Основное содержание каталог -->
<div class="wight_block"></div>
<main class="catalog">
    <div class="left_side_catalog">
        <div class="catalog_fix_in_top">
            <h2 class="name_raxdel_catalog name_raxdel_catalog1">Каталог</h2>
            <!-- <hr> -->
            <div class="category_sort_and_search">
                <form action="" method="get">
                    <input type="text" name="query" placeholder="Поиск по названию, автору или описанию..." value="<?= htmlspecialchars($query) ?>">
                    <button type="submit">Искать</button>
                </form>
            </div>
        </div>
        <div class="catalog_ref_works">
            <?php foreach ($resources as $resource) : ?>
                <a href="/php/template/pages/reccurring/work_info.php?id=<?= $resource['resources_ID'] ?>" class="catalog_item">
                    <img src="<?= htmlspecialchars($resource['icon_path']) ?>" alt="<?= htmlspecialchars($resource['title']) ?>">
                    <div class="catalog_name_work"><?= htmlspecialchars($resource['title']) ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="right_side_catalog">
        <div class="vertikal_line"></div> <!-- Вертикальная линия -->
        <!-- Прикреплен к правой стороне экрана -->
        <div class="catalog_filters">
            <h2 class="name_raxdel_catalog name_raxdel_catalog2">Фильтры</h2>
            <form action="" method="get" class="filter_categories"> <!-- Изменено на GET -->
                <div class="name_filtr_categor">Тип</div>
                <fieldset class="calatal_checkboxes calatal_checkboxes2">
                    <?php
                    // Получение всех типов из базы данных и вывод их в виде чекбоксов
                    $types = $db->getAllTypes();
                    foreach ($types as $type) {
                        $checked = $filters['type'] == $type['type_name'] ? 'checked' : '';
                        echo '<div>';
                        echo '<input type="radio" id="' . htmlspecialchars($type['type_ID']) . '" name="type" value="' . htmlspecialchars($type['type_name']) . '" ' . $checked . '>';
                        echo '<label for="' . htmlspecialchars($type['type_ID']) . '">' . htmlspecialchars($type['type_name']) . '</label>';
                        echo '</div>';
                    }
                    ?>
                    <div>
                        <input type="radio" id="type_none" name="type" value="" <?= $filters['type'] == '' ? 'checked' : '' ?>>
                        <label for="type_none">Без типа</label>
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
