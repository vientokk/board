<?php

//DB연결
include './inc/dbconfig.php';
include './inc/member.php';

$id = 'kki';

$mem = new Member($db);

if ($mem->id_exists($id)) {
    echo "중복id";
} else {
    echo "사용할 수 있는 아이디";
}
