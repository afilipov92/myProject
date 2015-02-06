var initialize = (function (){
    var myLatlng = new google.maps.LatLng(52.444287, 30.999960);
    var mapOptions = {
        zoom: 16,
        center: myLatlng,
        panControl: false,
        mapTypeControl: false,
        streetViewControl: false,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
});
google.maps.event.addDomListener(window, 'load', initialize);
