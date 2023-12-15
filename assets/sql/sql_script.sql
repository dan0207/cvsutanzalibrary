CREATE TABLE `users` (
  `user_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(100) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_givenName` varchar(100) NOT NULL,
  `user_middleI` varchar(100) NOT NULL,
  `user_familyName` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_student_number` varchar(9) NOT NULL,
  `user_course` varchar(50) NOT NULL,
  `user_section` varchar(50) NOT NULL,
  `user_year` varchar(50) NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL,
  `user_modified` datetime NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_member_type` varchar(50) NOT NULL,
  `user_token` varchar(21) NOT NULL
)
    

    
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