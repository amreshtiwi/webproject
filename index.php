<?php
session_start();
$_SESSION['SalName'] = $_SESSION['Gender'] = $_SESSION['email'] = $_SESSION['phone'] = $_SESSION['pass1'] = $_SESSION['pass2'] = "";
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حلاقي</title>
    <link rel="icon" href="imgs/halaqee4.png">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Turret+Road:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45aa54fd2a.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="wrap">

        <!-- this the paragrapg that describe the website-->
        <div class="describe">
            <h1> مكانك لتجد حلّاقك الأفضل</h1>
            <br>
            <p>تصفح أفضل مكان لقص شعرك </p>
            <p>في أكبر منصه تضم صالونات الحلاقه</p>
            <p>في أرجاء الوطن العربي</p>
        </div>
        <!--end describe-->
        <!-- 2 buttons to go to another page-->
        <div class="log-sign">
            <a href="logIn.html" class="log">تسجيل الدخول</a>
            <div class="dropdown">
                <a href="#" class="sign">إنشاء حساب </a>
                <div class="dropdown-content">
                    <a href="sign-up-customer.php">كزبون</a>
                    <a href="signup-salon.php?click=0">كصالون</a>
                </div>
            </div>

        </div>
        <!-- end 2 buttons-->

    <!--circle card-->
    <div class="cards">
        <!-- 1st circle card-->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imgs/img1.jpg" alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <br><br><br><h1>حلاقي</h1><br>
                    <p>احجز موعدك الأن</p>
                    <p>وإذهب في الموعد المناسب</p>
                </div>
            </div>
        </div>
        <!--end 1st circle card-->
        <!-- 2nd circle card-->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imgs/img3.jpeg" alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <br><br><br><h1>حلاقي</h1><br>
                    <p>أمهر أيدي لقص الشعر</p>
                    <p>تجده في مكان واحد</p>
                </div>
            </div>
        </div>
        <!--end 2nd circle card-->
        <!-- 3rd circle card-->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imgs/img2.jpeg" alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <br><br><br><h1>حلاقي</h1><br>
                    <p>مكانك الأفضل والأسرع</p>
                    <p>لإختيار صالونك المناسب لك</p>
                </div>
            </div>
        </div>
        <!--end 3rd cricle card-->
    </div>
    <!-- end cricles card-->
</div>
<!-- end the content of the header-->
<!--footer-->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 498.3 158.6"><title>halaqee4</title><path d="M18.9,94.8c0,5.7-4.1,9.3-9.4,9.3S0,100.5,0,94.8a9,9,0,0,1,9.4-9.3C14.7,85.5,18.9,89.2,18.9,94.8Zm0,23.5a9,9,0,0,1-9.4,9.3c-5.3,0-9.5-3.7-9.5-9.3A9,9,0,0,1,9.4,109C14.7,109,18.9,112.6,18.9,118.3Zm126.7-16.1v12.4l-3.1,3.1c-17.3,0-24.1-11.5-29.3-23.7L101.5,67.2C93,69.1,82.9,74,82.9,81.3c0,12.9,24,30.8,24,40.6,0,19-19.9,36.8-51.8,36.7-21.4,0-33.4-6.4-33.4-6.4l4.1-14.5h1.4c5.5,1.7,14.8,5.3,31.4,5.3,15.6,0,27.7-5.9,35.3-14.7C84,115.8,66,98.4,66,83.9c.2-22.6,25.8-31.6,44.1-35.5l1.6.3,13.2,31.7C130.9,95.2,134.2,102.2,145.6,102.2Z" style="fill:#bc8500"/><path d="M230.5,42.4c-1.3,5.6-1.3,18.6-1.3,24.8v45.5l-.6,1.2c-6.3,2.5-15.8,3.7-29,3.7H142.3V105.2l3.1-3.1h25.4c-9-6.8-15.1-17.2-15.1-29.6,0-21.7,16.5-36.7,43-36.7,9.6,0,18.4,1.4,31.2,5.3Zm-18.9,60V64.3a74.12,74.12,0,0,1,.8-11.5,43.94,43.94,0,0,0-14.8-2.2c-15.1,0-24.4,8.8-24.4,21.4C173.1,87.8,187.3,101.6,211.6,102.4Zm-33.3-89c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C182.4,22.6,178.3,18.9,178.3,13.4Zm22.5-3c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C204.9,19.7,200.8,16.1,200.8,10.4Z" style="fill:#3e3e3e"/><path d="M382.5,102.2v12.4l-3.1,3.1H259.6v-1.4l5.4-14.1h34.7a52.92,52.92,0,0,1-1.3-11.9V33.9l16.2-2.2H316v70.4h27a52.92,52.92,0,0,1-1.3-11.9V2l16.4-2h1.3V102.2Z" style="fill:#3e3e3e"/><path d="M498.3,102v1.4l-4.9,14.2H379.3V105.1l3.2-3.1h69.2c-15.1-9.6-34.8-30.8-56.7-59.6l11.3-11.9h1.4c42.4,55,65.7,71.7,76.3,71.7Z" style="fill:#3e3e3e"/></svg>
            <br>
            <p> حلاقي هي عبارة عن منصه تضم صالونات الحلاقه في مختلف البلاد بحيث تسهل على العميل عملية الحجز المسبق عند الصالون وكذلك تسهل على الكوافير تنظيم عملاءه</p>
            <br>
            <div class="contact">
                <span><i class="fas fa-phone"></i> &nbsp; +970 59 5141-904</span>
                <br>
                <span><i class="fas fa-envelope"></i> &nbsp; amr.eshtiwi@stu.najah.edu</span>
            </div><br>
            <div class="social">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <div class="footer-section links">
            <h2>أهداف المشروع</h2>
            <br>
            <br>
            <p>إن المشروع يهدف وبشكل رئيس إلى تنظيم المواعيد المتاحه بين العميل وصاحب الصالون بحيث أن العميل يقوم بإختيار الموعد المحدد له والذهاب مباشره ع الموعد المحدد ,أما بالنسبه لصاحب الصالون فإنه يقوم بإختيار المواقيت المناسبه لعمله بحيث يضمن العمل المريح لنفسه وعملائه </p>

        </div>
        <div class="footer-section contact-form">
            <h2>تواصل معنا</h2>
            <br>
            <form action="mail.php" method="post">
                <input type="email" name = "email" class="text-input contact-input" placeholder="أدخل الإيميل الخاص بك">
                <br>
                <br>
                <textarea name="message" class="text-input contact-input" placeholder="...رسالتك"></textarea>
                <br>
                <button name = "send" type="submit" class="btn1 btn-big">إرسال   <i class="far fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</div>
<div class="footer-bottom">&copy; <span>amRami</span> | DESIGNED BY Amoora and Abu Reem</div>

</body>
</html>