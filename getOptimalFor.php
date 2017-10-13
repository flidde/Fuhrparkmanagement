<?php

/**Leitet die Anfragen weiter an die API.php // Wayback gibt an, ob der Rückweg mit einbezogen werden soll*/
$wayback = isset($_GET["wayback"]);
if ($_GET["von"] != "" && $_GET["bis"] != "") {
    include "Api.php";
    $api = new Api();
    $optimal = $api->getOptimalFor($_GET["von"], $_GET["bis"], $wayback);
    echo json_encode($optimal);
}