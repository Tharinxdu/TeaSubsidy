function check_width(x){
    if(x.matches){
        //less than 938px
        Menu_Nav.style.display = "flex";
        Nav.style.display = "none";
    }
    else{
        Menu_Nav.style.display = "none";
        Nav.style.display = "flex";
    }
}

let Menu_Nav = document.querySelector(".menu");
let Menu = document.querySelector(".menu img");
let Nav = document.querySelector("div.nav");

let width = window.matchMedia("(max-width: 938px)");
check_width(width);
width.addListener(check_width);

Menu.addEventListener('click' , ()=>{
    if(Nav.style.display == "none"){
        Nav.style.display = "flex";
    }
    else{
        Menu_Nav.style.display = "flex";
        Nav.style.display = "none";
    }

})