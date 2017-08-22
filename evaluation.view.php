<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eval</title>
</head>
<body>
	Folgende Autos eignen sich:
	<br/>

	<?php
	include "controller.php";
	$cars = getCars($_GET["km"]);
	foreach ($cars as $car) {
		$view = "<div>";
		$view .= "Name: " . $car->name;
		$view .= "<br/>";
		$view .= "Type: " . $car->type;
		$view .= "<br/>";
		$view .= "Info: " . $car->info;
		$view .= "<br/>";
		$view .= "<img src='" . $car->img . "'>";
		$view .= "<br/>";
		$view .= "</div>";
		echo $view;
		echo "<br/>";
	}
	?>

</body>
</html>