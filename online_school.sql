-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2021 at 01:30 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `online_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
                             `id` int(11) NOT NULL,
                             `exercise_vkey` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                             `lesson_vkey` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                             `lesson_type` int(11) NOT NULL,
                             `student_vkey` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                             `exercise_file` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                             `exercise_assessment` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `exercise_vkey`, `lesson_vkey`, `lesson_type`, `student_vkey`, `exercise_file`, `exercise_assessment`) VALUES
(6, '47103b32db2c5001dad0f1555f6c229d', '9993eaabae2f7255f0a428fc0c2a03e1', 1, 'b93e062a9f581090e0b6964ab5afac01', '/WpQneLI+T88+8w8Oq4SalYNiT3iWcGzdtEeTr6FJaw+o8i6qS+SWev9Nk6au+tU', 0),
(7, 'a0c73ff4cd44bb6d74d30bf6d5c0ea79', '2679cac038a1bc945ec45d61668b97ec', 1, 'b93e062a9f581090e0b6964ab5afac01', '/WpQneLI+T88+8w8Oq4SalYNiT3iWcGzdtEeTr6FJayDUDJdOTSml1pecUe/PKbf', 4),
(8, '8f053c605406205fcce6e6a8590b366f', '9993eaabae2f7255f0a428fc0c2a03e1', 1, 'e7ab464384ee1c435ac19c651cc87cd0', 'koMskwqcTGczW7WZOV2srqtErbwZ5R4wqKbLkzDoo5Y=', 5),
(9, '5591cc35532d6f27e05174448c20eed7', 'd5f54ef9433a37b85ca4d742e15bbdbe', 1, 'b93e062a9f581090e0b6964ab5afac01', '/WpQneLI+T88+8w8Oq4SalYNiT3iWcGzdtEeTr6FJax2rvF5XiXK0FbK+UQnshel', 5);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
                           `id` int(11) NOT NULL,
                           `lesson_vkey` varchar(110) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                           `teacher_vkey` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                           `lesson_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                           `lesson_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                           `lesson_type` int(11) NOT NULL,
                           `live_lesson_link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                           `lesson_start_time` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                           `lesson_task` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
                           `lesson_video_link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
                           `lesson_is_started` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_vkey`, `teacher_vkey`, `lesson_title`, `lesson_description`, `lesson_type`, `live_lesson_link`, `lesson_start_time`, `lesson_task`, `lesson_video_link`, `lesson_is_started`) VALUES
(23, '2679cac038a1bc945ec45d61668b97ec', '5c6dc75aa8daacd7c3c5ef895d315224', 'L10y2C+jmORMZWY8p8oowA==', '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', 1, 'tJT8N4lUDBAYP4Zez2szI1O4lmSDWVVm/nijYZf6EyKkUR1er0KzYau06LeGuUpN', 'N4G8q6e/A4+rArX40UWpXi6hr6DCcDfzxx7sP14/wpc=', '2ZkyWpmcev6hZeH3dh1A2ZLzZzBM1p2ZZ/hM/EVZ9tc=', 'RJ+gcrHv7tDf1UPyfWVUrklQ3Inf1CYcbXwwAmhgc/WBzjZwykbBunHquH1rTPOd', 0),
(25, '9993eaabae2f7255f0a428fc0c2a03e1', '5c6dc75aa8daacd7c3c5ef895d315224', 'icv5sx5Y4UXQgCn9f7XxcQ==', '6bXFxmhzvaFEdeKedbIyRP1OZZTP5QObvO1mbrAOx4q8Pd3YaEGB8Gw05sao1PwT4HovSDQBQ231u02JeF06aSPJQI6omyA3A64Az1J8u6ojZ4f11wyERb6crO3RBGhYGr86hHN4F1ZX7TIiA3t7lTkjIwluoqrbeKxWwqIZx8o+Zbi2mBnvoFknywKYo/u8YuCPiQhWHFh/L5QQEaNl4gAr++xzQIXSSB2ncifTNzpW+3VqEXuwg5WNjKGs/hH9IIypMPvmkFmv7Kfg0POYCa/5H6tlz5Lht8iwxW0Di7qiMiPkfZCp1WavIa02E6GziDVaXcRVEOWJtn/SA6oDiz9cgTAqS9qmzq9r0U414GMUs6MjHtse+OVgCZ/bJmWnpu3tIslAdBjVUpOXb0bRzQbLtvdXIPIklxzV0p9hePrfoF4QYxG0mEIC2y2Lk16mRnJ2Pw1K6dqj5xbb85CAgq/fVWzm4uqKnAfQp0dQ7d8X0EeYXuc0Z4rxfuxDeJVaW4PT8uxLhiC09SzM0sO8F7ocINSY6aBIWHFCG6ue9k9uU0e6vNsfcmE73toNsS++5KQW0Uv+y+ETs0O+LRg2Jd84Es7s0pAXh1PMnK5MAqBiSfDxIfEIR2LDBCsX3rx8Psiquy+i3izQcXwru7YsjGBOGwRDnKCYttNfQ+p8O+tlYVkOK58wy0G9rwjAI20UFOKShLJ6Z6+RoeqCHHdUql6Hq44/p+RHOgt73CMNkTR6O8mTa0gnQt0FqZ+aXA/vMs8Mbi+RXjLq7BXamxOCNbSxhfRUZLOnJpWPonwZtwBFQzmHXf0uR/KY/q70Glpr0tXOsA193FPTf+OO+I5Zg1oB99SJ90/W7U6IEcUw9hDFvVqG6iaxkNSZQsanZxUcbARPlT2YZK9vBaOfQpI6KhEOvsOgndxLbfqlSyP3NvskTbWy8sqmTyiCeLGNoUdtfGOC6IR5wixgigVO7rKhDPkqA+dyJKSSu/imVxg/nlHKzv0X4GLkjOG0ddDdOS+SAbvEpEyRi1lbW3K4beIZrOxkwXRusnXjIkDt0d8UupOMB5mdZ4w3m3CXwyg1/OtT3gbG3XMtwJDgsDe5Ur/0MiSGpazNYEjhp44uE9zxN/EL+EWJf6JcQo7BjWM3yBx6CAskC79ZVPgF99kGq9iP/+i40cqZL9f6+vnEJ4xaTB3VtW7mfnIrQT+KZx39FQ513xp26qefCRc+GBp8uheCO0RsrQiacr/i8zi1ZhP9ulXg/MWc7vbTfjlSRI+697rF3Te7vggd43smJfVzPTDDPH5nUpNMZ7/u+uawiebV8wPrUj713p4cHZHRC8X968fD', 1, 'tJT8N4lUDBAYP4Zez2szI4qaP09R6PJY/aVHv6XMpPXnCarprUbPwM2HVe7xAUJJW5kKvJd/MHhYfXacz8AmHg==', 'y5rcz4YSgMp8PIAoqYU/kgpUU6OqCjDnn0vJ40PEJLQ=', '2ZkyWpmcev6hZeH3dh1A2Sub6FB43evOe3GGBV/PVgg=', 'eKNkSmTPvrWeVfvs8RqYsvXBTzLA9MCtDCKja0lQyVQ9wNPfA8LwJkuwaqzJyLbr', 0),
(26, 'd5f54ef9433a37b85ca4d742e15bbdbe', '5c6dc75aa8daacd7c3c5ef895d315224', 'PlEXvlBw/ZHY/zH9sHr63g==', '1bhC2piHAcj+Ue76qj/YBFzWGV27Hr5LYNgFWKpHXDpuibMl2125zrauyrHNaND+z0FEkN7m0Lah7F3jfy/cfqzMbBJZCfE5+u9IqUbepeoKbPthb78kQvhU0qgR7YQEq+J+v0lwQgTT+1rgwiSxGVOENrpPnvr61N93/Xjsx5HdcYOhEUvca5cA6MH48vcQ5/53C0pcp9ldMVVScM5MASJFMXMeIeSNo8jo+nO5xP/W/ts2EkhVfP+/Xw1iNDxQKbuKt1haryeo96NjtCwwdFfZT1fWbuoDYsjyQtUo6URV+Ayt6pzW3EG6/OYkv86pC6uo8PuJcAfbCoW9HwBSBuWD4439buQDPstll+hr0d2P+ZeS88omIPoQbGhQa8Jb2J7rhcgOir/6avsFy3Lt2QQhkP/AIEOojUUPJ52vAayfLd8guw+/bJkbKIkTqQK1UzU9zgK8CM9cNWFktx1l8qwA9wCXUR5+pAuBZM5JYMVktRbBAiehSIucW47htoJbar8Ql0oItbN6yIUY+Jo7PxVgo4qLSrhSpE6nJ4AJjlUvTltCUksweqh42tUsgep20IlI3ezPv1dV9kLvD7+m1g4ULADVFmHyo4TXRYJXt/Wct+CSoPHrgS28sb4e47PMU2HP3a0XiBQ8Sbk9Nng4MPB/nXNDMhaWz7knJrvwA4VXRjVFBaVoFySjgPL8upyZpcLu2AMnNBUCr+o6rHCdlzP8fy7FzxwmrqFwc3HIqhtPrHDRp/UeimTNfa522TsF4GrIZ8b2r2DNo+5rDnBrFrLXuY97H6HGTEJ0BXWpZJYHVBblhLlmzLNTDwmYHxduaWl7wUIQs68MMfoJrlzDZIndhaUYIyhBsOgrnM41twWUrobvFAWLtN0HEzWJiG/x//Plf/RiFL6BfuVy7fsGZkYpVJb8StOfJtOeErkpJfUz2vyi9OETNHFRSdcqcN+rDB6zU+EFmsHaG8Pi2JiA4sJ+XaAjjgvlA1Sasxe6dmVqB62oPn55cf5c3Qa9NDeHyWzJ6ll1Mx7WUFzYNiSFJI2CYKiUAhQFtKGRU2oQ7yERMi9fGfMcZC3bn4yAzznqmOhrunDCEF9U58h66qPbOZOUo1e1jst4mXdzbWO+C6HU28qHPdLaPf2OiMCuWPdaxD2j/OsZ6G0CySjED5i4UohH6Uo5rpYRSmEX01oIEtCtXYOD3zTkF7iIfgd7Sb2GCDLkEm2wzDHtX+sgkna0laPEwar4By2wYKOaUlMbhd5FH28kKpgWYzmKHZoHzxrXGQJhNQgrG6YcFch1/Q1EBg==', 1, '0RIlSGJnbkAd0APMMLqo3tCYrv898pZuU3XE6yvQNH1j3btpv+e3csOwkcGGPPku', 'llspuP6H66LR1cBDY0O8cGDGMgV/zyFpXpUGc0HP228=', '2ZkyWpmcev6hZeH3dh1A2QAmqbNWTglj2n4KMDE9Faw=', 'eLFgWNbpAY8Qrk08olNvoAwVSEU39GqHvFcFGiPLqEhs0zC90ibIO9UybIWSdiuC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `first_name` varchar(78) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                         `last_name` varchar(99) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                         `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                         `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                         `user_type` tinyint(1) NOT NULL DEFAULT '0',
                         `lesson_type` tinyint(3) DEFAULT NULL,
                         `username` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
                         `verified` tinyint(1) NOT NULL DEFAULT '0',
                         `vkey` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                         `parent_vkey` varchar(90) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
                         `forgot_pass` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `lesson_type`, `username`, `verified`, `vkey`, `parent_vkey`, `forgot_pass`) VALUES
(52, '3y/VydiXe+BwgW4SB3MIoQ==', 'OFWJbsXh5YQ913RmriUf3Q==', 'OXWY9CC3HYwFiaKFZwYh54FR6W4v1G/gauobXn2b/1w=', 'u1oVXdhcq3ZqY7dwQt+ewQ==', 2, 1, 'zG8j6Hh8Z+Q03Re3q8PqjA==', 1, '196e7102f6d70c508e21edb5b183b61a', NULL, '853e1226ae8f4836e2b12c5b67e318fa'),
(54, 'UP0w8FtL0c9HWjjMH7hqxg==', 'CuFgYDV2S9tTmiY1gTf4lw==', 'y3j8XJpJlMpOCktGiqqC/5gIxIVYVB93r3wxHhW9NjU=', 'u1oVXdhcq3ZqY7dwQt+ewQ==', 3, 1, 'y3j8XJpJlMpOCktGiqqC/5gIxIVYVB93r3wxHhW9NjU=', 1, 'b93e062a9f581090e0b6964ab5afac01', '196e7102f6d70c508e21edb5b183b61a', NULL),
(55, 'MtU3WbxoUpet+ypqkkcadg==', 'egP4zLXTJwpCEEpSEnLEMw==', 'zg530Ujpeue4A6gKv8Q1BSReUSHXRXWyuis8ynVMCWE=', 'u1oVXdhcq3ZqY7dwQt+ewQ==', 4, 1, 'u2p2nZqnZkcjzO5pg/uxdw==', 1, '5c6dc75aa8daacd7c3c5ef895d315224', NULL, NULL),
(56, 'UFSgKv1AyzzKUOx1D/lpFA==', '+NXD6NKkDzSdKqVgFdVF5w==', 'zGvEKBkbT/WCmpYez5GCIde6nQgyJiHSG1UDD0OJUy0=', '/PdZOiGoUAGasArB3xNG7A==', 1, 1, 'JFiztLtVddVKLr6WTrkxSw==', 1, 'e7ab464384ee1c435ac19c651cc87cd0', NULL, NULL),
(57, 'UP0w8FtL0c9HWjjMH7hqxg==', 'YFnS7rimogdk0tmocPo8Nw==', 'B/HiKFI+0gT0HNGc8mdMZA==', 'u1oVXdhcq3ZqY7dwQt+ewQ==', 4, 1, 'JUnAl/IIasBSkjKLnGQyQg==', 1, '3b049ec9df8d59b3421467c2df5ee107', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
