-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 18, 2017 lúc 10:14 PM
-- Phiên bản máy phục vụ: 5.7.20-0ubuntu0.16.04.1
-- Phiên bản PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `api-order`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dish`
--

CREATE TABLE `dish` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dish`
--

INSERT INTO `dish` (`id`, `name`, `thumb`, `price`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'fish', 'images.jpg', 1000, 'khong', 1, '2017-12-09 17:00:00', '2017-12-09 17:00:00'),
(2, 'Thit nguoi', 'images01.jpg', 2000, 'an rar ngon', 3, '2017-12-09 17:00:00', '2017-12-09 17:00:00'),
(3, 'fish ngon', 'images.jpg', 1500, 'khong', 1, '2017-12-09 17:00:00', '2017-12-09 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_27_013945_create_users_table', 1),
(2, '2017_11_27_014231_create_tables_table', 1),
(3, '2017_11_27_014245_create_orders_table', 1),
(4, '2017_11_27_014337_create_dish_table', 1),
(5, '2017_11_28_012924_create_slider_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `total` float NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`total`, `id`, `created_at`, `updated_at`) VALUES
(0, 1, '2017-12-09 17:00:00', '2017-12-09 17:00:00'),
(0, 2, '2017-12-09 17:00:00', '2017-12-09 17:00:00'),
(0, 3, '2017-12-15 22:39:14', '2017-12-15 22:39:14'),
(0, 4, '2017-12-15 22:39:14', '2017-12-15 22:39:14'),
(200, 5, '2017-12-18 21:00:13', '2017-12-18 21:07:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_dish` int(11) NOT NULL,
  `quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_dish`, `quality`) VALUES
(1, 5, 1, 2),
(2, 5, 2, 3),
(3, 5, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `title`, `thumb`, `status`, `created_at`, `updated_at`) VALUES
(1, 'images1511841663', 'phong-canh-thien-nhien-nhat-ban-dam-say-long-nguoi-hinh-anh-3213131771733-1511834806.jpg', 0, '2017-11-28 02:09:14', '2017-11-28 11:01:03'),
(2, 'images1511841667', 'phong-canh-thien-nhien-nhat-ban-dam-say-long-nguoi-hinh-anh-3915326697130-1511835033.jpg', 0, '2017-11-28 02:10:33', '2017-11-28 11:01:07'),
(3, 'images1511841672', 'hinh-anh-dep-ve-thien-nhien-4-mua-1274041004064-1511835691.jpg', 0, '2017-11-28 02:21:31', '2017-11-28 11:01:12'),
(4, 'image 100', 'phong-canh-thien-nhien-nhat-ban-dam-say-long-nguoi-hinh-anh-3213131771733-1511834806.jpg', 1, '2017-11-28 02:32:00', '2017-11-28 02:32:00'),
(5, 'image 101', 'phong-canh-thien-nhien-nhat-ban-dam-say-long-nguoi-hinh-anh-3213131771733-1511834806.jpg', 1, '2017-11-28 02:32:07', '2017-11-28 02:32:07'),
(6, 'image 01', 'phong-canh-thien-nhien-nhat-ban-dam-say-long-nguoi-hinh-anh-3213131771733-1511834806.jpg', 1, '2017-11-28 02:32:18', '2017-11-28 02:32:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_dinner`
--

CREATE TABLE `table_dinner` (
  `id` int(1) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_dinner`
--

INSERT INTO `table_dinner` (`id`, `name`, `status`) VALUES
(1, 'Bàn 1', 1),
(2, 'Bàn 2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `table` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `role`, `table`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '0987548356', '$2y$10$42a7pGorkwRH2VgK8bOAZea9safZV0Y.ecoXvoPXmxZH/.AAC2Mly', 1, 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_dinner`
--
ALTER TABLE `table_dinner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `table_dinner`
--
ALTER TABLE `table_dinner`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
