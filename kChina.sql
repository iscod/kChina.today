-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-05-21 13:56:15
-- 服务器版本： 5.6.24
-- PHP Version: 5.5.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kc_book`
--
CREATE DATABASE IF NOT EXISTS `kc_book` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kc_book`;

-- --------------------------------------------------------

--
-- 表的结构 `kc_book`
--

DROP TABLE IF EXISTS `kc_book`;
CREATE TABLE IF NOT EXISTS `kc_book` (
  `book_id` bigint(20) unsigned NOT NULL,
  `uid` bigint(20) unsigned NOT NULL COMMENT 'uid',
  `book_title` varchar(64) NOT NULL COMMENT '书名',
  `book_author` varchar(64) CHARACTER SET utf32 COLLATE utf32_esperanto_ci NOT NULL COMMENT '作者',
  `book_time` date DEFAULT '0000-00-00' COMMENT '出版时间',
  `book_commend` varchar(64) NOT NULL COMMENT '推荐语',
  `book_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '分享时间',
  `book_heat` bigint(20) unsigned NOT NULL COMMENT '人气',
  `kc_level` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐指数'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kc_book`
--

INSERT INTO `kc_book` (`book_id`, `uid`, `book_title`, `book_author`, `book_time`, `book_commend`, `book_registered`, `book_heat`, `kc_level`) VALUES
(1, 1, '平凡的世界', '路遥', '0000-00-00', '一部对时代人生爱情的伟大阐述', '2015-02-28 11:46:33', 10, 1),
(2, 1, '历史的回声', '大海', '0000-00-00', '描绘了晚清时期东北人民生活的真实写照，同时对晚清时期中国的耻辱外交史对中国现今格局找出根源。', '2015-02-28 14:16:52', 8, 10);

-- --------------------------------------------------------

--
-- 表的结构 `kc_book_relat`
--

DROP TABLE IF EXISTS `kc_book_relat`;
CREATE TABLE IF NOT EXISTS `kc_book_relat` (
  `book_id` bigint(20) unsigned NOT NULL COMMENT '书id',
  `trem_id` bigint(20) unsigned NOT NULL COMMENT '分类id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `kc_book_terms`
--

DROP TABLE IF EXISTS `kc_book_terms`;
CREATE TABLE IF NOT EXISTS `kc_book_terms` (
  `term_id` bigint(20) unsigned NOT NULL COMMENT '分类id',
  `name` varchar(200) NOT NULL COMMENT '分类名称',
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kc_book_terms`
--

INSERT INTO `kc_book_terms` (`term_id`, `name`, `slug`) VALUES
(1, '历史', 'c827d8dbb76ce33219f64c6749893159'),
(2, '云卷云舒', 'ec2d05eefc842eb50d0c1d0b837f45ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kc_book`
--
ALTER TABLE `kc_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `kc_book_terms`
--
ALTER TABLE `kc_book_terms`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kc_book`
--
ALTER TABLE `kc_book`
  MODIFY `book_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kc_book_terms`
--
ALTER TABLE `kc_book_terms`
  MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',AUTO_INCREMENT=3;--
-- Database: `kchina`
--
CREATE DATABASE IF NOT EXISTS `kchina` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kchina`;

-- --------------------------------------------------------

--
-- 表的结构 `kc_users`
--

DROP TABLE IF EXISTS `kc_users`;
CREATE TABLE IF NOT EXISTS `kc_users` (
  `ID` bigint(20) unsigned NOT NULL COMMENT 'uid',
  `user_login` varchar(60) NOT NULL COMMENT '登陆名',
  `user_pass` varchar(64) NOT NULL COMMENT '密码',
  `user_nickname` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '昵称',
  `user_email` varchar(100) NOT NULL COMMENT '注册email',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `user_status` int(11) NOT NULL DEFAULT '0' COMMENT '权限或用户等级'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kc_users`
--

INSERT INTO `kc_users` (`ID`, `user_login`, `user_pass`, `user_nickname`, `user_email`, `user_registered`, `user_status`) VALUES
(1, 'IsCod', '8fd443ca438dc7e31783c8907c169f25', '', 'iscodd@gmail.com', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kc_users`
--
ALTER TABLE `kc_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kc_users`
--
ALTER TABLE `kc_users`
  MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'uid',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
