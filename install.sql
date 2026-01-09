CREATE TABLE `activity_log` (
`activity_log_id` int(10) NOT NULL AUTO_INCREMENT,
`activity_log_ip_address` varchar(125) NOT NULL,
`activity_log_browser` varchar(125) NOT NULL,
`activity_log_requested_url` varchar(500) NOT NULL,
`activity_log_timestamp` datetime NOT NULL,
`user_id` int(10) DEFAULT NULL,
PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `blocklist` (
`blocklist_id` int(10) NOT NULL AUTO_INCREMENT,
`blocklist_value` varchar(100) NOT NULL,
PRIMARY KEY (`blocklist_id`),
UNIQUE KEY `blocklist_value` (`blocklist_value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `blog` (
`blog_post_id` int(10) NOT NULL AUTO_INCREMENT,
`blog_post_title` varchar(250) NOT NULL,
`blog_post_date` datetime NOT NULL,
`blog_post_content` text NOT NULL,
`blog_post_user_id` int(10) NOT NULL,
PRIMARY KEY (`blog_post_id`),
KEY `blog_post_user_id` (`blog_post_user_id`),
CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`blog_post_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `custom_content` (
`custom_content_id` int(10) NOT NULL AUTO_INCREMENT,
`custom_content_url` varchar(250) NOT NULL,
`custom_content_title` varchar(75) NOT NULL,
`custom_content` text NOT NULL,
 PRIMARY KEY (`custom_content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `error_log` (
`error_log_id` int(10) NOT NULL AUTO_INCREMENT,
`errno` int(10) NOT NULL,
`errstr` varchar(250) NOT NULL,
`errfile` varchar(250) NOT NULL,
`errline` int(10) NOT NULL,
`err_registered_at` datetime NOT NULL,
PRIMARY KEY (`error_log_id`),
UNIQUE KEY `errno` (`errno`,`errstr`,`errfile`,`errline`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `login_attempts` (
`login_attempts_id` int(10) NOT NULL AUTO_INCREMENT,
`username` varchar(30) NOT NULL,
`ip_address` varchar(125) NOT NULL,
`attempts` int(10) NOT NULL DEFAULT 0,
`last_attempt` datetime NOT NULL,
PRIMARY KEY (`login_attempts_id`),
UNIQUE KEY `unique_user_ip` (`username`,`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `primary_nav` (
`primary_nav_id` int(10) NOT NULL AUTO_INCREMENT,
`primary_nav_url` varchar(250) NOT NULL,
`primary_nav_name` varchar(250) NOT NULL,
`primary_nav_order` int(10) NOT NULL,
PRIMARY KEY (`primary_nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `secondary_nav` (
`secondary_nav_id` int(10) NOT NULL AUTO_INCREMENT,
`secondary_nav_url` varchar(250) NOT NULL,
`secondary_nav_name` varchar(250) NOT NULL,
`secondary_nav_order` int(10) NOT NULL,
PRIMARY KEY (`secondary_nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `settings` (
`setting_id` int(10) NOT NULL AUTO_INCREMENT,
`setting_key` varchar(255) NOT NULL,
`setting_value` varchar(255) NOT NULL,
PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

INSERT INTO `settings` (`setting_key`, `setting_value`) VALUES
('page_title', 'PHPUC'),
('security_question', 'What is something nobody wants to be, but everyone will be?'),
('security_question_answer', 'old');
('system_message_title', 'PHPUC system message');
('disable_registration', 'no');

CREATE TABLE `users` (
`user_id` int(10) NOT NULL AUTO_INCREMENT,
`public_id` varchar(32) NOT NULL,
`username` varchar(30) NOT NULL,
`user_password` char(255) NOT NULL,
`user_email` varchar(50) NOT NULL,
`user_level` varchar(50) NOT NULL DEFAULT 'not_activated',
`user_date` datetime NOT NULL,
`last_activity` datetime NOT NULL,
PRIMARY KEY (`user_id`),
UNIQUE KEY `user_email_unique` (`user_email`),
UNIQUE KEY `username_unique` (`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
