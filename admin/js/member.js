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

})