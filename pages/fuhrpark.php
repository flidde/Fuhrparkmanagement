<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Geeignete Autos</title>

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
    <h4>Folgende Autos eignen sich:</h4>
    <br/>

    <?php
    include "../controller.php";
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
        $view = str_replace("var_img", $car->img, $view);//TODO: str_replace (array, array) benutzen!;
        $view = str_replace("var_name", $car->name, $view);
        $view = str_replace("var_type", $car->type, $view);
        $view = str_replace("var_info", $car->info, $view);

        echo $view;
        echo "<br/>";
    }
    ?>
</div>
<?php
require_once "../fragments/footer.html";
?>
</body>
</html>