<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Route') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <div style="height: 70vh" id="mapContainer"></div>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
    <script>
        var platform = new H.service.Platform({
            'apikey': '1p_UeicBO5_NglM9ZHfrMzenstR-JCHJwHUrj2Ly6pY'
        });

        // Get the default map types from the Platform object:
        var defaultLayers = platform.createDefaultLayers();

        // Instantiate the map:
        var map = new H.Map(
            document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map,
            {
                zoom: 16,
                center: { lat: 3.543085566336723, lng: 103.42744060060862 }
            });

        // Create the default UI:
        var ui = H.ui.UI.createDefault(map, defaultLayers);

        var car_svg='<svg width="24" height="24" ' +
                'xmlns="http://www.w3.org/2000/svg">' +
                '<rect stroke="white" fill="#1b468d" x="1" y="1" width="22" ' +
                'height="22" /><text x="12" y="18" font-size="12pt" ' +
                'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
                'fill="white">H</text></svg>';
        @foreach ($detections as $detection)
            var icon = new H.map.DomIcon(car_svg),
            coords = {lat: {{ $detection->camera->latitude }}, lng: {{ $detection->camera->longitude }}},
            marker = new H.map.DomMarker(coords, {icon: icon});
            map.addObject(marker);
            map.setCenter(coords);
        @endforeach

    </script>
</x-app-layout>
