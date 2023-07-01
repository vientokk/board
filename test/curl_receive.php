<?php

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$id = $_REQUEST['id'];



$data = array(
    'name' => $name,
    'email' => $email,
    'id' => $id,
    'code' => "1111"
);

echo json_encode($data);
//}
