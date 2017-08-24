<?php
require_once "Car.php";
class Api {
	var $link = null;

	function __construct() {
		$this->link = new mysqli("sql11.freemysqlhosting.net", "sql11191223", "jqDu9jxQkC", "sql11191223");
		if (!$this->link) die("Es konnte keine Verbindung zum Server hergestellt werden");
		$this->link->set_charset("utf-8");
	}

	/**
	 * return String json of all topics
	 *
	 * Ich weiß gar nicht so richtig, wie ich vorgehen soll mit der APi und wie ich sie
	 * wie der einbinden muss ? Also den befehl bis $querry verstehe ich noch aber dann wird es auch immer wenier
	 * muss ich die Api.php einfach in der fuhrpark.php mit include einbinden?
	 */
	function getCars($km) {
		if ($km < 0) {
			die("ERROR: km < 0!");
		}
		$query = "SELECT * FROM cars WHERE ? >= kmMin AND ? <= kmMax;";
		$stmt = $this->link->stmt_init();
		$stmt->prepare($query);
		$km_number = intval($km);
		$stmt->bind_param("ii", $km_number, $km_number);
		$stmt->execute();
		$res = $stmt->get_result();
		if (!$res) {
			die("error in query");
		}
		$cars = array();
		if ($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$car = new Car();
				$car->name = $row["name"];
				$car->type = $row["type"];
				$car->info = $row["info"];
				$car->img = $row["img"];
				array_push($cars, $car);
			}
		}
		$stmt->close();
		$this->link->close();
		return $cars;
	}

	function getAllCars() {
		$query = "SELECT name, type, info, img FROM cars;";
		$stmt = $this->link->stmt_init();
		$stmt->prepare($query);
		$stmt->execute();
		$res = $stmt->get_result();
		if (!$res) {
			die("error in query");
		}
		$cars = array();
		if ($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$car = new Car();
				$car->name = $row["name"];
				$car->type = $row["type"];
				$car->info = $row["info"];
				$car->img = $row["img"];
				array_push($cars, $car);
			}
		}
		$stmt->close();
		$this->link->close();
		return $cars;
	}
}