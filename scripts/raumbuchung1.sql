DROP DATABASE IF EXISTS raumbuchung;
CREATE DATABASE raumbuchung;
USE raumbuchung;

CREATE TABLE Raum (
  Nummer INT,
  Plaetze INT,
  Besonderheiten VARCHAR(255),
  PRIMARY KEY (Nummer)
);

CREATE TABLE Mitarbeiter (
  Nummer INT,
  Vorname VARCHAR(255),
  Nachname VARCHAR(255),
  Passwort VARCHAR(255),
  Administrator BOOLEAN,
  PRIMARY KEY (Nummer)
);

CREATE TABLE Buchung (
  RaumNr INT,
  MitarbNr INT,
  Datum DATE,
  Zeitslot INT,
  PRIMARY KEY (RaumNr, MitarbNr, Datum, Zeitslot),
  FOREIGN KEY (RaumNr) REFERENCES Raum(Nummer),
  FOREIGN KEY (MitarbNr) REFERENCES Mitarbeiter(Nummer)
);

INSERT INTO Raum VALUES
  (100, 10, 'Beamer'),
  (101, 5, NULL),
  (102, 5, 'Smartboard'),
  (200, 10, 'Konferenztisch'),
  (201, 25, 'Beamer');

INSERT INTO Mitarbeiter VALUES
  (1, 'Max', 'Mustermann', 'abcdefgh', 0),
  (3, 'Hans', 'Schmidt', 'qwertz789', 0),
  (4, 'Laura', 'Klein', 'laura2024', 0),
  (5, 'Peter', 'Meyer', 'securePW!', 1),
  (6, 'Anna', 'Schulz', 'anna_pw', 0),
  (7, 'Thomas', 'Becker', 'admin42', 1);

