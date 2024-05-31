<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body class="body_cabinet">
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    

    <main class="main_cabinet">

        <div class="upper_info_and_exit_cabinet">
            <div class="avatar_profil_cabinet user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="class="avatar_profil_cabinet""></div>

            <div class="name_user_cabinet_first">Имя пользователя из бд</div>
            <div class="exit_cabinet">Выход</div>
        </div>

        <div class="vkladki_i_soderzhimoe">
        
            <div class="vkladki">
                <div class="favorit_img"><img src="/assets/icons/zakladka_96.png" alt="^" class="favorit_img"></div>
                <div class="user_img"><div class="user_icon_cover"><img src="/assets/icons/person-64.png" alt="8" class="user_img"></div></div>
                <div class="setting_img"><img src="/assets/icons/setting_100.png" alt="^" class="setting_img"></div>
            </div>
            
            <div class="soderzhimoe">


                <!-- Первая вкладка избранное -->
                <div class="favorit_cabinet">

                    <div class="favorit_name_and_sort">
                        <div class="name_vkladki">Избранное</div>

                        <div class="sort_img_and_selector">
                            <img src="/assets/icons/sort_100.png" alt="sort" class="sort_img_cabinet">
                            <!-- Если реализовывать сортировку вот сюда нужен код -->
                            <form action="" class="sort_selection">
                                <select name="sort_to">
                                    <option value="var1">Вариант 1</option>
                                    <option value="var2" selected>... по дате добавления</option>
                                    <option value="var3">Вариант 3</option>
                                </select>
                            </form>
                        </div>

                    </div>
                    <!-- Вот тут вместо тыщи строк нужно доставать из бд -->
                    <div class="items_favorit_works">
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="1обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="2обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="3обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="4обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="5обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="6обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="7обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="8обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="9обложка"><div class="cabinet_name_work">Название</div></a>
                        <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="10обложка"><div class="cabinet_name_work">Название</div></a>
                    </div>
                </div>


                <!-- Вторая вкладка информация о пользователе -->
                <div class="info_about_user_cabinet">
                    <div class="name_vkladki">Информация профиля</div>

                    <div class="flex_for_added_in_cabinet">
                        <div class="Name_categori_aded">Добавлено</div>
                        <div class="items_favorit_works cabinet_aded_scrol">
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="1обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="2обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="3обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="4обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="5обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="6обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="7обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="8обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="9обложка"><div class="cabinet_name_work">Название</div></a>
                            <a href="/php/template/pages/reccurring/work_info.php" class="favorit_item_cabinet"><img src="" alt="10обложка"><div class="cabinet_name_work">Название</div></a>
                        </div>
                    </div>
                    <div class="Podpiski_cabinet">
                        
                        <div class="name_podpiski_cabinet">Подписки</div>
                        <!-- Вот тут из бдшки брать-->
                        <div class="all_podpiski_cabinet">
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                        </div>
                    </div>

                    <div class="Podpiski_cabinet">
                        
                        <div class="name_podpiski_cabinet">Подписчики</div>
                        <!-- Вот тут из бдшки брать-->
                        <div class="all_podpiski_cabinet">
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                            <a class="ref_on_user_cabinet">
                                <div class="cover_for_img_refuser user_icon_cover"><img src="/assets/icons/person-64.png" alt="" class="img_ref_on_user_cabinet"></div>
                                <div class="name_user_cabinet">Имя пользователя</div>
                            </a>
                        </div>
                    </div>
                </div>
            

                <!-- Третья вкладка настройки аккаунта -->
                <div class="settings_cabinet">
                    <div class="name_vkladki">Настройка профиля</div>

                    <!-- Нужно обработать форму -->
                    <div class="sami_settins_cabinet">
                        <form action="upload_handler.php" method="post" enctype="multipart/form-data" class="change_photo">
                            <label for="fileUpload">Загрузити новое фото профиля</label>                        
                            <input type="file" id="fileUpload" name="fileUpload" class="upload_photo_cabinet">
                        </form>
                        <form action="" class="change_nickname_cabinet">
                            <label for="">Никнейм</label>
                            <input type="text" name="change_nickname" placeholder="Имя из бд">
                            <button type="submit">Редактировать</button>
                        </form>
                        <form action="" class="change_email_cabinet">
                            <label for="">Email</label>
                            <input type="text" name="change_email" placeholder="Email из бд">
                            <button type="submit">Редактировать</button>
                        </form>
                        <form action="" class="change_password_cabinet">
                            <label for="">Пароль</label>
                            <input type="text" name="change_password" placeholder="Введите новый пароль">
                            <button type="submit">Редактировать</button>
                        </form>
                    </div>

                    <div class="delete_accaunt">Удалить профиль</div>
                </div>
            
            
            </div>
        
        </div>

    </main>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>