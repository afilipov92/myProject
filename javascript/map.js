(function () {
    function updateMarkerPosition(latLng) {
        $('#latitude').attr('value', latLng.lat());
        $('#longitude').attr('value', latLng.lng());
    }

    function initialize() {
        var myLatlng = new google.maps.LatLng(52.444287, 30.999960);
        var mapOptions = {
            zoom: 16,
            center: myLatlng,
            panControl: false,
            mapTypeControl: false,
            streetViewControl: false,
            scrollwheel: false,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        //обработка загрузки знаков на карту
        $(function () {
            /*$.get(window.URLS.MAP_POINTS, function(pointsArray) {
                $.each(pointsArray, function(key,point) {
                    addSign(point);
                });
            });*/
            $.ajax({
                url: window.URLS.MAP_POINTS,
                success: function(pointsArray) {
                    $.each(pointsArray, function(key,point) {
                        addSign(point);
                    });
                }
            });
        });

        function addSign(pointData) {
            var folder = pointData.number.substr(0, 1);
            var image = 'images/road_signs/' + folder + '/' + pointData.number + '.png';
            var myLatLng = new google.maps.LatLng(pointData.latitude, pointData.longitude);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            });
        }

        google.maps.event.addListener(map, 'rightclick', function (event) {
            $('#form-signs').show();
            placeMarker(event.latLng, map);
            setMarker(placeMarker.marker);
        });

        google.maps.event.addListener(map, 'click', function () {
            $('#form-signs').hide();
        });
    }

    function placeMarker(position, map) {
        if ('marker' in placeMarker) {
            alert('маркер уже есть!');
        }
        else {
            placeMarker.marker = new google.maps.Marker({
                position: position,
                map: map,
                draggable: true
            });
            map.panTo(position);
        }
        updateMarkerPosition(placeMarker.marker.getPosition());

        google.maps.event.addListener(placeMarker.marker, 'drag', function () {
            updateMarkerPosition(placeMarker.marker.getPosition());
        });

        google.maps.event.addListener(placeMarker.marker, 'dragend', function () {
            map.panTo(placeMarker.marker.getPosition());
        });

    }

    function setMarker(marker) {
        $('img').click(function () {
            var id = $(this).attr('id');
            $('#number').attr('value', id).focus();
            var folder = id.substr(0, 1);
            var image = 'images/road_signs/' + folder + '/' + id + '.png';
            var markerIcon = {
                scaledSize: new google.maps.Size(40, 40),
                url: image
            };
            marker.setIcon(markerIcon);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
})();







