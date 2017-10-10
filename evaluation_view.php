<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Geeignete Autos</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php include "fragments/head.html"; ?>
    <script src="evaluation_controller.js"></script>
</head>
<body>
	<?php include "fragments/navbar.html"; ?>
	<div class="container">
		<h4>Folgende Autos eignen sich:</h4>
		<br/>
        <p><span id="origin"></span> <i class="material-icons tiny">arrow_forward</i> <span id="dest"></span></p>
        <p>Hin<span id="backHint">- und Rück</span>weg: <span id="km"></span>km</p>
        <p>Dauer: <span id="dur"></span></p>
        <div id="cars">
        </div>
	</div>

    <div class="container">
    <div class='row'>
        <div class='col s12 m7'>
            <div class='card'>
                <div class='card-image'><img src='https://www.bahn.de/common/view/static/v8/img/social-media/db_logo_sm_1200x630_2016.jpg'>
                    <span class='card-title'>ICE</span>
                </div>
                <div class='card-content grey lighten-4'>
                    <h5>Typ: Deutsche Bahn</h5>
                    <p>Hin<span id="backHint">- und Rück</span>wegdauer: <span id="trainDur"></span></p>
                </div>
            </div>
        </div>
    </div>
    </div>
	<?php include "fragments/footer.html"; ?>
</body>
</html>