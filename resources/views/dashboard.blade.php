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
                <div class="card">
                    <div class="card-header">
                      情報を提供する
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="amount" class="form-label">量を選択</label>
                                <select class="form-select" id="amount" name="amount">
                                    <option value="0" selected>0杯</option>
                                    <option value="1">~10杯</option>
                                    <option value="2">~100杯</option>
                                    <option value="3">〜1,000杯</option>
                                    <option value="4">〜10,000杯</option>
                                    <option value="5">計算不能(爆湧き)</option>
                                </select>
                            </div>

                            <input type="submit" class="btn btn-primary" value="送信">
                        </form>
                    </div>
                  </div>
            </div>

        </div><!--div.row-->
    </div><!--div.container-->


        <script src="{{ asset('js/result.js') }}"></script>
        {{-- googlemap APIの読み込み --}}
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ env("GOOGLE_MAPS_API_KEY") }}&callback=initMap" async defer></script>
</x-app-layout>
