<?php
include '../inc/member.php';
include '../inc/dbconfig.php';

$mem = new Member($db);

$id     = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$email  = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';

if ($_POST['mode'] == 'id_chk') {

    if ($id == '') {
        die(json_encode(['result' => 'empty_id']));
    }

    if ($mem->id_exists($id)) {
        $arr = ['result' => 'fail'];
        $json = json_encode($arr);
        die($json); // -> echo "$json ; exit   
    } else {
        die(json_encode(['result' => 'success']));
    }
}

if ($_POST['mode'] == 'email_chk') {

    if ($email == '') {
        die(json_encode(['result' => 'empty_email']));
    }
    if ($mem->email_exists($email)) {
        $arr = ['result' => 'fail'];
        $json = json_encode($arr);
        die($json); // -> echo "$json ; exit   
    } else {
        die(json_encode(['result' => 'success']));
    }
}
