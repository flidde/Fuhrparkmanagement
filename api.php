<?php
//Fügt das Modell Car hinzu
require_once "Car.php";
//FÜgt das Modell Optimal hinzu
include "Optimal.php";

class Api {
	var $link = null;
// Datenverbindung
	function __construct() {
		$this->link = new mysqli("sql11.freemysqlhosting.net", "sql11193231", "BlzvSwDgRf", "sql11193231");
		if (!$this->link) die("Es konnte keine Verbindung zum Server hergestellt werden");
		$this->link->set_charset("utf-8");
	}
    /**
     * @params m int meter
     * return String json of all topics
     */

    /**
     * Gibt ein Array von Cars zurück
     * @param $m Anzahl der Meter
     * @return array Ein Array von Cars die den interval der Gesuchten KM Anzahl haben
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
                $car->kmMax = $row["kmMax"];
                $car->kmMin = $row["kmMin"];
                array_push($cars, $car);
            }
        }
        $stmt->close();
        $this->link->close();
        return $cars;
    }

    /**
     * @return array Hier werden alle Autos wiedergegeben ohne zu Filtern wird für die Fuhrpark Ausgabe verwendet
     */
    function getAllCars() {
        $query = "SELECT name, type, info, img, kmMax, kmMin FROM cars;";
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
                $car->kmMax = $row["kmMax"];
                $car->kmMin = $row["kmMin"];
                $car->img = $row["img"];
                array_push($cars, $car);
            }
        }
        $stmt->close();
        $this->link->close();
        return $cars;
    }

    /**
     * @param $origin string to start
     * @param $dest string to end
     * @param $wayback Wenn True dann wird der Rückweg mitberechnet
     * @return Optimal
     */
	function getOptimalFor($origin, $dest, $wayback = false) {
        $urlHin = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$origin ."&destinations=".$dest."&key=AIzaSyCl8S06RYIveYE1uaySsV4eikOF1dxu5es";
        $urlZurueck = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$dest ."&destinations=".$origin."&key=AIzaSyCl8S06RYIveYE1uaySsV4eikOF1dxu5es";
        $urlTrainHin = "https://maps.googleapis.com/maps/api/distancematrix/json?mode=transit&transit_mode=train&origins=".$origin ."&destinations=".$dest."&key=AIzaSyCl8S06RYIveYE1uaySsV4eikOF1dxu5es";
        $urlTrainZurueck = "https://maps.googleapis.com/maps/api/distancematrix/json?mode=transit&transit_mode=train&origins=".$dest ."&destinations=".$origin."&key=AIzaSyCl8S06RYIveYE1uaySsV4eikOF1dxu5es";
        $dataHin = json_decode(file_get_contents($urlHin));
        $dataZurueck = json_decode(file_get_contents($urlZurueck));
        $dataTrainHin = json_decode(file_get_contents($urlTrainHin));
        $dataTrainZurueck = json_decode(file_get_contents($urlTrainZurueck));
        $minHin = $dataHin->rows[0]->elements[0]->distance->value;
        $textHin = $dataHin->rows[0]->elements[0]->distance->text;
        $minHinDur = $dataHin->rows[0]->elements[0]->duration->value;
        $minHinDurTx = $dataHin->rows[0]->elements[0]->duration->text;
        $minRuckDur = $dataZurueck->rows[0]->elements[0]->duration->value;
        $minRuckDurTx = $dataZurueck->rows[0]->elements[0]->duration->text;
        foreach ($dataHin->rows[0]->elements as $element) {
            if ($minHin > $element->distance->value) {
                $minHin = $element->distance->value;
                $textHin = $element->distance->value;
                $minHinDur = $element->duration->value;
                $minHinDurTx = $element->duration->text;
            }
        }
        $minZurueck = $dataZurueck->rows[0]->elements[0]->distance->value;
        $textZurueck = $dataHin->rows[0]->elements[0]->distance->text;
        foreach ($dataZurueck->rows[0]->elements as $element) {
            if ($minZurueck > $element->distance->value) {
                $minZurueck = $element->distance->value;
                $textZurueck = $element->distance->value;
                $minRuckDur = $element->duration->value;
                $minRuckDurTx = $element->duration->text;
            }
        }

        $cars = $this->getCars($wayback ? $minHin + $minZurueck : $minHin);

        $optimal = new Optimal();
        $optimal->minZurueck = $minZurueck;
        $optimal->minHin = $minHin;
        $optimal->textHin = $textHin;
        $optimal->textZurueck = $textZurueck;
        $optimal->cars = $cars;
        $optimal->von = implode(", ", $dataHin->origin_addresses);
        $optimal->bis = implode(", ", $dataHin->destination_addresses);
        $optimal->gesamt = $wayback ? $minHin + $minZurueck : $minHin;
        $optimal->hinDur = $minHinDurTx;
        $optimal->rueckDur = $minRuckDurTx;
        $optimal->gesamtDur = $wayback ? $minHinDur + $minRuckDur : $minHinDur;
        $optimal->trainHinDur = $dataTrainHin->rows[0]->elements[0]->duration->text;
        $optimal->trainRueckDur = $dataTrainZurueck->rows[0]->elements[0]->duration->text;
        $optimal->trainDur = $wayback ? $dataTrainHin->rows[0]->elements[0]->duration->value + $dataTrainZurueck->rows[0]->elements[0]->duration->value : $dataTrainHin->rows[0]->elements[0]->duration->value;
        return $optimal;

    }


}