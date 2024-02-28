function switchTo(page){
    let page1 = document.getElementById("register1");
    let page2 = document.getElementById("register2");
    let page3 = document.getElementById("register3");
    
    if(page == 0){
        page1.style.display = "flex";
        page2.style.display = "none";
        page3.style.display = "none";
    }else if(page == 1){
        page1.style.display = "none";
        page2.style.display = "flex";
        page3.style.display = "none";
    }else if(page == 2){
        page1.style.display = "none";
        page2.style.display = "none";
        page3.style.display = "flex";
    }
}
