document.addEventListener("DOMContentLoaded", () =>{
    const btn_search = document.getElementById("btn_search");
    btn_search.addEventListener("click", ()=>{
        const sf = document.querySelector("#sf");
        if (sf.value == ''){
            alert("검색어를 입력하세요");
            sf.focus();
            return false;
        }
        const sn = document.getElementById("sn");
        self.location.href='./member.php?sn='+sn.value+'&sf='+sf.value;
    });

    const btn_all = document.getElementById("btn_all");
    btn_all.addEventListener("click",()=>{
        self.location.href='./member.php';
    });

    //엑셀로 저장
    const btn_excel = document.getElementById("btn_excel");
    btn_excel.addEventListener("click", () =>{
        self.location.href="./member_to_excel.php";
    })

    //삭제버튼
    const btn_mem_delete = document.querySelectorAll(".btn_mem_delete");
    btn_mem_delete.forEach((box)=>{
        box.addEventListener("click", ()=>{
            if(confirm("회원삭제하시겠습니까?")){
                const idx = box.dataset.idx;
                //self.location.href=  './delete.php?idx='+idx;
                const xhr = new XMLHttpRequest();

                const f= new FormData();
                f.append("idx", idx);
                xhr.open("POST", "./member_del.php", "true");
                xhr.send(f);
                xhr.onload=()=>{
                    if(xhr.status == 200){
                        const data = JSON.parse(xhr.responseText);
                        if (data.result == 'success'){
                            self.location.reload();
                        }
                    }else{
                        alert("통신실패");
                    }
                }
            }else{
                alert("삭제취소");
            }
        })
    })

})