-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 07:48 AM
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
  `baiviet_diadiem_mota` text NOT NULL,
  `baiviet_diadiem_anh` varchar(100) NOT NULL,
  `baiviet_diadiem_noidung` text NOT NULL,
  `baiviet_diadiem_ngaytao` date NOT NULL,
  `baiviet_diadiem_hot` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baiviet_diadiem`
--

INSERT INTO `baiviet_diadiem` (`baiviet_diadiem_id`, `diadiem_id`, `baiviet_diadiem_ten`, `baiviet_diadiem_mota`, `baiviet_diadiem_anh`, `baiviet_diadiem_noidung`, `baiviet_diadiem_ngaytao`, `baiviet_diadiem_hot`) VALUES
(1, 1, 'Pháo hoa lung linh trên bầu trời TPHCM đêm 30/412', '<p>(D&acirc;n tr&iacute;)&nbsp;- H&agrave;ng ng&agrave;n người d&acirc;n S&agrave;i G&ograve;n c&oacute; mặt tại khu To&agrave; nh&agrave; Landmark 81 ven s&ocirc;ng S&agrave;i G&ograve;n đ&atilde; trầm trồ, vỗ tay khi chi&ecirc;m ngưỡng m&agrave;n bắn ph&aacute;o hoa kỷ niệm 44 giải ph&oacute;ng miền Nam thống nhất đất nước.&nbsp;</p>', '290045cc875fc848b01.15535636.jpg', '<p>(D&acirc;n tr&iacute;)&nbsp;- H&agrave;ng ng&agrave;n người d&acirc;n S&agrave;i G&ograve;n c&oacute; mặt tại khu To&agrave; nh&agrave; Landmark 81 ven s&ocirc;ng S&agrave;i G&ograve;n đ&atilde; trầm trồ, vỗ tay khi chi&ecirc;m ngưỡng m&agrave;n bắn ph&aacute;o hoa kỷ niệm 44 giải ph&oacute;ng miền Nam thống nhất đất nước.&nbsp;</p>\r\n<p>(D&acirc;n tr&iacute;)&nbsp;- H&agrave;ng ng&agrave;n người d&acirc;n S&agrave;i G&ograve;n c&oacute; mặt tại khu To&agrave; nh&agrave; Landmark 81 ven s&ocirc;ng S&agrave;i G&ograve;n đ&atilde; trầm trồ, vỗ tay khi chi&ecirc;m ngưỡng m&agrave;n bắn ph&aacute;o hoa kỷ niệm 44 giải ph&oacute;ng miền Nam thống nhất đất nước.&nbsp;</p>', '2019-04-30', 0),
(2, 1, 'Công ty Trung Quốc chế tạo bộ phận quan trọng của tiêm kích tàng hình F-35', '<p><strong>Một c&ocirc;ng ty thuộc sở hữu của Trung Quốc đang chế tạo bảng mạch cho c&aacute;c m&aacute;y bay chiến đấu hiện đại F-35 m&agrave; Mỹ v&agrave; Anh đều sử dụng, Bộ Quốc ph&ograve;ng Anh tiết lộ. Th&ocirc;ng tin n&agrave;y diễn ra giữa l&uacute;c Washington lo ngại Bắc Kinh đ&aacute;nh cắp c&aacute;c c&ocirc;ng nghệ chủ chốt của Mỹ.</strong></p>', '214805d0525cdb9d660.07572076.jpg', '<p>Theo một tuy&ecirc;n bố do Bộ Quốc ph&ograve;ng Anh ph&aacute;t đi h&ocirc;m 14/6, c&ocirc;ng ty Exception PCB đ&oacute;ng tại Gloucestershire, t&acirc;y nam nước Anh, &ldquo;kiểm so&aacute;t nhiều t&iacute;nh năng chủ chốt của m&aacute;y bay chiến đấu F-35, trong đ&oacute; c&oacute; c&aacute;c hệ thống động cơ, &aacute;nh s&aacute;ng, nhi&ecirc;n liệu v&agrave; định vị&rdquo;.</p>\r\n<p>C&ocirc;ng ty Shenzhen Fastprint c&oacute; trụ sở tại Trung Quốc đ&atilde; mua lại c&ocirc;ng ty Exception PCB của Anh v&agrave;o năm 2013.</p>\r\n<p>Mặc d&ugrave; Bộ Quốc ph&ograve;ng Anh vẫn khẳng định Exception PCB kh&ocirc;ng g&acirc;y ra nguy cơ n&agrave;o đối với chuỗi cung ứng của F-35 v&agrave; rằng đ&acirc;y l&agrave; một nh&agrave; sản xuất c&oacute; tiếng về bảng mạch cho ng&agrave;nh c&ocirc;ng nghiệp quốc ph&ograve;ng, nhưng một số người vẫn l&ecirc;n tiếng b&agrave;y tỏ lo ngại.</p>\r\n<p>&Ocirc;ng Gerald Howarth, một cựu quan chức quốc ph&ograve;ng của đảng Bảo thủ Anh, tỏ ra lo ngại rằng c&ocirc;ng ty thuộc sở hữu của Trung Quốc đang chế tạo c&aacute;c bộ phận cho một chương tr&igrave;nh b&iacute; mật của Mỹ, viện dẫn những lo ngại về t&iacute;nh cạnh tranh v&agrave; h&agrave;nh vi gi&aacute;n điệp của Trung Quốc.</p>\r\n<p>&ldquo;Ch&uacute;ng t&ocirc;i ho&agrave;n to&agrave;n kh&ocirc;ng biết g&igrave; về vai tr&ograve; của Trung Quốc v&agrave; chỉ giờ đ&acirc;y mọi người mới bắt đầu thức tỉnh&rdquo;, &ocirc;ng Howarth n&oacute;i.</p>\r\n<p>Tuy nhi&ecirc;n, theo b&aacute;o Telegraph của Anh, hiện kh&ocirc;ng c&oacute; dấu hiệu n&agrave;o cho thấy Exception PCB hay c&ocirc;ng ty mẹ Shenzhen Fastprint đ&atilde; l&agrave;m g&igrave; sai tr&aacute;i.</p>\r\n<p>Th&ocirc;ng tin tr&ecirc;n được tiết lộ sau những c&aacute;o buộc rằng Trung Quốc đ&atilde; cố gắng đ&aacute;nh cắp c&aacute;c chi tiết về chương tr&igrave;nh F-35 trị gi&aacute; nhiều tỷ USD, do tập đo&agrave;n quốc ph&ograve;ng Lockheed Martin của Mỹ đứng đầu.</p>\r\n<p>Được trang bị c&aacute;c cảm biến tối t&acirc;n v&agrave; c&aacute;c c&ocirc;ng nghệ kh&aacute;c, m&aacute;y bay chiến đấu t&agrave;ng h&igrave;nh F-25 dự kiến sẽ trở th&agrave;nh xương sống của qu&acirc;n đội Anh, Mỹ v&agrave; c&aacute;c lực lượng hải qu&acirc;n v&agrave; kh&ocirc;ng qu&acirc;n c&aacute;c nước đồng minh trong những thập ni&ecirc;n tới.</p>\r\n<p>H&atilde;ng Lockheed Martin cho hay h&atilde;ng kh&ocirc;ng hay biết bất kỳ một nh&agrave; cung cấp n&agrave;o kh&aacute;c thuộc sở hữu của Trung Quốc trong chương tr&igrave;nh F-35 v&agrave;o thời điểm n&agrave;y.</p>\r\n<p>Trong một ấn bản hồi th&aacute;ng 3, Bộ Quốc ph&ograve;ng Anh c&ograve;n ca ngợi Exception PCB l&agrave; một v&iacute; dụ ti&ecirc;u biểu của một c&ocirc;ng ty đ&oacute;ng tại Anh tham gia cung cấp c&aacute;c bộ phận của F-35. Tuy nhi&ecirc;n, t&agrave;i liệu kh&ocirc;ng để cập tới việc c&ocirc;ng ty mẹ đ&oacute;ng tại Trung Quốc đ&atilde; mua lại n&oacute; v&agrave;i năm trước.</p>\r\n<p>V&agrave;o th&aacute;ng 11 năm ngo&aacute;i, một b&agrave;i viết do Bộ Quốc ph&ograve;ng Anh xuất bản n&oacute;i rằng 107 nh&acirc;n vi&ecirc;n của c&ocirc;ng ty &ldquo;chế tạo c&aacute;c bảng mạnh vốn kiểm so&aacute;t c&aacute;c t&iacute;nh năng cơ bản của F-35, bao gồm c&aacute;c hệ thống động cơ, &aacute;nh s&aacute;ng, nhi&ecirc;n liệu v&agrave; định vị&rdquo;. B&agrave;i viết cũng kh&ocirc;ng đề cập tới c&ocirc;ng ty mẹ tại Trung Quốc.</p>\r\n<p>Một điều đ&aacute;ng ch&uacute; &yacute; l&agrave;, Exception PCB kh&ocirc;ng chỉ tham gia sản xuất c&aacute;c bộ phận của F-35 m&agrave; cũng sản xuất c&aacute;c thiết bị cho m&aacute;y bay chiến đấu Eurofighter Typhoon, F-16 của Lockheed Martin, trực thăng Apache.</p>\r\n<p>Về phần m&igrave;nh, Lockheed Martin đ&atilde; &aacute;m chỉ rằng mọi nguy cơ vẫn hiện hữu mặc d&ugrave; tất cả c&aacute;c bộ phận tr&ecirc;n m&aacute;y bay F-35 điều được kiểm tra li&ecirc;n tục ngay ở giai đoạn chế tạo ban đầu.</p>\r\n<div class=\"content-box align-center\">\r\n<p>Th&ocirc;ng tin tr&ecirc;n được tiết lộ giữa l&uacute;c một cuộc tranh c&atilde;i ng&agrave;y c&agrave;ng leo thang giữa Mỹ v&agrave; tập đo&agrave;n c&ocirc;ng ty khổng lồ của Trung Quốc l&agrave; Huawei. Washington c&aacute;o buộc Huawei đ&aacute;nh cắp dữ liệu cơ sở hạ tầng kh&ocirc;ng gian mạng cho ch&iacute;nh phủ Trung Quốc, điều m&agrave; c&ocirc;ng ty c&oacute; trụ sở tại Th&acirc;m Quyến b&aacute;c bỏ mạnh mẽ.</p>\r\n<p>Ch&iacute;nh quyền của Tổng thống Mỹ Donald Trump đ&atilde; ban h&agrave;nh lệnh cấm sử dụng c&ocirc;ng nghệ của Huawei, cấm c&aacute;c c&ocirc;ng ty Mỹ, trong đ&oacute; c&oacute; Google, l&agrave;m ăn với c&ocirc;ng ty Trung Quốc m&agrave; kh&ocirc;ng c&oacute; giấy ph&eacute;p của ch&iacute;nh phủ. Ngo&agrave;i ra, Nh&agrave; Trắng cũng đang cố gắng thuyết phục c&aacute;c đồng minh ch&acirc;u &Acirc;u, trong đ&oacute; c&oacute; Anh, chặn Huawei tham gia x&acirc;y dựng cơ sở hạ tầng mạng 5G. Mỹ đ&atilde; cảnh b&aacute;o về việc c&oacute; thể hạn chế hợp t&aacute;c t&igrave;nh b&aacute;o với bất kỳ quốc gia n&agrave;o cho ph&eacute;p sử dụng thiết bị của Huawei trong c&aacute;c mạng lưới của c&aacute;c nước n&agrave;y.</p>\r\n</div>', '2019-06-16', 1);

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
(1, 15, 'tintuc', 'Nguyen Hoang Tuyen', 'hoangtuyen1106@gmail.com', 'hello', '2019-04-25'),
(2, 1, 'tintuc', 'Nguyen Hoang Tuyen', 'hoangtuyen1106@gmail.com', 'hello everybody', '2019-04-25'),
(3, 1, 'tintuc', 'Nguyen Hoang Tuyen', 'hoangtuyen1106@gmail.com', 'hello everybody', '2019-04-25'),
(4, 15, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 1231234', '2019-05-01'),
(6, 13, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(7, 10, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(8, 10, 'tintuc', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(9, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(10, 31, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(11, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(12, 35, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(13, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(15, 30, 'cauchuyen', 'tuyen', 'hoangtuyen1106@gmail.com', 'aloha 123123', '2019-05-01'),
(16, 15, 'tintuc', 'Tuyen', 'hoangtuyen@gmail.com', '<p>jk,jnk,</p>', '2019-06-13'),
(17, 15, 'tintuc', 'Tuyen', 'hoangtuyen@gmail.com', '<p>Xin Ch&agrave;o cả nh&agrave;</p>', '2019-06-13'),
(18, 15, 'tintuc', 'Tuyen', 'hoangtuyen@gmail.com', '<p>Xin Ch&agrave;o cả nh&agrave;</p>', '2019-06-13'),
(19, 15, 'tintuc', 'Tuyen', 'hoangtuyen@gmail.com', '<p>Xin Ch&agrave;o cả nh&agrave;</p>', '2019-06-13'),
(20, 15, 'tintuc', 'Tuyen', 'hoangtuyen@gmail.com', '<p>Xin Ch&agrave;o cả nh&agrave;</p>', '2019-06-13'),
(21, 30, 'tintuc', 'Tuyen', 'hoangtuyen@gmail.com', '<p>cfbvcxvb</p>', '2019-06-13'),
(22, 15, 'tintuc', 'Tuyen1', 'hoangtuyen@gmail.com', '<p>hello et</p>', '2019-06-13'),
(23, 15, 'tintuc', 'Tuyen1', 'hoangtuyen@gmail.com', '<p>hello et</p>', '2019-06-13'),
(24, 15, 'tintuc', 'Tuyen1', 'hoangtuyen@gmail.com', '<p>hello et</p>', '2019-06-13'),
(25, 15, 'tintuc', 'Tuyen1', 'hoangtuyen@gmail.com', '<p>hello et</p>', '2019-06-13'),
(26, 15, 'tintuc', 'Tuyen1', 'hoangtuyen@gmail.com', '<p>hello et</p>', '2019-06-13'),
(27, 15, 'tintuc', 'Tuyen1', 'hoangtuyen@gmail.com', '<p>hello et</p>', '2019-06-13'),
(28, 15, 'tintuc', 'Tuyen555', 'hoangtuyen@gmail.com', '<p>tttttttttt</p>', '2019-06-13'),
(29, 24, 'tintuc', 'Tuyen', 'hoangtuyen@gmail.com', '<p>sdfgdfg</p>', '2019-06-13'),
(30, 9, 'tintuc', 'ttttt', 'hoangtuyen@gmail.com', '<p>sdfgsdf</p>', '2019-06-13'),
(31, 21, 'tintuc', 'jjjjj', 'hoangtuyen@gmail.com', '<p>fgjfgj</p>', '2019-06-13'),
(32, 9, 'tintuc', 'llllllll', 'hoangtuyen@gmail.com', '<p>hjk</p>', '2019-06-13'),
(33, 2, 'diadiem', 'hú hà', 'abc@gmail.com', '<p>Th&ocirc;ng tin tr&ecirc;n được tiết lộ giữa l&uacute;c một cuộc tranh c&atilde;i ng&agrave;y c&agrave;ng leo thang giữa Mỹ v&agrave; tập đo&agrave;n c&ocirc;ng ty khổng lồ của Trung Quốc l&agrave; Huawei. Washington c&aacute;o buộc Huawei đ&aacute;nh cắp dữ liệu cơ sở hạ tầng kh&ocirc;ng gian mạng cho ch&iacute;nh phủ Trung Quốc, điều m&agrave; c&ocirc;ng ty c&oacute; trụ sở tại Th&acirc;m Quyến b&aacute;c bỏ mạnh mẽ.Th&ocirc;ng tin tr&ecirc;n được tiết lộ giữa l&uacute;c một cuộc tranh c&atilde;i ng&agrave;y c&agrave;ng leo thang giữa Mỹ v&agrave; tập đo&agrave;n c&ocirc;ng ty khổng lồ của Trung Quốc l&agrave; Huawei. Washington c&aacute;o buộc Huawei đ&aacute;nh cắp dữ liệu cơ sở hạ tầng kh&ocirc;ng gian mạng cho ch&iacute;nh phủ Trung Quốc, điều m&agrave; c&ocirc;ng ty c&oacute; trụ sở tại Th&acirc;m Quyến b&aacute;c bỏ mạnh mẽ.Th&ocirc;ng tin tr&ecirc;n được tiết lộ giữa l&uacute;c một cuộc tranh c&atilde;i ng&agrave;y c&agrave;ng leo thang giữa Mỹ v&agrave; tập đo&agrave;n c&ocirc;ng ty khổng lồ của Trung Quốc l&agrave; Huawei. Washington c&aacute;o buộc Huawei đ&aacute;nh cắp dữ liệu cơ sở hạ tầng kh&ocirc;ng gian mạng cho ch&iacute;nh phủ Trung Quốc, điều m&agrave; c&ocirc;ng ty c&oacute; trụ sở tại Th&acirc;m Quyến b&aacute;c bỏ mạnh mẽ.</p>', '2019-06-16'),
(34, 30, 'cauchuyen', 'Tuyen1', 'abc@gmail.com', '<p>ghjfgjgjgjhfg</p>', '2019-06-16');

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
  `cauchuyen_trangthai` tinyint(4) NOT NULL,
  `cauchuyen_hot` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cauchuyen`
--

INSERT INTO `cauchuyen` (`cauchuyen_id`, `cauchuyen_tieude`, `cauchuyen_tacgia`, `cauchuyen_noidung`, `cauchuyen_ngay`, `cauchuyen_trangthai`, `cauchuyen_hot`) VALUES
(30, 'aladin và con cá vàng12345', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 1, 1),
(31, 'aladin và con cá vàng1234', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 1, 0),
(33, 'aladin và con cá vàng12', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 1, 0),
(35, 'aladin và con cá vàng', 'Tuyển', '<p>ng&agrave;y xửa ng&agrave;y xưa xưa ơi l&agrave; xưa c&oacute; aladin v&agrave; con c&aacute; v&agrave;ng</p>', '2019-04-29', 0, 0),
(36, 'Ngày xửa ngày xưa 123', 'Nguyễn Hoàng Tuyển', '<p>k&igrave;a con c&aacute; v&agrave;ng k&igrave;a con c&aacute; v&agrave;ng</p>', '2019-06-11', 0, 0),
(37, 'Ngày xửa ngày xưa 123', 'Nguyễn Hoàng Tuyển', '<p>k&igrave;a con c&aacute; v&agrave;ng k&igrave;a con c&aacute; v&agrave;ng</p>', '2019-06-11', 0, 0),
(38, 'Ngày xửa ngày xưa 123', 'Nguyễn Hoàng Tuyển', '<p>k&igrave;a con c&aacute; v&agrave;ng k&igrave;a con c&aacute; v&agrave;ng</p>', '2019-06-11', 0, 0),
(39, 'Ngày xửa ngày xưa 123', 'Nguyễn Hoàng Tuyển', '<p>k&igrave;a con c&aacute; v&agrave;ng k&igrave;a con c&aacute; v&agrave;ng</p>', '2019-06-11', 0, 0),
(40, 'alibaba và con cá vàng', 'Tuyển', '<p>Bạn đang t&igrave;m kiếm cho m&igrave;nh xe Limousine đi Đ&agrave; Lạt nhưng vẫn chưa c&oacute; c&acirc;u trả lời h&agrave;i l&ograve;ng cho ch&iacute;nh bản th&acirc;n m&igrave;nh. C&ugrave;ng VnTraveller.com t&igrave;m kiếm c&acirc;u trả lời xe limousine</p>\r\n<p>Bạn đang t&igrave;m kiếm cho m&igrave;nh xe Limousine đi Đ&agrave; Lạt nhưng vẫn chưa c&oacute; c&acirc;u trả lời h&agrave;i l&ograve;ng cho ch&iacute;nh bản th&acirc;n m&igrave;nh. C&ugrave;ng VnTraveller.com t&igrave;m kiếm c&acirc;u trả lời xe limousine</p>\r\n<p>Bạn đang t&igrave;m kiếm cho m&igrave;nh xe Limousine đi Đ&agrave; Lạt nhưng vẫn chưa c&oacute; c&acirc;u trả lời h&agrave;i l&ograve;ng cho ch&iacute;nh bản th&acirc;n m&igrave;nh. C&ugrave;ng VnTraveller.com t&igrave;m kiếm c&acirc;u trả lời xe limousine</p>', '2019-06-16', 0, 0);

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
(14, 15, 'tuyen abcd', '', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.&nbsp;</p>', '91625ca9bfb8ece7c3.14980313.png', '2019-04-07', 1),
(15, 18, 'efgsdfg', '', '<p>sdfgsdfg</p>', '164625cbf38e24eb026.80834117.png', '2019-04-23', 1),
(19, 15, 'How can we sing about love?81', '', '<p>uuuuuuu</p>', '81845cc70affb60b19.57327850.png', '2019-04-29', 1),
(20, 15, 'How can we sing about love?82', '', '<p>uuuuuuu</p>', '237615cc70b2759e318.48051224.png', '2019-04-29', 0),
(21, 15, 'How can we sing about love?83', '', '<p>uuuuuuu</p>', '155795cc70be0991662.21987458.png', '2019-04-29', 0),
(24, 19, 'How can we sing about love?99123', '', '<p>saaaaaaaaaaaaaaaaaa</p>', '70005cc70d3359dc13.19740101.png', '2019-04-29', 1),
(27, 19, 'How can we sing about love?991235678', '', '<p>saaaaaaaaaaaaaaaaaa</p>', '213685cc70d7296c590.61370698.png', '2019-04-29', 0),
(29, 19, 'How can we sing about love?99123567', '', '<p>saaaaaaaaaaaaaaaaaa</p>', '93935cc70d8bc7a033.74365426.png', '2019-04-29', 0),
(30, 19, 'How can we sing about love?1123', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 1),
(31, 19, 'How can we sing about love?1123789', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 0),
(36, 19, 'How can we sing about love?11237891211111', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 0),
(37, 19, 'How can we sing about love?11237891211111', '', '<p>sdfasdfasdfasdfffffffffffffff</p>', '157665cc70e50a06a77.22328606.png', '2019-04-29', 1),
(38, 15, '5 Nhà xe limousine đi Đà Lạt, đặt vé limousine Sài Gòn Đà Lạt nhanh nhất1', '<p>Bạn đang t&igrave;m kiếm cho m&igrave;nh xe Limousine đi Đ&agrave; Lạt nhưng vẫn chưa c&oacute; c&acirc;u trả lời h&agrave;i l&ograve;ng cho ch&iacute;nh bản th&acirc;n m&igrave;nh. C&ugrave;ng&nbsp; t&igrave;m kiếm c&acirc;u trả lời xe limousine S&agrave;i G&ograve;n Đ&agrave; Lạt ngay trong b&agrave;i viết dưới đ&acirc;y bạn nh&eacute;!sdfgd</p>', '<p>Một trong những xe limousine đi Đ&agrave; Lạt chất lượng được y&ecirc;u th&iacute;ch nhất hiện nay đ&oacute; ch&iacute;nh l&agrave; Minh Tr&iacute;. H&atilde;ng xe n&agrave;y được đưa v&agrave;o hoạt động cuối năm 2016 với hệ thống xe ngoại nhập cao cấp. Đ&acirc;y l&agrave; h&atilde;ng xe được đ&aacute;nh gi&aacute; cao trong những năm gần đầy v&igrave; đơn vị sở hữu d&ograve;ng xe VIP c&oacute; 9 ghế ngồi massage thượng lưu. Ri&ecirc;ng 4 h&agrave;ng ghế trước được bọc da sang trọng, người d&ugrave;ng c&oacute; thể xoay, ng&atilde;, trượt một c&aacute;ch thoải m&aacute;i. Xe c&ograve;n c&oacute; 3 h&agrave;ng ghế sau được gập th&agrave;nh giường, mang lại cảm gi&aacute;c sang trọng v&agrave; thoải m&aacute;i. Do đ&oacute;, đ&acirc;y được xem l&agrave; một trong số &iacute;t những nh&agrave; xe limousine giường nằm đi Đ&agrave; Lạt. Ngo&agrave;i ra, kh&aacute;ch h&agrave;ng sẽ cảm thấy rất h&agrave;i l&ograve;ng về hệ thống nội thất, đ&egrave;n chiếu s&aacute;ng cũng như tiện nghi hấp dẫn như tivi LCD,wifi, điều h&ograve;a, hệ thống sạc điện thoại</p>', '204935cf940534840e3.01326185.jpg', '2019-06-06', 1);

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
  MODIFY `baiviet_diadiem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cauchuyen`
--
ALTER TABLE `cauchuyen`
  MODIFY `cauchuyen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
