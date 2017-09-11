<?php
require_once "Car.php";
class Api {
	var $link = null;

	function __construct() {
		$this->link = new mysqli("sql11.freemysqlhosting.net", "sql1193231", "BlzvSwDgRf", "sql1193231");
		if (!$this->link) die("Es konnte keine Verbindung zum Server hergestellt werden");
		$this->link->set_charset("utf-8");
	}

	/**
	 * return String json of all topics
	 */
	function getCars($m) {
	    $km = $m / 1000;
		if ($km < 0) {
			die("ERROR: km < 0!");
		}
		$query = "SELECT * FROM cars WHERE ? >= kmMin AND ? <= kmMax;";
		$stmt = $this->link->prepare($query);
		$stmt->bind_param("dd", $km, $km);
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