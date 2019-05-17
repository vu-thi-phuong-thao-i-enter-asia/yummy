-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 09, 2017 lúc 04:45 AM
-- Phiên bản máy phục vụ: 5.5.56
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fruit_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `item_id`) VALUES
(33, 4, 4),
(18, 4, 5),
(20, 4, 6),
(21, 4, 7),
(22, 4, 8),
(26, 4, 11),
(27, 4, 12),
(4, 6, 1),
(5, 6, 2),
(6, 8, 2),
(9, 8, 3),
(24, 13, 1),
(29, 14, 5),
(28, 15, 5),
(34, 16, 1),
(35, 17, 1),
(36, 17, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `have_items`
--

CREATE TABLE `have_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `have_items`
--

INSERT INTO `have_items` (`id`, `order_id`, `item_id`, `item_quantity`, `sale_price`) VALUES
(1, 1, 2, 2, 40000),
(2, 2, 1, 2, 70000),
(3, 2, 2, 2, 40000),
(6, 6, 1, 2, 70000),
(7, 6, 2, 1, 40000),
(8, 7, 2, 3, 40000),
(9, 8, 1, 1, 70000),
(10, 8, 3, 2, 30000),
(11, 8, 4, 2, 10000),
(12, 9, 5, 3, 60000),
(13, 10, 2, 2, 40000),
(14, 10, 4, 1, 10000),
(15, 11, 1, 2, 70000),
(17, 12, 1, 1, 70000),
(18, 12, 3, 1, 30000),
(19, 12, 5, 1, 60000),
(20, 13, 4, 4, 10000),
(21, 14, 1, 2, 70000),
(22, 14, 2, 2, 40000),
(23, 14, 3, 3, 30000),
(24, 15, 1, 5, 70000),
(25, 16, 1, 1, 70000),
(26, 17, 3, 1, 30000),
(27, 17, 4, 1, 10000),
(28, 17, 5, 1, 60000),
(29, 18, 2, 2, 40000),
(30, 19, 2, 1, 50000),
(31, 20, 2, 3, 50000),
(32, 21, 2, 3, 50000),
(33, 21, 5, 1, 60000),
(34, 21, 7, 3, 15000),
(35, 22, 5, 1, 60000),
(36, 23, 2, 2, 50000),
(37, 24, 6, 1, 120000),
(38, 24, 5, 1, 60000),
(39, 25, 1, 2, 70000),
(40, 26, 2, 1, 50000),
(41, 27, 2, 1, 50000),
(42, 28, 7, 3, 15000),
(43, 28, 4, 3, 20000),
(44, 29, 7, 3, 15000),
(45, 30, 7, 3, 15000),
(46, 31, 5, 2, 60000),
(47, 32, 2, 5, 50000),
(48, 33, 2, 1, 50000),
(49, 33, 5, 4, 60000),
(50, 34, 2, 1, 50000),
(51, 34, 1, 5, 70000),
(52, 34, 4, 1, 20000),
(53, 35, 1, 2, 70000),
(54, 36, 2, 3, 50000),
(55, 37, 5, 1, 60000),
(56, 38, 4, 1, 20000),
(57, 39, 2, 1, 50000),
(58, 40, 2, 1, 50000),
(59, 41, 1, 1, 70000),
(60, 42, 2, 1, 50000),
(61, 43, 2, 1, 50000),
(62, 44, 12, 3, 20000),
(63, 45, 2, 1, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_type` int(11) NOT NULL,
  `item_description` text COLLATE utf8_unicode_ci NOT NULL,
  `item_remain` int(11) NOT NULL,
  `favorite_count` int(11) NOT NULL,
  `have_item_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_image`, `item_price`, `item_type`, `item_description`, `item_remain`, `favorite_count`, `have_item_count`) VALUES
(1, 'Qua kiwi', '59c1f3dd06d69editedkiwi.jpg', 70000, 2, 'Trai cay nhap khau', 83, 4, 12),
(2, 'Qua cam', 'quacam.jpg', 50000, 1, 'Trai cay trong nuoc', 20, 2, 22),
(3, 'Qua chuoi', 'quachuoi.jpg', 30000, 2, 'Trai cay thong thuong', 196, 1, 4),
(4, 'Dua hau', '59c9f27bd5561editedduahau.jpeg', 20000, 0, 'Trai cay giai khat mua he', 195, 2, 7),
(5, 'qua luu', '59c1f466225c6qua luu.JPG', 60000, 0, 'trai cay', 0, 3, 9),
(6, 'Nho', '59cb0d42682f5qua nho.jpeg', 120000, 2, 'Trái cây xứ lạnh', 35, 1, 1),
(7, 'Quả ổi', '59cb0d784f11aqua oi.jpg', 15000, 0, 'Trái cây quen thuộc ở các vùng quê', 488, 1, 4),
(8, 'Xoài', '59cb4863b2f74quaxoai.jpg', 30000, 0, 'Là một loại trái cây quen thuộc của miền nhiệt đới. Rất ngon', 250, 1, 0),
(9, 'Quả mít', '59d1a8a49e420qua-mit.jpg', 56000, 0, 'Quả gì mà mà gai chi chít xin thưa rằng quả mít', 20, 0, 0),
(10, 'Quả cau', '59d1a93aa3d94quả-cau.jpg', 150000, 0, 'Miếng trầu là đầu câu chuyện. Ý quên đây là cau', 20, 0, 0),
(11, 'Quả dừa', '59d1b014970ecqua dua.jpg', 30000, 0, 'Có chứa nước bên trong. Hay mọc ở các vùng đất cát, thấy nhiều ở gần biển', 130, 1, 0),
(12, 'Quả gì mà chua chua thế', '59d1b0908c035qua khe.jpg', 20000, 0, 'Xin thưa rằng quả khế', 120, 1, 1),
(13, 'Quả dâu tằm', '59d1f0d36baf8qua dau tam.jpg', 999900, 0, 'Dùng để ngâm nước dâu rất ngon', 999, 0, 0),
(14, 'Qua cam', '59d5d2b277026quacam.jpg', 50000, 2, 'Hoa qua Chau au', 100, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date_time` date NOT NULL,
  `order_total_price` int(11) NOT NULL,
  `order_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_date_time`, `order_total_price`, `order_address`, `user_id`, `order_status`) VALUES
(1, '2017-09-06', 80000, 'bacninh', 4, 1),
(2, '2017-09-06', 260000, 'hanoi', 4, 1),
(6, '2017-09-18', 180000, 'Nga ngo', 4, 1),
(7, '2017-09-19', 120000, 'Viet nam', 8, 1),
(8, '2017-09-20', 150000, 'Hanoi 2', 4, 1),
(9, '2017-09-20', 180000, 'Lai ha', 4, 1),
(10, '2017-09-20', 90000, 'Dn', 4, 0),
(11, '2017-09-21', 140000, 'Bach Khoa', 4, 0),
(12, '2017-09-21', 160000, 'Bach Khoa', 4, 0),
(13, '2017-09-21', 40000, 'Da nang', 4, 0),
(14, '2017-09-21', 310000, 'Cau giay', 4, 1),
(15, '2017-09-21', 350000, 'techlab', 4, 1),
(16, '2017-09-25', 70000, 'Hanoi', 4, 0),
(17, '2017-09-25', 100000, 'Cau giay', 4, 0),
(18, '2017-09-25', 80000, 'Lai ha', 4, 0),
(19, '2017-09-26', 50000, 'bn', 8, 0),
(20, '2017-09-26', 150000, 'Hanoi', 12, 0),
(21, '2017-09-27', 255000, 'Bien dong', 4, 0),
(22, '2017-09-27', 60000, 'Lai ha', 4, 0),
(23, '2017-09-28', 100000, 'Hanoi 2', 4, 0),
(24, '2017-09-28', 180000, 'Hanoi', 13, 1),
(25, '2017-10-02', 140000, 'VN', 4, 0),
(26, '2017-10-02', 50000, 'Bninh', 4, 1),
(27, '2017-10-02', 50000, 'Hanoi', 4, 0),
(28, '2017-10-02', 105000, 'Hanoi', 4, 0),
(29, '2017-10-02', 45000, 'Hanoi', 4, 1),
(30, '2017-10-02', 45000, 'Hanoi', 4, 0),
(31, '2017-10-02', 120000, 'Viet nam', 4, 0),
(32, '2017-10-02', 250000, 'bhkhbk', 4, 0),
(33, '2017-10-03', 290000, 'Indochina 55', 14, 0),
(34, '2017-10-03', 420000, 'sá', 14, 0),
(35, '2017-10-05', 140000, 'Hanoi', 16, 0),
(36, '2017-10-05', 150000, 'Vietnam', 4, 0),
(37, '2017-10-05', 60000, 'Hanoi', 4, 0),
(38, '2017-10-05', 20000, 'test', 17, 0),
(39, '2017-10-05', 50000, 'Hanoi', 4, 0),
(40, '2017-10-05', 50000, 'Hanoi', 4, 0),
(41, '2017-10-05', 70000, 'Hanoi', 4, 0),
(42, '2017-10-05', 50000, 'Hanoi', 4, 0),
(43, '2017-10-05', 50000, 'Hanoi', 8, 0),
(44, '2017-10-05', 60000, 'Lai ha', 8, 0),
(45, '2017-10-09', 50000, '241 xuanthuy caugiay', 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_summary` text COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_date_created` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_summary`, `post_content`, `post_date_created`, `user_id`, `post_image`) VALUES
(1, 'Bánh cuốn', 'Bánh cuốn là món ăn nổi tiêng ở quê tôi. Nó là một món ăn không thể thiếu mỗi khi đi chợ', '<p><em><strong>Banh cuon la 1 dac san noi tieng o mien Bac. Rat nhieu nguoi thich banh cuon.</strong></em></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\"><strong>NGUY&Ecirc;N LIỆU L&Agrave;M B&Aacute;NH CUỐN N&Oacute;NG</strong></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">- 150gr bột gạo</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;100 gr bột năng</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;850 ml nước</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;3 muỗng canh dầu ăn</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;1 muỗng cafe muối</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;300g thịt băm</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;3 miếng mộc nhĩ lớn</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;1 quả chanh</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;1 nh&aacute;nh tỏi</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;1 quả ớt</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;Nước lọc</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">-&nbsp;Hạt ti&ecirc;u, muối, hạt n&ecirc;m, mắm</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\"><strong>C&Aacute;C BƯỚC L&Agrave;M B&Aacute;NH CUỐN</strong></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">&nbsp;</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Bước 1: Ướp thịt với h&agrave;nh kh&ocirc;, 3 th&igrave;a hạt n&ecirc;m, 1 th&igrave;a nước mắm cho vừa.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Mộc nhĩ ng&acirc;m với nước ấm trong khoảng 5-10 ph&uacute;t cho nở, sau đ&oacute; rửa sạch, bỏ cuống rồi băm nhỏ.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Bước 2: Sau đ&oacute; phi h&agrave;nh cho đến khi c&oacute; m&ugrave;i thơm rồi cho thịt v&agrave; mộc nhĩ v&agrave;o x&agrave;o c&ugrave;ng. N&ecirc;m lại gia vị một lần nữa để thịt được săn v&agrave; đậm đ&agrave;. Rồi tắt bếp v&agrave; để thịt ra ngo&agrave;i cho nguội.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Bước 3: Pha bột l&agrave;m b&aacute;nh cuốn theo c&ocirc;ng thức được ghi tr&ecirc;n bao b&igrave; của bột b&aacute;nh cuốn. Tuy nhi&ecirc;n, bạn c&oacute; thể tự điều chỉnh lượng nước cho ph&ugrave; hợp.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Bước 4: D&ugrave;ng một c&aacute;i chảo kh&ocirc;ng d&iacute;nh để tr&aacute;ng b&aacute;nh. Bạn c&oacute; thể d&ugrave;ng giấy ăn để thấm một ch&uacute;t dầu, sau đ&oacute; tr&aacute;ng quanh chảo để l&uacute;c tr&aacute;ng được dễ hơn.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Để một th&igrave;a canh bột v&agrave;o chảo rồi lắc đều quanh chảo, sau đ&oacute; đậy vung trong 15 gi&acirc;y để bột ch&iacute;n. C&aacute;c bạn tr&aacute;ng bột c&agrave;ng mỏng th&igrave; b&aacute;nh c&agrave;ng ngon. Cho nh&acirc;n v&agrave;o giữa b&aacute;nh rồi cuốn lại.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Bước 5: Pha nước chấm bạn pha theo c&ocirc;ng thức: 1 th&igrave;a giấm gạo, 1 th&igrave;a nước mắm, 1 th&igrave;a đường, 6-7 th&igrave;a nước. Bạn c&oacute;</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.4; text-align: justify;\">Ch&uacute;c c&aacute;c bạn th&agrave;nh c&ocirc;ng với m&oacute;i&nbsp;b&aacute;nh cuốn n&oacute;ng&nbsp;ngay tại nh&agrave;!</p>', '2017-09-18', 4, '59cb49ee49faabanhcuon.jpg'),
(2, 'Bánh chưng', 'Banh Chung la 1 mon an truyen thong cua nguoi dan Viet Nam vao dip Tet', '<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\"><strong style=\"box-sizing: border-box;\">Nguồn Gốc</strong></p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">B&aacute;nh Chưng Tết theo &ocirc;ng cha ta kể lại xuất hiện v&agrave;o thời vua H&ugrave;ng. Chuyện rằng trong dịp đầu năm mới ho&agrave;ng thượng muốn truyền ng&ocirc;i cho c&aacute;c ho&agrave;ng tử, liền truyền &yacute; chỉ l&agrave;: trong c&aacute;c người con nếu ai c&oacute; m&oacute;n qu&agrave; vừa &yacute; trẫm (&yacute; vua) sẽ truyền lại ng&ocirc;i b&aacute;u cho người đ&oacute;. C&aacute;c ho&agrave;ng tử liền t&igrave;m đủ c&aacute;c m&oacute;n sơn h&agrave;,hải vị, c&aacute;c của cải ch&acirc;u b&aacute;u qu&iacute; hiếm l&agrave;m qu&agrave; d&acirc;ng tặng vua cha. Duy chỉ c&oacute; Lang Li&ecirc;u l&agrave; ho&agrave;ng tử thứ 18 từ l&acirc;u mất mẹ kh&ocirc;ng biết n&ecirc;n chọn m&oacute;n qu&agrave; n&agrave;o.</p>\r\n<p class=\"body-image\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\"><a class=\"photo\" style=\"box-sizing: border-box; color: #383838; text-decoration-line: none; text-align: center; display: inline-block; width: 444px;\" href=\"https://baomoi-photo-1.zadn.vn/17/01/29/229/21425694/1_105326.jpg\" data-index=\"0\"><img style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%;\" title=\"Nguồn gốc v&agrave; &yacute; nghĩa của b&aacute;nh chưng ng&agrave;y Tết kh&ocirc;ng phải ai cũng biết - Ảnh 1\" src=\"https://baomoi-photo-1.zadn.vn/w460x/17/01/29/229/21425694/1_105326.jpg\" alt=\"Nguon goc va y nghia cua banh chung ngay Tet khong phai ai cung biet - Anh 1\" /></a></p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">B&aacute;nh chưng truyền thống ng&agrave;y Tết</p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">Rồi một đ&ecirc;m Lang Li&ecirc;u nằm mơ c&oacute; vị thần đến bảo \"Trời đất kh&ocirc;ng c&oacute; g&igrave; qu&iacute; bằng hạt gạo h&atilde;y lấy gạo nặn th&agrave;nh h&igrave;nh tr&ograve;n v&agrave; vu&ocirc;ng tượng trưng cho đất v&agrave; trời, nh&acirc;n b&aacute;nh tựa c&ocirc;ng ơn sinh th&agrave;nh cha mẹ\". Khi d&acirc;ng l&ecirc;n vua, vua v&ocirc; c&ugrave;ng vui mừng v&agrave; đ&atilde; truyền ng&ocirc;i lại cho Lang Li&ecirc;u. M&oacute;n b&aacute;nh chưng v&agrave; b&aacute;nh d&agrave;y c&oacute; nguồn gốc ch&iacute;nh l&agrave; từ đ&acirc;y.</p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\"><strong style=\"box-sizing: border-box;\">&Yacute; nghĩa</strong></p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">B&aacute;nh chưng l&agrave; m&oacute;n ăn truyền thống trong m&acirc;m cỗ Tết của người Việt nhưng đ&acirc;u phải ai cũng biết &yacute; nghĩa của b&aacute;nh chưng như thế n&agrave;o. L&agrave; người Việt, việc t&igrave;m hiểu &yacute; nghĩa của b&aacute;nh chưng l&agrave; điều cần thiết. Nếu chưa biết, c&ugrave;ng ch&uacute;ng t&ocirc;i t&igrave;m hiểu &yacute; nghĩa của b&aacute;nh chưng như thế n&agrave;o nh&eacute;.</p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\"><strong style=\"box-sizing: border-box;\"><em style=\"box-sizing: border-box;\">&Yacute; nghĩa văn h&oacute;a</em></strong></p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">Theo quan điểm của văn h&oacute;a Trung Hoa thời bấy giờ: b&aacute;nh chưng tết h&igrave;nh vu&ocirc;ng tượng trưng cho mặt đất h&igrave;nh vu&ocirc;ng,b&aacute;nh d&agrave;y h&igrave;nh tr&ograve;n tượng trưng cho mặt trời. D&acirc;n tộc Việt Nam ta trước đ&acirc;y lại l&agrave; văn h&oacute;a l&uacute;a nước phụ thuộc v&agrave;o yếu tố thi&ecirc;n nhi&ecirc;n rất nhiều.Ch&iacute;nh v&igrave; vậy b&aacute;nh chưng tết đ&atilde; xuất hiện ở m&acirc;m cỗ thờ từ rất l&acirc;u,để thể hiện sự biết ơn trời đất đ&atilde; cho mưa thuận gi&oacute; h&ograve;a để m&ugrave;a m&agrave;ng bội thu đem lại cuộc sống ấm no cho con người. B&ecirc;n cạnh đ&oacute; l&agrave;m b&aacute;nh chưng tết cũng thể hiện được chữ hiếu của người con với cha mẹ,ch&iacute;nh v&igrave; thế m&agrave; phong tục d&ugrave;ng b&aacute;nh chưng l&agrave;m qu&agrave; biếu d&acirc;ng l&ecirc;n cha mẹ cũng từ đ&acirc;y m&agrave; c&oacute;. Đi c&ugrave;ng với b&aacute;nh chưng b&aacute;nh d&agrave;y,trong ng&agrave;y tết b&agrave;y m&acirc;m ngũ quả thể hiện ngũ h&agrave;nh tương sinh tương khắc.</p>\r\n<p class=\"body-image\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">&nbsp;</p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">L&agrave; loại b&aacute;nh truyền thống trong dịp Tết nhưng kh&ocirc;ng phải ai cũng biết &yacute; nghĩa của b&aacute;nh chưng.</p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\"><strong style=\"box-sizing: border-box;\"><em style=\"box-sizing: border-box;\">&Yacute; nghĩa tinh thần</em></strong></p>\r\n<p class=\"body-text\" style=\"box-sizing: border-box; margin: 0px 0px 10px; word-wrap: break-word; font-family: Baomoi, Arial, Helvetica, sans-serif; font-size: 18px;\">Trong ng&agrave;y tết cổ truyền h&igrave;nh ảnh gia đ&igrave;nh qu&acirc;y quần b&ecirc;n nồi b&aacute;nh chưng thật l&agrave; đẹp v&agrave; &yacute; nghĩa với tất cả ch&uacute;ng ta. Một c&aacute;i tết sẽ kh&ocirc;ng l&agrave; chọn vẹn nếu thiếu m&agrave;u xanh của b&aacute;nh chưng,cuộc sống d&ugrave; c&oacute; bộn bề v&agrave; nhiều lo to&agrave;n nhưng 1 chiếc b&aacute;nh chưng d&acirc;ng l&ecirc;n b&agrave;n thờ gia ti&ecirc;n chắc chắn phải c&oacute;. Th&ocirc;ng thường c&aacute;c gia đ&igrave;nh Việt c&oacute; th&oacute;i quen g&oacute;i b&aacute;nh v&agrave;o ng&agrave;y 27 v&agrave; 28 đ&acirc;y l&agrave; khoảng thời gian kết th&uacute;c c&ocirc;ng việc sau cả 1 năm vất vả để chuẩn bị mọi thứ cho ng&agrave;y tết. Đ&acirc;y ch&iacute;nh l&agrave; dịp để &ocirc;ng b&agrave; bố mẹ v&agrave; con ch&aacute;u xum vầy trước kh&ocirc;ng kh&iacute; rạo rực của m&ugrave;a xu&acirc;n,b&aacute;nh chưng c&oacute; &yacute; nghĩa kh&ocirc;ng chỉ về mặt dinh dưỡng m&agrave; n&oacute; ch&iacute;nh l&agrave; n&eacute;t đẹp trong đời sống tinh thần của d&acirc;n tộc ta.</p>', '2017-09-26', 4, '59d1abf399dfcbanh-chung.jpg'),
(4, 'Bánh ngọt (phần 1)', 'Vẫn là những điều thú vị về bánh ngọt', '<p>B&aacute;nh ngọt rất ngon.</p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">Dạo gần đ&acirc;y, mọi người hay truyền nhau h&igrave;nh ảnh về một m&oacute;n b&aacute;nh c&oacute; phần nh&acirc;n đậm kem cheese nh&igrave;n v&ocirc; c&ugrave;ng th&iacute;ch mắt. Tuy chỉ mới xuất hiện v&agrave; nhen nh&oacute;m th&ocirc;i nhưng m&oacute;n b&aacute;nh m&igrave; ph&ocirc; mai thực sự đ&atilde; c&oacute; một độ phủ s&oacute;ng đ&aacute;ng kể tr&ecirc;n Instagram của c&aacute;c bạn hay review ẩm thực, qu&aacute;n x&aacute;.&nbsp;</span></p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">Đảm bảo l&agrave; th&agrave;nh vi&ecirc;n hiệp hội \"ăn cả thế giới\" sẽ kh&ocirc;ng thể bỏ qua m&oacute;n b&aacute;nh nh&igrave;n l&agrave; muốn lao v&agrave;o cắn ngay n&agrave;y rồi. D&ugrave; nghe t&ecirc;n bạn sẽ nghĩ l&agrave; chiếc b&aacute;nh n&agrave;y rất ngọt v&agrave; ngấy cho xem, nhưng kh&ocirc;ng...&nbsp;</span></p>\r\n<p style=\"padding: 0px 0px 20px; border: 0px; font-style: italic; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px !important 0px !important 0px 0px !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">-&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">B&aacute;nh kh&aacute; ngon v&agrave; rất dễ ăn, đem lại một cảm gi&aacute;c mới mẻ khi ăn.&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">B&aacute;nh ăn m&aacute;t ngon hơn so với khi ăn n&oacute;ng.</span></span></p>\r\n<p style=\"padding: 0px 0px 20px; border: 0px; font-style: italic; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px !important 0px !important 0px 0px !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">- 1 ổ b&aacute;nh kh&aacute; to n&ecirc;n th&iacute;ch hợp đối với khoảng 2 người ăn.</span></p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">&nbsp;</p>\r\n<p style=\"padding: 0px 0px 20px; border: 0px; font-style: italic; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px !important 0px !important 0px 0px !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">M&oacute;n b&aacute;nh trong b&agrave;i được mua qua 1 tiệm b&aacute;nh online tr&ecirc;n Instagram với gi&aacute; 65k/ổ.&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">Tại H&agrave; Nội v&agrave; S&agrave;i G&ograve;n, bạn đều c&oacute; thể mua b&aacute;nh n&agrave;y tr&ecirc;n Instagram với hashtag #banhmiphomai hoặc t&igrave;m kiếm tr&ecirc;n c&aacute;c trang web về ẩm thực/ qu&aacute;n x&aacute; với từ kho&aacute; \"B&aacute;nh m&igrave; ph&ocirc; mai\". V&agrave; v&igrave; ch&uacute;ng m&igrave;nh vẫn chưa c&oacute; cơ hội thử hết hương vị của c&aacute;c m&oacute;n b&aacute;nh m&igrave; ph&ocirc; mai ở những tiệm kh&aacute;c, thế n&ecirc;n c&aacute;c bạn h&atilde;y thử v&agrave; review cho ch&uacute;ng m&igrave;nh với nh&eacute;!</span></span></p>', '2017-09-28', 4, '59ccb62b8016efun-cake.jpg'),
(5, 'Bánh ngọt (phần 2)', 'Vẫn là bánh ngọt hihi', '<p><em>B&aacute;nh ngọt c&ograve;n rất ngọt nữa.</em></p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">Ch&uacute;ng ta đều đ&atilde; biết, <strong>pancake</strong> l&agrave; thứ b&aacute;nh dễ l&agrave;m \"nhất quả đất\" v&agrave; hương vị mềm ngọt của n&oacute; cũng rất dễ chiều l&ograve;ng thực kh&aacute;ch. Tuy nhi&ecirc;n, bạn đ&atilde; bao giờ được thử 1 phi&ecirc;n bản kh&aacute;c, cao cấp hơn, hấp dẫn hơn của pancake khi được kết hợp với c&ocirc;ng thức b&aacute;nh tiramisu của &Yacute; chưa? Nếu chưa th&igrave; chắc chắn phải thử ngay nh&eacute;, bởi đ&acirc;y sẽ l&agrave; trải nghiệm ẩm thực với sự ho&agrave; quyện hương vị, vừa thơm b&eacute;o, vừa mềm xốp, lại vừa ngọt ng&agrave;o xen ch&uacute;t nhằng nhặng đắng thực sự khiến bạn m&ecirc; mẩn đấy.</p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">C&ograve;n chờ g&igrave; m&agrave; kh&ocirc;ng bắt tay v&agrave;o l&agrave;m ngay th&ocirc;i!</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: SFD-Bold; vertical-align: baseline; box-sizing: border-box;\">Nguy&ecirc;n liệu:</span></p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: SFD-Bold; vertical-align: baseline; box-sizing: border-box;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">Phần b&aacute;nh:</em></span></p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 1 l&ograve;ng đỏ trứng</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 30g ph&ocirc; mai Mascarpone</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 8g đường c&aacute;t</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 15g bột m&igrave;</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 2.5g bột nở</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 2 l&ograve;ng trắng trứng</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 15g đường c&aacute;t</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: SFD-Bold; vertical-align: baseline; box-sizing: border-box;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\">Sốt cafe:</em></span></p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 15g cafe đen ho&agrave; tan</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 15g đường</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 50ml nước s&ocirc;i</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\"><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; box-sizing: border-box;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: SFD-Bold; vertical-align: baseline; box-sizing: border-box;\">Phần kem v&agrave; topping:</span></em></p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 30ml kem tươi</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 20g pho m&aacute;t Mascarpone</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 5g đường</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- Bột cacao</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- L&aacute; bạc h&agrave;</p>\r\n<p>&nbsp;</p>', '2017-09-28', 4, '59ccb65c7a444mini-caramel.jpg'),
(6, 'Bánh ngọt (phần 3)', 'Vẫn bánh ngọt ahihi', '<p>B&aacute;nh ngọt c&ograve;n c&oacute; khi l&agrave; b&aacute;nh quy, bởi v&igrave; n&oacute; cũng ngọt.</p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">Khoai lang vốn l&agrave; một thứ nguy&ecirc;n liệu b&igrave;nh dị, v&ocirc; c&ugrave;ng quen thuộc với ch&uacute;ng ta nhưng ai m&agrave; nghĩ được c&oacute; thể d&ugrave;ng n&oacute; để l&agrave;m b&aacute;nh ngọt đ&uacute;ng kh&ocirc;ng n&agrave;o? Thế m&agrave; c&oacute; đấy nh&eacute;. Với c&ocirc;ng thức b&aacute;nh ngọt khoai lang được giới thiệu ng&agrave;y h&ocirc;m nay, ch&uacute;ng m&igrave;nh sẽ c&oacute; được những ly b&aacute;nh đẹp như bếp b&aacute;nh xịn lu&ocirc;n.</p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">Chưa hết đ&acirc;u nh&eacute;, sự kết hợp của khoai lang, hương vị của m&oacute;n b&aacute;nh ngọt n&agrave;y sẽ v&ocirc; c&ugrave;ng đặc biệt, vừa thơm vừa ngọt, thoạt tưởng l&agrave; b&aacute;nh &Acirc;u nhưng lại phảng phất n&eacute;t &Aacute; rất h&agrave;i ho&agrave;, hấp dẫn đấy.</p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">C&ograve;n chờ g&igrave; m&agrave; kh&ocirc;ng bắt tay v&agrave;o l&agrave;m ngay th&ocirc;i!</p>\r\n<p>&nbsp;</p>', '2017-09-28', 4, '59ccb68ace9f3biscuit-cake.jpg'),
(7, 'Bánh ngọt (phần cuối)', 'He he bánh ngọt', '<p style=\"padding-left: 30px;\">Nhiều người kh&ocirc;ng đồng &yacute; coi b&aacute;nh quy l&agrave; <strong>b&aacute;nh ngọt</strong>, chỉ ngọt th&igrave; chưa đủ l&agrave;m <em>b&aacute;nh ngọt</em>, c&ograve;n cần mềm nữa.</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: SFD-Bold; vertical-align: baseline; box-sizing: border-box;\">Nguy&ecirc;n liệu:</span></p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 80g đậu phụ non</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 100g kem ph&ocirc; mai (cream cheese)</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 50g sữa chua kh&ocirc;ng đường</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 80g sữa kem</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 50g đường bột</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 15ml nước cốt chanh</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 50g b&aacute;nh quy, gi&atilde; nhuyễn</p>\r\n<p style=\"padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased; text-align: justify; background-color: #fffbf1; margin: 15px 0px !important;\">- 20g bơ nhạt đun chảy</p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">Đậu phụ vốn l&agrave; m&oacute;n ăn dễ g&acirc;y nghiện bởi hương vị thanh tao, mềm mịn đầy hấp dẫn. Trong khi đ&oacute;, cheesecake, m&oacute;n b&aacute;nh &Acirc;u nổi danh to&agrave;n thế giới lại chinh phục c&aacute;c thực kh&aacute;c bằng sự thơm b&eacute;o v&agrave; kết cấu mịn đặc đặc trưng của m&igrave;nh. Sẽ ra sao nếu ta sử dụng đậu phụ để l&agrave;m b&aacute;nh&nbsp;cheesecake?</p>\r\n<p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 17px; line-height: 25px; font-family: \'Times New Roman\', Georgia, serif; vertical-align: baseline; box-sizing: border-box; color: #222222; -webkit-font-smoothing: subpixel-antialiased;\">Ngo&agrave;i kết cấu mịn mượt đặc trưng, khi kết hợp đậu phụ c&ugrave;ng kem ph&ocirc; mai v&agrave; c&aacute;c nguy&ecirc;n liệu kh&aacute;c, hương vị m&oacute;n b&aacute;nh cheesecake của ch&uacute;ng ta trở n&ecirc;n th&uacute; vị v&agrave; mới mẻ hơn nhiều đ&oacute;.</p>', '2017-09-28', 4, '59ccb6dc231b7biscuit-whirls.jpg');
INSERT INTO `posts` (`post_id`, `post_title`, `post_summary`, `post_content`, `post_date_created`, `user_id`, `post_image`) VALUES
(8, 'Chè kho', 'Cách nấu chè kho', '<h2 style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 24px; vertical-align: baseline; font-family: Georgia, sans-serif; color: #141823; font-weight: normal; line-height: 1.067em; background-color: #f9f9f9; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Dụng cụ nấu ch&egrave; kho</strong></h2>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Nồi.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Xửng hấp.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; M&aacute;y xay sinh tố.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; R&acirc;y.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Nồi.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Đũa khuấy.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Muỗng.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Khu&ocirc;n b&aacute;nh (n&ecirc;n d&ugrave;ng khu&ocirc;n b&aacute;nh trung thu để c&oacute; tạo h&igrave;nh nh&eacute;).</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9;\">&nbsp;</p>\r\n<h2 style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 24px; vertical-align: baseline; font-family: Georgia, sans-serif; color: #141823; font-weight: normal; line-height: 1.067em; background-color: #f9f9f9; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">C&aacute;ch nấu ch&egrave; kho</strong></h2>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Bước 1:</strong></p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Đậu xanh rửa sạch, ng&acirc;m trong nước khoảng 4 tiếng cho mềm, sau đ&oacute; cho v&agrave;o xứng hấp, hấp ch&iacute;n.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><a style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: #f65c19; text-decoration-line: none;\" href=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-2-Copy.jpg\"><img class=\"aligncenter wp-image-23290 size-full\" style=\"margin: 0px auto 15px; padding: 0px; border: 0px; vertical-align: bottom; max-width: 100%; height: auto; text-align: center; display: block;\" src=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-2-Copy.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-2-Copy.jpg 550w, http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-2-Copy-300x225.jpg 300w\" alt=\"cach nau che kho deo thom, ngot lim 2 (Copy)\" width=\"550\" height=\"412\" /></a></p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Lưu &yacute;:</strong>&nbsp;để đậu xanh thơm hương l&aacute; dứa, bạn cho 3 chiếc l&aacute; dứa v&agrave;o nồi nước ph&iacute;a&nbsp;dưới xửng hấp nh&eacute;!</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Bước 2:</strong></p>\r\n<div class=\"googlepublisherpluginad\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: center; width: 828px; height: auto; clear: none;\">&nbsp;</div>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Khi đậu xanh đ&atilde; ch&iacute;n mềm th&igrave; cho v&agrave;o m&aacute;y xay c&ugrave;ng một ch&uacute;t nước, xay nhuyễn rồi lọc qua r&acirc;y để đậu xanh được nhuyễn mịn.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><a style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: #f65c19; text-decoration-line: none;\" href=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-10.jpg\"><img class=\"aligncenter wp-image-23298 size-full\" style=\"margin: 0px auto 15px; padding: 0px; border: 0px; vertical-align: bottom; max-width: 100%; height: auto; text-align: center; display: block;\" src=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-10.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-10.jpg 550w, http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-10-300x199.jpg 300w\" alt=\"cach nau che kho deo thom, ngot lim 10\" width=\"550\" height=\"365\" /></a></p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Bước 3:</strong></p>\r\n<div class=\"googlepublisherpluginad\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: center; width: 828px; height: auto; clear: none;\">&nbsp;</div>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Cho đậu xanh đ&atilde; lọc qua r&acirc;y v&agrave; đường v&agrave;o một c&aacute;i nồi tr&ecirc;n bếp, s&ecirc;n nhỏ lửa cho đến khi hỗn hợp bắt đầu s&aacute;nh lại th&igrave; cho th&ecirc;m nước cốt dừa, dầu m&egrave; v&agrave;o khuấy c&ugrave;ng. S&ecirc;n cho đến khi ch&egrave; đặc lại, khuấy thấy nặng tay th&igrave; tắt bếp.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><a style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: #f65c19; text-decoration-line: none;\" href=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-7-Copy.jpg\"><img class=\"aligncenter wp-image-23295 size-full\" style=\"margin: 0px auto 15px; padding: 0px; border: 0px; vertical-align: bottom; max-width: 100%; height: auto; text-align: center; display: block;\" src=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-7-Copy.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-7-Copy.jpg 550w, http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-7-Copy-300x225.jpg 300w\" alt=\"cach nau che kho deo thom, ngot lim 7 (Copy)\" width=\"550\" height=\"412\" /></a></p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Lưu &yacute;:</strong>&nbsp;Nhớ phải khuấy li&ecirc;n tục v&agrave; đều tay để tr&aacute;nh cho ch&egrave; ch&aacute;y ở đ&aacute;y nồi nh&eacute;!</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Bước 4:</strong></p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; M&uacute;c ch&egrave; v&agrave;o khu&ocirc;n, &eacute;p chắt để tạo h&igrave;nh cho ch&egrave;.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&ndash; Hoặc nếu kh&ocirc;ng c&oacute; khu&ocirc;n, bạn cũng c&oacute; thể d&ugrave;ng một chiếc đĩa hoặc b&aacute;t s&acirc;u l&ograve;ng, ấn chặt để tạo h&igrave;nh.</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">&nbsp;&ndash; Rắc th&ecirc;m một ch&uacute;t m&egrave; trắng rang l&ecirc;n mặt (nếu th&iacute;ch).</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\"><a style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; color: #f65c19; text-decoration-line: none;\" href=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-8-Copy.jpg\"><img class=\"aligncenter wp-image-23296 size-full\" style=\"margin: 0px auto 15px; padding: 0px; border: 0px; vertical-align: bottom; max-width: 100%; height: auto; text-align: center; display: block;\" src=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-8-Copy.jpg\" sizes=\"(max-width: 550px) 100vw, 550px\" srcset=\"http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-8-Copy.jpg 550w, http://lambanh365.com/wp-content/uploads/2015/07/cach-nau-che-kho-deo-thom-ngot-lim-8-Copy-300x263.jpg 300w\" alt=\"cach nau che kho deo thom, ngot lim 8 (Copy)\" width=\"550\" height=\"483\" /></a></p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">C&aacute;ch l&agrave;m hết sức đơn giản, nhưng bạn lại c&oacute; ngay cho m&igrave;nh một đĩa<strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">&nbsp;ch&egrave; kho</strong>&nbsp;dẻo thơm, ngon tuyệt vời rồi đấy!</p>\r\n<p style=\"margin: 0px 0px 1.067em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; -webkit-hyphenate-character: \'‐\'; orphans: 3; widows: 3; line-height: 25px; color: #141823; font-family: Times; background-color: #f9f9f9; text-align: justify;\">Ch&uacute;c c&aacute;c bạn th&agrave;nh c&ocirc;ng với&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">c&aacute;ch nấu ch&egrave; kho dẻo thơm, ngọt lịm</strong>&nbsp;n&agrave;y nh&eacute;!</p>', '2017-10-03', 4, '59d32bcb32194che kho.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` tinyint(4) DEFAULT '0',
  `user_job` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_birthday` date DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `user_role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_fullname`, `user_gender`, `user_job`, `user_address`, `user_birthday`, `user_phone`, `user_avatar`, `user_role`) VALUES
(4, 'cuong@gmail.com', '$2a$10$GphGwxlYvoBmfPMC2w.OJOtdZVSMduGZMU7Pr4aER6JabISmBXl7i', 'An Binh', 1, 'Student', 'Bacninh', '1993-04-05', '0123456789', '59c8d356129fctao.jpg', 0),
(6, 'cuongpv@gmail.com', '$2a$10$QAs2KCP17ihefDbgagE41u85uIXZS838XRNYA7IpFdbItmMz.J.hm', 'Pham Cuong', NULL, '', '', NULL, NULL, 'default.png', 0),
(8, 'rainbow.bkhn1@gmail.com', '$2a$10$DB16y1lzr/hBwHRQ92QnKe2G..Izqyty.HJuQlJ9t3h3GIYb17XoK', 'Cường Phạm Văn', 1, 'Dev', 'Bac Ninh', '1993-04-05', '01632517205', 'default.png', 1),
(12, 'yummy2@gmail.com', '$2a$10$paooFbWqHA3wr2/PIB2WPOtmIG.T/a3uNLtteL8I9koEXkNYwAkv6', 'Cuong', 1, '', '', NULL, '0123456789', 'default.png', 1),
(13, 'yummy@fruit.com', '$2a$10$xwIQ8txGSQcU0y/RRcfju.B5ZXMCC5cdrWgPmCWsyVxz1nGaj3rlm', 'Cuong', 0, '', '', NULL, NULL, 'default.png', 1),
(14, 'kien@gmail.com', '$2a$10$.KKJiNS3P1xRu6R.MUvyhefn.m7kdvAh1jnunb/vKw5.IYlyES2i2', 'kien', 1, 'Technology', 'Ha Dong - Ha Noi', '0000-00-00', '0974713757asd', 'default.png', 1),
(15, 'nguyenhuyenk56a2@gmail.com', '$2a$10$M/kYddVTq2JC.MTzvr5ZF.ttBZoBwCJgBSJFWV7t8snZK188HBiIm', 'Huyen', 0, '', '', NULL, NULL, 'default.png', 1),
(16, 'cuong123@gmail.com', '$2a$10$6yy6cgDXNZ/veimPBbonzu6xKmrgKmu6XoP4qUROso4KvE/fEt9Iu', 'Pham Van Cuong', 1, 'studenet', 'hanoi', '2017-10-13', '0123456789', '59d5d1844b175chocolate-brownies.jpg', 1),
(17, 's-usui@tribalmedia.co.jp', '$2a$10$AT8OisLbN5bAn/B5JwsFAu1bKl.ntB/.Jatr65/OYwuH5pVwy30T6', 'AAAAAA', 0, '', '', '2017-10-05', '12345678912', '59d5d63b9fde7duahau.jpeg', 1),
(18, 'yummy@123.com', '$2a$10$g7jG7t9jytAnlVdZM.eZf.bB9ozkh4GgncJtoBv9X4rM9U1btfXPC', 'cuong', 0, '', '', NULL, NULL, 'default.png', 1),
(19, 'test@test.com', '$2a$10$tOXVttWBMjaNsIsERakFYObyGI89bELlUyPp5cEmzGo3XO85DG7Nq', 'tset2', 0, '', '', NULL, NULL, 'default.png', 1),
(20, 'cuong@test.com', '$2a$10$yTIxu96KXW4oIHUVQ.780urZokP4329.FMozlhamv7uFHiRoRSLBS', 'Cuong', 1, '', '', NULL, '0123456789', 'default.png', 1),
(21, 'cuong2@test.com', '$2a$10$1uRP4EFUXm2VWWPQk0oRKuXHSFUQlNIqyops0CkGEfLCM0gGr42iO', 'Cuong', 1, '', '', NULL, '0123456789', 'default.png', 1),
(22, 'lequynam@gmail.com', '$2a$10$nbTe402/R7TN40EuSqoTD.8mnLNmwBfnq241I.OIvi70aqN3CaTk.', 'le quy nam', 0, '', '', NULL, '12334567890', '59daf0c876b29Screen Shot 2017-08-23 at 11.08.31 AM.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`item_id`);

--
-- Chỉ mục cho bảng `have_items`
--
ALTER TABLE `have_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`item_id`);

--
-- Chỉ mục cho bảng `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `keyorder` (`user_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `keypost` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT cho bảng `have_items`
--
ALTER TABLE `have_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT cho bảng `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `keyorder` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `keypost` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
