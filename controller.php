<?php


include "Car.php";

if (isset($_GET["km"])) {
	$km = htmlspecialchars($_GET["km"]);
	//TODO: datenbank connection
	/*
	 * DB:
	 * name|type|kmMin|kmMax|info
	 * name: bmw i3
	 * type: elektro
	 * kmMin: 0
	 * kmMax: 50
	 * info: nettes auto
	 */

	$cars = getCars($km);
	//include "evaluation.view.php";

} else {
	echo "Bitte ordentliche Zahl eingeben";
}

function getCars($km) {
    $dsn = 'mysql:dbname=fuhrparkdb;host=frillingsql01.database.windows.net';
    $user = 'afrilling';
    $password = 'unigoe12!';
	$conn = new PDO($dsn, $user, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$query = "SELECT * FROM cars WHERE ? >= kmMin AND ? <= kmMax;";
	/*$stmt = $conn->stmt_init();*/
	$stmt->prepare($query);
	$km_number = intval($km);
	$stmt->bind_param("ii", $km_number, $km_number);
	$stmt->execute();
	$res = $stmt->get_result();
	if (!$res) {
		die("error in query");
	}
	//$res = $conn->query($stmt);
	$cars = array();
	if ($res->num_rows > 0) {
		while ($row = $res->fetch_assoc()) {
			$car = new Car();
			$car->name = $row["name"];
			$car->type = $row["type"];
			$car->info = $row["info"];
			$car->img = $row["img"];
			//... für alle gewollten infos (nach belieben noch kmMin & kmMax)
			array_push($cars, $car);//TODO: new cars pushen, nicht die rows
		}
	}
	$stmt->close();
	$conn->close();
	return ($cars);


}

