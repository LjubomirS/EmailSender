CREATE DATABASE IF NOT EXISTS email_handler;

USE email_handler;

CREATE TABLE IF NOT EXISTS users (
    user_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    is_admin TINYINT(1) NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS emails (
    email_id VARCHAR(100) NOT NULL,
    user_id INT NOT NULL,
    title VARCHAR(300) NOT NULL,
    text VARCHAR(3000) NOT NULL,
    PRIMARY KEY (email_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

INSERT INTO users (name, email, password, is_admin)
VALUES ('Admin', 'admin@gmail.com', 123456, 1);

