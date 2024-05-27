<?php
// если будут сессии
// session_start();

//Получаем массив с данными для заголовка сайта
require_once($_SERVER['DOCUMENT_ROOT'].'/php/schemas/meta.php'); 

/*
echo '<pre>';
print_r($meta);
echo '</pre>';
*/

//получаем путь к файлу без первого слэша
$url = $_SERVER['REQUEST_URI'];
$metaKey = substr($url,1);
//если это начальная страница но добавляем index, а то строка пустенькая
if($metaKey){
    // Найти позицию подстроки
    $position = strpos($metaKey, '.php');
    if ($position !== false) {
        // Извлечь подстроку до позиции
        $metaKey = substr($metaKey, 0, $position);
        //echo $metaKey;//////////////////////////////////////////закоментировать когда закончу
    } else {
        $metaKey = 'index';
    }
}else{
    $metaKey = 'index';
}

//В общем если это страница произведения мы достаём название из БД
if (strpos($url, 'php/template/pages/recurring/work_info')) {
    // Разбор URL
    $parsedUrl = parse_url($url);
    // Получение строки запроса
    $queryString = $parsedUrl['query']; // то что идет после ? в url
    // Разбор строки запроса
    parse_str($queryString, $queryParams);
    // Получение значения из бд 'some_name_from_db'
    //$idWork = $queryParams['some_name_from_db']; // таким обрахом получаем id работы
    
    //echo $idWork;
    ?>

    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="description" 
            content="<?php echo $meta[$metaKey]['description'][$idWork]?>">
        <!--link href="" rel="icon"--> <!--если нужна иконка-->
        <!-- Получаем название сайта из метаданных -->
        <title>
            <?php echo $meta[$metaKey]['title'][$idWork]?>
        </title>
    <?php
} else { ?> <!-- Иначе это просто название и описание которое прямо хранится в meta -->
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="description" 
            content="<?php echo $meta[$metaKey]['description']?>">
        <!--link href="" rel="icon"--> <!--если нужна иконка-->
        <!-- Получаем название сайта из метаданных -->
        <title>
            <?php echo $meta[$metaKey]['title']?>
        </title>

<?php }?>
        <!-- тут будут общие стили для всех страниц -->
        
        <!-- тут будут уникальные стили для каждой страницы указаны в schemas/meta.php -->
        <?php
            if($meta[$metaKey]['style']):
                foreach ($meta[$metaKey]['style'] as $sref):    
                    echo '<link rel="stylesheet" href="'.$sref.'">';    
                endforeach;
            endif;
        ?>


        <!-- тут будут общие скрипты для каждой страницы указаны в schemas/meta.php-->
        
        
        <!-- тут будут уникальные js скрипты для каждой страницы -->
        <?php
            if($meta[$metaKey]['scripts']):
                foreach ($meta[$metaKey]['scripts'] as $sref):    
                    echo '<script src="'.$sref.'"></script>';    
                endforeach;
            endif;
        ?>

       
    </head>