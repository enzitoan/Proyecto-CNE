<?php
	/*Conectar db*/

	include_once("config.php");
	
	$mysql = mysql_connect($server,$user,$pass);
	mysql_set_charset('utf8');
	mysql_select_db($bd, $mysql);

	$aReturn = array();
	$aReturn["numerror"] = 0;
	$aReturn["msjerror"] = "";

	$p_sDESMARCA = urldecode($_POST["RUE_SDESMARCA"]);
	$p_sDESMODELO = urldecode($_POST["RUE_SDESMODELO"]);
	$p_sDETMODELO = urldecode($_POST["RUE_SDETMODELO"]);
	$p_sDESTRACCION = urldecode($_POST["RUE_SDESTRACCION"]);
	$p_sDESTRANSMISION = urldecode($_POST["RUE_SDESTRANSMISION"]);
	$p_sDESCOMBUSTIBLE = urldecode($_POST["RUE_SDESCOMBUSTIBLE"]);
	$p_sDESCILINDRADA = urldecode($_POST["RUE_SDESCILINDRADA"]);
	$p_sDESCARROCERIA = urldecode($_POST["RUE_SDESCARROCERIA"]);
	$p_sCODINFORME = urldecode($_POST["RUE_SCODINFORME"]);
	$p_sFHOHOMOLOGACION = urldecode($_POST["RUE_SFHOHOMOLOGACION"]);
	$p_sDESCATEGORIA = urldecode($_POST["RUE_SDESCATEGORIA"]);
	$p_sDESEMPRESAHOMO = urldecode($_POST["RUE_SDESEMPRESAHOMO"]);
	$p_sDESNORMA = urldecode($_POST["RUE_SDESNORMA"]);
	$p_sDESCO2 = urldecode($_POST["RUE_SDESCO2"]);
	$p_sRENDCIUDAD = urldecode($_POST["RUE_SRENDCIUDAD"]);
	$p_sRENDCARRETERA = urldecode($_POST["RUE_SRENDCARRETERA"]);
	$p_sRENDMIXTO = urldecode($_POST["RUE_SRENDMIXTO"]);
	$p_sTIPO1 = urldecode($_POST["RUE_STIPO1"]);
	$p_sTIPO2 = urldecode($_POST["RUE_STIPO2"]);
	$p_sTIPO3 = urldecode($_POST["RUE_STIPO3"]);
	$p_sTIPO4 = urldecode($_POST["RUE_STIPO4"]);

	$sp = "call CNE_CREARENDI('$p_sDESMARCA','$p_sDESMODELO','$p_sDETMODELO','$p_sDESTRACCION','$p_sDESTRANSMISION','$p_sDESCOMBUSTIBLE','$p_sDESCILINDRADA','$p_sDESCARROCERIA','$p_sCODINFORME','$p_sFHOHOMOLOGACION','$p_sDESCATEGORIA','$p_sDESEMPRESAHOMO','$p_sDESNORMA',$p_sDESCO2,$p_sRENDCIUDAD,$p_sRENDCARRETERA,$p_sRENDMIXTO,'$p_sTIPO1','$p_sTIPO2','$p_sTIPO3','$p_sTIPO4',@NumError,@MsjeError);";
	//Calling the total_price stored procedure using the @t OUT parameter 
	$rs= mysql_query($sp) or die(mysql_error()); 
	//Listing the result 
	$rs = mysql_query('SELECT @NumError, @MsjeError'); 
	while($row = mysql_fetch_assoc($rs)) { 
		if ($row["@NumError"] != 0)
		{
		    $aReturn["numerror"] = $row["@NumError"];
		    $aReturn["msjerror"] = $row["@MsjeError"];
		}
	} 
	mysql_free_result($rs);

	mysql_close($mysql); 
	echo json_encode($aReturn);
?>