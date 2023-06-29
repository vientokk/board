document.addEventListener("DOMContentLoaded",()=>{
    const btn_login = document.getElementById("btn_login");
    btn_login.addEventListener("click",()=>{
        const f_id = document.getElementById("f_id");
        if(f_id.value == ''){
            alert("아이디입력하세요");
            f_id.focus();
            return false
        }
        const f_pw = document.getElementById("f_pw");
        if(f_pw.value == ''){
            alert("비밀번호 입력하세요");
            f_pw.focus();
            return false
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./pg/login_process.php", "true");

        const f1 = new FormData()
        f1.append("id", f_id.value);
        f1.append("pw", f_pw.value);

        xhr.send(f1);

        xhr.onload = ()=>{
            if(xhr.status == 200){
                // console.log(xhr.responseText);
                 const data = JSON.parse(xhr.responseText);
                // console.log(data);

                if(data.result == 'login_fail'){
                    alert("해당 정보는 존재하지 않습니다.");
                    f_id.value="";
                    f_pw.value="";
                    f_id.focus();
                    return false;
                }else if(data.result =="login_success"){
                    alert("로그인 성공");
                    self.location.href='./member.php';
                } 
            }else{
                alert("통신실패!! 다시시도해주세요");
            }
        }

        
    })
})