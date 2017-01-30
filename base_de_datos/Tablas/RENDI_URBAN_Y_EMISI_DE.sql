DROP TABLE RENDI_URBAN_Y_EMISI_DE;
CREATE TABLE IF NOT EXISTS RENDI_URBAN_Y_EMISI_DE (
	RUE_NID 				INT(10) 		NOT NULL AUTO_INCREMENT,
	RUE_SDESMARCA 			VARCHAR(255) 	NULL,
	RUE_SDESMODELO 			VARCHAR(255) 	NULL,
	RUE_SDETMODELO 			VARCHAR(255) 	NULL,
	RUE_SDESTRACCION		VARCHAR(255) 	NULL,
	RUE_SDESTRANSMISION		VARCHAR(255) 	NULL,
	RUE_SDESCOMBUSTIBLE		VARCHAR(255) 	NULL,
	RUE_SDESCILINDRADA 		VARCHAR(255) 	NULL,
	RUE_SDESCARROCERIA 		VARCHAR(255) 	NULL,
	RUE_SCODINFORME 		VARCHAR(255) 	NULL,
	RUE_SFHOHOMOLOGACION 	VARCHAR(255) 	NULL,
	RUE_SDESCATEGORIA 		VARCHAR(255) 	NULL,
	RUE_SDESEMPRESAHOMO 	VARCHAR(255) 	NULL,
	RUE_SDESNORMA 			VARCHAR(255) 	NULL,
	RUE_SDESCO2 			DECIMAL(9,2) 	NULL,
	RUE_SRENDCIUDAD			DECIMAL(9,2) 	NULL,
	RUE_SRENDCARRETERA		DECIMAL(9,2) 	NULL,
	RUE_SRENDMIXTO 			DECIMAL(9,2) 	NULL,
	RUE_STIPO1 				VARCHAR(255) 	NULL,
	RUE_STIPO2 				VARCHAR(255) 	NULL,
	RUE_STIPO3 				VARCHAR(255) 	NULL,
	RUE_STIPO4 				VARCHAR(255) 	NULL,
	RUE_DFHOREGISTRO 		DATETIME 		NOT NULL,
	RUE_SFHOACTUALIZACION	DATETIME		NOT NULL,
	RUE_SINDPROCESO			VARCHAR(1)		NOT NULL,
	RUE_SGLSPROCESO			VARCHAR(255)	NOT NULL,
PRIMARY KEY (RUE_NID)
) ENGINE=INNODB DEFAULT CHARSET=UTF8;