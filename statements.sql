Create database moneyz;
use moneyz;

Create table tblUser(
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME
);

create table tblMoneyz(
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_ID INT,
    moneyz INT,
    FOREIGN KEY(user_ID) REFERENCES tblUser(ID)
);