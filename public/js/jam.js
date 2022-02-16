function getServerTime() {

    return $.ajax({ async: false }),getResponseHeader('Date');

}

function realtimeClock() {

    var rtClock = new Date();

    var jam = rtClock.getHours();
    var menit = rtClock.getMinutes();
    var detik = rtClock.getSeconds();

    jam = ("0" + jam).slice(-2);
    menit = ("0" + menit).slice(-2);
    detik = ("0" + detik).slice(-2);

    document.getElementById("clock-masuk").innerHTML = jam + " : " + menit + " : " + detik;
    document.getElementById("clock-keluar").innerHTML = jam + " : " + menit + " : " + detik;

    var jam_absen = setTimeout(realtimeClock, 500);

}