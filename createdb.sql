drop database if exists pdodb;
create database pdodb;
use pdodb;

CREATE TABLE Clients(
        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Nom VARCHAR(30) NOT NULL,
        Prenom VARCHAR(30) NOT NULL,
        Adresse VARCHAR(70) NOT NULL,
        Ville VARCHAR(30) NOT NULL,
        Codepostal INT UNSIGNED NOT NULL,
        Pays VARCHAR(30) NOT NULL,
        Mail VARCHAR(50) NOT NULL,
        DateInscription TIMESTAMP,
        UNIQUE(Mail)
);


INSERT INTO Clients(Nom, Prenom, Adresse, Ville, Codepostal, Pays, Mail)
VALUES('Giraud','Pierre','Quai d\'Europe','Toulon',83000,'France','pierre.giraud@edhec.com');