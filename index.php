<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fuhrparkmanagement</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="thirdparty/materialize/css/materialize.css">
	<script type="text/javascript" src="thirdparty/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="indexController.js"></script>

</head>
<body>
	<div class="container">
		<div id="tab1" class="col s12">
			<h2>Fuhrparkmanagement</h2>
			<p>Bitte geben Sie den Abfahrtsort und den Zielort Ihrer Reise ein.</p>
			<div class="input-field">
				<form>
					<input id="km" type="number" name="km" required>
					<label for="km">Anzahl km</label>
				</form>
				<button class="btn right" onclick="getAutos();">Abschicken</button>
			</div>
		</div>
		<div id="tab2" class="col s12"><h4>Page 2</h4></div>
		<div id="tab3" class="col s12"><h4>Page 3</h4></div>

	</div>


	<script type="text/javascript" src="thirdparty/materialize/js/materialize.js"></script>

	<script>
		$(document).ready(function() {
			Materialize.updateTextFields();
		});


	</script>
</body>
</html>