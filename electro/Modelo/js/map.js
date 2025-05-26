let mapOptions ={
    center:[4.65558, -74.08906],
    zoom:13
}

let map = new L.map('map' , mapOptions);

let layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

map.addLayer(layer);

let marker = null;

map.on('click' , (event) =>{
    if (marker != null){
        map.removeLayer(marker);
    }

    marker = L.marker([event.latlng.lat,event.latlng.lng]).addTo(map);

    document.getElementById('latitud').value = event.latlng.lat;
    document.getElementById('longitud').value = event.latlng.lng;
})




