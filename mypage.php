<?php
session_start();

$ses_id = (isset($_SESSION['ses_id']) &&  $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';



if ($ses_id == '') {

    echo "    
        <script>
        alert ('로그인 후 접근 가능한 메뉴입니다.');
        self.location.href = './index.php';
        </script>
    ";
}

include './inc/dbconfig.php';
include './inc/member.php';

$mem = new Member($db);
$memArr = $mem->getInfo($ses_id);

$js_array = ['./js/mypage.js'];
$g_title = 'MyPage';
include './inc_header.php';
?>
<!-- 다음 우편번호 -->
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<main class="w-50 mx-auto border rounded-5 p-5">
    <h1 class="text-center">회원정보수정</h1>
    <form name="input_form" method="post" enctype="multipart/form-data" autocomplete="off" action="./pg/member_process.php">

        <input type="hidden" name="mode" value="edit">
        <input type="hidden" name="email_chk" value="0"><!-- 이메일 중복확인 여부 -->
        <input type="hidden" name="old_email" value="<?= $memArr['email']; ?>"><!-- 이메일 수정확인 -->

        <div class="d-flex gap-2 align-items-end">
            <div>
                <label for="f_id" class="form-label">아이디</label>
                <input type="text" name="id" readonly class="form-control" id="f_id" value="<?= $memArr['id'] ?>">
            </div>
            <button type="button" class="btn btn-secondary" id="btn_id_check">아이디 중복확인</button>
        </div>

        <div class="mt-3 d-flex gap-2 align-items-end">
            <div>
                <label for="f_id" class="form-label">이름</label>
                <input type="text" name="name" class="form-control" id="f_name" value="<?= $memArr['name'] ?>">
            </div>
        </div>

        <div class="d-flex mt-3 gap-2 justify-content-between">
            <div class="w-50">
                <label for="f_password" class="form-label">비밀번호</label>
                <input type="password" name="password" class="form-control" id="f_password" placeholder="비밀번호를 입력해 주세요">
            </div>
            <div class="w-50">
                <label for="f_password2" class="form-label">비밀번호 확인</label>
                <input type="password" name="password2" class="form-control" id="f_password2" placeholder="비밀번호를 입력해 주세요">
            </div>
        </div>


        <div class="d-flex mt-3 gap-2 align-items-end">
            <div class="flex-grow-1">
                <label for="f_email" class="form-label">이메일</label>
                <input type="text" name="email" class="form-control" id="f_email" value="<?= $memArr['email'] ?>">
            </div>
            <button type="button" class="btn btn-secondary" id="btn_email_check">이메일 중복확인</button>
        </div>

        <div class="mt-3 d-flex  gap-2 align-items-end">
            <div>
                <label for="f_zipcode">우편번호</label>
                <input type="text" name="zipcode" id="f_zipcode" value="<?= $memArr['zipcode'] ?>" readonly class="form-control" maxlength="5" minlength="5" autocomplete="off">
            </div>
            <button type="button" class="btn btn-secondary" id="btn_zipcode">우편번호찾기</button>
        </div>

        <div class="d-flex mt-3 gap-2 justify-content-between">
            <div class="w-50">
                <label for="f_addr1" class="form-label">주소</label>
                <input type="text" class="form-control" name="addr1" id="f_addr1" value="<?= $memArr['addr1'] ?>" placeholder="">
            </div>
            <div class="w-50">
                <label for="f_addr2" class="form-label">상세주소</label>
                <input type="text" class="form-control" name="addr2" id="f_addr2" value="<?= $memArr['addr2'] ?>" placeholder="상세주소를 입력해 주세요">
            </div>
        </div>

        <div class="mt-3 d-flex gap-5">
            <div>
                <label for="f_photo" class="form-label">프로필이미지</label>
                <input type="file" name="photo" id="f_photo" class="form-control">
            </div>
            <?php if ($memArr['photo']) {
                echo '<img src=./data/profile/' . $memArr['photo'] . ' id="f_preview" class="w-25" alt="profile image">';
            } else {
                echo '<img src="./images/preson1.png" id="f_preview" class="w-25" alt="profile image">';
            } ?>

        </div>

        <div class="mt-3 d-flex gap-2">
            <button type="button" class="btn btn-primary w-50" id="btn_submit">수정확인</button>
            <button type="button" class="btn btn-secondary w-50">수정취소</button>
        </div>
    </form>
</main>




<?php
include './inc_footer.php';
?>