<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fuhrparkmanagement</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
	require_once "../fragments/head.html";
	?>

</head>
<body>
	<?php
	require_once "../fragments/navbar.html";
	?>
	<div class="container">
		<h2>Fuhrparkmanagement</h2>
		<p>Bitte geben Sie den Abfahrtsort und den Zielort Ihrer Reise ein.</p>
		<div class="input-field">
			<form action="/evaluation.view.php">
				<input id="km" type="number" name="km" required>
				<label for="km">Anzahl km</label>
				<input class="btn" type="submit" value="Abschicken">
			</form>
		</div>
	</div>




	<script>
		$(document).ready(function() {
			Materialize.updateTextFields();
		});


	</script>
	<?php
	require_once "../fragments/footer.html";
	?>
</body>
</html>