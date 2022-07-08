CREATE DATABASE test;

  use test;

CREATE TABLE users (
                       id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       nom VARCHAR(30) NOT NULL,
                       prenom VARCHAR(30) NOT NULL,
                       email VARCHAR(50) NOT NULL,
                       age INT(3),
                       localite VARCHAR(50),
                       date TIMESTAMP
);