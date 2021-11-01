-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 May 2020, 23:15:20
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yatirimci`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bankalar`
--

CREATE TABLE `bankalar` (
  `id` int(11) NOT NULL,
  `kod` tinytext NOT NULL,
  `ad` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islemler`
--

CREATE TABLE `islemler` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `banka` int(11) NOT NULL,
  `varlikTuru` int(11) NOT NULL,
  `kur` float NOT NULL,
  `miktar` int(11) NOT NULL,
  `tur` int(11) NOT NULL,
  `zaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `islemler`
--

INSERT INTO `islemler` (`id`, `userId`, `banka`, `varlikTuru`, `kur`, `miktar`, `tur`, `zaman`) VALUES
(1, 1, 2, 1, 6.124, 1000, 3, 12),
(2, 1, 2, 0, 0, 10000, 0, 11),
(3, 1, 3, 0, 0, 2500, 0, 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurlar`
--

CREATE TABLE `kurlar` (
  `id` int(11) NOT NULL,
  `banka` int(11) NOT NULL,
  `varlikTuru` int(11) NOT NULL,
  `alis` float NOT NULL,
  `satis` float NOT NULL,
  `tarih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kurlar`
--

INSERT INTO `kurlar` (`id`, `banka`, `varlikTuru`, `alis`, `satis`, `tarih`) VALUES
(1, 0, 0, 0.97, 0.97, 0),
(2, 0, 1, 6.06, 6.16, 0),
(3, 0, 2, 12.18, 12.38, 0),
(4, 0, 3, 18.16, 18.46, 0),
(5, 0, 4, 24.07, 24.47, 0),
(6, 1, 0, 0.04, 0.04, 0),
(7, 1, 1, 6.04, 6.14, 0),
(8, 1, 2, 12.93, 13.13, 0),
(9, 1, 3, 18.04, 18.34, 0),
(10, 1, 4, 24.42, 24.82, 0),
(11, 2, 0, 0.42, 0.42, 0),
(12, 2, 1, 6.26, 6.36, 0),
(13, 2, 2, 12.22, 12.42, 0),
(14, 2, 3, 18.48, 18.78, 0),
(15, 2, 4, 24.54, 24.94, 0),
(16, 3, 0, 0.33, 0.33, 0),
(17, 3, 1, 6.55, 6.65, 0),
(18, 3, 2, 12.23, 12.43, 0),
(19, 3, 3, 18.02, 18.32, 0),
(20, 3, 4, 24.23, 24.63, 0),
(21, 4, 0, 0.32, 0.32, 0),
(22, 4, 1, 6.6, 6.7, 0),
(23, 4, 2, 12.63, 12.83, 0),
(24, 4, 3, 18.46, 18.76, 0),
(25, 4, 4, 24.77, 25.17, 0),
(26, 5, 0, 0.11, 0.11, 0),
(27, 5, 1, 6.6, 6.7, 0),
(28, 5, 2, 12.6, 12.8, 0),
(29, 5, 3, 18.62, 18.92, 0),
(30, 5, 4, 24.29, 24.69, 0),
(31, 6, 0, 0.9, 0.9, 0),
(32, 6, 1, 6.4, 6.5, 0),
(33, 6, 2, 12.67, 12.87, 0),
(34, 6, 3, 18.82, 19.12, 0),
(35, 6, 4, 24.07, 24.47, 0),
(36, 7, 0, 0.19, 0.19, 0),
(37, 7, 1, 6.02, 6.12, 0),
(38, 7, 2, 12.13, 12.33, 0),
(39, 7, 3, 18.3, 18.6, 0),
(40, 7, 4, 24.4, 24.8, 0),
(41, 8, 0, 0.86, 0.86, 0),
(42, 8, 1, 6.71, 6.81, 0),
(43, 8, 2, 12.33, 12.53, 0),
(44, 8, 3, 18.54, 18.84, 0),
(45, 8, 4, 24.99, 25.39, 0),
(46, 9, 0, 0.37, 0.37, 0),
(47, 9, 1, 6.6, 6.7, 0),
(48, 9, 2, 12.56, 12.76, 0),
(49, 9, 3, 18.16, 18.46, 0),
(50, 9, 4, 24.53, 24.93, 0),
(51, 10, 0, 0, 0, 0),
(52, 10, 1, 6.47, 6.57, 0),
(53, 10, 2, 12.1, 12.3, 0),
(54, 10, 3, 18.86, 19.16, 0),
(55, 10, 4, 24.07, 24.47, 0),
(56, 11, 0, 0.49, 0.49, 0),
(57, 11, 1, 6.04, 6.14, 0),
(58, 11, 2, 12.76, 12.96, 0),
(59, 11, 3, 18.95, 19.25, 0),
(60, 11, 4, 24.82, 25.22, 0),
(61, 12, 0, 0.31, 0.31, 0),
(62, 12, 1, 6.6, 6.7, 0),
(63, 12, 2, 12.17, 12.37, 0),
(64, 12, 3, 18.21, 18.51, 0),
(65, 12, 4, 24.91, 25.31, 0),
(66, 13, 0, 0.87, 0.87, 0),
(67, 13, 1, 6.45, 6.55, 0),
(68, 13, 2, 12.16, 12.36, 0),
(69, 13, 3, 18.05, 18.35, 0),
(70, 13, 4, 24.27, 24.67, 0),
(71, 14, 0, 0.07, 0.07, 0),
(72, 14, 1, 6.95, 7.05, 0),
(73, 14, 2, 12.49, 12.69, 0),
(74, 14, 3, 18.83, 19.13, 0),
(75, 14, 4, 24.37, 24.77, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `kadi` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  `token` text NOT NULL,
  `ad` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `kadi`, `pass`, `token`, `ad`) VALUES
(1, 'takb', '123', '1e27gt', 'ta');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `varlikturleri`
--

CREATE TABLE `varlikturleri` (
  `id` int(11) NOT NULL,
  `kod` tinytext NOT NULL,
  `ad` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bankalar`
--
ALTER TABLE `bankalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `islemler`
--
ALTER TABLE `islemler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kurlar`
--
ALTER TABLE `kurlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `varlikturleri`
--
ALTER TABLE `varlikturleri`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bankalar`
--
ALTER TABLE `bankalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `islemler`
--
ALTER TABLE `islemler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kurlar`
--
ALTER TABLE `kurlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `varlikturleri`
--
ALTER TABLE `varlikturleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
