-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2022 at 04:13 PM
-- Server version: 10.2.41-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='danh m?c';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Man hinh may tinh'),
(2, 'Ban phim may tinh'),
(3, 'Quat tan nhiet'),
(4, 'Pin may tinh'),
(5, 'Mainboard'),
(6, 'RAM - Bộ nhớ trong'),
(7, 'Ổ cứng HDD'),
(8, ' Ổ cứng SSD'),
(9, 'VGA - Card Màn Hình'),
(10, 'Case - Vỏ máy tính'),
(11, 'PSU - Nguồn máy tính'),
(12, 'CPU - Bộ vi xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerCode` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PhoneNumber` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `DateOfBirth` datetime DEFAULT NULL,
  `CustomerName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='B?ng khách hàng';

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerCode`, `Address`, `PhoneNumber`, `Email`, `Gender`, `DateOfBirth`, `CustomerName`) VALUES
(70, 'KH01', 'Hà Nội', '0333354539654', '2001tambh@gmail.com', 0, '2022-05-17 00:00:00', 'Nguyễn Văn Tâm'),
(71, 'KH71', 'Hà Nội', '0333354539654', '2001tambh@gmail.com', 1, '2022-05-19 00:00:00', 'Nguyễn Văn Tâm');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `EmployeeCode` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Position` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `AccoutName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `EmployeeName` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='Nhân viên';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `EmployeeCode`, `Position`, `AccoutName`, `Password`, `EmployeeName`, `Email`, `Gender`) VALUES
(5, 'NV05', '', '', 'tam060601', 'Nguyễn Văn Tâm', 'root', 0),
(6, 'NV06', 'Nhân viên', 'NguyenTam2001', 'tam060601', 'Hạ Ngọc Nam', 'root', 0),
(7, 'NV07', '', '', 'tam060601', 'Nguyễn Hoàng Hải', 'root', 0),
(8, 'NV08', 'Giam Doc 222', 'NguyenTam2001', 'tam060601', 'Nguyễn Văn Tâm', 'tam2001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `export_invoice`
--

CREATE TABLE `export_invoice` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DateCreate` date DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='hóa don xuát';

--
-- Dumping data for table `export_invoice`
--

INSERT INTO `export_invoice` (`InvoiceID`, `InvoiceName`, `DateCreate`, `CustomerID`, `EmployeeID`) VALUES
(1, 'Hóa đơn nhập hàng', '2022-05-20', 70, 6);

-- --------------------------------------------------------

--
-- Table structure for table `export_invoice_product`
--

CREATE TABLE `export_invoice_product` (
  `InvoiceID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `TotalExport` int(11) DEFAULT NULL,
  `PriceExport` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='Hóa don xu?t - s?n ph?m';

-- --------------------------------------------------------

--
-- Table structure for table `import_invoice`
--

CREATE TABLE `import_invoice` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DateCreate` date DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `ManufactureID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='Hóa don nh?p';

--
-- Dumping data for table `import_invoice`
--

INSERT INTO `import_invoice` (`InvoiceID`, `InvoiceName`, `DateCreate`, `EmployeeID`, `ManufactureID`) VALUES
(1, 'Hóa đơn nhập hàng', '2022-06-06', 7, 21),
(2, 'Hóa đơn nhập hàng', '2022-07-06', 5, 21),
(3, 'Hóa đơn nhập hàng', '2022-06-06', 6, 21),
(4, 'HÃ³a Ä‘Æ¡n nháº­p hÃ ng', '2022-05-10', 5, 21),
(5, 'Hóa đơn nhập hàng', '2022-05-10', 5, 21),
(6, 'Hóa đơn nhập hàng', '2022-04-12', 5, 23),
(7, 'Hóa đơn nhập hàng', '2022-05-10', 6, 23),
(8, 'Hóa đơn nhập hàng', '2022-06-03', 6, 23),
(9, 'Hóa đơn nhập hàng', '2022-06-03', 6, 23),
(10, 'Hóa đơn nhập hàng', '2022-05-18', 6, 23),
(11, 'Hóa đơn nhập hàng', '2022-12-12', 7, 23),
(12, 'Hóa đơn nhập hàng', '2022-12-12', 5, 21),
(13, 'Hóa đơn nhập hàng', '2022-06-06', 6, 23),
(14, 'Hóa đơn nhập hàng', '2022-12-12', 5, 21),
(15, 'Hóa đơn nhập hàng', '2022-05-20', 5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `import_invoice_product`
--

CREATE TABLE `import_invoice_product` (
  `InvoiceID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TotalImport` int(11) DEFAULT NULL,
  `PriceImport` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='Hóa don nh?p s?n ph?m';

--
-- Dumping data for table `import_invoice_product`
--

INSERT INTO `import_invoice_product` (`InvoiceID`, `ProductID`, `TotalImport`, `PriceImport`) VALUES
(15, 15, 5, 1000000);

--
-- Triggers `import_invoice_product`
--
DELIMITER $$
CREATE TRIGGER `update_product` AFTER INSERT ON `import_invoice_product` FOR EACH ROW BEGIN
 UPDATE product SET product.Quality=(NEW.TotalImport+product.Quality) WHERE ProductID=NEW.ProductID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `ManufactureID` int(11) NOT NULL,
  `ManufactureName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PhoneNumber` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ManufactureCode` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='Nhà cung c?p';

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`ManufactureID`, `ManufactureName`, `Address`, `PhoneNumber`, `ManufactureCode`) VALUES
(21, 'tam', 'Ha Noi', '0333354539654', 'NC01'),
(22, 'Toan', 'Ha Noi', '03333333333', 'NCC02'),
(23, 'Nhà Cung Cấp Hà Nội', 'Hà Nội', '0333354539654', 'NC23'),
(24, 'tam', 'Hà Nội', '0333354539654', 'NC24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ExportPrice` double DEFAULT NULL,
  `ImportPrice` double DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Description` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Quality` int(11) DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='S?n ph?m';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ExportPrice`, `ImportPrice`, `CategoryID`, `Description`, `Quality`, `Image`) VALUES
(9, 'CPU AMD Athlon 3000G', 3000000, 2000000, 12, 'CPU AMD Athlon 3000G là dòng CPU giá rẻ phục vụ cho nhu cầu cơ bản. Đây là dòng vi xử lý bình dân được tích hợp sẵn nhân đồ họa Radeon có thể chơi được nhiều tựa game online ở mức cài đặt cơ bản. ', 20, '53258_hnc_cpu_amd_athlon_3000g.jpg'),
(10, 'CPU Intel Core i7-12700F', 1500000, 1000000, 6, 'CPU Intel Core i7-12700F  là CPU thế hệ thứ 12 của Intel (Alder Lake) trên nền Socket LGA 1700 với kiến trúc hoàn toàn mới cho hiệu năng vượt trội so với người tiền nhiệm. Sức mạnh được phân bổ thành 2 loại Cores khác nhau: Performance-cores & Efficient-cores. Trong đó Performance-cores là các nhân hiệu năng cao cho phép xử lý các tác vụ tính toán cần nhiều sức mạnh', 10, '56282_cpu_amd_ryzen_5_5600x.jpg'),
(11, 'CPU Intel Core i5-11400F', 1000000, 500000, 12, 'CPU Intel Core i5-11400F là phiên bản nâng cấp của i5-10400F với xung nhịp tăng nhẹ và hiệu suất trên mỗi nhân được cải thiện. Với 6 nhân 12 luồng, đây là CPU có hiệu năng trên giá thành tốt nhất của Intel. ', 10, '250_63947_cpu_intel_core_i5_12600kf_intel_lga_1700.jpg'),
(12, 'CPU Intel Core i7-10700F', 1000000, 500000, 12, 'Cuộc đua song mã giữa Intel và AMD vẫn đang hết sức khốc liệt, dòng i7 của Intel năm nay đã đuổi kịp đối thủ AMD về số nhân và số luồng.Giá thành nay đã hấp dẫn hơn. ', 10, '58408_cpu_intel_core_i7_11700f_2_5ghz_turbo_up_to_4_9ghz_8_nhan_16_luong_16mb_cache_65w_socket_intel_lga_1200_1.jpg'),
(13, 'RAM Desktop KINGSTON (KVR26N19S6/4) 4G', 1000000, 500000, 6, 'RAM Desktop KINGSTON 4gb là dòng RAM cơ bản của thương hiệu lâu đời Kingston đã có nhiều năm kinh nghiệm trong việc sản xuất các thiết bị lưu trữ. RAM Desktop KINGSTON (KVR26N19S6/4) 4G (1x4GB) DDR4 2666MHz có thiết kế cơ bản với PCB xanh lá và không tích hợp sẵn tản nhiệt. Chuẩn DDR4 tương thích với mọi bo mạch chủ có hỗ trợ', 12, '44570_ram_kingston_kvr26n19s6_4.jpg'),
(14, 'RAM Desktop Gskill Trident Z RGB (F4-3200C16D-16GTZR) 16GB ', 1000000, 3000000, 6, 'Với thanh ánh sáng hoàn toàn tiếp xúc với đèn LED RGB rực rỡ, được kết hợp với thiết kế tản nhiệt RAM G.SKILL Trident Z RGB DDR4 16GB Bus 3200 từng đoạt giải thưởng và được chế tạo với các thành phần chất lượng cao nhất, bộ nhớ Ram PC G.SKILL Trident Z full length RGB DDR4 Bus 3200 kết hợp ánh sáng RGB sống động nhất với hiệu suất vượt trội.', 5, '54203_ram_desktop_gskill_trident_z_rgb__f4_3200c16d_32gtzr__32gb__2x16gb__ddr4_3200mhz_3.jpg'),
(15, 'Ram Server & Workstation Kingston (KSM26ES8/8HD) 8GB', 500000, 1000000, 6, 'Ram Desktop Gskill Trident Z5 là dòng RAM cao cấp & là con bài chủ lực của Gskill. Ở phiên bản DDR5 lần này, Gskill tung ra thiết kế mới bắt mắt và hiện đại hơn đi cùng hiệu suất cực nhanh của DDR5. Ram Desktop Gskill Trident Z5 được ra mắt với 2 phiên bản màu sắc: Đen mờ (Matte Black) & Bạc (Metallic Silver). ', 25, '57920_kingston_8gb_kdm26es8_8hd.jpg'),
(16, 'Ram Desktop Corsair Dominator Platinum Black RGB (CMT32GX4M2E3200C16) 32GB', 500000, 1000000, 6, 'Ram Desktop Corsair Dominator Platinum Black RGB\nPhiên bản màu đen mờ mạnh mẽ của Corsair Dominator Platinum với đèn LED RGB rực rỡ. Tương thích tốt với các nền tảng của Intel cũng như AMD. Corsair iCue giúp bạn có thể dễ dàng tùy chỉnh cũng như kiểm soát hệ thống của mình tốt hơn. ', 6, '58930_ram_desktop_corsair_dominator_platinum_black_rgb_cmt32gx4m2e3200c16_32gb_2x16g_ddr4_3200mhz_1.jpg'),
(17, 'Ram Desktop Gskill Trident Z5 (F5-6000J4040F16GX2-TZ5S) 32G', 1000000, 3000000, 6, 'Ram Desktop Gskill Trident Z5 là dòng RAM cao cấp & là con bài chủ lực của Gskill. Ở phiên bản DDR5 lần này, Gskill tung ra thiết kế mới bắt mắt và hiện đại hơn đi cùng hiệu suất cực nhanh của DDR5. Ram Desktop Gskill Trident Z5 được ra mắt với 2 phiên bản màu sắc: Đen mờ (Matte Black) & Bạc (Metallic Silver). ', 5, '63881_ram_desktop_gskill_trident_z5_f5_6000j4040f16gx2_tz5s_32g_2x16b_ddr5_6000mhz_1.jpg'),
(18, 'Ram Desktop Kingston Fury Beast (KF552C40BBK2-32) 32GB', 1000000, 1500000, 6, 'Ram Desktop Kingston Fury Beast là dòng RAM hiệu năng cao của Kingston trên nền tảng DDR5 mới nhất cho tốc độ cực nhanh. Ram Desktop Kingston Fury beast sở hữu thiết kế tản nhiệt nhôm đơn giản nhưng đem lại hiểu quả tốt cho hầu hết các tác vụ từ cơ bản đến nâng cao của bạn.', 10, '61461_ram_desktop_kingston_fury_beast_kf552c40bbk2_32_32gb_2x16gb_ddr5_5200mhz.jpg'),
(19, 'Ram Desktop Gskill Trident Z5 (F5-6000U3636E16GX2-TZ5K) 32G', 500000, 1000000, 2, 'Ram Desktop Gskill Trident Z5 là dòng RAM cao cấp & là con bài chủ lực của Gskill. Ở phiên bản DDR5 lần này, Gskill tung ra thiết kế mới bắt mắt và hiện đại hơn đi cùng hiệu suất cực nhanh của DDR5. Ram Desktop Gskill Trident Z5 được ra mắt với 2 phiên bản màu sắc: Đen mờ (Matte Black) & Bạc (Metallic Silver). ', 10, '62992_ram_desktop_gskill_trident_z5_f5_6000u3636e16gx2_tz5k_32g_2x16b_ddr5_6000mhz_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `export_invoice`
--
ALTER TABLE `export_invoice`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `FK_export_invoice_CustomerID` (`CustomerID`),
  ADD KEY `FK_export_invoice_EmployeeID` (`EmployeeID`);

--
-- Indexes for table `export_invoice_product`
--
ALTER TABLE `export_invoice_product`
  ADD KEY `FK_export_invoice_product_InvoiceID` (`InvoiceID`),
  ADD KEY `FK_export_invoice_product_ProductID` (`ProductID`);

--
-- Indexes for table `import_invoice`
--
ALTER TABLE `import_invoice`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `FK_import_invoice_ManufactureID` (`ManufactureID`),
  ADD KEY `FK_import_invoice_EmployeeID` (`EmployeeID`);

--
-- Indexes for table `import_invoice_product`
--
ALTER TABLE `import_invoice_product`
  ADD KEY `FK_import_invoice_product_InvoiceID` (`InvoiceID`),
  ADD KEY `FK_import_invoice_product_ProductID` (`ProductID`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`ManufactureID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_product_CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `export_invoice`
--
ALTER TABLE `export_invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `import_invoice`
--
ALTER TABLE `import_invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `ManufactureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `export_invoice`
--
ALTER TABLE `export_invoice`
  ADD CONSTRAINT `FK_export_invoice_CustomerID` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_export_invoice_EmployeeID` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `export_invoice_product`
--
ALTER TABLE `export_invoice_product`
  ADD CONSTRAINT `FK_export_invoice_product_InvoiceID` FOREIGN KEY (`InvoiceID`) REFERENCES `export_invoice` (`InvoiceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_export_invoice_product_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `import_invoice`
--
ALTER TABLE `import_invoice`
  ADD CONSTRAINT `FK_import_invoice_EmployeeID` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_import_invoice_ManufactureID` FOREIGN KEY (`ManufactureID`) REFERENCES `manufacture` (`ManufactureID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `import_invoice_product`
--
ALTER TABLE `import_invoice_product`
  ADD CONSTRAINT `FK_import_invoice_product_InvoiceID` FOREIGN KEY (`InvoiceID`) REFERENCES `import_invoice` (`InvoiceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_import_invoice_product_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
