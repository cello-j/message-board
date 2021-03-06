--
-- Create database
--

CREATE DATABASE IF NOT EXISTS board;
GRANT SELECT, INSERT, UPDATE, DELETE ON board.*TO board_root@localhost IDENTIFIED BY 'board_root';
FLUSH PRIVILEGES;

--
-- Create tables
--

USE board;

CREATE TABLE IF NOT EXISTS thread (
id     	     INT UNSIGNED NOT NULL AUTO_INCREMENT,
title	     VARCHAR(255) NOT NULL,
owner        VARCHAR(32),
created	     TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comment (
id     	     INT UNSIGNED NOT NULL AUTO_INCREMENT,
thread_id    INT UNSIGNED NOT NULL,
username     VARCHAR(255) NOT NULL,
body	     TEXT NOT NULL,
created	     TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id),
INDEX (thread_id, created)
CONSTRAINT `fk_comment` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user (
id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
username     VARCHAR(32) NOT NULL,
password     VARCHAR(255) NOT NULL,
user_role    VARCHAR(16) NOT NULL DEFAULT "member",
created    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id),
INDEX (username, created)
)ENGINE=InnoDB; 