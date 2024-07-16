CREATE DATABASE candidates_db;
USE candidates_db;

CREATE TABLE candidates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    job_type VARCHAR(50) NOT NULL,
    cv_path VARCHAR(255) NOT NULL
);
