DROP DATABASE IF EXISTS mesguen_appli_chauffeur;

CREATE DATABASE IF NOT EXISTS mesguen_appli_chauffeur;
USE MLR1;
# -----------------------------------------------------------------------------
#       TABLE : LIEU
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIEU
 (
   LIEUID char(32) NOT NULL  ,
   VILID char(32) NOT NULL  ,
   LIEUNOM CHAR(32) NULL  ,
   LIEUCOORDGPS CHAR(32) NULL  
   , PRIMARY KEY (LIEUID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE LIEU
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_LIEU_COMMUNE
     ON LIEU (VILID ASC);

# -----------------------------------------------------------------------------
#       TABLE : CHAUFFEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CHAUFFEUR
 (
   CHFID char(32) NOT NULL ,
   CHFNOM CHAR(32) NULL  ,
   CHFPRENOM CHAR(32) NULL  ,
   CHFTEL CHAR(32) NULL  ,
   CHFMAIL CHAR(32) NULL  
   , PRIMARY KEY (CHFID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TOURNEE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TOURNEE
 (
   TRNNUM char(32) NOT NULL  ,
   VEHIMMAT CHAR(32) NOT NULL  ,
   CHFID char(32) NOT NULL  ,
   TRNCOMMENTAIRE CHAR(32) NULL  ,
   TRNPECCHAUFFEUR CHAR(32) NULL  ,
   TRNDTE DATETIME NULL  
   , PRIMARY KEY (TRNNUM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE TOURNEE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_TOURNEE_VEHICULE
     ON TOURNEE (VEHIMMAT ASC);

CREATE  INDEX I_FK_TOURNEE_CHAUFFEUR
     ON TOURNEE (CHFID ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMMUNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMUNE
 (
   VILID char(32) NOT NULL  ,
   VILNOM CHAR(32) NULL  
   , PRIMARY KEY (VILID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PHOTO
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PHOTO
 (
   PHOID char(32) NOT NULL,
   TRNNUM char(32) NOT NULL  ,
   ETPID char(32) NOT NULL  ,
   PHOURL CHAR(32) NULL  
   , PRIMARY KEY (PHOID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PHOTO
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PHOTO_ETAPE
     ON PHOTO (TRNNUM ASC,ETPID ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPEDOCUMENTATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEDOCUMENTATION
 (
   TYPDOCID CHAR(32) NOT NULL  ,
   TYPDOCLIB CHAR(32) NULL  
   , PRIMARY KEY (TYPDOCID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : VEHICULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VEHICULE
 (
   VEHIMMAT CHAR(32) NOT NULL  ,
   VEHNOM CHAR(32) NULL  
   , PRIMARY KEY (VEHIMMAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : DOCUMENTATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DOCUMENTATION
 (
   DOCID CHAR(32) NOT NULL  ,
   TRNNUM char(32) NOT NULL  ,
   TYPDOCID CHAR(32) NOT NULL  ,
   DOCURL CHAR(32) NULL  
   , PRIMARY KEY (DOCID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DOCUMENTATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DOCUMENTATION_TOURNEE
     ON DOCUMENTATION (TRNNUM ASC);

CREATE  INDEX I_FK_DOCUMENTATION_TYPEDOCUMENTATION
     ON DOCUMENTATION (TYPDOCID ASC);

# -----------------------------------------------------------------------------
#       TABLE : ETAPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETAPE
 (
   TRNNUM char(32) NOT NULL  ,
   ETPID char(32) NOT NULL  ,
   LIEUID char(32) NOT NULL  ,
   ETPHREMIN DATETIME NULL  ,
   ETPHREMAX DATETIME NULL  ,
   ETPHREDEBUT DATETIME NULL  ,
   ETPHREFIN DATETIME NULL  ,
   ETPNBPALLIV SMALLINT NULL  ,
   ETPNBPALLIVEUR SMALLINT NULL  ,
   ETPNBPALCHARG SMALLINT NULL  ,
   ETPNBPALCHARGEUR smallint NULL  ,
   ETPCHEQUE SMALLINT NULL  ,
   ETPETATLIV CHAR(32) NULL  ,
   ETPCOMMENTAIRE CHAR(100) NULL  ,
   ETPVAL CHAR(32) NULL  ,
   ETPKM INTEGER NULL  
   , PRIMARY KEY (TRNNUM,ETPID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ETAPE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ETAPE_TOURNEE
     ON ETAPE (TRNNUM ASC);

CREATE  INDEX I_FK_ETAPE_LIEU
     ON ETAPE (LIEUID ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE LIEU 
  ADD FOREIGN KEY FK_LIEU_COMMUNE (VILID)
      REFERENCES COMMUNE (VILID) ;


ALTER TABLE TOURNEE 
  ADD FOREIGN KEY FK_TOURNEE_VEHICULE (VEHIMMAT)
      REFERENCES VEHICULE (VEHIMMAT) ;


ALTER TABLE TOURNEE 
  ADD FOREIGN KEY FK_TOURNEE_CHAUFFEUR (CHFID)
      REFERENCES CHAUFFEUR (CHFID) ;


ALTER TABLE PHOTO 
  ADD FOREIGN KEY FK_PHOTO_ETAPE (TRNNUM,ETPID)
      REFERENCES ETAPE (TRNNUM,ETPID) ;


ALTER TABLE DOCUMENTATION 
  ADD FOREIGN KEY FK_DOCUMENTATION_TOURNEE (TRNNUM)
      REFERENCES TOURNEE (TRNNUM) ;


ALTER TABLE DOCUMENTATION 
  ADD FOREIGN KEY FK_DOCUMENTATION_TYPEDOCUMENTATION (TYPDOCID)
      REFERENCES TYPEDOCUMENTATION (TYPDOCID) ;


ALTER TABLE ETAPE 
  ADD FOREIGN KEY FK_ETAPE_TOURNEE (TRNNUM)
      REFERENCES TOURNEE (TRNNUM) ;


ALTER TABLE ETAPE 
  ADD FOREIGN KEY FK_ETAPE_LIEU (LIEUID)
      REFERENCES LIEU (LIEUID) ;

