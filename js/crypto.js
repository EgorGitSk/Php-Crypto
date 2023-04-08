var btnContainer = document.getElementById("btns");
var btns = btnContainer.getElementsByClassName("btn");
var crypto_img = document.getElementById('crypto-img');
var crypto_name = document.getElementById('crypto-name');
var crypto_text = document.getElementById('crypto-text');
var info = {
    'wallets':'Know about 4 types of wallets and how to secure your crypto currency investments',
    'mining':"Understand the basics of mining and setting up a Bitcoin mining facility",
    'portfolio':"Master the art of putting together a profitable diversified investment portfolio",
    'trade':'Trade cryptocurrencies with systematic trading process like a professional trader'
}
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active dontHover");
      current[0].className = current[0].className.replace(" active dontHover", "");
      crypto_img.src = "img/"+this.id+".png";
      crypto_name.innerHTML=this.id;
      crypto_text.innerText=info[this.id];
      this.className += " active dontHover";
    });
  }