function initMap() {
    
    var account_map = document.getElementById('account_map');
    var complete_map = document.getElementById('map');
    var userid = document.getElementsByTagName('userid')[0].innerHTML;

    if (complete_map) {
        var map = new google.maps.Map(complete_map, {
            center: new google.maps.LatLng(-33.863276, 151.207977),
            zoom: 12,
            disableDoubleClickZoom: true
        })
    } else if (account_map) {
        var map = new google.maps.Map(account_map, {
            center: new google.maps.LatLng(-33.863276, 151.207977),
            zoom: 12,
            disableDoubleClickZoom: true
        })
    };

    var infoWindow = new google.maps.InfoWindow;

    // Hives request
    let hives = [];
    let req = new XMLHttpRequest();
    
    if (complete_map) {
        req.open("GET", "api/hivesGET.php", true);
    } else if (account_map) {
        req.open("GET", "api/hivesGET_Account.php?userid=" + userid, true);
    };
    
    req.addEventListener("readystatechange", function() {
        if (this.status === 200 && this.readyState == 4) {
            console.log(req.responseText);
            hives = JSON.parse(req.responseText); 
            hiveMaker(hives);
        } else {
            console.log(this.status, this.readyState); 
        }
    })
    req.send(null);
    
    // Update lat/lo value of div when anywhere in the map is clicked    
    google.maps.event.addListener(map,'click',function(event) {
        
        var hiveLat = document.getElementById('hivelat');
        var hiveLng = document.getElementById('hivelng');

        if (hiveLat) {
            document.getElementById('hivelat').value = event.latLng.lat();
            document.getElementById('hivelng').value =  event.latLng.lng();
            var markerTemp = new google.maps.Marker({
                position: event.latLng, 
                map: map, 
                title: event.latLng.lat()+', '+event.latLng.lng()
            })
        }
    });
    
                

    // Marker creation from req
    function hiveMaker(hives) {
        hives.forEach(function(hive) {
            console.log(hive)
            let marker = new google.maps.Marker({
                position : {lat: Number(hive.lat), lng: Number(hive.lng)},
                map : map,
                title : hive.name,
                ownerId : hive.account_id,
                owner : hive.owner,
                address : hive.address,
                icon: markerIconSelector(hive.account_id)
            });
            // Click on marker brings overlay
            marker.addListener("click", function(){
                initOverlay(hive);
                overlayToggle(); // Overlay ON
        });
    });
    

};

// Map hive overlay
overlayToggle();
function initOverlay(hive) 
{
    let sectionMapOverlayElt = document.getElementById("map_overlay");

    let titleDivElt = document.createElement("div");
    titleDivElt.id = "map_overlay_titleDiv";

    let hiveLogoElt = document.createElement("img");
    hiveLogoElt.id = "hiveLogo";
    hiveLogoElt.src = markerIconSelector(hive.account_id);

    let titleElt = document.createElement("h2");
    titleElt.id = "map_overlay_title";
    titleElt.textContent = hive.name;

    let addressElt = document.createElement("p");
    addressElt.id = "map_overlay_address";
    addressElt.textContent = "Addresse : " + hive.address;

    let ownerElt = document.createElement("p");
    ownerElt.id = "map_overlay_address";
    ownerElt.textContent = "Propriétaire : " + hive.owner;

/*     let bikesElt = document.createElement("p");
    bikesElt.id = "section_map_overlay_available_bikes";
    bikesElt.textContent = "Nombre de vélos libres : " + marker.available_bikes + "/" + marker.total_bikes; */

/*     let buttonElt = document.createElement("button");
    buttonElt.id = "section_map_overlay_reservation_button";
    buttonElt.textContent = "RESERVER"; */
    
    // Reservation button color coding
/*     if (marker.available_bikes > 0) {
        buttonElt.style.backgroundColor = "green";
    } else {
        buttonElt.style.backgroundColor = "red";
    } */

    // Button authorize reservation if possible
/*     buttonElt.addEventListener("click", function(){
        if (marker.available_bikes < 1) {
            alert("Cette station n'a plus de vélos disponibles (" + marker.available_bikes + "/" + marker.total_bikes + ")");
        } else {
            console.log("Reservation demandée");
            document.getElementById("section_reservation").innerHTML = "";
            canvas = new Canvas("section_reservation");
            let form = new Form("section_reservation");
        }
    }); */
    
    sectionMapOverlayElt.innerHTML = "";
    sectionMapOverlayElt.appendChild(titleDivElt);
    titleDivElt.appendChild(hiveLogoElt); 
    titleDivElt.appendChild(titleElt);
    sectionMapOverlayElt.appendChild(addressElt);
    sectionMapOverlayElt.appendChild(ownerElt);
/*     sectionMapOverlayElt.appendChild(bikesElt);
    sectionMapOverlayElt.appendChild(buttonElt); */
};
function markerIconSelector(hiveId)
{
    if (hiveId == userid) 
    {
        return "css/media/hive_marker_own.png";
    } else {
        return "css/media/hive_marker.png";
    }
}

//overlay toggler
function overlayToggle()
{
    let overlayPanelElt = document.getElementById("map_overlay");
    if (overlayPanelElt.classList.contains('display_none')) {
        overlayPanelElt.classList.remove('display_none');
      } else {
        overlayPanelElt.classList.add('display_none');
      }
}};
