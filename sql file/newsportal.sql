-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 28, 2023 lúc 02:45 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `newsportal`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `AdminPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `CreationDate`) VALUES
(1, 'admin', '$2y$12$Pva1.RkyZLC7ZW/pLlHAS.ukKvo7M9uJPzThstcmArImfkCdzNtM2', 'campcodes@gmail.comsongtho123@gmail.com', '2020-03-27 17:51:00'),
(2, 'admin1', '123', 'songtho123@gmail.com', '2023-11-20 14:19:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` datetime DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(13, 'Bóng đá', 'Tin bóng đá', '2023-11-20 13:44:38', NULL, 1),
(14, 'Bóng chuyền', 'Tin bóng chuyền', '2023-11-20 13:44:58', NULL, 1),
(15, 'Bóng rổ', 'Tin bóng rổ', '2023-11-20 13:45:08', NULL, 1),
(16, 'Cầu lông', 'Tin cầu lông', '2023-11-20 13:45:17', NULL, 1),
(17, 'Bơi lội', 'Tin bơi lội', '2023-11-20 13:45:28', NULL, 1),
(18, 'Esport', 'Tin Esport\r\n', '2023-11-20 13:45:55', NULL, 1),
(19, 'test', 'test1\r\n', '2023-11-26 07:39:14', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `comment` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(4, '12', 'nguyen le huu tho', 'songtho123@gmail.com', 'b?i n?y hay', '2023-11-20 09:33:20', 1),
(5, '11', 'a', 'songtho123@gmail.com', 'hay', '2023-11-20 13:02:39', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PageTitle` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'Th?ng tin', '<span id=\"docs-internal-guid-a6b59d73-7fff-1c5f-c69b-006c01f550f6\"><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 21pt; font-family: &quot;Times New Roman&quot;, serif; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; white-space-collapse: preserve;\">Welcome to the newsportal sports news site, here we will update the latest, hottest news on issues surrounding daily sports news.</span></p><br><p dir=\"ltr\" style=\"line-height:1.542857142857143;margin-top:-1pt;margin-bottom:-1pt;\"><span style=\"font-size: 21pt; font-family: &quot;Times New Roman&quot;, serif; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; white-space-collapse: preserve;\">If you encounter problems with the website or want to give us feedback, please send an email or call the phone number below:</span></p><div><span style=\"font-size: 21pt; font-family: &quot;Times New Roman&quot;, serif; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></div></span>', '2018-06-30 18:01:03', '2023-11-20 13:37:32'),
(2, 'contactus', 'Contact us', '<p><b>Dia Chi:</b><span style=\"font-family: &quot;Times New Roman&quot;;\">&nbsp;Ho chi minh</span><br></p><p><font face=\"Times New Roman\"><b>Sdt:</b> 123456789</font></p><p><font face=\"Times New Roman\"><b>Email:</b> songtho123@gmaIl.com</font></p>', '2018-06-30 18:01:36', '2023-11-20 13:29:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PostImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(14, 'Haaland phá kỷ lục của cựu tiền đạo Man Utd', 13, 11, '<p><span style=\"color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Tiền đạo Man City Erling Haaland phá kỷ lục cầu thủ cần ít trận nhất để ghi 50 bàn Ngoại hạng Anh của Andy Cole.</span></p><p class=\"Normal\" style=\"margin-bottom: 1em; padding: 0px; text-rendering: optimizespeed; line-height: 28.8px; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Tối 25/11, với bàn mở tỷ số trong trận Man City hoà Liverpool 1-1 ở vòng 13, Haaland cán mốc 50 bàn Ngoại hạng Anh. Tiền đạo 23 tuổi người Na Uy chỉ cần 48 trận để đạt con số này, trong khi kỷ lục trước đó thuộc về Andy Cole với 65 trận. Điểm nổi bật duy nhất của Cole là không cần bất cứ quả phạt đền nào khi xác lập cột mốc kể trên.</p><p class=\"Normal\" style=\"margin-bottom: 1em; padding: 0px; text-rendering: optimizespeed; line-height: 28.8px; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Các cầu thủ xếp tiếp theo trong danh sách này gồm: Alan Shearer (66 trận), Ruud Van Nistelrooy (68 trận), Fernando Torres và Mohammed Salah (72 trận).</p><figure data-size=\"true\" itemprop=\"associatedMedia image\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\" class=\"tplCaption action_thumb_added\" style=\"margin-right: auto; margin-bottom: 15px; margin-left: auto; padding: 0px; text-rendering: optimizelegibility; max-width: 100%; clear: both; position: relative; text-align: center; width: 680px; float: left; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\"><div class=\"fig-picture\" style=\"margin: 0px; padding: 0px 0px 453.038px; text-rendering: optimizelegibility; width: 680px; float: left; display: table; -webkit-box-pack: center; justify-content: center; background: rgb(240, 238, 234); position: relative;\"><picture data-inimage=\"done\" style=\"margin: 0px; padding: 0px; text-rendering: optimizelegibility;\"><source data-srcset=\"https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2GbMq-57kShLwewnU6Nmlg 1x, https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=xcx-PFKQYAOHli8U1sNiOA 1.5x, https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=TSEpQiGWBGdJCP8bibcUrw 2x\" srcset=\"https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2GbMq-57kShLwewnU6Nmlg 1x, https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=1020&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=xcx-PFKQYAOHli8U1sNiOA 1.5x, https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=TSEpQiGWBGdJCP8bibcUrw 2x\" style=\"margin: 0px; padding: 0px; text-rendering: optimizelegibility;\"><img itemprop=\"contentUrl\" loading=\"lazy\" intrinsicsize=\"680x0\" alt=\"Haaland sút ghi bàn trong trận Man City 1-1 Liverpool ở vòng 13 Ngoại hạng Anh tối 25/11, trên sân Etihad. Ảnh: Reuters\" class=\"lazy lazied\" src=\"https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2GbMq-57kShLwewnU6Nmlg\" data-src=\"https://i1-thethao.vnecdn.net/2023/11/26/haaland3-8401-1700963384.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=2GbMq-57kShLwewnU6Nmlg\" data-ll-status=\"loaded\" style=\"margin: 0px; padding: 0px; text-rendering: optimizelegibility; font-size: 0px; line-height: 0; max-width: 100%; position: absolute; top: 0px; left: 0px; max-height: 700px; width: 680px;\"><div class=\"embed-container-ads\" style=\"margin-top: 0px; margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-left: 0px; text-rendering: optimizelegibility; width: 680px; background: transparent; overflow: hidden; float: left; height: 100px; position: absolute; bottom: -1px; margin-bottom: 0px !important; padding-bottom: 0px !important;\"><div id=\"sis_inimage\" style=\"margin: 0px; padding: 0px; text-rendering: optimizelegibility; position: relative; width: 680px; height: 100px;\"></div></div></picture></div><figcaption itemprop=\"description\" style=\"margin: 0px; padding: 0px; text-rendering: optimizelegibility; width: 680px; float: left; text-align: left;\"><p class=\"Image\" style=\"padding: 10px 0px 0px; text-rendering: optimizespeed; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-stretch: normal; font-size: 14px; line-height: 22.4px;\">Haaland sút ghi bàn trong trận Man City 1-1 Liverpool ở vòng 13 Ngoại hạng Anh tối 25/11, trên sân Etihad. Ảnh:&nbsp;<em style=\"margin: 0px; padding: 0px; text-rendering: optimizelegibility;\">Reuters</em></p></figcaption></figure><p class=\"Normal\" style=\"margin-bottom: 1em; padding: 0px; text-rendering: optimizespeed; line-height: 28.8px; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Với Man Utd, Cole từng giành năm Ngoại hạng Anh và một Champions League. Trên mọi đấu trường, huyền thoại 52 tuổi từng ghi 121 bàn trong 257 trận cho Man Utd, 68 bàn trong 84 trận cho Newcastle, 37 bàn trong 100 trận cho Blackburn Rovers, 13 bàn trong 39 trận cho Fulham và 10 bàn trong 23 trận cho Man City.</p><p class=\"Normal\" style=\"margin-bottom: 1em; padding: 0px; text-rendering: optimizespeed; line-height: 28.8px; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Mục tiêu tiếp theo của Haaland có thể là cầu thủ ghi 100 bàn Ngoại hạng Anh nhanh nhất. Shearer đang giữ kỷ lục này qua 124 trận.</p><p class=\"Normal\" style=\"margin-bottom: 1em; padding: 0px; text-rendering: optimizespeed; line-height: 28.8px; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Mùa trước, với 36 bàn,&nbsp;<a href=\"https://vnexpress.net/chu-de/erling-haaland-979\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_NgoaiHangAnh_TinTuc-4681390&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Haaland&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\" style=\"margin: 0px; padding: 0px 0px 1px; text-rendering: optimizelegibility; color: rgb(7, 109, 182); position: relative; text-underline-position: under; border-bottom-width: 1px; border-bottom-style: solid;\">Haaland</a>&nbsp;đã phá kỷ lục cầu thủ ghi nhiều bàn nhất trong một mùa Ngoại hạng Anh. Kỷ lục trước đó là 32 bàn do Salah lập vào mùa 2017-2018.</p><p class=\"Normal\" style=\"margin-bottom: 1em; padding: 0px; text-rendering: optimizespeed; line-height: 28.8px; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Trên sân Etihad hôm qua, Haaland mở tỷ số phút 27. Sau khi nhận đường chuyền của Nathan Ake, tiền đạo 23 tuổi chạm hai nhịp để đưa bóng vào vòng cấm và ổn định vị trí rồi sút bật tay thủ môn Alisson. Tuy nhiên, Man City không bảo toàn được ba điểm. Phút 80, sau đường chuyền của Salah, Trent Alexander-Arnold sút chéo góc gỡ hòa cho&nbsp;<a href=\"https://vnexpress.net/the-thao/du-lieu-bong-da/doi-bong/liverpool-40\" rel=\"dofollow\" style=\"margin: 0px; padding: 0px 0px 1px; text-rendering: optimizelegibility; color: rgb(7, 109, 182); position: relative; text-underline-position: under; border-bottom-width: 1px; border-bottom-style: solid;\">Liverpool</a>.</p><p class=\"Normal\" style=\"margin-bottom: 1em; padding: 0px; text-rendering: optimizespeed; line-height: 28.8px; color: rgb(34, 34, 34); font-family: arial; font-size: 18px; background-color: rgb(252, 250, 246);\">Sau trận này,&nbsp;<a href=\"https://vnexpress.net/the-thao/du-lieu-bong-da/doi-bong/man-city-50\" rel=\"dofollow\" style=\"margin: 0px; padding: 0px 0px 1px; text-rendering: optimizelegibility; color: rgb(7, 109, 182); position: relative; text-underline-position: under; border-bottom-width: 1px; border-bottom-style: solid;\">Man City</a>&nbsp;mất vị trí dẫn đầu khi chỉ có 29 điểm sau 13 trận. Trong khi đó, sau trận thắng 1-0 trên sân của Brentford, Arsenal lên dẫn đầu với 30 điểm. Liverpool xếp thứ ba với 28 điểm.</p><p><br></p>', '2023-11-26 07:45:12', NULL, 1, 'Haaland-phá-kỷ-lục-của-cựu-tiền-đạo-Man-Utd', '3a0d281851a56526d9e258a7690b497f.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `SubCatDescription` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', '2018-06-22 15:45:38', '0000-00-00 00:00:00', 1),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', '2018-06-30 09:00:43', '0000-00-00 00:00:00', 1),
(5, 3, 'Football', 'Football', '2018-06-30 09:00:58', '0000-00-00 00:00:00', 1),
(6, 5, 'Television', 'TeleVision', '2018-06-30 18:59:22', '0000-00-00 00:00:00', 1),
(7, 6, 'National', 'National', '2018-06-30 19:04:29', '0000-00-00 00:00:00', 1),
(8, 6, 'International', 'International', '2018-06-30 19:04:43', '0000-00-00 00:00:00', 1),
(9, 7, 'India', 'India', '2018-06-30 19:08:42', '0000-00-00 00:00:00', 1),
(11, 13, 'Bóng đá nam', 'Bóng đá nam', '2023-11-20 13:47:46', NULL, 1),
(12, 13, 'Bóng đá nữ', 'Bóng đá nữ', '2023-11-20 13:48:00', NULL, 1),
(13, 14, 'Bóng chuyền nam', 'Bóng chuyền nam', '2023-11-20 13:48:54', NULL, 1),
(14, 14, 'Bóng chuyền nữ', 'Bóng chuyền nữ', '2023-11-20 13:49:01', NULL, 1),
(15, 15, 'Nghiệp dư', 'Nghiệp dư', '2023-11-20 13:55:34', NULL, 1),
(16, 15, 'Chuyên nghiệp', 'Chuyên nghiệp', '2023-11-20 13:55:51', NULL, 1),
(17, 16, 'Cầu lông nam', 'Cầu lông nam', '2023-11-20 13:58:43', NULL, 1),
(18, 16, 'Cầu lông nữ ', 'Cầu lông nữ ', '2023-11-20 13:58:51', NULL, 1),
(19, 17, 'Bơi lội nam', 'Bơi lội nam', '2023-11-20 13:59:03', NULL, 1),
(20, 17, 'Bơi lội nữ ', 'Bơi lội nữ ', '2023-11-20 13:59:21', NULL, 1),
(21, 18, 'liên minh huyền thoại', 'liên minh huyền thoại', '2023-11-20 14:02:59', NULL, 1),
(22, 18, 'PUBG', 'PUBG', '2023-11-20 14:07:05', NULL, 1),
(23, 18, 'Counter-Strike 2', 'Counter-Strike 2', '2023-11-20 14:08:31', NULL, 1),
(24, 19, 'test1', 'test1', '2023-11-26 07:39:27', NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
