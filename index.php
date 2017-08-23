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

    <ul id="slide-out" class="side-nav">
        <li><div class="user-view">
                <div class="background">
                    <img src="images/office.jpg">
                </div>
                <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
                <a href="#!name"><span class="white-text name">John Doe</span></a>
                <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div></li>
        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
        <li><a href="#!">Second Link</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

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