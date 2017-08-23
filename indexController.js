function getAutos() {
	var km = $("#km").val();
	if (km <= 0) {
		alert("km kleiner gleich null iae:(");
		return;
	}
	window.location = "/evaluation.view.php?km=" + km;

}