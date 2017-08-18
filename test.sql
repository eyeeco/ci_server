-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-08-18 20:15:56
-- 服务器版本： 5.7.18-log
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

DROP TABLE IF EXISTS `article`;
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
(10011, '高中语文', 'admin', './images/covers/dd31d0374b3c82df56673695abc90fe2.jpg', '2017-08-16 01:48:12', 1, '0', 15, 1, 1, 1, '111'),
(10010, '生物必修一精品课件', 'admin', './images/covers/e6502fbaee7e5562164d373b9decf4b7.jpg', '2017-08-09 04:53:49', 2, '0', 71, 6, 1, 1, '具有动能的生命体，也是一个物体的集合，而个体生物指的是生物体，与非生物相对。其元素包括：在自然条件下，通过化学反应生成的具有生存能力和繁殖能力的有生命的物体以及由它（或它们）通过繁殖产生的有生命的后代，能对外界的刺激做出相应反应，能与外界的环境相互依赖、相互促进。并且，能够排出体内无用的物质，具有遗传与变异的特性。'),
(10012, '必修一', 'brook', './images/covers/1602cd142cd206dc8041d50011dab780.jpg', '2017-08-17 20:28:32', 0, '0', 1, 1, 1, 1, '高中语文必修一'),
(10013, '必修二', 'brook', './images/covers/7037b1bffb52e53c0405ad35a746a664.jpg', '2017-08-18 19:19:52', 0, '0', 0, 5, 1, 1, '高中化学必修二'),
(10014, '近代史', 'brook', './images/covers/8b07f2a0a974d950df10c97246d069c8.jpg', '2017-08-18 19:46:09', 0, '0', 0, 7, 1, 1, '高中历史近代史部分');

-- --------------------------------------------------------

--
-- 表的结构 `captcha`
--

DROP TABLE IF EXISTS `captcha`;
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
(1030, 1503058266, '::1', 'b21n'),
(1028, 1503058236, '::1', 'ey2v'),
(1027, 1503058225, '::1', '27or'),
(1029, 1503058258, '::1', '1zhu');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

DROP TABLE IF EXISTS `category`;
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

DROP TABLE IF EXISTS `category2`;
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
-- 表的结构 `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `fid` int(10) UNSIGNED NOT NULL COMMENT '文件ID',
  `aid` int(10) UNSIGNED NOT NULL COMMENT 'article_id，课程ID',
  `fname` varchar(100) NOT NULL COMMENT '文件名称',
  `fpath` varchar(200) NOT NULL COMMENT '文件路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `files`
--

INSERT INTO `files` (`fid`, `aid`, `fname`, `fpath`) VALUES
(1, 10013, '第一章', './resources/单元质量评估（一）1.pdf'),
(2, 10013, '第二章', './resources/自主版权课件1_组成细胞的元素和化合物11.pdf'),
(3, 10013, '第三章', './resources/专题2_细胞的结构1.pdf'),
(4, 10014, '第一章', './resources/【人教版】2014届高三生物一轮复习专题培优课_解答蛋白质计算题的三把“金钥匙”1.pdf'),
(5, 10014, '第二章', './resources/专题2_细胞的结构2.pdf'),
(6, 10014, '第三章', './resources/专题2_细胞的结构3.pdf'),
(7, 10014, '第四章', './resources/专题1_细胞的分子组成1.pdf');

-- --------------------------------------------------------

--
-- 表的结构 `resources`
--

DROP TABLE IF EXISTS `resources`;
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
(16, 10010, 0, './resources/自主版权课件1_组成细胞的元素和化合物.pdf', './resources/专题1_细胞的分子组成.pdf', './resources/单元质量评估（一）.pdf', 1),
(17, 10010, 0, './resources/自主版权课件2_细胞的结构和功能.pdf', './resources/专题2_细胞的结构.pdf', './resources/第二章组成细胞的分子综合测试题.pdf', 2),
(18, 10010, 1, './resources/【人教版】2014届高三生物一轮复习专题培优课_解答蛋白质计算题的三把“金钥匙”.pdf', './resources/【人教版】2014届高三生物一轮复习专题培优课_破解酶实验难题的三种方法.pdf', '', 3),
(19, 10011, 0, './resources/2015高考（人教通用）物理大二轮复习配套试题：牛顿运动定律（含2014试题）.pdf', '', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `usr`
--

DROP TABLE IF EXISTS `usr`;
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
(10004, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '312@qq.com', '1', '1', '2017-07-20-21:15:15', '::1', '2017-08-17-00:43:28', '202.118.67.200'),
(10005, '刘相', 'e10adc3949ba59abbe56e057f20f883e', '刘相', '12314@11.com', '1', '1', '2017-07-21-22:16:31', '::1', '2017-07-26-14:59:37', '::1'),
(10008, '张建豪', '0d464421c998fac88ca492d5db06315d', '张建豪', '245317115@qq.com', '1', '1', '2017-08-09-20:36:56', '175.167.130.207', '2017-08-09-07:18:09', '175.167.130.207'),
(10009, 'brook', '5f4dcc3b5aa765d61d8327deb882cf99', 'brook', 'brook@126.com', '1', '1', '2017-08-17-19:34:37', '::1', '2017-08-18-20:11:05', '::1');

-- --------------------------------------------------------

--
-- 表的结构 `usr_link`
--

DROP TABLE IF EXISTS `usr_link`;
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
(10003, 10009, 'admin', 1),
(10004, 10010, 'admin', 1),
(10005, 10010, 'brook', 1),
(10006, 10011, 'brook', 1);

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
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fid`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;
--
-- 使用表AUTO_INCREMENT `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;
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
-- 使用表AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `fid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文件ID', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '资源ID', AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010;
--
-- 使用表AUTO_INCREMENT `usr_link`
--
ALTER TABLE `usr_link`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
