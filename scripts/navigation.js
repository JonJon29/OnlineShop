function toggleNav(){
    let navMenu = document.getElementById("navigation");
    if(navMenu.style.display == "none"){
        navMenu.style.display = "flex";
        document.body.style.overflow = "hidden";
    }else{
        navMenu.style.display = "none";
        document.body.style.overflow = "scroll";
    }
}
