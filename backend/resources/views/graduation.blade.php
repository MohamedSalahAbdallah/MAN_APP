<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAM Graduate</title>
    <link rel="icon" href="../Assets/logoo.png" type="image/jpeg" sizes="16x16">
    <!--CDN Bootstrap Library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--CDN Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/graduation.css')}}">

</head>
<body>
    <div id="bgcover"></div>
    <nav>
        <div></div>
        <img src="../Assets/logow.png" alt="MAM logo">
        <button id="logout" onclick="">تسجيل خروج</button>
    </nav>
    <a href="../Home/Home.html"><button class="back"><svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
      </svg></button></a>
    <section class="popup" id="popup">
        <img src="../Assets/Scan QRcode.gif" alt="qrcode">
        <h1><bdi> تم تسجيل البيانات, يرجى دفع <u id="ft"></u> بأحد الطرق :</bdi>
        <ul>
            <bdi><li>دفع عن طريق فودافون كاش لرقم : <span><b id="vod-cash"></b></span></li></bdi>
            <bdi><li>دفع عن طريق إتصالات كاش لرقم : <span><b id="etis-cash"></b></span></li></bdi>
        </ul>
        <bdi>لن يتم تأكيد الحجز إلا بإرسال صوره تحويل المبلغ وسيتم إستلام الكود الخاص بك بعد ذلك.</bdi>
        </h1>
        <a href="../Home/Home.html" ><button class="btnsub"><bdi>حسنا!</bdi></button></a>
    </section>
    <form class="graduate" id="graduate" name="graduateForm" method="post" action="">
        <fieldset>
            <legend><bdi>حجز تذكرة حفل التخرج :</bdi></legend>
            <div class="formcontainer">
                <img id="imggraduateform" alt="graduateimg" src="../Assets/g.jfif">
                <div class="inputfield">
                    <label for="free"><bdi>عدد المرافقين ال Free :</bdi></label>
                    <div class="freeprice">
                        <input type="text" value="" name="free" id="free" readonly>
                        <span>EGP</span><input type="text" class="notinput" id="freeprice" value="" readonly>
                    </div>
                    <label for="extra"><bdi>عدد المرافقين ال Extra : <u class="uline"> حد اقصى 3</u></bdi></label>
                    <div class="extraprice">
                        <input type="number" max="3" min="0" value="0" name="extra" id="extra" required>
                        <!-- use this after log in admin <h2 class="price"><span id="extraprice" contenteditable="false">100</span> EGP</h2>-->
                        <span>EGP</span><input type="text" class="notinput" id="extraprice" value="" readonly>
                    </div>
                    <h2><bdi><input name="total" value="" id="total" readonly> EGP : إجمالي المبلغ </bdi></h2>
                    <input type="submit" class="btnsub" value="Submit">
                </div>
            </div>
        </fieldset>
    </form>

    <script src="{{ asset('js/graduate.js') }}"></script>
    <!--CDN Bootstrap Library-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
