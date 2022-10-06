CREATE DATABASE IF NOT EXISTS portfolioDB;
USE portfolioDB;
CREATE TABLE IF NOT EXISTS projects (
    id_project int PRIMARY KEY AUTO_INCREMENT,
    title_project varchar(50) NOT NULL,
    author_name varchar(100) NOT NULL,
    main_lang varchar(20) NOT NULL,
    descrip varchar(200)
);
INSERT INTO projects(title_project, author_name, main_lang, descrip) VALUES
(
    "Social_network_coursework",
    "Ефимцев С.М.",
    "PHP",
    "Социальная сеть для знакомства людей со всего света."
),
(
    "Ecomarket coursework",
    "Ефимцев С.М.",
    "Java",
    "Магазин полезных экологически чистых продуктов для всех возрастов."
);