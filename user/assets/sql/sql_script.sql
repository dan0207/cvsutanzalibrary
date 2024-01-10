CREATE TABLE `users` (
  `user_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_fullname` VARCHAR(100) NOT NULL,
  `user_username` VARCHAR(50) NOT NULL,
  `user_password` VARCHAR(255) NOT NULL,
  `user_givenName` VARCHAR(100) NOT NULL,
  `user_middleI` VARCHAR(100) NOT NULL,
  `user_familyName` VARCHAR(100) NOT NULL,
  `user_email` VARCHAR(100) NOT NULL,
  `user_student_number` VARCHAR(9) NOT NULL,
  `user_student_course` VARCHAR(50) NOT NULL,
  `user_student_section` VARCHAR(50) NOT NULL,
  `user_student_year` VARCHAR(50) NOT NULL,
  `user_faculty_number` VARCHAR(50) NOT NULL,
  `user_faculty_department` VARCHAR(50) NOT NULL,
  `user_picture` VARCHAR(255) NOT NULL,
  `user_created` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `user_modified` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
  `user_status` VARCHAR(50) NOT NULL,
  `user_member_type` VARCHAR(50) NOT NULL,
  `user_token` VARCHAR(21) NOT NULL
);

CREATE TABLE `events` (
  `event_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_timeFrom` time NOT NULL,  
  `event_timeTo` time NOT NULL,     
  `event_date` date NOT NULL     
);


CREATE TABLE `books` (
  `book_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `book_title` VARCHAR(255) NOT NULL,
  `book_author` VARCHAR(255) NOT NULL,
  `book_access_number` VARCHAR(255) NOT NULL,
  `book_call_number` VARCHAR(255) NOT NULL,
  `book_material_type` VARCHAR(255) NOT NULL,
  `book_language` VARCHAR(255) NOT NULL,
  `book_publication_details` VARCHAR(255) NOT NULL,
  `book_description` TEXT NOT NULL,
  `book_content_type` VARCHAR(255) NOT NULL,
  `book_media_type` VARCHAR(255) NOT NULL,
  `book_carrier_type` VARCHAR(255) NOT NULL,
  `book_isbn` VARCHAR(255) NOT NULL,
  `book_subject` VARCHAR(255) NOT NULL,
  `book_classification` VARCHAR(255) NOT NULL,
  `book_availability` VARCHAR(255) NOT NULL,
  `book_btn` VARCHAR(255) NOT NULL
);


CREATE TABLE `createpost` (
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(255) NOT NULL,
  `image_url` VARCHAR(100) NOT NULL,
  `video_url` VARCHAR(100) NOT NULL,
  `embed_code` VARCHAR(100) NOT NULL,
  `timestamp` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `librarypages` (
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pages` VARCHAR(255) NOT NULL,
  `mainText` VARCHAR(255) NOT NULL,
  `subText` VARCHAR(255) NOT NULL,
  `links` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `ratings` (
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(50) NOT NULL,
  `subject` VARCHAR(50) NOT NULL,
  `rating` VARCHAR(5) NOT NULL,
  `comments` VARCHAR(255) NOT NULL,
  `date` DATE DEFAULT CURRENT_DATE NOT NULL,
  `time` TIME DEFAULT CURRENT_TIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `bookborrowed` (
  `id` INT(11) PRIMARY KEY NOT NULL,
  `libraryid` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courseSection` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bookAccessNo` varchar(255) DEFAULT NULL,
  `bookTitle` varchar(255) DEFAULT NULL,
  `bookAuthor` varchar(255) DEFAULT NULL,
  `pickupDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `bookreserve` (
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `libraryid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courseSection` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bookAccessNo` varchar(255) DEFAULT NULL,
  `bookTitle` varchar(255) DEFAULT NULL,
  `bookAuthor` varchar(255) DEFAULT NULL,
  `pickupDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `booktransaction` (
  `id` INT(11) PRIMARY KEY NOT NULL,
  `libraryid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courseSection` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bookAccessNo` varchar(255) DEFAULT NULL,
  `bookTitle` varchar(255) DEFAULT NULL,
  `bookAuthor` varchar(255) DEFAULT NULL,
  `pickupDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;















INSERT INTO `books` (`book_id`, `book_title`, `book_author`, `book_access_number`, `book_call_number`, `book_material_type`, `book_language`, `book_publication_details`, `book_description`, `book_content_type`, `book_media_type`, `book_carrier_type`, `book_isbn`, `book_subject`, `book_classification`, `book_availability`, `book_btn`) VALUES
(17, 'Organic Chemistry', 'Carney, Dorothy', 'TCL000379', 'QD251.2  C21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 'Request Button'),
(18, 'Microeconomics', 'Parkin, Michael', 'TCL000114', 'CIR HB172.5 P21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(19, 'Fundamentals of management science', 'Turban, Efraim', 'TCL000116', 'CIR HD30.25 T87', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 'Request Button'),
(20, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000118', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 'Request Button'),
(21, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000122', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(22, 'Manegerial Accounting', 'Garrison, Ray H.', 'TCL000191', 'CIR HF5657.4 G19', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(23, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000182', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(24, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000181', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(25, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000162', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(26, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000163', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(27, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000241', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(28, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000241', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 'Request Button'),
(29, 'Organic Chemistry', 'Carney, Dorothy', 'TCL000379', 'QD251.2  C21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 'Request Button'),
(30, 'Microeconomics', 'Parkin, Michael', 'TCL000114', 'CIR HB172.5 P21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(31, 'Fundamentals of management science', 'Turban, Efraim', 'TCL000116', 'CIR HD30.25 T87', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(32, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000118', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(33, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000122', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(34, 'Manegerial Accounting', 'Garrison, Ray H.', 'TCL000191', 'CIR HF5657.4 G19', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(35, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000182', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(36, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000181', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(37, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000162', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(38, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000163', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(39, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000241', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(40, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000241', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 'Request Button'),
(41, 'Organic Chemistry', 'Carney, Dorothy', 'TCL000379', 'QD251.2  C21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(42, 'Microeconomics', 'Parkin, Michael', 'TCL000114', 'CIR HB172.5 P21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 'Request Button'),
(43, 'Fundamentals of management science', 'Turban, Efraim', 'TCL000116', 'CIR HD30.25 T87', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(44, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000118', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(45, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000122', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(46, 'Manegerial Accounting', 'Garrison, Ray H.', 'TCL000191', 'CIR HF5657.4 G19', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(47, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000182', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(48, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000181', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(49, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000162', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(50, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000163', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(51, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000241', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button'),
(52, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000241', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 'Request Button');
