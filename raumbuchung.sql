DROP DATABASE IF EXISTS raumbuchung;
CREATE DATABASE raumbuchung;
USE raumbuchung;
CREATE TABLE Raum (
  Nummer int,
  Plätze int,
  Besonderheiten varchar(255),
  PRIMARY KEY (Nummer)
);
CREATE TABLE Mitarbeiter (
  Nummer int,
  Vorname varchar(255),
  Nachname varchar(255),
  Passwort varchar(255),
  Administrator boolean,
  PRIMARY KEY (Nummer)
);
CREATE TABLE Buchung (
  RaumNr int,
  MitarbNr int,
  Datum date,
  Zeitslot int,
  FOREIGN KEY RaumNr REFERENCES Raum(Nummer),
  FOREIGN KEY MitarbNr REFERENCES Mitarbeiter(Nummer),
  PRIMARY KEY (RaumNr, MitarbNr, Datum, Zeitslot)
);
INSERT INTO Raum VALUES
  (100, 10, "Beamer"),
  (101, 5, NONE),
  (102, 5, "Smartboard")
  (200, 10, "Konferenztisch"),
  (201, 25, "Beamer");

