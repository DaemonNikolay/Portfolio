-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 24 2018 г., 19:32
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `date_of_admission` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `specialist_id`, `date_of_admission`) VALUES
(1, 10, 14, '30.12.2017 23:45');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1513175580),
('m171213_142834_create_specialists_table', 1513175582),
('m171213_181227_add_specialty_column_to_specialists_table', 1513188830),
('m171214_142452_create_user_table', 1513261801),
('m171215_031642_create_specialty_table', 1513307877),
('m171222_014040_create_appointments_table', 1513913053);

-- --------------------------------------------------------

--
-- Структура таблицы `specialists`
--

CREATE TABLE `specialists` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialists`
--

INSERT INTO `specialists` (`id`, `surname`, `name`, `patronymic`, `email`, `phone`, `image`, `specialty`) VALUES
(11, 'Киселёв', 'Пётр', 'Алексеевич', 'psih@mail.ru', '8-952-943-30-19', '64d5e7d734dde8290be10559f51335b4.png', 'Психотерапевт'),
(12, 'Пенкин', 'Георгий', 'Захарович', 'pen@mail.ru', '8-938-673-25-72', '5cd0cd831f5f4c83570ef5f5775405f8.jpg', 'Лаборант'),
(13, 'Дудукин', 'Евгений', 'Иванович', 'Дудук@mail.ru', '8-909-547-25-65', 'b1b8b1c04c6313b0cecf4036611e53df.jpg', 'Ветеринар'),
(14, 'Дадашев', 'Магомед', 'Ахнедович', 'ah@mail.ru', '8-888-777-44-66', 'e7f46e0590387c3e3e2e99d8c04433ef.jpg', 'Хирург'),
(15, 'Мягков', 'Кирил', 'Олегович', 'kir@mail.ru', '8-907-543-12-65', '4aa5029c277f66266b8aa021918a2374.jpg', 'Педиатр'),
(17, 'Дягев', 'Иван', 'Петрович', 'rt@mail.ru', '8-924-654-23-52', '4c157261c2d93e0d1516d59ed42742a5.jpg', 'Психотерапевт');

-- --------------------------------------------------------

--
-- Структура таблицы `specialty`
--

CREATE TABLE `specialty` (
  `id` int(11) NOT NULL,
  `specialty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `surname`, `name`, `patronymic`, `email`, `password`, `photo`, `isAdmin`) VALUES
(8, 'nik', 'nik', 'nik', 'nik@mail.ru', '$2y$13$cwlEdCXMg6Dd5fxkRsamL./cQZ2OvYV4XUG70pOf6O66CW9FG./f6', NULL, 1),
(10, 'n', 'n', 'n', 'n@mail.ru', '$2y$13$Cv6NrTfPZ59ZtW1aR4tNlu/Sc0o/F5mp/.K8Wxp79cq1BIMmlOlee', NULL, 0),
(12, 'admin', 'admin', 'admin', 'adminadmin@mail.ru', '$2y$13$2YEkT0fpr75DHq9OB8EjzOOCATJY/qM/igleSuh12q8iPTfkvMtr6', NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-id-user_id` (`user_id`),
  ADD KEY `idx-id-specialist_id` (`specialist_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `specialty`
--
ALTER TABLE `specialty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk-appointments-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-appointmnets-specialist_id` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
