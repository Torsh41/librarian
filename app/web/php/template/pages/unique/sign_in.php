<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    
    <!-- Основное содержание формы Регистрации -->
    <div class="sign_in_main">
        <h1>Регистрация</h1>
        <form action="registration_handler.php" method="post" class="sign_in_form">
            <input type="text" id="username" name="username" placeholder="Придумайте логин/никнейм" required>
            <input type="email" id="email" name="email" placeholder="Укажите email" required>

            <input type="password" id="password" name="password" placeholder="Задайте пароль" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Повторите пароль" required>

            <div class="sign_in_capcha">
                <input type="text" id="captcha" name="captcha" placeholder="Введите текст с картинки" required>
                <img src="captcha_image.php" alt="Captcha Image">
            </div>

            <div class="sign_in_checkbox_container">
                <div><input type="checkbox" id="agreement" name="agreement" required></div>
                <label for="agreement">Я прочел(а) и согласен(а) с условиями пользовательского соглашения и с условиями обработки персональных данных</label>
            </div>
            
            <div class="blue_gradient_button">
                <button type="submit" class="but">Зарегистрироваться</button>
            </div>
        </form>
    </div>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>