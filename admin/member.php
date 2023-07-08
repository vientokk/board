<?php
$g_title = "vientokk 게시판";

$js_array = ['js/home.js'];
$menu_code = 'member';
include './inc_common.php';
include './inc_header.php';
include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);
$memArr = $mem->list();
?>

<main class="w-75 mx-auto border rounded-5 p-5" style="height: calc(100vh - 266px)">
    <div class="container">
        <h3>회원관리</h3>
    </div>

    <table class="table table-border">
        <tr>
            <th>번호</th>
            <th>아이디</th>
            <th>이름</th>
            <th>이메일</th>
            <th>등록일시</th>
            <th>관리</th>
        </tr>
        <?php foreach ($memArr as $row) {
            //$row['create_at'] = substr($row['create_at'], 0, 16);   //yyyy-mm-dd hh:mm 형식으로 변경
        ?>
            <tr>
                <td><?= $row['idx'] ?></td>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['create_at'] ?></td>
                <td> <button class="btn btn-primary btn-sm">수정</button> </td>
                <td> <button class="btn btn-danger btn-sm">삭제</button> </td>
            </tr>
        <?php
        }
        ?>


    </table>
</main>
<?php

include './inc_footer.php';
