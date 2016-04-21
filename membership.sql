-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-20 13:46:08
-- 服务器版本： 10.0.23-MariaDB-log
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `membership`
--

-- --------------------------------------------------------

--
-- 表的结构 `ms_admin`
--

CREATE TABLE IF NOT EXISTS `ms_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL COMMENT '登陆名',
  `nickname` varchar(100) NOT NULL DEFAULT '未命名用户' COMMENT '显示名',
  `password` varchar(100) NOT NULL COMMENT '登陆密码',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱地址',
  `admin_group` int(11) DEFAULT NULL COMMENT '用户组ID',
  `create_at` varchar(25) NOT NULL COMMENT '创建时间',
  `update_at` varchar(25) NOT NULL COMMENT '修改时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '用户状态'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `ms_admin`
--

INSERT INTO `ms_admin` (`id`, `name`, `nickname`, `password`, `email`, `admin_group`, `create_at`, `update_at`, `status`) VALUES
(1, 'admin', '王将', '5259ee4a034fdeddd1b65be92debe731', 'admin@admin.com', 1, '', '1461077254', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ms_admin_group`
--

CREATE TABLE IF NOT EXISTS `ms_admin_group` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '组名',
  `privileges` text NOT NULL COMMENT '权限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- --------------------------------------------------------

--
-- 表的结构 `ms_card`
--

CREATE TABLE IF NOT EXISTS `ms_card` (
  `id` int(11) NOT NULL,
  `vip_card` varchar(50) NOT NULL COMMENT '卡号',
  `vip_card_password` varchar(50) NOT NULL COMMENT '卡密码',
  `member_id` int(11) NOT NULL COMMENT '会员id',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否激活',
  `token` varchar(50) NOT NULL COMMENT 'token',
  `last_login_ip` varchar(30) NOT NULL,
  `last_login_time` varchar(30) NOT NULL,
  `active_time` varchar(30) NOT NULL COMMENT '激活时间',
  `create_at` varchar(30) NOT NULL COMMENT '创建时间',
  `update_at` varchar(30) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COMMENT='会员卡表';

--
-- 转存表中的数据 `ms_card`
--

INSERT INTO `ms_card` (`id`, `vip_card`, `vip_card_password`, `member_id`, `status`, `token`, `last_login_ip`, `last_login_time`, `active_time`, `create_at`, `update_at`) VALUES
(1, 'vip01', 'asdf', 22, 0, 'f1c38065712e7da32e46592be7bd2ca0', '127.0.0.1', '1461053872', '1460943515', '1460943515', '1461065633'),
(64, 'vip02', 'asdf', 0, 0, '', '', '', '', '', ''),
(65, 'vip03', 'asdf', 0, 0, '', '', '', '', '', ''),
(66, 'vip04', 'asdf', 0, 0, '', '', '', '', '', ''),
(67, 'vip05', 'asdf', 0, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `ms_member`
--

CREATE TABLE IF NOT EXISTS `ms_member` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT '新会员' COMMENT '用户姓名',
  `birth` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '生日',
  `birth_year` varchar(8) CHARACTER SET utf8 NOT NULL COMMENT '生日-年',
  `birth_month` varchar(4) CHARACTER SET utf8 NOT NULL COMMENT '生日-月',
  `birth_day` varchar(4) CHARACTER SET utf8 NOT NULL COMMENT '生日-日',
  `phone` varchar(13) CHARACTER SET utf8 NOT NULL COMMENT '手机号',
  `phone_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '手机是否验证',
  `token` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '登录token',
  `last_login_time` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '最新登录时间',
  `last_login_ip` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '最新登录ip',
  `create_at` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '用户创建时间',
  `update_at` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '用户更新时间',
  `status` tinyint(2) DEFAULT '1' COMMENT '用户状态'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';

--
-- 转存表中的数据 `ms_member`
--

INSERT INTO `ms_member` (`id`, `name`, `birth`, `birth_year`, `birth_month`, `birth_day`, `phone`, `phone_status`, `token`, `last_login_time`, `last_login_ip`, `create_at`, `update_at`, `status`) VALUES
(1, '新会员', '2016-01-05', '2016', '1', '1', '15511111111', 0, '', '1460943515', '', '1460943515', '1460963568', 0),
(4, 'wj', '2016-04-10', '', '', '', '18626210575', 0, '', '', '', '1460965636', '', 1),
(5, 'wj', '2016-04-01', '', '', '', '18626210573', 1, '', '', '', '1461048756', '', 1),
(7, 'wj', '2016-04-13', '', '', '', '18626210574', 1, '', '', '', '1461050261', '', 1),
(11, 'aaa', '2016-04-05', '', '', '', '18626210576', 1, '', '', '', '1461052599', '', 1),
(15, '系统生成用户', '', '', '', '', '', 0, '4ba92acf7c72dd16089954dbf5eea63d', '1461122204', '127.0.0.1', '', '', 0),
(19, '系统生成用户', '', '', '', '', '90cdb1045d44d', 0, '90cdb1045d44d7005618da35d6c121c2', '1461122430', '127.0.0.1', '', '', 0),
(21, 'wj', '2016-04-21', '', '', '', '18626210577', 1, '', '', '', '1461129931', '', 1),
(22, '系统生成用户', '', '', '', '', '2dc88eb197aeb', 0, '2dc88eb197aeb74cef81fdf36adb0e5a', '1461130268', '127.0.0.1', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ms_module`
--

CREATE TABLE IF NOT EXISTS `ms_module` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL COMMENT '模块名',
  `parent` int(11) NOT NULL DEFAULT '0' COMMENT '父模块id',
  `url` varchar(100) NOT NULL COMMENT 'url (短url)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模块表';

-- --------------------------------------------------------

--
-- 表的结构 `ms_notice`
--

CREATE TABLE IF NOT EXISTS `ms_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(300) CHARACTER SET utf8 NOT NULL COMMENT '公告头部',
  `content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
  `create_at` varchar(30) CHARACTER SET utf8 NOT NULL,
  `update_at` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `ms_notice`
--

INSERT INTO `ms_notice` (`id`, `title`, `content`, `create_at`, `update_at`, `status`) VALUES
(1, '这是第一个公告', '这是第一个公告的内容这是第一个公告的内容这是第一个公告的内容这是第一个公告的内容这是第一个公告的内容这是第一个公告的内容这是第一个公告的内容这是第一个公告的内容这是第一个公告的内容', '1461063459', '1461065740', 0),
(3, '这是第二个公告标题', '这是第二个公告内容', '1461074433', '1461075762', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ms_site`
--

CREATE TABLE IF NOT EXISTS `ms_site` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '站点名称',
  `author` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'ASL工作室' COMMENT '站点作者',
  `keywords` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '站点关键字',
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '站点描述'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `ms_site`
--

INSERT INTO `ms_site` (`id`, `name`, `author`, `keywords`, `description`) VALUES
(1, '微信会员管理系统', 'ASL工作室', '微信会员管理系统,ASL工作室', '微信会员管理系统,ASL工作室');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_admin`
--
ALTER TABLE `ms_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ms_admin_group`
--
ALTER TABLE `ms_admin_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_card`
--
ALTER TABLE `ms_card`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vip_card` (`vip_card`);

--
-- Indexes for table `ms_member`
--
ALTER TABLE `ms_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `ms_module`
--
ALTER TABLE `ms_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_notice`
--
ALTER TABLE `ms_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_site`
--
ALTER TABLE `ms_site`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_admin`
--
ALTER TABLE `ms_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ms_admin_group`
--
ALTER TABLE `ms_admin_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_card`
--
ALTER TABLE `ms_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `ms_member`
--
ALTER TABLE `ms_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ms_module`
--
ALTER TABLE `ms_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_notice`
--
ALTER TABLE `ms_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ms_site`
--
ALTER TABLE `ms_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
