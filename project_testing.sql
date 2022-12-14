-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 06:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_comment`
--

CREATE TABLE `news_comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_no` int(11) NOT NULL,
  `owner` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_comment`
--

INSERT INTO `news_comment` (`id`, `post_no`, `owner`, `date`, `detail`) VALUES
(1, 1, 'Orange', '2022-12-12', 'I like it sooner'),
(2, 1, 'Orange', '2022-12-10', 'I like it'),
(3, 1, 'Orange', '2022-12-07', 'i dont like it'),
(4, 1, 'Orange', '2022-12-07', 'i dont like it');

-- --------------------------------------------------------

--
-- Table structure for table `product_testing_detail`
--

CREATE TABLE `product_testing_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `wax` text COLLATE utf8_unicode_ci NOT NULL,
  `fragrance` text COLLATE utf8_unicode_ci NOT NULL,
  `burning time` text COLLATE utf8_unicode_ci NOT NULL,
  `dimension` text COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_testing_detail`
--

INSERT INTO `product_testing_detail` (`id`, `name`, `price`, `wax`, `fragrance`, `burning time`, `dimension`, `weight`, `image`) VALUES
(1, 'Spiced Mint', 9.99, 'Top grade Soy wax that delivers a smokeless, consistent burn', 'Premium quality ingredients with natural essential oils ', '70-75 hours', '10cm x 5cm ', 400, './pictures/spiced_mint.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_testing_news`
--

CREATE TABLE `product_testing_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `headline` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_testing_news`
--

INSERT INTO `product_testing_news` (`id`, `author`, `headline`, `date`, `image`, `detail`, `like_count`, `dislike_count`, `comment_count`) VALUES
(1, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 1),
(2, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 1),
(3, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 1),
(4, 'Orange', 'Fragrant candle', '2022-12-07', './pictures/candle.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget cursus nunc, eu maximus enim. Suspendisse ligula quam, ultricies ac ligula sed, porttitor finibus libero. Fusce faucibus lacus eros, eu porta diam faucibus quis. Sed venenatis pretium metus, eu pellentesque augue facilisis sed. Praesent eu enim imperdiet, porta erat et, molestie augue. In ac condimentum justo, nec vestibulum eros. Ut eget convallis elit. Praesent consectetur id dolor ut tincidunt. Nulla lacinia lorem a cursus ultrices. Proin ipsum justo, vulputate ac pellentesque blandit, lacinia vel augue. Pellentesque a purus ultrices, interdum lorem quis, scelerisque nisl. Praesent interdum elementum magna auctor tempor. Phasellus a libero nec felis maximus auctor nec non urna.\r\n<br>\r\n<br>\r\n<br>\r\nNullam id dui vel tellus egestas blandit. Donec dignissim sapien non bibendum feugiat. Quisque convallis placerat efficitur. Mauris fringilla nec sem at tempus. Vestibulum ultrices sapien at risus fermentum, sit amet accumsan lectus lacinia. Pellentesque at sagittis libero. Morbi ut magna nec orci bibendum vestibulum ut a diam. Mauris ante ante, maximus et tortor eget, ultrices faucibus eros. Ut auctor turpis eu congue dignissim. Nam eros eros, scelerisque et consectetur id, gravida nec turpis. Etiam nec venenatis enim, eleifend dignissim libero. Donec rhoncus eros dolor, quis ullamcorper diam aliquet nec. Proin vel lectus tristique ipsum ultricies condimentum eget ac justo. Quisque orci orci, tempor nec posuere ut, facilisis vel est. Donec aliquam tortor eget velit hendrerit egestas eu sit amet augue. Aliquam ut lectus nisi.\r\n<br>\r\n<br>\r\n<br>\r\nSuspendisse potenti. In finibus auctor lorem et ultrices. Morbi euismod ex at est sagittis, nec pretium metus feugiat. Donec at lectus vel turpis pellentesque elementum sed id diam. Proin lorem nisl, fermentum vitae dolor in, consequat porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra pharetra tortor, vestibulum malesuada diam viverra commodo. Phasellus eget sem erat. Suspendisse eget nisi leo. Proin auctor ante a varius pretium. Duis lacinia, massa eget varius tincidunt, eros nunc commodo elit, at auctor tellus ipsum nec nunc. Nullam congue nisl a metus placerat, quis facilisis leo dapibus.\r\n<br>\r\n<br>\r\n<br>\r\nSed imperdiet elit laoreet nunc maximus semper nec eget nunc. Duis facilisis tempor est, in convallis elit sodales et. Curabitur mauris purus, sagittis convallis consequat nec, aliquet nec ante. Praesent porta, ipsum at euismod luctus, eros massa porttitor felis, vel euismod orci purus vitae arcu. Integer feugiat blandit eros eu venenatis. Vestibulum ultricies quis arcu sit amet aliquam. Suspendisse luctus ornare dapibus. Aliquam erat volutpat. Pellentesque ut dapibus quam. Integer non quam velit. Nam in varius justo. Sed id purus vel ante euismod accumsan.\r\n<br>\r\n<br>\r\n<br>\r\nDuis arcu ante, imperdiet a sem vel, luctus porta ex. In id vehicula nisl, at accumsan quam. Donec condimentum in nibh vel malesuada. Integer ut dapibus lacus, sit amet hendrerit dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae mauris congue, bibendum orci nec, suscipit massa. Nulla facilisi. Curabitur fermentum vel nunc in mattis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed vel sollicitudin ante, eu ultricies eros. In hac habitasse platea dictumst. Integer convallis egestas sodales. Morbi mattis auctor sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_comment`
--
ALTER TABLE `news_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_testing_detail`
--
ALTER TABLE `product_testing_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_testing_news`
--
ALTER TABLE `product_testing_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_comment`
--
ALTER TABLE `news_comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_testing_detail`
--
ALTER TABLE `product_testing_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_testing_news`
--
ALTER TABLE `product_testing_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
