(function(){
    document.getElementById("license_salon").classList.remove('focus');
    document.getElementById("city").classList.remove('focus');
    document.getElementById("street").classList.remove('focus');
    document.getElementById("website").classList.remove('focus');
})()

function gohome(){
    window.location.href = "salon-page.php";
}
function gonext(ID){
    window.location.href = "dayBooking.php?ID="+ID;
}
function gonext1(ID){
    window.location.href = "historyBooking.php?ID="+ID;
}
function gonext2(ID){
    window.location.href = "percantgePage.php?ID="+ID;
}
// (function(){
//
//     document.getElementById("passDiv").classList.remove('focus');
//     document.getElementById("emailDiv").classList.remove('focus');
//
//     document.getElementById("fname").classList.remove('focus');
//     document.getElementById("lname").classList.remove('focus');
//     document.getElementById("date").classList.remove('focus');
//     //document.getElementById("email").classList.remove('focus');
//     document.getElementById("phoneNum").classList.remove('focus');
//     document.getElementById("rpassDiv").classList.remove('focus');
//     document.getElementById("license_salon").classList.remove('focus');
//     document.getElementById("city").classList.remove('focus');
//     document.getElementById("street").classList.remove('focus');
//     document.getElementById("website").classList.remove('focus');
//     document.getElementById("days").classList.remove('focus');
//     document.getElementById("from_time").classList.remove('focus');
//     document.getElementById("to_time").classList.remove('focus');
//     document.getElementById("rrpassDiv").classList.remove('focus');
//
//
// })()