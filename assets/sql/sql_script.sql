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
  `user_course` VARCHAR(50) NOT NULL,
  `user_section` VARCHAR(50) NOT NULL,
  `user_year` VARCHAR(50) NOT NULL,
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


    

    
UPDATE
  users
SET
  user_givenName = '$user_givenName',
  user_familyName = '$user_familyName',
  user_email = '$user_email',
  user_picture = '$user_picture',
  user_modified = NOW()
WHERE
  user_token = '$user_token'
INSERT INTO
  users (
    user_username,
    user_password,
    user_givenName,
    user_familyName,
    user_fullname,
    user_email,
    user_student_number,
    user_course,
    user_section,
    user_year,
    user_picture,
    user_created,
    user_modified,
    user_token
  )
VALUES
  (
    'zxc',
    'zxc',
    'Genggeng.',
    'Petmalu',
    'Petmalu Genggeng',
    'gengneg@cvsu.edu.ph',
    '200000000',
    'BSEE',
    'THREE',
    'FIVE',
    'https://lh3.googleusercontent.com/a/ACg8ocIZ36xgQP6ayGoASBAPezDsST8HkJVbePRWUqdtObcKCg=s96-c',
    NOW(),
    NOW(),
    '123456789123456789123'
  ) $


-- FOR PHP UPDATE SQL
update
  = "UPDATE users 
                SET user_givenName = '$user_givenName', 
                    user_familyName = '$user_familyName', 
                    user_fullname = '$user_fullname', 
                    user_email = '$user_email', 
                    user_picture = '$user_picture', 
                    user_modified = NOW()
                WHERE user_token = '$user_token'";

mysqli_query(
  $ db,
  $
  update
);
-- FOR PHP UPDATE SQL