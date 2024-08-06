DROP TABLE IF EXISTS employee;
DROP TABLE IF EXISTS task;

CREATE TABLE user_account
(
    id       INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100),
    password VARCHAR(100)
);

CREATE TABLE user_contact
(
    id              INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_account_id INTEGER,
    first_name      VARCHAR(255),
    last_name       VARCHAR(255),
    email           VARCHAR(255),
    photo           VARCHAR(500)
);