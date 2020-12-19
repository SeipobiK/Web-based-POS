-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 07:48 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

--SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
--SET AUTOCOMMIT = 0;
--START TRANSACTION;
--SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database:  prince 
--

-- --------------------------------------------------------

--
-- Table structure for table  category 

--

CREATE TABLE category (
  CATEGORY_ID int(11) NOT NULL,
  CNAME varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

















--


-- --------------------------------------------------------

--
-- Table structure for table  customer 
--

CREATE TABLE customer (
  CUST_ID int(11) NOT NULL,
  FIRST_NAME varchar(50) DEFAULT NULL,
  LAST_NAME varchar(50) DEFAULT NULL,
  PHONE_NUMBER varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table  customer 
--

-- --------------------------------------------------------

--
-- Table structure for table  employee 
--

CREATE TABLE employee (
   EMPLOYEE_ID  int(11) NOT NULL,
   FIRST_NAME  varchar(50) DEFAULT NULL,
   LAST_NAME  varchar(50) DEFAULT NULL,
   GENDER  varchar(50) DEFAULT NULL,
   EMAIL  varchar(100) DEFAULT NULL,
   PHONE_NUMBER  varchar(11) DEFAULT NULL,
   JOB_ID  int(11) DEFAULT NULL,
   HIRED_DATE  varchar(50) NOT NULL,
   LOCATION_ID  int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
--
--



-- --------------------------------------------------------

--
-- Table structure for table  job 
--

CREATE TABLE  job  (
   JOB_ID  int(11) NOT NULL,
   JOB_TITLE  varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table  job 
--

-- --------------------------------------------------------

--
-- Table structure for table  location 
--

CREATE TABLE  location  (
   LOCATION_ID  int(11) NOT NULL,
   PROVINCE  varchar(100) DEFAULT NULL,
   CITY  varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--


-- --------------------------------------------------------

--
-- Table structure for table  manager 
--

CREATE TABLE  manager  (
   FIRST_NAME  varchar(50) DEFAULT NULL,
   LAST_NAME  varchar(50) DEFAULT NULL,
   LOCATION_ID  int(11) NOT NULL,
   EMAIL  varchar(50) DEFAULT NULL,
   PHONE_NUMBER  varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--



-- --------------------------------------------------------

--

--

CREATE TABLE  product  (
   PRODUCT_ID  int(11) NOT NULL,
   PRODUCT_CODE  varchar(20) NOT NULL,
   NAME  varchar(50) DEFAULT NULL,
   DESCRIPTION  varchar(250) NOT NULL,
   QTY_STOCK  int(50) DEFAULT NULL,
   ON_HAND  int(250) NOT NULL,
   PRICE  int(50) DEFAULT NULL,
   CATEGORY_ID  int(11) DEFAULT NULL,
   SUPPLIER_ID  int(11) DEFAULT NULL,
   DATE_STOCK_IN  varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--


-- --------------------------------------------------------

--
-- Table structure for table  supplier 
--

CREATE TABLE  supplier  (
   SUPPLIER_ID  int(11) NOT NULL,
   COMPANY_NAME  varchar(50) DEFAULT NULL,
   LOCATION_ID  int(11) NOT NULL,
   PHONE_NUMBER  varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE  transaction  (
   TRANS_ID  int(50) NOT NULL,
   CUST_ID  int(11) DEFAULT NULL,
   NUMOFITEMS  varchar(250) NOT NULL,
   SUBTOTAL  varchar(50) NOT NULL,
   LESSVAT  varchar(50) NOT NULL,
   NETVAT  varchar(50) NOT NULL,
   ADDVAT  varchar(50) NOT NULL,
   GRANDTOTAL  varchar(250) NOT NULL,
   CASH  varchar(250) NOT NULL,
   DATE  varchar(50) NOT NULL,
   TRANS_D_ID  varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-
--



-- --------------------------------------------------------

--
-- Table structure for table  transaction_details 
--

CREATE TABLE  transaction_details  (
   ID  int(11) NOT NULL,
   TRANS_D_ID  varchar(250) NOT NULL,
   PRODUCTS  varchar(250) NOT NULL,
   QTY  varchar(250) NOT NULL,
   PRICE  varchar(250) NOT NULL,
   EMPLOYEE  varchar(250) NOT NULL,
   ROLE  varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table  transaction_details 
--


-- --------------------------------------------------------

--
--
--

CREATE TABLE  type  (
   TYPE_ID  int(11) NOT NULL,
   TYPE  varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table  type 
--


-- --------------------------------------------------------

--
-- Table structure for table  users 
--

CREATE TABLE  users  (
   ID  int(11) NOT NULL,
   EMPLOYEE_ID  int(11) DEFAULT NULL,
   USERNAME  varchar(50) DEFAULT NULL,
   PASSWORD  varchar(50) DEFAULT NULL,
   TYPE_ID  int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table  users 
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table  category 
--
ALTER TABLE  category 
  ADD PRIMARY KEY ( CATEGORY_ID );

--
-- Indexes for table  customer 
--
ALTER TABLE  customer 
  ADD PRIMARY KEY ( CUST_ID );

--
-- Indexes for table  employee 
--
ALTER TABLE  employee 
  ADD PRIMARY KEY ( EMPLOYEE_ID ),
  ADD UNIQUE KEY  EMPLOYEE_ID  ( EMPLOYEE_ID ),
  ADD UNIQUE KEY  PHONE_NUMBER  ( PHONE_NUMBER ),
  ADD KEY  LOCATION_ID  ( LOCATION_ID ),
  ADD KEY  JOB_ID  ( JOB_ID );

--
-- Indexes for table  job 
--
ALTER TABLE  job 
  ADD PRIMARY KEY ( JOB_ID );

--
-- Indexes for table  location 
--
ALTER TABLE  location 
  ADD PRIMARY KEY ( LOCATION_ID );

--
-- Indexes for table  manager 
--
ALTER TABLE  manager 
  ADD UNIQUE KEY  PHONE_NUMBER  ( PHONE_NUMBER ),
  ADD KEY  LOCATION_ID  ( LOCATION_ID );

--
-- Indexes for table  product 
--
ALTER TABLE  product 
  ADD PRIMARY KEY ( PRODUCT_ID ),
  ADD KEY  CATEGORY_ID  ( CATEGORY_ID ),
  ADD KEY  SUPPLIER_ID  ( SUPPLIER_ID );

--
-- Indexes for table  supplier 
--
ALTER TABLE  supplier 
  ADD PRIMARY KEY ( SUPPLIER_ID ),
  ADD KEY  LOCATION_ID  ( LOCATION_ID );

--
-- Indexes for table  transaction 
--
ALTER TABLE  transaction 
  ADD PRIMARY KEY ( TRANS_ID ),
  ADD KEY  TRANS_DETAIL_ID  ( TRANS_D_ID ),
  ADD KEY  CUST_ID  ( CUST_ID );

--
-- Indexes for table  transaction_details 
--
ALTER TABLE  transaction_details 
  ADD PRIMARY KEY ( ID ),
  ADD KEY  TRANS_D_ID  ( TRANS_D_ID ) USING BTREE;

--
-- Indexes for table  type 
--
ALTER TABLE  type 
  ADD PRIMARY KEY ( TYPE_ID );

--
-- Indexes for table  users 
--
ALTER TABLE  users 
  ADD PRIMARY KEY ( ID ),
  ADD KEY  TYPE_ID  ( TYPE_ID),
  ADD KEY  EMPLOYEE_ID  ( EMPLOYEE_ID );

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table  category 
--
ALTER TABLE  category 
  MODIFY  CATEGORY_ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table  customer 
--
ALTER TABLE  customer 
  MODIFY  CUST_ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table  employee 
--
ALTER TABLE  employee 
  MODIFY  EMPLOYEE_ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table  location 
--
ALTER TABLE  location 
  MODIFY  LOCATION_ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table  product 
--
ALTER TABLE  product 
  MODIFY  PRODUCT_ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table  supplier 
--
ALTER TABLE  supplier 
  MODIFY  SUPPLIER_ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table  transaction 
--
ALTER TABLE  transaction 
  MODIFY  TRANS_ID  int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table  transaction_details 
--
ALTER TABLE  transaction_details 
  MODIFY  ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table  users 
--
ALTER TABLE  users 
  MODIFY  ID  int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table  employee 
--
ALTER TABLE  employee 
  ADD CONSTRAINT  employee_ibfk_1  FOREIGN KEY ( LOCATION_ID ) REFERENCES  location  ( LOCATION_ID ),
  ADD CONSTRAINT  employee_ibfk_2  FOREIGN KEY ( JOB_ID ) REFERENCES  job  ( JOB_ID );

--
-- Constraints for table  manager 
--
ALTER TABLE  manager 
  ADD CONSTRAINT  manager_ibfk_1  FOREIGN KEY ( LOCATION_ID ) REFERENCES  location  ( LOCATION_ID );

--
-- Constraints for table  product 
--
ALTER TABLE  product 
  ADD CONSTRAINT  product_ibfk_1  FOREIGN KEY ( CATEGORY_ID ) REFERENCES  category  ( CATEGORY_ID ),
  ADD CONSTRAINT  product_ibfk_2  FOREIGN KEY ( SUPPLIER_ID ) REFERENCES  supplier  ( SUPPLIER_ID );

--
-- Constraints for table  supplier 
--
ALTER TABLE  supplier 
  ADD CONSTRAINT  supplier_ibfk_1  FOREIGN KEY ( LOCATION_ID ) REFERENCES  location  ( LOCATION_ID );

--
-- Constraints for table  transaction 
--
ALTER TABLE  transaction 
  ADD CONSTRAINT  transaction_ibfk_3  FOREIGN KEY ( CUST_ID ) REFERENCES  customer  ( CUST_ID ),
  ADD CONSTRAINT  transaction_ibfk_4  FOREIGN KEY ( TRANS_D_ID ) REFERENCES  transaction_details  ( TRANS_D_ID );

--
-- Constraints for table  users 
--
ALTER TABLE  users 
  ADD CONSTRAINT  users_ibfk_3  FOREIGN KEY ( TYPE_ID ) REFERENCES  type  ( TYPE_ID ),
  ADD CONSTRAINT  users_ibfk_4  FOREIGN KEY ( EMPLOYEE_ID ) REFERENCES  employee  ( EMPLOYEE_ID );
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
