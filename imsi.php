<?php


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
