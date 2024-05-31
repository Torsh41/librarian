<div class="under_header"></div>
<header>
    <nav>

        <a href="/index.php" class="header_logo"><img src="logo.png" alt="Logo"></a>
        
        <ul class="ref_on_pages">
            <li>
                <a href="/php/template/pages/unique/catalog.php" class="header_icon_and_button header_i_wanna_click">
                    <div class="header_icon"><img src="/assets/icons/bar-48.png" alt="=" class="header_icon"></div>
                    <div>Каталог</div>
                </a>
            </li>
            <li class="header_search">
                <div class="header_icon_and_button header_i_wanna_click"> 
                    <div class="header_icon"><img src="/assets/icons/search-96.png" alt="O" class="header_icon"></div>
                    <div>Поиск</div>
                </div>
                <!--При навелении на поиск должно появляться окно поиска через js-->
                <form action="" method="get" class="header_search_form">
                    <input type="text" name="query" placeholder="Поиск...">
                    <button type="submit"><img src="/assets/icons/search-96.png" alt="O" class="header_search_button_icon"></button>
                </form>
            </li>
            <!-- Тут нужно добавить проверку авторизован ли пользователь и если да, то выводить ссылку на добавлении работы-->
            <?php if (isset($_SESSION['user_ID'])) { ?>
            <li class="header_add_work header_i_wanna_click">
                <a href="/php/template/pages/unique/add_work.php" class="header_icon_and_button">
                    <div class="header_icon"><img src="/assets/icons/add-32.png" alt="+" class="header_icon"></div>
                    <div>Добавить</div>
                </a>
            </li>
            <?php } ?>
        </ul>
        
        <!-- тут же опять в зависимости от авторизован пользователь или нет(либо рег/авт либо личный кабинет) -->
        <ul class="ref_on_sign">
            <?php if (!isset($_SESSION['user_ID'])) { ?>
            <li class="header_i_wanna_click">
                <a href="/php/template/pages/unique/sign_up.php">Вход</a>
            </li>
            <li class="">
                <a href="/php/template/pages/unique/sign_in.php" class="reg_button">Регистрация</a>
            </li>
            <!--Имя достаем из информации о сессии-->
            <?php } else { ?>
            <li class="header_user">
                <a href="/php/template/pages/reccurring/cabinet.php" class="header_icon_and_button">
                    <div class="header_i_wanna_click"><?php echo $_SESSION['username']; ?></div>
                    <div class="header_icon icon_person">
                    <?php if ($_SESSION['avatar_path'] != '') { ?>
                        <img src="<?php echo $_SESSION['avatar_path']; ?>" alt="P" class="header_icon icon_person">
                    <?php } else { ?>
                        <img src="/assets/icons/person-64.png" alt="P" class="header_icon icon_person">
                    <?php } ?>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>

    </nav>
</header>
