SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `inventorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `productId` int(11) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `dates` date NOT NULL,
  `qty` int(11) NOT NULL,
  `pricePU` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`productId`, `productName`, `dates`, `qty`, `pricePU`, `units`, `Total`) VALUES
(10000, 'Monitor', '0000-00-00', 0, 50000, 18, 900000),
(10001, 'CPU', '0000-00-00', 0, 30000, 20, 600000),
(10002, 'MotherBoard', '0000-00-00', 0, 37000, 18, 666000),
(10003, 'Ram', '0000-00-00', 0, 9000, 12, 108000),
(10004, 'Power Supply', '0000-00-00', 0, 15000, 30, 450000),
(10005, 'Cooling Fan', '0000-00-00', 0, 6000, 23, 138000),
(10006, 'Hard Drive', '0000-00-00', 0, 10000, 12, 120000),
(10007, 'Printer', '0000-00-00', 0, 32000, 5, 160000),
(10008, 'Scanner', '0000-00-00', 0, 22000, 7, 154000),
(10009, 'Mouse', '0000-00-00', 0, 1000, 19, 19000),
(10010, 'KeyBoard', '0000-00-00', 0, 1500, 12, 18000),
(10011, 'PenDrive', '0000-00-00', 0, 520, 16, 8000),
(10012, 'Ram', '0000-00-00', 0, 5000, 10, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `productID` int(11) NOT NULL,
  `dates` date NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`productID`, `dates`, `qty`) VALUES
(10002, '2022-05-02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `productID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`productID`, `qty`, `dates`) VALUES
(10000, 2, '2022-03-10'),
(10012, 20, '2022-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `pass`, `fname`, `lname`) VALUES
(11111, '1234567890', ' John', 'Peter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11111;
COMMIT;
