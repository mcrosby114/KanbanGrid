-- file: mcrosby.sql
--
-- to log into mysql, from a terminal, type:
-- mysql -u USERNAME -p

-- to execute this .sql file, type the following:
-- mysql -D <mcrosby> -u USERNAME -p < <mcrosby.sql>


DROP DATABASE IF EXISTS mcrosby;
CREATE DATABASE mcrosby;
USE mcrosby;

DROP TABLE IF EXISTS User;
CREATE TABLE User (
  id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  username VARCHAR(128) NOT NULL,
  email VARCHAR(128) NOT NULL UNIQUE,
  pass_hash VARCHAR(255) NOT NULL UNIQUE,
  row_count INTEGER UNSIGNED DEFAULT 1
);

DROP TABLE IF EXISTS Project;
CREATE TABLE Project (
  id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  row INTEGER UNSIGNED NOT NULL DEFAULT 0,
  entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
  due_date DATETIME,
  color ENUM('Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Indigo', 'Violet'),
  descrip TEXT,
  user_id INTEGER UNSIGNED NOT NULL REFERENCES User(id)
);

DROP TABLE IF EXISTS Task;
CREATE TABLE Task (
  id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  col ENUM('0', '1', '2', '3', '4', '5', '6') NOT NULL,
  entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
  due_date DATETIME,
  color ENUM('Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Indigo', 'Violet'),
  title VARCHAR(255) NOT NULL,
  descrip TEXT,
  user_id INTEGER UNSIGNED NOT NULL REFERENCES User(id),
  proj_id INTEGER UNSIGNED NOT NULL REFERENCES Project(id)
);
