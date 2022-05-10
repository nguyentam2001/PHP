-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2022 at 03:11 AM
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
(4, 'Pin may tinh');

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
(70, 'KH01', 'HÃ  Ná»™i', '0333354539654', '2001tambh@gmail.com', 0, '2022-05-17 00:00:00', 'Nguyá»…n VÄƒn TÃ¢m'),
(71, 'KH71', 'HÃ  Ná»™i 2', '0333354539654', '2001tambh@gmail.com', 1, '2022-05-19 00:00:00', 'Nguyá»…n VÄƒn TÃ¢m');

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
(6, 'NV06', 'Giam Doc 222', 'NguyenTam2001', 'tam060601', 'Hạ Ngọc Nam', 'root', 0),
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
(11, 'Hóa đơn nhập hàng', '2022-12-12', 7, 23);

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
(7, 1, 3330, 1000),
(7, 4, 100, 2000),
(2, 1, 100, 2200),
(1, 1, 100, 2200),
(1, 1, 100, 2200),
(8, 1, 3100, 1000),
(8, 5, 2000, 1000),
(9, 1, 2000, 1000),
(10, 1, 100, 200),
(11, 1, 300, 2000);

--
-- Triggers `import_invoice_product`
--
DELIMITER $$
CREATE TRIGGER `update_product` AFTER INSERT ON `import_invoice_product` FOR EACH ROW BEGIN
 UPDATE product SET product.Quality=(NEW.TotalImport+product.Quality), product.ImportPrice=NEW.PriceImport WHERE ProductID=NEW.ProductID;
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
  `Description` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Quality` int(11) DEFAULT NULL,
  `Image` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci COMMENT='S?n ph?m';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ExportPrice`, `ImportPrice`, `CategoryID`, `Description`, `Quality`, `Image`) VALUES
(1, 'Ban phim k100', 30000, 2000, 1, 'Ban phim co chat luong cao khoi ban', 5730, 'banphim.jpg'),
(2, 'Ban phim k200', 30000, 20000, 1, 'Ban phim co chat luong cao khoi ban', 130, 'banphim.jpg'),
(3, 'Ban phim k300', 30000, 20000, 1, 'Ban phim co chat luong cao khoi ban', 130, 'banphim.jpg'),
(4, 'Ban phim k400', 30000, 20000, 1, 'Ban phim co chat luong cao khoi ban', 130, 'banphim.jpg'),
(5, 'Ban phim k500', 30000, 1000, 2, 'Ban phim co chat luong cao khoi ban', 2130, 'banphim.jpg'),
(6, 'Ban phim k500', 30000, 20000, 1, 'Ban phim co chat luong cao khoi ban', 130, 'banphim.jpg');

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
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `import_invoice`
--
ALTER TABLE `import_invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `ManufactureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
