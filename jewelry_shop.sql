-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2020 lúc 10:01 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `jewelry_shop`
--
CREATE DATABASE IF NOT EXISTS `jewelry_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `jewelry_shop`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'OK: 0; Ban: 1',
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`id`, `name`, `image`, `status`, `slug`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Blog test 1', 'img_blog1.png', 0, 'blog-test-1', 'Praesent egestas faucibus elementum. Vivamus mattis odio ut erat iaculis, ornare maximus nisi imperdiet. Curabitur venenatis sed quam eget rhoncus. Vivamus sit amet eros in lorem ultrices fermentum. Maecenas ornare nec felis sed ullamcorper. Nunc a massa in lacus sodales ultricies eget vitae mauris. Pellentesque imperdiet aliquam purus, non convallis urna finibus quis. Duis sodales ornare urna ut viverra. Nullam nec sollicitudin odio. Phasellus tempor tincidunt eros, sed pretium lectus fermentum ut.', 13, '2020-09-30 08:30:43', '2020-09-30 08:30:43'),
(3, 'Blog test 2', 'home_banner_image.jpg', 0, 'blog-test-2', 'Nullam tristique dolor lorem, sed bibendum velit euismod vel. Suspendisse non metus iaculis, pharetra nisl eu, accumsan nibh. Sed quis finibus leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut augue arcu, scelerisque et velit pharetra, vehicula iaculis nisl. Aenean risus sapien, lobortis at tristique sit amet, rhoncus quis nisl. Sed dictum sem in erat mollis rhoncus. Pellentesque tristique viverra felis non porttitor. Nullam imperdiet metus sit amet augue sollicitudin cursus. Vestibulum posuere sit amet lectus pellentesque porta. Integer ac libero non diam elementum pharetra nec non mi. Curabitur tincidunt mattis nulla. Vestibulum iaculis, leo id porta placerat, libero eros gravida eros, a ullamcorper ligula tellus et diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 13, '2020-09-30 08:55:10', '2020-09-30 08:55:10'),
(4, 'Blog test 3', 'img_blog2.png', 0, 'blog-test-3', 'Fusce dictum eros at erat laoreet, et malesuada lectus suscipit. Sed ultrices quam scelerisque maximus condimentum. Praesent posuere facilisis felis, sed consectetur est volutpat id. Integer purus enim, ultrices non laoreet sed, pretium vulputate lectus. Fusce mattis facilisis malesuada. Maecenas ac ex mollis, imperdiet nunc vitae, pharetra ex. Ut quis placerat felis. Quisque tincidunt maximus enim, in pharetra dolor bibendum at. Vivamus sagittis molestie ante. Aliquam sodales, elit vitae sollicitudin elementum, ipsum lacus tristique purus, at finibus lacus mauris nec nibh. Etiam consequat laoreet ullamcorper. In hendrerit facilisis libero, et commodo lacus ornare sed.', 13, '2020-09-30 08:55:31', '2020-09-30 08:55:31'),
(5, 'Blog test 4', 'img_blog1.jpg', 0, 'blog-test-4', 'Aliquam posuere mollis tortor nec ultrices. Quisque quis interdum diam, vel semper nisl. Etiam ac leo vel libero consectetur fringilla. Nulla porta, lectus vitae dictum condimentum, ante velit viverra ante, sit amet eleifend tellus eros pretium massa. Ut venenatis tellus velit. In hac habitasse platea dictumst. Nulla enim est, cursus posuere est ut, vehicula dictum ante. Curabitur tincidunt leo eget dui tristique, vel mollis lectus gravida. Phasellus vel sapien facilisis, commodo eros accumsan, faucibus justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed ullamcorper turpis libero, id tristique eros condimentum eget.', 13, '2020-10-02 12:04:05', '2020-10-02 12:04:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_comment`
--

DROP TABLE IF EXISTS `article_comment`;
CREATE TABLE `article_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article_comment`
--

INSERT INTO `article_comment` (`id`, `user_id`, `article_id`, `name`, `email`, `comment`, `created_at`, `updated_at`) VALUES
(1, 13, 4, 'Nguyễn Duy Hiển', 'hienrider@gmail.com', 'Quisque tincidunt maximus enim, in pharetra dolor bibendum at. Vivamus sagittis molestie ante. Aliquam sodales, elit vitae sollicitudin elementum, ipsum lacus tristique purus, at finibus lacus mauris nec nibh. Etiam consequat laoreet ullamcorper. In hendrerit facilisis libero, et commodo lacus ornare sed.\r\n\r\n', '2020-09-23 08:17:04', '2020-10-01 08:17:04'),
(2, 24, 4, 'Nguyễn', 'ndhien288@gmail.com', 'asdasdsadadsadsadasdadsad', '2020-07-01 07:23:40', '2020-10-01 09:46:14'),
(3, 24, 4, 'Nguyễn Duy Hiển', 'hienrider@gmail.com', 'asdadddddddddddddddddddddddddd', '2020-10-01 09:54:40', '2020-10-01 09:54:40'),
(4, 24, 2, 'Nguyễn Duy Hiển', 'hienrider@gmail.com', 'asdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsaasdasdsa', '2020-10-01 10:02:37', '2020-10-01 10:02:37'),
(6, 23, 4, 'Nguyễn Duy Hiển', 'hienrider@gmail.com', 'adasd', '2020-10-01 23:21:02', '2020-10-01 23:21:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_comment_reply`
--

DROP TABLE IF EXISTS `article_comment_reply`;
CREATE TABLE `article_comment_reply` (
  `id` int(11) NOT NULL,
  `cmt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article_comment_reply`
--

INSERT INTO `article_comment_reply` (`id`, `cmt_id`, `user_id`, `comment`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 3, 23, 'reply', 'Nguyễn Duy Hiển', 'hienrider@gmail.com', '2020-10-01 23:14:40', '2020-10-01 23:14:40'),
(3, 3, 13, 'asdasdsada', 'asdasdasdasd', 'asdsadasdasdsad', '2020-10-01 23:49:22', '2020-10-01 23:49:22'),
(4, 3, 13, 'asdadasddas', 'asdasdada', 'hienrider@gmail.com', '2020-10-01 23:49:30', '2020-10-01 23:49:30'),
(5, 4, 13, 'asdasdad', 'asdasdasdad', 'hienrider@gmail.com', '2020-10-02 00:24:14', '2020-10-02 00:24:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_content`
--

DROP TABLE IF EXISTS `article_content`;
CREATE TABLE `article_content` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_header` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_footer` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article_content`
--

INSERT INTO `article_content` (`id`, `article_id`, `content`, `created_at`, `updated_at`, `img_header`, `img_footer`) VALUES
(1, 3, 'sadasdFusce dictum eros at erat laoreet, et malesuada lectus suscipit. Sed ultrices quam scelerisque maximus condimentum. Praesent posuere facilisis felis, sed consectetur est volutpat id. Integer purus enim, ultrices non laoreet sed, pretium vulputate lectus. Fusce mattis facilisis malesuada. Maecenas ac ex mollis, imperdiet nunc vitae, pharetra ex. Ut quis placerat felis. Quisque tincidunt maximus enim, in pharetra dolor bibendum at. Vivamus sagittis molestie ante. Aliquam sodales, elit vitae sollicitudin elementum, ipsum lacus tristique purus, at finibus lacus mauris nec nibh. Etiam consequat laoreet ullamcorper. In hendrerit facilisis libero, et commodo lacus ornare sed.\r\n\r\nNullam tristique dolor lorem, sed bibendum velit euismod vel. Suspendisse non metus iaculis, pharetra nisl eu, accumsan nibh. Sed quis finibus leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut augue arcu, scelerisque et velit pharetra, vehicula iaculis nisl. Aenean risus sapien, lobortis at tristique sit amet, rhoncus quis nisl. Sed dictum sem in erat mollis rhoncus. Pellentesque tristique viverra felis non porttitor. Nullam imperdiet metus sit amet augue sollicitudin cursus. Vestibulum posuere sit amet lectus pellentesque porta. Integer ac libero non diam elementum pharetra nec non mi. Curabitur tincidunt mattis nulla. Vestibulum iaculis, leo id porta placerat, libero eros gravida eros, a ullamcorper ligula tellus et diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nPraesent egestas faucibus elementum. Vivamus mattis odio ut erat iaculis, ornare maximus nisi imperdiet. Curabitur venenatis sed quam eget rhoncus. Vivamus sit amet eros in lorem ultrices fermentum. Maecenas ornare nec felis sed ullamcorper. Nunc a massa in lacus sodales ultricies eget vitae mauris. Pellentesque imperdiet aliquam purus, non convallis urna finibus quis. Duis sodales ornare urna ut viverra. Nullam nec sollicitudin odio. Phasellus tempor tincidunt eros, sed pretium lectus fermentum ut.\r\n\r\nDuis a commodo felis. Integer pretium facilisis turpis nec blandit. Donec ut posuere odio, eget blandit leo. Vestibulum at ultricies elit. Sed accumsan ante at finibus condimentum. Duis nunc justo, venenatis ac mauris ut, sollicitudin cursus risus. Vivamus est dui, semper ac elementum non, sagittis ut nisl. Mauris condimentum enim nec gravida pulvinar. Vestibulum interdum volutpat ullamcorper. Morbi', '2020-09-30 09:03:00', '2020-09-30 09:05:42', NULL, NULL),
(2, 4, 'Lasdasdsadrem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat enim et diam consectetur, ut faucibus enim vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor facilisis neque sed placerat. Quisque eget gravida justo. Fusce ut libero pellentesque, blandit tortor vel, tincidunt lorem. Nunc dolor ipsum, placerat id tempor vitae, efficitur nec nunc. Etiam consectetur egestas elit, ullamcorper fermentum eros mattis ac. In hac habitasse platea dictumst. Nullam volutpat, diam ac laoreet facilisis, lacus dui posuere leo, at tempus diam tortor vel nunc. Suspendisse sed vulputate enim, eu venenatis massa. Sed vel vestibulum ante, eu volutpat tortor. Fusce porttitor diam ante. Aliquam molestie rutrum ipsum, nec rutrum ex commodo at. Mauris tempus, dolor non tempor rutrum, sapien sapien finibus orci, sit amet blandit risus elit et magna. Nunc gravida mollis erat quis rutrum.\r\n\r\nFusce dictum eros at erat laoreet, et malesuada lectus suscipit. Sed ultrices quam scelerisque maximus condimentum. Praesent posuere facilisis felis, sed consectetur est volutpat id. Integer purus enim, ultrices non laoreet sed, pretium vulputate lectus. Fusce mattis facilisis malesuada. Maecenas ac ex mollis, imperdiet nunc vitae, pharetra ex. Ut quis placerat felis. Quisque tincidunt maximus enim, in pharetra dolor bibendum at. Vivamus sagittis molestie ante. Aliquam sodales, elit vitae sollicitudin elementum, ipsum lacus tristique purus, at finibus lacus mauris nec nibh. Etiam consequat laoreet ullamcorper. In hendrerit facilisis libero, et commodo lacus ornare sed.', '2020-09-30 09:03:34', '2020-09-30 09:05:54', NULL, NULL),
(3, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat enim et diam consectetur, ut faucibus enim vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor facilisis neque sed placerat. Quisque eget gravida justo. Fusce ut libero pellentesque, blandit tortor vel, tincidunt lorem. Nunc dolor ipsum, placerat id tempor vitae, efficitur nec nunc. Etiam consectetur egestas elit, ullamcorper fermentum eros mattis ac. In hac habitasse platea dictumst. Nullam volutpat, diam ac laoreet facilisis, lacus dui posuere leo, at tempus diam tortor vel nunc. Suspendisse sed vulputate enim, eu venenatis massa. Sed vel vestibulum ante, eu volutpat tortor. Fusce porttitor diam ante. Aliquam molestie rutrum ipsum, nec rutrum ex commodo at. Mauris tempus, dolor non tempor rutrum, sapien sapien finibus orci, sit amet blandit risus elit et magna. Nunc gravida mollis erat quis rutrum.\r\n\r\nFusce dictum eros at erat laoreet, et malesuada lectus suscipit. Sed ultrices quam scelerisque maximus condimentum. Praesent posuere facilisis felis, sed consectetur est volutpat id. Integer purus enim, ultrices non laoreet sed, pretium vulputate lectus. Fusce mattis facilisis malesuada. Maecenas ac ex mollis, imperdiet nunc vitae, pharetra ex. Ut quis placerat felis. Quisque tincidunt maximus enim, in pharetra dolor bibendum at. Vivamus sagittis molestie ante. Aliquam sodales, elit vitae sollicitudin elementum, ipsum lacus tristique purus, at finibus lacus mauris nec nibh. Etiam consequat laoreet ullamcorper. In hendrerit facilisis libero, et commodo lacus ornare sed.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat enim et diam consectetur, ut faucibus enim vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. In auctor facilisis neque sed placerat. Quisque eget gravida justo. Fusce ut libero pellentesque, blandit tortor vel, tincidunt lorem. Nunc dolor ipsum, placerat id tempor vitae, efficitur nec nunc. Etiam consectetur egestas elit, ullamcorper fermentum eros mattis ac. In hac habitasse platea dictumst. Nullam volutpat, diam ac laoreet facilisis, lacus dui posuere leo, at tempus diam tortor vel nunc. Suspendisse sed vulputate enim, eu venenatis massa. Sed vel vestibulum ante, eu volutpat tortor. Fusce porttitor diam ante. Aliquam molestie rutrum ipsum, nec rutrum ex commodo at. Mauris tempus, dolor non tempor rutrum, sapien sapien finibus orci, sit amet blandit risus elit et magna. Nunc gravida mollis erat quis rutrum.\r\n\r\nFusce dictum eros at erat laoreet, et malesuada lectus suscipit. Sed ultrices quam scelerisque maximus condimentum. Praesent posuere facilisis felis, sed consectetur est volutpat id. Integer purus enim, ultrices non laoreet sed, pretium vulputate lectus. Fusce mattis facilisis malesuada. Maecenas ac ex mollis, imperdiet nunc vitae, pharetra ex. Ut quis placerat felis. Quisque tincidunt maximus enim, in pharetra dolor bibendum at. Vivamus sagittis molestie ante. Aliquam sodales, elit vitae sollicitudin elementum, ipsum lacus tristique purus, at finibus lacus mauris nec nibh. Etiam consequat laoreet ullamcorper. In hendrerit facilisis libero, et commodo lacus ornare sed.', '2020-09-30 09:06:01', '2020-09-30 09:06:01', NULL, NULL),
(4, 2, 'Test headerrrrr', '2020-10-02 03:15:19', '2020-10-02 03:43:29', '4_0fe2529b-f7ae-4ed5-a8ff-4fae623757f9_compact.jpg', ''),
(5, 2, 'test footerrrr', '2020-10-02 03:16:24', '2020-10-02 03:16:24', NULL, '2_large.png'),
(6, 2, 'test all', '2020-10-02 03:18:12', '2020-10-02 03:18:12', '2_119a31f2-2054-4483-93a3-841310e6bdfb_grande.jpg', '4_0fe2529b-f7ae-4ed5-a8ff-4fae623757f9_compact.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: OK; 1: hide',
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `slug`, `image`, `parent_id`, `priority`, `created_at`, `updated_at`) VALUES
(30, 'Vòng cổ', 0, 'vong-co', 'vong-co.png', 0, 1, '2020-09-09 12:35:33', '2020-09-20 01:04:19'),
(31, 'Nhẫn', 0, 'nhan', 'nhan.png', 0, 1, '2020-09-09 12:36:25', '2020-09-20 01:04:27'),
(32, 'Khuyên tai', 0, 'khuyen-tai', 'khuyen-tai.png', 0, 1, '2020-09-09 12:36:42', '2020-09-20 01:04:43'),
(33, 'Vòng tay', 0, 'vong-tay', 'vong_tay_1.png', 0, 1, '2020-09-09 12:36:55', '2020-09-20 00:36:38'),
(35, 'Kim cương', 0, 'kim-cuong', 'kim-cuong.png', 0, 1, '2020-09-16 02:32:26', '2020-09-20 01:04:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hex_color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`, `hex_color`, `created_at`, `updated_at`) VALUES
(15, 'red', '#ff0000', '2020-09-24 10:39:40', '2020-09-24 10:39:40'),
(16, 'blue', '#1753de', '2020-09-24 10:39:49', '2020-09-24 10:39:49'),
(17, 'gold', '#d4af37', '2020-09-24 21:04:54', '2020-09-24 21:04:54'),
(18, 'silver', '#d3d3d3', '2020-09-24 21:05:52', '2020-09-24 21:05:52'),
(19, 'white', '#ffffff', '2020-09-24 21:06:15', '2020-09-24 21:06:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0: chưa gửi; 1: đã gửi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `status`) VALUES
(3, 'ndhien288@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT 0,
  `total` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Status xu li order',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: cod, 1: ck',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `user_id`, `total`, `status`, `name`, `email`, `address`, `phone`, `note`, `payment`, `created_at`, `updated_at`) VALUES
(53, '2020-10-03 09:13:56', 13, 455000, 0, 'Admin', 'ndhien288@gmail.com', '99 Nguyễn Chí Thanh, Quận Đống Đa, Hà Nội, Quận Đống Đa, Hà Nội', '+84832210099', NULL, 0, '2020-10-02 19:13:56', '2020-10-02 19:13:56'),
(54, '2020-10-03 10:08:54', 13, 1770000, 0, 'Admin', 'admin@gmail.com', '99 Nguyễn Chí Thanh, Quận Đống Đa, Hà Nội, Quận Đống Đa, Hà Nội', '+84832210099', NULL, 0, '2020-10-02 20:08:54', '2020-10-02 20:08:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `size`, `price`, `created_at`, `updated_at`) VALUES
(86, 53, 28, 1, '6', 35000, '2020-10-02 19:13:56', '2020-10-02 19:13:56'),
(87, 53, 29, 1, '6', 300000, '2020-10-02 19:13:56', '2020-10-02 19:13:56'),
(88, 53, 31, 1, '6', 120000, '2020-10-02 19:13:56', '2020-10-02 19:13:56'),
(89, 54, 30, 6, '16', 150000, '2020-10-02 20:08:54', '2020-10-02 20:08:54'),
(90, 54, 27, 3, '13', 290000, '2020-10-02 20:08:54', '2020-10-02 20:08:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `discount` float DEFAULT 0 COMMENT '%',
  `price` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `sold_count` bigint(11) DEFAULT 0,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `color_id` int(11) NOT NULL,
  `sex` int(11) NOT NULL DEFAULT 0 COMMENT '0: Nam, 1: Nữ',
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_code`, `name`, `discount`, `price`, `status`, `sold_count`, `description`, `image`, `color_id`, `sex`, `category_id`, `created_at`, `updated_at`) VALUES
(27, 'n-1', 'Nhẫn 1', 0, 290000, 0, 3, NULL, 'nhan_1.jpg', 16, 0, 31, '2020-09-24 10:44:19', '2020-10-02 20:08:54'),
(28, 'v-2', 'Vòng cổ 1', 0, 35000, 0, 9, NULL, 'vong_co_1.jpg', 15, 1, 30, '2020-09-24 10:56:49', '2020-10-02 19:13:56'),
(29, 'vc-2', 'Vòng cổ 2', 0, 300000, 0, 3, NULL, 'vong_co_2.jpg', 18, 1, 30, '2020-09-24 21:07:38', '2020-10-02 19:13:56'),
(30, 'vc-3', 'Vòng cổ 3', 0, 150000, 0, 3, NULL, 'vong_co_3.jpg', 18, 0, 30, '2020-09-24 21:08:08', '2020-10-02 20:08:54'),
(31, 'vt-1', 'Vòng tay 1', 0, 120000, 0, 6, NULL, 'vong_tay_1.png', 19, 0, 33, '2020-09-24 21:08:44', '2020-10-02 19:13:56'),
(32, 'n-2', 'Nhẫn 2', 5, 300000, 0, 0, NULL, '2_119a31f2-2054-4483-93a3-841310e6bdfb_grande.jpg', 15, 0, 31, '2020-09-24 21:09:27', '2020-09-24 21:09:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attr`
--

DROP TABLE IF EXISTS `product_attr`;
CREATE TABLE `product_attr` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: ok, 1: hide, 2: out of stock',
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `status`, `image`, `created_at`, `updated_at`) VALUES
(14, 27, 0, '5_a774d2ff-edcb-44b7-99e6-4b4b11d6531e_grande.jpg', '2020-09-24 10:44:47', '2020-09-24 21:25:48'),
(15, 28, 0, '', '2020-09-24 21:27:06', '2020-09-24 21:27:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `product_id`, `score`, `name`, `title`, `content`, `created_at`, `updated_at`) VALUES
(15, 13, 28, 5, 'Admin', 'fsdfsd', 'fsdfsdfsf', '2020-09-30 23:59:17', '2020-09-30 23:59:17'),
(16, 24, 28, 5, 'Nguyễn1231', 'qewqeq', 'qweqweqwe', '2020-10-01 09:17:59', '2020-10-01 09:17:59'),
(17, 24, 29, 4, 'Nguyễn', 'test', 'asdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdad', '2020-10-01 10:05:20', '2020-10-01 10:05:20'),
(18, 13, 27, 5, 'Admin', 'dsfsdfsdf', 'sdfffsdfsdf', '2020-10-02 20:08:38', '2020-10-02 20:08:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(0, 'User', '[\"account\"]', '2020-09-23 04:09:20', '2020-10-02 18:40:37'),
(12, 'Admin', '[\"account\",\"add_wishlist\",\"wishlist.delete\",\"admin.admin\",\"admin.cate\",\"admin.cate.create\",\"admin.cate.delete\",\"admin.cate.edit\",\"admin.color\",\"admin.color.create\",\"admin.color.delete\",\"admin.color.edit\",\"admin.error\",\"admin.image\",\"admin.image.create\",\"admin.image.delete\",\"admin.image.edit\",\"admin.news\",\"admin.news.create\",\"admin.news.delete\",\"admin.news.edit\",\"admin.newsC\",\"admin.newsC.create\",\"admin.newsC.delete\",\"admin.newsC.edit\",\"admin.order\",\"admin.order.create\",\"admin.order.delete\",\"admin.order.edit\",\"admin.product\",\"admin.product.create\",\"admin.product.delete\",\"admin.product.edit\",\"admin.product_detail\",\"admin.product_detail.create\",\"admin.product_detail.delete\",\"admin.product_detail.edit\",\"admin.role\",\"admin.role.create\",\"admin.role.delete\",\"admin.role.edit\",\"admin.size\",\"admin.size.create\",\"admin.size.delete\",\"admin.size.edit\",\"admin.user\",\"admin.user.create\",\"admin.user.delete\",\"admin.user.edit\"]', '2020-09-30 08:20:17', '2020-10-02 20:15:43'),
(14, 'Test', '[\"account\",\"admin.admin\",\"admin.cate\",\"admin.cate.create\",\"admin.cate.delete\",\"admin.cate.edit\",\"admin.color\",\"admin.color.create\",\"admin.color.delete\",\"admin.color.edit\",\"admin.error\",\"admin.image\",\"admin.image.create\",\"admin.image.delete\",\"admin.image.edit\",\"admin.news\",\"admin.news.create\"]', '2020-10-02 11:46:46', '2020-10-02 11:46:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `param` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Số đo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`, `param`, `created_at`, `updated_at`) VALUES
(4, '6', '14.7 mm', '2020-09-05 12:14:39', '2020-09-24 21:21:08'),
(6, '7', '15 mm', '2020-09-14 23:34:25', '2020-09-24 21:21:20'),
(7, '8', '15.5 mm', '2020-09-14 23:34:33', '2020-09-24 21:21:31'),
(8, '9', '16 mm', '2020-09-24 21:21:51', '2020-09-24 21:21:51'),
(9, '10', '16.5 mm', '2020-09-24 21:21:59', '2020-09-24 21:21:59'),
(10, '11', '16.7 mm', '2020-09-24 21:22:07', '2020-09-24 21:22:07'),
(11, '12', '17 mm', '2020-09-24 21:22:21', '2020-09-24 21:22:21'),
(12, '13', '17.5 mm', '2020-09-24 21:22:37', '2020-09-24 21:22:37'),
(13, '14', '17.7 mm', '2020-09-24 21:22:54', '2020-09-24 21:22:54'),
(14, '15', '18 mm', '2020-09-24 21:23:01', '2020-09-24 21:23:01'),
(15, '16', '18.5 mm', '2020-09-24 21:23:10', '2020-09-24 21:23:10'),
(16, '17', '18.7 mm', '2020-09-24 21:23:18', '2020-09-24 21:23:18'),
(17, '18', '18.8 mm', '2020-09-24 21:23:41', '2020-09-24 21:23:41'),
(18, '19', '19mm', '2020-09-24 21:23:46', '2020-09-24 21:23:46'),
(19, '20', '19.2 mm', '2020-09-24 21:23:56', '2020-09-24 21:23:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Ban: 0; Ok: 1; Warning: 2',
  `remember_token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `status`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(13, 'Admin', 'admin@gmail.com', '$2y$10$iHjRdUqoPD5h6ubxX0NwVOtmUThlyNgfiqePGkqmr.Buq5BOAptcu', '99 Nguyễn Chí Thanh, Quận Đống Đa, Hà Nội', '+84832210099', 1, 'Q0iy6UkkzzSD4SnfEzEu68bKtYmGivuSbWKXuewJTHEUTj24W1dXaVYwydKY', '2020-09-20 16:32:53', '2020-09-20 02:32:53', '2020-09-24 22:05:16'),
(22, 'Lưu Ngọc Tú', 'luutu19880@gmail.com', '$2y$10$qMvtnlJPYhdIiZxit9iULeAZ7cDymwPat8OvZcjYZi1uns83vzPB2', ', Quận Đống Đa, Hà Nội, Quận Đống Đa, Hà Nội', '0832210099', 1, 'UBSZW9nAL6wrIkJGKYrUoZ6xIqtQiyLQqhtGi2tMo48z8GTUXE0PLapWEf3o', '2020-10-01 23:12:31', '2020-10-01 09:12:31', '2020-10-02 18:51:00'),
(23, 'Nguyễn', 'z@gmail.com', '$2y$10$EW/WKHydiQIrB45rLTmxWenhedKtFH8nOzQQiIJXq3wRx4SaUFfBm', NULL, '2342342342', 1, '2narJWVejYUT5NfTobvHJs6KrNbzn407VYr4UQheVwBzP9HzWOJ663XDmhq3', '2020-10-01 23:16:30', '2020-10-01 09:16:30', '2020-10-01 09:16:30'),
(24, 'Nguyễn', 'b@gmail.com', '$2y$10$gxnmcP.T77xjkFMQ.Vd0Keo9GyEuVpWOPIfbyvKARqhyavM4Tca1e', NULL, '234243424', 1, '8kk8avptwpL7Km7gSM9qhfStc3AuOrPvJrVFeuSyhZIQ0YUm1OCzLROFUFrZ', '2020-10-01 23:17:41', '2020-10-01 09:17:41', '2020-10-01 09:17:41'),
(25, 'tu', 'luutu1223@gmail.com', '$2y$10$kpowP2zeMHnDkAST6PD5kePNmp7D0j.C23RuV9D.xddHRVuZzy8Ne', NULL, '097922222', 1, 'ho5nssDGpITvlZ5dxrDjEbSNtuBRm54maN42HxW3UIdea1LaWyNdf7Rsoo3d', '2020-10-03 10:02:36', '2020-10-02 20:02:36', '2020-10-02 20:02:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(13, 12),
(22, 0),
(23, 0),
(24, 0),
(24, 14),
(25, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wish_list`
--

DROP TABLE IF EXISTS `wish_list`;
CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wish_list`
--

INSERT INTO `wish_list` (`id`, `product_id`, `user_id`) VALUES
(27, 31, 13),
(28, 28, 13),
(39, 29, 13);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `article_comment`
--
ALTER TABLE `article_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Chỉ mục cho bảng `article_comment_reply`
--
ALTER TABLE `article_comment_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmt_id` (`cmt_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `article_content`
--
ALTER TABLE `article_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Chỉ mục cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`),
  ADD KEY `name` (`name`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`,`phone`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `article_comment`
--
ALTER TABLE `article_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `article_comment_reply`
--
ALTER TABLE `article_comment_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `article_content`
--
ALTER TABLE `article_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `article_comment`
--
ALTER TABLE `article_comment`
  ADD CONSTRAINT `article_comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `article_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `article_comment_reply`
--
ALTER TABLE `article_comment_reply`
  ADD CONSTRAINT `article_comment_reply_ibfk_1` FOREIGN KEY (`cmt_id`) REFERENCES `article_comment` (`id`),
  ADD CONSTRAINT `article_comment_reply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `article_content`
--
ALTER TABLE `article_content`
  ADD CONSTRAINT `article_content_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);

--
-- Các ràng buộc cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  ADD CONSTRAINT `product_attr_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_attr_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
