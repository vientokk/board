document.addEventListener("DOMContentLoaded",()=>{
 

    //이메일 중복체크
    const btn_email_check = document.getElementById("btn_email_check");
    btn_email_check.addEventListener("click",()=>{
        const f_email = document.getElementById("f_email");
        if(f_email.value==""){
            alert("이메일를 입력해주세요");
            f_email.focus();
            return false;
        }

        if(document.input_form.old_email.value == f_email.value){
            alert("이메일을 변경하지 않으셨습니다.");
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
                }else if(data.result == 'email_format_wrong') {
                    alert('이메일이 형식에 맞지 않습니다.')
                    f_email.value = ''
                    f_email.focus()
                }
            }
        }
    });    

    //가입 버튼 클릭
    //const btn_submit = document.querySelector("#btn_submit");
    const btn_submit = document.getElementById("btn_submit");
    btn_submit.addEventListener("click" , () =>{
 
        const f = document.input_form;
        //이름 확인
        if(f.name.value==""){
            alert("이름을 입력해주세요");
            f.name.focus();
            return false;
        }  

        //비밀번호 확인
        if(f.password.value !='' && f.password2.value ==''){
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
        //이메일 입력확인        
        if(f.email.value==''){
            alert("이메일을 입력해주세요");
            f.email.focus();
            return false;
        }

        //이메일을 변경했다면
        if(f.old_email.value != f.email.value){
            if(f.email_chk.value ==0){
                alert("이메일을 중복확인후 진행하세요.");
                return false;
            }
        }
        

        //우편번호 입력확인
        if(f.zipcode.value ==''){
            alert("우편번호 입력후 진행하세요.");
            return false;
        }
        if(f.addr1.value ==''){
            alert("주소 입력후 진행하세요.");
            f.addr1.focus();
            return false;
        }
        if(f.addr2.value ==''){
            alert("상세주소 입력후 진행하세요.");
            f.addr2.focus();
            return false;
        }

        f.submit();

    })

    //우편번호 찾기 
    const btn_zipcode = document.getElementById("btn_zipcode");
    btn_zipcode.addEventListener("click",()=>{            
        new daum.Postcode({
            oncomplete: function(data) {
                //console.log(data);
                let addr = '';
                let extra_addr = '';
                if(data.userSelectedType=="J") {
                    addr = data.jibunAddress
                }else if(data.userSelectedType =="R"){
                    addr = data.roadAddress
                } 
                if(data.bname != ''){
                    extra_addr = data.bname;                                        
                }

                if(data.buildingName != ''){                     
                    if(extra_addr == ''){                        
                        extra_addr = data.buildingName;
                    }else{                        
                        extra_addr += ', ' + data.buildingName;
                    }                    
                }

                if(extra_addr != ''){
                    extra_addr = '(' + extra_addr + ')'
                }

                const f_addr1 = document.querySelector("#f_addr1");
                f_addr1.value = addr + extra_addr;

                const f_zipcode = document.querySelector("#f_zipcode");
                f_zipcode.value = data.zonecode;

                const f_addr2 = document.getElementById("f_addr2");
                f_addr2.focus()
            }
        }).open(); 
    });

    //프로필 이미지
    const f_photo = document.querySelector("#f_photo");
    f_photo.addEventListener("change",(e)=>{
        //console.log(e);
        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);

        reader.onload = function(event){
            //console.log(event);
            // const img = document.createElement("img");
            // img.setAttribute("src", event.tartet.result);
            // document.querySelector("#f_preview").appendChild(img);
            const f_preview = document.querySelector("#f_preview");
            f_preview.setAttribute("src", event.target.result);
        }
    });


    
    const btn_cancel = document.getElementById("btn_cancel");
    btn_cancel.addEventListener("click" , () =>{                
        alert('취소하였습니다.');
        self.location.href='./index.php'
    });

})

