const inputs = document.querySelectorAll(".input");


function addcl(){
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl(){
    let parent = this.parentNode.parentNode;
    if(this.value == ""){
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});

function goback(){
    window.history.back();
}

function salonsignupfunc(){
    document.getElementById("login-content").style.display="none";
    document.getElementById("login-content1").style.display="flex";
}
// function myFunction() {
//     let parent = this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
//     if(this.value == ""){
//         parent.classList.remove("focus");
//     }
// }

// function focusfunc(){
//     document.querySelector(".input-div.focus:before").style.width="50%";
//     document.querySelector(".input-div.focus:after").style.width="50%";
//     document.querySelector(".input-div.focus > div > h5").style.top="5px";
//     document.querySelector(".input-div.focus > div > h5").style.fontsize="5px";
//     document.querySelector(".input-div.focus > .i > i").style.color="#bc8500";
//
// }