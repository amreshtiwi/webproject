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

function goback() {
    window.location.href="index.php";
}

function salonsignupfunc() {
    document.getElementById("login-content").style.display = "none";
    document.getElementById("login-content1").style.display = "flex";
}

(function () {

    document.getElementById("passDiv").classList.remove('focus');
    document.getElementById("emailDiv").classList.remove('focus');

    document.getElementById("fname").classList.remove('focus');
    document.getElementById("lname").classList.remove('focus');
    document.getElementById("date").classList.remove('focus');


    //document.getElementById("email").classList.remove('focus');

    document.getElementById("rpassDiv").classList.remove('focus');
    document.getElementById("city").classList.remove('focus');
    document.getElementById("street").classList.remove('focus');
    document.getElementById("website").classList.remove('focus');
    document.getElementById("days").classList.remove('focus');
    document.getElementById("rrpassDiv").classList.remove('focus');


})()

//for the time button in the customer page
function dlgCancel() {
    dlgHide();
}

function dlgOK() {
    dlgHide();
    //implement code to save data
}

function dlgHide() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox");
    whitebg.style.display = "none";
    dlg.style.display = "none";
}

function showDialog() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox");
    whitebg.style.display = "block";
    dlg.style.display = "block";

    var winWidth = window.innerWidth;

    dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    dlg.style.top = "150px";
}

// for the log out button in customer page
function dlgCancel1() {
    dlgHide1();
}

function dlgOK1() {
    dlgHide1();
    window.location.replace("logIn.php");
}

function dlgHide1() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox1");
    whitebg.style.display = "none";
    dlg.style.display = "none";
}

function showDialog1() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox1");
    whitebg.style.display = "block";
    dlg.style.display = "block";

    var winWidth = window.innerWidth;

    dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    dlg.style.top = "150px";

}

//for the setting button in customer page

function dlgCancel2() {
    dlgHide2();
}

function dlgOK2() {
    dlgHide2();
    window.location.replace("logIn.php");
}

function dlgHide2() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox2");
    whitebg.style.display = "none";
    dlg.style.display = "none";
}

function showDialog2() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox2");
    whitebg.style.display = "block";
    dlg.style.display = "block";

    var winWidth = window.innerWidth;

    dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    dlg.style.top = "150px";

}

//show password changer dialog

function dlgCancel3() {
    dlgHide3();
}

function dlgOK3() {
    dlgHide3();
    //implement code to save data
}

function dlgHide3() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox3");
    whitebg.style.display = "none";
    dlg.style.display = "none";
}

function showDialog3() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox3");
    whitebg.style.display = "block";
    dlg.style.display = "block";

    var winWidth = window.innerWidth;

    dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    dlg.style.top = "150px";

}

function changePassDialog() {
    dlgHide2();
    showDialog3();
}

//end show password changer dialog

//show information data dialog

function infoDialog() {
    dlgHide2();
    showDialog4();
}

function showDialog4() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox4");
    whitebg.style.display = "block";
    dlg.style.display = "block";

    var winWidth = window.innerWidth;

    dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    dlg.style.top = "150px";

}

function dlgCancel4() {
    dlgHide4();
}

function dlgOK4() {
    dlgHide4();
    //implement code to save data
}

function dlgHide4() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox4");
    whitebg.style.display = "none";
    dlg.style.display = "none";
}

//end show information data dialog

//show delete dialoge
function deleteDialog() {
    dlgHide2();
    showDialog5();
}

function showDialog5() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox5");
    whitebg.style.display = "block";
    dlg.style.display = "block";

    var winWidth = window.innerWidth;

    dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    dlg.style.top = "150px";

}


function dlgCancel5() {
    dlgHide5();
}

function dlgOK5() {
    dlgHide5();
    //implement code to save data
}

function dlgHide5() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox5");
    whitebg.style.display = "none";
    dlg.style.display = "none";
}

//end show delete dialoge
//****************************************************************************************************************
// (document).ready(function(){
//     (".default_option").click(function(){
//         (".dropdown ul").addClass("active");
//     });
//
//     (".dropdown ul li").click(function(){
//         var text = (this).text();
//         (".default_option").text(text);
//         (".dropdown ul").removeClass("active");
//     });
// });
//
//
// function validate() {
//         // Create a date variable which stores the current day at 00:00 local time.
//         let today = new Date();
//         today.setHours(0, 0, 0, 0);
//
//         // Parse the provided date in the default YYYY-MM-DD format.
//         let birthdate = new Date(document.getElementById("birthday").value);
//
//         // Check whether the provided date is equal to or less than the current date.
//         if (birthdate <= today) {
//
//         } else {
//             alert("fwefwf");
//         }
// }
//*******************************************************************************************
//for booking dlg
function dlgCancelBooking() {
    dlgBookinghide();
}

function dlgBooking() {
    dlgBookinghide();
    //window.location.replace("logIn.php");
}

function dlgBookinghide() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgBookingBox");
    whitebg.style.display = "none";
    dlg.style.display = "none";
}

// function test(card_id){
//     alert(card_id);
// }

function showBookingDialog(SID) {

    var dataFrom = new FormData();
    dataFrom.append('SID',SID);


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // document.getElementById("demo").innerHTML = this.responseText;
            var selectServMenu= document.getElementById('selectServ');
            var obj = JSON.parse(this.responseText);

            //remove old options
            var select = document.getElementById("selectServ");
            var length = select.options.length;
            for (i = length-1; i >= 0; i--) {
                select.options[i] = null;
            }

            var option = document.createElement("option");
            option.text = "خدمة";
            selectServMenu.add(option);
            for(var i =0;i<obj.length;i++){
                var option = document.createElement("option");
                var innerOBJ = obj[i];
                option.text = innerOBJ['service'];
                selectServMenu.add(option);

                var whitebg = document.getElementById("white-background");
                var dlg = document.getElementById("dlgBookingBox");
                whitebg.style.display = "block";
                dlg.style.display = "block";

                var winWidth = window.innerWidth;

                dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
                dlg.style.top = "150px";
            }
        }
    };
    xhttp.open("POST", "SIDDialog.php", true);
    xhttp.send(dataFrom);
}