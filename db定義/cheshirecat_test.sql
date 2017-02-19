-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 2 月 19 日 04:08
-- サーバのバージョン： 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheshirecat_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `StaffId` varchar(8) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `StaffName` int(30) NOT NULL,
  `StaffNameKana` int(60) NOT NULL,
  `UserAuthority` int(1) NOT NULL,
  `CriateDataTime` datetime NOT NULL,
  `UpdateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `application`
--

CREATE TABLE `application` (
  `StaffId` varchar(8) NOT NULL,
  `SubmitDate` datetime NOT NULL,
  `CorpName` varchar(255) NOT NULL,
  `SubmitClass` int(255) NOT NULL,
  `SubmitStatus` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `crient`
--

CREATE TABLE `crient` (
  `CrientId` int(8) NOT NULL,
  `CrientAdmin` int(11) NOT NULL,
  `CorprationName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `CorprationNameKana` varchar(80) CHARACTER SET utf8 NOT NULL,
  `CorpCEOName` varchar(30) CHARACTER SET utf8 NOT NULL,
  `CorpCEONameKana` varchar(60) CHARACTER SET utf8 NOT NULL,
  `PostalCode` varchar(8) CHARACTER SET utf8 NOT NULL,
  `CorpAddress` varchar(150) CHARACTER SET utf8 NOT NULL,
  `CorpTelNumber` varchar(13) CHARACTER SET utf8 NOT NULL,
  `CorpFaxNumber` varchar(12) CHARACTER SET utf8 NOT NULL,
  `CorpMail1` varchar(200) CHARACTER SET utf8 NOT NULL,
  `CorpMail2` varchar(200) CHARACTER SET utf8 NOT NULL,
  `CorpHP` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Remarks` varchar(500) CHARACTER SET utf8 NOT NULL,
  `InchageName` varchar(30) CHARACTER SET utf8 NOT NULL,
  `InchageNameKana` varchar(60) CHARACTER SET utf8 NOT NULL,
  `InchageTelNumber` varchar(13) CHARACTER SET utf8 NOT NULL,
  `InchageMail` varchar(200) CHARACTER SET utf8 NOT NULL,
  `InchageAffiliation` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `crient`
--

INSERT INTO `crient` (`CrientId`, `CrientAdmin`, `CorprationName`, `CorprationNameKana`, `CorpCEOName`, `CorpCEONameKana`, `PostalCode`, `CorpAddress`, `CorpTelNumber`, `CorpFaxNumber`, `CorpMail1`, `CorpMail2`, `CorpHP`, `Remarks`, `InchageName`, `InchageNameKana`, `InchageTelNumber`, `InchageMail`, `InchageAffiliation`) VALUES
(1, 1, '????????', '?????', '1', '1', '111', '0', '3', '3', '0', '0', 'www.index.html', '???????', '0', '0', '90', '0', '0'),
(2, 0, 'opl', 'opllll', 'difpoaih', 'difpoaih', '0', '0', '3', '0', '0', '0', 'www.index.html', 'bikou', '0', '0', '90', '0', '0'),
(3, 0, 'opl', 'opllll', 'difpoaih', 'difpoaih', '0', '0', '3', '0', '0', '0', 'www.index.html', 'bikou', '0', '0', '90', '0', '0'),
(4, 0, 'opl', 'opllll', 'difpoaih', 'difpoaih', '0', '0', '3', '0', '0', '0', 'www.index.html', 'bikou', '0', '0', '90', '0', '0'),
(5, 0, 'aaaa', 'bbbb', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0'),
(6, 0, 'aaaa', 'bbbb', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0'),
(7, 0, 'aaaa', 'bbbb', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0'),
(8, 0, 'aaaa', 'bbbb', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0'),
(9, 0, 'aaaa', 'bbbb', '', '', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0'),
(10, 1, 'オープラン', 'オープラン', '1', '1', '222', '0', '3', '0', '0', '0', 'http://www', 'メモだよ', '0', '0', '0', '0', '0'),
(11, 2, 'おならシステムズ', 'オナラシステムズ', '2', '2', '03-2222-', '東京都墨田区', '090-1112-0093', '03-2093-2093', 'piyo.@mail.co.jp', 'piyopiyo@maikl.co.pj', 'http://www.google.co.jp', 'メモを増やしました\r\n', 'お尻ー', 'オシリー', '090-1111-2222', 'tantou@mail.co.jp', 'しょぞくｋ'),
(12, 2, 'おならシステムズ', 'オナラシステムズ', 'オアならー', 'オアナラー', '03-2222-', '東京都墨田区', '090-1112-0093', '03-2093-2093', 'piyo.@mail.co.jp', 'piyopiyo@maikl.co.pj', 'http://www.google.co.jp', 'メモを増やしました\r\n', 'お尻ー', 'オシリー', '090-1111-2222', 'tantou@mail.co.jp', 'しょぞくｋ');

-- --------------------------------------------------------

--
-- テーブルの構造 `login`
--

CREATE TABLE `login` (
  `StaffId` varchar(8) NOT NULL,
  `MissLoginCount` int(1) NOT NULL,
  `LoginFlg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `mail`
--

CREATE TABLE `mail` (
  `MailId` varchar(8) NOT NULL,
  `MailDraft` text NOT NULL,
  `CriateDataTime` datetime NOT NULL,
  `UpdateTime` datetime NOT NULL,
  `SubmitDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `mailtemplate`
--

CREATE TABLE `mailtemplate` (
  `MailTemplatenemaId` varchar(40) NOT NULL,
  `Mailtempsent` text NOT NULL,
  `CriateDataTime` datetime NOT NULL,
  `UpdateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `salescallhistory`
--

CREATE TABLE `salescallhistory` (
  `CrientId` int(8) NOT NULL,
  `VisitNo` int(255) NOT NULL,
  `Date` date NOT NULL,
  `CrientName` varchar(40) NOT NULL,
  `StaffName` varchar(40) NOT NULL,
  `Remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`StaffId`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`StaffId`);

--
-- Indexes for table `crient`
--
ALTER TABLE `crient`
  ADD PRIMARY KEY (`CrientId`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`MailId`);

--
-- Indexes for table `mailtemplate`
--
ALTER TABLE `mailtemplate`
  ADD PRIMARY KEY (`MailTemplatenemaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crient`
--
ALTER TABLE `crient`
  MODIFY `CrientId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
