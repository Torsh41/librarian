<header>
    <nav>
        <a href="/index.php"><img src="logo.png" alt="Logo"></a>
        <ul>
            <li><div><div><!--иконка 3х палочек--></div><a href="/php/template/pages/unique/catalog.php">Каталог</a></div></li>
            <li>
                <div><div><!--иконка лупы--></div><div>Поиск</div></div>
                <!--При навелении на поиск должно появляться окно поиска через js-->
                <form action="" method="get">
                    <input type="text" name="query" placeholder="Поиск...">
                    <button type="submit">Искать</button>
                </form>
            </li>
            <!-- Тут нужно добавить проверку авторизован ли пользователь и если да, то выводить ссылку на добавлении работы-->
            <li><div><div><!--иконка плюсика--></div><a href="/php/template/pages/unique/add_work.php">Добавить</a></div></li>
        </ul>
        <!-- тут же опять в зависимости от авторизован пользователь или нет(либо рег/авт либо личный кабинет) -->
        <ul>
            <li><a href="/php/template/pages/unique/sign_up.php">Вход</a></li>
            <li><a href="/php/template/pages/unique/sign_in.php">Регистрация</a></li>
        </ul>
        <div>
            <!--Имя достаем из информации о сессии-->
            <div><a href="/php/template/pages/reccurring/cabinet.php">Имя пользователя</a></div><div><!--изображение человека--></div>
        </div>
    </nav>
</header>
