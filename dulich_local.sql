-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 08:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dulich_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `taikhoan`, `matkhau`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `baiviet_diadiem`
--

CREATE TABLE `baiviet_diadiem` (
  `baiviet_diadiem_id` int(11) NOT NULL,
  `diadiem_id` int(11) NOT NULL,
  `baiviet_diadiem_ten` varchar(150) NOT NULL,
  `baiviet_diadiem_anh` varchar(100) NOT NULL,
  `baiviet_diadiem_noidung` text NOT NULL,
  `baiviet_diadiem_ngaytao` date NOT NULL,
  `baiviet_diadiem_hot` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baiviet_diadiem`
--

INSERT INTO `baiviet_diadiem` (`baiviet_diadiem_id`, `diadiem_id`, `baiviet_diadiem_ten`, `baiviet_diadiem_anh`, `baiviet_diadiem_noidung`, `baiviet_diadiem_ngaytao`, `baiviet_diadiem_hot`) VALUES
(1, 1, 'Pháo hoa lung linh trên bầu trời TPHCM đêm 30/412', '290045cc875fc848b01.15535636.jpg', '<p>(D&acirc;n tr&iacute;)&nbsp;- H&agrave;ng ng&agrave;n người d&acirc;n S&agrave;i G&ograve;n c&oacute; mặt tại khu To&agrave; nh&agrave; Landmark 81 ven s&ocirc;ng S&agrave;i G&ograve;n đ&atilde; trầm trồ, vỗ tay khi chi&ecirc;m ngưỡng m&agrave;n bắn ph&aacute;o hoa kỷ niệm 44 giải ph&oacute;ng miền Nam thống nhất đất nước.&nbsp;</p>\r\n<p>(D&acirc;n tr&iacute;)&nbsp;- H&agrave;ng ng&agrave;n người d&acirc;n S&agrave;i G&ograve;n c&oacute; mặt tại khu To&agrave; nh&agrave; Landmark 81 ven s&ocirc;ng S&agrave;i G&ograve;n đ&atilde; trầm trồ, vỗ tay khi chi&ecirc;m ngưỡng m&agrave;n bắn ph&aacute;o hoa kỷ niệm 44 giải ph&oacute;ng miền Nam thống nhất đất nước.&nbsp;</p>', '2019-04-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `binhluan_kieu` varchar(50) NOT NULL COMMENT 'kiểu tin tức | địa điểm | câu chuyện',
  `binhluan_tacgia` varchar(100) NOT NULL,
  `binhluan_email` varchar(100) NOT NULL,
  `binhluan_noidung` text NOT NULL,
  `binhluan_ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`binhluan_id`, `foreign_id`, `binhluan_kieu`, `binhluan_tacgia`, `binhluan_email`, `binhluan_noidung`, `binhluan_ngay`) VALUES
(1, 9, 'tintuc', 'Nguyen Hoang Tuyen', 'hoangtuyen1106@gmail.com', 'hello', '2019-04-25'),
(2, 1, 'tintuc', 'Nguyen Hoang Tuyen', 'hoangtuyen1106@gmail.com', 'hello everybody', '2019-04-25'),
(3, 1, 'tintuc', 'Nguyen Hoang Tuyen', 'hoangtuyen1106@gmail.com', 'hello everybody', '2019-04-25'),
(4, 10, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 1231234', '2019-05-01'),
(6, 13, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(7, 10, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(8, 10, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(9, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(10, 31, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(11, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(12, 35, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(13, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(15, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `cauchuyen`
--

CREATE TABLE `cauchuyen` (
  `cauchuyen_id` int(11) NOT NULL,
  `cauchuyen_tieude` varchar(120) NOT NULL,
  `cauchuyen_tacgia` varchar(100) NOT NULL,
  `cauchuyen_noidung` text NOT NULL,
  `cauchuyen_ngay` date NOT NULL,
  `cauchuyen_trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cauchuyen`
--

INSERT INTO `cauchuyen` (`cauchuyen_id`, `cauchuyen_tieude`, `cauchuyen_tacgia`, `cauchuyen_noidung`, `cauchuyen_ngay`, `cauchuyen_trangthai`) VALUES
(30, 'aladin và con cá vàng12345', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 0),
(31, 'aladin và con cá vàng1234', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 1),
(33, 'aladin và con cá vàng12', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 0),
(35, 'aladin và con cá vàng', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `danhmuc_id` int(11) NOT NULL,
  `danhmuc_ten` varchar(100) NOT NULL,
  `danhmuc_vitri` int(11) NOT NULL,
  `danhmuc_ngaytao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`danhmuc_id`, `danhmuc_ten`, `danhmuc_vitri`, `danhmuc_ngaytao`) VALUES
(15, 'Đi phượt', 3, '2019-03-29'),
(16, 'Đồ ăn & Đồ uống', 1, '2019-03-31'),
(19, 'Phong cách cuộc sống', 1, '2019-04-29'),
(20, 'Công việc', 3, '2019-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `diadiem`
--

CREATE TABLE `diadiem` (
  `diadiem_id` int(11) NOT NULL,
  `diadiem_ten` varchar(150) NOT NULL,
  `diadiem_anh` varchar(100) NOT NULL,
  `diadiem_ngaytao` date NOT NULL,
  `diadiem_vitri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diadiem`
--

INSERT INTO `diadiem` (`diadiem_id`, `diadiem_ten`, `diadiem_anh`, `diadiem_ngaytao`, `diadiem_vitri`) VALUES
(1, 'Đà nẵng', '100395cc7c548a871e8.20881435.jpg', '2019-04-30', 1),
(2, 'Sapa', '127055cc911d025e847.74053941.jpg', '2019-05-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `tintuc_id` int(11) NOT NULL,
  `danhmuc_id` int(11) DEFAULT NULL,
  `tintuc_ten` varchar(150) DEFAULT NULL,
  `tintuc_mota` text NOT NULL,
  `tintuc_noidung` text,
  `tintuc_anh` varchar(100) DEFAULT NULL,
  `tintuc_ngaytao` date DEFAULT NULL,
  `tintuc_hot` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`tintuc_id`, `danhmuc_id`, `tintuc_ten`, `tintuc_mota`, `tintuc_noidung`, `tintuc_anh`, `tintuc_ngaytao`, `tintuc_hot`) VALUES
(9, 15, 'How can we sing about love?112', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>', '95365cbf386c835d30.90126118.png', '2019-04-04', 0),
(12, 17, 'How can we sing about love?99', '', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '95325cbf3028957352.60626222.png', '2019-04-04', 1),
(13, 18, 'Chủ tịch TPHCM thông tin về nhân sự lãnh đạo', '', '<p>(D&acirc;n tr&iacute;)&nbsp;- Theo Chủ tịch UBND TPHCM Nguyễn Th&agrave;nh Phong, kỳ họp bất thường HĐND TP sắp tới sẽ bầu nh&acirc;n sự HĐND TP v&agrave; UBND TP. Hiện, TP đ&atilde; c&oacute; nh&acirc;n sự bầu 2 Ph&oacute; Chủ tịch UBND TP phụ tr&aacute;ch nội ch&iacute;nh, kinh tế v&agrave; đang chờ &yacute; kiến Trung ương; sắp tới sẽ bổ sung Ph&oacute; Chủ tịch phụ tr&aacute;ch văn h&oacute;a &ndash; x&atilde; hội.&nbsp;</p>', '322565ca626a7b47c49.46948230.jpg', '2019-04-04', 1),
(14, 15, 'tuyen abcd', '', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&nbsp;</p>', '91625ca9bfb8ece7c3.14980313.png', '2019-04-07', 1),
(15, 18, 'efgsdfg', '', '<p>sdfgsdfg</p>', '164625cbf38e24eb026.80834117.png', '2019-04-23', 1),
(18, 19, 'How can we sing about love?91', '', '<p>sdfgsd</p>', NULL, '2019-04-29', 0),
(19, 15, 'How can we sing about love?8888', '', '<p>uuuuuuu</p>', '81845cc70affb60b19.57327850.png', '2019-04-29', 1),
(20, 15, 'How can we sing about love?8888', '', '<p>uuuuuuu</p>', '237615cc70b2759e318.48051224.png', '2019-04-29', 0),
(21, 15, 'How can we sing about love?8888', '', '<p>uuuuuuu</p>', '155795cc70be0991662.21987458.png', '2019-04-29', 0),
(22, 15, 'How can we sing about love?88881121', '', '<p>uuuuuuu</p>', NULL, '2019-04-29', 0),
(23, 15, 'How can we sing about love?88881121', '', '<p>uuuuuuu</p>', NULL, '2019-04-29', 0),
(24, 19, 'How can we sing about love?99123', '', '<p>saaaaaaaaaaaaaaaaaa</p>', '70005cc70d3359dc13.19740101.png', '2019-04-29', 1),
(25, 19, 'How can we sing about love?9912356789', '', '<p>saaaaaaaaaaaaaaaaaa</p>', NULL, '2019-04-29', 0),
(26, 19, 'How can we sing about love?9912356789', '', '<p>saaaaaaaaaaaaaaaaaa</p>', NULL, '2019-04-29', 0),
(27, 19, 'How can we sing about love?991235678', '', '<p>saaaaaaaaaaaaaaaaaa</p>', '213685cc70d7296c590.61370698.png', '2019-04-29', 0),
(29, 19, 'How can we sing about love?99123567', '', '<p>saaaaaaaaaaaaaaaaaa</p>', '93935cc70d8bc7a033.74365426.png', '2019-04-29', 0),
(30, 19, 'How can we sing about love?1123', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 1),
(31, 19, 'How can we sing about love?1123789', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 0),
(36, 19, 'How can we sing about love?11237891211111', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 0),
(37, 19, 'How can we sing about love?11237891211111', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 1),
(38, 15, '5 Nhà xe limousine đi Đà Lạt, đặt vé limousine Sài Gòn Đà Lạt nhanh nhất', '<p>Bạn đang t&igrave;m kiếm cho m&igrave;nh xe Limousine đi Đ&agrave; Lạt nhưng vẫn chưa c&oacute; c&acirc;u trả lời h&agrave;i l&ograve;ng cho ch&iacute;nh bản th&acirc;n m&igrave;nh. C&ugrave;ng&nbsp; t&igrave;m kiếm c&acirc;u trả lời xe limousine S&agrave;i G&ograve;n Đ&agrave; Lạt ngay trong b&agrave;i viết dưới đ&acirc;y bạn nh&eacute;!sdfgd</p>', '<p>Một trong những xe limousine đi Đ&agrave; Lạt chất lượng được y&ecirc;u th&iacute;ch nhất hiện nay đ&oacute; ch&iacute;nh l&agrave; Minh Tr&iacute;. H&atilde;ng xe n&agrave;y được đưa v&agrave;o hoạt động cuối năm 2016 với hệ thống xe ngoại nhập cao cấp. Đ&acirc;y l&agrave; h&atilde;ng xe được đ&aacute;nh gi&aacute; cao trong những năm gần đầy v&igrave; đơn vị sở hữu d&ograve;ng xe VIP c&oacute; 9 ghế ngồi massage thượng lưu. Ri&ecirc;ng 4 h&agrave;ng ghế trước được bọc da sang trọng, người d&ugrave;ng c&oacute; thể xoay, ng&atilde;, trượt một c&aacute;ch thoải m&aacute;i. Xe c&ograve;n c&oacute; 3 h&agrave;ng ghế sau được gập th&agrave;nh giường, mang lại cảm gi&aacute;c sang trọng v&agrave; thoải m&aacute;i. Do đ&oacute;, đ&acirc;y được xem l&agrave; một trong số &iacute;t những nh&agrave; xe limousine giường nằm đi Đ&agrave; Lạt. Ngo&agrave;i ra, kh&aacute;ch h&agrave;ng sẽ cảm thấy rất h&agrave;i l&ograve;ng về hệ thống nội thất, đ&egrave;n chiếu s&aacute;ng cũng như tiện nghi hấp dẫn như tivi LCD,wifi, điều h&ograve;a, hệ thống sạc điện thoại</p>', '204935cf940534840e3.01326185.jpg', '2019-06-06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `baiviet_diadiem`
--
ALTER TABLE `baiviet_diadiem`
  ADD PRIMARY KEY (`baiviet_diadiem_id`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`binhluan_id`);

--
-- Indexes for table `cauchuyen`
--
ALTER TABLE `cauchuyen`
  ADD PRIMARY KEY (`cauchuyen_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Indexes for table `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`diadiem_id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tintuc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baiviet_diadiem`
--
ALTER TABLE `baiviet_diadiem`
  MODIFY `baiviet_diadiem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cauchuyen`
--
ALTER TABLE `cauchuyen`
  MODIFY `cauchuyen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `danhmuc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `diadiem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tintuc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
