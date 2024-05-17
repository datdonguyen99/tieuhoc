-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2024 at 02:22 AM
-- Server version: 8.0.32
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truonh2d_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `thumb` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort_order` tinyint UNSIGNED DEFAULT '0',
  `post_id` int DEFAULT NULL,
  `type` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `background` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `thumb`, `link`, `sort_order`, `post_id`, `type`, `description`, `background`) VALUES
(1, 'codam1', 'http://host.test/source/banner_codam.jpg', '', 0, 1, 'head', 'banner co dam', ''),
(2, 'home slider 1', 'http://host.test/source/slide.jpg', '', 0, NULL, 'home-slider', '', ''),
(3, 'home slider 2', 'http://host.test/source/slide1.jpg', '', 0, NULL, 'home-slider', '', ''),
(4, 'home slider 3', 'http://host.test/source/slide5.jpg', '', 0, NULL, 'home-slider', '', ''),
(5, 'side bar 1', 'http://host.test/source/lienkehuuich.png', '', 0, NULL, 'side-bar-slider', '', ''),
(6, 'side bar 2', 'http://host.test/source/bgd.jpg', '', 0, NULL, 'side-bar-slider', '', ''),
(7, 'side bar 3', 'http://host.test/source/anh1.jpg', '', 0, NULL, 'side-bar-slider', '', ''),
(8, 'side bar 4', 'http://host.test/source/nkv_1.png', '', 0, NULL, 'side-bar-slider', '', ''),
(9, 'side bar 5', 'http://host.test/source/anh2.jpg', '', 0, NULL, 'side-bar-slider', '', ''),
(10, 'side bar 5', 'http://host.test/source/anh3.jpg', '', 0, NULL, 'side-bar-slider', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img_url` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `post_link` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `order_num` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT '0',
  `total` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_description` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `url_thumb` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sort_order` int UNSIGNED DEFAULT '0',
  `type` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'menu',
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_title` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lang` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `show_home` int DEFAULT NULL,
  `name_en` varchar(545) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `content_en` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_title_en` varchar(545) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description_en` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `slug_en` varchar(445) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description_en` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `total`, `description`, `meta_description`, `url_thumb`, `sort_order`, `type`, `content`, `meta_title`, `lang`, `show_home`, `name_en`, `content_en`, `meta_title_en`, `meta_description_en`, `slug_en`, `description_en`) VALUES
(22, 'TRANG NHẤT', 'trang-nhat', 0, NULL, NULL, '', '', 1, 'menu', '', 'TRANG NHẤT', 'vi', NULL, '', '', '', '', '', NULL),
(23, 'GIỚI THIỆU', 'gioi-thieu', 0, NULL, NULL, '', '', 2, 'menu', '', 'GIỚI THIỆU', 'vi', NULL, 'introduction', '', '', '', 'intro', NULL),
(24, 'CÁC HOẠT ĐỘNG', 'hoat-dong', 0, NULL, NULL, '', '', 3, 'menu', '', 'HOẠT ĐỘNG', 'vi', NULL, 'activities', '', '', '', 'activities', NULL),
(25, 'THƯ VIỆN ẢNH', 'thu-vien-anh', 0, NULL, NULL, '', '', 4, 'menu', '', 'THƯ VIỆN ẢNH', 'vi', NULL, 'img_library', '', '', '', 'img_library', NULL),
(26, 'LIÊN HỆ', 'lien-he', 0, NULL, NULL, '', '', 6, 'menu', '', 'LIÊN HỆ', 'vi', NULL, 'CONTACT', '', '', '', 'contact', NULL),
(29, 'GIỚI THIỆU CHUNG', 'gioi-thieu-chung', 23, NULL, 'Giới thiệu chung', 'Đây là nội dung mẫu của phần giới thiệu chung về nhà trường.Đơn vị tham khảo.', 'http://host.test/source/icon1.png', 1, 'menu', 'Một vài nét về trường Tiểu học Lý Thái Tổ\r\n\r\n+ Trường Tiểu học Lý Thái Tổ được thành lập năm 2005.\r\n\r\n+ Hiện nay trường có 5 khối, 29 lớp học và gần 1000 học sinh.\r\n\r\n \r\n\r\n+ Từ khi thành lập đến nay, trường liên tục nhận được bằng khen của các cấp lãnh đạo.\r\n\r\n \r\n\r\n+ Năm 2010 trường được công nhận và trao bằng trường đạt chuẩn Quốc gia.\r\n\r\n \r\n\r\n+ Trường đạt danh hiệu trường tiên tiến xuất sắc cấp Thành phố năm học 2011-2012.\r\n\r\n \r\n\r\n+ Liên kết giảng dạy Anh ngữ với Language Link\r\n\r\n \r\n\r\n+ Giáo dục toàn diện là mục tiêu đào tạo của nhà trường. Trong những năm gần đây, trường Tiểu học Lý Thái Tổ đã gặt hái được nhiều thành công trong dạy và học. Những học sinh sau khi hoàn thành bậc tiểu học đã là những học sinh tiêu biểu của các trường THCS lớn của thành phố như trường Amsterdam, Marie Curie, Cầu Giấy, Giảng võ...\r\n\r\n \r\n\r\n+ Cùng với giáo dục toàn diện, Tiếng Anh là một trong những thế mạnh của nhà trường. Năm học 2013-2014, trường có 3 học sinh tham dự vòng thi Olympic Tiếng Anh cấp Thành phố đã đạt 2 giải nhất trên tổng số 4 giải nhất và một giải nhì trên tổng số 2 giải nhì của Quận Cầu Giấy. Cả 3 em đã vinh dự lọt vào tốp đầu dự thi Olympic Tiếng Anh cấp Quốc gia trong năm học này.\r\n\r\n \r\n\r\n+  Năm học 2013-2014 cuộc thi đánh vần tiếng Anh vừa được Trung tâm Anh ngữ ILA phối hợp cùng Phòng GD&ĐT quận Cầu Giấy tổ chức, 3 học sinh của Trường Tiểu học Lý Thái Tổ đã xuất sắc đoạt giải cao. Một em học sinh khối lớp 3 đã được nhận phần thưởng là một suất học bổng 100% cho khóa học Anh ngữ trẻ em tại ILA;  một em giành Giải Nhất  được nhận một suất học bổng 75% cho khóa học Anh ngữ trẻ em tại ILA; và một em đạt  giải Khuyến khích  nhận một suất học bổng 15% cho khóa học Anh ngữ trẻ em tại ILA.\r\n\r\n \r\n\r\n+ Cũng trong năm học 2013-2014 một loạt các bạn học sinh đã đạt được thành tích xuất sắc trong các cuộc thi cấp Quốc ga cũng như cấp Thành phố như:\r\n\r\n \r\n\r\n \r\n\r\n      - 01 bạn đạt Huy chương vàng Quốc Gia Tiếng Anh Internet; 02 bạn Giải Nhất Thành phố Tiếng Anh Internet; 02 bạn Giải Nhì cuộc thi Olympic Tiếng Anh cấp Thành phố;   02 bạn đạt học sinh tiêu biểu cấp Thành phố.\r\n\r\n\r\n     - 02 bạn đạt tuyển thủ bóng đá xuất sắc cấp Thành phố;  02 bạn đạt giải KK Olympic TA cấp Thành phố; 01 Huy chương đồng Quốc Gia Tiếng Anh Internet; 01Giải KK TA qua Internet cấp TP.\r\n\r\n     -  01 bạn giải Nhì Toán qua Internet cấp Thành phố, 01 bạn giải Nhì viết chữ đẹp cấp Quận, 02 bạn học sinh tiêu biểu cấp Quận.    \r\n\r\n ', 'GIỚI THIỆU CHUNG', 'vi', 1, '', '', '', '', '', NULL),
(31, 'QUÁ TRÌNH PHÁT TRIỂN', 'qua-trinh-phat-trien', 23, NULL, NULL, '', 'http://host.test/source/icon2.png', 2, 'menu', '', 'QUÁ TRÌNH PHÁT TRIỂN', 'vi', 1, '', '', '', '', '', NULL),
(32, 'TẤM NHÌN', 'tam-nhin', 23, NULL, NULL, '', 'http://host.test/source/icon3.png', 3, 'menu', '', 'TẤM NHÌN', 'vi', 1, '', '', '', '', '', NULL),
(33, 'ĐỘI NGŨ GIÁO VIÊN', 'doi-ngu-giao-vien', 23, NULL, NULL, '', 'http://host.test/source/icon4.png', 4, 'menu', '', 'ĐỘI NGŨ GIÁO VIÊN', 'vi', 1, '', '', '', '', '', NULL),
(35, 'CƠ SỞ VẬT CHẤT', 'co-so-vat-chat', 23, NULL, NULL, '', 'http://host.test/source/icon5.png', 5, 'menu', '', 'CƠ SỞ VẬT CHẤT', 'vi', 1, '', '', '', '', '', NULL),
(36, 'BÁN TRÚ', 'ban-tru', 24, NULL, NULL, '', '', 1, 'menu', '', 'BÁN TRÚ', 'vi', NULL, '', '', '', '', '', NULL),
(37, 'HOẠT ĐỘNG CHUYÊN MÔN', 'hoat-dong-chuyen-mon', 24, NULL, NULL, '', '', 2, 'menu', '', 'HOẠT ĐỘNG CHUYÊN MÔN', 'vi', NULL, '', '', '', '', '', NULL),
(38, 'HOẠT ĐỘNG NGOẠI KHÓA', 'hoat-dong-ngoai-khoa', 24, NULL, NULL, '', '', 3, 'menu', '', 'HOẠT ĐỘNG NGOẠI KHÓA', 'vi', NULL, '', '', '', '', '', NULL),
(39, 'THI ĐUA CHUYÊN CẦN', 'thi-dua-chuyen-can', 24, NULL, NULL, '', '', 4, 'menu', '', 'THI ĐUA CHUYÊN CẦN', 'vi', NULL, '', '', '', '', '', NULL),
(40, 'HOẠT ĐỘNG ĐOÀN HỘI', 'hoat-dong-doan-hoi', 24, NULL, NULL, '', '', 5, 'menu', '', 'HOẠT ĐỘNG ĐOÀN HỘI', 'vi', NULL, '', '', '', '', '', NULL),
(41, 'HOẠT ĐỘNG THỂ THAO', 'hoat-dong-the-thao', 24, NULL, NULL, '', '', 6, 'menu', '', 'HOẠT ĐỘNG THỂ THAO', 'vi', NULL, '', '', '', '', '', NULL),
(42, 'HOẠT ĐỘNG TỪ THIỆN', 'hoat-dong-tu-thien', 24, NULL, NULL, '', '', 7, 'menu', '', 'HOẠT ĐỘNG TỪ THIỆN', 'vi', NULL, '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

DROP TABLE IF EXISTS `combo`;
CREATE TABLE IF NOT EXISTS `combo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `combo_name` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `product_list` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `price` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common`
--

DROP TABLE IF EXISTS `common`;
CREATE TABLE IF NOT EXISTS `common` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `type` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `images` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `available` bit(1) DEFAULT b'0',
  `url` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `order_num` tinyint DEFAULT NULL,
  `lg` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'vi',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `key`, `name`, `value`) VALUES
(1, 'hotline', 'Hotline', '+84 902700025'),
(2, 'address', 'Địa chỉ', 'P7-04.OT06 Park 7, Vinhomes Central Park, 720A Điện Biên Phủ street, 22 Ward, Binh Thanh District, Ho Chi Minh City, VietNam '),
(3, 'email', 'Email', 'etl.taxagent@gmail.com'),
(4, 'facebook', 'Facebook', ''),
(5, 'instagram', 'Instagram', ''),
(6, 'pinterest', 'Pinterest', ''),
(7, 'twitter', 'Twitter', ''),
(8, 'link_app', 'App', ''),
(9, 'video', 'Video', 'https://www.youtube.com/watch?v=nyVYxlGhggE'),
(10, 'slogan', 'Slogan', ''),
(11, 'ten_truong', 'Tên của cơ sở giáo dục (trường)', 'Trường Tiểu học Cổ Đạm'),
(12, 'logo', 'Logo web', '/uploads/codam-logo-banner.png'),
(13, 'ten_pgd', 'Tên phòng giáo dục', 'PHÒNG GIÁO DỤC VÀ ĐÀO TẠO HUYỆN NGHI XUÂN');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `full_name` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone_number` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `company` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `note` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_date` datetime DEFAULT NULL,
  `address` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `country` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `sent` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `full_name`, `phone_number`, `company`, `note`, `created_date`, `address`, `city_id`, `country`, `district_id`, `sent`) VALUES
(17, 'khoa@tran.vn', 'khoa tran', '09283772222', NULL, '123 as d', NULL, NULL, NULL, NULL, NULL, b'0'),
(18, 'admin@homewayrealvn.com', 'Nam Nguyen', '0987322112', NULL, 'gửi dữ liệu thử', NULL, NULL, NULL, NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `c_district`
--

DROP TABLE IF EXISTS `c_district`;
CREATE TABLE IF NOT EXISTS `c_district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `district_name` varchar(128) DEFAULT NULL,
  `district_with_type` varchar(256) DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `code` int DEFAULT NULL,
  `province_code` int DEFAULT NULL,
  `district_slug` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `c_province`
--

DROP TABLE IF EXISTS `c_province`;
CREATE TABLE IF NOT EXISTS `c_province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `province_name` varchar(128) NOT NULL,
  `province_with_type` varchar(256) DEFAULT NULL,
  `province_slug` varchar(256) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `c_street`
--

DROP TABLE IF EXISTS `c_street`;
CREATE TABLE IF NOT EXISTS `c_street` (
  `id` int NOT NULL AUTO_INCREMENT,
  `street_name` varchar(256) DEFAULT NULL,
  `ward_id` int DEFAULT NULL,
  `street_slug` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `c_ward`
--

DROP TABLE IF EXISTS `c_ward`;
CREATE TABLE IF NOT EXISTS `c_ward` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(256) DEFAULT NULL,
  `ward_slug` varchar(256) DEFAULT NULL,
  `ward_with_type` varchar(256) DEFAULT NULL,
  `code` int DEFAULT NULL,
  `district_code` int DEFAULT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `district_name` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `district_slug` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '1: lay; 2 giao; 3 lay&giao',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images_product`
--

DROP TABLE IF EXISTS `images_product`;
CREATE TABLE IF NOT EXISTS `images_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img_url` varchar(445) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `keyword` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `slug` tinytext,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `keyword`, `slug`, `created_date`) VALUES
(1, 'thuế cho thuê nhà', 'thue-cho-thue-nha', '2023-06-19 08:29:04'),
(2, 'cách tính thuế thuê nhà', 'cach-tinh-thue-thue-nha', '2023-06-19 08:29:04'),
(3, 'thuế nhà thầu', 'thue-nha-thau', '2023-06-19 08:39:43'),
(4, 'qui định thuế thầu', 'qui-dinh-thue-thau', '2023-06-19 08:39:43'),
(5, 'thuế gia dịch điện tử', 'thue-gia-dich-dien-tu', '2023-06-19 08:41:46'),
(6, 'hoạch toán chi phí cho thuê nhà', 'hoach-toan-chi-phi-cho-thue-nha', '2023-06-19 08:43:45'),
(7, 'kế toán doanh nghiệp', 'ke-toan-doanh-nghiep', '2023-06-19 08:46:04'),
(8, 'dịch vụ kế toán', 'dich-vu-ke-toan', '2023-06-19 08:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `short_code` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'vi',
  `flag` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_nha_dat`
--

DROP TABLE IF EXISTS `loai_nha_dat`;
CREATE TABLE IF NOT EXISTS `loai_nha_dat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `contact_id` bigint DEFAULT NULL,
  `product_id_list` varchar(28) DEFAULT NULL COMMENT 'product_id:qty,product_id:qty,',
  `created_date` varchar(45) DEFAULT NULL,
  `total_cost` int DEFAULT '0',
  `confirmed_date` datetime DEFAULT NULL,
  `canceled_date` datetime DEFAULT NULL,
  `deliveried_date` datetime DEFAULT NULL,
  `note` mediumtext,
  `num` tinyint DEFAULT '1',
  `order_id` varchar(45) NOT NULL,
  `cost` int DEFAULT '0',
  `reg_type` varchar(45) DEFAULT 'single',
  `province_city_id` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `shipping` int DEFAULT '0',
  `status` varchar(45) DEFAULT NULL,
  `sent` bit(1) DEFAULT b'0',
  `full_address` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `slug` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `thumb` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `body` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_id` int UNSIGNED DEFAULT '0',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `view_number` int UNSIGNED DEFAULT '0',
  `meta_keywords` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `short_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `is_deleted` bit(1) DEFAULT b'0',
  `draft` bit(1) DEFAULT b'0',
  `created_date` datetime DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `type` tinyint UNSIGNED DEFAULT '0',
  `meta_title` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `title_en` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `body_en` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_title_en` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `meta_description_en` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_keywords_en` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `slug_en` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `news_update` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `thumb`, `body`, `category_id`, `user_id`, `tags`, `view_number`, `meta_keywords`, `meta_description`, `short_description`, `is_deleted`, `draft`, `created_date`, `published_date`, `type`, `meta_title`, `title_en`, `body_en`, `meta_title_en`, `meta_description_en`, `meta_keywords_en`, `slug_en`, `news_update`) VALUES
(213, 'Công văn số 673/SGDĐT-GDTrH về việc tập huấn cán bộ quản lí năm học 2014-2015', 'cong-van-so-673-SGDDT', NULL, 'Thực hiện nhiệm vụ Giáo dục Trung học của Bộ Giáo dục và Đào tạo về việc tập huấn bồi dưỡng cán bộ quản lí, giáo viên năm học 2014-2015, Sở Giáo dục và Đào tạo Thái Bình tổ chức các lớp tập huấn, bồi dưỡng cho cán bộ quản lí các phòng Giáo dục và Đào tạo, trường THPT, trường THCS, Trung tâm GDTX và HN trong toàn tỉnh...', 0, NULL, NULL, 0, NULL, NULL, NULL, b'0', b'0', '2024-05-13 16:26:13', '2024-05-14 09:41:19', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(214, 'Thông báo danh sách dự thi VIO năm học 2014-2015', 'thong-bao-danh-sach-du-thi-VIO-nam-hoc-2014-2015', NULL, 'Danh sách mới, cho các học sinh đăng ký thành công năm học 2014-2015\r\n- Cụ thể: \r\n\r\n+ Lớp 1.1: Em.....\r\n\r\n+ Lớp 1.2: Em...', 0, NULL, NULL, 0, NULL, NULL, NULL, b'0', b'0', '2024-05-13 16:29:13', '2024-05-14 09:43:02', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(215, 'Quyết định số 297/QĐ-SGDĐT v/v cử CBGV tập huấn bồi dưỡng giáo viên đáp ứng yêu cầu của chuẩn nghề nghiệp giáo viên trung học 2014', 'quyet-dinh-so-297-QD-SGDDT', NULL, 'Ngày 20 tháng 10 năm 2014, Giám đốc Sở Giáo dục và Đào tạo đã ban hành Quyết định số 297/QĐ-SGDĐT v/v cử CBGV tập huấn bồi dưỡng giáo viên đáp ứng yêu cầu của chuẩn nghề nghiệp giáo viên trung học 2014.', 0, NULL, NULL, 0, NULL, NULL, NULL, b'0', b'0', '2024-05-13 16:33:13', '2024-05-14 09:44:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(216, 'Công văn số: 581/SGDĐT V/v báo cáo công tác quản lý trường học', 'cong-van-so-581-SGDDT', NULL, 'Thực hiện sự chỉ đạo của Thường trực Tỉnh ủy về việc xây dựng Đề án nâng cao chất lượng, hiệu quả công tác quản lý giáo dục, Sở Giáo dục và Đào tạo yêu cầu các cơ sở giáo dục cấp Trung học phổ thông, Giáo dục thường xuyên và những cơ sở giáo dục trực thuộc báo cáo công tác quản lý của nhà trường, đề xuất các giải pháp đổi mới công tác quản lý trường học (theo đề cương kèm theo).', 0, NULL, NULL, 0, NULL, NULL, NULL, b'0', b'0', '2024-05-13 16:33:15', '2024-05-14 09:44:54', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(217, 'Thông báo kết quả trúng tuyển viên chức năm 2014', 'thong-bao-ket-qua-trung-tuyen-vien-chuc-nam-2014', NULL, 'Đúng 13 giờ 30 phút ngày 27 tháng 8 năm 2014, anh (chị) có tên trong danh sách trúng tuyển đến tập trung tại Hội trường tầng 3 Văn phòng Sở Giáo dục và Đào tạo Thái Bình để nhận quyết định. Khi đi mang theo bản chính các loại giấy tờ sau:\r\n      1. Đối với tất cả các thí sinh: Bằng tốt nghiệp đại học, bảng điểm đại học, sổ hộ khẩu.\r\n      2. Các trường hợp đặc biệt:', 0, NULL, NULL, 0, NULL, NULL, NULL, b'0', b'0', '2024-05-13 16:33:15', '2024-05-14 09:45:38', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(218, 'Thông báo kết quả trúng tuyển viên chức năm 2015', 'thong-bao-ket-qua-trung-tuyen-vien-chuc-2015', NULL, 'Đúng 13 giờ 30 phút ngày 27 tháng 8 năm 2014, anh (chị) có tên trong danh sách trúng ', 0, NULL, NULL, 10, NULL, NULL, NULL, b'0', b'0', '2024-05-13 16:35:25', '2024-05-14 09:38:15', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(219, 'Học sinh Trường Tiểu học Lý Thái Tổ xuất sắc đoạt giải vòng chung kết cấp Quốc gia của học sinh giỏi Tiếng Anh qua Internet', 'hoc-sinh-truong-tieu-hoc-ly-thai-to-xuat-sac-doat-giai-vong-chung-ket-cap-quoc-gia-cua-hoc-sinh-gioi-tieng-anh-qua-internet', 'http://host.test/source/001.jpg', '<p>Ngày 26/4/2014, 3 học sinh trường Tiểu học Lý Thái Tổ đã tham dự vòng Chung kết cấp Quốc gia của cuộc thi học sinh giỏi Tiếng Anh qua Internet tại trường Tiểu học Ái Mộ-Gia Lâm-Hà Nội. Ba bạn Nguyễn Tuấn Minh-5A1, Lương Hoàng Ngọc Minh-5A4 và Nguyễn Hương Quỳnh 5A5 đã hoàn thành phần thi của mình với kết quả xuất sắc và đều đạt giải thưởng của cuộc thi. Bạn Hương Quỳnh đạt giải Khuyến khích, bạn Tuấn Minh đạt Huy chương Đồng còn bạn Ngọc Minh đã xuất sắc đạt Huy chương Vàng. Chúc mừng những thành tích mà các bạn đã đạt được.</p>', 0, NULL, '', 0, 'Ngày 26/4/2014, 3 học sinh trường Tiểu học Lý Thái Tổ đã tham dự vòng Chung kết cấp Quốc gia&#8230;', 'Ngày 26/4/2014, 3 học sinh trường Tiểu học Lý Thái Tổ đã tham dự vòng Chung kết cấp Quốc gia&#8230;', '', b'0', b'0', '2024-05-15 08:43:54', '2024-05-14 09:46:39', 1, '', '', '', '', '', NULL, '', '0'),
(220, 'Trẻ 6-8 tuổi hay thách thức cha mẹ', 'tre-6-8-tuoi-hay-thach-thuc-cha-me', 'http://host.test/source/thachthuc.jpg', '<p>Ở lứa tuổi tiểu học, trẻ đã qua giai đoạn hay nổi giận nhưng vẫn chưa thực sự dễ bảo. Nó có thể từ chối ăn tối khi mẹ gọi, phớt lờ khi được yêu cầu nhặt tất lên và trả lời cáu kỉnh khi mẹ yêu cầu cư xử tử tế. Bạn đừng thất vọng, đó là do các bé ở lứa tuổi này đang muốn thử nghiệm các chỉ dẫn và mong đợi của người lớn. Khi thách thức, bé đang tìm cách tự đòi quyền lợi. Khi trưởng thành và hiểu về thế giới xung quanh nhiều hơn, bé sẽ có quan điểm riêng về các mối quan hệ và các nguyên tắc (hoặc chấp nhận quan điểm của bạn bè). Do đó, bạn đừng ngạc nhiên khi bé cố gắng tự đòi quyền lợi bằng cách thách thức bạn và những lời chỉ dẫn của bạn. Bé có thể giả vờ không nghe thấy bố mẹ nói hoặc đáp ứng các yêu cầu rất chậm chạp. Bạn có thể làm gì? Thông cảm: Khi bạn bảo con đi ăn cơm, bé hét lên “Không!” và cáu kỉnh khi bạn mang nó vào bàn ăn. Lúc đó, bạn hãy cố gắng đặt mình vào quan điểm của bé. Nếu bé đang chơi với một người bạn thân, hãy bảo với bé rằng quả là khó khăn khi phải bỏ dở cuộc chơi, nhưng bây giờ đã đến giờ ăn. Điều này giúp bé nhận thấy bạn luôn ở bên cạnh nó. Cố gắng đừng nổi giận, mà hãy tỏ ra ân cần nhưng cương quyết mang bé về khi cần thiết. Đặt ra các giới hạn: Các bé ở lứa tuổi tiểu học cần và muốn có các giới hạn. Nhưng con bạn cần biết các giới hạn đó là gì. Bạn hãy giải thích các nguyên tắc rõ ràng “Con không được gọi điện thoại khi không được phép” hoặc “Con cần phải đi vào ngay khi mẹ gọi con.” Nếu trẻ không tôn trọng các nguyên tắc, hãy tranh luận về nguyên tắc đó. Có lẽ môn toán quá khó đối với bé nên bé không chịu làm bài tập về nhà. Trong trường hợp đó, bạn hãy thử cho bé chơi một trò chơi toán học. Hoặc nếu bé không thích đi vào ngay khi bạn gọi, có thể do nó không đủ thời gian chơi tự do. Khi bé biết rằng bạn giúp bé giải quyết vấn đề, nó sẽ ít thách thức bạn hơn. Ủng hộ hành vi tốt: Mặc dù bạn thường nổi giận và mắng con khi bé thách thức, nhưng hãy cố gắng kiềm chế. Khi con bạn cư xử tồi, nó cũng thấy mình sai. Do đó, bạn đừng làm cho bé cảm thấy tồi tệ hơn. Điều đó có thể khiến bé cư xử tiêu cực hơn. Thay vì “bắt” các hành động sai, bạn hãy “bắt” các hành động đúng của bé, và khuyến khích khi bé cư xử tốt. Bạn hãy nhớ rằng khép con bạn vào khuôn phép không có nghĩa là điều khiển bé, mà là dạy bé cách tự điều khiển bản thân. Trừng phạt sẽ khiến bé hành động theo ý bạn, nhưng đó là do sợ hãi. Tốt hơn là bạn nên dạy bé cư xử đúng bởi vì bé muốn vậy; khi bé cư xử tốt thì nó sẽ cảm thấy vui vẻ và hạnh phúc. Ngoài ra, khi bé vi phạm các nguyên tắc, bạn hãy cho bé biết rằng hành động đó sẽ để lại những hậu quả. Đừng trừng phạt mà hãy nói rõ ràng: “Nếu con chơi bóng trong nhà, thì chúng ta sẽ phải để bóng ở ngoài.” Sử dụng phương pháp đình chỉ chơi theo cách tích cực: Khi con bạn bắt đầu thách thức vì muốn làm theo cách của mình, bạn hãy giúp bé bình tĩnh lại. Thay vì dùng phương pháp đình chỉ chơi (cho bé có thời gian suy nghĩ một mình ở một nơi đặc biệt) để trừng phạt, bạn hãy khuyến khích bé lui vào một góc phòng ngủ yêu thích hoặc một nơi tiện nghi trong phòng khách. Có thể bé tự thiết kế một nơi để ngồi suy nghĩ mỗi khi giận, với một chiếc gối to, một chiếc chăn mềm mại hoặc một vài quyển sách yêu thích. Nếu bé từ chối đến nơi đó, bạn hãy đề nghị đi cùng con và nói một vài câu. Nếu bé vẫn từ chối, bạn hãy để bé ở đó và đi ra ngoài. Không những bạn đã nêu một tấm gương tốt về cư xử bình tĩnh mà bạn còn có thời gian nghỉ ngơi. Khi cả bạn và bé cảm thấy thoải mái hơn, hãy nói chuyện với nó về cách cư xử phù hợp. Trao quyền cho con bạn: Cố gắng tạo cơ hội để con bạn tự hào với khả năng độc lập của mình. Để bé lựa chọn quần áo (miễn là quần áo đó sạch và không rách) hoặc chọn một trong hai loại rau. Khi bạn để con lựa chọn tức là bạn đã tôn trọng bé và các nhu cầu của bé. Còn có một cách khác để giúp con bạn cảm thấy tự do hơn, đó là nói những việc bé có thể làm thay vì những việc bé không thể làm. Ví dụ, thay vì nói “Không! Con không được đá bóng trong nhà’, bạn hãy nói “Con có thể đá bóng ngoài sân.” Bé đã đủ lớn để hiểu lời giải thích của bạn, nên bạn cũng phải nói rõ lý do vì sao không đá bóng trong nhà. Chấp nhận: Trước khi định ngăn cản bé làm một việc gì đó, bạn hãy tự hỏi là điều đó có nên không; ví dụ, khi con bạn muốn mặc áo sơ mi màu xanh lá cây với quần soóc màu da cam thì bạn có cần ngăn cản bé không. Đôi khi mọi việc sẽ trở nên dễ dàng hơn nếu bạn nhìn theo cách khác, như khi bé quên không chải đầu, hoặc cất nhiều quần áo sạch dưới giường thay vì cất vào tủ. Thỏa hiệp: Tránh những tình huống kích thích con bạn thách thức. Nếu một người bạn nào đó gần đây mới gây sự với bé, bạn hãy mời một bạn cùng lớp khác. Nếu bé ghét ai chạm vào bộ sưu tập Pokémon của mình, hãy cất bộ đó đi trước khi bạn ấy đến chơi. Nếu đột nhiên bạn gặp phải một tình huống khó xử, hãy cố gắng “đương đầu” với bé. Ví dụ, khi bé đuổi con mèo, bạn có thể bảo bé “Con không được đuổi con mèo nhưng có có thể cho mèo ăn.” Tôn trọng lứa tuổi và giai đoạn phát triển của con bạn: Khi yêu cầu con dọn giường và nhà tắm, bạn phải chắc chắn là bé biết làm công việc đó. Cố gắng dành thời gian hướng dẫn bé làm các nhiệm vụ mới, và làm cùng với bé cho đến khi nó thành thạo. Đôi khi bé thách thức bạn chỉ vì công việc đó quá khó. Cuối cùng, bạn hãy tôn trọng thế giới riêng tư của bé. Khi bé đang chơi vui, thay vì bắt dừng lại ngay để làm một việc gì đó, bạn hãy cho bé một vài phút để chuyển hướng. Chẳng hạn: “5 phút nữa chúng ta sẽ ăn cơm, do đó con hãy nhanh chóng kết thúc trò chơi và đi dọn bàn ăn.” Có thể bé sẽ không vui vẻ, thậm chí còn càu nhàu nữa. Nhưng nếu bạn kiên nhẫn và nhất quán, bé sẽ hiểu rằng nó sẽ không có những thứ mình muốn nếu bé thách thức bố mẹ.</p>', 0, NULL, '', 0, 'Ở lứa tuổi tiểu học, trẻ đã qua giai đoạn hay nổi giận nhưng vẫn chưa thực sự dễ bảo.&#8230;', 'Ở lứa tuổi tiểu học, trẻ đã qua giai đoạn hay nổi giận nhưng vẫn chưa thực sự dễ bảo.&#8230;', '', b'0', b'0', '2024-05-15 08:43:40', '2024-05-14 09:48:40', 1, '', '', '', '', '', NULL, '', '0'),
(221, 'Vòng chung kết giải bóng đa Mini nam 2013-2014', 'vong-chung-ket-giai-bong-da-mini-nam-2013-2014', 'http://host.test/source/111mini.jpg', '<p>Chào mừng kỷ niệm 84 năm ngày thành lập Đảng Cộng sản Việt Nam (03/02/1930 -03/02/2014), Chào mừng kỷ niệm 85 năm ngày thành lập Công đoàn Việt Nam (28/7/1929-28/72014), Mừng xuân Giáp Ngọ 2014 và các ngày kỷ niệm lớn diễn ra trong năm 2014, ngày 11 và 12 tháng 01 năm 2014, tại thành phố Đông Hà, Công đoàn Giáo dục tỉnh đã tổ chức vòng chung kết giải Bóng đá Mini nam khối các đơn vị trực thuộc. Đến dự khai mạc có đồng chí Nguyễn Thị Hoài Lê, Phó Chủ tịch LĐLĐ tỉnh, đồng chí Hoàng Xuân Thủy, Phó Giám đốc Sở Giáo dục và đào tạo. Tham dự vòng chung kết gồm có 8 đội bóng thuộc các CĐCS: trường THPT Lao Bảo, trường THPT Hướng Hóa, trường THPT Cam Lộ, trường THPT Đông Hà, trường THPT Bến Quan, trường THPT Vĩnh Linh, trường THPT Triệu Phong và trường THPT Nguyễn Huệ. Các trận đấu diễn ra thực sự sôi nổi, hào hứng và không kém phần quyết liệt. Kết quả: hai đội bóng thuộc CĐCS trường THPT Cam Lộ và trường THPT Nguyễn Huệ lọt vào trận chung kết, đội bóng trường THPT Hướng Hóa và THPT Triệu Phong đạt giải Ba.</p>', 0, NULL, '', 0, 'Chào mừng kỷ niệm 84 năm ngày thành lập Đảng Cộng sản Việt Nam (03/02/1930 -03/02/2014), Chào mừng kỷ niệm&#8230;', 'Chào mừng kỷ niệm 84 năm ngày thành lập Đảng Cộng sản Việt Nam (03/02/1930 -03/02/2014), Chào mừng kỷ niệm&#8230;', '', b'0', b'0', '2024-05-15 08:43:29', '2024-05-14 09:49:18', 1, '', '', '', '', '', NULL, '', '0'),
(222, 'Học sinh tiêu biểu Trường Tiểu học Lý Thái Tổ dự lễ tuyên dương khen thưởng Quận Cầu Giấy', 'hoc-sinh-tieu-bieu-truong-tieu-hoc-ly-thai-to-du-le-tuyen-duong-khen-thuong-quan-cau-giay', 'http://host.test/source/tuyen-duong-2014-cg.jpg', '<p>Sáng 22 tháng 5 năm 2014, 10 bạn học sinh xuất sắc của trường ta đã có mặt tại Nhà văn hóa Quận Cầu Giấy để tham dự lễ Tuyên dương khen thưởng do Phòng Giáo dục và Đào tạo Quận Cầu Giấy tổ chức. Với thành tích xuất sắc đạt Huy chương vàng cuộc thi tiếng Anh trên Internet cùng nhiều giải Quận, thành phố, bạn Lương Hoàng Ngọc Minh lớp 5A4 đã hai lần được lên sân khấu nhận phần thưởng dành cho học sinh đạt giải quốc gia và học sinh xuất sắc tiêu biểu. Bạn Nguyễn Tuấn Minh lớp 5A1 cũng được vinh danh cùng các bạn đạt giải học sinh giỏi cấp thành phố. Cùng với hai bạn Tuấn Minh và Ngọc Minh, tám bạn học sinh từ lớp 1 đến lớp 5 đã được tham dự buổi lễ long trọng đầy ý nghĩa này. Chắc chắn đây sẽ là một ấn tượng khó quên và là động lực thúc đẩy các bạn cố gắng hơn nữa trong những năm học tiếp theo.</p>', 0, NULL, '', 0, 'Sáng 22 tháng 5 năm 2014, 10 bạn học sinh xuất sắc của trường ta đã có mặt tại Nhà&#8230;', 'Sáng 22 tháng 5 năm 2014, 10 bạn học sinh xuất sắc của trường ta đã có mặt tại Nhà&#8230;', '', b'0', b'0', '2024-05-15 08:43:15', '2024-05-14 09:50:02', 1, '', '', '', '', '', NULL, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `price` int DEFAULT '0',
  `promotion_price` int DEFAULT '0',
  `function` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci COMMENT 'Tính năng',
  `tech_info` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci COMMENT 'thông tin kỹ thuật',
  `warranty` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci COMMENT 'Bào hành',
  `attachment_file` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `addin_product_id` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cate_id` int DEFAULT NULL,
  `tags` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `thumb` varchar(2046) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `creator_id` bigint NOT NULL DEFAULT '0',
  `status` varchar(28) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `views` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '0',
  `link_tech_detail` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT b'0',
  `content` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `meta_keywords` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_title` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dien_tich` int DEFAULT NULL,
  `huong` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ward_id` int DEFAULT NULL,
  `street_id` int DEFAULT NULL,
  `du_an_id` int DEFAULT NULL,
  `district_id` int DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `loai_nha_dat_id` int DEFAULT NULL,
  `hang_muc` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sold_date` datetime DEFAULT NULL,
  `images` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `price_short` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `so_phong` int DEFAULT NULL,
  `so_wc` int DEFAULT NULL,
  `lang` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'vi',
  `address` varchar(2045) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=486 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten_du_an` varchar(512) DEFAULT NULL,
  `du_an_slug` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name_slug` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `order_num` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

DROP TABLE IF EXISTS `school_info`;
CREATE TABLE IF NOT EXISTS `school_info` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `thumb` varchar(254) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link` varchar(254) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(254) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`id`, `name`, `slug`, `thumb`, `link`, `description`) VALUES
(1, 'Thông báo', 'thong-bao', 'http://host.test/source/iconthongbao.jpg', NULL, NULL),
(2, 'Tuyển sinh', 'tuyen-sinh', 'http://host.test/source/icontuyensinh.jpg', NULL, NULL),
(3, 'Tiêu biểu', 'tieu-bieu', 'http://host.test/source/iconvanban.jpg', NULL, NULL),
(4, 'Tài nguyên', 'tai-nguyen', 'http://host.test/source/icontainguyen.jpg', NULL, NULL),
(5, 'Thông tin công khai', 'thong-tin-cong-khai', 'http://host.test/source/iconcongkhai.jpg', NULL, NULL),
(6, 'Nội quy nhà trường', 'noi-quy-nha-truong', 'http://host.test/source/iconbantin.jpg', NULL, NULL),
(7, 'Bán trú', 'ban-tru', 'http://host.test/source/iconbantru.jpg', NULL, NULL),
(8, 'Học hành', 'hoc-hanh', 'http://host.test/source/icontuyensinh.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `keyword_id` int NOT NULL,
  `object_id` bigint NOT NULL,
  `id` bigint NOT NULL AUTO_INCREMENT,
  `object_type` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`keyword_id`, `object_id`, `id`, `object_type`) VALUES
(1, 207, 15, NULL),
(2, 207, 16, NULL),
(3, 208, 17, NULL),
(4, 208, 18, NULL),
(5, 209, 19, NULL),
(6, 210, 20, NULL),
(7, 211, 21, NULL),
(8, 211, 22, NULL),
(1, 207, 23, NULL),
(2, 207, 24, NULL),
(3, 208, 25, NULL),
(4, 208, 26, NULL),
(5, 209, 27, NULL),
(6, 210, 28, NULL),
(7, 211, 29, NULL),
(8, 211, 30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upload_data`
--

DROP TABLE IF EXISTS `upload_data`;
CREATE TABLE IF NOT EXISTS `upload_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(512) NOT NULL,
  `file_size` varchar(200) NOT NULL,
  `file_type` varchar(128) NOT NULL,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `role` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `image` varchar(1024) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `gender` bit(1) DEFAULT b'0',
  `token` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `created_at`, `role`, `last_login`, `birthday`, `image`, `gender`, `token`) VALUES
(25, 'Administrator', 'admin@taxlawvn.com', '$2y$10$LKtqapuaJSlbs5sA.n.5tuJfjhoxAhH0wTvo7IvGRQnaCkQy5DSbC', NULL, '2023-06-06 09:04:43', 'A', NULL, NULL, NULL, b'0', NULL),
(26, 'Administrator', 'admin@techdev.vn', '$2y$10$cOJp9PCTB78lrFuPrXJmv.mpoUl2GfMMIXJdWb0yZGBIzd2.Va4FO', NULL, '2024-04-21 14:10:17', 'A', NULL, NULL, NULL, b'0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
CREATE TABLE IF NOT EXISTS `ward` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(512) DEFAULT NULL,
  `district_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact` ADD FULLTEXT KEY `email` (`email`,`full_name`,`phone_number`,`company`,`note`);
ALTER TABLE `contact` ADD FULLTEXT KEY `email_2` (`email`,`full_name`,`phone_number`,`company`,`note`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
