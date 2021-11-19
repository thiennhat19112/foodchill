-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2021 at 02:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodchill`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `ordinal_number` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `ordinal_number`, `status`) VALUES
(1, 'Trái cây', 1, 1),
(2, 'Thịt viên', 2, 1),
(3, 'Rau đông lạnh', 3, 1),
(4, 'Thịt đông lạnh', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `create_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `receiver_note` text DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` float NOT NULL,
  `descriptions` text DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `create_date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount` tinyint(2) NOT NULL DEFAULT 0,
  `saled` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `rating` int(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `quantity`, `price`, `weight`, `descriptions`, `image`, `create_date`, `category_id`, `discount`, `saled`, `view`, `rating`, `status`) VALUES
(1, 'Sầu riêng đông lạnh MUSANG KING MALAYSIA', 243, 679900, 0.4, '', 'https://product.hstatic.net/1000282430/product/290012233000_23848abd318548b6b9ae172a79993932_grande.jpg', '2021-11-07', 1, 0, 0, 0, 0, 1),
(2, 'Hạt dẻ đông lạnh BOIRON', 143, 149900, 0.2, '', 'https://product.hstatic.net/1000282430/product/hat-de-dong-lanh_6b576db88e1a4f3e94cc32c0565ad87c_grande.jpg', '2021-11-07', 1, 0, 0, 0, 0, 1),
(3, 'Hồng sấy nguyên trái đông lạnh Hàn Quốc', 253, 299900, 0.45, '', 'https://product.hstatic.net/1000282430/product/290012232000_518e1a2082cd4b318c60378ddbd0db3e_grande.jpg', '2021-11-07', 1, 0, 0, 0, 0, 1),
(4, 'Việt quất đông lạnh PONTHIER', 134, 551000, 1, '', 'https://secure.auifinefoods.com/img/product/6550140000_2.jpg?fv=ABC8BB4A509B36F8B1C30BE483EAEC05-19162', '2021-11-07', 1, 0, 0, 0, 0, 1),
(5, 'Dâu tây đông lạnh PONTHIER', 173, 449000, 1, '', 'https://secure.auifinefoods.com/img/product/6550050000_3.jpg?fv=6D80B0DA3FE83A0902746FD19C229B12-20132', '2021-11-07', 1, 0, 0, 0, 0, 1),
(6, 'Quả dứa đông lạnh PONTHIER', 532, 426800, 1, '', 'https://secure.auifinefoods.com/img/product/6550210000_2.jpg?fv=DCED0589A0DC7AEB4045E4510F3C5CD7-20196', '2021-11-07', 1, 0, 0, 0, 0, 1),
(7, 'Morello Cherry đông lạnh PONTHIER', 146, 459000, 1, '', 'https://secure.auifinefoods.com/img/product/6550110000_2.jpg?fv=B69728FEECE86E35CFB09FFE6F4DBF90-17812', '2021-11-07', 1, 0, 0, 0, 0, 1),
(8, 'Trái cây đỏ hỗn hợp PONTHIER', 543, 429000, 1, '', 'https://secure.auifinefoods.com/img/product/PONTHIER-FrozenPuree-1kg-RedFruits.jpg?fv=CD4F896D83DBD3C9AA39678B39AEDAFF-19192', '2021-11-07', 1, 0, 0, 0, 0, 1),
(9, 'Quả mâm xôi đông lạnh PONTHIER', 742, 429000, 1, '', 'https://secure.auifinefoods.com/img/product/6550080000_2.jpg?fv=9AF6986F9F0972E7C1A958B1CE5B1AE2-19062', '2021-11-07', 1, 0, 0, 0, 0, 1),
(10, 'Quả mơ đông lạnh PONTHIER', 233, 449500, 1, '', 'https://secure.auifinefoods.com/img/product/6550150000_2-Z.jpg', '2021-11-07', 1, 10, 0, 0, 0, 1),
(11, 'Quả đào đông lạnh PONTHIER', 155, 419000, 1, '', 'https://secure.auifinefoods.com/img/product/6550170000_2.jpg?fv=C8F3CB4E3A5041DF15342AC410D14467-19132', '2021-11-07', 1, 0, 0, 0, 0, 1),
(12, 'Chuối đông lạnh PONTHIER', 235, 415000, 1, '', 'https://secure.auifinefoods.com/img/product/6550220000_2.jpg?fv=8F38AE93477379929FC19584AF0B0837-18625', '2021-11-07', 1, 0, 0, 0, 0, 1),
(13, 'Vải thiều đông lạnh PONTHIER', 734, 417000, 1, '', 'https://secure.auifinefoods.com/img/product/6550280000_2.jpg?fv=F38406ED63D9C705FFA94EC9D4C35A03-19831', '2021-11-07', 1, 0, 0, 0, 0, 1),
(14, 'Ổi đông lạnh PONTHIER', 526, 423500, 1, '', 'https://secure.auifinefoods.com/img/product/6550260000_1.jpg?fv=D1F66707E020D072B44F0B5606E2DCA7-19599', '2021-11-07', 1, 9, 0, 0, 0, 1),
(15, 'Cá viên dai giòn Bếp 5 sao', 352, 79000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7170/231962/bhx/ca-vien-bep-5-sao-goi-500g-202104270030529269_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(16, 'Chả chiên Quy Nhơn Hoa Doanh', 263, 39000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/196090/bhx/cha-ca-chien-quy-nhon-hoa-doanh-200g-202104270029116696_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(17, 'Cá viên chiên Tân Việt Sin', 164, 32000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/229112/bhx/ca-vien-tan-viet-sin-goi-200g-202104270028030873_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(18, 'Bò viên tiêu xanh N&N', 145, 27000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/227957/bhx/bo-vien-tieu-xanh-la-cusina-goi-200g-202104270021009896_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(19, 'Gà viên phô mai La Cusina', 242, 29000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/229136/bhx/ga-vien-pho-mai-la-cusina-goi-200g-202104270027338781_300x300.jpg', '2021-11-09', 2, 3, 0, 0, 0, 1),
(21, 'Chả mực Hạ Long Oceangift', 145, 105000, 0.24, '', 'https://cdn.tgdd.vn/Products/Images/7170/244107/bhx/cha-muc-ha-long-oceangift-khay-240g-202107031547014408_300x300.jpg', '2021-11-09', 2, 7, 0, 0, 0, 1),
(22, 'Chả cá quết Nha Trang', 522, 50000, 0.28, '', 'https://cdn.tgdd.vn/Products/Images/7170/204351/bhx/cha-ca-quet-kieu-nha-trang-cau-tre-280g-202103032308351287_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(23, 'Mực viên đậm đà Bếp 5 sao', 235, 32000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/231966/bhx/muc-vien-bep-5-sao-goi-200g-202104302240533946_300x300.jpeg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(24, 'Chả thát lát viên Nhất Tâm', 145, 43000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/240467/bhx/cha-that-lat-vien-nhat-tam-goi-200g-202106031524166513_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(25, 'Chả mực viên chiên Việt Sin', 234, 77000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7170/200514/bhx/muc-vien-viet-sin-goi-500g-202104270020399167_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(26, 'Bò viên gân giòn Việt Sin', 256, 68500, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/244528/bhx/bo-vien-gan-gion-viet-sin-goi-200g-202107031509232548_300x300.jpeg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(27, 'Chả ốc nhồi basa Nhất Tâm', 0, 61000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7170/249021/bhx/cha-oc-nhoi-nhat-tam-goi-500g-202108150726535442_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(28, 'Cá viên trứng cút Nhất Tâm', 0, 59500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7170/252192/bhx/ca-vien-basa-nhan-trung-cut-nhat-tam-goi-500g-202110051741099872_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(29, 'Cá viên nhân trứng cá SG Food', 0, 49000, 0.25, '', 'https://cdn.tgdd.vn/Products/Images/7170/229128/bhx/-202105161645445556.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(30, 'Thanh chả cá xoắn Mayumi', 0, 39000, 0.16, '', 'https://cdn.tgdd.vn/Products/Images/7170/241523/bhx/cha-ca-xoan-mayumi-goi-160g-202107011115482268_300x300.jpeg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(31, 'Viên hải sản rau củ La Cusina', 0, 25000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7170/200129/bhx/vien-hai-san-rau-cu-la-cusina-goi-200g-202103041541364155_300x300.jpg', '2021-11-09', 2, 0, 0, 0, 0, 1),
(32, 'Khoai tây đông lạnh Trần Gia', 0, 36000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/239239/bhx/khoai-tay-dong-lanh-tran-gia-goi-500g-202108161103457618_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(33, 'Rau củ hỗn hợp Đôi Đũa Vàng', 0, 39000, 0.4, '', 'https://cdn.tgdd.vn/Products/Images/7172/213083/bhx/rau-sac-mau-hon-hop-doi-dua-vang-goi-400g-202104241417560746_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(34, 'Rau củ hỗn hợp Mama Food', 0, 42000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/236775/bhx/rau-hon-hop-dong-lanh-mama-food-goi-500g-202104241609529516_300x300.jpeg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(35, 'Rau quả hỗn hợp SG Food', 0, 43000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/206546/bhx/rau-qua-hon-hop-dong-lanh-sg-food-goi-500g-202109181356282656.jpeg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(36, 'Khoai tây cắt sợi Farm Best', 0, 55500, 1, '', 'https://cdn.tgdd.vn/Products/Images/7172/255304/bhx/khoai-tay-cat-soi-dong-lanh-farm-best-goi-1kg-202110221607519927_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(38, 'Khoai tây đông lạnh Mydibel', 0, 67000, 1, '', 'https://cdn.tgdd.vn/Products/Images/7172/202813/bhx/khoai-tay-dong-lanh-mydibel-goi-1kg-202104241416286971_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(39, 'Khoai tây cắt thẳng Mama Food', 0, 40000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/236500/bhx/khoai-tay-dong-lanh-cat-thang-mama-food-goi-500g-202104241615136715_300x300.jpeg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(40, 'Khoai tây lượn sóng Mama Food', 0, 40000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/236499/bhx/khoai-tay-dong-lanh-cat-luon-song-mama-food-goi-500g-202104241612476287_300x300.jpeg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(41, 'Khoai tây cắt thẳng Farm Best', 0, 55500, 1, '', 'https://cdn.tgdd.vn/Products/Images/7172/255305/bhx/khoai-tay-cat-thang-dong-lanh-farm-best-goi-1kg-202110221613123760_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(42, 'Bánh khoai tây Farm Best', 0, 68500, 1, '', 'https://cdn.tgdd.vn/Products/Images/7172/255302/bhx/banh-khoai-tay-dong-lanh-farm-best-goi-1kg-202111061703145913_300x300.jpeg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(43, 'Rau củ hỗn hợp Trần Gia', 0, 33000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/239248/bhx/rau-qua-hon-hop-tran-gia-goi-500g-202108161058197194_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(44, 'Đậu hà lan đông lạnh Trần Gia', 0, 31500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/239249/bhx/dau-ha-lan-tran-gia-goi-500g-202108161056077670_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(45, 'Bắp hạt đông lạnh Trần Gia', 0, 29000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/7172/239245/bhx/bap-hat-dong-lanh-tran-gia-goi-500g-202108161102244643_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(46, 'Đậu hà lan đông lạnh Phi Long', 0, 16000, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7172/215765/bhx/dau-ha-lan-dong-lanh-phi-long-goi-200g-202104241419190522_300x300.jpg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(47, 'Bắp hạt đông lạnh Mama Food', 0, 14000, 0.25, '', 'https://cdn.tgdd.vn/Products/Images/7172/240451/bhx/bap-hat-dong-lanh-mama-food-goi-250g-202106021037158414_300x300.jpeg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(48, 'Đậu hà lan đông lạnh Mama Food', 0, 12500, 0.2, '', 'https://cdn.tgdd.vn/Products/Images/7172/236776/bhx/dau-ha-lan-dong-lanh-mama-food-goi-200g-202104241604350895_300x300.jpeg', '2021-11-09', 3, 0, 0, 0, 0, 1),
(49, 'Ba rọi bò Mỹ Thảo Tiến Foods', 0, 104000, 0.3, '', 'https://cdn.tgdd.vn/Products/Images/7172/213845/bhx/thit-ba-roi-bo-my-thao-tien-foods-khay-300g-202104141042086693_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(50, 'Bò hamburger Gippsland Pure', 0, 69500, 0.15, '', 'https://cdn.tgdd.vn/Products/Images/7172/255306/bhx/thit-bo-hamburger-gippsland-pure-goi-150g-202111061649459520_300x300.jpg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(51, 'Thịt nạm bò Mỹ Orifood', 0, 156000, 0.3, '', 'https://cdn.tgdd.vn/Products/Images/7172/213842/bhx/thit-nam-bo-my-orifood-hotpot-story-hop-300g-201911040854176614_300x300.jpg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(52, 'Thịt bò hamburger Rum Jungle', 0, 68500, 0.15, '', 'https://cdn.tgdd.vn/Products/Images/7172/255307/bhx/thit-bo-hamburger-rum-jungle-goi-150g-202111061741417736_300x300.jpg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(53, 'Gầu bò Mỹ Thảo Tiến Foods', 0, 144000, 0.3, '', 'https://cdn.tgdd.vn/Products/Images/7172/213846/bhx/gau-bo-my-dong-lanh-thao-tien-foods-khay-300g-202104141041538911_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(54, 'Ba chỉ bò Úc Thảo Tiến Foods', 0, 82000, 0.3, '', 'https://cdn.tgdd.vn/Products/Images/7172/213864/bhx/ba-chi-bo-uc-dong-lanh-thao-tien-foods-khay-300g-202104141042230894_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(55, 'Sườn non nhập khẩu đông lạnh', 0, 87500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/8781/249011/bhx/suon-non-heo-nhap-khau-dong-lanh-tui-500g-202110041510408937_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(56, 'Ba rọi da nhập khẩu đông lạnh', 0, 82500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/8781/249016/bhx/ba-roi-heo-co-da-nhap-khau-dong-lanh-tui-2kg-202108181830547960_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(57, 'Nạc dăm nhập khẩu đông lạnh', 0, 72500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/8781/249015/bhx/nac-dam-heo-nhap-khau-dong-lanh-tui-1kg-202108150408466981_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(58, 'Chân giò nhập khẩu đông lạnh', 0, 55000, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/8781/249012/bhx/chan-gio-heo-nhap-khau-dong-lanh-tui-2kg-202108182125088203_300x300.jpg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(59, 'Bắp giò nhập khẩu đông lạnh', 0, 49500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/8781/249013/bhx/bap-gio-heo-nhap-khau-dong-lanh-tui-500g-202110021741339749_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(60, 'Sườn vai nhập khẩu đông lạnh', 0, 44500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/8781/249018/bhx/suon-vai-heo-nhap-khau-dong-lanh-tui-1kg-202108281827503629_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1),
(61, 'Xương que nhập khẩu đông lạnh', 0, 39500, 0.5, '', 'https://cdn.tgdd.vn/Products/Images/8781/249017/bhx/xuong-que-heo-nhap-khau-dong-lanh-tui-2kg-202108181850103554_300x300.jpeg', '2021-11-09', 4, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `join_date`, `permission`, `status`) VALUES
(1, 'admin', 'admin@localhost.com', '21232f297a57a5a743894a0e4a801fc3', '2021-11-04', 1, 1),
(3, 'user1', 'user1@locahost.com', '24c9e15e52afc47c225b757e7bee1f9d', '2021-11-18', 0, 1),
(4, 'user2', 'user2@gmail.com', '7e58d63b60197ceb55a1c487989a3720', '2021-11-18', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `favorites_ibfk_2` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
