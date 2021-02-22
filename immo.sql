
CREATE TABLE maison(
  id_maison int(10) PRIMARY KEY AUTO_INCREMENT,
  montant float(4.2),
  description text,
  adresse varchar(60),
  cp int(5),
  ville varchar(20)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO maison(id_maison, adresse,cp, ville) VALUES(NULL, "10, rue de paris", 75000, "Paris");
INSERT INTO maison VALUES(NULL, 700, "ma description", "10, rue de paris", 75000, "Paris");

UPDATE maison SET ville = "Nantes", montant = 400 where description IS NULL

DELETE FROM maison where id_maison = 3

ALTER TABLE maison CHANGE code_postal cp int(5)

ALTER TABLE maison ADD COLUMN sup int(3)





CREATE TABLE personnes(
  id_personne int(10) PRIMARY KEY AUTO_INCREMENT,
  nom varchar(30),
  prenom varchar(30),
  tel int(10) unique,
  num_maison int(10),
  FOREIGN KEY (num_maison) REFERENCES maison(id_maison)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO personnes VALUES(10, "Jeans", "Pièrre", 0603050212, 4)


CREATE TABLE posseder(
  num_perso int(10),
  num_maison int(10),
  PRIMARY KEY (num_perso, num_maison),
  FOREIGN KEY (num_perso) REFERENCES personnes (id_personne),
  FOREIGN KEY (num_maison) REFERENCES maison (id_maison)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO posseder VALUES(10, 2)
