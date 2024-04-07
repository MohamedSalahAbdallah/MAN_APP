<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR Code MAM</title>
    <link rel="icon" href="../Assets/logoo.png" type="image/jpeg" sizes="16x16">
    <!--CDN For BootStrap Library-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/qrstyle.css')}}"/>
    <!--CDN Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="alert alert-warning alert-dismissible fade show" id="msg-war">
        <bdi><strong id="msg"></strong></bdi>
    </div>
    <div class="containerr">
        <div class="qr">
            <img class="logo" src="../Assets/logow.png">
            <div id="qr"></div>
        </div>
        <form class="data" id="data" >
            <label for="fn"><bdi>الإسم الرباعي (بالإنجليزية) :</bdi></label>
            <input type="text" name="fn" id="fn" minlength="11" title="Please Enter Your Full Name." required>
            <label for="sn"><bdi>الرقم القومي :</bdi></label>
            <input type="number" name="sn" id="sn" size="14" pattern="[0-9]{14}" title="Please Enter Your National ID (14 digits)." required>
            <label for="un"><bdi>إسم الكلية او المعهد (بالإنجليزية):</bdi></label>
            <input type="text" name="un" id="un" required minlength="3" title="Please Enter Your University Name.">
            <label for="phone"><bdi>رقم الهاتف للتواصل :</bdi></label>
            <input type="text" name="phone" id="phone" required pattern="^01[0-2,5]\d{8}$" title="Enter Your Phone Number (11 digits), Support 010, 011, 012, and 015.">
            <p>: تحديد </p>
            <div class="radioflex">
                <input type="radio" id="trip" name="choose" value="tripp">
                <label for="trip" class="notreq">رحلة</label><br>
            </div>
            <div class="radioflex">
                <input type="radio" id="gradu" name="choose" value="graduation">
                <label for="gradu" class="notreq">حفل تخرج</label><br>
            </div>

                <div id="trip-choosen">
                    <label for="tripname"><bdi>إختر الرحلة :</bdi></label>
                    <select id="tripname" name="tripname" required>
                        <option value="">إختر :</option>
                        <!--For loop-->
                    </select>
                    <label for="ticnum"><bdi>عدد التذاكر : </bdi></label>
                    <input type="number" min="0" value="0" name="ticnum" id="ticnum" required>
                </div>
                <div id="gradu-choosen">
                    <label for="free"><bdi>عدد المرافقين ال Free :</bdi></label>
                    <input type="text" value="" id="free" readonly>
                    <label for="extra"><bdi>عدد المرافقين ال Extra : <u class="uline"> حد اقصى 3</u></bdi></label>
                    <input type="number" max="3" min="0" value="0" name="extra" id="extra" title="Maximum 3 only." required>
                </div>
            <label for="total"><bdi>إجمالي السعر : </bdi></label>
            <input type="number" value="0" name="total" id="total" required>
        </form>
    </div>
    <div class="btn">
        <a class="btnsub" onclick="generate()"><button>QR إنشاء</button></a>
        <a class="btnsub" id="download" href="" download="qr" onclick="pngdown()"><button>PNG تحميل</button></a>
    </div>

    <!--CDN QR Library-->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="{{ asset('js/qrdemo.js') }}"></script>
    <!--CDN For BootStrap Library-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
