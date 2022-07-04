-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 07:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(1) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `batch_details`
--

CREATE TABLE `batch_details` (
  `id` int(5) NOT NULL,
  `batch_id` varchar(10) NOT NULL,
  `batch_name` varchar(30) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_details`
--

INSERT INTO `batch_details` (`id`, `batch_id`, `batch_name`, `course_name`, `start_date`, `end_date`) VALUES
(1, 'BATCH-0001', 'Web Batch-1', 'Web Programming', '2018-04-24', '2018-05-25'),
(2, 'BATCH-0002', 'Android Batch-1', 'Android', '2018-04-26', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `id` int(5) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `batch_name` varchar(25) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `days` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`id`, `subject`, `batch_name`, `start_time`, `end_time`, `days`) VALUES
(1, 'HTML', 'Web Batch-1', '11:00', '13:00', 'Monday,Wednesday,Friday'),
(2, 'Android', 'Android Batch-1', '14:00', '15:30', 'Monday,Tuesday,Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `faculty_name` text NOT NULL,
  `fee` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `course_name`, `faculty_name`, `fee`) VALUES
(1, 'Web Programming', 'Vikram', 15000),
(2, 'Android', 'Richa', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `id` int(5) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `name` char(20) NOT NULL,
  `gender` text NOT NULL,
  `address` longtext NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `add_doc` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`id`, `faculty_id`, `name`, `gender`, `address`, `contact`, `email`, `add_doc`, `image`, `status`) VALUES
(1, 'FID_000001', 'Vikram', 'male', 'Boring Road, Patna', 2147483647, 'vikram@gmail.com', 'faculty doc/1.jpg', 'faculty img/1.jpg', 0),
(2, 'FID_000002', 'Richa', 'female', 'Kankarbagh, Patna', 2147483647, 'richa@gmail.com', 'faculty doc/2.jpg', 'faculty img/2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE `faculty_login` (
  `id` int(5) NOT NULL,
  `faculty_id` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `heading` longtext NOT NULL,
  `content` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `heading`, `content`, `date`) VALUES
(1, 'New Admission', '<p><span style=\"font-size:14px\"><span style=\"font-family:comic sans ms,cursive\"><strong>New admission will start from 01/05/2018.</strong></span></span></p>\r\n', '2018-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(5) NOT NULL,
  `payment_id` varchar(10) NOT NULL,
  `student_reg_id` varchar(10) NOT NULL,
  `total_amt` int(5) NOT NULL,
  `paid_amt` int(5) NOT NULL,
  `add_fee` int(5) NOT NULL,
  `add_fee_details` varchar(30) NOT NULL,
  `gst` int(6) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(5) NOT NULL,
  `student_reg_id` varchar(10) NOT NULL,
  `batch_name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `present` int(1) NOT NULL,
  `absent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_reg_id`, `batch_name`, `date`, `present`, `absent`) VALUES
(25, 'SID-000001', 'Web Batch-1', '2018-04-19', 1, 0),
(27, 'SID-000003', 'Web Batch-1', '2018-04-19', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `id` int(5) NOT NULL,
  `student_reg_id` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `student_reg_id`, `password`) VALUES
(4, 'SID-000001', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(5) NOT NULL,
  `student_reg_id` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` longtext NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `batch_name` varchar(30) NOT NULL,
  `date_of_reg` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `student_reg_id`, `name`, `email`, `contact`, `address`, `city`, `state`, `pincode`, `dob`, `gender`, `course_name`, `batch_name`, `date_of_reg`, `photo`, `status`) VALUES
(1, 'SID-000001', 'Aakash Kr.', 'aakash@gmail.com', 2147483647, 'Gandhi Maidan, Patna', 'Patna', 'Bihar', 800003, '2000-04-21', 'male', 'Web Programming', 'Web Batch-1', '2018-04-19', 'student img/3.jpg', 0),
(2, 'SID-000002', 'Aman Verma', 'amanv@gmail.com', 2147483647, 'Raja Bazar, Patna', 'Patna', 'Bihar', 800006, '2001-06-06', 'male', 'Android', 'Android Batch-1', '2018-04-19', 'student img/4.jpg', 0),
(3, 'SID-000003', 'Pranit Roy', 'pranit8roy@gmail.com', 465132, 'FLAT- 202, PRANAB MANSION, PARK ROAD', 'PATNA', 'India', 800003, '2018-04-18', 'male', 'Web Programming', 'Web Batch-1', '2018-04-19', 'student img/2.jpg', 1),
(4, 'SID-000004', 'Ankur Kr.', 'ankur@gmail.com', 2147483647, 'Gandhi Maidan, Patna', 'Patna', 'Bihar', 800003, '2001-06-20', 'male', 'Web Programming', 'Web Batch-1', '2018-05-03', 'student img/3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `study_material`
--

CREATE TABLE `study_material` (
  `id` int(10) NOT NULL,
  `topic` longtext NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `course_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `id` int(5) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `question` longtext NOT NULL,
  `option1` longtext NOT NULL,
  `option2` longtext NOT NULL,
  `option3` longtext NOT NULL,
  `option4` longtext NOT NULL,
  `correct_ans` longtext NOT NULL,
  `marks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`id`, `course_name`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_ans`, `marks`) VALUES
(7, 'Web Programming', '<p><strong>Which of the following JavaScript cannot do?</strong></p>\r\n', 'JavaScript can react to events', 'JavaScript can manipulate HTML elements', 'JavaScript can be use to validate data', 'All of the Above', 'All of the Above', 5),
(8, 'Web Programming', '<p><strong>The common element which describe the web page, is ?</strong></p>\r\n', 'heading', 'paragraph', 'list', 'All of these', 'All of these', 5),
(9, 'Web Programming', '<p><strong>HTML stands for?</strong></p>\r\n', 'Hyper Text Markup Language', 'High Text Markup Language', 'Hyper Tabular Markup Language', 'None of these', 'Hyper Text Markup Language', 5),
(10, 'Web Programming', '<p><strong>Which of the following attributes of text box control allow to limit the maximum character?</strong></p>\r\n', 'size', 'len', 'maxlength', 'All of these', 'maxlength', 5),
(11, 'Web Programming', '<p>&nbsp;</p>\r\n\r\n<p><strong>The latest HTML standard is</strong></p>\r\n', 'XML', 'SGML', 'HTML 4.0', 'HTML 5.0', 'HTML 5.0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `test_marks`
--

CREATE TABLE `test_marks` (
  `marks_id` int(5) NOT NULL,
  `test_id` int(5) NOT NULL,
  `student_reg_id` varchar(10) NOT NULL,
  `marks_scored` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_details`
--
ALTER TABLE `batch_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_marks`
--
ALTER TABLE `test_marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch_details`
--
ALTER TABLE `batch_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_details`
--
ALTER TABLE `faculty_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_details`
--
ALTER TABLE `test_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test_marks`
--
ALTER TABLE `test_marks`
  MODIFY `marks_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
