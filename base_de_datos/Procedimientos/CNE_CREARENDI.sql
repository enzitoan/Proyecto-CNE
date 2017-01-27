DROP PROCEDURE IF EXISTS CNE_CREARENDI;
DELIMITER //
CREATE PROCEDURE CNE_CREARENDI
(
	IN ENTMarca				VARCHAR(255),
	IN ENTModelo			VARCHAR(255),
	IN ENTDetModelo			VARCHAR(255),
	IN ENTTraccion			VARCHAR(255),
	IN ENTTransmision		VARCHAR(255),
	IN ENTCombustible		VARCHAR(255),
	IN ENTCilindrada		VARCHAR(255),
	IN ENTCarroceria		VARCHAR(255),
	IN ENTCodInforme		VARCHAR(255),
	IN ENTFhoHomologacion	VARCHAR(255),
	IN ENTCategoria			VARCHAR(255),
	IN ENTEmpresaHomo		VARCHAR(255),
	IN ENTNorma				VARCHAR(255),
	IN ENTCo2				DECIMAL(9,2),
	IN ENTRendCiudad		DECIMAL(9,2),
	IN ENTRenDCarretera		DECIMAL(9,2),
	IN ENTRenDMixto			DECIMAL(9,2),
	IN ENTTipo1				VARCHAR(255),
	IN ENTTipo2				VARCHAR(255),
	IN ENTTipo3				VARCHAR(255),
	IN ENTTipo4				VARCHAR(255),
	OUT SALNumError			INT,
	OUT SALMsjError			VARCHAR(2048)
)

BEGIN
	DECLARE iRowCount INT;
	
	DECLARE EXIT HANDLER FOR SQLSTATE '23000'
	SELECT '23000' AS SALNumError, 'Error al insertar nuevo registro: duplicate keys found' AS SALNumError;

	SET iRowCount = 0;
	SET SALNumError = 0;
	SET SALMsjError = ' ';

	INSERT INTO
		RENDI_URBAN_Y_EMISI_DE
	(
		RUE_SDESMARCA,
		RUE_SDESMODELO,
		RUE_SDETMODELO,
		RUE_SDESTRACCION,
		RUE_SDESTRANSMISION,
		RUE_SDESCOMBUSTIBLE,
		RUE_SDESCILINDRADA,
		RUE_SDESCARROCERIA,
		RUE_SCODINFORME,
		RUE_SFHOHOMOLOGACION,
		RUE_SDESCATEGORIA,
		RUE_SDESEMPRESAHOMO,
		RUE_SDESNORMA,
		RUE_SDESCO2,
		RUE_SRENDCIUDAD,
		RUE_SRENDCARRETERA,
		RUE_SRENDMIXTO,
		RUE_STIPO1,
		RUE_STIPO2,
		RUE_STIPO3,
		RUE_STIPO4,
		RUE_DFHOREGISTRO,
		RUE_SFHOACTUALIZACION,
		RUE_SINDPROCESO,
		RUE_SGLSPROCESO
	)
	VALUES
	(
		ENTMarca,
		ENTModelo,
		ENTDetModelo,
		ENTTraccion,
		ENTTransmision,
		ENTCombustible,
		ENTCilindrada,
		ENTCarroceria,
		ENTCodInforme,
		ENTFhoHomologacion,
		ENTCategoria,
		ENTEmpresaHomo,
		ENTNorma,
		ENTCo2,
		ENTRendCiudad,
		ENTRenDCarretera,
		ENTRenDMixto,
		ENTTipo1,
		ENTTipo2,
		ENTTipo3,
		ENTTipo4,
		SYSDATE(),
		STR_TO_DATE('19000101','%Y%m%d'),
		'0', /*0: Pendiente, 1: Pocesado, 2: Con Error*/
		''
	);
	
	/* Verificar la cantidad de filas insertada */
	SELECT ROW_COUNT() INTO iRowCount;
				
	IF iRowCount = 0 THEN
		SET SALNumError = 100;
		SET SALMsjError = 'No pudo registrar la reserva del evento.';
	END IF;

END //
DELIMITER ;