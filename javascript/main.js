//used to make burger menu nav
//Websdite:w3schools
//Name Of Webpage: How TO - Mobile Navigation Menu
//Date:N/A
//URL:https://www.w3schools.com/howto/howto_js_mobile_navbar.asp
var transferLimit=500000;

(function myFunction(){
    document.getElementById("limit").value=transferLimit;
    var amount = document.getElementById("amount")
    $(amount).attr('max',transferLimit)
})();
//used to work out scrollintoview
//Websdite:mdn web docs
//Name Of Webpage:Element: scrollIntoView() method
//Date: 7th April 2023
//URL:https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollIntoView
function exchnageScroll(element) {
  var selectedElement = element.innerHTML;
  document.getElementById(selectedElement).scrollIntoView({behavior:"smooth"});
}
function burgerMenu() {
  var x = document.getElementById("page-links");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
};
function showPword(){
  var pword = document.getElementById("pword")
  var type = $(pword).attr('type');
  if(type==="password"){
    $(pword).attr('type','text')
  }
  else{
    $(pword).attr('type','password')
  }
  
};
