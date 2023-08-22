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

//popup-onclick
// L.marker([-6.5962, 106.7906], {icon: com_centre}).addTo(map).bindPopup("Bla");
// var marker = L.marker([-6.5962, 106.7906], {icon: com_centre}).addTo(map).on('click', function(e){
//     alert('bla');
// });

// membuat polygon sesuai titik yang di pilih, untuk mencari long lat bisa menggunakan : http://geojson.io/
var latlngs = [
  [
    -6.59459794263212, //lat
    106.79472688142391, //long
  ],
  [
    -6.596934996411832, //lat
    106.79385090395402, //long
  ],
  [-6.601261003038303, 106.79512732826743],
  [-6.604020677173921, 106.79630364087137],
  [-6.602827306462572, 106.79813067959424],
  [-6.602230620027939, 106.80008285795492],
  [-6.601857690640671, 106.80303615342513],
];

var polyline = L.polyline(latlngs, { color: "red" }).addTo(map);
polyline.setStyle({
  color: "red",
  weight: 15,
});

// zoom the map to the polyline
map.fitBounds(polyline.getBounds());

//popuponlick
// L.polyline(latlngs, {color: 'red'}).addTo(map).bindPopup("Bla2");
polyline.on("click", (e) => {
  // polyline.setStyle({
  //     color: 'yellow'
  // })
  alert("Ini Polygon");
});

//polygon
// create a red polygon from an array of LatLng points
var latlngs = [
  [
    -6.595556814891239, //lat
    106.79720857378226, //long
  ],
  [-6.596758160199045, 106.79623677416146],
  [-6.596843970466338, 106.79824516004345],
  [-6.595556814891239, 106.79720857378226],
];

var polygon = L.polygon(latlngs, { color: "red" }).addTo(map);
polygon.setStyle({
  color: "yellow",
  fillColor: "white",
  weight: 2,
  lineCap: "round",
});

// zoom the map to the polygon
map.fitBounds(polygon.getBounds());

// A $( document ).ready() block.
$(document).ready(function () {
  $.getJSON("/koordinatMap", function (result) {
    $.each(result.data_koordinat, function (index, value) {
      const namaTempat = value.nama_tempat;
      const latitude = value.latitude;
      const longitude = value.longitude;
      // alert(namaTempat);
      console.log("latitude : " + latitude);
      console.log("latitude : " + latitude);

      //menampilkan marker
      var com_centre = L.icon({
        iconUrl: "/assets/icons/community_centre_blue.png",
        iconSize: [28, 28], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76], // point from which the popup should open relative to the iconAnchor
      });

      var html = "<h5>Nama Lokasi : " + namaTempat + "</h5>";

      L.marker([parseFloat(longitude), parseFloat(latitude)], {
        icon: com_centre,
      })
        .addTo(map)
        .bindPopup(html);
      // .on("click", function (e) {
      //   L.popup()
      //     .setLatLng([parseFloat(longitude), parseFloat(latitude)])
      //     .setContent(html)
      //     .openOn(map);
      // });
    });
  });
});
