<?php
//header("Content-Type: text/html; charset=UTF-8");

//echo "curl sample1<br>";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "http://cbtti.or.kr");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);

//echo "curl sample2<br>";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://phpschool.com");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// curl_close($ch);
//echo iconv('euc-kr', 'utf-8', $result);


print_r($_SERVER);


define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/board');
define('ADMIN_DIR', DOCUMENT_ROOT . '/admin');
define('DATA_DIR', DOCUMENT_ROOT . '/data');
define('PROFILE_DIR', DATA_DIR . '/profile');

echo DOCUMENT_ROOT . "<Br>";
echo ADMIN_DIR . "<Br>";
echo DATA_DIR . "<Br>";
echo PROFILE_DIR;
exit;

echo "<p> 날씨출력</p>";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://echo.jsontest.com/temerature/-9.3/humidity/0.40/wind/3");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

var_dump($result);
// $result = json_decode($result);
// print_r($result);
$arr = json_decode($result);
//echo $arr->wind;
foreach ($arr as $key => $var) {
    echo $key . " : " . $var;
    echo "<br>";
}





exit;


print_r(explode('.', '22.jpg'));

$aaa = explode('.', '22.jpg');
echo "<bR>";
$bbb = end($aaa);

echo $bbb;

exit;

//DB연결
include './inc/dbconfig.php';
include './inc/member.php';

$id = 'kki@kkid.com';

$mem = new Member($db);

if ($mem->email_exists($id)) {
    echo "중복id";
} else {
    echo "사용할 수 있는 아이디";
}
