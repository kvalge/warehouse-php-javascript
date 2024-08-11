DROP TABLE IF EXISTS user_account;
DROP TABLE IF EXISTS user_contact;
DROP TABLE IF EXISTS supplier;
DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS supplier_order;
DROP TABLE IF EXISTS customer_order;
DROP TABLE IF EXISTS shipment;

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

CREATE TABLE supplier
(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    contacts_id INTEGER
);

CREATE TABLE customer
(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    contacts_id INTEGER
);

CREATE TABLE contacts
(
    id             INTEGER PRIMARY KEY AUTO_INCREMENT,
    name           VARCHAR(255),
    contact_person VARCHAR(255),
    address        VARCHAR(255),
    phone          VARCHAR(50),
    email          VARCHAR(255)
);

CREATE TABLE product
(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    supplier_id INTEGER,
    name        VARCHAR(255),
    description VARCHAR(255),
    price       INTEGER
);

CREATE TABLE supplier_order
(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    supplier_id INTEGER,
    product_id  INTEGER,
    quantity    INTEGER
);

CREATE TABLE customer_order
(
    id          INTEGER PRIMARY KEY AUTO_INCREMENT,
    customer_id INTEGER,
    product_id  INTEGER,
    quantity    INTEGER
);

CREATE TABLE shipment
(
    id            INTEGER PRIMARY KEY AUTO_INCREMENT,
    order_id      INTEGER,
    order_date    DATE,
    delivery_date DATE,
    status        VARCHAR(50)
);

CREATE TABLE warehouse
(
    id        INTEGER PRIMARY KEY AUTO_INCREMENT,
    capacity  INTEGER,
    occupancy INTEGER
);

CREATE TABLE inventory
(
    id         INTEGER PRIMARY KEY AUTO_INCREMENT,
    product_id INTEGER,
    quantity   INTEGER,
    occupancy  INTEGER
);


