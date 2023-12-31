var map = L.map("map").setView([-6.5962, 106.7906], 13);

// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
// maxZoom: 18,
// attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// }).addTo(map);

//googlestreet
// L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
// maxZoom: 20,
// subdomains:['mt0','mt1','mt2','mt3']
// }).addTo(map);

//googleHybrid
// L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
// maxZoom: 20,
// subdomains:['mt0','mt1','mt2','mt3']
// }).addTo(map);

//satellite
L.tileLayer("http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}", {
  maxZoom: 20,
  subdomains: ["mt0", "mt1", "mt2", "mt3"],
}).addTo(map);

//Terrain
// L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}',{
// maxZoom: 20,
// subdomains:['mt0','mt1','mt2','mt3']
// }).addTo(map);;

// var marker = L.marker([-6.5962, 106.7906]).addTo(map);

// L.marker([-6.5962, 106.7906], {icon: com_centre}).addTo(map);

//menampilkan marker
var univIcon = L.icon({
  iconUrl: "/assets/icons/community_centre_blue.png",
  iconSize: [28, 28], // size of the icon
  shadowSize: [50, 64], // size of the shadow
  iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
  shadowAnchor: [4, 62], // the same for the shadow
  popupAnchor: [-3, -76], // point from which the popup should open relative to the iconAnchor
});
var koorUniv = L.marker(
  [parseFloat(-6.599684999999582), parseFloat(106.8120831996938)],
  {
    icon: univIcon,
  }
).addTo(map);

$(document).ready(function () {
  $.getJSON("/koordinatMap", function (result) {
    $.each(result.data_koordinat, function (index, value) {
      const namaTempat = value.nama_tempat;
      const latitude = value.latitude;
      const longitude = value.longitude;
      const image = value.image;

      var imageUrl = "/storage/" + image;
      // alert(namaTempat);
      console.log("latitude : " + latitude);
      console.log("image : " + image);

      //menampilkan marker
      var com_centre = L.icon({
        iconUrl: "/assets/icons/community_centre_blue.png",
        iconSize: [28, 28], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76], // point from which the popup should open relative to the iconAnchor
      });

      var html =
        "" +
        "<html>" +
        "    <head>" +
        "    <title>Your Title Here</title>" +
        "    </head>" +
        "" +
        '    <body bgcolor="FFFFFF">' +
        '        <center><img style="max-width: 200px;min-width: 200px;" src="' +
        imageUrl +
        '" align="bottom"> </center>' +
        "        <hr>" +
        '        <div class="container">' +
        '                <div class="row">' +
        '                        <div class="col-sm-12"><h5><b>' +
        namaTempat +
        "                        </b></h5></div>" +
        "                </div>" +
        '                <div class="row">' +
        '                        <div class="col-sm-4">' +
        "                               Longitude" +
        "                        </div>" +
        '                        <div class="col-sm-8">' +
        longitude +
        "                        </div>" +
        "                </div>" +
        '                <div class="row">' +
        '                        <div class="col-sm-4">' +
        "                                Latitude" +
        "                        </div>" +
        '                        <div class="col-sm-8">' +
        latitude +
        "                        </div>" +
        "                </div>" +
        '                <div class="row">' +
        '                        <div class="col-sm-12">' +
        "                        <br> <b><i>xxxxxxx xxxx xxxxx xxxxx xxxx xxx xxxx</i></b>" +
        "                        </div>" +
        "                </div>" +
        "        </div>" +
        "        <hr>" +
        "    </body>" +
        "</html>" +
        "";

      var koordinat = L.marker([parseFloat(longitude), parseFloat(latitude)], {
        icon: com_centre,
      })
        .addTo(map)
        .bindPopup(html);

      // zoom the map to the polyline
      // map.fitBounds(polyline.getBounds());
    });
  });
});
