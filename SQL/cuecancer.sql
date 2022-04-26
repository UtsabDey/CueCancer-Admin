-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 03:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuecancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `doctor_id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `appt_date` date NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `serial`, `doctor_id`, `patient_id`, `appt_date`, `patient_name`, `doctor_name`, `age`, `email`, `mobile`, `address`, `note`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'DT001', 'PT001', '2022-01-19', 'John Alex', 'Utsab Dey', 26, 'john@gmail.com', '01758112422', 'Dhanmondi-32, Dhaka', 'Fever', 'DBBL', 'approved', '2022-01-17 18:52:02', '2022-01-18 10:42:55'),
(2, 2, 'DT003', 'PT003', '2022-01-20', 'Atikul Ashik', 'Mehdi', 23, 'ashik@gmail.com', '01757623986', 'Sector-4, Uttora, Dhaka', 'Mental pressure', 'Bkash', 'approved', '2022-01-18 10:23:47', '2022-01-19 15:03:59'),
(3, 3, 'DT001', 'PT001', '2022-01-20', 'John Alex', 'Utsab Dey', 26, 'john@gmail.com', '01758112422', 'Dhanmondi-32, Dhaka', 'aa', 'Bkash', 'approved', '2022-01-18 10:51:14', '2022-01-18 15:24:06'),
(4, 4, 'DT001', 'PT001', '2022-01-24', 'John Alex', 'Utsab Dey', 26, 'john@gmail.com', '01758112422', 'Dhanmondi-32, Dhaka', 'Test', 'Bkash', 'approved', '2022-01-19 10:39:20', '2022-01-19 10:40:50'),
(5, 5, 'DT001', 'PT001', '2022-01-25', 'John Alex', 'Utsab Dey', 26, 'john@gmail.com', '01758112422', 'Dhanmondi-32, Dhaka', 'Test2', 'DBBL', 'approved', '2022-01-19 20:36:28', '2022-04-02 04:44:16'),
(6, 6, 'DT001', 'PT004', '2022-01-27', 'Nusrat Mim', 'Utsab Dey', 23, 'nusrat@gmail.com', '01734679702', 'Sukhrabad, Dhanmondi-32, Dhaka', 'Asthma', 'DBBL', 'pending', '2022-01-20 09:16:25', '2022-01-20 09:16:25'),
(7, 7, 'DT001', 'PT001', '2022-01-20', 'John Alex', 'Utsab Dey', 26, 'john@gmail.com', '01758112422', 'Dhanmondi-32, Dhaka', 'jgckvjbl31435', 'Bkash', 'pending', '2022-01-20 09:32:30', '2022-01-20 09:32:30'),
(8, 8, 'DT001', 'PT001', '2022-01-20', 'John Alex', 'Utsab Dey', 26, 'john@gmail.com', '01758112422', 'Dhanmondi-32, Dhaka', 'jgckvjbl31435', 'DBBL', 'pending', '2022-01-20 09:32:47', '2022-01-20 09:32:47'),
(9, 9, 'DT002', 'PT007', '2022-04-02', 'Utsab Dey', 'Alex Gino', 2, 'utsabdey83@gmail.com', '01685168481', 'Panthapath', 'Demo', 'Bkash', 'pending', '2022-04-02 04:53:03', '2022-04-02 04:53:03'),
(10, 10, 'DT001', 'PT007', '2022-04-02', 'Utsab Dey', 'Utsab Dey', 2, 'utsabdey83@gmail.com', '01685168481', 'Panthapath', 'Demo', 'DBBL', 'approved', '2022-04-02 04:54:30', '2022-04-02 04:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) NOT NULL,
  `author_id` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `author_id`, `image`, `title`, `details`, `created_at`, `updated_at`) VALUES
(2, 'AD001', '1642281397584.png', 'Grief & Honouring My Mother\'s Memory During Christmas', 'Holidays are typically the hardest time of the year when you\'ve lost someone you hold dear to your heart. I have gone twelve Christmases without my mother, and the first time my family had to do it without her was a bit depressing to say the least. It\'s always the obstacles you face after, that are the hardest to overcome.\r\n\r\nThe family dynamic I had was my Dad, my Mom, my brother Stephen, and myself. Without my mom to decorate the tree, stocking up on gifts, invite everyone over, and cook our dinner, there was really no holiday. Traditions had been tarnished, the holiday spirit had died, and no one but me really seemed to care about picking up those broken pieces and reviving what used to be. There were a few years where my family didn’t even have a tree… Presents never get wrapped by my dad or my brother. The entire day is completely mediocre when I compare how we celebrate to everyone else. Everything that is supposed to be, isn’t; unless I* decorate the house unless I* push my father and my brother to wrap their presents unless I* cook dinner unless I* … unless I* … unless I*. it\'s never-ending. \r\n\r\nI know what you’re all thinking, why doesn’t anyone help you? Why doesn’t anyone try? Why doesn\'t anyone care?\r\n\r\nHonestly, my father is the equivalent of Scrooge. He’s spent a good amount of holidays alone, both Thanksgiving and Christmas while my brother and I went over to our aunts to have dinner and enjoy time with our family. He hates the holidays, always… especially after we lost his mom after we lost his uncle, and after we lost his wife - all to cancer in the span of five years. Realistically my mother would roll over in her grave if she could see how he handles this time of year. He and I have had our fair share of fights throughout the holidays, more so because I care that he doesn\'t care, and I know my mom would too.\r\n\r\nDo you ever feel like it\'s exhausting being the person to constantly hold everything together and pick up the pieces too? \r\n\r\nI do.', '2021-11-08 10:57:46', '2022-01-16 03:34:44'),
(4, 'AD001', '1642282027189.jpg', 'Breast Cancer Is Not The Sexy Cancer', 'Breast Cancer Awareness Month is upon us and once again, there is a lot of talk about saving the ta-tas.  I understand this is part of a larger picture – breast cancer awareness, and that’s fine.  But part of me sees this as a kind of sexualization of cancer.  Just because it involves breasts instead of lungs or brain, or a pancreas, that doesn’t make it any less deadly.  But for some reason, discussing breast cancer in the year 2021 still causes people to lose eye contact or lower their voice.  People get uncomfortable when you speak frankly about breast cancer.  I believe it’s because it involves breasts, instead of lungs or bones or a pancreas.  If we can’t talk about breasts or nipples when we’re talking about breast cancer that’s a huge problem.  We have heard the phrase “knowledge is power”, and that means after a breast cancer diagnosis, we need to discuss our breasts and see photographs of breasts.  We need to see photos of skin irregularities.  We need to see photos of nipple irregularities (I found my breast cancer when I noticed my left nipple was inverted).  We need to see photos of reconstructed breasts and reconstructed nipples.  Imagine if you will, that you were diagnosed with a type of bone cancer, but couldn’t see any photos of those similarly diagnosed?  What if there were no photos of prosthetic limbs?  How they work, and what they look like?  The procedures involved following amputation?\r\n\r\nI co-admin one of the largest Facebook breast cancer support groups that has over 11,000 members since its inception in 2017.  We are a closed group which means nobody outside the group can see our posts.  To be a member, you must be female, and you must have been diagnosed with breast cancer at some time in your life.  We post pictures of things like surgical scars, nipple reconstruction, radiation burns, and many other pictures that may involve the breast, nipple, and other body parts ravaged by this disease.  Facebook in its infinite wisdom, frequently flags some of these photos and may even punish the poster by suspending their account for a day, a week, or longer, citing violation of “community standards”.  Anyone who uses Facebook regularly knows this is called Facebook Jail.  Post-mastectomy photos are actually allowed, according to Facebook’s own community standards but I guess it’s more important for those policing Facebook, (whether an actual human or a “bot”) to get the nipples down before any readers are traumatized, than to actually determine the context of the photo and whether it is in fact, in compliance.  I am frequently told “well it’s not an actual person flagging it-it’s a program, like somehow that makes it okay.  Breast Cancer and Breast Cancer Reconstruction groups have been lobbying to become exempt from the breast and nipple flagging to no avail-further advancing the idea that breast cancer is somehow sexual.  There are some web sites that show breast reconstruction but they are not support groups, and they are usually plastic surgery platforms that include reconstruction.  I’m sorry but I don’t want to be seeking support about my reconstructed breasts among women who don’t have breast cancer that are getting boob jobs.\r\n\r\nThe first time I was put in Facebook Jail, I had actually posted a photo of myself in a bra following one of my reconstruction surgeries, with no nudity at all.  After I had completed two years of surgeries and had gotten my 3D nipple tattoos (these tattoos are 3 dimensional and look like real nipples),  I posted a photo that got me an immediate ticket to Facebook Jail.  Some ladies choose to forego new nipples, some have them actually reconstructed followed by tattooing for pigment, and some, like me, get the 3D tattoos.  But we need to be able to discuss our experiences and show photos so that others may make informed choices.  \r\n\r\nSo to recap, women who have been diagnosed with breast cancer and join one of the largest breast cancer groups on the world’s largest social media platform are told their breast cancer photos violate “community standards.”  Adding insult to injury, I was able to spot numerous photos of celebrities on Facebook posing in photos with their nips clearly on display for all to see.  Riddle me that.  The sexualization of breast cancer needs to stop.  A mastectomy involves amputation of body parts.  It is not sexy and it’s not a pretty pink extravaganza.  We just want to navigate a cancer diagnosis like any other cancer warrior.', '2021-11-08 11:04:14', '2022-01-16 03:34:41'),
(5, 'AD001', '1636989087940.jpg', 'Conquering Cancer: Survive To Thrive', 'We all have challenges on a daily basis.  Some are overwhelming, such as the COVID-19 Pandemic.  Imagine hearing your doctor say that you have prostate cancer, on your birthday no less! In my case, it was at the top of my list. I have been extremely fortunate. Many of my friends and colleagues that are part of this “reluctant brotherhood” have not been as fortunate.  I witnessed my best friend lose his 4-year battle to prostate cancer just prior to my diagnosis – it was gut-wrenching.  Prostate cancer is terribly underfunded (and misunderstood) compared to other cancers because men do not talk about it. They do not engage because of the personal nature of the problem. They are embarrassed and isolate themselves after diagnosis.  I was there.  I did not tell anyone other than family and a few close friends for over a year.  \r\n\r\n..There is nothing more gratifying in life than making a difference in peoples’ lives and paying it forward.\r\n\r\nI almost did not fight it and was ready to give up, However, with the encouragement of a friend, I completely changed my mindset surrounding my diagnosis. He quite literally saved my life.  Knowing my background as an IRONMAN (IM), my friend reminded me of the IM motto – “anything is possible.” I made the decision to change my mindset from fixed to growth – I embraced a ‘winning mindset’!  The IM is a 2.4-mile swim, 112-mile bike, followed by a 26.2 marathon – all in one day.  So, I set goals; IRONMAN Lake Placid 14 months after surgery, and walking my daughter down the aisle became my long-term cancer recovery goals.   I also had short and intermediate cancer recovery goals.  \r\n\r\n \r\n\r\nThough surgery saved my life, the shift in mindset had to occur first. I felt so much despair and depression about the thought of cancer and the battle against it, that I needed the mindset shift to even get to the operating table. Mindset really is key.  \r\n\r\nI learned a lot about myself in this journey.  Lessons learned:\r\n\r\nDo not keep the negative emotions bottled up inside; regardless of the challenge; seek help such as a support group – talk about it!  \r\nCancer is not something to be experienced in isolation because the feeling of aloneness can swiftly overtake you.  \r\nLife presents us with a lot of challenges, and how we choose to deal with them is what defines us.   My cancer battle taught me that even on the worst days, I needed to remember and focus on the bigger picture.  \r\n\r\nAfter completing my recovery goals, including the IRONMAN World Championship in Hawaii (Lauren, my wife, has been my backbone every step of the way in this life-changing detour. I could not have achieved my cancer recovery goals without her love and support; I dedicated my life to helping others through philanthropy.  My success as an athlete gave me a false sense of invincibility.  Cancer and a heart attack humbled and changed me.  Being a survivor/conquer has given me a wonderful perspective on life.  My journey has created a passion in me to help others battling adversity.  \r\n\r\nAnother lesson learned; there is nothing more gratifying in life than making a difference in peoples’ lives and paying it forward.  There is only one line on Jackie Robinson’s grave, yet it says so much, “a person’s life is not important except in the impact it has on other lives.”', '2021-11-15 15:11:27', '2022-01-15 21:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `doctor_id` varchar(10) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `blood_grp` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `fee` decimal(6,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `doctor_id`, `speciality`, `dob`, `age`, `address`, `email`, `mobile`, `image`, `blood_grp`, `password`, `day`, `time`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Utsab Dey', 'DT001', 'Surgical Oncologist', '1997-02-16', 24, 'Maijdee, Noakhali', 'utsabdey83@gmail.com', '01685168481', '1642428951466.jpg', 'A+VE', '$2y$10$jTXpjZxb9UQvwe6gZ6wQEe7cTsbtqeFUDvhSNtxutwA12gy09r2e.', '0,4', '10 am,1 pm', '500.00', '2022-01-02 07:54:54', '2022-01-17 14:15:51'),
(2, 'Alex Gino', 'DT002', 'Hematologist', '1985-06-10', 36, 'Dhanmondi-32, Dhaka', 'abc@gmail.com', '01758112422', '1642426524713.jpg', 'O+VE', '$2y$10$736ACgXCiVfLuhqBn/A4BeI2jQn/ZQaZEZeqYWfVAo0vDrirZFnX2', '2,6', '10 am,4 pm', '700.00', '2022-01-15 09:46:51', '2022-01-17 14:17:04'),
(3, 'Mehdi', 'DT003', 'Psycho-Oncologist', '1980-02-01', 41, 'Maijdee, Noakhali', 'mehdi@gmail.com', '01758112484', '1642254453713.jpg', 'B-VE', '$2y$10$UAzYZForTw/Y9lkh3vF.deN4zERWzkMc/hr1njWONId3Upu7qC.NC', '0,6', '10 am,3 pm', '600.00', '2022-01-15 13:47:33', '2022-01-15 13:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `appt_id` int(11) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `doctor_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rules` varchar(100) NOT NULL,
  `dose` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `advice` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `appt_id`, `patient_id`, `doctor_id`, `name`, `rules`, `dose`, `time`, `advice`, `created_at`, `updated_at`) VALUES
(1, 1, 'PT001', 'DT001', 'Napa', 'After meal', '1+1+1', '7 days', 'Take Rest.', '2022-01-20 04:02:23', '2022-01-20 04:02:23'),
(2, 4, 'PT001', 'DT001', 'Afinitor Disperz (Everolimus)', 'Before meal', '1+1+1', '10 days', 'Come after 10 days', '2022-01-20 04:19:31', '2022-01-20 04:19:31'),
(3, 1, 'PT001', 'DT001', 'Tab. Demo', 'After meal', '1+1+1', '3 days', 'Test', '2022-04-02 05:03:17', '2022-04-02 05:03:17'),
(4, 1, 'PT001', 'DT001', 'Tab. Demo 1', 'After meal', '1+1+1', '3 days', 'Test 1', '2022-04-02 05:04:17', '2022-04-02 05:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `blood_grp` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_visit` date DEFAULT NULL,
  `total_visit` tinyint(3) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `patient_id`, `dob`, `age`, `address`, `email`, `mobile`, `image`, `blood_grp`, `password`, `last_visit`, `total_visit`, `created_at`, `updated_at`) VALUES
(1, 'John Alex', 'PT001', '1995-02-16', 26, 'Dhanmondi-32, Dhaka', 'john@gmail.com', '01758112422', '1638514964298.jpg', 'AB+VE', '$2y$10$xQbCh.XBHzepeFxm.32DP.V1eyYSfFFu/oTO4O6fuSliDHlzO1MOu', NULL, 0, '2021-12-03 07:02:45', '2022-01-17 12:58:13'),
(2, 'Md. Kamal', 'PT002', '1980-03-05', 41, 'Maijdee, Noakhali', 'kamal@gmail.com', '01758112422', '1642054557483.jpg', 'B+VE', '$2y$10$3qrUuqt4UXMXpYM0S770Xee3c1AmK4c2oli9rsjVQXrfxIh6Gapai', NULL, 0, '2022-01-13 06:15:58', '2022-01-13 06:15:58'),
(3, 'Atikul Ashik', 'PT003', '1998-07-01', 23, 'Sector-4, Uttora, Dhaka', 'ashik@gmail.com', '01757623986', '1642428843289.jpg', 'A-VE', '$2y$10$U3OghiJSsjSij02WthXGJOhRijR0vKmHccMde4XLSPjt4Ewaey5KG', NULL, 0, '2022-01-15 11:50:58', '2022-01-17 14:14:03'),
(4, 'Nusrat Mim', 'PT004', '1998-09-02', 23, 'Sukhrabad, Dhanmondi-32, Dhaka', 'nusrat@gmail.com', '01734679702', '1642670135652.jpg', 'O+VE', '$2y$10$6RnxzOJDRRwsgmCeLIqcOe8noJu5bi1fTxCeYp1jm1cNonHCV2yK6', NULL, 0, '2022-01-20 09:15:36', '2022-01-20 09:15:36'),
(5, 'Utsab Dey', 'PT007', '2020-02-16', 2, 'Panthapath', 'utsabdey83@gmail.com', '01685168481', '1648875132867.JPG', 'A+VE', '$2y$10$327WrsK11AJYJTb/o.6nxu9enrEpetygYSC4HmIHYtYjSG5g2nxMy', NULL, 0, '2022-04-02 04:52:14', '2022-04-02 04:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `blood_grp` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `dob`, `age`, `address`, `email`, `mobile`, `image`, `blood_grp`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Utsab Dey', 'AD001', '2012-01-10', 10, 'Maijdee, Noakhali', 'utsabdey83@gmail.com', '01685168481', 'user1638266844715.jpg', 'A+VE', '$2y$10$L/j/ykbIP5cwzTRJACSb2O44cODHiB3Jm0TIdJlMKC5Ny.xN3gLJ2', '2021-11-30 10:15:15', '2022-01-16 06:02:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
