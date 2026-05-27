CREATE DATABASE IF NOT EXISTS netdisk DEFAULT CHARSET utf8mb4;

USE netdisk;

CREATE TABLE IF NOT EXISTS netdisk_folder (
    folder_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    folder_name VARCHAR(255) NOT NULL,
    folder_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    folder_path VARCHAR(255) NOT NULL DEFAULT '0',
    folder_pid INT UNSIGNED NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS netdisk_file (
    file_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_save VARCHAR(255) NOT NULL,
    file_size INT UNSIGNED NOT NULL DEFAULT 0,
    file_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    folder_id INT UNSIGNED NOT NULL DEFAULT 0
);

INSERT INTO netdisk_folder(folder_name, folder_path, folder_pid)
VALUES
('test01', '0', 0),
('test02', '0', 0),
('test03', '1', 1);
