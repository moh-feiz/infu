-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2018 at 09:24 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.1.24-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `text` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `website_id`, `image`) VALUES
(32, 132, 'thump_1545288904.jpeg'),
(33, 133, 'thump_1545290617.jpeg'),
(35, 135, 'thump_1545291533.jpeg'),
(36, 136, 'thump_1545291817.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likee`
--

CREATE TABLE `likee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(6, 'goli', 'qE2J-o9gQpmAUMV1zhV3wFWS6f4saCSp', '$2y$13$9AIsJ5x/qVZtToEMh7e9puYN2PBlA2ps94WDmVyXtxbJCCsU97b0u', NULL, 'goli@gmail.com', 10, 1539022632, 1539022632),
(7, 'sadegh', 'JHhyb5FbjuYUEWEf6xbUbEeCGrxMjwLA', '$2y$13$ouPI4nzSCz5O7ahlzUsSTu0Hz.EVVCyUCECbCbmhkH4MFSk1lT.DK', NULL, 'sadegh.pahlevan@yahoo.com', 10, 1539159224, 1539159224),
(8, 'Mohsen', 'Wb0Iyv0nTLunnkhBcwOkVsqQNt8FtHkW', '$2y$13$IPiE9kd5GhbuniUtyCgzDekoow5RKfULJ7qGjUYPiSwhel6WnCNvm', NULL, 'mohsen@yahoo.com', 10, 1539160045, 1539160045),
(9, 'saeid', 'Z6ZQCIzGx4b8i-KaZL-WYi4YRZ6_XL_g', '$2y$13$1kVV87OrZaXP5jDh2AVBY.doRDYbuc0fK8ADEqXQCNmWKZ1p6Tqxu', NULL, 'saeid@yahoo.com', 10, 1539160073, 1539160073),
(15, 'bita', 'xXCU6GDnuxU_I3epbZCKS7o0RJeWqy8R', '$2y$13$zi.ATwHMgw50u1tgjnK0YO/JSKwF/jJjsRe5m/1sZo1qilHQgqMc2', NULL, 'bita@gmail.com', 10, 1539508129, 1539508129),
(18, 'majid', 'h1y8s-LlSZqlNO4_McQuPGmZeV0rgVKW', '$2y$13$xAUyrZy8LUCRW/3QH6/i6eVr44Kspz7R.HbcMFLH.5A9EEnX62lWK', NULL, 'majid@gmail.com', 10, 1539806673, 1539806673),
(19, 'shaghayegh', 'yeXrQm-c5jx-PaMIfqT_cBNpPRjvL_zN', '$2y$13$Mxffz3zgiUSCddxr1KjX4OFKy4xgODpRq7eJyRKcoK/cxTdG9npxy', NULL, 'shaghayegh@gmail.com', 10, 1543071179, 1543071179),
(20, 'farhad', 'QRhaBjM-lHge9ygvwVxExMLk2hRHumhC', '$2y$13$1C71rQkoEKPZi2bnD109Gu5Pi1j0jtPxpEsgprmGdkOHiCYKaRLMi', NULL, 'farhad@gmail.com', 10, 1543666500, 1543666500),
(21, 'mehrdad', 'a-uIhBWI4qyzxtD8lr5wamTGXz9646ER', '$2y$13$C2u8cTA.129renIJnjklHurQQ4cR6i/RwHJgW64JjHLAQawZhEtD2', NULL, 'mehrdad@gmail.com', 10, 1543666909, 1543666909),
(22, 'mamal', 'i_fjuT2Phm0gjPXDWI-3TSzHOYiy9GJU', '$2y$13$jdKz7OvE1ovaoAKl/xq40.xrP0Ik48Wo6qzaHd/GFsJtwCQ3qgoSy', NULL, 'mamal@gmail.com', 10, 1545060065, 1545060065);

-- --------------------------------------------------------

--
-- Table structure for table `vieww`
--

CREATE TABLE `vieww` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vieww`
--

INSERT INTO `vieww` (`id`, `number`) VALUES
(1, 10),
(3, 5),
(4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `user_id`, `title`, `type`, `description`, `url`) VALUES
(132, 6, 'نفت و گاز پارس', 0, 'شرکت نفت و گاز پارس به عنوان یکی از شرکت‌های فرعی شرکت ملی نفت ایران در اول دی ماه 1377 تأسیس گردید. این شرکت مسئولیت توسعه کلیه فازهای میدان گازی پارس جنوبی و توسعه میادین گازی پارس شمالی، گلشن و فردوسی را دارا می‌باشد.\r\n\r\nاهمیت تسریع در بهره‌برداری از میدان مشترک پارس جنوبی به عنوان بزرگترین مخزن گازی کشور و جهان که به تنهایی نیمی از ذخائر گاز طبیعی ایران را در خود جای داده است؛ ایجاب می نمود که سازمانی مستقل با ساختار اجرایی ویژه جهت راهبری آن ایجاد گردد. در این راستا شرکت نفت وگاز پارس (سهامی خاص) طبق بند (الف) ماده 5 اساسنامه شرکت مهندسی و توسعه نفت در ارتباط با توسعه میدان پارس جنوبی به همراه کلیه نفرات و امکانات موجود و حساب‌های مربوطه به این شرکت منتقل گردید.', 'http://www.pogc.ir'),
(133, 6, 'راهسازی و عمران ایران', 2, 'شركت راهسازي و عمران ايران بر پايه سه دهه سابقه فعّاليت و بهره گيري از مديران و متخصصين مجرب با توسعه و تحكيم سيستم هاي مديريتي و برخورداري از پشتوانه گسترده از تجهيزات و ماشين آلات تخصصي توانسته است با مديريت ، طراحي و اجراي پروژه هاي بزرگ ملّي در بازسازي و توسعه زير ساخت هاي كشور ايفاي نقش نمايد.\r\n\r\nيكي از بزرگترين شركتهاي عمراني در خاورميانه  با اجراي بيش از ۳۰۰ پروژه در زمينه هاي ( سد سازي ،  پروژه هاي فرودگاهي ، سازه هاي ساحلي و دريائي ، راهسازي ، خطوط ريلي شهري و بين شهري ، شبكه هاي آبياري و زهكشي ، تونل ، ساختمان ، ابنيه سنگين ، محوطه سازي )\r\n\r\nطراحي ، مشاوره و اجراي پروژه هاي تخصصي مقاوم سازي ، تونل سازي ، سازه هاي دريـائي و ...', 'http://www.omraniran.ir'),
(135, 6, 'هواپیمایی ماهان', 3, 'بی شک صنعت هوانوردی به عنوان یکی از زیرساخت‏های توسعه و تأثیر گذارترین گزینه در شبکه حمل و نقل کشورها و یکی از عوامل محرک بخش تولید در فرآیند توسعه پایدار می‏باشد. از این رو همواره کانون توجهات برنامه‏ریزان و مسئولان کشور بوده است. همین امر مبنا و محور همّت جمعی از نخبگان و خبرگان این بخش گردید و به تأسیس اولین شرکت هواپیمایی خصوصی در سال 1371 به نام شرکت هواپیمایی ماهان انجامید. فعالیت این مجموعه در عرصه ملی با پروازهای تهران – کرمان - تهران آغاز شد.\r\n\r\nپس از آن ماهان با امکانات و شرایط آن زمان در تحقق هدف پیشرفت، امنیت و آسایش دو فروند هواپیمای ایرباس مدل 300B4 را در سال 1378 به ناوگان هوایی خود افزود. و در سال‏های بعد نیز توانست چندین فروند ایرباس مدل 300-600، 310، 320، 340 و بوئینگ مدل 747-300/400 را به عنوان مدرن‏ترین هواپیماهای موجود جهت انجام پروازهای دوربرد به کشورهای اروپایی و خاوردور مورد بهره‏برداری قرار دهد و برای مسیرهای کوتاه برد در داخل کشور نیز 16 فروند هواپیمای BAe-146-300 را به ناوگان خود وارد کرده است.\r\n\r\nافزایش تعداد ناوگان به (54) فروند و توسعه شبکه پروازی به نقاط مختلف کشور و جهان، رشد بالای تعداد مسافران را نیز به همراه داشت به گونه‏ای که برابر گزارش سازمان هواپیمایی کشوری ایران، هواپیمایی در سال 1391 بیشترین مسافر را (در شبکه داخلی و خارجی) حمل کرده است. این موارد بخش کوچکی از پیشرفت‏های شرکت هواپیمایی ماهان در سال‏های اخیر به شمار می‏آید که همه و همه مرهون اعتماد شما مسافران عزیز بوده است.', 'http://www.mahan.aero'),
(136, 6, 'فراب', 1, 'شرکت فراب پس از اجرای موفقیت‌آمیز طرح‌های عظیم نیروگاه‌های برق‌آبی کرخه به ظرفیت ۴۰۰ مگاوات، مسجدسلیمان به ظرفیت ۱۰۰۰ مگاوات، کارون۳ به ظرفیت ۲۰۰۰ مگاوات و کارون ۱ به ظرفیت ۱۰۰۰ مگاوات، با عظمی راسخ و با اعتماد و تکیه بر تجربیات کارشناسان سخت‌کوش و متعهد خود و تلفیق آن با قابلیت‌های بالقوه در سایر شرکت‌های وابسته و همکار، بستر اجرای بسیاری از طرح‌های بزرگ را فراهم نموده و حوزه فعالیت خود را به احداث طرح‌های نيروگاه‌هاي انرژي؛ نفت، گاز و پتروشیمی؛ صنایع ریلی؛ شبكه‌هاي هوشمند؛ آب (تصفيه‌خانه، آب‌شيرين‌كن و ...) و زيرساخت، گسترش داده است.\r\nشرکت فراب به منظور استمرار دستاوردهای اجرای طرح‌های پیشین و نیز اعتلای سطح علمی و اجرایی شرکت در آینده، گام به عرصه اجرای پروژه‌های بین‌المللی نهاده و در این راستا موفق به احداث نیروگاه برق‌آبی «تانا» به ظرفیت ۲۵ مگاوات در کشور کنیا؛ سد و نیروگاه «سنگ‌توده ۲» به ظرفیت ۲۲۰ مگاوات در کشور تاجیکستان؛ کارهای ساختمانی و هیدرومکانیک نیروگاه برق‌آبی «کینداروما» در کشور کنیا؛ نیروگاه حرارتی ۳۲۰ مگاواتی «الصدر» در کشور عراق و نیروگاه برق‌آبی ۵ مگاواتی «تِرِم» در کشور کنیا، شده است و طرح‌هاي دیگري از جمله: پروژه چند منظوره «اومااویا» (شامل سد، تونل انتقال آب و نیروگاه ۱۲۰ مگاواتی) در کشور سریلانکا و نيز پروژه‌هاي نیروگاه برق‌آبی ۳۷.۶ مگاواتی «درالوک۲» و «باند دوم بزرگراه كلار – كفري» را در كردستان عراق، در دست اجرا دارد.\r\nكسب عنوان‌هاي «صادرکننده نمونه خدمات فنی و مهندسی» در سال‌های ۸۹، ۹۰، ۹۱، ۹۳ و ۹۴ و «صادرکننده ممتاز ملّی» در سال‌هاي ۹۵، ۹۶ و ۹۷، بیانگر موفقیت و عملکرد ممتاز فراب در عرصه اجرای طرح‌های بین‌المللی است.', 'http://www.farab.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_id` (`website_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_id` (`website_id`);

--
-- Indexes for table `likee`
--
ALTER TABLE `likee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `website_id` (`website_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `vieww`
--
ALTER TABLE `vieww`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `likee`
--
ALTER TABLE `likee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `vieww`
--
ALTER TABLE `vieww`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`);

--
-- Constraints for table `likee`
--
ALTER TABLE `likee`
  ADD CONSTRAINT `likee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `likee_ibfk_2` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`);

--
-- Constraints for table `website`
--
ALTER TABLE `website`
  ADD CONSTRAINT `website_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
