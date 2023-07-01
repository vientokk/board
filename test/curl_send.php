<?php
// 전송할 데이터 설정
$data = array(
    'name' => 'kki',
    'email' => 'kki@kki.com',
    'id' => 'vientokk'
);

$url = 'http://localhost:8088/test/curl_receive.php'; // 수신측 주소

// cURL 초기화
$curl = curl_init();

// cURL 옵션 설정
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 데이터 전송 및 응답 받기
$response = curl_exec($curl);
curl_close($curl);

// 응답 결과 확인
if ($response === false) {
    echo 'cURL Error: ' . curl_error($curl);
} else {
    echo ($response);
    echo "<br>";
    print_r(json_decode($response));

    echo "<br>";


    $arr = json_decode($response);
    foreach ($arr as $key => $var) {
        echo $key . " : " . $var;
        echo "<br>";
    }

    echo "<br>";
    echo $arr->id;
}
