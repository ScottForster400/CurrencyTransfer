// Used https://www.w3schools.com/howto/howto_js_mobile_navbar.asp to make a burger menu
var transferLimit=500000;

(function myFunction(){
    document.getElementById("limit").value=transferLimit;
    var amount = document.getElementById("amount")
    $(amount).attr('max',transferLimit)
})();
//used https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollIntoView to work scrollintoview
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
