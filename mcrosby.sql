-- file: mcrosby.sql
--
-- to log into mysql, from a terminal, type:
-- mysql -u USERNAME -p

-- to execute this .sql file, type the following:
-- mysql -D <kanbangrid> -u USERNAME -p < <mcrosby.sql>


DROP DATABASE IF EXISTS Kanbangrid;
CREATE DATABASE Kanbangrid;
USE Kanbangrid;

CREATE TABLE User (
  u_id integer auto_increment not null primary key,
  username varchar(40) not null,
  fname varchar(20) not null,
  lname varchar(20),
  email varchar(30) not null,
  password varchar(25) not null,
  foreign key(g_id) references Grid(g_id)
);

CREATE TABLE Grid (
  gridSize integer not null,
  numRows integer not null,
  primary key(user_id),
  foreign key(user_id) references User(u_id),
  foreign key(p_id) references Project(p_id)
);

CREATE TABLE Project (
  p_id integer auto_increment not null primary key,
  status enum('Active','Inactive') not null,
  row integer,
  createDate datetime not null,
  dueDate datetime,
  color enum('Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Indigo', 'Violet'),
  foreign key(g_id) references Grid(g_id),
  foreign key(t_id) references Task(t_id),
  foreign key(d_id) references Description(d_id)
);

CREATE TABLE Task (
  t_id integer auto_increment not null primary key,
  status enum('Active', 'Inactive') not null,
  column_day integer(8) not null,
  createDate datetime not null,
  dueDate datetime,
  color enum('Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Indigo', 'Violet'),
  foreign key(p_id) references Project(p_id),
  foreign key(d_id) references Description(d_id)
);

CREATE TABLE Description (
  d_id integer auto_increment not null primary key,
  textField text,
  dateCreated datetime not null,
  foreign key(p_id) references Project(p_id),
  foreign key(t_id) references Task(t_id)
);
