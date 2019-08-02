function initMap() {
    
    var account_map = document.getElementById('account_map');
    var complete_map = document.getElementById('map');
    var userid = document.getElementsByTagName('userid')[0].innerHTML;

    if (complete_map) {
        var map = new google.maps.Map(complete_map, {
            center: new google.maps.LatLng(47.212922, -1.555438),
            zoom: 12,
            disableDoubleClickZoom: true
        })
    } else if (account_map) {
        var map = new google.maps.Map(account_map, {
            center: new google.maps.LatLng(47.212922, -1.555438),
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

            if (complete_map) {
                let friends = getFriends();
                if (!friends[hive.account_id] && hive.private == 1){

                } else if ((friends[hive.account_id] && hive.private == 1) || (hive.private == 0)){
                    let marker = new google.maps.Marker({
                        position : {lat: Number(hive.lat), lng: Number(hive.lng)},
                        map : map,
                        title : hive.name,
                        hiveId : hive.id,
                        ownerId : hive.account_id,
                        owner : hive.owner,
                        address : hive.address,
                        icon: markerIconSelector(hive.account_id)
                        
                    });
                    marker.addListener("click", function(){
                    initOverlay(hive);
                    overlayToggle();
                    });
                }

            } else if (account_map) {
                let marker = new google.maps.Marker({
                    position : {lat: Number(hive.lat), lng: Number(hive.lng)},
                    map : map,
                    title : hive.name,
                    hiveId : hive.id,
                    ownerId : hive.account_id,
                    owner : hive.owner,
                    address : hive.address,
                    icon: markerIconSelector(hive.account_id)
                    
                });
                marker.addListener("click", function(){
                initOverlay(hive);
                overlayToggle();
                });
            };
            
        
        });
    };



    function getFriends(){
        let friends = document.querySelectorAll("friend");
        let friendsObj = {};
        for (let friend of friends) {
            friendsObj[friend.innerHTML] = true;
        }
        return friendsObj;
    }

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

    let hiveIdElt = document.createElement("h3");
    hiveIdElt.id = "map_overlay_hiveId";
    hiveIdElt.textContent = "(hiveID#" + hive.id + ")";

    let contentDivElt = document.createElement("div");
    contentDivElt.id = "map_overlay_contentDiv";

    let addressElt = document.createElement("p");
    addressElt.id = "map_overlay_address";
    addressElt.textContent = "Addresse : " + hive.address;

    let ownerElt = document.createElement("p");
    ownerElt.id = "map_overlay_owner";
    if (complete_map) {
        ownerElt.textContent = "Propriétaire : " + hive.owner;
    } else if (account_map) {
        ownerElt.textContent = "Propriétaire : vous";
    };
    

    let incidentDivElt = document.createElement("div");
    incidentDivElt.id = "map_overlay_incidentDiv";

    let incidentImgElt = document.createElement("img");
    incidentImgElt.id = "map_overlay_incidentIMG";
    incidentImgElt.src = "css/media/warning.png";

    let incidentButtonElt = document.createElement("button");
    incidentButtonElt.id = "map_overlay_incidentButton";
    incidentButtonElt.textContent = "Signaler un incident";

    incidentButtonElt.addEventListener("click", function(){
        let overlayContent = document.getElementById("map_overlay_contentDiv");

        let incidentFormElt = document.createElement("form");
        incidentFormElt.id = "incidentForm";
        incidentFormElt.action = "index.php?action=hiveMap_CreateIncident&Hive=" + hive.id + "&Owner=" + hive.account_id;
        incidentFormElt.method = "post";

        let incidentFormPElt = document.createElement("p");
        incidentFormPElt.id = "incidentFormP";
        incidentFormPElt.textContent = "Décrivez le probleme:";

        let incidentFormTextAreaElt = document.createElement("textarea");
        incidentFormTextAreaElt.id = "incidentFormInput";
        incidentFormTextAreaElt.type = "text";
        incidentFormTextAreaElt.name = "incident";
        incidentFormTextAreaElt.maxlength = "255";

        let incidentConfirmButtonElt = document.createElement("input");
        incidentConfirmButtonElt.id = "map_overlay_incidentConfirmationButton";
        incidentConfirmButtonElt.type = "submit";
        incidentConfirmButtonElt.value = "Confirmer";

        while (overlayContent.hasChildNodes()) {   
            overlayContent.removeChild(overlayContent.firstChild);
        }
        contentDivElt.appendChild(incidentFormElt);
        incidentFormElt.appendChild(incidentFormPElt);
        incidentFormElt.appendChild(incidentFormTextAreaElt);
        incidentFormElt.appendChild(incidentImgElt);
        incidentFormElt.appendChild(incidentConfirmButtonElt);
    });
    
    sectionMapOverlayElt.innerHTML = "";
    sectionMapOverlayElt.appendChild(titleDivElt);
    titleDivElt.appendChild(hiveLogoElt); 
    titleDivElt.appendChild(titleElt);
    titleDivElt.appendChild(hiveIdElt);
    sectionMapOverlayElt.appendChild(contentDivElt);
    contentDivElt.appendChild(addressElt);
    contentDivElt.appendChild(ownerElt);
    if (complete_map) {
        contentDivElt.appendChild(incidentImgElt);
        contentDivElt.appendChild(incidentButtonElt);
    } else if (account_map) {
        
    };


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
};
}