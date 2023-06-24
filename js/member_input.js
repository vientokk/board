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
                }else if(data.result == 'empty_id'){
                    document.input_form.id_chk.value="0";
                    alert("아이디를 입력해주세요");                    
                    f_id.focus();
                }
            }
        }
    });


    //이메일 중복체크
    const btn_email_check = document.getElementById("btn_email_check");
    btn_email_check.addEventListener("click",()=>{
        const f_email = document.getElementById("f_email");
        if(f_email.value==""){
            alert("이메일를 입력해주세요");
            f_email.focus();
            return false;
        }
        //AJAX
        const f1 = new FormData();
        f1.append('email', f_email.value);
        f1.append('mode', 'email_chk');
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./pg/member_process.php","true");
        xhr.send(f1);

        xhr.onload = () => {
            if(xhr.status == 200){
                const data = JSON.parse(xhr.responseText);
                if(data.result == 'success'){
                    alert("사용가능한 이메일입니다. ");
                    document.input_form.email_chk.value="1";
                }else if(data.result == 'fail'){
                    document.input_form.email_chk.value="0";
                    alert("사용중인 이메일입니다.");
                    f_email.value='';
                    f_email.focus();
                }else if(data.result == 'empty_email'){
                    document.input_form.email_chk.value="0";
                    alert("이메일를 입력해주세요");                    
                    f_email.focus();
                }
            }
        }
    });    

    //가입 버튼 클릭
    //const btn_submit = document.querySelector("#btn_submit");
    const btn_submit = document.getElementById("btn_submit");
    btn_submit.addEventListener("click" , () =>{

        const f=document.input_form;
        if(f.id.value==""){
            alert("아이디를 입력해주세요ㄴ");
            f.id.focus();
            return false;
        }
        
        if(f.id_chk.value=="0"){
            alert("아이디 중복확인후 진행하세요");
            return false;
        }

    //비밀번호 확인
    if(f.password.value ==''){
        alert("비밀번호 입력하세요");
        f.password.focus();
        return false;
    }
    if(f.password2.value ==''){
        alert("확인용 비밀번호 입력하세요");
        f.password2.focus();
        return false;
    }

    //비밀번호 일치여부 확인
    if(f.password.value != f.password2.value){
        alert('비밀번호가 일치하지 않습니다.');
        f.password.value ='';
        f.password2.value ='';
        f.password.focus();
        return false;
    }


    })


})
