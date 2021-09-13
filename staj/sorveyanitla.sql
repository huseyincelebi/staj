-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Eyl 2021, 13:14:12
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sorveyanitla`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sy_answers`
--

CREATE TABLE `sy_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `rate_point` int(11) NOT NULL DEFAULT 0,
  `solution` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sy_answers`
--

INSERT INTO `sy_answers` (`id`, `user_id`, `question_id`, `content`, `create_date`, `rate_point`, `solution`) VALUES
(1, 2, 9, 'Yanıt 9', '2021-09-13 07:28:22', 1, 1),
(2, 2, 8, 'Yanıt 8', '2021-09-13 07:28:34', -1, 0),
(3, 2, 7, 'Yanıt 7', '2021-09-13 07:28:45', 0, 0),
(4, 2, 6, 'Yanıt 6', '2021-09-13 07:28:53', 0, 0),
(5, 2, 5, 'Yanıt 5', '2021-09-13 07:29:01', 0, 0),
(6, 2, 4, 'Yanıt 4', '2021-09-13 07:29:09', 0, 0),
(7, 2, 3, 'Yanıt 3', '2021-09-13 07:29:16', 0, 1),
(8, 2, 2, 'Yanıt 2', '2021-09-13 07:29:24', 0, 0),
(9, 2, 1, 'Yanıt 1', '2021-09-13 07:29:31', 0, 0),
(10, 2, 1, '<img src=\"https://i.ibb.co/p0N1JMV/kodlama.jpg\" style=\"max-width:650px;max-height:400px\"><br>Yanıt 1<br>', '2021-09-13 07:30:05', 0, 0),
(11, 1, 9, 'Yanıt 9', '2021-09-13 07:31:21', 0, 0),
(12, 2, 10, 'Yanıt 10', '2021-09-13 10:01:02', 1, 1),
(13, 1, 10, 'Yanıt 10', '2021-09-13 10:07:32', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sy_follows`
--

CREATE TABLE `sy_follows` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sy_follows`
--

INSERT INTO `sy_follows` (`id`, `tag_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sy_questions`
--

CREATE TABLE `sy_questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `url` text NOT NULL,
  `unique_id` int(11) NOT NULL,
  `solution` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sy_questions`
--

INSERT INTO `sy_questions` (`id`, `user_id`, `title`, `content`, `create_date`, `url`, `unique_id`, `solution`) VALUES
(1, 1, 'Soru 1', '1', '2021-09-13 06:34:59', 'soru-1', 1631514899, 0),
(2, 1, 'Soru 2', 'Soru 2', '2021-09-13 07:03:23', 'soru-2', 1631516603, 0),
(3, 1, 'Soru 3', '<img src=\"https://i.ibb.co/p0N1JMV/kodlama.jpg\" style=\"max-width:800px;max-height:400px\"><br>Soru 3<br>', '2021-09-13 07:04:22', 'soru-3', 1631516662, 1),
(4, 1, 'Soru 4', 'Soru 4', '2021-09-13 07:24:26', 'soru-4', 1631517866, 0),
(5, 1, 'Soru 5', 'Soru 5', '2021-09-13 07:24:44', 'soru-5', 1631517884, 0),
(6, 1, 'Soru 6', 'Soru 6', '2021-09-13 07:25:04', 'soru-6', 1631517904, 0),
(7, 1, 'Soru 7', 'Soru 7', '2021-09-13 07:26:56', 'soru-7', 1631518016, 0),
(8, 1, 'Soru 8', 'Soru 8', '2021-09-13 07:27:11', 'soru-8', 1631518031, 0),
(9, 1, 'Soru 9', 'Soru 9', '2021-09-13 07:27:33', 'soru-9', 1631518053, 1),
(10, 1, 'Soru 10', '<img src=\"https://i.ibb.co/p0N1JMV/kodlama.jpg\" style=\"max-width:800px;max-height:400px\"><br>Soru 10<br>', '2021-09-13 09:58:25', 'soru-10', 1631527105, 1),
(11, 1, 'Soru 11', 'Soru 11', '2021-09-13 10:50:39', 'soru-11', 1631530239, 0),
(12, 1, 'Soru 12', 'Soru 12', '2021-09-13 11:03:14', 'soru-12', 1631530994, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sy_question_tags`
--

CREATE TABLE `sy_question_tags` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sy_question_tags`
--

INSERT INTO `sy_question_tags` (`id`, `question_id`, `tag_id`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 2, 3),
(6, 2, 4),
(7, 3, 2),
(8, 4, 5),
(9, 5, 6),
(10, 6, 7),
(11, 7, 4),
(12, 8, 4),
(13, 8, 2),
(14, 9, 5),
(15, 10, 1),
(16, 11, 1),
(17, 12, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sy_rate_answers`
--

CREATE TABLE `sy_rate_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `rate_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sy_rate_answers`
--

INSERT INTO `sy_rate_answers` (`id`, `user_id`, `answer_id`, `rate_type`) VALUES
(1, 2, 1, 1),
(2, 2, 2, -1),
(3, 2, 12, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sy_tags`
--

CREATE TABLE `sy_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sy_tags`
--

INSERT INTO `sy_tags` (`id`, `name`) VALUES
(1, 'php'),
(2, 'javascript'),
(3, 'c#'),
(4, 'python'),
(5, 'mysql'),
(6, 'c++'),
(7, 'go');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sy_users`
--

CREATE TABLE `sy_users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `user_type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sy_users`
--

INSERT INTO `sy_users` (`id`, `username`, `email`, `password`, `create_date`, `user_type`) VALUES
(1, 'huseyincelebi', 'hgcelebi@icloud.com', '202cb962ac59075b964b07152d234b70', '2021-09-13', 1),
(2, 'gorkemcelebi', 'gorkemcelebi@hotmail.com', '202cb962ac59075b964b07152d234b70', '2021-09-13', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sy_answers`
--
ALTER TABLE `sy_answers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sy_follows`
--
ALTER TABLE `sy_follows`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sy_questions`
--
ALTER TABLE `sy_questions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sy_question_tags`
--
ALTER TABLE `sy_question_tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sy_rate_answers`
--
ALTER TABLE `sy_rate_answers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sy_tags`
--
ALTER TABLE `sy_tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sy_users`
--
ALTER TABLE `sy_users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sy_answers`
--
ALTER TABLE `sy_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `sy_follows`
--
ALTER TABLE `sy_follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sy_questions`
--
ALTER TABLE `sy_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `sy_question_tags`
--
ALTER TABLE `sy_question_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `sy_rate_answers`
--
ALTER TABLE `sy_rate_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sy_tags`
--
ALTER TABLE `sy_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `sy_users`
--
ALTER TABLE `sy_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
