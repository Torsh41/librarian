<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<!-- <?php print_r($_SESSION['user_ID']); ?> -->
<!-- Взаимодействие с формой -->
<?php
    $error_message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/function/ConnectionDB.php');
        $db = new ConnectionDB();
        $res = $db->user_verify_password($email, $password);

        if ($res == null) {
            $error_message = "Указаный email не используется";
        } else if ($res == false) {
            $error_message = "Неверно указан пароль";
        } else {
            // Пароль совпал
            // echo "Успех!\n";
            $_SESSION['user_ID'] = $res;
        }
    }
?>
<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    
    <!-- Основное содержание формы авторизации -->
    <div class="sign_up_main">
        <h1>Авторизация</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="sign_up_form">
            <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
            <input type="password" id="password" name="password" placeholder="Введите пароль" required>

            <a href="#forget" class="forget_password">Забыли пароль?</a>

            <button type="submit" class="blue_gradient_button but">Войти</button>
            <span class="error_label"><?php echo $error_message; ?></span>
        </form>
    </div>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>
