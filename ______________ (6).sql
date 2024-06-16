-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 16 2024 г., 14:41
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `турбаза`
--

-- --------------------------------------------------------

--
-- Структура таблицы `captcha`
--

CREATE TABLE `captcha` (
  `id_cap` int(2) NOT NULL,
  `url_cap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_cap` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `captcha`
--

INSERT INTO `captcha` (`id_cap`, `url_cap`, `text_cap`) VALUES
(1, 'http://dmtsoft.ru/img/captcha/dmt-Simple-Captcha-1.png', 'neu4'),
(2, 'http://dmtsoft.ru/img/captcha/dmt-Simple-Captcha-2.png', 'bwjn'),
(3, 'http://dmtsoft.ru/img/captcha/dmt-Simple-Captcha-3.png', 'gazf'),
(4, 'http://dmtsoft.ru/img/captcha/dmt-Flow-captcha-1.jpeg', '774'),
(5, 'http://dmtsoft.ru/img/captcha/dmt-Flow-captcha-2.jpeg', '6643'),
(6, 'http://dmtsoft.ru/img/captcha/dmt-Flow-captcha-3.jpeg', '6411');

-- --------------------------------------------------------

--
-- Структура таблицы `клиенты`
--

CREATE TABLE `клиенты` (
  `ID клиента` int(11) NOT NULL,
  `ФИО` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Номер телефона` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Логин` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Пароль` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Дата регистрации` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `клиенты`
--

INSERT INTO `клиенты` (`ID клиента`, `ФИО`, `Номер телефона`, `Логин`, `Пароль`, `Дата регистрации`) VALUES
(1, 'Владик', '24545', 'login1', 'password1', '2024-04-08'),
(2, 'Козлова Екатерина Петровна', '333-444', 'login2', 'password2', '2024-04-08'),
(3, 'Васильев Владимир Сергеевич', '555-666', 'login3', 'password3', '2024-04-08'),
(4, 'Попова Ольга Андреевна', '777-88845', 'login4', 'password4', '2024-04-08'),
(5, 'Морозов Иван Васильевич', '999-000', 'login5', 'password5', '2024-04-08'),
(6, 'Владиквава', '23122', 'login12', 'ladawest', '2024-06-14');

-- --------------------------------------------------------

--
-- Структура таблицы `корзина`
--

CREATE TABLE `корзина` (
  `ID корзины` int(11) NOT NULL,
  `ID услуги` int(11) DEFAULT NULL,
  `Пользователь` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Дата добавления в корзину услуги` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `корзина`
--

INSERT INTO `корзина` (`ID корзины`, `ID услуги`, `Пользователь`, `Дата добавления в корзину услуги`) VALUES
(53, 1, 'login3', '2024-04-08 22:04:18');

-- --------------------------------------------------------

--
-- Структура таблицы `персонал`
--

CREATE TABLE `персонал` (
  `ID сотрудника` int(11) NOT NULL,
  `ФИО` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Должность` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Номер телефона` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `E-mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Логин` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Пароль` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `персонал`
--

INSERT INTO `персонал` (`ID сотрудника`, `ФИО`, `Должность`, `Номер телефона`, `E-mail`, `Логин`, `Пароль`) VALUES
(1, 'Иванов Иван Иванович', 'Менеджер', '123-456', 'ivanov@example.com', 'user1', 'password1'),
(2, 'Петров Петр Петрович', 'Администратор', '789-012', 'petrov@example.com', 'user2', 'password2'),
(3, 'Сидоров Сидор Сидорович', 'Официант', '345-678', 'sidorov@example.com', 'user3', 'password3'),
(4, 'Кузнецов Кузьма Кузьмич', 'Шеф-повар', '901-234', 'kuznetsov@example.com', 'user4', 'password4'),
(5, 'Николаев Николай Николаевич', 'Уборщик', '567-890', 'nikolaev@example.com', 'user5', 'password5');

-- --------------------------------------------------------

--
-- Структура таблицы `покупка`
--

CREATE TABLE `покупка` (
  `ID_Записи` int(11) NOT NULL,
  `ID Корзина` int(11) NOT NULL,
  `ID Клиента` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `адреса`
--

CREATE TABLE `адреса` (
  `ID адреса` int(11) NOT NULL,
  `Адрес` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `График` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Карта` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `адреса`
--

INSERT INTO `адреса` (`ID адреса`, `Адрес`, `График`, `Карта`) VALUES
(1, 'Москва, ул. Тверская, д. 1', 'Пн-Пт: 9:00-18:00, Сб-Вс: выходной', 'https://www.google.ru/maps/place/%D0%9C%D0%BE%D1%81%D0%BA%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F/@59.8403012,30.340135,12.75z/data=!4m6!3m5!1s0x46963ab44256cfef:0x5a282d63cfb9d870!8m2!3d59.851102!4d30.322361!16s%2Fm%2F04myj_n?hl=ru&entry=ttu'),
(2, 'Санкт-Петербург, наб. реки Мойки, д. 5', 'Пн-Пт: 10:00-20:00, Сб: 11:00-18:00, Вс: выходной', 'https://www.google.ru/maps/place/%D0%9C%D0%BE%D1%81%D0%BA%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F/@59.8403012,30.340135,12.75z/data=!4m6!3m5!1s0x46963ab44256cfef:0x5a282d63cfb9d870!8m2!3d59.851102!4d30.322361!16s%2Fm%2F04myj_n?hl=ru&entry=ttu'),
(3, 'Новосибирск, ул. Красный проспект, д. 20', 'Пн-Пт: 8:00-19:00, Сб-Вс: 9:00-16:00', 'https://www.google.ru/maps/place/%D0%9C%D0%BE%D1%81%D0%BA%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F/@59.8403012,30.340135,12.75z/data=!4m6!3m5!1s0x46963ab44256cfef:0x5a282d63cfb9d870!8m2!3d59.851102!4d30.322361!16s%2Fm%2F04myj_n?hl=ru&entry=ttu'),
(4, 'Екатеринбург, ул. Ленина, д. 30', 'Пн-Пт: 9:30-18:30, Сб: 10:00-16:00, Вс: выходной', 'https://www.google.ru/maps/place/%D0%9C%D0%BE%D1%81%D0%BA%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F/@59.8403012,30.340135,12.75z/data=!4m6!3m5!1s0x46963ab44256cfef:0x5a282d63cfb9d870!8m2!3d59.851102!4d30.322361!16s%2Fm%2F04myj_n?hl=ru&entry=ttu'),
(5, 'Ростов-на-Дону, просп. Буденновский, д. 15', 'Пн-Пт: 9:00-20:00, Сб: 10:00-18:00, Вс: выходной', 'https://www.google.ru/maps/place/%D0%9C%D0%BE%D1%81%D0%BA%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F/@59.8403012,30.340135,12.75z/data=!4m6!3m5!1s0x46963ab44256cfef:0x5a282d63cfb9d870!8m2!3d59.851102!4d30.322361!16s%2Fm%2F04myj_n?hl=ru&entry=ttu');

-- --------------------------------------------------------

--
-- Структура таблицы `бронь номера`
--

CREATE TABLE `бронь номера` (
  `ID брони` int(11) NOT NULL,
  `Дата начала брони` date DEFAULT NULL,
  `Дата окончания брони` date DEFAULT NULL,
  `ID услуги` int(11) DEFAULT NULL,
  `ID клиента` int(11) DEFAULT NULL,
  `ID номера` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `бронь номера`
--

INSERT INTO `бронь номера` (`ID брони`, `Дата начала брони`, `Дата окончания брони`, `ID услуги`, `ID клиента`, `ID номера`) VALUES
(1, '2024-04-01', '2024-04-05', 1, 1, 5),
(2, '2024-05-10', '2024-05-15', 2, 2, 5),
(3, '2024-06-20', '2024-06-25', 3, 3, 5),
(4, '2024-07-15', '2024-07-20', 4, 4, 5),
(5, '2024-08-30', '2024-09-04', 5, 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `галерея`
--

CREATE TABLE `галерея` (
  `ID картинки` int(11) NOT NULL,
  `Ссылка` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `галерея`
--

INSERT INTO `галерея` (`ID картинки`, `Ссылка`) VALUES
(1, 'https://www.salokyla.ru/gallery/78/gallery223-2-14-02-2018-21-35-31.jpg'),
(2, 'https://www.salokyla.ru/gallery/78/gallery224-2-14-02-2018-21-35-51.jpg'),
(3, 'https://www.salokyla.ru/gallery/78/gallery225-2-14-02-2018-21-35-58.jpg'),
(4, 'https://www.salokyla.ru/gallery/78/gallery226-2-14-02-2018-21-36-04.jpg'),
(5, 'https://www.salokyla.ru/gallery/78/gallery228-2-14-02-2018-21-36-16.jpg'),
(6, 'https://www.salokyla.ru/gallery/78/gallery244-2-14-02-2018-21-38-11.jpg'),
(7, 'https://www.salokyla.ru/gallery/78/gallery247-2-14-02-2018-21-38-30.jpg'),
(8, 'https://www.salokyla.ru/gallery/78/gallery243-2-14-02-2018-21-38-05.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `номера`
--

CREATE TABLE `номера` (
  `ID номера` int(11) NOT NULL,
  `Тип номера` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `номера`
--

INSERT INTO `номера` (`ID номера`, `Тип номера`) VALUES
(1, 'Стандарт'),
(2, 'Люкс'),
(3, 'Эконом'),
(4, 'Премиум'),
(5, 'Сьют');

-- --------------------------------------------------------

--
-- Структура таблицы `новости`
--

CREATE TABLE `новости` (
  `ID новости` int(11) NOT NULL,
  `Заголовок` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Текст` text COLLATE utf8mb4_unicode_ci,
  `Ссылка` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `новости`
--

INSERT INTO `новости` (`ID новости`, `Заголовок`, `Текст`, `Ссылка`) VALUES
(1, 'Открытие нового сезона на турбазе', 'Мы рады сообщить, что откваварыт новый туристический сезон на нашей турбазе. Приглашаем всех любителей активного отдыха!', 'https://www.salokyla.ru/spec/spec825-1-15-07-2023-16-38-28.jpg'),
(2, 'Расширение инфраструктуры', 'В этом году мы расширили инфраструктуру турбазы, чтобы обеспечить нашим гостям еще более комфортное пребывание.', 'https://www.salokyla.ru/spec/spec216-1-24-07-2019-14-20-14.jpg'),
(3, 'Новые услуги', 'Введены новые развлекательные программы и экскурсии для наших гостей. Подробности на сайте.', 'https://www.salokyla.ru/spec/spec235-1-06-09-2019-16-23-59.jpg'),
(4, 'Специальные предложения для групп', 'Для групповых посещений у нас действуют специальные скидки и предложения. Свяжитесь с нами для получения подробной информации.', 'https://www.salokyla.ru/pictures/192/pictures2055-2-22-03-2023-11-19-30.jpg'),
(5, 'Планы на будущее', 'Мы активно работаем над улучшением сервиса и добавлением новых развлечений. Следите за новостями!', 'https://www.salokyla.ru/pictures/192/pictures2056-2-22-03-2023-11-19-45.png');

-- --------------------------------------------------------

--
-- Структура таблицы `услуги`
--

CREATE TABLE `услуги` (
  `ID услуги` int(11) NOT NULL,
  `Тип услуги` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Цена` int(255) DEFAULT NULL,
  `ID сотрудника` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `услуги`
--

INSERT INTO `услуги` (`ID услуги`, `Тип услуги`, `Цена`, `ID сотрудника`) VALUES
(1, 'Проживание', 3800, 1),
(2, 'Питание', 3300, 2),
(3, 'Экскурсии', 2800, 3),
(4, 'Трансфер', 2700, 4),
(5, 'SPA-услуги', 3000, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`id_cap`);

--
-- Индексы таблицы `клиенты`
--
ALTER TABLE `клиенты`
  ADD PRIMARY KEY (`ID клиента`);

--
-- Индексы таблицы `корзина`
--
ALTER TABLE `корзина`
  ADD PRIMARY KEY (`ID корзины`);

--
-- Индексы таблицы `персонал`
--
ALTER TABLE `персонал`
  ADD PRIMARY KEY (`ID сотрудника`);

--
-- Индексы таблицы `адреса`
--
ALTER TABLE `адреса`
  ADD PRIMARY KEY (`ID адреса`);

--
-- Индексы таблицы `бронь номера`
--
ALTER TABLE `бронь номера`
  ADD PRIMARY KEY (`ID брони`),
  ADD KEY `ID клиента` (`ID клиента`),
  ADD KEY `fk_id_номера` (`ID номера`),
  ADD KEY `ID услуги` (`ID услуги`) USING BTREE;

--
-- Индексы таблицы `галерея`
--
ALTER TABLE `галерея`
  ADD PRIMARY KEY (`ID картинки`);

--
-- Индексы таблицы `номера`
--
ALTER TABLE `номера`
  ADD PRIMARY KEY (`ID номера`);

--
-- Индексы таблицы `новости`
--
ALTER TABLE `новости`
  ADD PRIMARY KEY (`ID новости`);

--
-- Индексы таблицы `услуги`
--
ALTER TABLE `услуги`
  ADD PRIMARY KEY (`ID услуги`),
  ADD KEY `ID сотрудника` (`ID сотрудника`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `captcha`
--
ALTER TABLE `captcha`
  MODIFY `id_cap` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `клиенты`
--
ALTER TABLE `клиенты`
  MODIFY `ID клиента` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `корзина`
--
ALTER TABLE `корзина`
  MODIFY `ID корзины` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `персонал`
--
ALTER TABLE `персонал`
  MODIFY `ID сотрудника` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `адреса`
--
ALTER TABLE `адреса`
  MODIFY `ID адреса` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `бронь номера`
--
ALTER TABLE `бронь номера`
  MODIFY `ID брони` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `галерея`
--
ALTER TABLE `галерея`
  MODIFY `ID картинки` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `номера`
--
ALTER TABLE `номера`
  MODIFY `ID номера` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `новости`
--
ALTER TABLE `новости`
  MODIFY `ID новости` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `услуги`
--
ALTER TABLE `услуги`
  MODIFY `ID услуги` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `бронь номера`
--
ALTER TABLE `бронь номера`
  ADD CONSTRAINT `FK_ID_усл_брони` FOREIGN KEY (`ID услуги`) REFERENCES `услуги` (`ID услуги`),
  ADD CONSTRAINT `fk_id_номера` FOREIGN KEY (`ID номера`) REFERENCES `номера` (`ID номера`),
  ADD CONSTRAINT `бронь номера_ibfk_2` FOREIGN KEY (`ID клиента`) REFERENCES `клиенты` (`ID клиента`);

--
-- Ограничения внешнего ключа таблицы `услуги`
--
ALTER TABLE `услуги`
  ADD CONSTRAINT `услуги_ibfk_1` FOREIGN KEY (`ID сотрудника`) REFERENCES `персонал` (`ID сотрудника`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
