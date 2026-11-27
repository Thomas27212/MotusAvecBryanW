CREATE TABLE usr(
   Id_USR INT AUTO_INCREMENT,
   pseudo VARCHAR(50)  NOT NULL,
   password TEXT,
   mail TEXT,
   PRIMARY KEY(Id_USR)
);

CREATE TABLE mots(
   Id_mots INT AUTO_INCREMENT,
   mot VARCHAR(50) ,
   PRIMARY KEY(Id_mots)
);

CREATE TABLE typo(
   Id_typo INT AUTO_INCREMENT,
   nom_typo TEXT,
   lien_typo TEXT,
   PRIMARY KEY(Id_typo)
);

CREATE TABLE stats_usr(
   Id_stats_usr INT AUTO_INCREMENT,
   nb_win BIGINT,
   nb_essaie BIGINT,
   Id_USR INT NOT NULL,
   PRIMARY KEY(Id_stats_usr),
   UNIQUE(Id_USR),
   FOREIGN KEY(Id_USR) REFERENCES usr(Id_USR)
);

CREATE TABLE current_party(
   Id_current_party INT AUTO_INCREMENT,
   mot_deja_tape VARCHAR(50) ,
   Id_USR INT NOT NULL,
   PRIMARY KEY(Id_current_party),
   UNIQUE(Id_USR),
   FOREIGN KEY(Id_USR) REFERENCES usr(Id_USR)
);
