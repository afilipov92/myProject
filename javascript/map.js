(function () {
    //обновление долготы и широты в форме при перемещении знака
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

        //отображение знаков из бд
        function addSign(pointData) {
            var folder = pointData.number.substr(0, 1);
            var image = 'images/road_signs/' + folder + '/' + pointData.number + '.png' + '#id=' + pointData.id;
            var myLatLng = new google.maps.LatLng(pointData.latitude, pointData.longitude);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: {
                    url: image,
                    scaledSize: new google.maps.Size(40, 40),
                    size: new google.maps.Size(60,60),
                    origin: new google.maps.Point(-10,-10)
                },
                draggable: true,
                title: pointData.id
            });

            google.maps.event.addListener(marker, 'rightclick', function() {
                $('#id').attr('value', pointData.id);
                $('#number').attr('value', pointData.number);
                $('#latitude').attr('value', pointData.latitude);
                $('#longitude').attr('value', pointData.longitude);
                $('#rotation').attr('value', pointData.rotation);
                $('#form-signs').show();
                rotateAngle(pointData.rotation, marker.title);
                setMarker(marker);
            });

            google.maps.event.addListener(map, 'click', function () {
                rotateAngle(pointData.rotation, marker.title);
            });

            updateMarkerPosition(marker.getPosition());

            //изменение координат в форме при перетаскивании маркера
            google.maps.event.addListener(marker, 'drag', function () {
                updateMarkerPosition(marker.getPosition());
            });

            //устанавливает центр экрана по расположения маркера, после окончания перетаскивания
            google.maps.event.addListener(marker, 'dragend', function () {
                map.panTo(marker.getPosition());
            });
        }

        //отображение формы по клику правой кнопки мыши и установка маркера в этом месте
        google.maps.event.addListener(map, 'rightclick', function (event) {
            $('#id').attr('value', '');
            $('#number').attr('value', '');
            $('#rotation').attr('value', '0');
            $('#form-signs').show();
            placeMarker(event.latLng, map);
            setMarker(placeMarker.marker);
        });

        //спрятать форму по клику мыши
        google.maps.event.addListener(map, 'click', function () {
            $('#form-signs').hide();
        });
    }
    //устанавливает местоположение нового маркера(маркер можно перетаскивать)
    function placeMarker(position, map) {
        if ('marker' in placeMarker) {
            alert('маркер уже есть!');
        }
        else {
            placeMarker.marker = new google.maps.Marker({
                position: position,
                map: map,
                draggable: true,
                title: ''
            });
            map.panTo(position);
        }

        updateMarkerPosition(placeMarker.marker.getPosition());

        //изменение координат в форме при перетаскивании маркера
        google.maps.event.addListener(placeMarker.marker, 'drag', function () {
            updateMarkerPosition(placeMarker.marker.getPosition());
        });

        //устанавливает центр экрана по расположения маркера, после окончания перетаскивания
        google.maps.event.addListener(placeMarker.marker, 'dragend', function () {
            map.panTo(placeMarker.marker.getPosition());
        });

    }
    //изменения вида маркера по выбранному знаку
    function setMarker(marker) {
        $('img').click(function () {
            var id = $(this).attr('id');
            $('#number').attr('value', id).focus();
            var folder = id.substr(0, 1);
            var image = 'images/road_signs/' + folder + '/' + id + '.png' + '#id=' + marker.title;
            var markerIcon = {
                scaledSize: new google.maps.Size(40, 40),
                url: image
            };
            marker.setIcon(markerIcon);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
})();

document.onkeydown = function checkKeycode(event)
{
    var ob = $('#rotation');
    var angle;
    if(event.which == 67){
        angle = parseInt(ob.attr('value')) + 10;
    } else if (event.which == 90) {
        angle = parseInt(ob.attr('value')) - 10;
    }
    if(event.which == 90 || event.which == 67) {
        rotateAngle(angle, $('#id').attr('value'));
        ob.attr('value', angle);
    }
}

function rotateAngle(angle, id) {
    var rotate = "rotate(" + angle + "deg)";
    var a = "img[src$='id=" +  id + "']";
    $(a).css('transform', rotate);
}