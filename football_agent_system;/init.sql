CREATE DATABASE IF NOT EXISTS football_agent_system;
USE football_agent_system;

-- Roles table
CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE
);

-- Users table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

-- Insert roles
INSERT INTO roles (role_name) VALUES
('Admin'),
('Agent'),
('Player'),
('Club Manager');

-- Insert sample users (password = 123456)
INSERT INTO users (full_name, email, password, role_id) VALUES
('Ahmed Kamara', 'admin@football.com', MD5('123456'), 1),
('Samuel Conteh', 'agent@football.com', MD5('123456'), 2),
('Ibrahim Sesay', 'player@football.com', MD5('123456'), 3),
('Mohamed Koroma', 'manager@football.com', MD5('123456'), 4);
