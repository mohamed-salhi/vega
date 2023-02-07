const tabs = document.querySelectorAll(".tab");
const tabContent = document.querySelectorAll(".tab-content");
var header = document.querySelector('.header');
var load = document.querySelector('.load');
var btn_comment = document.querySelector('.comment');
var popup = document.querySelector('.popup');
var modal = document.querySelector('.modal_');
var ok = document.querySelector('.ok');
var send_btn = document.querySelector('#button_');
var button_canc = document.querySelector('#button_canc');
var close = document.querySelector('.close');
// scroll
// 1- sections
var array = document.querySelectorAll('.sec')
// 2- link in nav
var arraylink = document.querySelectorAll('#links')

window.onscroll = function(){
  if(window.scrollY >= 50){
      header.style.background = "black"
      header.style.transition = "1s"
  }else{
      header.style.background = "transparent"
  }
}

window.onload = ()=>{
  load.style.display = "none"

}
tabs.forEach((tab, i) => {
  tab.addEventListener("click", function () {
    tabs.forEach((tab) => tab.classList.remove("active"));
    this.classList.add("active");
    tabContent.forEach((content) => content.classList.add("hidden"));
    tabContent[i].classList.remove("hidden");
  });
});

