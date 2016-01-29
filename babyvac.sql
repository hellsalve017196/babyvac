-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2015 at 05:47 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babyvac`
--

-- --------------------------------------------------------

--
-- Table structure for table `children_immu_details`
--

CREATE TABLE IF NOT EXISTS `children_immu_details` (
  `c_i_d_id` int(255) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `Lot` text NOT NULL,
  `c_i_id` int(255) NOT NULL,
  `i_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_immu_details`
--

INSERT INTO `children_immu_details` (`c_i_d_id`, `doctor_name`, `Lot`, `c_i_id`, `i_id`, `c_id`) VALUES
(3, 'test', 'Repellendus Mollitia amet omnis sit quia recusandae Dolor voluptatem', 3, 1, 44);

-- --------------------------------------------------------

--
-- Table structure for table `children_immu_info`
--

CREATE TABLE IF NOT EXISTS `children_immu_info` (
  `c_i_id` int(255) NOT NULL,
  `c_i_type` varchar(20) NOT NULL,
  `c_i_date` int(255) NOT NULL,
  `c_id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_immu_info`
--

INSERT INTO `children_immu_info` (`c_i_id`, `c_i_type`, `c_i_date`, `c_id`) VALUES
(3, 'private', 1429142400, 44);

-- --------------------------------------------------------

--
-- Table structure for table `children_list`
--

CREATE TABLE IF NOT EXISTS `children_list` (
  `c_id` int(255) NOT NULL,
  `c_pic` text,
  `c_name` varchar(300) NOT NULL,
  `c_dob` int(255) NOT NULL,
  `c_gender` varchar(100) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_list`
--

INSERT INTO `children_list` (`c_id`, `c_pic`, `c_name`, `c_dob`, `c_gender`, `p_id`) VALUES
(57, '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDABALDA4MChAODQ4SERATGCgaGBYWGDEjJR0oOjM9PDkzODdASFxOQERXRTc4UG1RV19iZ2hnPk1xeXBkeFxlZ2P/2wBDARESEhgVGC8aGi9jQjhCY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2P/wAARCABkAEsDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4 Tl5ufo6erx8vP09fb3 Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3 Pn6/9oADAMBAAIRAxEAPwCLbTwlSrHzUyxVIFcR08RVaWL2p4ipgUfK56U4RGrvlc0eVQBSMdNKYq8YqjaKgCmVpMe1WGjqPb7UAW0iqdIqmSIZqwkPtQBWWH2qQQ 1W1hqQRCmIoeV83Sl8n2q75fzmlMXHSkMz2iqJo60HjqJo6AM94/aoDHzWk8dQmPnpTEWEZatRlT3rIW6XI61YS7T1qblWNZceorldW8bRWN69vb2xmEbFWctgHGcgfjUniDXW06xBtsGaQ7VJ/h98VxK2qsQZMs55Yn1NO4cp0ll48c3TfaYEELDjB5FdH4e8RWutxMFAiuFODETyR6ivPRax4 6Oart5mmzx3No7IwPDA/dNJSBxPYWjBqNoar6Vfi6062llkUySICSBgE tXDIOxFMkqvHVcpz0q3LIBSiLIBPWgCh9ityxBLAg44NTppVuw4d/wBP8KZCdxzWhD0qCrnB LNPkh1a3LkG32EhvTHr Nc48rRykJNu57LXb NZ4o5reNyctE fTquP5Vx0j2/sPWqBBPcskSlQoJ7moXcy27hyh4yCtWJ5bZgoDA8dBUltFbyzQwqVAlkVCT0GSBSKO00awvE0m2DLtJQHGR0PIq20N0v8LH8M1r4CrgDAAwAKZGT5hBORik9yTO0 3nNyzzhgqjjIxWpiloqrWEZtsny1LKkjwlY3KbjywYggDB44rNXXNPhgGZizY 6qkmoj4rtU 7FKzYwqnA/HPNFguc741SW2uoVkeaRSuVd2JB9cVzyrG77iM orW8U60 qTpCY1SKJSUA5Oc v0rnlkaM/KcUwRdkjhb7vGOp24qxo1o99qdtb2 SAdzEdQByTWbLcu4wa1fCt2ljqf2mW3SYIvAbqp7Ee9A7nqrSHnIqNH/fL71iS JbEyfL5pDHrtGB tTrqMBdGEyEAg8NWb0YG9SZrltS8aw2V1JFHaGdY N4kxuPfHBqWLxjps0ayGTyif4H6j8qtiOLEmXI980jvidTmmL1Y 9Rbsyn24rQgjvk YSDoDzTDbhhyKsMwJZT0YVFG 3923VePwqWVEhaBUBOOnrVq0HlQ8j5iNx/H/APVUTt5r7B071Nu d19AB/n86SBkhk/dKc96cZGWUDqpJBHbGKqk/J9DinySYVTQBZaOGdwZSdoB4B6mj7DAfuocdvmNVC5AxVlLpkQKG6VDTLQw8VAn3m poorYyFf749xQoDqNwB ooooAcEVD8oAqOI/vG9zRRUjB EYikfon1oopDBeWqN3IY0UUhn//2Q==', 'zamir khan', 1435363200, 'boy', 5),
(58, '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDABALDA4MChAODQ4SERATGCgaGBYWGDEjJR0oOjM9PDkzODdASFxOQERXRTc4UG1RV19iZ2hnPk1xeXBkeFxlZ2P/2wBDARESEhgVGC8aGi9jQjhCY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2P/wAARCABkAEsDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4 Tl5ufo6erx8vP09fb3 Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3 Pn6/9oADAMBAAIRAxEAPwCvtpwSphHzUqxUCK4jp3lVbWGnGKgCl5VL5VXfK9qPK9qQFEx0wpV8xVE0VMCmVpuKsPHURXmgDSSHmp0h9qmRBVDV9dttJ R0MkuM7F44piL4hoMPI4rAg8aWjl/MiaMfw8Z/OrVh4ntLq78kkjP3TikBr T7UjRVahkhmyIpFcjrg5pWjoGUGjqJ46vtHUbR0AZskdVzHzWnJHVYpzQAt5rFrpybrlwCeijkmuE1W7fVNQmu1XYj8KD6Cm6ldyalfGR FXgD0FIo6AdB0pNjSKv2d/anRJNDIskeQynINXVSn7fap5i UbpesT2mtQXbs2AcOucbh0NerW0kd5bJPEcq44ryO6hUxF1HzLzXU AdRvHmNqWX7Mqk4b n e9Unchqx2bQ1G8eO1XC30qGRh3piKEiVB5J9BWmY/l3EVAy8mlcDy22tRNbSEybZfvbe5FVCjJyrn8as3C7pXIOOeMdqrmFu5OKBlm2lO07zmnSXio2NpNEEO2MnuRVZtyNkrkUtGVqi1HNHOGQcEjoa2/BVvMWmljUlQMZA6VgxMGIYJyOeld/4HtGtdBWZsh52LYPYdqWwMuGadByDU2nGW6dmk4VDjFaUZ3qdwBwfSnqoUYUAfShEkci/LVQjk1dk 7VNvvGmB5Krgtk0NKoIyMiqpchRjrTOT1NOwXNbzoRGDu vFNUKwPcZ4rMOQB8 angnbdtNFirmgmxZEU9CwBr0 B9ttGpABA6CvJoXMt5Eo7MDxXqXmkIN3XFQxNl62bJcfSrFZ9jOvmuCQOM05dZ015REl7AzngKHHNUnoItSnAqmx Y1JJcIwyGGPWqEt7bpIVaVQR2zSEeSA09X29s1FTgxFWMlD5424/Ck3qpyBTC5NMoAtafdm0vUnCK5U5AbpXSTeLJpbhnCKIWJ2ptOR6c1zdgFaYhs5xkEdqm xtsOJUz6UmBrtrN26zSebsTHllR79f6VkGGS5JkhxtVsDnFPW0keERrIoZjlxnPSpbEbYpUByUc5/z FJ6LQFqzTTVJ1sVt2ck4 b3qSLVLVIlWW2aR1GC27rWZJwCR2qAsahSZpyoyqKKK1MwooooAs2nDZHXOKmZyGxniiikAb2WZSDg1ZibazgADfyffrRRUsaFb5o2B9KrYx3NFFQjVn//Z', 'jaquab', 1451088000, 'girl', 5);

-- --------------------------------------------------------

--
-- Table structure for table `disease_list`
--

CREATE TABLE IF NOT EXISTS `disease_list` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(300) NOT NULL,
  `d_des` text NOT NULL,
  `covered_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_list`
--

INSERT INTO `disease_list` (`d_id`, `d_name`, `d_des`, `covered_by`) VALUES
(1, 'Tuberclosis', 'Tuberculosis generally affects the lungs, but can also affect other parts of the body. It is spread through the air when people who have an active TB infection cough, sneeze, or otherwise transmit respiratory fluids through the air.[2] Most infections do not have symptoms, known as latent tuberculosis. About one in ten latent infections eventually progresses to active disease which, if left untreated, kills more than 50% of those so infected.', 1),
(3, 'Diphtheria', 'Diphtheria is usually spread between people by direct contact or through the air. It may also be spread by contaminated objects. Some people carry the bacteria without having symptoms, but can still spread the disease to others.', 2),
(4, 'Tetanus', 'Tetanus, also known as lockjaw, is an infection characterized by muscle spasms. In the most common type the spasms begin in the jaw and then progress to the rest of the body. ', 2),
(5, 'Pertussis', 'Pertussis, also known as whooping cough or 100-day cough, is a highly contagious bacterial disease.[1][2] Initially, symptoms are usually similar to those of the common cold with a runny nose, fever, and mild cough. This is then followed by weeks of severe coughing fits.', 2),
(6, 'Haemophilus meningitis', 'Haemophilus meningitis is a form of Bacterial meningitis caused by the Haemophilus Influenzae bacteria. It is usually (but not always) associated with Haemophilus influenzae type b.[1] Meningitis involves the inflammation of the protective membranes that cover the brain and spinal cord.', 2),
(7, 'Polio', 'Poliomyelitis, often called polio or infantile paralysis, is an infectious disease caused by the poliovirus. In about 0.5% of cases there is muscle weakness resulting in an inability to move.[1] This can occur over a few hours to few days.The weakness most often involves the legs but may less commonly involve the muscles of the head, neck and diaphragm.', 2),
(8, 'Hepatitis B', 'Hepatitis B is an infectious disease caused by the hepatitis B virus (HBV) which affects the liver. It can cause both acute and chronic infections. Many people have no symptoms during the initial infection. Some develop a rapid onset of sickness with vomiting, yellowish skin, feeling tired, dark urine and abdominal pain.', 2),
(9, 'Pneumococcal  meningitis', 'S. pneumoniae is normally found in the nose and throat of 5–10% of healthy adults, and 20–40% of healthy children.[3] It can be found in higher amounts in certain environments, especially those where people are spending a great deal of time in close proximity to each other (day care centers, military barracks).', 3),
(10, 'Measles', 'Measles, also known as morbilli, rubeola or red measles, is a highly contagious infection caused by the measles virus.[1][2] Initial signs and symptoms typically include fever, often greater than 40 °C (104.0 °F), cough, runny nose, and red eyes.[1][3] Two or three days after the start of symptoms, small white spots may form inside the mouth, known as Koplik''s spots.', 8),
(11, 'Mumps', 'Mumps, also known as epidemic parotitis, is a viral disease caused by the mumps virus.[1] Initial signs and symptoms often include fever, muscle pain, headache, and feeling tired.This is then usually followed by painful swelling of one or both parotid glands.Symptoms typically occur 16 to 18 days after exposure and resolve after 7 to 10 days.', 8),
(13, 'Rubella', 'Rubella, also known as German measles or three-day measles, is an infection caused by the rubella virus. This disease is often mild with half of people not realizing that they are sick.A rash may start around two weeks after exposure and last for three days.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `immunization_list`
--

CREATE TABLE IF NOT EXISTS `immunization_list` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(300) NOT NULL,
  `i_time` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `immunization_list`
--

INSERT INTO `immunization_list` (`i_id`, `i_name`, `i_time`) VALUES
(1, 'BCG', 0),
(2, '6 in 1(2 months)', 5184000),
(3, 'PCV(2 months)', 5184000),
(4, '6 in 1(4 months)', 10368000),
(5, 'Men C(4 months)', 10368000),
(6, '6 in  1(6 months)', 15552000),
(7, 'PCV(6 months)', 15552000),
(8, 'MMR', 31104000),
(9, 'PCV(12 months)', 31104000),
(10, 'Men C(13 months)', 33696000),
(11, 'HIB', 33696000);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `p_id` int(255) NOT NULL,
  `p_name` varchar(300) NOT NULL,
  `p_phone` varchar(20) DEFAULT NULL,
  `p_address` text,
  `p_region` varchar(300) DEFAULT NULL,
  `p_img` text,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`p_id`, `p_name`, `p_phone`, `p_address`, `p_region`, `p_img`, `u_id`) VALUES
(5, 'sami rahman', NULL, 'durban', 'test', NULL, 5),
(6, 'sam', NULL, NULL, NULL, NULL, 41),
(7, 'jack anderson', NULL, NULL, NULL, NULL, 42),
(8, 'woram', NULL, NULL, NULL, NULL, 43);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_type` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_password`, `u_type`) VALUES
(5, 'a@a.com', '123', 'guardian'),
(41, 'sad@sad.com', '123', 'guardian'),
(42, 'j@j.com', '123', 'guardian'),
(43, 'w@w.com', '123', 'guardian'),
(44, 'poriboso@gmail.com', 'Pa$$w0rd!', 'guardian'),
(45, 'jypydat@gmail.com', 'Pa$$w0rd!', 'guardian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children_immu_details`
--
ALTER TABLE `children_immu_details`
  ADD PRIMARY KEY (`c_i_d_id`),
  ADD KEY `Children_immu_details_fk0` (`c_i_id`),
  ADD KEY `Children_immu_details_fk1` (`i_id`);

--
-- Indexes for table `children_immu_info`
--
ALTER TABLE `children_immu_info`
  ADD PRIMARY KEY (`c_i_id`),
  ADD KEY `Children_immu_info_fk0` (`c_id`);

--
-- Indexes for table `children_list`
--
ALTER TABLE `children_list`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `Children_list_fk0` (`p_id`);

--
-- Indexes for table `disease_list`
--
ALTER TABLE `disease_list`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `Disease_list_fk0` (`covered_by`);

--
-- Indexes for table `immunization_list`
--
ALTER TABLE `immunization_list`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `Parent_fk0` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children_immu_details`
--
ALTER TABLE `children_immu_details`
  MODIFY `c_i_d_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `children_immu_info`
--
ALTER TABLE `children_immu_info`
  MODIFY `c_i_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `children_list`
--
ALTER TABLE `children_list`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `disease_list`
--
ALTER TABLE `disease_list`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `immunization_list`
--
ALTER TABLE `immunization_list`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `children_immu_details`
--
ALTER TABLE `children_immu_details`
  ADD CONSTRAINT `Children_immu_details_fk0` FOREIGN KEY (`c_i_id`) REFERENCES `children_immu_info` (`c_i_id`),
  ADD CONSTRAINT `Children_immu_details_fk1` FOREIGN KEY (`i_id`) REFERENCES `immunization_list` (`i_id`);

--
-- Constraints for table `children_immu_info`
--
ALTER TABLE `children_immu_info`
  ADD CONSTRAINT `Children_immu_info_fk0` FOREIGN KEY (`c_id`) REFERENCES `children_list` (`c_id`);

--
-- Constraints for table `children_list`
--
ALTER TABLE `children_list`
  ADD CONSTRAINT `Children_list_fk0` FOREIGN KEY (`p_id`) REFERENCES `parent` (`p_id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `Parent_fk0` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
