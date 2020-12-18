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

function goindex() {
    window.location.href = "index.php";
}

function goback() {
    window.history.back();
}

function salonsignupfunc() {
    document.getElementById("login-content").style.display = "none";
    document.getElementById("login-content1").style.display = "flex";
}


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
    // var whitebg = document.getElementById("white-background");
    // var dlg = document.getElementById("dlgbox");
    // whitebg.style.display = "block";
    // dlg.style.display = "block";
    //
    // var winWidth = window.innerWidth;
    //
    // dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    // dlg.style.top = "150px";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dlg-body").innerHTML = this.responseText;
            var whitebg = document.getElementById("white-background");
            var dlg = document.getElementById("dlgbox");
            whitebg.style.display = "block";
            dlg.style.display = "block";

            var winWidth = window.innerWidth;

            dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
            dlg.style.top = "150px";
        }
    };
    xhttp.open("POST", "cusHistory.php", true);
    xhttp.send();

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

//change password
function dlgOK3() {
    var oldPass = document.getElementById('oldPass').value;
    var pass1 = document.getElementById('NewPass1').value;
    var pass2 = document.getElementById('NewPass2').value;
    var dataForm = new FormData();

    dataForm.append('oldPass', oldPass);
    dataForm.append('pass1', pass1);
    dataForm.append('pass2', pass2);


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("changepassresult").innerHTML = this.responseText;

            // dlgBookinghide();
        }
    };
    xhttp.open("POST", "changePass.php", true);
    xhttp.send(dataForm);
    //dlgHide3();
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

function dlgBooking(SID) {

    var day = document.getElementById('selectday').value;
    var service = document.getElementById('selectServ').value;
    var time = document.getElementById('selecttime').value;
    var dataForm = new FormData();

    dataForm.append('day', day);
    dataForm.append('service', service);
    dataForm.append('time', time);
    dataForm.append('SID',SID);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("bookResult").innerHTML = this.responseText;

            // dlgBookinghide();
        }
    };
    xhttp.open("POST", "AddBooking.php", true);
    xhttp.send(dataForm);

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
    dataFrom.append('SID', SID);


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // document.getElementById("demo").innerHTML = this.responseText;
            // var selectServMenu = document.getElementById('selectServ');
            // var obj = this.responseText
            document.getElementById('dlgBookingBox').innerHTML = this.responseText;
            // console.log(obj);

            //remove old options
            // var select = document.getElementById("selectServ");
            // var length = select.options.length;
            // for (i = length - 1; i >= 0; i--) {
            //     select.options[i] = null;
            // }
            //
            // var option = document.createElement("option");
            // option.text = "خدمة";
            // selectServMenu.add(option);
            // for (var i = 0; i < obj.length; i++) {
            //     var option = document.createElement("option");
            //     var innerOBJ = obj[i];
            //     option.text = innerOBJ['service'];
            //     selectServMenu.add(option);
            //
            var whitebg = document.getElementById("white-background");
            var dlg = document.getElementById("dlgBookingBox");
            whitebg.style.display = "block";
            dlg.style.display = "block";

            var winWidth = window.innerWidth;

            dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
            dlg.style.top = "150px";
            // }
        }
    };
    xhttp.open("POST", "SIDDialog.php", true);
    xhttp.send(dataFrom);
}

function getTimes(SID){
    var day = document.getElementById('selectday').value;

    var dataForm = new FormData();

    dataForm.append('day', day);
    dataForm.append('SID',SID);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("selecttime").innerHTML = this.responseText;

            // dlgBookinghide();
        }
    };
    xhttp.open("POST", "getTime.php", true);
    xhttp.send(dataForm);

    //window.location.replace("logIn.php");
}

function getPrice(SID){
    var service = document.getElementById('selectServ').value;

    var dataForm = new FormData();

    dataForm.append('service', service);
    dataForm.append('SID',SID);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("PriceLabel").innerHTML = this.responseText;

            // dlgBookinghide();
        }
    };
    xhttp.open("POST", "getPrice.php", true);
    xhttp.send(dataForm);

}