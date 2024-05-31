<?php
//Для создания header для произведений
$meta_name_book = array();

// тут нужно добавить соединение с базой данных и получении данных о книг, к примеру вот:

// require($_SERVER['DOCUMENT_ROOT'] . '/function/conectBD.php');
// $name_book = mysqli_query($connectBD,"SELECT id_works, name_works FROM data_of_works");
// foreach ($name_book as $nameBoo) {
//     $meta_name_book[$nameBoo['id_works']] = $nameBoo['name_works']; 
// }

//Для создания header для страниц
$meta = [
    'index'=>[
        'title'=>'Сайт Библиотека',
        'description'=>'Тут можно удобно прочитать книги, учебники, конспекты и т.д.',
        'scripts'=>[
            '/scripts/carusel/little_slider.js',
            '/scripts/carusel/big_slider.js',
        ],
        'style'=>[
            '/css/carusel/little_slider.css',
            '/css/carusel/big_slider.css',
            '/css/pages/index.css',
        ], 
    ],
    'php/template/pages/unique/catalog'=>[
        'title'=>'Каталог',
        'description'=>'Найди то что тебе нужно',
        'scripts'=>[],
        'style'=>[
            '/css/pages/catalog.css',
        ],
    ],
    'php/template/pages/unique/add_work'=>[
        'title'=>'Добавление произведения',
        'description'=>'Добавте на сайт новую работу',
        'scripts'=>[],
        'style'=>[
            '/css/pages/add_work.css',
        ],
    ],
    'php/template/pages/unique/sign_up'=>[
        'title'=>'Авторизация',
        'description'=>'войдите в свою учетную запись',
        'scripts'=>[],
        'style'=>[
            '/css/pages/sign_up.css',    
        ],
    ],
    'php/template/pages/unique/sign_in'=>[
        'title'=>'Регистрация',
        'description'=>'присоединяййтесь к нам',
        'scripts'=>[],
        'style'=>[
            '/css/pages/sign_in.css',
        ],
    ],
    'php/template/pages/reccurring/work_info'=>[
        'title'=> 'работа', //$meta_name_book,
        'description'=> 'Инфо о работе', //$meta_name_book,
        'scripts'=>[
            '/scripts/carusel/little_slider.js',
        ],
        'style'=>[
            '/css/pages/work_info.css',
            '/css/carusel/little_slider.css',
        ],
    ],
    'php/template/pages/reccurring/cabinet'=>[
        'title'=> 'Личный кабинет',
        'description'=> 'Личный кабинет',
        'scripts'=>[
            '/scripts/pages/cabinet_changh_vkladku.js',
        ],
        'style'=>[
            '/css/pages/cabinet.css',
        ],
    ],
];