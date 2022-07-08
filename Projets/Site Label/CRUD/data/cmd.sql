DROP DATABASE IF EXISTS cmd;

CREATE DATABASE IF NOT EXISTS cmd DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE cmd;

CREATE TABLE CLIENT(
        idClient     Int  Auto_increment  NOT NULL ,
        nomClient    Varchar (50) NOT NULL ,
        prenomClient Varchar (50) NOT NULL ,
        email        Varchar (50) NOT NULL ,
        pwd          Varchar (50) NOT NULL
	,CONSTRAINT CLIENT_PK PRIMARY KEY (idClient)
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4;


#------------------------------------------------------------
# Table: COMMANDE
#------------------------------------------------------------

CREATE TABLE COMMANDE(
        idCmd     Int  Auto_increment  NOT NULL ,
        numeroCmd Varchar (50) NOT NULL ,
        dateCmd   Date NOT NULL ,
        idClient  Int NOT NULL
	,CONSTRAINT COMMANDE_PK PRIMARY KEY (idCmd)

	,CONSTRAINT COMMANDE_CLIENT_FK FOREIGN KEY (idClient) REFERENCES CLIENT(idClient)
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4;


#------------------------------------------------------------
# Table: CATEGORIE
#------------------------------------------------------------

CREATE TABLE CATEGORIE(
        idCategorie  Int  Auto_increment  NOT NULL ,
        nomCategorie Varchar (50) NOT NULL
	,CONSTRAINT CATEGORIE_PK PRIMARY KEY (idCategorie)
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4;


#------------------------------------------------------------
# Table: PRODUIT
#------------------------------------------------------------

CREATE TABLE PRODUIT(
        idProduit   Int  Auto_increment  NOT NULL ,
        nomProduit  Varchar (50) NOT NULL ,
        refProduit  Varchar (50) NOT NULL ,
        prixProduit DECIMAL (15,3)  NOT NULL ,
        idCategorie Int
	,CONSTRAINT PRODUIT_PK PRIMARY KEY (idProduit)

	,CONSTRAINT PRODUIT_CATEGORIE_FK FOREIGN KEY (idCategorie) REFERENCES CATEGORIE(idCategorie)
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4;


#------------------------------------------------------------
# Table: ligneCmd
#------------------------------------------------------------

CREATE TABLE ligneCmd(
        idProduit Int NOT NULL ,
        idCmd     Int NOT NULL ,
        quantite  Int NOT NULL
	,CONSTRAINT ligneCmd_PK PRIMARY KEY (idProduit,idCmd)

	,CONSTRAINT ligneCmd_PRODUIT_FK FOREIGN KEY (idProduit) REFERENCES PRODUIT(idProduit)
	,CONSTRAINT ligneCmd_COMMANDE0_FK FOREIGN KEY (idCmd) REFERENCES COMMANDE(idCmd)
)ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

