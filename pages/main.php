<!DOCTYPE HTML>
<html>
<head>
    <title>Fuhrparkmanagement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/jquery/jquery.mobile-1.4.5.css" />
    <link rel="stylesheet" href="/vendor/waves/waves.min.css" />
    <link rel="stylesheet" href="/vendor/wow/animate.css" />
    <link rel="stylesheet" href="/css/nativedroid2.css" />
    <link rel="stylesheet" href="/css/styles.css" />

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <script src="/jquery/jquery-2.2.4.js"></script>
    <script src="/jquery/jquery.ui-1.12.1.js"></script>
    <script src="/jquery/jquery.mobile-1.4.5.js"></script>
    <script src="/jquery/jquery.ui.touch-punch.js"></script>
    <script src="/vendor/waves/waves.min.js"></script>
    <script src="/vendor/wow/wow.min.js"></script>
    <script src="/js/nativedroid2.js"></script>
    <script src="/nd2settings.js"></script>
</head>
<body>

<div data-role="page" id="page">

    <nd2-include data-src="/fragments/panel.left.html"></nd2-include>

    <div data-role="header" data-position="fixed">
        <a href="#leftpanel"><i class="zmdi zmdi-menu"></i></a>
        <h1>Fuhrparkmanagement</h1>
    </div>

    <div role="main" class="ui-content" data-inset="false">
        <ul id="topicsList" data-inset="false">
        </ul>
        <script src="/jquery/jquery-2.2.4.js"></script>
<body>

    <div data-role="page" id="page">
        <nd2-include data-src="/fragments/panel.left.html"></nd2-include
        <div data-role="header" data-position="fixed">
            <a href="#leftpanel"><i class="zmdi zmdi-menu"></i></a>
            <h1>Fuhrparkmanagement</h1>
            <p>Bitte geben Sie den Abfahrtsort und den Zielort Ihrer Reise ein.</p>
        </div>

		<div class="input-field">
			<form action="/evaluation.view.php">
				<input id="km" type="number" name="km" required>
				<label for="km">Anzahl km</label>
				<input class="btn" type="submit" value="Abschicken">
			</form>
		</div>
	</div>


	<script type="text/javascript" src="/thirdparty/materialize/js/materialize.js"></script>

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
    </div>

</div>
</body>
</html>
