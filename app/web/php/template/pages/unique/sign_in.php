<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>
<!-- Подключаем заголовок -->

<!-- Взаимодействие с формой -->
<?php
    $error_message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password != $confirm_password) {
            $error_message = "Пароли не совпадают";
        } else {
            require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');
            $db = new ConnectionDB();
            $res = $db->user_insert($username, $email, $password);

            switch ($res) {
            case DBUserResult::Valid:
                break;
            case DBUserResult::InvalidUsernameRegex:
                $error_message = "Недоступные символы в login";
                break;
            case DBUserResult::InvalidUsernameDatabase:
                $error_message = "Указаный login уже используется";
                break;
            case DBUserResult::InvalidEmailRegex:
                $error_message = "Недоступные символы в email";
                break;
            case DBUserResult::InvalidEmailDatabase:
                $error_message = "Указаный email уже используется";
                break;
            case DBUserResult::InvalidEmailNonExistant:
                $error_message = "Не существующий email";
                break;
            }
        }
    }
?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    
    <!-- Основное содержание формы Регистрации -->
    <div class="sign_in_main">
        <h1>Регистрация</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="sign_in_form">
            <input type="text" id="username" name="username" placeholder="Придумайте логин" required>
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
            <span class="error_label"><?php echo $error_message; ?></span>
        </form>
    </div>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>
