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
            marker.setIcon(image);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
})();


$(function () {
    $(".extremum-click").click(function () {
        $(".extremum-slide").hide();
        $(this).siblings(".extremum-slide").slideToggle("slow");
        $('#map-canvas').css('height', '120%');
    });
});

//обработка загрузки знаков на карту
$(function () {
    window.onload = function () {

    }
});

//обработка форм
$(function () {
    $('#form').submit(function (event) {
        var form = $(this);
        //отмена стандартного действия при отправке формы
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: window.location.href,
            data: form.serialize(),
            success: function (result) {
                if (result.indexOf('alert-warning') >= 0) {
                    $(result).prependTo(form.parent());
                    form.remove();
                } else {
                    window.location.reload();
                }
            }
        });
    });
});







