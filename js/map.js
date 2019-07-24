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
    let hives;
    let req = new XMLHttpRequest();
    
    if (complete_map) {
        req.open("GET", "api/hivesGET.php", true);
    } else if (account_map) {
        req.open("GET", "api/hivesGET_Account.php?userid=" + userid, true);
    };
    
    req.addEventListener("readystatechange", function() {
        if (this.status === 200 && this.readyState == 4) {
            
            hives = JSON.parse(req.responseText); 
            hiveMaker(hives);
        } else {
            console.log(this.status, this.readyState); 
        }
    })
    req.send(null);
    // Update lat/long value of div when anywhere in the map is clicked    
    google.maps.event.addListener(map,'click',function(event) {
        document.getElementById('hivelat').value = event.latLng.lat();
        document.getElementById('hivelng').value =  event.latLng.lng();
        
        var markerTemp = new google.maps.Marker({
            position: event.latLng, 
            map: map, 
            title: event.latLng.lat()+', '+event.latLng.lng()
        });
        
        
    });
    
                

    // Marker creation from req
    function hiveMaker(hives) {
        hives.forEach(function(hive) {
            console.log(hive)
            let marker = new google.maps.Marker({
                position : {lat: Number(hive.lat), lng: Number(hive.lng)},
                map : map,
                title : hive.name,
                address : hive.address,
            });
        });
    };
    

};
