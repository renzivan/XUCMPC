-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 06:48 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `red`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` varchar(20) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Food_Type` varchar(20) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Quantity_Sold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Product_Name`, `Food_Type`, `Price`, `Quantity`, `Quantity_Sold`) VALUES
('1201021', 'Orange', 'Dry Good', 20.4, 1000, 0),
('12314', 'Sandwich', 'Dry Good', 123, 123, 0),
('13515111', 'Isda', 'Seafood', 30, 500, 10),
('13515151', 'Cornbeef', 'Meat', 15, 500, 100),
('13515152', 'Porkchop', 'Meat', 45, 200, 100),
('13515222', 'Steak', 'Meat', 100, 50, 50),
('13515333', 'Hotdog', 'Meat', 69, 500, 300),
('13515341', 'Beefloafs', 'Meat', 40, 200, 200),
('13515444', 'Egg', 'Dairy', 6, 200, 400),
('13515565', 'Bread', 'Dairy', 20, 500, 450),
('13515666', 'Nova', 'Junk Food', 666, 666, 666),
('1351577', 'Beef Steak', 'Meat', 6969, 10, 1),
('13515798', 'Fried Chicken', 'Meat', 240, 500, 500);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Subtotal` float NOT NULL,
  `Date_Added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `Name`, `Price`, `Quantity`, `Subtotal`, `Date_Added`) VALUES
('1', '1201021', 20.4, 6, 122.4, '02/07/2018'),
('1', '1351577', 6969, 1, 6969, '02/07/2018'),
('1', '1201292', 500, 1, 500, '02/07/2018'),
('1', '13515565', 20, 1, 20, '02/07/2018'),
('1', '13515333', 69, 3, 207, '02/12/2018');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `FK_ID` varchar(20) NOT NULL,
  `Product_Name` varchar(20) NOT NULL,
  `Date_Added` varchar(20) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Load_Cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`FK_ID`, `Product_Name`, `Date_Added`, `Quantity`, `Load_Cost`) VALUES
('11515445', '13515151', '01/17/2018', 1, 15),
('123104150', '13515341', '01/17/2018', 1, 22),
('123104152', '13515798', '01/17/2018', 2, 33),
('11515445', '13515111', '01/17/2018', 1, 10),
('123104100', '13515151', '01/17/2018', 2, 20),
('123104150', '13515152', '01/17/2018', 1, 20),
('123104151', '13515222', '01/17/2018', 2, 30),
('123104152', '13515333', '01/17/2018', 2, 25),
('11515445', '13515341', '01/17/2018', 1, 25),
('123104150', '13515151', '01/17/2018', 2, 11),
('123104100', '13515152', '01/17/2018', 2, 33),
('11515445', '13515111', '01/17/2018', 2, 50),
('9999', '13515444', '02/05/2018', 1, 10),
('9999', '13515444', '02/05/2018', 1, 10),
('9999', '13515111', '02/05/2018', 1, 30),
('9999', '13515798', '02/05/2018', 5, 1200),
('101011', '1201021', '02/05/2018', 1, 20),
('101011', '1201021', '02/05/2018', 5, 102),
('101011', '13515151', '02/05/2018', 1, 15),
('101011', '1351577', '02/05/2018', 1, 6969),
('101011', '13515341', '02/05/2018', 1, 40),
('9999', '13515111', '02/07/2018', 1, 30),
('123', '1201021', '02/07/2018', 1, 20),
('123', '13515565', '02/07/2018', 1, 20),
('123', '13515111', '02/07/2018', 5, 150),
('123', '13515111', '02/07/2018', 1, 30),
('123', '13515111', '02/07/2018', 1, 30),
('123', '13515111', '02/07/2018', 1, 30),
('123', '13515111', '02/07/2018', 2, 60),
('123', '13515666', '02/07/2018', 1, 666),
('123', '13515333', '02/07/2018', 1, 69),
('123', '1201021', '02/07/2018', 1, 20),
('123', '13515111', '02/07/2018', 1, 30),
('123', '13515111', '02/07/2018', 10, 300),
('123', '13515111', '02/07/2018', 15, 450),
('123', '13515111', '02/07/2018', 99, 2970),
('123', '1201021', '02/07/2018', 7, 102),
('123', '13515111', '02/07/2018', 6, 180),
('000333', '13515152', '02/12/2018', 5, 225),
('000333', '13515111', '02/12/2018', 1, 30),
('000333', '1201021', '02/12/2018', 5, 102),
('000333', '1201021', '02/12/2018', 3, 61),
('000333', '13515111', '02/12/2018', 1, 30),
('000333', '13515222', '02/12/2018', 1, 100),
('000333', '13515111', '02/12/2018', 1, 30),
('000333', '13515152', '02/12/2018', 1, 45),
('000333', '13515333', '02/12/2018', 3, 207),
('000333', '13515151', '02/12/2018', 6, 90),
('000333', '1201021', '02/12/2018', 1, 20),
('000333', '13515111', '02/12/2018', 1, 30),
('000333', '1201021', '02/12/2018', 1, 20),
('000333', '13515444', '02/12/2018', 1, 6),
('123', '1201021', '07/18/2018', 6, 122),
('123', '12314', '07/18/2018', 2, 246),
('123', '13515111', '07/18/2018', 2, 60),
('123', '13515151', '07/18/2018', 3, 45),
('123', '13515152', '07/18/2018', 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Middle_Initial` varchar(5) NOT NULL,
  `Suffix` varchar(10) NOT NULL,
  `Load_Balance` double DEFAULT NULL,
  `Total_Load` int(10) NOT NULL,
  `Date_Added` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Privilege` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Password`, `Firstname`, `Lastname`, `Middle_Initial`, `Suffix`, `Load_Balance`, `Total_Load`, `Date_Added`, `Status`, `Privilege`) VALUES
('000333', '123', 'Student', 'Student', '', '', 500, 1000, '2018-02-12', 'Active', 0),
('1', '123', 'Admin', 'Admin', '', '', 0, 0, '2018-01-25', 'Active', 2),
('101011', '123', 'Cashier', 'Cashier', '', '', 0, 0, '2018-02-05', 'Active', 1),
('11', '123', 'Student', 'Student', '', '', 11, 0, '0000-00-00', 'Inactive', 0),
('11515445', '123', 'student', 'student', '', '', 500, 0, '2018-01-21', 'Inactive', 0),
('123', '123', 'Student', 'Student', '', '', 9480.6, 9999, '0000-00-00', 'Active', 0),
('123104100', '123', 'Student', 'Student', '', '', 200, 0, '2018-01-18', 'Inactive', 0),
('123104150', '123', 'Student', 'Student', '', '', 150, 0, '2018-01-18', 'Active', 0),
('123104151', '123', 'Student', 'Student', '', '', 50, 0, '2018-01-18', 'Active', 0),
('123104152', '123', 'Student', 'Student', '', '', 100, 0, '2018-01-18', 'Active', 0),
('1234', '123', 'Admin', 'Admin', '', '', 0, 0, '2018-01-28', 'Active', 2),
('2147483647', '123', 'Admin', 'Admin', '', '', 0, 0, '2018-01-27', 'Active', 2),
('333', '123', 'Student', 'Student', '', '', 451.8, 1000, '0000-00-00', 'Inactive', 0),
('6046654', '123', 'Student', 'Student', '', '', 520, 520, '2018-02-11', 'Active', 0),
('777', '123', 'Admin', 'Admin', '', '', 0, 500, '2018-02-05', 'Active', 2),
('99', '123', 'Student', 'Student', '', '', 99, 0, '2018-01-27', 'Active', 0),
('999', '123', 'Student', 'Student', '', '', 123, 0, '0000-00-00', 'Inactive', 0),
('9999', '123', 'Cashier', 'Cashier', '', '', 0, 0, '0000-00-00', 'Active', 1),
('99999', '123', 'Admin', 'Admin', '', '', 0, 0, '2018-01-27', 'Inactive', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD KEY `User_Foreign_Key` (`FK_ID`),
  ADD KEY `Product_Foreign_Key` (`Product_Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `Product_Foreign_Key` FOREIGN KEY (`Product_Name`) REFERENCES `product` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `User_Foreign_Key` FOREIGN KEY (`FK_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
