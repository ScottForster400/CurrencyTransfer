// Used https://www.w3schools.com/howto/howto_js_mobile_navbar.asp to make a burger menu
var transferLimit=100;
function myFunction(){
    var x = document.getElementById("page-links");
    if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
}
function showPword(){
  console.dir("bruh")
  var pword = document.getElementById("pword")
  var type = $(pword).attr('type');
  if(type==="password"){
    $(pword).attr('type','text')
  }
  else{
    $(pword).attr('type','password')
  }
  
}
// function amountCheck(){
//   alert("bruh")
//   var input=document.getElementById("amount")
//   console.dir(input)
//   var enteredAmount= input.value;
//   console.dir(enteredAmount)
//   console.dir(transferLimit)
//   if(enteredAmount<transferLimit){
//     return true
//   }
//   else{
//     return false
//   }
// }
