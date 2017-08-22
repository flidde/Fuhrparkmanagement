function getAutos() {
	console.log("läuft");
	var km = $("#km").val();
	if (km <= 0) {
		alert("km kleiner gleich null iae:(");
		return;
	}
	console.log(km);
	window.location = "/evaluation.view.php?km=" + km;

}