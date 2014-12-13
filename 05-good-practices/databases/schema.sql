DROP TABLE IF EXISTS books;
CREATE TABLE books (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title TEXT,
    author TEXT,
    isbn TEXT,
    PRIMARY KEY (id)
);

INSERT INTO books VALUES (NULL, 'Sahara', 'Clive Cussler', '9781439135686');
INSERT INTO books VALUES (NULL, 'Atlantis Found', 'Clive Cussler', '9780425177174');
INSERT INTO books VALUES (NULL, 'Inca Gold', 'Clive Cussler', '9781416525721');

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,

    PRIMARY KEY (id)
);

# Real password is "password"
INSERT INTO users VALUES (NULL, 'john@example.com', '$2y$10$q/39UmDLlVZvk9z.bHhgVuqKyVIYq4OibWs697.52qCdJvufJayg2');

DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    amount DECIMAL(10,2),
    PRIMARY KEY (id)
);

INSERT INTO accounts VALUES (NULL, 'Checking', 1500.50);
INSERT INTO accounts VALUES (NULL, 'Savings', 75500.20);
