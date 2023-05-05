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

var btc = document.getElementById("bitcoin_2");
var nem = document.getElementById("nem_2");
var eth = document.getElementById("ethereum_2");
var mon = document.getElementById("monero_2");
var lite = document.getElementById("litecoin_2");
var rip = document.getElementById("ripple_2");
var dash = document.getElementById("dash_2");

  var settings = {
    "async": true,
    "scrossDomain": true,
    "url":"https://api.coingecko.com/api/v3/simple/price?ids=bitcoin%2Cethereum%2Clitecoin%2Cripple%2Cdash%2Cnem%2Cmonero&vs_currencies=usd",
    "method":"GET",
    "headers":{}
}
$.ajax(settings).done(function(response){
    btc.innerHTML = response.bitcoin.usd;
    nem.innerHTML = response.nem.usd;
    eth.innerHTML = response.ethereum.usd;
    dash.innerHTML = response.dash.usd;
    lite.innerHTML = response.litecoin.usd;
    mon.innerHTML = response.monero.usd;
    rip.innerHTML = response.ripple.usd;
});


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