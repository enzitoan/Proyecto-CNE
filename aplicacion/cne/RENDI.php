<?php
	/*Conectar db*/
	
	//echo "LenData: " . $lenData . "</br>";

	$server = "localhost";
	$user = "joelsali_cne";
	$pass = "password123$";
	$bd = "joelsali_cne";

	$mysql = mysql_connect($server,$user,$pass);
	mysql_select_db($bd, $mysql);

	$aReturn = array();
	$aReturn["numerror"] = 0;
	$aReturn["msjerror"] = "";

	$p_sDESMARCA = $_POST["RUE_SDESMARCA"];
	$p_sDESMODELO = $_POST["RUE_SDESMODELO"];
	$p_sDETMODELO = $_POST["RUE_SDETMODELO"];		
	$p_sDESTRACCION = $_POST["RUE_SDESTRACCION"];		
	$p_sDESTRANSMISION = $_POST["RUE_SDESTRANSMISION"];		
	$p_sDESCOMBUSTIBLE = $_POST["RUE_SDESCOMBUSTIBLE"];		
	$p_sDESCILINDRADA = $_POST["RUE_SDESCILINDRADA"];		
	$p_sDESCARROCERIA = $_POST["RUE_SDESCARROCERIA"];		
	$p_sCODINFORME = $_POST["RUE_SCODINFORME"];		
	$p_sFHOHOMOLOGACION = $_POST["RUE_SFHOHOMOLOGACION"];		
	$p_sDESCATEGORIA = $_POST["RUE_SDESCATEGORIA"];		
	$p_sDESEMPRESAHOMO = $_POST["RUE_SDESEMPRESAHOMO"];		
	$p_sDESNORMA = $_POST["RUE_SDESNORMA"];
	$p_sDESCO2 = $_POST["RUE_SDESCO2"];
	$p_sRENDCIUDAD = $_POST["RUE_SRENDCIUDAD"];
	$p_sRENDCARRETERA = $_POST["RUE_SRENDCARRETERA"];
	$p_sRENDMIXTO = $_POST["RUE_SRENDMIXTO"];
	$p_sTIPO1 = $_POST["RUE_STIPO1"];
	$p_sTIPO2 = $_POST["RUE_STIPO2"];
	$p_sTIPO3 = $_POST["RUE_STIPO3"];
	$p_sTIPO4 = $_POST["RUE_STIPO4"];

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
		    break;
		}
	} 
	mysql_free_result($rs);

	mysql_close($con); 
	echo json_encode($aReturn);
?>