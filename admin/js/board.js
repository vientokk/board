document.addEventListener("DOMContentLoaded", () =>{

    const board_title = document.getElementById("board_title")
    const btn_board_create = document.getElementById("btn_board_create")
    
    btn_board_create.addEventListener("click", ()=>{
        if(board_title.value ==""){
            alert("게시판 이름을 입력해 주세요")
            board_title.focus();
            return false
        }

        const xhr = new XMLHttpRequest();
        const f = new FormData();
        f.append('board_title', board_title.value);
        f.append('board_type', document.getElementById("board_type").value)
        f.append('mode', 'input')

        xhr.open("POST","./pg/board_process.php", true)
        xhr.send(f);
        xhr.onload = ()=>{
            if(xhr.status == 200){
                alert("통신성공");
            }else{
                alert("통신실패"+xhr.status);
            }
        }
    })


    //게시판 생서 버튼 클릭
    const btn_create_modal = document.getElementById("btn_create_modal");
    btn_create_modal.addEventListener("click",()=>{ 
        board_title.value='';
    })


})