document.addEventListener("DOMContentLoaded",()=>{

    const btn_id_check = document.getElementById("btn_id_check");
    btn_id_check.addEventListener("click",()=>{
        const f_id = document.getElementById("f_id");
        if(f_id.value==""){
            alert("아이디를 입력해주세요");
            f_id.focus();
            return false;
        }
        //AJAX
        const f1 = new FormData();
        f1.append('id', f_id.value);
        f1.append('mode', 'id_chk');
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./pg/member_process.php","true");
        xhr.send(f1);

        xhr.onload = () => {
            if(xhr.status == 200){
                const data = JSON.parse(xhr.responseText);
                if(data.result == 'success'){
                    alert("사용가능한 아이디입니다. ");
                    document.input_form.id_chk.value="1";
                }else if(data.result == 'fail'){
                    document.input_form.id_chk.value="0";
                    alert("사용중인 아이디입니다.");
                    f_id.value='';
                    f_id.focus();
                }
            }
        }
    });

})
