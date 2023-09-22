-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2023 at 10:37 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `ao`
--

CREATE TABLE `ao` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sale` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `sale_price` int NOT NULL,
  `cost` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ao`
--

INSERT INTO `ao` (`id`, `name`, `description`, `sale`, `sale_price`, `cost`, `image`, `type`) VALUES
(1, 'RETRO CLASSIC TEE # BLACK', 'Chất vải: TERRY FABRIC chất lượng cao\r\n</br>  + Không đổ lông khi sử dụng.</br>  + Độ dày vừa phải, đủ mát mẻ để mặc vào mùa hè và đủ ấm áp để mặc vào mùa đông.</br>  + Không nhăn và không xuống màu, chấp mọi thể loại giặt máy, giặt tay, phơi nắng, phơi sương.', '52%', 290000, 420000, 'aothun1.jpg', 'BLACK'),
(2, 'RETRO CLASSIC TEE # WHITE', 'Chất liệ vải: Cotton thun chất lượng cao\r\n</br>&nbsp;&nbsp;+ Vải có độ bền cao, thích nghi với nhiều điều kiện thời tiết.\r\n</br>&nbsp;&nbsp;+ Dễ thấm mồ hôi, giảm nhiệt tốt đem lại sự thoải mái, dễ chịu cho người mặc.\r\n</br>&nbsp;&nbsp;+ Dễ nhuộm và bền màu, không bị phai khi giặt.\r\n</br>&nbsp;&nbsp;+ Vải mềm, hợp về sinh và không gây ảnh hưởng hoặc kích ứng da.\r\n</br>&nbsp;&nbsp;+ Thân thiện với môi trường.', '30%', 335000, 510000, 'aothun2.jpg', 'WHITE'),
(3, 'FALLING TEE # WHITE', 'Chất liệu: Vải Cotton lụa chất liệu cao</br>&nbsp;&nbsp;+ Cotton lụa là sự kết hợp hoàn hảo giữa chất liệu cotton thiên nhiên với lụa tơ tằm cao cấp. Chất liệu này có giá thành rẻ hơn rất nhiều so với tơ tằm thuần túy và được lựa chọn rất nhiều trong thời điểm hiện tại.\r\nChất liệu vải vô cùng mềm mại, bóng mượt. Đem lại cảm giác mát mẻ, thoải mái khi mặc.\r\n</br>&nbsp;&nbsp;+ Cotton lụa phù hợp với mọi điều kiện thời tiết. Vải này giúp giữ ấm vào mùa đông mà lại cực kỳ thoáng mát vào mùa hè, nên được đánh giá rất cao\r\n</br>&nbsp;&nbsp;+ Không bị nhàu nát, bị nhăn khi mặc hay giặt giũ.', '30%', 235000, 350000, 'aothun3.jpg', 'WHITE'),
(4, 'ORGIRAN TEE # WHITE', 'Chất liệu: Vải Cotton lụa chất liệu cao</br>&nbsp;&nbsp;+ Cotton lụa là sự kết hợp hoàn hảo giữa chất liệu cotton thiên nhiên với lụa tơ tằm cao cấp. Chất liệu này có giá thành rẻ hơn rất nhiều so với tơ tằm thuần túy và được lựa chọn rất nhiều trong thời điểm hiện tại.\r\nChất liệu vải vô cùng mềm mại, bóng mượt. Đem lại cảm giác mát mẻ, thoải mái khi mặc.\r\n</br>&nbsp;&nbsp;+ Cotton lụa phù hợp với mọi điều kiện thời tiết. Vải này giúp giữ ấm vào mùa đông mà lại cực kỳ thoáng mát vào mùa hè, nên được đánh giá rất cao\r\n</br>&nbsp;&nbsp;+ Không bị nhàu nát, bị nhăn khi mặc hay giặt giũ.', '40%', 210000, 420000, 'aothun4.jpg', 'WHITE'),
(5, 'GALAXY TEE PLUS # WHITE', 'Chất liệu vải: Vải nỉ (flet)\r\n</br>&nbsp;&nbsp;+ Vải nỉ Hàn Quốc: Mềm mại, có độ co giãn tốt. Thường dùng làm đồ handmade.\r\n</br>&nbsp;&nbsp;+ Vải nỉ thông thường: Mỏng hơn nỉ Hàn, có lớp lông nhẹ, khả năng co giãn chỉ tương đối, nhưng có giá rẻ hơn.', '25%', 220000, 340000, 'aothun5.jpg', 'WHITE'),
(6, 'GALAXY TEE TRECK # BLACK', 'Chất liệu vải: Nỉ cao cấp thanh cao\r\n</br>&nbsp;&nbsp;+ Có độ bền cao, không bị bạc màu, không nhàu và có khả năng giữ ấm tốt.\r\n</br>&nbsp;&nbsp;+ Mềm mại, không bị xù lông, có khả năng thấm nước tốt.\r\n</br>&nbsp;&nbsp;+ Tuy nhiên, vải nhanh bẩn và khi sử dụng thì sẽ hơi nóng và bị bí hơi.', '35%', 280000, 360000, 'aothun6.jpg', 'BLACK'),
(7, 'RETRO CLASSIC # BLACK', 'Chất liệu: Vải thun Cotton 2 chiều\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.', '38%', 325000, 510000, 'aothun7.jpg', 'BLACK'),
(8, 'RETRO OGRIAN TEE # WHITE', 'Chất liệu: Vải thun Cotton 4 chiều\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.', '22%', 325000, 495000, 'aothun8.jpg', 'WHITE'),
(9, 'HANDER CLASSIC TEE # BLACK', 'Chất liệu: Vải thun Poly cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '30%', 270000, 350000, 'aothun9.jpg', 'BLACK'),
(10, 'RETRO CLASSIC TEE # BLACK', 'Chất liệu: Vải thun lạnh cao cấp\r\n</br>&nbsp;&nbsp;+ Thun lạnh là vải có chất liệu tốt trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Mát lạnh khi mặc, khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '42%', 185000, 325000, 'aothun10.jpg', 'BLACK'),
(11, 'GALAXY TEE # BLACK', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '27%', 275000, 365000, 'aothun11.jpg', 'BLACK'),
(12, 'GALAXY TEE # BLACK', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '20%', 235000, 350000, 'aothun12.jpg', 'BLACK'),
(13, 'GALAXY CLASSIC TEE # BLACK', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '46%', 250000, 430000, 'aothun13.jpg', 'BLACK'),
(14, 'CREATE CLASSIC TEE # WHITE', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '17%', 135000, 150000, 'aothun14.jpg', 'WHITE'),
(15, 'GALAXY TEE UNISEX # BLACK', 'Chất liệu: Vải cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '38%', 365000, 495000, 'aothun15.jpg', 'BLACK'),
(16, 'ANIME TEE UNISEX # BLACK', 'Chất liệu: Cotton 2 chiều mát lạnh\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '32%', 247000, 375000, 'aothun16.jpg', 'BLACK'),
(17, 'RETRO TEE CLASSIC # BLACK', 'Chất liệu: Cotton 4 chiều mát lạnh\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '31%', 325000, 450000, 'aothun17.jpg', 'BLACK'),
(18, 'FALLING UNISEX # BLACK', 'Chất liệu: Thun nỉ chân cua\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '12%', 230000, 245000, 'aothun18.jpg', 'BLACK'),
(19, 'GALAXY CLASSIC TEE # WHITE', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '33%', 355000, 465000, 'aothun19.jpg', 'WHITE'),
(20, 'GALAXY TEE UNISEX # WHITE', 'Chất liệu: Cotton thun cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '0%', 235000, 235000, 'aothun20.jpg', 'WHITE'),
(21, 'GALAXY TEE UNISEX # BLACK', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '10%', 320000, 310000, 'aothun21.jpg', 'BLACK'),
(22, 'GALAXY TEE UNISEX # WHITE', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '46%', 325000, 510000, 'aothun22.jpg', 'WHITE'),
(23, 'HANDER CLASSIC TEE # WHITE', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '37%', 235000, 350000, 'aothun23.jpg', 'WHITE'),
(24, 'UNISEX CLASSIC TEE # BLACK', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '32%', 245000, 375000, 'aothun24.jpg', 'BLACK'),
(25, 'HANDER CLASSIC TEE # BLACK', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '48%', 285000, 525000, 'aothun25.jpg', 'BLACK'),
(26, 'TEE CLOSER CLASSIC # BLACK', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '42%', 247000, 525000, 'aothun26.jpg', 'BLACK'),
(27, 'TEE CLOSER CLASSIC # WHITE', 'Chất liệu: Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '21%', 250000, 295000, 'aothun27.jpg', 'WHITE'),
(28, 'BLAZER CLASSIC TEE # BLACK', '', '0%', 420000, 420000, 'aothun28.jpg', ''),
(29, 'BLAZER CLASSIC TEE # WHITE', 'Chất liệu: Local Brand Cotton cao cấp\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '33%', 355000, 435000, 'aothun29.jpg', ''),
(30, 'GALAXY TEE CLASSIC # BLACK', 'Chất liệu: Local Brand Cotton 2 chiều\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '30%', 225000, 285000, 'aothun30.jpg', ''),
(31, 'ORGARN CLASSIC TEE # WHITE', 'Chất liệu: Thun 2 chiều mát lạnh\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '12%', 395000, 425000, 'aothun31.jpg', ''),
(32, 'ORGARN CLASSIC TEE # BLACK', 'Chất liệu: Thun giữ ẩm\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '22%', 325000, 375000, 'aothun32.jpg', ''),
(33, 'LIGHT CLASSIC TEE # WHITE', 'Chất liệu: Thun 4 chiều mát lạnh\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '50%', 160000, 320000, 'aothun33.jpg', ''),
(62, 'RETRO TEE FINALLY # BLACK', 'Chất liệu: Thun giữ ẩm\r\n</br>&nbsp;&nbsp;+ Là chất liệu cao cấp trong các dòng vải thun.\r\n</br>&nbsp;&nbsp;+ Khả năng thấm hút tốt và ít bám bụi.\r\n</br>&nbsp;&nbsp;+ Phù hợp cho cả nam và nữ ở mọi lứa tuổi.\r\n</br>&nbsp;&nbsp;+ Không xù lông sao nhiều lần giặt tay hay giặt máy.', '27%', 320000, 470000, 'aothun34.jpg', 'BLACK');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'huyentran', '$2y$10$8nGTrsthB1khZxiWcHhxqueU6RSY4xbdYaFNKKcDGfWihsPTlGpRO', '1'),
(2, 'huyen', '$2y$10$wwhuW4qgalH51tPG40TExeU99DJx8NJaQVBxU67CkOuhlSYaIxzdu', '0'),
(24, 'user', '$2y$10$6tT8wxjKjTqm/HCbKtDY3ucPPPp/uLs7xysHPq0PUU4saGXmYjSkC', '0'),
(25, 'Root', '$2y$10$5QicsxeLcm2I5jOnaUvuhORjvN8ossn0IGRkzX8M5phWvc7CFxDwG', '1'),
(28, 'hhd', '$2y$10$FDijbzZ9X/1lXmkQTzoxQuC9WBAQ/hV4.hTl6xNtcnp8ufjbtMQ7C', '0'),
(29, 'duc', '$2y$10$q3OFBlbbz12oBvDmo1nrke4Q3P7MOJdKXCYOwxQU8bINdhtLPlPNG', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ao`
--
ALTER TABLE `ao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ao`
--
ALTER TABLE `ao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
