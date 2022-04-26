/**
 * Création et selection de la base de donnée
 */
 CREATE DATABASE template;
 USE template;

/**
 * Création de la table utilisateur
 */
CREATE TABLE users (
    userId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    pseudonyme VARCHAR(255) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    phoneNumber VARCHAR(255),
    isForgot BOOLEAN DEFAULT 0,
    forgotPasswordToken VARCHAR(50),
    isAdmin BOOLEAN DEFAULT 0,
    creationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE boats(
    boatId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    imatriculation VARCHAR(255) NOT NULL,
    bname VARCHAR(255) ,
    model VARCHAR(255) ,
    motor VARCHAR(255) ,
    launchDate DATETIME ,
    confirmed BOOLEAN DEFAULT 0,
    oldRef INT,
    userId INT,
    FOREIGN KEY (userId) REFERENCES users(userId)
);

CREATE TABLE persons(
    personId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) ,
    grade VARCHAR(255),
    content TEXT,
    pics VARCHAR(255),
    birth DATETIME ,
    death DATETIME ,
    gender BOOLEAN,
    confirmed BOOLEAN DEFAULT 0,
    oldRef INT,
    userId INT,
    FOREIGN KEY (userId) REFERENCES users(userId)
);

CREATE TABLE decorations(
    decoId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    FOREIGN KEY (userId) REFERENCES users(userId),
    label VARCHAR(255),
    pics VARCHAR(255)
);


CREATE TABLE savings(
    savingId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    savingName VARCHAR(255) ,
    nbSave INT,
    content TEXT,
    destination VARCHAR(255),
    savingDate DATETIME,
    confirmed BOOLEAN DEFAULT 0,
    oldRef INT,
    userId INT,
    FOREIGN KEY (userId) REFERENCES users(userId)
);

CREATE TABLE crews(
    post VARCHAR(255),
    nbDead INT,
    boatId INT,
    savingId INT,
    personId INT,
    userId INT,
    PRIMARY KEY (boatId,savingId,personId)  ,
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (boatId) REFERENCES boats(boatId),
    FOREIGN KEY (savingId) REFERENCES savings(savingId),
    FOREIGN KEY (personId) REFERENCES persons(personId)
);



CREATE TABLE siblings(
    siblingId INT,
    personId INT,
    userId INT,
    PRIMARY KEY (siblingId,personId)  ,
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (personId) REFERENCES persons(personId),
    FOREIGN KEY (siblingId) REFERENCES persons(personId)
);

CREATE TABLE parents(
    parentId INT,
    personId INT,
    userId INT,
    PRIMARY KEY (parentId,personId)  ,
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (personId) REFERENCES persons(personId),
    FOREIGN KEY (parentId) REFERENCES persons(personId)
);

CREATE TABLE decorated(
    decoId INT,
    personId INT,
    userId INT,
    PRIMARY KEY (decoId,personId)  ,
    FOREIGN KEY (userId) REFERENCES users(userId),
    FOREIGN KEY (decoId) REFERENCES decorations(decoId),
    FOREIGN KEY (personId) REFERENCES persons(personId)
);
