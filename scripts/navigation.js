function toggleNav(){
    let navMenu = document.getElementById("navigation");
    if(navMenu.style.display == "none"){
        navMenu.style.display = "block";
        document.body.style.overflow = "hidden";
    }else{
        navMenu.style.display = "none";
        document.body.style.overflow = "scroll";
    }
}
