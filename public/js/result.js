
//APIから呼び出されるコールバック関数initMapを定義します
function initMap(){

    map = document.getElementById('map');

    //地図のデフォルトの表示の中心は富山湾の真ん中らへんにしておく(緯度経度を登録しておく)
    let Toyama = {lat: 36.868911, lng: 137.214856};
    opt = {
        zoom:11,
        center: Toyama,
        mapId: "fd45b36da25d0d7b"
    };

    // mapのインスタンスを生成
    mapObj = new google.maps.Map(map, opt);

    //マーカーを生成
    if(window.locations && Array.isArray(window.locations)){
        window.locations.forEach(location => {

            const position = new google.maps.LatLng(location.latitude, location.longitude);


            //amountの大きさを応じて、ピンのサイズを変更
            let pinSize = "";

            if(location.amount === "0杯"){
                pinSize = new google.maps.marker.PinElement({
                    scale : 0
                });
            }else if(location.amount === "~10杯"){
                pinSize = new google.maps.marker.PinElement({
                    scale : 0.5
                });
            }else if(location.amount === "~100杯"){
                pinSize = new google.maps.marker.PinElement({
                    scale : 1.0
                });
            }else if(location.amount === "~1,000杯"){
                pinSize = new google.maps.marker.PinElement({
                    scale : 1.5
                });
            }else if(location.amount === "~10,000杯"){
                pinSize = new google.maps.marker.PinElement({
                    scale : 2.0
                });
            }else if(location.amount === "爆湧き"){
                pinSize = new google.maps.marker.PinElement({
                    scale : 3.0
                });
            }


            new google.maps.marker.AdvancedMarkerElement({
                position: position,
                map: mapObj,
                content: pinSize.element
            });
        });
    };

};

// document.addEventListener('DOMContentLoaded', initMap);
