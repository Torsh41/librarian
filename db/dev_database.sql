-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db:3306
-- Время создания: Май 30 2024 г., 18:46
-- Версия сервера: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Версия PHP: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dev_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `request_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `resource_ID` int(11) DEFAULT NULL,
  `status_ID` int(11) DEFAULT NULL,
  `request_aim` varchar(255) DEFAULT NULL,
  `request_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `resources`
--

CREATE TABLE `resources` (
  `resources_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publication_name` varchar(100) DEFAULT NULL,
  `publisher` int(11) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tags` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `resource_type_ID` int(11) DEFAULT NULL,
  `icon_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `resources`
--

INSERT INTO `resources` (`resources_ID`, `title`, `author`, `publication_name`, `publisher`, `pages`, `description`, `tags`, `rating`, `file_path`, `resource_type_ID`, `icon_path`) VALUES
(2, 'Английский для химиков-технологов', 'Т.И. Кузнецова Е.В. Воловикова И.А. Кузнецов', '', NULL, 262, 'Учебник по английскому для химиков-технологов.', 2, 0, '/files/english_for_chemical_engineers.pdf', 2, '/icons/book_icon.png'),
(3, 'Задачи по общей химии', 'А.Ф. Воробьева', '', NULL, 248, 'Задачник по общей химии.', 2, 0, '/files/general_chemistry_problems.pdf', 3, '/icons/book_icon.png'),
(4, 'Задачи и упражнения по органической химии', 'В.М. Потапов С.Н. Татаринчик А.В. Аверина', '', NULL, 184, 'Задачник по органической химии.', 2, 0, '/files/organic_chemistry_problems_and_exercises.pdf', 3, '/icons/book_icon.png'),
(5, 'Общие методы работы в лаборатории органической химии', 'РХТУ им. Д.И. Менделеева', '', NULL, 150, 'Учебник по общим методам работы в лаборатории органической химии.', 2, 0, '/files/general_methods_in_organic_chemistry_lab.pdf', 2, '/icons/book_icon.png'),
(6, 'Органическая химия', 'РХТУ им. Д.И. Менделеева', '', NULL, 150, 'Учебник по органической химии.', 2, 0, '/files/organic_chemistry.pdf', 2, '/icons/book_icon.png'),
(7, 'Аналитическая химия. Химические методы анализа', 'С.Л. Рогатинская', '', NULL, 150, 'Задачник по аналитической химии.', 2, 0, '/files/analytical_chemistry_chemical_methods.pdf', 3, '/icons/book_icon.png'),
(8, 'Дифференциальное и интегральное исчисление функции многих переменных', 'РХТУ им. Д.И. Менделеева', '', NULL, 150, 'Учебник по дифференциальному и интегральному исчислению функции многих переменных.', 1, 0, '/files/multivariable_calculus.pdf', 3, '/icons/book_icon.png'),
(9, 'Основы языка программирования Си', 'РХТУ им. Д.И. Менделеева', '', NULL, 150, 'Учебник по основам языка программирования Си.', 6, 0, '/files/fundamentals_of_c_programming.pdf', 2, '/icons/book_icon.png'),
(10, 'Сборник расчетных работ по высшей математике ТОМ 2', 'РХТУ им. Д.И. Менделеева', '', NULL, 150, 'Обыкновенные дифференциальный уравнения и системы. Ряды. Уравнения в частных производных.', 1, 0, '/files/higher_math_calculation_works_volume_2.pdf', 3, '/icons/book_icon.png'),
(11, 'C++. Элементарное программирование', 'Ю.В. Сбоева', '', NULL, 150, 'Учебник по элементарному программированию на C++.', 6, 0, '/files/cpp_elementary_programming.pdf', 2, '/icons/book_icon.png'),
(12, 'Сборник задач по высшей математике', 'К.Н. Лунгу', '', NULL, 150, 'Линейная алгебра. Аналитическая геометрия. Основы математического анализа. Комплексные числа.', 1, 0, '/files/advanced_math_problem_set.pdf', 3, '/icons/book_icon.png'),
(13, 'Введение в нанотехнологию', 'Н. Кобаяси', '', NULL, 150, 'Учебник по введению в нанотехнологии.', 17, 0, '/files/introduction_to_nanotechnology.pdf', 2, '/icons/book_icon.png'),
(14, 'Титриметрические методы анализа', 'Н.М. Дубова', '', NULL, 150, 'Учебник по титриметрическим методам анализа.', 2, 0, '/files/titrimetric_analysis_methods.pdf', 2, '/icons/book_icon.png'),
(15, 'Сборник задач по теории вероятностей', 'Х.М. Андрухаев', '', NULL, 150, 'Сборник задач по теории вероятностей.', 30, 0, '/files/probability_theory_problem_set.pdf', 3, '/icons/book_icon.png'),
(16, 'Задачи и упражнения по математическому анализу', 'И.А. Виноградова С.Н. Олехник В.А. Садовничий', '', NULL, 150, 'Задачник по математическому анализу.', 1, 0, '/files/math_analysis_problems_and_exercises.pdf', 3, '/icons/book_icon.png');

-- --------------------------------------------------------

--
-- Структура таблицы `resource_types`
--

CREATE TABLE `resource_types` (
  `type_ID` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `resource_types`
--

INSERT INTO `resource_types` (`type_ID`, `type_name`) VALUES
(1, 'Статья'),
(2, 'Учебник'),
(3, 'Конспект'),
(4, 'Реферат'),
(5, 'Диссертация'),
(6, 'Лекция'),
(7, 'Книга'),
(8, 'Отчет'),
(9, 'Исследование'),
(10, 'Презентация'),
(11, 'Видео'),
(12, 'Аудио'),
(13, 'Электронная книга'),
(14, 'Документ'),
(15, 'Справочник');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `roles_ID` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`roles_ID`, `role_name`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `status_ID` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `tags_ID` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`tags_ID`, `tag_name`) VALUES
(1, 'Математика'),
(2, 'Химия'),
(3, 'Физика'),
(4, 'История'),
(5, 'Биология'),
(6, 'Информатика'),
(7, 'Литература'),
(8, 'География'),
(9, 'Искусство'),
(10, 'Музыка'),
(11, 'Философия'),
(12, 'Экономика'),
(13, 'Социология'),
(14, 'Политология'),
(15, 'Право'),
(16, 'Психология'),
(17, 'Технологии'),
(18, 'Инженерия'),
(19, 'Экология'),
(20, 'Медицина'),
(21, 'Астрономия'),
(22, 'Лингвистика'),
(23, 'Антропология'),
(24, 'Археология'),
(25, 'Этика'),
(26, 'Культурология'),
(27, 'Спорт'),
(28, 'Образование'),
(29, 'Логика'),
(30, 'Статистика'),
(31, 'Маркетинг'),
(32, 'Менеджмент'),
(33, 'Финансы'),
(34, 'Бухгалтерия'),
(35, 'Туризм'),
(36, 'Религия'),
(37, 'Геология'),
(38, 'Агрономия');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `roles_ID` int(11) DEFAULT NULL,
  `avatar_path` varchar(255) DEFAULT NULL,
  `subscriptions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`subscriptions`)),
  `added_books` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`added_books`)),
  `favorite_books` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`favorite_books`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_ID`, `username`, `password_hash`, `email`, `roles_ID`, `avatar_path`, `subscriptions`, `added_books`, `favorite_books`) VALUES
(10, 'user1', 'example', 'user1@example.com', 1, '/avatars/user1.png', '[]', '[]', '[]'),
(11, 'user2', 'example', 'user2@example.com', 2, '/avatars/user2.png', '[]', '[]', '[]'),
(12, 'user3', 'example', 'user3@example.com', 3, '/avatars/user3.png', '[]', '[]', '[]');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `resource_ID` (`resource_ID`),
  ADD KEY `status_ID` (`status_ID`);

--
-- Индексы таблицы `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resources_ID`),
  ADD KEY `publisher` (`publisher`),
  ADD KEY `tags` (`tags`),
  ADD KEY `fk_resource_type` (`resource_type_ID`);

--
-- Индексы таблицы `resource_types`
--
ALTER TABLE `resource_types`
  ADD PRIMARY KEY (`type_ID`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_ID`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_ID`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tags_ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `role_id` (`roles_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `request_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `resources`
--
ALTER TABLE `resources`
  MODIFY `resources_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `resource_types`
--
ALTER TABLE `resource_types`
  MODIFY `type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `tags_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`resource_ID`) REFERENCES `resources` (`resources_ID`),
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`status_ID`) REFERENCES `status` (`status_ID`);

--
-- Ограничения внешнего ключа таблицы `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_resource_type` FOREIGN KEY (`resource_type_ID`) REFERENCES `resource_types` (`type_ID`),
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`publisher`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`tags`) REFERENCES `tags` (`tags_ID`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`roles_ID`) REFERENCES `roles` (`roles_ID`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_ID`) REFERENCES `roles` (`roles_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
