<x-app-layout>


    <div class="container">
        <div class="row">
            <div class="col-md-9">
                {{-- GoogleMapをAPIを使って表示させます --}}
                <div id="map" style=""></div>

                <style>
                    #map{
                        width: 80%;
                        margin: 0 auto;
                        height: 600px;
                    }
                </style>
            </div>

            <div class="col-md-3">
                <div class="card card-style">
                    <div class="card-header">
                      情報を提供する
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.store') }}" method="post" id="location-form">
                            @csrf
                            <div class="mb-3">
                                <label for="amount" class="form-label">量を選択</label>
                                <select class="form-select" id="amount" name="amount">
                                    <option value="0" selected>0杯</option>
                                    <option value="1">~10杯</option>
                                    <option value="2">~100杯</option>
                                    <option value="3">〜1,000杯</option>
                                    <option value="4">〜10,000杯</option>
                                    <option value="5">爆湧き</option>
                                </select>
                            </div>

                            <input type="hidden" id="latitude" name="latitude" required>
                            <input type="hidden" id="longitude" name="longitude" required>

                            <button type="button" class="btn btn-primary" onclick="getLocation(event)">送信</button>
                            {{-- <input type="submit" class="btn btn-primary" value="送信" onclick="getLocation(event)"> --}}
                        </form>
                    </div>
                  </div>
            </div>

        </div><!--div.row-->
    </div><!--div.container-->

        <style>
            .card-style{
                margin-top: 150px;
            }
        </style>

        <script src="{{ asset('js/location.js') }}"></script>
        <script src="{{ asset('js/result.js') }}"></script>


        <script>
            window.locations = @json($data);
            console.log(window.locations);
        </script>

        {{-- googlemap APIの読み込み --}}
        <script async defer src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ env("GOOGLE_MAPS_API_KEY") }}&callback=initMap&libraries=marker"></script>
        {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env("GOOGLE_MAPS_API_KEY") }}&callback=initMap&libraries=marker&v=beta"></script> --}}
</x-app-layout>
