
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
    marker = new google.maps.marker.AdvancedMarkerElement({
        position: Toyama,
        map: mapObj,
        title: "ここです"
    });


};

document.addEventListener('DOMContentLoaded', initMap);
