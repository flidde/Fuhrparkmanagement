<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Geeignete Autos</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
	require_once "fragments/head.html";
	?>
</head>
<body>
	<?php
	require_once "fragments/navbar.html";
	?>
	<div class="container">
		<h4>Folgende Autos eignen sich:</h4>
		<br/>

		<?php
		include "Api.php";
		if ($_GET["von"] != "" && $_GET["bis"] != "") {
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$_GET["von"] ."&destinations=".$_GET["bis"]."&key=AIzaSyCl8S06RYIveYE1uaySsV4eikOF1dxu5es";
            $data = json_decode(file_get_contents($url));
            echo "<p>Start: ". implode(", ", $data->origin_addresses) . "</p>\n";
            echo "<p>Ziel: ".implode(", ", $data->destination_addresses) . "</p>\n";
            $min = $data->rows[0]->elements[0]->distance->value;
            $text = $data->rows[0]->elements[0]->distance->text;
            foreach ($data->rows[0]->elements as $element) {
                if ($min > $element->distance->value) {
                    $min = $element->distance->value;
                    $text = $element->distance->value;
                }
            }
            echo "<p>".$text . "</p>\n";
            $cars = (new Api)->getCars($min);
            //$cars = getCars($_GET["km"]);
            if ($cars === -1) {
                echo "ERROR: negative Zahl eingegeben";//läuft noch nicht
            } elseif ($cars === -2) {
                echo "ERROR: keine km übergeben";//auch nicht :/
            } elseif (empty($cars)) {
                echo "ERROR: keine passenden Autos gefunden!";
            }
            foreach ($cars as $car) {
                $view = "<div class='row'>
						<div class='col s12 m7'>
							<div class='card'>
									<div class='card-image'>
										<img src='var_img'>
										<span class='card-title'>var_name</span>
									</div>
									<div class='card-content grey lighten-4'>
										<h5>Typ: var_type</h5>
										<p>var_info</p>
										</div>
								</div>
							</div>
						</div>";
                $view = str_replace(["var_img", "var_name", "var_type", "var_info"], [$car->img, $car->name, $car->type, $car->info], $view);

                echo $view;
                echo "<br/>";
            }
		}

		?>
	</div>
	<?php
	require_once "fragments/footer.html";
	?>
</body>
</html>