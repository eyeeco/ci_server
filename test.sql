-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017-08-09 04:01:58
-- 服务器版本： 5.6.36
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `author` varchar(50) COLLATE utf8_bin NOT NULL,
  `http` varchar(200) COLLATE utf8_bin NOT NULL,
  `date` varchar(50) COLLATE utf8_bin NOT NULL,
  `thumbs_up` int(50) NOT NULL DEFAULT '0',
  `collection` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `overview` int(50) NOT NULL DEFAULT '0',
  `category1` int(50) NOT NULL,
  `category2` int(50) NOT NULL,
  `category3` int(50) NOT NULL,
  `text` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `name`, `author`, `http`, `date`, `thumbs_up`, `collection`, `overview`, `category1`, `category2`, `category3`, `text`) VALUES
(10009, '测试文件', 'admin', './images/covers/d2779619e6824953b4442bb9b664c7b7.png', '2017-08-07 20:22:52', 1, '0', 14, 1, 1, 1, '高中语文'),
(10008, '高中生物必修一', 'admin', './images/covers/1375062dbaeb952a070aa8aae5d63517.jpg', '2017-08-07 18:44:31', 1, '0', 122, 6, 1, 1, '具有动能的生命体，也是一个物体的集合，而个体生物指的是生物体，与非生物相对。其元素包括：在自然条件下，通过化学反应生成的具有生存能力和繁殖能力的有生命的物体以及由它（或它们）通过繁殖产生的有生命的后代，能对外界的刺激做出相应反应，能与外界的环境相互依赖、相互促进。并且，能够排出体内无用的物质，具有遗传与变异的特性。');

-- --------------------------------------------------------

--
-- 表的结构 `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(575, 1502245001, '::1', 'juc1'),
(574, 1502244990, '::1', 'q9ng'),
(573, 1502244982, '::1', 'zmfz'),
(572, 1502244979, '::1', 'enqn');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, '语文'),
(2, '数学'),
(3, '英语'),
(4, '物理'),
(5, '化学'),
(6, '生物'),
(7, '历史'),
(8, '政治'),
(9, '地理');

-- --------------------------------------------------------

--
-- 表的结构 `category2`
--

CREATE TABLE `category2` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `category2`
--

INSERT INTO `category2` (`category_id`, `category_name`) VALUES
(1, '高中'),
(2, '初中');

-- --------------------------------------------------------

--
-- 表的结构 `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '资源ID',
  `article_id` int(10) UNSIGNED NOT NULL COMMENT '课程ID',
  `type` tinyint(4) NOT NULL COMMENT '资源类型，0-资料，1-考试',
  `file1` varchar(200) DEFAULT NULL COMMENT '文件1名称',
  `file2` varchar(200) DEFAULT NULL COMMENT '文件2名称',
  `file3` varchar(200) DEFAULT NULL COMMENT '文件3名称',
  `cid` smallint(5) UNSIGNED NOT NULL COMMENT '章节ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `resources`
--

INSERT INTO `resources` (`id`, `article_id`, `type`, `file1`, `file2`, `file3`, `cid`) VALUES
(4, 10007, 0, './resources/评分标准2016.docx', './resources/新建_Microsoft_Word_文档1.docx', './resources/C语言期末考试题2016-A1.doc', 4),
(5, 10008, 0, './resources/自主版权课件1_组成细胞的元素和化合物.doc', './resources/专题1_细胞的分子组成.ppt', './resources/单元质量评估（一）.doc', 1),
(6, 10008, 0, './resources/自主版权课件2_细胞的结构和功能1.doc', './resources/专题2_细胞的结构1.ppt', './resources/第二章组成细胞的分子综合测试题1.doc', 2),
(7, 10008, 0, './resources/自主版权课件3_酶与ATP、细胞呼吸.doc', './resources/专题3_物质跨膜运输、酶和ATP.ppt', './resources/考试3_酶与ATP、细胞呼吸.doc', 3),
(8, 10008, 0, './resources/自主版权课件4_光合作用.doc', './resources/单元质量评估（四）.doc', './resources/单元质量评估（四）1.doc', 4),
(9, 10008, 0, './resources/自主版权课件5_细胞的生命历程.doc', './resources/自主版权课件5_细胞的生命历程1.doc', './resources/第五章细胞的能量供应和利用综合测试题.doc', 5),
(10, 10008, 1, './resources/必修一课时训练（_第一章_走进细胞）1.DOC', './resources/必修一课时训练（第六章_第一讲_细胞的增殖）.DOC', '', 6),
(11, 10008, 1, './resources/【人教版】2014届高三生物一轮复习专题培优课_解答蛋白质计算题的三把“金钥匙”1.doc', './resources/【人教版】2014届高三生物一轮复习专题培优课_破解酶实验难题的三种方法1.doc', '', 7),
(12, 10009, 0, './resources/58bced3a06e49.doc', './resources/58bced3a06e491.doc', './resources/58bcef0c9899c.doc', 1),
(13, 10009, 0, './resources/97881Z_(1).pdf', './resources/97881Z_(1)1.pdf', './resources/97881Z.pdf', 2),
(14, 10009, 1, './resources/A-151.pdf', './resources/ICCCT.pdf', '', 3),
(15, 10009, 1, './resources/58bcef0c9899c1.doc', '', '', 4);

-- --------------------------------------------------------

--
-- 表的结构 `usr`
--

CREATE TABLE `usr` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `regis_time` varchar(50) NOT NULL,
  `regis_ip` varchar(50) NOT NULL,
  `last_time` varchar(50) DEFAULT NULL,
  `last_ip` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `usr`
--

INSERT INTO `usr` (`id`, `username`, `password`, `slug`, `email`, `status`, `role`, `regis_time`, `regis_ip`, `last_time`, `last_ip`) VALUES
(10004, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '312@qq.com', '1', '1', '2017-07-20-21:15:15', '::1', '2017-08-08-19:16:41', '::1'),
(10005, '刘相', 'e10adc3949ba59abbe56e057f20f883e', '刘相', '12314@11.com', '1', '1', '2017-07-21-22:16:31', '::1', '2017-07-26-14:59:37', '::1');

-- --------------------------------------------------------

--
-- 表的结构 `usr_link`
--

CREATE TABLE `usr_link` (
  `id` int(10) NOT NULL,
  `article_id` int(50) NOT NULL,
  `usr` varchar(50) NOT NULL,
  `ca1` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `usr_link`
--

INSERT INTO `usr_link` (`id`, `article_id`, `usr`, `ca1`) VALUES
(10000, 10000, 'admin', 1),
(10001, 10002, 'admin', 1),
(10002, 10008, 'admin', 1),
(10003, 10009, 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category2`
--
ALTER TABLE `category2`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`slug`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `usr_link`
--
ALTER TABLE `usr_link`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010;
--
-- 使用表AUTO_INCREMENT `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;
--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `category2`
--
ALTER TABLE `category2`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '资源ID', AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10008;
--
-- 使用表AUTO_INCREMENT `usr_link`
--
ALTER TABLE `usr_link`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
