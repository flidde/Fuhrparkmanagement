/**
 * Created by Alex on 10.10.2017.
 */

//getRequest
$.get({
    url: "/getOptimalFor.php?von=" + getParameterByName("von") + "&bis=" + getParameterByName("bis") + (getParameterByName("wayback") != undefined ? "&wayback=on": ""),
    dataType: "json",
    success: function (json) {
        console.log(json);
        //Informationen in HTML laden
        $("#origin").html(json.von);
        $("#dest").html(json.bis);
        //Anzeige bzw. Ausblenden des Rückwegs
        if (!getParameterByName("wayback")) {
            $("#backHint").css("display", "none");
        }
       //Anzeige der KM Anzahl muss durch 1000 geteilt werden, da es Standard mäßig in Meter Ausgegeben wird
        $("#km").html(json.gesamt / 1000);
        //hier wir eine Rundung der Duration Zeit durchgeführt und eine Umrechnung in Stunden und Minuten
        var h = Math.round((json.gesamtDur) / 60 / 60 * 10) / 10;
        var m = Math.ceil((h - Math.floor(h)) * 60);
        h = Math.floor(h);
        $("#dur").html(h + " Stunden und " + m + " Minuten");
        var carsContainer= $('#cars');


        //das Ergebnis wird berechnet, also wie viele Auszugebenen Fahrzeuge vorhanden sind.
        for (var i = 0; i < json.cars.length; i++) {
            var txt = "<div class='row'><div class='col s12 m7'><div class='card'><div class='card-image'><img src='"+ json.cars[i].img + "'><span class='card-title'>"+ json.cars[i].name +"</span></div><div class='card-content grey lighten-4'> <h5>Typ:"+ json.cars[i].type + "</h5> <p>"+ json.cars[i].info + "</p> </div> </div> </div> </div>";
            carsContainer.html(txt + carsContainer.html());
        }
        h = Math.round((json.trainDur) / 60 / 60 * 10) / 10;
        m = Math.ceil((h - Math.floor(h)) * 60);
        h = Math.floor(h);
        $("#trainDur").html(h + " Stunden und " + m + " Minuten");

    }
});
// Sucht die Variablen vom getrequest(von-bis URL im Browser)
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}