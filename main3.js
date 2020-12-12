
const inputs = document.querySelectorAll(".input");


function addcl() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});
// (function () {
//
//     document.getElementById("passDiv").classList.add('focus');
//     document.getElementById("emailDiv").classList.add('focus');
//
//     document.getElementById("fname").classList.add('focus');
//     document.getElementById("lname").classList.add('focus');
//     document.getElementById("date").classList.add('focus');
//
//
//     //document.getElementById("email").classList.remove('focus');
//     document.getElementById("phoneNum").classList.add('focus');
//     document.getElementById("rpassDiv").classList.add('focus');
//     document.getElementById("license_salon").classList.add('focus');
//     document.getElementById("city").classList.add('focus');
//     document.getElementById("street").classList.add('focus');
//     document.getElementById("website").classList.add('focus');
//     document.getElementById("days").classList.add('focus');
//     document.getElementById("from_time").classList.add('focus');
//     document.getElementById("to_time").classList.add('focus');
//     document.getElementById("rrpassDiv").classList.add('focus');
//
//
// })()