<?php

include "Car.php";

if (isset($_GET["km"])) {
    $km = htmlspecialchars($_GET["km"]);
    if ($km < 0) {
    	return -1;//ERROR: negative Zahl
	}
    $cars = getCars($km);

} else {
    return -2;//ERROR: $km not set
}

function getCars($km) {
    $conn = new mysqli("sql11.freemysqlhosting.net", "sql11193231", "BlzvSwDgRf", "sql11193231");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT * FROM cars WHERE ? >= kmMin AND ? <= kmMax;";
    $stmt = $conn->stmt_init();
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

