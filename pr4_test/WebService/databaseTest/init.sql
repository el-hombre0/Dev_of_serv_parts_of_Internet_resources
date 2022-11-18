CREATE DATABASE IF NOT EXISTS portfolioDB;

CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON portfolioDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE portfolioDB;
CREATE TABLE IF NOT EXISTS projects (
    id_project int NOT NULL AUTO_INCREMENT,
    title_project varchar(50) NOT NULL,
    author_name varchar(100) NOT NULL,
    main_lang varchar(20) NOT NULL,
    descrip varchar(200),
    PRIMARY KEY (id_project)
);
INSERT INTO projects(title_project, author_name, main_lang, descrip) VALUES(
    "Social_network_coursework",
    "Efimtsev S.M.",
    "PHP",
    "Social network for meeting people all over the world."
),
(
    "Ecomarket coursework",
    "Efimtsev S.M.",
    "Java",
    "The market of useful environmental friendly products for all ages."
),
(
    "Dancing website",
    "Efimtsev S.M",
    "Java",
    "The dancing school's website"
);
CREATE TABLE IF NOT EXISTS auth_users (
    id_user int NOT NULL AUTO_INCREMENT,
    login_user varchar(30) NOT NULL,
    password_user varchar(100) NOT NULL,
    password_user_encr varchar(100) NOT NULL,
    name_user varchar(100) NOT NULL,
    PRIMARY KEY (id_user)
);
INSERT INTO auth_users (login_user, password_user, password_user_encr, name_user) VALUES(
    'admin',
    '$2y$10$zg8.a61TAaVe.IbijfV/9OcCK2mqWruVU9ZPDCt3LaV0kyfjIgj4K',
    'admin',
    'Efimtsev S.M.'
),
(
    'sammy',
    '$apr1$UnjIn8QM$6ArKXQ1Yr1X.jvL/mSSxP/',
    'sammypas',
    'Jonnes S.'
);