# Exam_WT_NIYOMUKIZA_Etienne_222003307

System Credentials: 
Admin Username: jdoe, Email: jdoe@example.com, Password: password123

Survey & Feedback System Documentation
 
Overview
 
The Survey & Feedback System is a comprehensive web application designed to facilitate the creation, management, and analysis of surveys. It is aimed at organizations and researchers who need to gather feedback efficiently and gain valuable insights from the collected data.
 
1. Introduction
 
The Survey & Feedback System allows users to:
♦	Register and manage user accounts.
♦	Create and distribute surveys.
♦	Collect and analyze survey responses.
♦	Generate reports based on feedback data.
 
2. System Requirements

♦	Web Server: Apache or Nginx
♦	Database: MySQL or MariaDB
♦	PHP: Version 7.4 or higher
♦	Browser: Modern browsers like Chrome, Firefox, Edge
 
3. Installation
 
1. Clone the repository to your web server directory.
2. Configure the database connection settings in `databaseconnection.php`.
3. Import the provided SQL file to set up the database schema.
4. Access the application via your web browser.
 
4. Database Schema
 Database has ten table which are classified in the four major Tables

♦	 User 
♦	 Surveys
	Survey
	Questions
	Participants
	Responses
♦	 Feedback
	FeedbackCategory
	FeedbackTags
	FeedbackComment
	FeedbackRating
♦	 Report
 
5. Features
 
User Management
 
♦	Registration and login system with role-based access.
♦	Profile management.

 Survey Management
 
♦	Create new surveys with multiple question types.
♦	Distribute surveys via unique links.
♦	View and manage active/inactive surveys.
 
Response Management
 
♦	Collect survey responses.
♦	View individual and aggregated responses.
♦	Analyze feedback using various metrics.
 
Reporting
  
♦	Generate detailed reports based on survey data.
♦	Export reports in multiple formats (PDF, CSV).
 
6. User Interface
 
Header
 
♦	Includes logo, system title, and profile/account management.
 
Sidebar
 
♦	Navigation links to Home, Users, Survey, Feedback, and Reports pages.
 
Main Content
 
♦	Dynamic content area for displaying forms, tables, and reports.
♦	Contains buttons for quick actions like creating surveys, viewing feedback, and generating 
 
Footer
 
♦	Static footer with copyright information.
 
7. Error Handling
 
♦	Custom error messages for database operations.
♦	User-friendly alerts and redirects on errors.
 
8. Security Considerations
 
♦	Input validation to prevent SQL injection.
♦	Password hashing for secure storage.
♦	Session management for user authentication.

  Conclusion
The Survey & Feedback System is a robust platform for managing surveys and gathering valuable feedback. It is designed to be user-friendly and efficient, catering to various organizational needs. With its comprehensive features and secure architecture, it is an essential tool for any feedback-driven initiative.
