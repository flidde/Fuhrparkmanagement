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
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
        </ul>
    </div>
</nav>
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


	<script type="text/javascript" src="thirdparty/materialize/js/materialize.js"></script>

	<script>
		$(document).ready(function() {
			Materialize.updateTextFields();
		});
		/*document.getElementById("km").onkeydown = function(event) {
			if (event.keyCode == 13) {
				getAutos();
			}
		}*/


	</script>
</body>
</html>