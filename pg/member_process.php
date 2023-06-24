<?php
include '../inc/member.php';
include '../inc/dbconfig.php';

$mem = new Member($db);

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';

if ($_POST['mode'] == 'id_chk') {
    if ($mem->id_exists($id)) {
        $arr = ['result' => 'fail'];
        $json = json_encode($arr);
        die($json); // -> echo "$json ; exit   
    } else {
        die(json_encode(['result' => 'success']));
    }
}
