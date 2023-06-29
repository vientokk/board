<?php
$g_title = "회원 가입을 축하드립니다.";

$js_array = ['js/member_success.js'];
$menu_code = 'member';
include './inc_header.php';
?>

<main class="w-75 mx-auto border rounded-5 p-5 d-flex gap-5" style="height: calc(100vh - 266px)">
    <img src="./images/logo.svg" class="w-50" alt="">
    <div>
        <h3>회원 가입을 축하드립니다.</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum laboriosam ex quaerat maxime rem aspernatur eligendi fugiat iure consequatur recusandae reiciendis, beatae odit at aut quis blanditiis modi exercitationem ducimus. </p>
        <button class="btn btn-primary" id="btn-login">로그인하기</button>
    </div>

</main>

<?php

include './inc_footer.php';
