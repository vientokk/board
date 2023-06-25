<?php
include '../inc/member.php';
include '../inc/dbconfig.php';

$mem = new Member($db);

$id       = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$email    = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';
$name     = (isset($_POST['name']) && $_POST['name'] != '') ? $_POST['name'] : '';
$password = (isset($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : '';
$zipcode  = (isset($_POST['zipcode']) && $_POST['zipcode'] != '') ? $_POST['zipcode'] : '';
$addr1    = (isset($_POST['addr1']) && $_POST['addr1'] != '') ? $_POST['addr1'] : '';
$addr2    = (isset($_POST['addr2']) && $_POST['addr2'] != '') ? $_POST['addr2'] : '';


$mode  = (isset($_POST['mode']) && $_POST['mode'] != '') ? $_POST['mode'] : '';

//아이디 중복확인
if ($mode == 'id_chk') {

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
//이메일 중복확인
if ($mode == 'email_chk') {

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

//이메일 중복확인
if ($mode == 'input') {
    $arr = [
        'id' => $id,
        'email' => $email,
        'password' => $password,
        'name' => $name,
        'zipcode' => $zipcode,
        'addr1' => $addr1,
        'addr2' => $addr2
    ];

    $mem->input($arr);
}
