function navSlide(){
    var burger = document.querySelector(".burger-menu");
    var nav = document.querySelector(".nav-menu");
    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
    });
}

navSlide();

var faq = document.getElementsByClassName('content')
for(a of faq){
    a.addEventListener('click', function(){
        var icon = this.querySelector("i");
        icon.classList.toggle('fa-plus');
        icon.classList.toggle('fa-minus');

        this.classList.toggle('faq-active');
        
    })
  }




var cookieContainer = document.querySelector(".cookies-container");
var cookieBtn = document.querySelector(".cookie-btn");
cookieBtn.addEventListener("click",()=>{
    cookieContainer.classList.remove("active");
    localStorage.setItem("cookieBanner","true");
});
setTimeout(() => {
    if(!localStorage.getItem("cookieBanner")){
    cookieContainer.classList.add("active");
}
}, 2000); 