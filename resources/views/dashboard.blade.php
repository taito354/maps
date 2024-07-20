<x-app-layout>

        {{-- GoogleMapをAPIを使って表示させます --}}
        <div id="map" style=""></div>

        <style>
            #map{
                width: 80%;
                margin: 0 auto;
                height: 600px;
            }
        </style>

        <script src="{{ asset('js/result.js') }}"></script>
        {{-- googlemap APIの読み込み --}}
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ env("GOOGLE_MAPS_API_KEY") }}&callback=initMap" async defer></script>
</x-app-layout>
