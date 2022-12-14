-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Dec 13, 2022 at 07:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` bigint(10) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  `DepartmentID` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `DepartmentID`) VALUES
(1, 'Database', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ExamID` bigint(10) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `CourseID` bigint(100) NOT NULL,
  `ProfessorID` bigint(100) NOT NULL,
  `ExamDateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ExamID`, `Content`, `CourseID`, `ProfessorID`, `ExamDateTime`) VALUES
(1, '00000001,00000002,00000007', 1, 1, '2022-12-07 01:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `ProfessorID` bigint(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DepartmentID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`ProfessorID`, `FirstName`, `LastName`, `DepartmentID`) VALUES
(1, 'Denis', 'Lavoir', 1),
(2, 'Paul', 'Smith', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionID` bigint(10) NOT NULL,
  `Detail` varchar(500) NOT NULL,
  `Answer` varchar(300) NOT NULL,
  `Option1` varchar(300) NOT NULL,
  `Option2` varchar(300) NOT NULL,
  `Option3` varchar(300) NOT NULL,
  `Option4` varchar(300) NOT NULL,
  `Option5` varchar(300) NOT NULL,
  `ExamID` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `Detail`, `Answer`, `Option1`, `Option2`, `Option3`, `Option4`, `Option5`, `ExamID`) VALUES
(1, 'Anti-discrimination guidelines outlined in the EEOC’s Uniform Guidelines on Employee Selection. Procedures apply to all of these employers, EXCEPT?', 'D)  The armed forces', 'A)  Most state and local government employees', 'B)  Federal government contractors', 'C)  Labor organizations', 'D)  The armed forces', '', 1),
(2, 'Conducting a phone interview falls under which step of the selection process?', 'D)  screening interview', 'A)  evaluation by association', 'B)  assessment', 'C)  external verification', 'D)  screening interview', '', 1),
(3, 'Contacting a candidate’s references falls under which step of the selection process?', 'D)  external verification', 'A)  screening interview', 'B)  evaluation by association', 'C)  assessment', 'D)  external verification', '', 1),
(4, '\r\nDarshan is posting a job opening at his company. Which of the following methods is likely to have the greatest reach?', 'D)  posting the job on social media sites', 'A)  placing an advertisement in the newspaper', 'B)  setting up a booth at a job fair', 'C)  advertising on an internal job board', 'D)  posting the job on social media sites', '', 1),
(5, 'Internal candidates offer all of the following potential advantages over outside hires, EXCEPT?', 'D)  Internal candidates inevitably lead to company climate change.', 'A)  Known talent already in the company has a chance to shine.', 'B)  Hiring internal candidates builds employee loyalty.', 'C)  Hiring internal candidates may help reduce attrition to other jobs.', 'D)  Internal candidates inevitably lead to company climate change.', '', 1),
(6, 'What is the primary goal of recruitment?', 'D)  to build a qualified candidate pool', 'A)  to eliminate the need to check references', 'B)  to promote from within the company', 'C)  to evaluate worker performance', 'D)  to build a qualified candidate pool', '', 1),
(7, 'What rule should hiring managers follow when interviewing applicants in order to avoid making a judgment based on a first impression?', 'D)  Try to disprove their initial judgment in the interview', 'A)  Try to confirm their initial judgments in the interview', 'B)  Try to make an informed first impression in the first five minutes', 'C)  Bring the candidate’s resume and qualifications to mind', 'D)  Try to disprove their initial judgment in the interview', '', 1),
(8, 'When considering job postings, Jamal looks up information on each company’s reputation. Which of the following brand reputation factors is most likely to deter Jamal from seeking employment with a certain company?', 'D)  poor leadership', 'A)  customer dissatisfaction', 'B)  poor fiscal performance last quarter', 'C)  shrinking market share', 'D)  poor leadership', '', 1),
(9, 'Which of these basic recommendations for forming interview questions BEST addresses the need for fairness in interviewing all candidates?', 'D)  Questions asked should be consistent across candidates', 'A)  Questions should focus on job duties', 'B)  Questions should reflect the realities of the position', 'C)  Questions should reflect the business environment', 'D)  Questions asked should be consistent across candidates', '', 1),
(10, 'Which of these practices is MOST likely to result in a workforce with insufficient diversity?', 'D)  employee word-of-mouth recruitment', 'A)  masking biographical information on resumes', 'B)  posting a job advertisement on a variety of websites', 'C)  administering a competency test for work-related tasks', 'D)  employee word-of-mouth recruitment', '', 1),
(11, 'Which of these recruitment practices is most likely to attract potential employees to a job?', 'D)  providing clear and consistent communication', 'A)  interview schedule changes', 'B)  posting unclear information about job duties', 'C)  posting job descriptions and salaries as “flexible”', 'D)  providing clear and consistent communication', '', 1),
(12, 'Which of these tasks is NOT performed during the application step in the selection process?', 'D)  Calling candidates’ references for verification of qualifications', 'A)  Conduct an initial assessment based on resume, cover letter, and application', 'B)  Incorporate pre-screening questions that confirm a candidate meets minimum qualifications', 'C)  Eliminate candidates who have unrealistic salary or schedule expectations for the job', 'D)  Calling candidates’ references for verification of qualifications', '', 12),
(13, 'Which would be the BEST first step when developing a job advertisement?', 'D)  Write with a specific person in mind', 'A)  Write to keep requirements broad', 'B)  Create a list of all possible KSAs', 'C)  Review annual earnings', 'D)  Write with a specific person in mind', '', 13),
(14, 'During a company-wide expense audit, departments are being asked to justify their spending allocations. Which of the following is the best way for Human Resources to explain the benefits of the onboarding process?', 'D)  Proper onboarding reduces turnover, which reduces hiring costs.', 'A)  Onboarding saves the company money since compensation is not required during the onboarding process.', 'B)  Effective onboarding guarantees employee job satisfaction and therefore eliminates turnover.', 'C)  Onboarding eliminates stress which increases morale.', 'D)  Proper onboarding reduces turnover, which reduces hiring costs.', '', 14),
(15, 'High performing organizations are more likely to implement which of the following onboarding methods?', 'D)  a mentorship program', 'A)  an individualized program', 'B)  a delayed onboarding program', 'C)  an unstructured program', 'D)  a mentorship program', '', 15),
(16, 'Miles has noticed that his newly hired employee, Rebecca, is really struggling to properly use their cloud-based computing system. Although she was hired from another company in the same field, her previous employer used a different computing system. Miles identifies there is a training gap and works to retrain Rebecca on the cloud-based computing system. This gap reflects a lack of which of the following?', 'D)  hard skills', 'A)  soft skills', 'B)  understanding of job expectations', 'C)  industry knowledge', 'D)  hard skills', '', 16),
(17, 'Training needs assessments can be utilized to identify training gaps. Which of the following is NOT one of the six steps in the training needs assessment process that can help to identify training gaps?', 'D)  review interview question responses', 'A)  establish clear expectations', 'B)  support career development', 'C)  establish a coaching and mentoring program', 'D)  review interview question responses', '', 17),
(18, 'Which of the following statements best describes the role of training and development of a newly hired employee?', 'D)  Training is the primary focus of a new employee as it focuses on the hard skills required to perform their job functions.', 'A)  Development is the primary focus of a new employee as it focuses on the hard skills required to perform their job functions.', 'B)  Training is the primary focus of a new employee as it focuses on the soft skills required to perform their job functions.', 'C)  Development is the primary focus of a new employee as it focuses on the soft skills required to perform their job functions.', 'D)  Training is the primary focus of a new employee as it focuses on the hard skills required to perform their job functions.', '', 18),
(19, 'Which of the following steps in The ADDIE Model defines the learning environment and establish instructional goals and objectives?', 'D)  analysis', 'A)  evaluation', 'B)  development', 'C)  design', 'D)  analysis', '', 19),
(20, 'Which of the following steps in The ADDIE Model should be utilized during every portion of the model?', 'D)  evaluation', 'A)  design', 'B)  analysis', 'C)  implementation', 'D)  evaluation', '', 20),
(21, 'Base salary or hourly wage, cash bonuses, and annual incentives are all types of:', 'D)  direct compensation', 'A)  indirect compensation', 'B)  intangible compensation', 'C)  general compensation', 'D)  direct compensation', '', 21),
(22, 'The Fair Labor Standards Act (FLSA) was designed to eliminate labor conditions detrimental to the maintenance of the minimum standards of living necessary for health, efficiency, and well being of workers. Which of the following was established as a result?', 'D)  minimum wage laws', 'A)  minimum time off requirements', 'B)  health benefit regulations', 'C)  minimum time between shifts regulations', 'D)  minimum wage laws', '', 22),
(23, 'What does research show about the connection between compensation and motivation?', 'D)  Money and career growth are the biggest motivators driving employees to seek other jobs. ', 'A)  Compensation is the biggest motivator for employees to seek employment elsewhere.', 'B)  Employee motivation determines their compensation.', 'C)  Motivated employees are more likely to be compensated for their efforts.', 'D)  Money and career growth are the biggest motivators driving employees to seek other jobs. ', '', 23),
(24, 'What is NOT an example of the additional benefits employers offer to their employees that are not mandated by law?', 'D)  unemployment insurance', 'A)  paid parental leave', 'B)  gender reassignment benefits', 'C)  pet health care', 'D)  unemployment insurance', '', 24),
(25, 'What is the most discussed and divisive pay equity issue?', 'D)  the gender pay gap', 'A)  the Equal Pay Act', 'B)  the minority pay gap', 'C)  Equal Pay Day', 'D)  the gender pay gap', '', 25),
(26, 'What is the strongest motivator, next to compensation?', 'D)  It depends on the individual.', 'A)  recognition', 'B)  autonomy', 'C)  passion', 'D)  It depends on the individual.', '', 26),
(27, 'Which method of developing a pay structure includes using market data to set a salary range?', 'D)  benchmarking', 'A)  job analysis', 'B)  job evaluation', 'C)  pay grades', 'D)  benchmarking', '', 27),
(28, 'Which of the following is a violation of the Equal Pay Act?', 'D)  A company pays a male employee more than a female employee because the company believes the female employee will take more days off.', 'A)  A company pays a male employee more because he is able to do a job in 5 hours that takes his female counterpart 6 hours', 'B)  A company pays a female employee more than a male employee because she works the night shift and the male employee works the day shift.', 'C)  A company pays a female employee less than a male employee at a different branch of the office for doing the same work.', 'D)  A company pays a male employee more than a female employee because the company believes the female employee will take more days off.', '', 28),
(29, 'Which of the following is NOT a characteristic of intrinsic motivation?', 'D)  money', 'A)  mastery', 'B)  relatedness', 'C)  purpose', 'D)  money', '', 29),
(30, 'Which of the following statements is false, relating to intrinsic and extrinsic motivation?', 'D)  Extrinsic rewards are personal.', 'A)  Intrinsic motivation occurs when you act without any obvious external rewards.', 'B)  When a person is motivated extrinsically, their activity or behavior is a means to an end, rather than an end in itself.', 'C)  Intrinsic motivation could come from one’s desire to improve the world they live in.', 'D)  Extrinsic rewards are personal.', '', 30),
(31, 'You have already done extensive research related to the development of your company’s new pay structure. What is your final step in determining the new structure?', 'D)  establish pay grades', 'A)  complete market pricing', 'B)  conduct a job evaluation', 'C)  conduct a job analysis', 'D)  establish pay grades', '', 31),
(32, 'You have been tasked with developing a new pay structure for your office. What is the first step you would suggest?', 'D)  conduct a job analysis', 'A)  conduct a job evaluation', 'B)  consider market pricing', 'C)  determine pay grades', 'D)  conduct a job analysis', '', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD UNIQUE KEY `000000001` (`CourseID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExamID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ProfessorID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ExamID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `ProfessorID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
