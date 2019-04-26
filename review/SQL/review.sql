CREATE DATABASE ReviewSQL;

CREATE TABLE user(
     id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
     username VARCHAR(255)
) ENGINE InnoDB;

CREATE TABLE permissions(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255)
) ENGINE InnoDB;

CREATE TABLE messages(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    author INT UNSIGNED,
    FOREIGN KEY (author) REFERENCES user(id)
) ENGINE InnoDB;

CREATE TABLE user_permissions(
    userId INT UNSIGNED,
    permissionId INT UNSIGNED,
    PRIMARY KEY (userId, permissionId),
    FOREIGN KEY (userId) REFERENCES user(id),
    FOREIGN KEY (permissionId) REFERENCES permissions(id)
);

INSERT INTO user(username) VALUE('jerry');
INSERT INTO messages(content, author) VALUES
    ('anything', 2),
    ('anything', 2),
    ('anything', 2),
    ('anything', 3),
    ('anything', 3),
    ('anything', 3),
    ('anything', 3),
    ('anything', 3),
    ('anything', 4),
    ('anything', 4),
    ('anything', 4),
    ('anything', 4),
    ('anything', 4);

INSERT INTO permissions(label) VALUES ('user'), ('admin');
UPDATE permissions SET label = 'ROLE_USER' WHERE label = 'user';
UPDATE permissions SET label = 'ROLE_ADMIN' WHERE label = 'admin';



SELECT * FROM messages
    INNER JOIN user u on messages.author = u.id
    WHERE u.username = 'karlo';

SELECT * FROM messages INNER JOIN user u on messages.author = u.id;

SELECT * FROM messages LEFT JOIN user u on messages.author = u.id;
SELECT * FROM messages RIGHT JOIN user u on messages.author = u.id;

INSERT INTO user_permissions(userId, permissionId) VALUE(4, 2);

INSERT INTO user_permissions(userId, permissionId) SELECT u.id, p.id
    FROM user AS u , permissions AS p
    WHERE u.username = 'etc' AND p.label = 'ROLE_ADMIN';
