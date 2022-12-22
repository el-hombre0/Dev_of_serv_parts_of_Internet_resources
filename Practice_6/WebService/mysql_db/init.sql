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
);
CREATE TABLE IF NOT EXISTS pros(
    id_pro int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    birth_date date NOT NULL,
    residence_place varchar(200),
    contacts varchar(200),
    skills varchar(300),
    work_expirience varchar(500),
    education varchar(500),
    PRIMARY KEY (id_pro)
);

INSERT INTO pros(`name`, birth_date, residence_place, contacts, skills, work_expirience, education) VALUES(
    'Dunichev Maxim Viktorovich',
    '1998-09-09',
    'Moscow, Barklaya st., b. 12, ap. 3',
    '79993422253, maxdunich@mail.ru',
    'PHP, NodeJS, Docker, Git, HTML, CSS',
    'Laboratory assistant at RTU MIREA university',
    'B.D. 09.03.04 Software engineering at RTU MIREA university'
),
(
    'Suharev Vladislav Vladimirovich',
    '2000-01-23',
    'Moscow, Myasnitskaya st., b. 10, ap. 11',
    '79937563277 sukharev228@yandex.ru',
    'Java, JavaScript, Python, HTML, CSS, Git, Docker, Linux',
    'no',
    '01.03.04 Applied mathematics at RTU MIREA university'
);

CREATE TABLE IF NOT EXISTS auth_users (
    id_user int NOT NULL AUTO_INCREMENT,
    login_user varchar(30) NOT NULL,
    password_user varchar(100) NOT NULL,
    password_user_enc varchar(100),
    name_user varchar(100),
    avatar varchar(500),
    `resume` varchar(500),
    PRIMARY KEY (id_user)
);
INSERT INTO auth_users (login_user, password_user, password_user_enc, name_user, avatar, `resume`) VALUES(
    'admin',
    '21232f297a57a5a743894a0e4a801fc3',
    'admin',
    'Efimtsev S.M.',
    null,
    null
),
(
    'sammy',
    '$apr1$UnjIn8QM$6ArKXQ1Yr1X.jvL/mSSxP/',
    'sammypas',
    'Jonnes S.',
    null,
    null
),
(
    'stas@yandex.ru',
    'c211c9e7e7689217c0cb99aafe30f3d7',
    'stas',
    'Stanislav Efimtsev',
    'uploads/avatars/1669497454IMG_20160708_151756.jpg',
    null
);