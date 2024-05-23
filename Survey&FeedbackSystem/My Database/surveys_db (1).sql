-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 08:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbackcategory`
--

CREATE TABLE `feedbackcategory` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbackcategory`
--

INSERT INTO `feedbackcategory` (`CategoryID`, `CategoryName`, `Description`) VALUES
(1, 'Brand new', 'for all');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackcomment`
--

CREATE TABLE `feedbackcomment` (
  `CommentID` int(11) NOT NULL,
  `ResponseID` int(11) DEFAULT NULL,
  `CommentText` text DEFAULT NULL,
  `CommentDate` datetime DEFAULT NULL,
  `CommenterID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbackcomment`
--

INSERT INTO `feedbackcomment` (`CommentID`, `ResponseID`, `CommentText`, `CommentDate`, `CommenterID`) VALUES
(1, 1, 'Please provide clear answer.\r\n', '2024-05-19 16:29:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbackrating`
--

CREATE TABLE `feedbackrating` (
  `RatingID` int(11) NOT NULL,
  `ResponseID` int(11) DEFAULT NULL,
  `RatingValue` int(11) DEFAULT NULL,
  `RatingDate` datetime DEFAULT NULL,
  `RaterID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbackrating`
--

INSERT INTO `feedbackrating` (`RatingID`, `ResponseID`, `RatingValue`, `RatingDate`, `RaterID`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktag`
--

CREATE TABLE `feedbacktag` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(11) NOT NULL,
  `SurveyID` int(11) DEFAULT NULL,
  `QuestionText` text DEFAULT NULL,
  `QuestionType` varchar(50) DEFAULT NULL,
  `Sequence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `SurveyID`, `QuestionText`, `QuestionType`, `Sequence`) VALUES
(1, 2, 'who are you', 'Checkbox', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `ReportName` varchar(100) DEFAULT NULL,
  `ReportDescription` text DEFAULT NULL,
  `CreatorID` int(11) DEFAULT NULL,
  `CreationDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ReportID`, `ReportName`, `ReportDescription`, `CreatorID`, `CreationDate`) VALUES
(1, 'Quarterly Sales Report', 'This report summarizes the quarterly sales performance.', 1, '2024-05-18 17:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `ResponseID` int(11) NOT NULL,
  `RespondentID` int(11) DEFAULT NULL,
  `SurveyID` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `Answer` text DEFAULT NULL,
  `ResponseDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`ResponseID`, `RespondentID`, `SurveyID`, `QuestionID`, `Answer`, `ResponseDate`) VALUES
(1, 1, 1, 1, 'Am Joe Chris', '2024-05-19 14:11:39'),
(2, 1, 1, 1, 'Am Mark', '2024-05-19 15:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `surveyparticipant`
--

CREATE TABLE `surveyparticipant` (
  `ParticipantID` int(11) NOT NULL,
  `SurveyID` int(11) DEFAULT NULL,
  `RespondentID` int(11) DEFAULT NULL,
  `ParticipationDate` datetime DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surveyparticipant`
--

INSERT INTO `surveyparticipant` (`ParticipantID`, `SurveyID`, `RespondentID`, `ParticipationDate`, `Status`) VALUES
(1, 1, 1, '2024-05-22 14:19:00', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `SurveyID` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `CreatorID` int(11) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`SurveyID`, `Title`, `Description`, `CreatorID`, `StartDate`, `EndDate`) VALUES
(1, 'Customer Satisfaction Survey', 'A survey to measure customer satisfaction levels.', 1, '2024-05-09', '2024-06-01'),
(2, 'Employee Feedback Survey', 'Gathering feedback from employees about the workplace environment.', 2, '2024-04-15', '2024-05-24'),
(3, 'Product Launch Survey', 'Feedback on the recent product launch.', 3, '2024-03-20', '2024-04-20'),
(4, 'Market Research Survey', 'Understanding the market trends and customer preferences.', 1, '2024-02-10', '2024-03-10'),
(5, 'Website Usability Survey', 'Assessing the usability of our new website.', 2, '2024-01-05', '2024-02-05'),
(6, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Email`, `Password`, `FirstName`, `LastName`, `Role`) VALUES
(1, 'jdoe', 'jdoe@example.com', 'password123', 'John', 'Doe', 'Admin'),
(2, 'asmith', 'asmith@example.com', 'password123', 'Alice', 'Smith', 'User'),
(3, 'bwilliams', 'bwilliams@example.com', 'password123', 'Bob', 'Williams', 'User'),
(4, 'cjones', 'cjones@example.com', 'password123', 'Carol', 'Jones', 'Admin'),
(7, 'sammy250', 'sammy@gmail.com', '$2y$10$ogzK6m/Rx6JMgl7vP0.s9.tZ.dj.C34k8MrjJ9IuUzcdXjA3bbcnu', 'Sammy ', 'Khedira', 'survey_creator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbackcategory`
--
ALTER TABLE `feedbackcategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `feedbackcomment`
--
ALTER TABLE `feedbackcomment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `ResponseID` (`ResponseID`),
  ADD KEY `CommenterID` (`CommenterID`);

--
-- Indexes for table `feedbackrating`
--
ALTER TABLE `feedbackrating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `ResponseID` (`ResponseID`),
  ADD KEY `RaterID` (`RaterID`);

--
-- Indexes for table `feedbacktag`
--
ALTER TABLE `feedbacktag`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `SurveyID` (`SurveyID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `CreatorID` (`CreatorID`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`ResponseID`),
  ADD KEY `RespondentID` (`RespondentID`),
  ADD KEY `SurveyID` (`SurveyID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `surveyparticipant`
--
ALTER TABLE `surveyparticipant`
  ADD PRIMARY KEY (`ParticipantID`),
  ADD KEY `SurveyID` (`SurveyID`),
  ADD KEY `RespondentID` (`RespondentID`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`SurveyID`),
  ADD KEY `CreatorID` (`CreatorID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbackcategory`
--
ALTER TABLE `feedbackcategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbackcomment`
--
ALTER TABLE `feedbackcomment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbackrating`
--
ALTER TABLE `feedbackrating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacktag`
--
ALTER TABLE `feedbacktag`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `ResponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surveyparticipant`
--
ALTER TABLE `surveyparticipant`
  MODIFY `ParticipantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `SurveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedbackcomment`
--
ALTER TABLE `feedbackcomment`
  ADD CONSTRAINT `feedbackcomment_ibfk_1` FOREIGN KEY (`ResponseID`) REFERENCES `responses` (`ResponseID`),
  ADD CONSTRAINT `feedbackcomment_ibfk_2` FOREIGN KEY (`CommenterID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `feedbackrating`
--
ALTER TABLE `feedbackrating`
  ADD CONSTRAINT `feedbackrating_ibfk_1` FOREIGN KEY (`ResponseID`) REFERENCES `responses` (`ResponseID`),
  ADD CONSTRAINT `feedbackrating_ibfk_2` FOREIGN KEY (`RaterID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`SurveyID`) REFERENCES `surveys` (`SurveyID`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`CreatorID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`RespondentID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`SurveyID`) REFERENCES `surveys` (`SurveyID`),
  ADD CONSTRAINT `responses_ibfk_3` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`);

--
-- Constraints for table `surveyparticipant`
--
ALTER TABLE `surveyparticipant`
  ADD CONSTRAINT `surveyparticipant_ibfk_1` FOREIGN KEY (`SurveyID`) REFERENCES `surveys` (`SurveyID`),
  ADD CONSTRAINT `surveyparticipant_ibfk_2` FOREIGN KEY (`RespondentID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_ibfk_1` FOREIGN KEY (`CreatorID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
