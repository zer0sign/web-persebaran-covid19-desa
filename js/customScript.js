
$.ajax({
    url: "https://jsonp.afeld.me/?url=https%3A%2F%2Fapi.kawalcorona.com%2Findonesia",
    type: "get",
    dataType: "json",
    success: function (response) {
        response = response[0];

        $('.positif').html(response.positif)
        $('.sembuh').html(response.sembuh)
        $('.meninggal').html(response.meninggal)
        
    }
});

// $.ajax({
//     type: "get",
//     url: "https://jsonp.afeld.me/?callback=&url=https%3A%2F%2Fcorona.demakkab.go.id%2Fapi%2Fpublik",
//     dataType: "json",
//     success: function (responseKab) {
//         responseKab = responseKab.data
//         $('.positif-dmk').html(responseKab[0]['jumlah'])
//         $('.sembuh-dmk').html(responseKab[0]['data'][5]['jumlah'])
//         $('.meninggal-dmk').html(responseKab[0]['data'][3]['jumlah'])
//     }
// });



// map


var map = L.map('mapid').setView([-6.5021501,110.9047632], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18,
    minZoom:13,
}).addTo(map);
var geojsonLayer = new L.GeoJSON.AJAX("geojson.json");       
geojsonLayer.addTo(map);

// var circle = L.circle([-6.8909,110.6396], {
//     color: 'none',
//     fillColor: '#FF0000',
//     fillOpacity: 0.5,
//     radius: 5000
// }).addTo(map);

