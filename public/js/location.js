function getLocation(event){

    // event.preventDefault(); // フォームのデフォルトの送信を防ぐ
    //↑このコード書いたらなんか、めっちゃ送信が重くなる。。。

    if(navigator.geolocation){

        //位置情報を取得する
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

        function successCallback(position){
            var latitude = position.coords.latitude;
            document.getElementById('latitude').value = latitude;

            var longitude = position.coords.longitude;
            document.getElementById('longitude').value = longitude;

            document.getElementById('location-form').submit();
        }

        function errorCallback(error){
            alert('位置情報が取得できませんでした。');
        }

    };
};


// console.log(latitude);
// console.log(longitude);



