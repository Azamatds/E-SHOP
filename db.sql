CREATE TABLE users(
    id int AUTO_INCREMENT,
    login varchar(200) not null ,
    password varchar(255) not null ,
    fullname varchar(512),
    role_id int,
    PRIMARY KEY (id)
);
ALTER TABLE users add role_id int;

DROP TABLE users;
CREATE TABLE roles(
    id int not null AUTO_INCREMENT PRIMARY KEY ,
    rolename varchar(255),
    code varchar(255)
);
select * from users;
select *
from categories;