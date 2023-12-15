USE game_collection;
DROP TABLE IF EXISTS DISPONIBILITY;
DROP TABLE IF EXISTS LIBRARY;
DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS GAME;
DROP TABLE IF EXISTS PLATFORM;

CREATE TABLE USER (
    id_user INT NOT NULL AUTO_INCREMENT,
    name_user VARCHAR(255) NOT NULL,
    surname_user VARCHAR(255) NOT NULL,
    email_user VARCHAR(255) NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_user)
);

CREATE TABLE GAME (
    name_game VARCHAR(255) NOT NULL,
    description_game VARCHAR(255) NOT NULL,
    release_date_game DATE NOT NULL,
    editor_game VARCHAR(255) NOT NULL,
    url_image_game VARCHAR(255) NOT NULL,
    url_site_game VARCHAR(255) NOT NULL,
    PRIMARY KEY (name_game)
);

CREATE TABLE PLATFORM (
    name_platform VARCHAR(255) NOT NULL,
    PRIMARY KEY (name_platform)
);

CREATE TABLE LIBRARY (
    id_user INT NOT NULL,
    name_game VARCHAR(255) NOT NULL,
    hours_played_game INT NOT NULL,
    PRIMARY KEY (id_user, name_game),
    FOREIGN KEY (id_user) REFERENCES USER(id_user),
    FOREIGN KEY (name_game) REFERENCES GAME(name_game)
);

CREATE TABLE DISPONIBILITY (
    name_game VARCHAR(255) NOT NULL,
    name_platform VARCHAR(255) NOT NULL,
    PRIMARY KEY (name_game, name_platform),
    FOREIGN KEY (name_game) REFERENCES GAME(name_game),
    FOREIGN KEY (name_platform) REFERENCES PLATFORM(name_platform)
);

INSERT INTO USER (name_user, surname_user, email_user, password_user) VALUES
    ('Jean', 'Max', 'max@gmail.com', 'maxpass');

INSERT INTO GAME (name_game, description_game, release_date_game, editor_game, url_image_game, url_site_game) VALUES
    ('The Witcher 3', 'The Witcher 3: Wild Hunt is a 2015 action role-playing game developed and published by Polish developer CD Projekt Red and is based on The Witcher series of fantasy novels by Andrzej Sapkowski. It is the sequel to the 2011 game The Witcher 2: Assassins of Kings and the third main installment in the The Witcher''s video game series, played in an open world with a third-person perspective.', '2015-05-19', 'CD Projekt', 'https://upload.wikimedia.org/wikipedia/en/0/0c/Witcher_3_cover_art.jpg', 'https://thewitcher.com/en/witcher3');

INSERT INTO PLATFORM (name_platform) VALUES
    ('PC'),
    ('PS4'),
    ('Xbox One'),
    ('Nintendo Switch'),
    ('PS5'),
    ('Xbox Series X');

INSERT INTO LIBRARY (id_user, name_game, hours_played_game) VALUES
    (1, 'The Witcher 3', 100);

INSERT INTO DISPONIBILITY (name_game, name_platform) VALUES
    ('The Witcher 3', 'PC'),
    ('The Witcher 3', 'PS4'),
    ('The Witcher 3', 'Xbox One'),
    ('The Witcher 3', 'Nintendo Switch'),
    ('The Witcher 3', 'PS5'),
    ('The Witcher 3', 'Xbox Series X');

    