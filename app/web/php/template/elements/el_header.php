<div class="under_header"></div>
</header><header>
    <nav>

        <a href="/index.php" class="header_logo"><img src="logo.png" alt="Logo"></a>
        
        <ul class="ref_on_pages">
            <li>
                <a href="/php/template/pages/unique/catalog.php" class="header_icon_and_button">
                    <div class="header_icon"><img src="/assets/icons/bar-48.png" alt="=" class="header_icon"></div>
                    <div>Каталог</div>
                </a>
            </li>
            <li class="header_search">
                <div class="header_icon_and_button"> 
                    <div class="header_icon"><img src="/assets/icons/search-96.png" alt="O" class="header_icon"></div>
                    <div>Поиск</div>
                </div>
                <!--При навелении на поиск должно появляться окно поиска через js-->
                <form action="" method="get" class="header_search_form">
                    <input type="text" name="query" placeholder="Поиск...">
                    <button type="submit">Искать</button>
                </form>
            </li>
            <!-- Тут нужно добавить проверку авторизован ли пользователь и если да, то выводить ссылку на добавлении работы-->
            <li class="header_add_work">
                <a href="/php/template/pages/unique/add_work.php" class="header_icon_and_button">
                    <div class="header_icon"><img src="/assets/icons/add-32.png" alt="+" class="header_icon"></div>
                    <div>Добавить</div>
                </a>
            </li>
        </ul>
        
        <!-- тут же опять в зависимости от авторизован пользователь или нет(либо рег/авт либо личный кабинет) -->
        <ul class="ref_on_sign">
            <li><a href="/php/template/pages/unique/sign_up.php">Вход</a></li>
            <li><a href="/php/template/pages/unique/sign_in.php" class="reg_button">Регистрация</a></li>
            <!--Имя достаем из информации о сессии-->
            <li class="header_user">
                <a href="/php/template/pages/reccurring/cabinet.php" class="header_icon_and_button">
                    <div>Имя пользователя</div>
                    <div class="header_icon icon_person">
                        <img src="/assets/icons/person-64.png" alt="P" class="header_icon icon_person">
                    </div>
                </a>
            </li>
        </ul>

    </nav>
</header>
