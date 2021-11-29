-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 05:54 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravelnoithat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_05_143037_create_admin_table', 1),
(6, '2021_10_05_143441_create_category_table', 2),
(7, '2021_10_05_143525_create_brand_table', 3),
(8, '2021_10_05_143639_create_type_table', 3),
(9, '2021_10_05_143702_create_product_table', 3),
(10, '2021_10_18_095934_create_customer_table', 4),
(11, '2021_11_10_155419_create_shipping_table', 5),
(12, '2021_11_10_165424_create_payment_table', 6),
(13, '2021_11_10_165457_create_order_table', 6),
(14, '2021_11_10_165529_create_order_details_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `admin_token`, `created_at`, `updated_at`) VALUES
(1, 'phamngocyennhi7300@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Yến Nhi', '0333599035', '95xrLs', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Baya', 'baya', '<p>Baya</p>', 1, NULL, NULL),
(2, 'Suplo', 'suplo', '<p>Suplo</p>', 1, NULL, NULL),
(3, 'Zava Furniture', 'zara-furniture', 'ZAVA FURNITURE', 1, NULL, NULL),
(4, 'Casara', 'casara', '<p>thương hiệu Casara</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_slug`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Nội thất phòng khách', 'noi-that-phong-khach', '<p style=\"text-align:justify\">Cho diện mạo ph&ograve;ng kh&aacute;ch nh&agrave; ta th&ecirc;m phần sinh động với những sản phẩm đa dạng. Vượt trội cả về mặt chất liệu cấu th&agrave;nh v&agrave; thẩm mỹ, nội thất ph&ograve;ng kh&aacute;ch chất lượng sẽ l&agrave; lựa chọn ho&agrave;n hảo để cả nh&agrave; nghỉ ngơi thư gi&atilde;n.</p>\r\n\r\n<p style=\"text-align:justify\">B&ecirc;n cạnh đ&oacute;, bạn c&oacute; thể dễ d&agrave;ng phối với những m&oacute;n đồ trang tr&iacute; nho nhỏ như những khung tranh để lưu giữ kỉ niệm đ&aacute;ng qu&yacute;, chiếc đ&egrave;n b&agrave;n, những b&igrave;nh hoa v&agrave; hoa tươi thắm, c&ugrave;ng những chiếc vỏ gối trang tr&iacute; đầy m&agrave;u sắc.</p>', 1, NULL, NULL),
(2, 'Nội thất phòng ngủ', 'noi-that-phong-ngu', '<p style=\"text-align:justify\">Thức dậy mỗi s&aacute;ng tr&agrave;n đầy năng lượng tr&ecirc;n một chiếc nệm &ecirc;m &aacute;i v&agrave; một chiếc giường vững ch&atilde;i l&agrave; tất cả những g&igrave; ta cần để đ&aacute;nh bay t&acirc;m trạng uể oải.</p>\r\n\r\n<p style=\"text-align:justify\">Khởi đầu ng&agrave;y mới th&ecirc;m t&iacute;ch cực với sự sắp đặt kh&eacute;o l&eacute;o những nội thất ph&ograve;ng ngủ kh&aacute;c như chiếc tủ đầu giường để cất giữ những m&oacute;n đồ cần thiết, chiếc b&agrave;n trang điểm cho vẻ đẹp rạng rỡ hay những chiếc chăn ga gối mềm mại đầy sắc m&agrave;u.</p>\r\n\r\n<p style=\"text-align:justify\">Mua sắm tại BAYA ngay h&ocirc;m nay bởi ch&uacute;ng t&ocirc;i quan t&acirc;m đến giấc ngủ của bạn hơn bất k&igrave; ai kh&aacute;c!</p>', 1, NULL, NULL),
(3, 'Nội thất phòng bếp', 'noi-that-phong-bep', '<p style=\"text-align:justify\">C&ocirc;ng thức b&iacute; mật của một bữa ăn ngon kh&ocirc;ng chỉ nằm ở m&oacute;n ăn m&agrave; c&ograve;n ở c&aacute;ch ta chia sẻ ch&uacute;ng như thế n&agrave;o v&agrave; với ai.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Bữa ăn ngon - M&oacute;n ăn của bạn, nội thất của ch&uacute;ng t&ocirc;i. H&atilde;y biến tấu kh&ocirc;ng gian ăn uống th&acirc;n thuộc của m&igrave;nh ngay h&ocirc;m nay!</p>', 1, NULL, NULL),
(4, 'Nội thất phòng làm việc', 'noi-that-phong-lam-viec', '<p style=\"text-align:justify\">Sự h&agrave;i h&ograve;a giữa chức năng v&agrave; thẩm mỹ m&agrave; mỗi sản phẩm ph&ograve;ng l&agrave;m việc mang lại ch&iacute;nh l&agrave; điều khiến ch&uacute;ng trở n&ecirc;n ho&agrave;n hảo v&agrave; thiết yếu cho một ng&agrave;y l&agrave;m việc đầy năng lượng, kh&ocirc;ng gi&aacute;n đoạn, đặc biệt khi bạn l&agrave;m việc tại nh&agrave;.</p>\r\n\r\n<p style=\"text-align:justify\">Ch&uacute;ng t&ocirc;i hiểu r&otilde; rằng sự kết hợp giữa hai yếu tố tr&ecirc;n ch&iacute;nh l&agrave; ch&igrave;a kh&oacute;a để bạn giữ cơ thể thoải m&aacute;i v&agrave; tinh thần minh mẫn.</p>', 1, NULL, NULL),
(5, 'Đồ trang trí', 'do-trang-tri', 'Đồ trang trí', 1, NULL, NULL),
(6, 'Nội thất sân vườn và ban công', 'noi-that-san-vuon-va-ban-cong', '<p style=\"text-align:justify\">Tận hưởng kh&ocirc;ng kh&iacute; trong l&agrave;nh v&agrave; m&aacute;t mẻ một buổi s&aacute;ng đẹp trời v&agrave; nh&acirc;m nhi t&aacute;ch tr&agrave; hay chia sẻ những ly rượu b&ecirc;n người th&acirc;n l&uacute;c chiều với những nội thất ngo&agrave;i trời tinh tế v&agrave; chắc chắn. C&aacute;c nội thất ngo&agrave;i trời của BAYA l&agrave;m từ chất liệu th&eacute;p cao cấp được sơn tĩnh điện, kết hợp với gỗ keo chắc chắn v&agrave; chịu nước, ph&ugrave; hợp với c&aacute;c hoạt động ngo&agrave;i trời.</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(150) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_quantity` int(50) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`coupon_id`, `coupon_name`, `coupon_code`, `coupon_quantity`, `coupon_condition`, `coupon_number`) VALUES
(1, 'Giảm giá khi thanh toán bằng ví', 'HGJIDE', 5, 1, 5),
(2, 'Giảm giá khi đơn tối thiểu 2 triệu', 'ASDFG', 10, 2, 300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_password`, `customer_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Quốc Nhựt', '0123456789', 'phamngocyennhi7300@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'gWJgv9', NULL, NULL),
(2, 'Đặng Văn Phúc', '0987654321', 'vanphuc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL),
(5, 'Nguyễn Ngọc Cẩm Tú', '0123456789', 'camtu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(255) NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_name`, `gallery_image`, `product_id`) VALUES
(4, 'Bộ bàn học', 'banHoc1.jpg', 5),
(13, 'Bàn cafe Mozart', 'banCafeMozart1.jpg', 12),
(14, 'Ghế bành Sarawak', 'gheBanhSarawak1.jpg', 13),
(24, 'Giường tầng', 'giuongTang1.jpg', 23),
(29, 'Kê sách Franz', 'keSachFranz1.jpg', 28),
(54, 'Sofa lông vũ LINEN', 'sofaLongVu1.jpg', 29),
(61, 'Tủ đầu giường', 'tuSund1.jpg', 1),
(69, 'Tủ đầu giường', 'tuSund2.JPG', 1),
(70, 'Tủ đầu giường', 'tuSund3.JPG', 1),
(80, 'Sofa HACKMAN', 'sofaHackman1.jpg', 2),
(81, 'Sofa HACKMAN', 'sofaHackman3.jpg', 2),
(82, 'Sofa HACKMAN', 'sofaHackman2.jpg', 2),
(83, 'Kệ gắn tường', 'keGanTuong1.jpg', 3),
(84, 'Kệ gắn tường', 'keGanTuong2.jpg', 3),
(85, 'Kệ gắn tường', 'keGanTuong3.jpg', 3),
(88, 'Bàn ăn ANNE', 'banAn1.jpg', 30),
(90, 'Bàn ăn ANNE', 'banAn2.jpg', 30),
(91, 'Bàn ăn ANNE', 'banAn3.jpg', 30),
(97, 'Bộ bàn học', 'banHoc2.jpg', 5),
(98, 'Bộ bàn học', 'banHoc3.jpg', 5),
(99, 'Kệ sách FRANZ', 'keSach1.jpg', 7),
(100, 'Kệ sách FRANZ', 'keSach2.jpg', 7),
(101, 'Kệ sách FRANZ', 'keSach3.jpg', 7),
(104, 'Ghế ăn MOZART', 'gheAn1.jpg', 8),
(106, 'Ghế ăn MOZART', 'gheAn2.jpg', 8),
(107, 'Ghế ăn MOZART', 'gheAn3.jpg', 8),
(110, 'Giường Rally', 'giuongRally1.jpg', 9),
(111, 'Giường Rally', 'giuongRally2.jpg', 9),
(112, 'Giường Rally', 'giuongRally3.jpg', 9),
(113, 'Kệ tivi Rally', 'keTV1.jpg', 10),
(114, 'Kệ tivi Rally', 'keTV2.jpg', 10),
(115, 'Kệ tivi Rally', 'keTV3.jpg', 10),
(116, 'Giường tầng', 'giuongTang2.jpg', 23),
(117, 'Giường tầng', 'giuongTang3.jpg', 23),
(118, 'Ghế bành Sarawak', 'gheBanhSarawak2.jpg', 13),
(119, 'Ghế bành Sarawak', 'gheBanhSarawak3.jpg', 13),
(120, 'Gương trang điểm', 'guongTrangDiem1.jpg', 14),
(122, 'Gương trang điểm', 'guongTrangDiem2.jpg', 14),
(123, 'Gương trang điểm', 'guongTrangDiem3.jpg', 14),
(124, 'Gương đứng', 'guongDung1.jpg', 15),
(125, 'Gương đứng', 'guongDung2.jpg', 15),
(126, 'Gương đứng', 'guongDung3.jpg', 15),
(127, 'Gương đứng KITKA', 'guongDungKitka1.jpg', 31),
(128, 'Gương đứng KITKA', 'guongDungKitka2.jpg', 31),
(129, 'Gương đứng KITKA', 'guongDungKitka3.jpg', 31),
(130, 'Gương treo tường', 'guongTreoTuong1.jpg', 16),
(131, 'Gương treo tường', 'guongTreoTuong2.jpg', 16),
(132, 'Gương treo tường', 'guongTreoTuong3.jpg', 16),
(135, 'Bàn ngoài trời', 'banNgoaiTroi1.jpg', 17),
(136, 'Bàn ngoài trời', 'banNgoaiTroi2.jpg', 17),
(137, 'Bàn ngoài trời', 'banNgoaiTroi3.jpg', 17),
(138, 'Ghế đôn', 'gheDon1.jpg', 18),
(139, 'Ghế đôn', 'gheDon2.jpg', 18),
(140, 'Ghế đôn', 'gheDon3.jpg', 18),
(141, 'Ghế ngoài trời', 'gheNgoaiTroi1.jpg', 19),
(142, 'Ghế ngoài trời', 'gheNgoaiTroi2.jpg', 19),
(143, 'Ghế ngoài trời', 'gheNgoaiTroi3.jpg', 19),
(144, 'Tủ quần áo', 'tuQuanAo1.jpg', 20),
(145, 'Tủ quần áo', 'tuQuanAo2.jpg', 20),
(146, 'Tủ quần áo', 'tuQuanAo3.jpg', 20),
(147, 'Tủ quần áo trẻ em', 'tuTreEm1.jpg', 32),
(148, 'Tủ quần áo trẻ em', 'tuTreEm2.jpg', 32),
(149, 'Tủ quần áo trẻ em', 'tuTreEm3.jpg', 32),
(150, 'Tủ kính MOZART', 'tuKinh1.jpg', 21),
(151, 'Tủ kính MOZART', 'tuKinh2.jpg', 21),
(152, 'Tủ kính MOZART', 'tuKinh3.jpg', 21),
(153, 'Ghế trẻ em KID', 'gheKid1.jpg', 22),
(154, 'Ghế trẻ em KID', 'gheKid2.jpg', 22),
(155, 'Ghế trẻ em KID', 'gheKid3.jpg', 22),
(156, 'Ghế trẻ em JOY', 'gheJoy1.jpg', 33),
(157, 'Ghế trẻ em JOY', 'gheJoy2.jpg', 33),
(158, 'Ghế trẻ em JOY', 'gheJoy3.jpg', 33),
(161, 'Sofa lông vũ LINEN', 'sofaLongVu2.jpg', 29),
(162, 'Sofa lông vũ LINEN', 'sofaLongVu3.jpg', 29),
(163, 'Đồng hồ treo tường', 'dongHoTreoTuong1.jpg', 27),
(164, 'Đồng hồ treo tường', 'dongHoTreoTuong2.jpg', 27),
(165, 'Đồng hồ treo tường', 'dongHoTreoTuong3.jpg', 27),
(166, 'Đồng hồ báo thức', 'dongHoBaoThuc1.jpg', 26),
(167, 'Đồng hồ báo thức', 'dongHoBaoThuc2.jpg', 26),
(170, 'Đèn sàn URBAN', 'denSan1.jpg', 25),
(172, 'Đèn sàn URBAN', 'denSan2.jpg', 25),
(173, 'Đèn sàn URBAN', 'denSan3.jpg', 25),
(174, 'Giường Keiko', 'giuongKeiko1.jpg', 24),
(175, 'Giường Keiko', 'giuongKeiko2.jpg', 24),
(176, 'Giường Keiko', 'giuongKeiko3.jpg', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` double(8,2) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `details_id` int(10) UNSIGNED NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_coupon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`) VALUES
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(100) NOT NULL,
  `price_cost` int(100) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_slug`, `product_quantity`, `product_desc`, `product_content`, `product_price`, `price_cost`, `product_image`, `cat_id`, `brand_id`, `type_id`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'Tủ đầu giường', 'tu-dau-giuong', 6, '<p style=\"text-align:justify\">- Tủ đầu giường SUND được sử dụng trong ph&ograve;ng ngủ, để đ&egrave;n ngủ, s&aacute;ch b&aacute;o, điện thoại hoặc lưu trữ c&aacute;c đồ d&ugrave;ng nhỏ.</p>\r\n\r\n<p style=\"text-align:justify\">- Tủ được thiết kế đơn giản với hai ngăn k&eacute;o v&agrave; c&oacute; k&iacute;ch thước vừa vặn để bạn c&oacute; thể đặt trong l&ograve;ng tủ quần &aacute;o SUND nếu muốn tăng tiện &iacute;ch sử dụng.</p>\r\n\r\n<p style=\"text-align:justify\">- Kết hợp tủ đầu giường SUND với c&aacute;c sản phẩm nội thất SUND kh&aacute;c gi&uacute;p bạn dễ d&agrave;ng h&ocirc; biến kh&ocirc;ng gian của m&igrave;nh trở n&ecirc;n ngăn nắp, gọn g&agrave;ng hơn.</p>', '<p>- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao</p>\r\n\r\n<p>- Kh&ocirc;ng k&eacute;o, đẩy sản phẩm tr&ecirc;n mặt s&agrave;n gồ ghề</p>\r\n\r\n<p>- Vệ sinh sản phẩm bằng khăn ẩm, sau đ&oacute; lau kh&ocirc; ngay bằng khăn mềm</p>\r\n\r\n<p>- Kh&ocirc;ng sử dụng vật sắc nhọn ch&agrave; x&aacute;t l&ecirc;n sản phẩm</p>', 0, 1043000, 'tuSund1.jpg', 2, 1, 1, 1, NULL, NULL),
(2, 'Sofa HACKMAN', 'sofa-hackman', 4, '<p style=\"text-align:justify\">Ng&agrave;y nay, c&aacute;c sản phẩm&nbsp;<strong>nội thất th&ocirc;ng minh</strong>&nbsp;đang dần được y&ecirc;u th&iacute;ch v&agrave; lựa chọn nhiều hơn. Thấu hiểu điều đ&oacute;, BAYA đ&atilde; cho ra đời&nbsp;<strong>sofa HACKMAN</strong>, hướng tới sự tiện dụng, c&oacute; thể linh hoạt di chuyển trong qu&aacute; tr&igrave;nh sử dụng. H&atilde;y c&ugrave;ng t&igrave;m hiểu th&ecirc;m về thiết kế đầy s&aacute;ng tạo n&agrave;y.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Thiết kế:</strong>&nbsp;<strong>Sofa HACKMAN</strong>&nbsp;c&oacute; thiết kế tối giản, hướng tới vẻ đẹp sang trọng, hiện đại. Điểm đặc biệt của sản phẩm nằm ở phần khung ch&acirc;n ghế c&oacute; gắn 2 b&aacute;nh xe bằng kim loại v&ocirc; c&ugrave;ng chắc chắn, gi&uacute;p người sử dụng c&oacute; thể linh hoạt di chuyển sản phẩm một c&aacute;ch nhẹ nh&agrave;ng.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Chất liệu:</strong>&nbsp;B&ecirc;n cạnh khung ghế l&agrave;m từ gỗ,&nbsp;<strong>sofa HACKMAN</strong>&nbsp;c&ograve;n kết hợp sử dụng c&aacute;c b&aacute;nh xe chất liệu kim loại v&agrave; lớp vải bọc tổng hợp.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Độ bền:</strong>&nbsp;Với c&aacute;c sản phẩm nội thất gia đ&igrave;nh, gỗ l&agrave; chất liệu quen thuộc được sử dụng để l&agrave;m phần khung bởi độ chắc chắn, dẻo dai. Kh&ocirc;ng chỉ vậy, khi được bọc vải tổng hợp ph&iacute;a ngo&agrave;i, sản phẩm c&agrave;ng tăng khả năng chống nước, hạn chế tiếp x&uacute;c trực tiếp với độ ẩm v&agrave; nhiệt độ m&ocirc;i trường n&ecirc;n giữ được độ bền cao. Với c&aacute;c b&aacute;nh xe, BAYA lựa chọn chất liệu kim loại chắc chắn.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- T&iacute;nh ứng dụng:</strong>&nbsp;<strong>Sofa HACKMAN</strong>&nbsp;ph&ugrave; hợp với c&aacute;c kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch theo đuổi phong c&aacute;ch&nbsp;<strong>hiện đại, sang trọng</strong>. B&ecirc;n cạnh đ&oacute;, với 2 b&aacute;nh xe kim loại, bạn c&oacute; thể&nbsp;<strong>di chuyển sản phẩm đến mọi</strong>&nbsp;nơi trong nh&agrave; thật nhẹ nh&agrave;ng. Cũng nhờ vậy, c&ocirc;ng việc qu&eacute;t dọn s&agrave;n nh&agrave; ph&iacute;a dưới sofa nay trở n&ecirc;n đơn giản hơn bao giờ hết.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Sản phẩm c&oacute; thể kết hợp:</strong>&nbsp;Với Sofa HACKMAN, kh&aacute;ch h&agrave;ng c&oacute; thể kết hợp với c&aacute;c sản phẩm kh&aacute;c trong c&ugrave;ng bộ sưu tập. Ngo&agrave;i ra, bạn đừng qu&ecirc;n tham khảo th&ecirc;m những thiết kế đ&ocirc;n mềm, b&agrave;n c&agrave; ph&ecirc; hay đ&egrave;n s&agrave;n trang tr&iacute; c&oacute; c&ugrave;ng phong c&aacute;ch hiện đại, tối giản, để l&agrave;m n&ecirc;n một kh&ocirc;ng gian sống ho&agrave;n hảo nhất.</p>', '<p style=\"text-align:justify\">Độ bền v&agrave; vẻ đẹp của một sản phẩm phụ thuộc rất nhiều v&agrave;o qu&aacute; tr&igrave;nh sử dụng, bảo quản. Ch&iacute;nh v&igrave; vậy, ch&uacute;ng t&ocirc;i đưa ra một số hướng dẫn sau đối với&nbsp;<strong>sofa HACKMAN</strong>:</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng đứng hay nhảy tr&ecirc;n sofa, điều n&agrave;y g&acirc;y t&aacute;c động xấu đến bộ khung cũng như hệ thống đệm, l&ograve; xo v&agrave; l&agrave;m giảm tuổi thọ của sofa.</p>\r\n\r\n<p style=\"text-align:justify\">- Để l&agrave;m sạch sofa, c&aacute;ch tốt nhất l&agrave; nhờ đến sự hỗ trợ của đội vệ sinh sofa chuy&ecirc;n nghiệp.</p>\r\n\r\n<p style=\"text-align:justify\">- Hoặc bạn c&oacute; thể tự l&agrave;m dựa tr&ecirc;n một v&agrave;i mẹo nhỏ dưới đ&acirc;y:</p>\r\n\r\n<p style=\"text-align:justify\">- Lột bỏ c&aacute;c tấm vỏ l&oacute;t ghế để giặt với x&agrave; ph&ograve;ng. Phần c&ograve;n lại bạn c&oacute; thể l&agrave;m sạch bởi m&aacute;y h&uacute;t bụi.</p>\r\n\r\n<p style=\"text-align:justify\">- N&ecirc;n d&ugrave;ng khăn giấy ướt để ch&agrave; vết bẩn. Hoặc c&oacute; thể h&ograve;a lo&atilde;ng x&agrave; ph&ograve;ng với nước ấm, d&ugrave;ng khăn mềm thấm v&agrave; ch&agrave; nhẹ l&ecirc;n bề mặt bị bẩn.</p>\r\n\r\n<p style=\"text-align:justify\">- Cần kiểm tra để chắc chắn rằng phương ph&aacute;p n&agrave;o th&iacute;ch hợp cho sofa của m&igrave;nh. N&ecirc;n thử ở một vị tr&iacute; khuất của sofa xem phương ph&aacute;p đ&oacute; c&oacute; l&agrave;m tổn hại đến sofa hay kh&ocirc;ng.</p>\r\n\r\n<p style=\"text-align:justify\">- Sau khi vệ sinh n&ecirc;n để sofa kh&ocirc; tự nhi&ecirc;n, kh&ocirc;ng d&ugrave;ng tới m&aacute;y sấy.</p>', 3500000, 4200000, 'sofaHackman1.jpg', 1, 1, 2, 1, NULL, NULL),
(3, 'Kệ gắn tường', 'ke-gan-tuong', 5, '<p style=\"text-align:justify\">Tối ưu h&oacute;a kh&ocirc;ng gian đọc s&aacute;ch với kệ s&aacute;ch RAVENNA bởi thiết kế th&ocirc;ng minh, gọn g&agrave;ng. Dẫu l&agrave; kệ s&aacute;ch, kệ RAVENNA c&oacute; thể sử dụng v&agrave;o nhiều mục đ&iacute;ch kh&aacute;c nhau nhờ v&agrave;o chất liệu gỗ cao su cao cấp với&nbsp;<strong>khung sơn tĩnh điện</strong>, đảm bảo chất lượng cao v&agrave; thời gian sử dụng l&acirc;u d&agrave;i.</p>', '<p>- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng.</p>\r\n\r\n<p>- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&agrave; l&ecirc;n sản phẩm.</p>\r\n\r\n<p>- Kh&ocirc;ng sử dụng h&oacute;a chất hoặc c&aacute;c chất tẩy rửa ăn m&ograve;n tr&ecirc;n sản phẩm.</p>\r\n\r\n<p>- Sử dụng vải ẩm mềm để l&agrave;m sạch sản phẩm.</p>', 1300000, 1498000, 'keGanTuong1.jpg', 4, 2, 4, 1, NULL, NULL),
(5, 'Bộ bàn học', 'bo-ban-hoc', 7, '<p style=\"text-align:justify\">Đ&acirc;y l&agrave; loại b&agrave;n được thiết kế c&oacute; nhiều t&iacute;nh năng nổi bật v&agrave; tiện &iacute;ch như: C&oacute; thể gấp gọn khi kh&ocirc;ng sử dụng, thao t&aacute;c gấp &ndash; mở dễ d&agrave;ng, b&agrave;n được thiết kế chắc chắn, chịu lực tốt, trọng lượng nhẹ.</p>\r\n\r\n<p style=\"text-align:justify\">Đối với thiết kế nội thất d&agrave;nh cho những gia đ&igrave;nh c&oacute; diện t&iacute;ch ph&ograve;ng nhỏ, chật chội hoặc đơn giản l&agrave; bạn y&ecirc;u th&iacute;ch những đồ nội thất th&ocirc;ng minh. Loại b&agrave;n n&agrave;y mang lại hiệu quả đ&aacute;ng kể cho việc cải thiện kh&ocirc;ng gian sinh hoạt m&agrave; mỗi gia đ&igrave;nh c&oacute; thể c&acirc;n nhắc sở hữu. Kh&ocirc;ng chỉ c&aacute;c thiết bị điện tử m&agrave; đồ nội thất hiện nay cũng đang được &aacute;p dụng xu hướng thiết kế ng&agrave;y c&agrave;ng th&ocirc;ng minh hơn. Ch&iacute;nh v&igrave; vậy bạn sẽ kh&ocirc;ng muốn bỏ qua những tiện &iacute;ch m&agrave; ch&uacute;ng c&oacute; thể mang lại. Hơn thế nữa khi sử dụng c&aacute;c đồ nội thất th&ocirc;ng minh sẽ k&iacute;ch th&iacute;ch sự tư duy, s&aacute;ng tạo của trẻ nhỏ một c&aacute;ch rất tốt v&agrave; tự nhi&ecirc;n.</p>', '<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng khăn ẩm, sau đ&oacute; lau kh&ocirc; ngay bằng khăn mềm.</p>\r\n\r\n<p style=\"text-align:justify\">- Đặt sản phẩm tại nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm cao, tr&aacute;nh nhiệt độ cao, nguồn s&aacute;ng mạnh v&agrave; c&aacute;c vật dễ ch&aacute;y.</p>\r\n\r\n<p style=\"text-align:justify\">- Tr&aacute;nh để sản phẩm tiếp x&uacute;c với nước v&agrave; nhiệt độ cao trong thời gian d&agrave;i.</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&agrave; x&aacute;t sản phẩm.</p>', 0, 1390000, 'banHoc1.jpg', 4, 2, 3, 1, NULL, NULL),
(7, 'Kệ sách FRANZ', 'ke-sach-franz', 6, '<p style=\"text-align:justify\">Kệ s&aacute;ch 4 tầng FRANZ kh&ocirc;ng chỉ l&agrave; nơi sắp xếp s&aacute;ch gọn g&agrave;ng m&agrave; c&ograve;n l&agrave; điểm nhấn đẹp mắt cho kh&ocirc;ng gian của căn nh&agrave;. Sản phẩm được l&agrave;m từ gỗ MDF chắc chắn, chia th&agrave;nh 4 tầng vừa vặn, cho bạn thoải m&aacute;i sử dụng. Kết hợp kệ s&aacute;ch với c&aacute;c sản phẩm trong c&ugrave;ng bộ sưu tập FRANZ đến từ nội thất BAYA.</p>', '<p style=\"text-align:justify\">- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng k&eacute;o, đẩy sản phẩm tr&ecirc;n mặt s&agrave;n gồ ghề</p>\r\n\r\n<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng khăn ẩm, sau đ&oacute; lau kh&ocirc; ngay bằng khăn mềm</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng sử dụng vật sắc nhọn ch&agrave; x&aacute;t l&ecirc;n sản phẩm</p>', 0, 899000, 'keSach1.jpg', 4, 1, 4, 1, NULL, NULL),
(8, 'Ghế ăn MOZART', 'ghe-an-mozart', 4, '<p style=\"text-align:justify\">C&oacute; thiết kế nhỏ gọn, tối giản sẽ mang đến cho kh&ocirc;ng gian ph&ograve;ng bếp của bạn sự trang nh&atilde;, hiện đại. Mẫu ghế n&agrave;y ph&ugrave; hợp với hầu hết mọi kh&ocirc;ng gian, phong c&aacute;ch gia đ&igrave;nh ng&agrave;y nay.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Thiết kế:</strong> Thiết kế của ghế ăn n&agrave;y hướng tới sự tối giản với c&aacute;c thanh ghế được l&agrave;m vu&ocirc;ng truyền thống, tạo cảm gi&aacute;c gần gũi. Lưng ghế bản to, hơi nghi&ecirc;ng theo d&aacute;ng ngồi tự nhi&ecirc;n tạo sự thoải m&aacute;i khi sử dụng. M&agrave;u gỗ của phần mặt ghế được lựa chọn m&agrave;u n&acirc;u nhạt, c&oacute; đường v&acirc;n gỗ s&aacute;ng tạo cảm gi&aacute;c h&agrave;i h&ograve;a đẹp mắt.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Chất liệu:</strong> Ghế được l&agrave;m từ gỗ cao su c&oacute; độ bền cao. Do đ&oacute;, qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể y&ecirc;n t&acirc;m về độ bền của sản phẩm theo thời gian.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Độ bền:</strong> T&iacute;nh bền dẻo, chịu được lực t&aacute;c động qua qu&aacute; tr&igrave;nh chế t&aacute;c l&agrave; điểm đặc biệt chỉ c&oacute; ở gỗ cao su.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>T&iacute;nh ứng dụng:</strong> Hướng tới phong c&aacute;ch tối giản, nhẹ nh&agrave;ng m&agrave; vẫn tinh tế với gam m&agrave;u trắng chủ đạo gi&uacute;p kh&ocirc;ng gian căn nh&agrave; bạn th&ecirc;m phần tho&aacute;ng rộng, hiện đại v&agrave; sang trọng hơn.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Sản phẩm c&oacute; thể kết hợp: </strong>Bạn c&oacute; thể kết hợp mẫu ghế ăn n&agrave;y với nhiều loại b&agrave;n kh&aacute;c nhau như b&agrave;n chữ nhật, b&agrave;n tr&ograve;n hay b&agrave;n oval. Ghế c&oacute; m&agrave;u trắng chủ đạo n&ecirc;n c&ograve;n c&oacute; thể kết hợp với c&aacute;c mẫu b&agrave;n c&ugrave;ng tone trắng, tạo n&eacute;t nổi bật, hiện đại v&agrave; tươi s&aacute;ng cho căn ph&ograve;ng.</p>', '<p style=\"text-align:justify\">Để bền chắc, giữ được vẻ đẹp theo thời gian, người sử dụng n&ecirc;n lưu &yacute; một số c&aacute;ch để vệ sinh, bảo quản ghế trong qu&aacute; tr&igrave;nh sử dụng như sau:</p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\">- Vệ sinh ghế h&agrave;ng ng&agrave;y bằng vải mềm ẩm.</p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\">- Đặt ghế ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao, &aacute;nh nắng mặt trời v&agrave; c&aacute;c vật liệu dễ ch&aacute;y.</p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\">- Lau ngay chất lỏng bị đổ tr&ecirc;n bề mặt bằng vải mềm.</p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\">- Kh&ocirc;ng d&ugrave;ng vật b&eacute;n nhọn l&agrave;m trầy xước bề mặt.</p>', 0, 1099000, 'gheAn1.jpg', 3, 1, 2, 1, NULL, NULL),
(9, 'Giường Rally', 'giuong-rally', 3, '<p style=\"text-align:justify\"><span style=\"font-size:10.5pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Helvetica&quot;,&quot;sans-serif&quot;\"><span style=\"color:#58595b\">Giường ngủ RALLY c&oacute; kết cấu vững chắc với 4 ch&acirc;n giường từ gỗ cao su. Thiết kế tinh tế d&agrave;nh cho những ai ưa chuộng phong c&aacute;ch sống tối giản m&agrave; vẫn kh&ocirc;ng k&eacute;m phần sang trọng. H&atilde;y kh&aacute;m ph&aacute; bộ sưu tập nội thất RALLY từ BAYA để ho&agrave;n thiện tổ ấm của m&igrave;nh.</span></span></span></span></p>', '<p style=\"text-align:justify\">- Vệ sinh sản phẩm thường xuy&ecirc;n bằng khăn ẩm đ&atilde; được vắt r&aacute;o nước</p>\r\n\r\n<p style=\"text-align:justify\">- Đặt sản phẩm tại nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm cao, tr&aacute;nh nhiệt độ cao, nguồn s&aacute;ng mạnh v&agrave; c&aacute;c vật dễ ch&aacute;y.</p>\r\n\r\n<p style=\"text-align:justify\">- Tr&aacute;nh để sản phẩm tiếp x&uacute;c với nước v&agrave; nhiệt độ cao trong thời gian d&agrave;i. Khi sản phẩm bị ướt, cần lau kh&ocirc; ngay lập tức.</p>\r\n\r\n<p style=\"text-align:justify\">- Tr&aacute;nh sự qu&aacute; tải về người v&agrave; ngoại lực (nhảy, nh&uacute;n mạnh).</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&agrave; x&aacute;t sản phẩm.</p>', 0, 5490000, 'giuongRally1.jpg', 2, 4, 5, 1, NULL, NULL),
(10, 'Kệ tivi Rally', 'ke-tivi-rally', 7, '<p style=\"text-align:justify\">Kệ tivi RALLY được thiết kế đơn giản với chất liệu gỗ cao su thi&ecirc;n nhi&ecirc;n bền chắc v&agrave; m&agrave;u sơn trắng trang nh&atilde; đem lại vẻ đẹp mộc mạc, sang trọng cho căn ph&ograve;ng. Sản phẩm c&oacute; 2 ngăn kệ &amp; 2 tủ ph&iacute;a dưới gi&uacute;p bạn tối ưu h&oacute;a kh&ocirc;ng gian sắp xếp cho c&aacute;c thiết bị điện tử, s&aacute;ch b&aacute;o... Kh&aacute;m ph&aacute; trọn bộ sưu tập RALLY từ BAYA để trang ho&agrave;ng một tổ ấm ho&agrave;n mỹ.</p>', '<p style=\"text-align:justify\">- Lau h&agrave;ng ng&agrave;y bằng vải mềm ẩm<br />\r\n- Đặt ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao, &aacute;nh nắng mặt trời v&agrave; c&aacute;c vật liệu dễ ch&aacute;y<br />\r\n- Lu&ocirc;n lau ngay chất lỏng bị đổ v&agrave; lau kh&ocirc; bằng vải mềm<br />\r\n- Kh&ocirc;ng d&ugrave;ng vật b&eacute;n nhọn l&agrave;m trầy xước bề mặt</p>', 0, 4790000, 'keTV1.jpg', 1, 1, 4, 1, NULL, NULL),
(13, 'Ghế bành Sarawak', 'ghe-banh-sarawak', 5, '<p style=\"text-align:justify\">Ghế b&agrave;nh SARAWAK thu h&uacute;t bởi m&agrave;u sắc trang nh&atilde; với đệm ngồi bọc vải polyester. Ch&acirc;n gỗ cao su phủ sơn m&agrave;u n&acirc;u &oacute;c ch&oacute; đẹp mắt. H&atilde;y kết hợp với ghế đ&ocirc;n trong c&ugrave;ng bộ sưu tập SARAWAK để ho&agrave;n thiện kh&ocirc;ng gian nội thất gia đ&igrave;nh. Sản phẩm c&oacute; nhiều m&agrave;u sắc tươi s&aacute;ng để bạn chọn lựa.</p>', '<p style=\"text-align:justify\">- Sử dụng m&aacute;y h&uacute;t bụi hoặc dịch vụ vệ sinh sofa để l&agrave;m sạch sản phẩm<br />\r\n- Đặt sản phẩm tại nơi kh&ocirc; tho&aacute;ng<br />\r\n- Tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao, nguồn s&aacute;ng mạnh v&agrave; c&aacute;c vật dễ ch&aacute;y<br />\r\n- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&agrave; x&aacute;t sản phẩm.</p>', 0, 3990000, 'gheBanhSarawak1.jpg', 4, 3, 2, 1, NULL, NULL),
(14, 'Gương trang điểm', 'guong-trang-diem', 8, '<p style=\"text-align:justify\">Gương HARRIS từ gỗ sồi sẽ gi&uacute;p g&oacute;c l&agrave;m đẹp của bạn th&ecirc;m sang trọng, ấn tượng. Sẽ ho&agrave;n hảo hơn khi kết hợp chiếc gương n&agrave;y c&ugrave;ng b&agrave;n trang điểm HARRIS. H&atilde;y bổ sung th&ecirc;m c&aacute;c m&oacute;n nội thất kh&aacute;c trong bộ sưu tập ALI từ gỗ sồi để ho&agrave;n thiện kh&ocirc;ng gian sống thật đẹp v&agrave; tiện nghi của bạn.</p>', '<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng khăn mềm với nước sạch hoặc dung dịch vệ sinh d&agrave;nh cho gỗ, k&iacute;nh<br />\r\n- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng<br />\r\n- Tr&aacute;nh va đập mạnh v&agrave;o sản phẩm.</p>', 0, 1099000, 'guongTrangDiem1.jpg', 2, 4, 6, 1, NULL, NULL),
(15, 'Gương đứng GUARDIA', 'guong-dung-guardia', 6, '<p style=\"text-align:justify\">Gương đứng GUARDIA với khung l&agrave;m từ gỗ keo tự nhi&ecirc;n bền chắc mang lại n&eacute;t đẹp gần gũi, hiện đại cho ng&ocirc;i nh&agrave; bạn. Gương soi được to&agrave;n th&acirc;n, th&iacute;ch hợp đặt tại sảnh v&agrave; lối v&agrave;o cũng như trong ph&ograve;ng ngủ. Kệ nhỏ ph&iacute;a sau cho bạn thoải m&aacute;i sắp xếp c&aacute;c vật dụng như xi đ&aacute;nh gi&agrave;y, &aacute;o mưa, mũ&hellip;</p>', '<p style=\"text-align:justify\">- Vệ sinh gương bằng khăn mềm với nước hoặc dung dịch vệ sinh d&agrave;nh cho gỗ v&agrave; k&iacute;nh<br />\r\n- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng<br />\r\n- Tr&aacute;nh va đập mạnh v&agrave;o gương</p>', 0, 1590000, 'guongDung1.jpg', 2, 2, 6, 1, NULL, NULL),
(16, 'Gương treo tường', 'guong-treo-tuong', 7, '<p style=\"text-align:justify\">Gương treo tường</p>', '<p style=\"text-align:justify\">Gương treo tường</p>', 0, 1290000, 'guongTreoTuong1.jpg', 4, 3, 6, 1, NULL, NULL),
(17, 'Bàn ngoài trời', 'ban-ngoai-troi', 4, '<p style=\"text-align:justify\">L&agrave; thiết kế của BAYA, b&agrave;n ngo&agrave;i trời CAFE ROYALE l&agrave; lựa chọn ho&agrave;n hảo cho khu vườn nh&agrave; của bạn. Được l&agrave;m bằng th&eacute;p sơn tĩnh điện gi&uacute;p hạn chế rỉ s&eacute;t, b&agrave;n ph&ugrave; hợp để sử dụng ngo&agrave;i trời. B&agrave;n c&oacute; thiết kế hiện đại với mặt b&agrave;n bo tr&ograve;n v&agrave; phần ch&acirc;n cứng c&aacute;p, g&oacute;p phần l&agrave;m đẹp th&ecirc;m cho khu vườn. H&atilde;y kết hợp sản phẩm trong c&ugrave;ng bộ sưu tập CAFE ROYALE để ho&agrave;n thiện kh&ocirc;ng gian sống.</p>', '<p style=\"text-align:justify\">Đặt ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao, &aacute;nh nắng gay gắt v&agrave; c&aacute;c vật liệu dễ ch&aacute;y . Lau kh&ocirc; ngay chất lỏng v&agrave; hơi ẩm tr&ecirc;n bề mặt bằng vải mềm . Kh&ocirc;ng d&ugrave;ng miếng nh&aacute;m hoặc h&oacute;a chất tẩy rửa sản phẩm, vệ sinh h&agrave;ng ng&agrave;y bằng vải mềm ẩm . Kh&ocirc;ng d&ugrave;ng vật b&eacute;n nhọn ch&agrave; x&aacute;t bề mặt sản phẩm</p>', 0, 1790000, 'banNgoaiTroi1.jpg', 6, 1, 3, 1, NULL, NULL),
(18, 'Ghế đôn', 'ghe-don', 7, '<p style=\"text-align:justify\">Ghế đ&ocirc;n</p>', '<p style=\"text-align:justify\">Ghế đ&ocirc;n</p>', 0, 799000, 'gheDon1.jpg', 1, 4, 2, 1, NULL, NULL),
(19, 'Ghế ngoài trời', 'ghe-ngoai-troi', 5, '<p style=\"text-align:justify\"><strong>Ghế ngo&agrave;i trời CAFE-ROYALE</strong>&nbsp;m&agrave;u đen&nbsp;l&agrave; một trong những sản phẩm d&agrave;nh cho kh&ocirc;ng gian ngo&agrave;i trời của BAYA với k&iacute;ch thước nhỏ gọn, thiết kế tinh tế, s&aacute;ng tạo, độc đ&aacute;o đến từng chi tiết. Đ&acirc;y ch&iacute;nh l&agrave; một phần c&ograve;n thiếu cho khu vườn của gia đ&igrave;nh bạn.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Thiết kế:</strong>&nbsp;<strong>Ghế ngo&agrave;i trời CAFE-ROYALE</strong>&nbsp;c&oacute; thiết kế khung ghế thanh mảnh, l&agrave;m từ th&eacute;p phủ sơn tĩnh điện. Ngo&agrave;i mặt ghế bo tr&ograve;n mềm mại, m&agrave;u đen&nbsp;tinh tế, phần lưng tựa cũng được tạo th&agrave;nh từ những thanh th&eacute;p uốn cong đầy s&aacute;ng tạo, mới lạ. Thiết kế gi&uacute;p người d&ugrave;ng thoải m&aacute;i d&ugrave; sử dụng trong thời gian d&agrave;i, đồng thời tạo điểm nhấn, gi&uacute;p sản phẩm mang vẻ đẹp h&agrave;i h&ograve;a m&agrave; vẫn nổi bật giữa kh&ocirc;ng gian ngo&agrave;i trời.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Chất liệu:</strong>&nbsp;<strong>Ghế ngo&agrave;i trời CAFE-ROYALE</strong>&nbsp;sử dụng chất liệu mới hiện đại l&agrave; th&eacute;p phủ sơn tĩnh điện (ghế m&agrave;u đen l&agrave; kim loại sơn tĩnh điện mặt nh&aacute;m). Chất liệu n&agrave;y vừa c&oacute; thể tạo h&igrave;nh mới lạ, đảm bảo yếu tố thẩm mỹ, vừa ph&ugrave; hợp với y&ecirc;u cầu sử dụng của sản phẩm d&agrave;nh cho kh&ocirc;ng gian ngo&agrave;i trời, thường tiếp x&uacute;c với độ ẩm v&agrave; nhiệt độ cao.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Độ bền:</strong>&nbsp;Ghế được l&agrave;m ho&agrave;n to&agrave;n từ th&eacute;p phủ sơn tĩnh điện. Th&eacute;p l&agrave; một trong những kim loại c&oacute; độ bền cao, c&oacute; thể uốn cong m&agrave; kh&ocirc;ng sợ đứt g&atilde;y n&ecirc;n th&iacute;ch hợp sử dụng để chế t&aacute;c c&aacute;c vật dụng nội thất. C&ugrave;ng với đ&oacute;, lớp sơn tĩnh điện phủ ngo&agrave;i gi&uacute;p ghế hạn chế bị t&aacute;c động bởi ngoại cảnh, &iacute;t gỉ s&eacute;t theo thời gian sử dụng. Do ti&ecirc;u ch&iacute; ph&ugrave; hợp với kh&ocirc;ng gian ngo&agrave;i trời, đ&acirc;y ch&iacute;nh l&agrave; chất liệu ho&agrave;n hảo, đảm bảo độ bền cao nhất cho sản phẩm.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- T&iacute;nh ứng dụng:</strong>&nbsp;Với thiết kế độc đ&aacute;o, tinh tế m&agrave; sang trọng v&agrave; chất liệu hiện đại, nhiều ưu điểm vượt trội,&nbsp;<strong>ghế ngo&agrave;i trời CAFE-ROYALE m&agrave;u đen</strong>&nbsp;ph&ugrave; hợp với c&aacute;c kh&ocirc;ng gian ngo&agrave;i trời như s&acirc;n vườn, thềm nh&agrave;,... để nghỉ ch&acirc;n, thư gi&atilde;n.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Sản phẩm c&oacute; thể kết hợp:</strong>&nbsp;<strong>Ghế ngo&agrave;i trời CAFE-ROYALE</strong>&nbsp;c&oacute; thể kết hợp với nhiều mẫu b&agrave;n tr&agrave;, b&agrave;n cafe tr&ograve;n hoặc được đặt b&ecirc;n cửa sổ, hi&ecirc;n nh&agrave; như một m&oacute;n nội thất trang tr&iacute;. Nếu kết hợp th&ecirc;m một b&igrave;nh hoa nhỏ hay bộ ấm tr&agrave;, đ&acirc;y sẽ l&agrave; điểm nhấn tuyệt vời cho s&acirc;n vườn gia đ&igrave;nh bạn.</p>', '<p style=\"text-align:justify\">Để&nbsp;<strong>Ghế ngo&agrave;i trời CAFE-ROYALE</strong>&nbsp;bền chắc, hạn chế gỉ s&eacute;t v&agrave; giữ được vẻ đẹp theo thời gian, người sử dụng n&ecirc;n lưu &yacute; một số c&aacute;ch để vệ sinh, bảo quản ghế trong qu&aacute; tr&igrave;nh sử dụng như sau:</p>\r\n\r\n<p style=\"text-align:justify\">- Đặt ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao, &aacute;nh nắng gay gắt v&agrave; c&aacute;c vật liệu dễ ch&aacute;y.</p>\r\n\r\n<p style=\"text-align:justify\">- Lau kh&ocirc; ngay chất lỏng v&agrave; hơi ẩm tr&ecirc;n bề mặt bằng vải mềm.</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng d&ugrave;ng miếng nh&aacute;m hoặc h&oacute;a chất tẩy rửa sản phẩm, vệ sinh h&agrave;ng ng&agrave;y bằng vải mềm ẩm.</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng d&ugrave;ng vật b&eacute;n nhọn ch&agrave; x&aacute;t bề mặt sản phẩm</p>', 0, 749000, 'gheNgoaiTroi1.jpg', 6, 3, 2, 1, NULL, NULL),
(20, 'Tủ quần áo', 'tu-quan-ao', 4, '<p style=\"text-align:justify\">Tủ quần &aacute;o 3 cửa AKIO thuộc bộ sưu tập c&ugrave;ng t&ecirc;n của BAYA lấy cảm hứng từ phong c&aacute;ch nội thất Nhật Bản giản đơn pha trộn với vẻ đẹp Việt Nam tinh tế. Với th&agrave;nh phần chất liệu gỗ &oacute;c ch&oacute; cao cấp, sản phẩm sở hữu những đường v&acirc;n tự nhi&ecirc;n v&agrave; thiết kế độc đ&aacute;o mang n&eacute;t sang trọng v&agrave; thanh lịch v&agrave;o ng&ocirc;i nh&agrave; bạn. Ngăn k&eacute;o v&agrave; cửa tủ c&oacute; cơ chế đ&oacute;ng mở nhẹ nh&agrave;ng, phần kệ b&ecirc;n trong c&oacute; thể linh hoạt điều chỉnh cho bạn thoải m&aacute;i sắp xếp những vật dụng cần thiết.</p>', '<p style=\"text-align:justify\">- Đặt ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh nhiệt độ v&agrave; độ ẩm cao, nguồn s&aacute;ng mạnh v&agrave; c&aacute;c vật liệu dễ ch&aacute;y<br />\r\n- Để tr&aacute;nh l&agrave;m lỏng c&aacute;c khớp nối, kh&ocirc;ng k&eacute;o đẩy sản phẩm tr&ecirc;n s&agrave;n<br />\r\n- Lau sạch sản phẩm bằng vải mềm ẩm, lau ngay vết chất lỏng bị đổ bằng khăn kh&ocirc;<br />\r\n- D&ugrave;ng đế l&oacute;t khi cần đặt vật dụng n&oacute;ng/ lạnh l&ecirc;n bề mặt sản phẩm<br />\r\n- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn hoặc h&oacute;a chất t&aacute;c động l&ecirc;n sản phẩm</p>', 0, 10900000, 'tuQuanAo1.jpg', 2, 1, 1, 1, NULL, NULL),
(21, 'Tủ kính MOZART', 'tu-kinh-mozart', 5, '<p style=\"text-align:justify\">Tủ k&iacute;nh MOZART được thiết kế bởi BAYA sẽ l&agrave; nơi trưng b&agrave;y v&agrave; lưu trữ l&yacute; tưởng cho bộ b&aacute;t đĩa y&ecirc;u th&iacute;ch hay những vật lưu niệm của bạn. Sản phẩm c&oacute; khung gỗ chắc chắn, thiết kế c&oacute; cửa k&iacute;nh gồm nhiều tầng chứa k&egrave;m hai ngăn k&eacute;o tiện dụng. Mặt tr&ecirc;n c&ugrave;ng được giữ lại m&agrave;u gỗ tự nhi&ecirc;n kết hợp với th&acirc;n tủ phủ sơn trắng gi&uacute;p đem lại vẻ đẹp trang nh&atilde;, sang trọng cho căn ph&ograve;ng. H&atilde;y bổ sung th&ecirc;m c&aacute;c m&oacute;n nội thất kh&aacute;c trong bộ sưu tập MOZART từ BAYA cho tổ ấm của m&igrave;nh.</p>', '<p style=\"text-align:justify\">- L&agrave;m sạch sản phẩm bằng khăn mềm với nước sạch hoặc dung dịch tẩy rửa d&agrave;nh ri&ecirc;ng cho gỗ, sau đ&oacute; lau kh&ocirc; sản phẩm bằng khăn mềm.<br />\r\n- Đặt sản phẩm tại nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm cao, tr&aacute;nh nhiệt độ cao, nguồn s&aacute;ng mạnh v&agrave; c&aacute;c vật dễ ch&aacute;y.<br />\r\n- Tr&aacute;nh để sản phẩm tiếp x&uacute;c với nước v&agrave; nhiệt độ cao trong thời gian d&agrave;i.<br />\r\n- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&agrave; x&aacute;t sản phẩm.</p>', 0, 4999000, 'tuKinh1.jpg', 1, 1, 1, 1, NULL, NULL),
(22, 'Ghế trẻ em KID', 'ghe-tre-em-kid', 6, '<p style=\"text-align:justify\">Đến với nội thất BAYA, chọn về cho b&eacute; ghế ăn trẻ em KID từ gỗ cao su bền chắc. Sản phẩm c&oacute; thiết kế đẹp mắt v&agrave; vững ch&atilde;i, giữ nguy&ecirc;n m&agrave;u gỗ tự nhi&ecirc;n, điểm nhấn l&agrave;m đẹp gian ph&ograve;ng. Bạn c&oacute; thể kết hợp c&ugrave;ng c&aacute;c sản phẩm trong c&ugrave;ng bộ sưu tập KID để ho&agrave;n thiện kh&ocirc;ng gian sống của m&igrave;nh.</p>', '<p style=\"text-align:justify\">- L&agrave;m sạch sản phẩm bằng khăn mềm với nước sạch hoặc dung dịch tẩy rửa d&agrave;nh ri&ecirc;ng cho gỗ, sau đ&oacute; lau kh&ocirc; sản phẩm bằng khăn mềm.<br />\r\n- Bảo quản sản phẩm nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh sử dụng trong ph&ograve;ng tắm hoặc trong m&ocirc;i trường ẩm ướt, tr&aacute;nh đặt sản phẩm gần c&aacute;c vật dễ ch&aacute;y kh&aacute;c.<br />\r\n- Kh&ocirc;ng d&ugrave;ng c&aacute;c vật sắc nhọn ch&agrave; x&aacute;t sản phẩm.</p>', 0, 699000, 'gheKid1.jpg', 3, 1, 2, 1, NULL, NULL),
(23, 'Giường tầng', 'giuong-tang', 3, '<p style=\"text-align:justify\">Giường tầng GRAFFITI l&agrave; một trong những giải ph&aacute;p tốt nhất cho kh&ocirc;ng gian ph&ograve;ng ngủ nhỏ. Sản phẩm được l&agrave;m từ chất liệu kim loại phủ sơn tĩnh điện đen sang trọng c&oacute; thiết kế vững ch&atilde;i, gi&uacute;p tiết kiệm diện t&iacute;ch hiệu quả. Thiết kế th&ocirc;ng minh giường đi k&egrave;m cầu thang tiện dụng để dễ di chuyển.</p>', '<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng khăn ẩm đ&atilde; được vắt r&aacute;o nước<br />\r\n- Kh&ocirc;ng ng&acirc;m sản phẩm trong nước hay h&oacute;a chất<br />\r\n- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng<br />\r\n- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&agrave; x&aacute;t sản phẩm</p>', 0, 5990000, 'giuongTang1.jpg', 2, 3, 5, 1, NULL, NULL),
(24, 'Giường Keiko', 'giuong-keiko', 5, '<p style=\"text-align:justify\">Giường KEIKO được thiết kế tinh tế tr&ecirc;n gam m&agrave;u gỗ s&aacute;ng trang nh&atilde; đem lại vẻ đẹp mộc mạc v&agrave; cảm gi&aacute;c dễ chịu cho kh&ocirc;ng gian thư gi&atilde;n của bạn. Bắt đầu một buổi tối thảnh thơi tr&ecirc;n chiếc giường thoải m&aacute;i, bạn c&oacute; thể đọc v&agrave;i trang s&aacute;ch, hay lắng nghe một bản nhạc dịu nhẹ v&agrave; ch&igrave;m v&agrave;o giấc ngủ say.</p>', '<p style=\"text-align:justify\">- Vệ sinh sản phẩm thường xuy&ecirc;n bằng khăn ẩm đ&atilde; được vắt r&aacute;o nước<br />\r\n- Đặt sản phẩm tại nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm cao, tr&aacute;nh nhiệt độ cao, nguồn s&aacute;ng mạnh v&agrave; c&aacute;c vật dễ ch&aacute;y.<br />\r\n- Tr&aacute;nh để sản phẩm tiếp x&uacute;c với nước v&agrave; nhiệt độ cao trong thời gian d&agrave;i. Khi sản phẩm bị ướt, cần lau kh&ocirc; ngay lập tức.<br />\r\n- Tr&aacute;nh đặt vật qu&aacute; nặng hoặc sự qu&aacute; tải về người v&agrave; ngoại lực (nhảy, nh&uacute;n mạnh).<br />\r\n- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&agrave; x&aacute;t sản phẩm.</p>', 8090000, 8090000, 'giuongKeiko1.jpg', 2, 2, 5, 0, NULL, NULL),
(25, 'Đèn sàn URBAN', 'den-san-urban', 6, '<p style=\"text-align:justify\">Nổi bật với thiết kế đơn giản nhưng v&ocirc; c&ugrave;ng bắt mắt, đ&egrave;n s&agrave;n URBAN l&agrave; điểm nhấn ho&agrave;n hảo cho kh&ocirc;ng gian căn nh&agrave;. Th&acirc;n đ&egrave;n l&agrave;m từ kim loại phủ sơn vừa đẹp mắt vừa tăng độ bền cho sản phẩm. Bạn c&oacute; thể t&ugrave;y &yacute; đặt đ&egrave;n s&agrave;n ở g&oacute;c sofa ph&ograve;ng kh&aacute;ch, đầu giường ph&ograve;ng ngủ đều ho&agrave;n to&agrave;n ph&ugrave; hợp. Lưu &yacute;, sản phẩm kh&ocirc;ng bao gồm b&oacute;ng đ&egrave;n.</p>', '<p>Đ&egrave;n s&agrave;n</p>', 0, 1690000, 'denSan1.jpg', 5, 4, 7, 0, NULL, NULL),
(26, 'Đồng hồ báo thức', 'dong-ho-bao-thuc', 6, '<p style=\"text-align:justify\">Đồng hồ b&aacute;o thức JILL độc đ&aacute;o với thiết kế mang phong c&aacute;ch retro hiện đại v&agrave; động cơ m&aacute;y kim tr&ocirc;i &ecirc;m ả kh&ocirc;ng g&acirc;y tiếng động. Phần khung viền, ch&acirc;n v&agrave; chi tiết trang tr&iacute; bằng kim loại phủ sơn trắng trang nh&atilde; v&agrave; chắc chắn. Mặt đồng hồ bằng k&iacute;nh, 3 kim v&agrave; chữ số chỉ giờ dễ nh&igrave;n v&agrave; ấn tượng. Sản phẩm kh&ocirc;ng chỉ l&agrave; dụng cụ để quản l&yacute; thời gian hiệu quả m&agrave; c&ograve;n l&agrave; điểm nhấn đẹp mắt cho căn ph&ograve;ng.</p>', '<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng chổi lau bụi. Đặt sản phẩm ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh nhiệt độ cao.<br />\r\n- Xoay n&uacute;m vặn theo chiều kim đồng hồ để chỉnh giờ, kh&ocirc;ng chạm trực tiếp v&agrave;o kim tr&aacute;nh g&acirc;y hư hại cơ chế vận h&agrave;nh của đồng hồ</p>', 0, 499000, 'dongHoBaoThuc1.jpg', 5, 2, 7, 0, NULL, NULL),
(27, 'Đồng hồ treo tường', 'dong-ho-treo-tuong', 3, '<p style=\"text-align:justify\">Đồng hồ treo tường MANFRED sở hữu động cơ m&aacute;y kim tr&ocirc;i &ecirc;m ả kh&ocirc;ng g&acirc;y tiếng động cho chất lượng giờ ch&iacute;nh x&aacute;c cao. Thiết kế tối giản với chi tiết m&agrave;u v&agrave;ng kim tr&ecirc;n nền in họa tiết đ&aacute; hoa cương trắng mang đến vẻ đẹp sang trọng cho căn ph&ograve;ng của bạn. Đồng hồ l&agrave;m từ chất liệu kim loại v&agrave; k&iacute;nh cao cấp, l&agrave; m&oacute;n đồ trang tr&iacute; ấn tượng cho mọi kh&ocirc;ng gian sống.</p>', '<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng chổi lau bụi. Đặt sản phẩm ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh nhiệt độ cao.<br />\r\n- Xoay n&uacute;m vặn theo chiều kim đồng hồ để chỉnh giờ, kh&ocirc;ng chạm trực tiếp v&agrave;o kim tr&aacute;nh g&acirc;y hư hại cơ chế vận h&agrave;nh của đồng hồ.</p>', 0, 499000, 'dongHoTreoTuong1.jpg', 5, 3, 7, 1, NULL, NULL),
(29, 'Sofa lông vũ LINEN', 'sofa-long-vu-linen', 5, '<p>Sofa l&ocirc;ng vũ LINEN</p>', '<p>Sofa l&ocirc;ng vũ LINEN</p>', 0, 7790000, 'sofaLongVu1.jpg', 1, 4, 2, 1, NULL, NULL),
(30, 'Bàn ăn ANNE', 'ban-an-anne', 4, '<p style=\"text-align:justify\">Với đường k&iacute;nh 1m1 v&agrave; thiết kế gọn g&agrave;ng b&ecirc;n cạnh sắc m&agrave;u s&aacute;ng tự nhi&ecirc;n của gỗ, b&agrave;n ăn ANNE dễ d&agrave;ng ph&ugrave; hợp cho bất k&igrave; kh&ocirc;ng gian tổ ấm n&agrave;o.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- Chất liệu:</strong>&nbsp;Ch&acirc;n từ gỗ bạch đ&agrave;n, khung th&eacute;p kết nối giữa mặt v&agrave; ch&acirc;n b&agrave;n; mặt b&agrave;n từ Duranite.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>- T&iacute;nh năng:</strong>&nbsp;C&oacute; thể sử dụng trong nh&agrave; v&agrave; ngo&agrave;i trời, ph&ugrave; hợp cho 4 người ngồi.</p>', '<p style=\"text-align:justify\">- Đặt sản phẩm ở nơi kh&ocirc; tho&aacute;ng.</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng sử dụng h&oacute;a chất hoặc c&aacute;c chất tẩy rửa g&acirc;y ăn m&ograve;n tr&ecirc;n sản phẩm.</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng d&ugrave;ng vật sắc nhọn ch&aacute; x&aacute;t l&ecirc;n sản phẩm.</p>\r\n\r\n<p style=\"text-align:justify\">- Sử dụng vải mềm để l&agrave;m sạch sản phẩm.</p>', 0, 2095000, 'banAn1.jpg', 3, 4, 3, 1, NULL, NULL),
(31, 'Gương đứng KITKA', 'guong-dung-kitka', 5, '<p style=\"text-align:justify\">Gương đứng KITKA mang lại n&eacute;t đẹp cổ điển cho kh&ocirc;ng gian với t&ocirc;ng m&agrave;u n&acirc;u trầm v&agrave; thiết kế theo phong c&aacute;ch retro. Gương cao 165cm, c&oacute; thể thoải m&aacute;i điều chỉnh độ nghi&ecirc;ng. Kết hợp c&ugrave;ng c&aacute;c sản phẩm kh&aacute;c trong bộ sưu tập KITKA đến từ BAYA để ho&agrave;n thiện việc b&agrave;y tr&iacute; nội thất cho ng&ocirc;i nh&agrave; bạn.</p>', '<p style=\"text-align:justify\">- Đặt ở nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh &aacute;nh nắng chiếu trực tiếp.<br />\r\n- Lau ngay c&aacute;c vết chất lỏng bằng vải mềm kh&ocirc;.<br />\r\n- Cẩn thận khi di chuyển hoặc khi sử dụng c&aacute;c vật b&eacute;n nhọn dễ g&acirc;y trầy xước.<br />\r\n- Vệ sinh sản phẩm bằng vải mềm ẩm.</p>', 0, 2300000, 'guongDungKitka1.jpg', 2, 1, 6, 1, NULL, NULL),
(32, 'Tủ quần áo trẻ em', 'tu-quan-ao-tre-em', 4, '<p style=\"text-align:justify\">Tủ quần &aacute;o trẻ em JOY l&agrave; một sản phẩm trong bộ sưu tập nội thất đến từ BAYA d&agrave;nh ri&ecirc;ng cho c&aacute;c b&eacute; y&ecirc;u.</p>\r\n\r\n<p style=\"text-align:justify\">Tủ được l&agrave;m từ chất liệu gỗ cao su, kết hợp hai m&agrave;u trắng v&agrave; xanh bạc h&agrave; tươi tắn ph&ugrave; hợp sử dụng cho cả b&eacute; trai v&agrave; b&eacute; g&aacute;i. Kh&ocirc;ng kh&aacute;c g&igrave; tủ d&agrave;nh cho người lớn, b&eacute; cũng c&oacute; ngăn treo quần &aacute;o, ngăn xếp đồ v&agrave; hộc k&eacute;o, đủ cho b&eacute; tự sắp xếp v&agrave; quản l&yacute; quần &aacute;o, đồ d&ugrave;ng một c&aacute;ch gọn g&agrave;ng ngăn nắp. Việc t&igrave;m kiếm quần &aacute;o của b&eacute; chắc chắn kh&ocirc;ng c&ograve;n l&agrave; điều kh&oacute; khăn hay mất thời gian nữa.</p>\r\n\r\n<p style=\"text-align:justify\">Sản phẩm n&agrave;y kh&ocirc;ng chỉ gi&uacute;p b&eacute; th&iacute;ch th&uacute; hơn với kh&ocirc;ng gian ri&ecirc;ng của m&igrave;nh, m&agrave; b&eacute; c&ograve;n c&oacute; thể tập th&oacute;i quen ngăn nắp từ nhỏ, dần dần h&igrave;nh th&agrave;nh th&oacute;i quen tự lập trong cuộc sống sau n&agrave;y.</p>', '<p style=\"text-align:justify\">- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng k&eacute;o, đẩy sản phẩm tr&ecirc;n mặt s&agrave;n gồ ghề</p>\r\n\r\n<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng khăn ẩm, sau đ&oacute; lau kh&ocirc; ngay bằng khăn mềm</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng sử dụng vật sắc nhọn ch&agrave; x&aacute;t l&ecirc;n sản phẩm</p>', 0, 6990000, 'tuTreEm1.jpg', 2, 1, 1, 1, NULL, NULL),
(33, 'Ghế trẻ em JOY', 'ghe-tre-em-joy', 6, '<p style=\"text-align:justify\">Ghế trẻ em JOY được l&agrave;m từ gỗ cao su tự nhi&ecirc;n, th&acirc;n thiện với l&agrave;n da của trẻ. Tất cả c&aacute;c chi tiết của ghế đều đ&atilde; được gia c&ocirc;ng m&agrave;i m&ograve;n c&aacute;c cạnh để giữ an to&agrave;n cho trẻ. Lớp sơn NC phủ tr&ecirc;n bề mặt gi&uacute;p ghế lu&ocirc;n sạch sẽ v&agrave; cũng rất an to&agrave;n to&agrave;n cho b&eacute; khi sử dụng Phần lưng tựa của ghế c&oacute; khoảng trống lớn tạo sự th&ocirc;ng tho&aacute;ng, tho&aacute;t nhiệt gi&uacute;p b&eacute; ngồi thoải m&aacute;i, kh&ocirc;ng bị b&iacute; mồ h&ocirc;i khi học tập, vui chơi.</p>', '<p style=\"text-align:justify\">- Đặt sản phẩm nơi kh&ocirc; tho&aacute;ng, tr&aacute;nh độ ẩm v&agrave; nhiệt độ cao</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng k&eacute;o, đẩy sản phẩm tr&ecirc;n mặt s&agrave;n gồ ghề</p>\r\n\r\n<p style=\"text-align:justify\">- Vệ sinh sản phẩm bằng khăn ẩm, sau đ&oacute; lau kh&ocirc; ngay bằng khăn mềm</p>\r\n\r\n<p style=\"text-align:justify\">- Kh&ocirc;ng sử dụng vật sắc nhọn ch&agrave; x&aacute;t l&ecirc;n sản phẩm</p>', 0, 649000, 'gheJoy1.jpg', 3, 4, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_phone`, `shipping_address`, `shipping_notes`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Ngọc Yến Nhi', '0333599035', 'Tân Hiệp, Phú Giáo, Bình Dương', 'Giao hàng trong ngày', 1, NULL, NULL),
(2, 'Nguyễn Quốc Nhựt', '0123456789', 'Bến Cát, Bình Dương', 'Giao hàng trong ngày', 1, NULL, NULL),
(3, 'Đặng Văn Phúc', '0987654321', 'Bàu Bàng, Bình Dương', 'Giao hàng nhanh', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_staffs`
--

CREATE TABLE `tbl_staffs` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_phone` varchar(10) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`staff_id`, `staff_name`, `staff_phone`, `staff_email`, `staff_password`) VALUES
(1, 'Nguyễn Ngọc Cẩm Tú', '0123456789', 'camtu@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`, `type_slug`, `type_desc`, `type_status`, `created_at`, `updated_at`) VALUES
(1, 'Tủ', 'tu', '<p>C&aacute;c loại tủ</p>', 1, NULL, NULL),
(2, 'Ghế', 'ghe', '<p>C&aacute;c loại ghế</p>', 1, NULL, NULL),
(3, 'Bàn', 'ban', '<p>C&aacute;c loại b&agrave;n</p>', 1, NULL, NULL),
(4, 'Giá, kệ', 'gia-ke', '<p>C&aacute;c loại gi&aacute;, kệ</p>', 1, NULL, NULL),
(5, 'Giường', 'giuong', '<p>C&aacute;c loại giường</p>', 1, NULL, NULL),
(6, 'Gương', 'guong-trang-diem', '<p>Gương</p>', 1, NULL, NULL),
(7, 'Khác', 'khac', '<p>C&aacute;c loại sản phẩm</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Chỉ mục cho bảng `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
