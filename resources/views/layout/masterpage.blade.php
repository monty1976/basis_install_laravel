<!doctype html>
<html lang="da">
    <head>
        <title>Master</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" type="text/css"/>
        
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var myLatlng = new google.maps.LatLng(55.708086, 12.5816459);

                var mapOptions = {
                    center: myLatlng,
                    zoom: 15,
                }
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body>
        <div class="container">
            @include('layout.partials.nav_login') 
        </div>
        
        @include('layout.partials.nav_menu')
        
        <div class="container">    
            @yield('content')
        </div>
        
        @include('layout.partials.footer')
    </body>
</html>

