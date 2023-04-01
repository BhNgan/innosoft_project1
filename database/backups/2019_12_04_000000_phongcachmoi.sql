/*
 Navicat Premium Data Transfer

 Source Server         : database
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : phongcachmoi

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 04/12/2019 12:55:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for carousels
-- ----------------------------
DROP TABLE IF EXISTS `carousels`;
CREATE TABLE `carousels`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sort` int(11) NULL DEFAULT 0,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `text_overlay` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `carousel_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of carousels
-- ----------------------------
INSERT INTO `carousels` VALUES (1, 0, 'upload/carousels/1.jpeg', '', '#', 'Salon', '2019-11-14 14:39:47', '2019-12-02 09:18:07');
INSERT INTO `carousels` VALUES (2, 0, 'upload/carousels/2.jpeg', '', NULL, 'Slider', '2019-12-04 05:50:15', '2019-12-04 05:50:15');
INSERT INTO `carousels` VALUES (3, 0, 'upload/carousels/3.jpeg', '', NULL, 'Slider 2', '2019-12-04 05:50:25', '2019-12-04 05:50:25');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `category_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `lang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `is_recruit` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 1, 0, NULL, 'Danh Muc 1', 1, 1, NULL, 'vi', NULL, '2019-09-25 04:00:16', '2019-09-25 04:00:16', NULL, 0);
INSERT INTO `categories` VALUES (2, 2, 0, NULL, 'Giới Thiệu', 1, 0, 'Trang Giới Thiệu', 'vi', 'Trang Giới Thiệu', '2019-09-25 04:27:25', '2019-09-25 04:27:25', NULL, 0);
INSERT INTO `categories` VALUES (3, 3, 0, NULL, 'Sản Phẩm', 1, 0, 'Trang Sản Phẩm', 'vi', 'Trang Sản Phẩm', '2019-09-25 07:09:19', '2019-12-02 09:48:00', NULL, 0);
INSERT INTO `categories` VALUES (5, 5, 0, NULL, 'Tin Tức', 1, 0, 'Trang Tin Tức', 'vi', 'Trang Tin Tức', '2019-09-25 07:10:06', '2019-09-25 07:10:06', NULL, 0);
INSERT INTO `categories` VALUES (7, 7, 0, NULL, 'Liên Hệ', 1, 0, 'Trang Liên Hệ', 'vi', 'Trang Liên Hệ', '2019-09-25 07:10:44', '2019-09-25 07:10:44', NULL, 0);
INSERT INTO `categories` VALUES (8, 8, 0, NULL, 'Carousel', 1, 0, NULL, 'vi', NULL, '2019-09-25 07:33:08', '2019-10-18 12:34:19', NULL, 0);
INSERT INTO `categories` VALUES (9, 9, 0, NULL, 'Kĩ Thuật', 1, 0, NULL, 'vi', NULL, '2019-09-30 15:45:40', '2019-09-30 15:45:51', '2019-09-30 15:45:51', 0);
INSERT INTO `categories` VALUES (10, 9, 0, 'upload/categories/10.jpeg', 'Banner', 1, 0, 'Home Banner', 'vi', 'Home Banner', '2019-10-08 09:23:10', '2019-10-19 03:22:43', NULL, 0);
INSERT INTO `categories` VALUES (11, 11, 0, NULL, 'sdgfsg', 1, 0, 'gsfgsdfg', 'vi', NULL, '2019-10-15 07:38:40', '2019-10-15 07:38:44', '2019-10-15 07:38:44', 0);

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES (1, 'Thanh Tai', 'httai96@gmail.com', 'sadfdàd', '2019-11-16 08:14:51', '2019-11-16 08:14:51');

-- ----------------------------
-- Table structure for content_categories
-- ----------------------------
DROP TABLE IF EXISTS `content_categories`;
CREATE TABLE `content_categories`  (
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`content_id`, `category_id`) USING BTREE,
  INDEX `content_categories_category_id_foreign`(`category_id`) USING BTREE,
  CONSTRAINT `content_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `content_categories_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of content_categories
-- ----------------------------
INSERT INTO `content_categories` VALUES (1, 2, 0, 1, 0, 0, '2019-12-03 10:52:11', '2019-12-03 10:52:11', NULL);
INSERT INTO `content_categories` VALUES (17, 5, 0, 1, 0, 0, '2019-12-04 05:24:22', '2019-12-04 05:24:22', NULL);
INSERT INTO `content_categories` VALUES (18, 5, 0, 1, 0, 0, '2019-12-04 05:25:14', '2019-12-04 05:25:14', NULL);

-- ----------------------------
-- Table structure for contents
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `is_draft` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `lang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `video` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `embed` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `contents_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES (1, 1, 0, 'upload/contents/1.jpeg', 'Giới Thiệu', 'gioi-thieu', 'Salon tóc Phong cách mới - luôn đặt Uy tín của Salon - Chất lượng Của khách hàng và phát triển thương hiệu lên hàng đầu .\r\nChuyên gia tạo mẫu tóc tài năng và đam mê với hơn 15 năm kinh nghiệm, đạt giải thưởng trong và ngoài nước. Đội ngũ nhân viên chuyên nghiệp, năng động và nhiệt huyết\r\nĐẳng cấp khác biệt đó là điều mà bạn cảm thấy thoải mái , hài lòng khi đến với Salon tóc Phong cách mới.', '<p><strong>Salon t&oacute;c Phong c&aacute;ch mới</strong>&nbsp;- lu&ocirc;n đặt Uy t&iacute;n của Salon - Chất lượng Của kh&aacute;ch h&agrave;ng v&agrave; ph&aacute;t triển thương hiệu l&ecirc;n h&agrave;ng đầu .</p>\r\n\r\n<p>Chuy&ecirc;n gia tạo mẫu t&oacute;c t&agrave;i năng v&agrave; đam m&ecirc; với hơn 15 năm kinh nghiệm, đạt giải thưởng trong v&agrave; ngo&agrave;i nước. Đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp, năng động v&agrave; nhiệt huyết</p>\r\n\r\n<p>Đẳng cấp kh&aacute;c biệt đ&oacute; l&agrave; điều m&agrave; bạn cảm thấy thoải m&aacute;i , h&agrave;i l&ograve;ng khi đến với&nbsp;<strong>Salon t&oacute;c Phong c&aacute;ch mới</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://thophongcachmoi.com/files/images/37725194_828930353980318_6959285820679258112_o(1).jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với vai tr&ograve; l&agrave; chuy&ecirc;n gia chăm s&oacute;c v&agrave; tư vấn về t&oacute;c&nbsp;<strong>Salon t&oacute;c Phong c&aacute;ch mới</strong>&nbsp; gi&uacute;p bạn trở n&ecirc;n đẹp hơn với vẻ đẹp c&aacute; t&iacute;nh ri&ecirc;ng, bạn sẽ đủ tự tin để chinh phục thế giới.</p>\r\n\r\n<p><strong>Salon t&oacute;c Phong c&aacute;ch mới</strong>&nbsp; - Một địa chỉ chăm s&oacute;c sắc đẹp đ&aacute;ng tin cậy d&agrave;nh cho m&aacute;i t&oacute;c của bạn! Đến với Salon của ch&uacute;ng t&ocirc;i, Qu&yacute; kh&aacute;ch sẽ ho&agrave;n to&agrave;n h&agrave;i l&ograve;ng v&agrave; tin tưởng khi được chăm s&oacute;c một c&aacute;ch chu đ&aacute;o v&agrave; chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Với đội ngũ chuy&ecirc;n vi&ecirc;n c&oacute; kinh nghiệm l&acirc;u năm trong nghề, c&ugrave;ng với d&ograve;ng sản phẩm chăm s&oacute;c t&oacute;c cao cấp với những trang thiết bị hiện đại, Salon sẽ đem lại cho Qu&yacute; kh&aacute;ch kh&ocirc;ng chỉ vẻ đẹp của m&aacute;i t&oacute;c m&agrave; c&ograve;n l&agrave; những gi&acirc;y ph&uacute;t thư gi&atilde;n thoải m&aacute;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://thophongcachmoi.com/files/images/50553581_1535869446549804_8131438307641917440_n.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Salon t&oacute;c Phong c&aacute;ch mới</strong>&nbsp;được th&agrave;nh lập năm 2003. Với l&ograve;ng y&ecirc;u nghề, nhiệt huyết cộng với sự s&aacute;ng tạo, học hỏi kh&ocirc;ng ngừng , Salon đ&atilde; v&agrave; đang ng&agrave;y c&agrave;ng đổi mới v&agrave; ph&aacute;t triển để đ&aacute;p ứng được mọi nhu cầu của Qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p>Đến nay&nbsp;<strong>Salon t&oacute;c Phong c&aacute;ch mới</strong>&nbsp;đ&atilde; trở th&agrave;nh thương hiệu được nhiều Qu&yacute; kh&aacute;ch biết đến, tin tưởng v&agrave; y&ecirc;u mến.</p>\r\n\r\n<p>Lịch sự, nhẹ nh&agrave;ng v&agrave; thoải m&aacute;i l&agrave; những g&igrave; salon t&oacute;c đẹp&nbsp;<strong>Salon t&oacute;c Phong c&aacute;ch mới</strong>&nbsp;muốn mang lại cho tất cả kh&aacute;ch h&agrave;ng đến với salon. Một kh&ocirc;ng gian ấm c&uacute;ng với gam m&agrave;u n&acirc;u nhẹ c&ugrave;ng th&aacute;i độ phục vụ &acirc;n cần, ch&uacute;ng t&ocirc;i tin bạn sẽ h&agrave;i l&ograve;ng khi đến với Salon với kiểu t&oacute;c ph&ugrave; hợp nhất với chất liệu t&oacute;c, c&aacute; t&iacute;nh, khu&ocirc;n mặt v&agrave; đặc th&ugrave; c&ocirc;ng việc của từng người.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://thophongcachmoi.com/files/images/53924522_1579504118853003_3814520722282250240_n.jpg\" /></p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-89px; position:absolute; top:38.6px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 1, 0, 0, 0, NULL, NULL, 'vi', 0, 'Đẳng cấp khác biệt đó là điều mà bạn cảm thấy thoải mái , hài lòng khi đến với Salon tóc Phong cách mới.', '2019-09-25 04:28:38', '2019-12-03 10:52:11', NULL, NULL, 'uJRv0utwSm4');
INSERT INTO `contents` VALUES (2, 2, 0, 'upload/contents/2.jpeg', 'Carousel-1', 'carousel-1', 'Carousel-1Carousel-1Carousel-1', '<p>Carousel-1Carousel-1Carousel-1Carousel-1Carousel-1Carousel-1Carousel-1</p>', 1, 0, 0, 0, NULL, NULL, 'vi', 0, NULL, '2019-09-25 07:44:17', '2019-10-19 10:25:46', NULL, NULL, NULL);
INSERT INTO `contents` VALUES (16, 16, 1, 'upload/contents/16.jpeg', 'banner', 'banner', 'banner banner banner', '<p>banner banner banner</p>', 1, 0, 0, 0, NULL, NULL, 'vi', 0, NULL, '2019-10-08 09:28:59', '2019-10-10 07:24:40', '2019-10-10 07:24:40', NULL, NULL);
INSERT INTO `contents` VALUES (17, 3, 1, 'upload/contents/17.jpeg', '3 nguyên nhân khiến tóc uốn luôn bị xơ rối và không vào nếp', '3-nguyen-nhan-khien-toc-uon-luon-bi-xo-roi-va-khong-vao-nep', 'So với những loại tóc thông thường khác thì các kiểu tóc xoăn uốn lọn luôn là kiểu tóc khó vào nếp nhất. Và đây cũng chính là lý do tại sao các cô gái dành cả thanh xuân để tìm bí quyết chăm sóc tóc uốn vào nếp mặc dù tốn nhiều thời gian và tiền bạc.', '<p>So với những loại t&oacute;c th&ocirc;ng thường kh&aacute;c th&igrave; c&aacute;c kiểu t&oacute;c xoăn uốn lọn lu&ocirc;n l&agrave; kiểu t&oacute;c kh&oacute; v&agrave;o nếp nhất. V&agrave; đ&acirc;y cũng ch&iacute;nh l&agrave; l&yacute; do tại sao c&aacute;c c&ocirc; g&aacute;i d&agrave;nh cả thanh xu&acirc;n để t&igrave;m b&iacute; quyết chăm s&oacute;c t&oacute;c uốn v&agrave;o nếp mặc d&ugrave; tốn nhiều thời gian v&agrave; tiền bạc.</p>\r\n\r\n<p><img alt=\"\" src=\"https://britishm.vn/wp-content/uploads/2019/01/3-nguyen-nhan-khien-toc-uon-luon-bi-xo-roi-va-khong-vao-nep.jpg\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n bạn đ&atilde; biết nguy&ecirc;n nh&acirc;n g&igrave; khiến ch&uacute;ng lu&ocirc;n &ldquo;bất trị&rdquo; đến vậy kh&ocirc;ng? C&aacute;c chuy&ecirc;n gia đ&atilde; chỉ ra 3 l&yacute; do phổ biến nhất dưới đ&acirc;y, c&ugrave;ng lắng nghe xem họ n&oacute;i g&igrave; nh&eacute;.</p>\r\n\r\n<p><strong>#1. Gội đầu sai c&aacute;ch</strong></p>\r\n\r\n<p>Th&oacute;i quen gội đầu h&agrave;ng ng&agrave;y, với tần suất qu&aacute; nhiều khiến lớp dầu tr&ecirc;n da đầu bị mất đi, chất dưỡng n&agrave;y mất cũng đồng nghĩa với việc t&oacute;c nhanh kh&ocirc; xơ, g&atilde;y rụng v&agrave; chẻ ngọn, g&acirc;y ảnh hưởng đến c&aacute;c nếp t&oacute;c của bạn.</p>\r\n\r\n<p>Ngo&agrave;i ra, gội đầu thường xuy&ecirc;n cũng kh&ocirc;ng được những chuy&ecirc;n gia chăm s&oacute;c t&oacute;c chuy&ecirc;n nghiệp khuy&ecirc;n &aacute;p dụng. Chỉ khoảng 2-3 lần gội/tuần l&agrave; ph&ugrave; hợp nhất, trong qu&aacute; tr&igrave;nh gội bạn kh&ocirc;ng n&ecirc;n v&ograve; t&oacute;c hoặc ch&agrave; x&aacute;t mạnh để tr&aacute;nh khả năng t&oacute;c uốn bị mất nếp, l&agrave;m hỏng lớp biểu b&igrave; sợi t&oacute;c v&agrave; g&acirc;y xơ rối.</p>\r\n\r\n<p>Massage da đầu nhẹ nh&agrave;ng, vừa phải để k&iacute;ch th&iacute;ch tuần ho&agrave;n m&aacute;u dưới da đầu, th&uacute;c đẩy c&aacute;c dinh dưỡng nu&ocirc;i t&oacute;c dễ d&agrave;ng hơn.</p>\r\n\r\n<p><strong>#2. M&aacute;i t&oacute;c kh&ocirc;ng đủ độ ẩm</strong></p>\r\n\r\n<p>&nbsp;Sau khi uốn xong, da đầu v&agrave; t&oacute;c phải đối diện với lượng h&oacute;a chất rất lớn n&ecirc;n trở n&ecirc;n kh&ocirc; yếu v&agrave; cần thời gian để phục hồi hư tổn&nbsp; cũng như đẩy dưỡng chất nhiều hơn để nu&ocirc;i t&oacute;c. Đ&acirc;y cũng l&agrave; giai đoạn m&aacute;i t&oacute;c trở n&ecirc;n kh&ocirc;, kh&ocirc;ng đủ độ ẩm, dễ g&atilde;y rụng, dễ bị b&ocirc;ng x&ugrave; ra ngo&agrave;i nếu ch&uacute;ng ta kh&ocirc;ng nhanh ch&oacute;ng cung cấp độ ẩm cần thiết.</p>\r\n\r\n<p>L&uacute;c n&agrave;y, c&aacute;c sản phẩm th&iacute;ch hợp nhất d&agrave;nh cho t&oacute;c l&agrave; sử dụng dầu gội, dầu xả c&oacute; khả năng phục hồi hư tổn, dầu dưỡng t&oacute;c, kem ủ,&hellip;</p>\r\n\r\n<p><strong>#3. Sấy t&oacute;c ngược chiều</strong></p>\r\n\r\n<p>Đ&acirc;y ch&iacute;nh l&agrave; l&yacute; do tại sao t&oacute;c uốn sẽ lu&ocirc;n trong trạng th&aacute;i x&ugrave; b&ocirc;ng v&agrave; kh&oacute; v&agrave;o nếp. Đối với một số kiểu t&oacute;c uốn đẹp như uốn cụp, việc sấy t&oacute;c l&agrave; rất quan trọng.</p>\r\n\r\n<p>Sấy t&oacute;c theo chiều c&uacute;p c&oacute; thể khiến cho tổng thể m&aacute;i t&oacute;c tr&ocirc;ng bồng bềnh hơn, tuy nhi&ecirc;n nếu sấy ngược chiều uốn, m&aacute;i t&oacute;c bung ra, kh&ocirc; v&agrave; rất kh&oacute; v&agrave;o nếp. Đ&acirc;y cũng l&agrave; điều c&aacute;c bạn cần lưu &yacute; nếu ch&uacute;ng ta cần sử dụng nhiệt l&ecirc;n m&aacute;i t&oacute;c.</p>\r\n\r\n<p>Với phương ph&aacute;p dưỡng t&oacute;c uốn n&agrave;o th&igrave; c&aacute;c bạn cũng cần lưu &yacute; 3 l&yacute; do tr&ecirc;n, v&agrave; h&atilde;y chắc chắn rằng đ&atilde; hạn chế c&aacute;c th&oacute;i quen xấu n&agrave;y khiến t&oacute;c bạn kh&oacute; v&agrave;o nếp.</p>\r\n\r\n<p>V&agrave; cuối c&ugrave;ng, chỉ c&oacute; m&aacute;i t&oacute;c được dưỡng ẩm, được cung cấp đầy đủ dưỡng chất mới c&oacute; thể khỏe mạnh, bồng bềnh hơn được.</p>', 1, 0, 1, 0, NULL, NULL, 'vi', 0, NULL, '2019-12-04 05:24:22', '2019-12-04 05:24:22', NULL, NULL, NULL);
INSERT INTO `contents` VALUES (18, 18, 1, 'upload/contents/18.jpeg', 'Muốn tóc nhuộm lên màu đẹp, sống động thì nên làm gì?', 'muon-toc-nhuom-len-mau-dep-song-dong-thi-nen-lam-gi', 'Bên cạnh việc tìm kiếm những salon có kĩ thuật nhuộm tốt, các sản phẩm dầu gội chuyên dụng thì chúng ta cần làm gì để tóc nhuộm lên màu đẹp? Hãy cùng tìm hiểu nhé.', '<p>B&ecirc;n cạnh việc t&igrave;m kiếm những salon c&oacute; kĩ thuật nhuộm tốt, c&aacute;c sản phẩm dầu gội chuy&ecirc;n dụng th&igrave; ch&uacute;ng ta cần l&agrave;m g&igrave; để t&oacute;c nhuộm l&ecirc;n m&agrave;u đẹp? H&atilde;y c&ugrave;ng t&igrave;m hiểu nh&eacute;.</p>\r\n\r\n<p><strong>#1. Kiểm tra thuốc nhuộm sử dụng</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://britishm.vn/wp-content/uploads/2019/10/muon-toc-nhuom-len-mau-dep-song-dong-thi-nen-lam-gi.jpg\" /></p>\r\n\r\n<p>Trước khi bạn đi nhuộm t&oacute;c, đừng qu&ecirc;n kiểm tra loại thuốc nhuộm sẽ sử dụng nh&eacute;. Chỉ với một động th&aacute;i nho nhỏ th&ocirc;i, nhưng bạn đ&atilde; c&oacute; thể đảm bảo t&oacute;c nhuộm của m&igrave;nh l&ecirc;n m&agrave;u ưng &yacute; nhất rồi đấy. Để kiểm tra xem sản phẩm nhuộm c&oacute; an to&agrave;n với t&oacute;c kh&ocirc;ng, bạn n&ecirc;n ch&uacute; &yacute; đến bảng th&agrave;nh phần của thuốc nhuộm.</p>\r\n\r\n<p>Những d&ograve;ng thuốc n&agrave;y c&oacute; chứa th&agrave;nh phần tự nhi&ecirc;n kh&ocirc;ng, c&oacute; paraben, silicone, dầu kho&aacute;ng,&hellip; Ngo&agrave;i ra, ch&uacute;ng ta cũng phải biết r&otilde; hạn sử dụng, nguồn gốc, xuất xứ sản phẩm. C&agrave;ng hiểu r&otilde;, bạn c&agrave;ng c&oacute; thể chắc chắn an to&agrave;n khi nhuộm v&agrave; l&ecirc;n m&agrave;u chuẩn.</p>\r\n\r\n<p><strong>#2. Chọn m&agrave;u nhuộm t&ocirc;ng tối hơn</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://britishm.vn/wp-content/uploads/2019/10/muon-toc-nhuom-len-mau-dep-song-dong-thi-nen-lam-gi-1.jpg\" /></p>\r\n\r\n<p>Th&ocirc;ng thường, những m&agrave;u nhuộm t&ocirc;ng s&aacute;ng như đỏ cam, v&agrave;ng hồng, neon,&hellip; thường đ&ograve;i hỏi bạn cần tẩy t&oacute;c trước khi nhuộm. Nếu thường xuy&ecirc;n thay đổi những t&ocirc;ng m&agrave;u s&aacute;ng th&igrave; việc t&oacute;c hư tổn nặng l&agrave; điều kh&oacute; tr&aacute;nh khỏi. V&igrave; vậy, n&ecirc;n chọn những m&agrave;u nhuộm t&ocirc;ng trầm, vừa kh&ocirc;ng cần tẩy t&oacute;c, vừa hạn chế t&oacute;c hư tổn, chẻ ngọn. Bởi một khi t&oacute;c đ&atilde; hư tổn, sẽ rất kh&oacute; để phục hồi, khiến vẻ ngo&agrave;i của bạn ảnh hưởng nặng nề. B&ecirc;n cạnh đ&oacute;, một m&aacute;i t&oacute;c khỏe cũng g&oacute;p phần kh&ocirc;ng nhỏ cho việc t&oacute;c l&ecirc;n đ&uacute;ng m&agrave;u nhuộm hay kh&ocirc;ng đấy.</p>\r\n\r\n<p><strong>#3. Giảm nhẹ một t&ocirc;ng so với m&agrave;u bạn muốn nhuộm</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://britishm.vn/wp-content/uploads/2019/10/muon-toc-nhuom-len-mau-dep-song-dong-thi-nen-lam-gi-2.jpg\" /></p>\r\n\r\n<p>Bạn rất th&iacute;ch m&agrave;u nhuộm n&agrave;y v&agrave; quyết định đến tiệm salon gần nhất để c&oacute; được m&agrave;u đẹp như thế. Tuy nhi&ecirc;n, sau khi nhuộm xong, bạn nhận thấy t&oacute;c m&igrave;nh s&aacute;ng hơn so với m&agrave;u nhuộm ban đầu. Nguy&ecirc;n nh&acirc;n l&agrave; do c&aacute;c m&agrave;u nhuộm ghi tr&ecirc;n bao b&igrave; thường kh&ocirc;ng được chuẩn khi l&ecirc;n t&oacute;c, v&igrave; c&ograve;n t&ugrave;y thuộc v&agrave;o chất t&oacute;c của mỗi người, khiến t&oacute;c s&aacute;ng hơn 1-2 t&ocirc;ng. Bởi vậy, bạn n&ecirc;n chọn m&agrave;u nhuộm tối hơn 1 t&ocirc;ng để l&ecirc;n m&agrave;u chuẩn nh&eacute;.</p>\r\n\r\n<p><strong>#4. Dưỡng t&oacute;c sau khi nhuộm t&oacute;c</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://britishm.vn/wp-content/uploads/2019/10/muon-toc-nhuom-len-mau-dep-song-dong-thi-nen-lam-gi-3.jpg\" /></p>\r\n\r\n<p>Th&oacute;i quen &ldquo;bu&ocirc;ng thả&rdquo; sau khi nhuộm xong sẽ khiến t&oacute;c nhanh ch&oacute;ng xơ x&aacute;c, chẻ ngọn v&agrave; đổi m&agrave;u. Nguy&ecirc;n nh&acirc;n l&agrave; khi t&oacute;c hư tổn, độ ẩm kh&ocirc;ng c&oacute;, t&igrave;nh trạng yếu khiến bản th&acirc;n t&oacute;c đổi m&agrave;u, kết hợp với m&agrave;u nhuộm khiến ch&uacute;ng biến tấu trở th&agrave;nh m&agrave;u kh&aacute;c. Tốt nhất l&agrave; bạn n&ecirc;n lựa chọn những sản phẩm d&agrave;nh ri&ecirc;ng cho t&oacute;c nhuộm, từ dầu gội, dầu xả, kem ủ cho đến những lọ dầu dưỡng t&oacute;c nhuộm để bảo vệ h&agrave;ng ng&agrave;y.&nbsp;</p>\r\n\r\n<p><strong>#5. Hạn chế đi bơi để giữ m&agrave;u nhuộm</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://britishm.vn/wp-content/uploads/2019/10/muon-toc-nhuom-len-mau-dep-song-dong-thi-nen-lam-gi-4.jpg\" /></p>\r\n\r\n<p>Nước trong hồ bơi c&oacute; chứa h&agrave;m lượng clo cao khiến kết cấu nguy&ecirc;n bản của t&oacute;c bị ph&aacute; vỡ, t&oacute;c chẻ ngọn, kh&ocirc; xơ. V&igrave; vậy, bạn cần hạn chế đi bơi qu&aacute; nhiều. Nếu l&agrave; c&ocirc; n&agrave;ng y&ecirc;u th&iacute;ch bơi lội th&igrave; n&ecirc;n sử dụng mũ tr&ugrave;m, dầu dưỡng t&oacute;c trước khi xuống bể bơi v&agrave; xả sạch ngay khi vừa mới bơi xong nh&eacute;.</p>\r\n\r\n<p>T&oacute;c nhộm đẹp cần nhiều yếu tố như thợ nhuộm &ndash; thuốc nhuộm &ndash; phương ph&aacute;p chăm s&oacute;c. Bởi vậy, h&atilde;y &aacute;p dụng một v&agrave;i b&iacute; quyết m&agrave; ch&uacute;ng t&ocirc;i chia sẻ b&ecirc;n tr&ecirc;n nh&eacute;.</p>', 1, 0, 1, 0, NULL, NULL, 'vi', 0, NULL, '2019-12-04 05:25:14', '2019-12-04 05:25:14', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `lang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for menu_categories
-- ----------------------------
DROP TABLE IF EXISTS `menu_categories`;
CREATE TABLE `menu_categories`  (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `is_banner` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`menu_id`, `category_id`) USING BTREE,
  INDEX `menu_categories_category_id_foreign`(`category_id`) USING BTREE,
  CONSTRAINT `menu_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `menu_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu_categories
-- ----------------------------
INSERT INTO `menu_categories` VALUES (1, 5, '2019-10-09 08:54:46', '2019-10-09 08:54:46', NULL, 0);
INSERT INTO `menu_categories` VALUES (9, 5, '2019-09-25 07:28:10', '2019-09-25 07:28:10', NULL, 0);

-- ----------------------------
-- Table structure for menu_contents
-- ----------------------------
DROP TABLE IF EXISTS `menu_contents`;
CREATE TABLE `menu_contents`  (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`, `content_id`) USING BTREE,
  INDEX `menu_contents_content_id_foreign`(`content_id`) USING BTREE,
  CONSTRAINT `menu_contents_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `menu_contents_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu_contents
-- ----------------------------
INSERT INTO `menu_contents` VALUES (2, 1, '2019-12-03 10:53:22', '2019-12-03 10:53:22', NULL);

-- ----------------------------
-- Table structure for menu_products
-- ----------------------------
DROP TABLE IF EXISTS `menu_products`;
CREATE TABLE `menu_products`  (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`, `product_id`) USING BTREE,
  INDEX `menu_products_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `menu_products_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `menu_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for menu_types
-- ----------------------------
DROP TABLE IF EXISTS `menu_types`;
CREATE TABLE `menu_types`  (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`, `type_id`) USING BTREE,
  INDEX `menu_types_type_id_foreign`(`type_id`) USING BTREE,
  CONSTRAINT `menu_types_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `menu_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu_types
-- ----------------------------
INSERT INTO `menu_types` VALUES (3, 1, '2019-12-02 09:53:44', '2019-12-02 09:53:44', NULL);
INSERT INTO `menu_types` VALUES (5, 2, '2019-12-02 09:53:58', '2019-12-02 09:53:58', NULL);
INSERT INTO `menu_types` VALUES (6, 3, '2019-12-02 09:54:10', '2019-12-02 09:54:10', NULL);
INSERT INTO `menu_types` VALUES (7, 5, '2019-12-02 09:54:24', '2019-12-02 09:54:24', NULL);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL DEFAULT 0,
  `lang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 1, 0, 'Trang Chủ', '/', 'home', '', 1, 1, 'vi', NULL, '2019-09-25 03:46:51', '2019-09-25 04:09:27', NULL);
INSERT INTO `menus` VALUES (2, 2, 0, 'Giới Thiệu', 'gioi-thieu', 'about', '', 0, 2, 'vi', NULL, '2019-09-25 04:26:43', '2019-12-03 10:53:22', NULL);
INSERT INTO `menus` VALUES (3, 3, 4, 'Cắt-Gội', 'cat-goi', 'type', '', 1, 1, 'vi', NULL, '2019-09-25 07:08:34', '2019-12-02 09:53:44', NULL);
INSERT INTO `menus` VALUES (4, 4, 0, 'Dịch Vụ', 'dich-vu', 'null', '', 1, 3, 'vi', NULL, '2019-09-25 07:16:58', '2019-12-02 09:48:26', NULL);
INSERT INTO `menus` VALUES (5, 5, 4, 'Dưỡng Tóc', 'duong-toc', 'type', '', 1, 2, 'vi', NULL, '2019-09-25 07:24:33', '2019-12-02 09:53:58', NULL);
INSERT INTO `menus` VALUES (6, 6, 4, 'Tạo Mẫu', 'tao-mau', 'type', '', 1, 3, 'vi', NULL, '2019-09-25 07:25:23', '2019-12-02 09:54:09', NULL);
INSERT INTO `menus` VALUES (7, 7, 4, 'Sản Phẩm Dưỡng Tóc', 'san-pham-duong-toc', 'type', '', 1, 4, 'vi', NULL, '2019-09-25 07:25:53', '2019-12-02 09:54:24', NULL);
INSERT INTO `menus` VALUES (9, 9, 0, 'Tin Tức', 'tin-tuc', 'category', NULL, 1, 5, 'vi', NULL, '2019-09-25 07:28:08', '2019-09-25 07:28:08', NULL);
INSERT INTO `menus` VALUES (11, 11, 0, 'Liên Hệ', 'lien-he', 'contact', '', 1, 7, 'vi', NULL, '2019-09-25 07:29:39', '2019-10-08 10:01:59', NULL);
INSERT INTO `menus` VALUES (12, 12, 0, 'Giỏ Hàng', 'gio-hang', 'cart', '', 0, 0, 'vi', NULL, '2019-10-04 07:42:27', '2019-10-08 10:01:01', NULL);
INSERT INTO `menus` VALUES (16, 13, 0, 'Thanh Toán', 'thanh-toan', 'order', '', 0, 0, 'vi', NULL, '2019-10-09 02:24:05', '2019-10-09 02:24:19', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_06_07_092547_create_types_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_06_07_092557_create_products_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_06_07_092743_create_product_types_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_07_15_171057_create_languages_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_07_15_172233_create_menus_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_07_15_173740_create_contents_table', 1);
INSERT INTO `migrations` VALUES (9, '2019_07_16_101957_create_categories_table', 1);
INSERT INTO `migrations` VALUES (10, '2019_07_16_102230_create_menu_categories_table', 1);
INSERT INTO `migrations` VALUES (11, '2019_07_16_102328_create_menu_contents_table', 1);
INSERT INTO `migrations` VALUES (12, '2019_07_16_102429_create_content_categories_table', 1);
INSERT INTO `migrations` VALUES (13, '2019_07_16_151845_allow_null_target_menus_table', 1);
INSERT INTO `migrations` VALUES (14, '2019_07_19_161724_create_menu_products_table', 1);
INSERT INTO `migrations` VALUES (15, '2019_07_19_161841_create_menu_types_table', 1);
INSERT INTO `migrations` VALUES (16, '2019_08_14_104127_create_sponsors_table', 2);
INSERT INTO `migrations` VALUES (17, '2019_08_21_143215_add_url_target_sort_is_show_to_sponsors_table', 3);
INSERT INTO `migrations` VALUES (19, '2019_09_25_085431_create_carousels_table', 4);
INSERT INTO `migrations` VALUES (21, '2019_09_26_071649_create_contacts_table', 5);
INSERT INTO `migrations` VALUES (23, '2019_09_26_082049_add_video_to_contents_table', 6);
INSERT INTO `migrations` VALUES (27, '2019_09_26_092326_add_is_recruit_to_categories_table', 7);
INSERT INTO `migrations` VALUES (28, '2019_07_23_103255_add_is_featured_to_products_table', 8);
INSERT INTO `migrations` VALUES (30, '2019_10_04_094036_create_sessions_table', 9);
INSERT INTO `migrations` VALUES (35, '2019_10_07_000000_add_alias_to_products_table', 10);
INSERT INTO `migrations` VALUES (36, '2019_10_07_033910_add_description_to_products_table', 10);
INSERT INTO `migrations` VALUES (37, '2019_10_08_094906_add_banner_to_menus_table', 11);
INSERT INTO `migrations` VALUES (38, '2019_10_09_020143_create_payments_table', 12);
INSERT INTO `migrations` VALUES (42, '2019_10_09_082400_add_banner_to_menu_categories_table', 13);
INSERT INTO `migrations` VALUES (43, '2019_10_11_031638_create_orders_table', 14);
INSERT INTO `migrations` VALUES (44, '2019_10_11_032519_create_order_products_table', 15);
INSERT INTO `migrations` VALUES (46, '2019_10_12_083128_add_foreign_key_to_order_products_table', 16);
INSERT INTO `migrations` VALUES (49, '2019_10_12_094225_add_total_to_orders_table', 17);
INSERT INTO `migrations` VALUES (50, '2019_10_29_070521_add_bill_price_to_order_products_table', 18);

-- ----------------------------
-- Table structure for order_products
-- ----------------------------
DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products`  (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `bill_price` int(10) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`product_id`, `order_id`) USING BTREE,
  INDEX `order_products_order_id_foreign`(`order_id`) USING BTREE,
  CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ',
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên',
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại',
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Địa chỉ',
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Email',
  `content` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ghi chú',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `sum` int(10) UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL COMMENT 'Người tạo',
  `content` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung',
  `total` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT 'Tổng cộng',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ghi chú',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `payments_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_types
-- ----------------------------
DROP TABLE IF EXISTS `product_types`;
CREATE TABLE `product_types`  (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`, `type_id`) USING BTREE,
  INDEX `product_types_type_id_foreign`(`type_id`) USING BTREE,
  CONSTRAINT `product_types_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `product_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_types
-- ----------------------------
INSERT INTO `product_types` VALUES (11, 1, NULL, NULL);
INSERT INTO `product_types` VALUES (12, 3, NULL, NULL);
INSERT INTO `product_types` VALUES (13, 2, NULL, NULL);
INSERT INTO `product_types` VALUES (14, 1, NULL, NULL);
INSERT INTO `product_types` VALUES (15, 1, NULL, NULL);
INSERT INTO `product_types` VALUES (16, 1, NULL, NULL);
INSERT INTO `product_types` VALUES (17, 2, NULL, NULL);
INSERT INTO `product_types` VALUES (18, 2, NULL, NULL);
INSERT INTO `product_types` VALUES (19, 2, NULL, NULL);
INSERT INTO `product_types` VALUES (20, 3, NULL, NULL);
INSERT INTO `product_types` VALUES (21, 3, NULL, NULL);
INSERT INTO `product_types` VALUES (22, 3, NULL, NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ảnh đại diện',
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại sản phẩm',
  `alias` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Alias',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả',
  `receipt_price` decimal(10, 0) NOT NULL DEFAULT 0 COMMENT 'Giá nhập',
  `bill_price` decimal(10, 0) NOT NULL DEFAULT 0 COMMENT 'Giá bán',
  `stock` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Tồn kho',
  `is_show` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Hiển thị',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Sản phẩm nổi bật',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ghi chú',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (11, 'upload/products/11.jpeg', 'Tóc xoăn dài', 'toc-xoan-dai', 'Bạn muốn tăng thêm độ cuốn hút và xinh xắn, nhấn mạnh tính cách của bản thân thì hãy xem qua tóc sóng nước Hàn Quốc ngày. Từ những lọn tóc uốn to nhỏ tùy thích có thể kết hợp nhiều kiểu đa dạng đậm nét Hàn Quốc như : sóng nước nhẹ, sóng nước ngang vai, sóng nước mái dài và mái ngắn và nhiều chủ đề được yêu thích khác.\r\nTóc Chắc Khoẻ & Sáng Bóng Hơn\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Bạn muốn tăng thêm độ cuốn hút và xinh xắn, nhấn mạnh tính cách của bản thân thì hãy xem qua tóc sóng nước Hàn Quốc ngày.', '2019-12-03 09:33:56', '2019-12-03 09:33:57', NULL);
INSERT INTO `products` VALUES (12, 'upload/products/12.jpeg', 'Tóc uốn xoăn', 'toc-uon-xoan', 'Với kiểu tóc này, bạn có thể áp dụng khi đi tiệc.\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Những chị em công sở thường ưu tiên lựa chọn kiểu tóc này bởi dễ phù hợp với độ tuổi và môi trường làm việc của họ.', '2019-12-03 10:18:17', '2019-12-03 10:18:18', NULL);
INSERT INTO `products` VALUES (13, 'upload/products/13.jpeg', 'Nhuộm nâu tím', 'nhuom-nau-tim', 'Nhuộm tóc màu nâu tím tạo nên một trào lưu mới trong giới trẻ. Với các cô nàng trẻ trung, năng động thì tóc nhuộm nâu tím thích vì nó hợp với mọi màu da khác nhau, từ những nàng da ngắm đến da trắng sáng mà không lo lỗi mốt. Mùa hè đang đến, nếu bạn không biết chọn màu tóc nhuộm nào để thay đổi vẻ ngoài của mình thì tóc nhuộm nâu tím là gợi ý hoàn hảo đấy\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Nhuộm tóc màu nâu tím tạo nên một trào lưu mới trong giới trẻ.', '2019-12-03 10:19:12', '2019-12-03 10:19:12', NULL);
INSERT INTO `products` VALUES (14, 'upload/products/14.jpeg', 'Tóc dài duỗi', 'toc-dai-duoi', 'Bạn có biết rằng kiểu tóc dài đẹp lên ngôi của năm nay đó chính là duỗi thẳng tự nhiên. Mang đến nét đẹp thanh lịch, duyên dàng và vô cùng đằm thắm cho phái nữ. Nếu bạn không có nhiều thời gian để chăm sóc cho bản thân mình thì lựa chọn kiểu tóc đơn giản và tinh tế là sự lựa chọn phù hợp nhất. Tin chắc rằng bạn sẽ khiến cho các chàng trai phải rung động và đắm say đó nhé!\r\nTóc Chắc Khoẻ & Sáng Bóng Hơn\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Bạn có biết rằng kiểu tóc dài đẹp lên ngôi của năm nay đó chính là duỗi thẳng tự nhiên.', '2019-12-03 10:39:09', '2019-12-04 05:49:13', NULL);
INSERT INTO `products` VALUES (15, 'upload/products/15.jpeg', 'Tóc cắt uốn xoăn', 'toc-cat-uon-xoan', 'Kiểu tóc ngắn xoăn sóng hợp với nhiều khuôn mặt, trong đó có cả dáng mặt gầy.', 0, 0, 0, 1, 1, 'Kiểu tóc ngắn xoăn sóng hợp với nhiều khuôn mặt, trong đó có cả dáng mặt gầy.', '2019-12-03 10:39:47', '2019-12-04 05:48:59', NULL);
INSERT INTO `products` VALUES (16, 'upload/products/16.jpeg', 'Tóc ngắn xoăn', 'toc-ngan-xoan', 'Tóc ngắn uốn xoăn ngang vai: dành cho những bạn gái sở hữu gương mặt tròn hoặc dài bởi các lọn tóc uốn cong ôm nhẹ vào mặt che đi các đường nét dư thừa khiến bạn gái trẻ trung, nữ tính. Với những bạn nữ tóc mỏng có thể dập xù để mái tóc trở nên bồng bềnh và tự nhiên hơn. Để thu hút hơn bạn chọn những tông màu nhuộm tóc phù hợp để trở nên nổi bật.\r\nTóc Chắc Khoẻ & Sáng Bóng Hơn\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Tóc ngắn uốn xoăn ngang vai: dành cho những bạn gái sở hữu gương mặt tròn hoặc dài bởi các lọn tóc uốn cong', '2019-12-03 10:40:15', '2019-12-03 10:40:15', NULL);
INSERT INTO `products` VALUES (17, 'upload/products/17.jpeg', 'Nhuộm nâu hạt dẻ', 'nhuom-nau-hat-de', 'Bạn đang muốn lựa chọn tông màu giúp bản thân mình ăn gian tuổi thật một cách hoàn hảo nhất. Thì nâu socola hạt dẻ chính là sự lựa chọn hoàn hảo của các quý cô mong muốn mình thật trẻ trung, năng động. Với tông màu tóc này bạn nên lựa chọn cho mình kiểu tóc ngang vai xoăn nhẹ để mái thưa tạo nên sự nhẹ nhàng và tuyệt vời nhất.\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Với tông màu tóc này bạn nên lựa chọn cho mình kiểu tóc ngang vai xoăn nhẹ để mái thưa tạo nên sự nhẹ nhàng và tuyệt vời nhất.', '2019-12-03 10:45:11', '2019-12-03 10:45:29', NULL);
INSERT INTO `products` VALUES (18, 'upload/products/18.jpeg', 'Nhuộm nâu ánh vàng', 'nhuom-nau-anh-vang', 'Tóc nâu ánh vàng sẽ mang đến cho bạn vẻ đẹp cá tính. Chính vì vậy, một kiểu tóc năng động sẽ cực kỳ thích hợp với tông màu này và tóc ngắn xoăn sóng nước là lựa chọn hoàn hảo nhất cho các bạn trong mùa hè này.\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Tóc màu vàng rêu sẽ mang đến cho bạn vẻ đẹp cá tính', '2019-12-03 10:46:04', '2019-12-03 10:46:05', NULL);
INSERT INTO `products` VALUES (19, 'upload/products/19.jpeg', 'Nhuộm xám ánh kim', 'nhuom-xam-anh-kim', 'Nhuộm tóc xám ánh kim thích hợp với mọi khuôn mặt, chỉ cần trang điểm thêm chút son môi và má hồng cũng đủ khiến cho các bạn gái thêm phần xinh xắn, còn với các bạn nam thì không chỉ giúp tăng thêm phần cá tính, sành điệu mà còn ghi điểm tuyệt đối trong mắt của các nàng.\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Nhuộm tóc xám ánh kim thích hợp với mọi khuôn mặt.', '2019-12-03 10:46:43', '2019-12-03 10:46:43', NULL);
INSERT INTO `products` VALUES (20, 'upload/products/20.jpeg', 'Tóc uốn xoăn', 'toc-uon-xoan', 'Nhắc đến các kiểu tóc mùa thu chắc hẳn không thể thiếu được kiểu tóc truyền thống này. Bạn sẽ là cô gái thật dịu dàng, phù hợp với tiết trời dịu nhẹ của mùa thu.\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Bạn sẽ là cô gái thật dịu dàng, phù hợp với tiết trời dịu nhẹ của mùa thu.', '2019-12-03 10:47:48', '2019-12-03 10:47:48', NULL);
INSERT INTO `products` VALUES (21, 'upload/products/21.jpeg', 'Tóc uốn lọn to', 'toc-uon-lon-to', 'Những chị em công sở thường ưu tiên lựa chọn kiểu tóc này bởi dễ phù hợp với độ tuổi và môi trường làm việc của họ.\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Những chị em công sở thường ưu tiên lựa chọn kiểu tóc này bởi dễ phù hợp với độ tuổi và môi trường làm việc của họ.', '2019-12-03 10:48:29', '2019-12-03 10:49:28', NULL);
INSERT INTO `products` VALUES (22, 'upload/products/22.jpeg', 'Tóc uốn', 'toc-uon', 'Kiểu tóc này chắc chắn rất phù hợp với một chiếc áo sơ mi và chân váy bút chì. Bạn sẽ trở thành quý cô sang trọng.\r\nHãy đến với Salon Phong Cách Mới để chúng tôi thay đổi cho mái tóc của bạn đẹp hoàn toàn với  kĩ thuật uốn , duỗi , nhuộm hiện đại . Với 100% các loại thuôc chính hãng bạn sẽ không lo bị dị ứng hay bị đau hay bị gàu . \r\n Đến Phong Cách Mới với đội ngũ thợ và kĩ thuật viên chuyên nghiệp bạn sẽ được phục vụ 1 cách tốt nhất . Với kĩ thuật điêu luyện bạn sẽ được một mái tóc bồng bềnh như theo ý muốn của bạn .', 0, 0, 0, 1, 1, 'Kiểu tóc này chắc chắn rất phù hợp với một chiếc áo sơ mi và chân váy bút chì. Bạn sẽ trở thành quý cô sang trọng.', '2019-12-03 10:49:07', '2019-12-03 10:49:07', NULL);

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE INDEX `sessions_id_unique`(`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sponsors
-- ----------------------------
DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE `sponsors`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `is_show` tinyint(1) NULL DEFAULT 1,
  `sort` int(10) UNSIGNED NULL DEFAULT 0,
  `target` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `sponsor_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ảnh đại diện',
  `type_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại sản phẩm',
  `is_show` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Hiển thị',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT 'Sắp xếp',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ghi chú',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES (1, 'upload/types/1.png', 'Cắt-Gội', 1, 1, NULL, '2019-09-25 07:15:36', '2019-12-02 09:52:54', NULL);
INSERT INTO `types` VALUES (2, 'upload/types/2.jpeg', 'Dưỡng Tóc', 1, 2, NULL, '2019-09-25 07:23:08', '2019-12-02 09:49:38', NULL);
INSERT INTO `types` VALUES (3, 'upload/types/3.jpeg', 'Tạo Mẫu', 1, 3, NULL, '2019-09-25 07:23:27', '2019-12-02 09:50:00', NULL);
INSERT INTO `types` VALUES (5, 'upload/types/5.jpeg', 'Sản Phẩm Dưỡng Tóc', 1, 4, NULL, '2019-09-25 07:23:38', '2019-12-02 09:50:20', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'InnoSoft', 'innosoft', 'innosoftcantho@gmail.com', NULL, '$2y$10$a1VilHw1b.c7EkdBgN8x2.ahl/.l0lSQSGgrQIwnfPNbApidSWLbC', 1, '28UeSv44RPW7kjfIcVfDTHUZLrJHpAjfLdPW0EQ6N739bMlIayxjMGaB4Ttk', '2019-09-25 03:45:55', '2019-12-04 05:23:23', NULL);

SET FOREIGN_KEY_CHECKS = 1;
