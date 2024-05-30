<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');

$db = new ConnectionDB();

// Получение данных из базы данных
$query = $_GET['query'] ?? ''; // Поиск
$filters = [
    'category' => $_POST['category'] ?? [],
    'type' => $_POST['type'] ?? ''
];
$sort = $_GET['sort_to'] ?? ''; // Сортировка
$order = $_GET['order'] ?? ''; // Порядок сортировки

$resources = $db->getResources($query, $filters, $sort, $order); // Получение ресурсов

?>

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
                    <input type="text" name="query" placeholder="Поиск по названию, автору или описанию..." value="<?= htmlspecialchars($query) ?>">
                    <button type="submit">Искать</button>
                </form>
            </div>
        </div>
        <div class="catalog_ref_works">
            <?php foreach ($resources as $resource) : ?>
                <a href="/php/template/pages/reccurring/work_info.php" class="catalog_item">
                    <img src="<?= $resource['icon_path'] ?>" alt="<?= $resource['title'] ?>">
                    <div class="catalog_name_work"><?= $resource['title'] ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="right_side_catalog">
        <div class="vertikal_line"></div> <!-- Вертикальная линия -->
        <!--Прикреплен к правой стороне экрана-->
        <div class="catalog_filters">
            <h2 class="name_raxdel_catalog name_raxdel_catalog2">Фильтры</h2>
            <form action="" method="post" class="filter_categories">
                <div class="name_filtr_categor">Тип</div>
                <fieldset class="calatal_checkboxes calatal_checkboxes2">
                    <?php
                    // Получение всех типов из базы данных и вывод их в виде чекбоксов
                    $types = $db->getAllTypes();
                    foreach ($types as $type) {
                        $checked = is_array($filters['type']) && in_array($type['type_name'], $filters['type']) ? 'checked' : '';
                        echo '<div>';
                        echo '<input type="checkbox" id="' . $type['type_ID'] . '" name="type[]" value="' . $type['type_name'] . '" ' . $checked . '>';
                        echo '<label for="' . $type['type_ID'] . '">' . $type['type_name'] . '</label>';
                        echo '</div>';
                    }
                    ?>
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
