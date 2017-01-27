<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table id="tbl-datos" class="table table-responsive table-condensed table-hover">
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		const API_KEY = '40af6c02526a47f970a1323460c8289b47fd508c';
		var aDatos = [];

		var getData = function() {
			console.group("[" + arguments.callee.name + "]");
			$.ajax({
				url: 'http://cne.cloudapi.junar.com/api/v2/datastreams/RENDI-URBAN-Y-EMISI-DE/data.ajson/',
				type: 'GET',
				async: false,
				dataType: 'json',
				data: {
					'auth_key': API_KEY,
					//'limit': 5,
				},
			})
			.done(function(data) {

				if (data) {
					console.log("success");
					console.log(data);
					console.log(data.result);

					aDatos = data.result;

					var header = '<thead><tr>';	
					$.each(aDatos, function(index, val) {
						if (index == 0) {
							for (var i = 0; i < val.length; i++) {
						 		var col = '<th>' + val[i] + '</th>';
								header = header + col;
							}
						} 
					});						
					header = header + "<tr></thead>"
					$('#tbl-datos').append(header);

					var body = '<tbody>';	
					$.each(aDatos, function(index, val) {
						if (index > 0) {
							body = body + '<tr>';
							for (var i = 0; i < val.length; i++) {
						 		var col = '<td>' + val[i] + '</td>';
								body = body + col;
							}
							body = body + '</tr>';
						} 
					});						
					body = body + '</tbody>';
					$('#tbl-datos').append(body);
				} else {
					alert('No Data');
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

			console.groupEnd();
		};

		var insertData = function() {
			console.group("[" + arguments.callee.name + "]");
			var oData = {};

			$.each(aDatos, function(index, val) {
				if (index > 0) {
					oData["RUE_SDESMARCA"] = val[0];
					oData["RUE_SDESMODELO"] = val[1];
					oData["RUE_SDETMODELO"] = val[2];
					oData["RUE_SDESTRACCION"] = val[3];
					oData["RUE_SDESTRANSMISION"] = val[4];
					oData["RUE_SDESCOMBUSTIBLE"] = val[5];
					oData["RUE_SDESCILINDRADA"] = val[6];
					oData["RUE_SDESCARROCERIA"] = val[7];
					oData["RUE_SCODINFORME"] = val[8];
					oData["RUE_SFHOHOMOLOGACION"] = val[9];
					oData["RUE_SDESCATEGORIA"] = val[10];
					oData["RUE_SDESEMPRESAHOMO"] = val[11];
					oData["RUE_SDESNORMA"] = val[12];
					oData["RUE_SDESCO2"] = val[13];
					oData["RUE_SRENDCIUDAD"] = val[14];
					oData["RUE_SRENDCARRETERA"] = val[15];
					oData["RUE_SRENDMIXTO"] = val[16];
					oData["RUE_STIPO1"] = val[17];
					oData["RUE_STIPO2"] = val[18];
					oData["RUE_STIPO3"] = val[19];
					oData["RUE_STIPO4"] = val[20];

					console.log(oData);

					$.ajax({
						url: 'RENDI.php',
						type: 'POST',
						dataType: 'json',
						data: oData,
					})
					.done(function(json) {
						console.log("success");
						console.log(json);
						if (json.numerror != 0) {
							alert('N° Error [' + json.numerror + '] : ' + json.msjerror);
							return false;
						} else {
							console.log("Registro[" + index + "]: OK");
							//alert('Se han insertado los registros');
						}
					})
					.fail(function(xhr, status, error) {
						console.log("error");
						alert(error);
					})
					.always(function() {
						console.log("complete");
					});
					
					console.groupEnd();
				}
			});

		};

		var limpiaData = function(str) {
			var cadena = '';
			cadena = str.replace("\n"," ");
			return cadena;
		}

		$(document).ready(function() {
			getData();
			insertData();
		});
		
	</script>
</body>
</html>