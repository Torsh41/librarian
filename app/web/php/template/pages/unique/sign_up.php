<!-- Подключаем заголовок -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/header.php'); ?>

<body>
    <!-- Подключаем header -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_header.php'); ?>
    
    <!-- Основное содержание формы авторизации -->
    <div>
        <h1>Авторизация</h1>
        <form action="auth_handler.php" method="post">
            <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
            <input type="password" id="password" name="password" placeholder="Введите пароль" required>

            <a href="#forget">Забыли пароль</a>

            <button type="submit">Войти</button>
        </form>
    </div>

    <!-- Подключаем footer -->
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/el_footer.php'); ?>
</body>

<!-- Подключаем конец файла -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/php/template/elements/main/footer.php'); ?>