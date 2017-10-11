<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fuhrparkmanagement</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include "../fragments/head.html"; ?>

</head>
<body>
<?php include "../fragments/navbar.html"; ?>
    <!-- Input Klasse greift auf die View.php zurück und Übermittelt die Eingaben -->
	<div class="container">
		<h2>Fuhrparkmanagement</h2>
		<p>Bitte geben Sie den Abfahrtsort und den Zielort Ihrer Reise ein.</p>
		<div class="input-field">
			<form action="/evaluation_view.php">
                <input id="von" type="text" name="von" required placeholder="von"/>
                <input id="bis" type="text" name="bis" required placeholder="bis"/>
                <input type="checkbox" name="wayback" id="wayback"/>
                <label>Rückweg mit einbeziehen?</label>
                <input class="btn" type="submit" value="Abschicken">
			</form>
		</div>
	</div>




	<script>
		$(document).ready(function() {
			Materialize.updateTextFields();
		});


	</script>
	<?php include "../fragments/footer.html"; ?>
</body>
</html>