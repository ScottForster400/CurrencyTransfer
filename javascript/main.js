// Used https://www.w3schools.com/howto/howto_js_mobile_navbar.asp to make a burger menu
var transferLimit=500000;

(function myFunction(){
    // var translim = document.getElementById("transfer-limit");
    // console.dir(translim)
    // document.translim.innerHTML="bruh"
    document.getElementById("limit").value=transferLimit;
    var amount = document.getElementById("amount")
    $(amount).attr('max',transferLimit)
})();
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
function setLimit(){
  var amount = document.getElementById("amount")
  console.dir(document.getElementById("amount").value)
  transferLimit=document.getElementById("amount").value
  myFunction();
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
