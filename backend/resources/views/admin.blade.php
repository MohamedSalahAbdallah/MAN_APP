<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--CDN For BootStrap Library-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="icon" href="../Assets/logoo.png" type="image/jpeg" sizes="16x16">
    <!--CDN Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="containerr">
        <aside>
            <img alt="logo" src="../Assets/log.png">
            <div class="asidebtn">
                <a><button class="trip btnaside" id="btn-trip" onclick="tripbtn()">بيانات الرحلات</button></a>
                <a><button class="graduate btnaside" id="btn-graduate" onclick="graduatebtn()">بيانات التخرج</button></a>
                <a><button class="control btnaside" id="btn-control" onclick="controlbtn()">لوحة التحكم</button></a>
                <a href="../QR/qr.html"><button class="Generte"><bdi>إنشاء QR</bdi></button></a>
                <button id="logout">تسجيل خروج</button>
            </div>
        </aside>
        <div class="admin-body">
            <img src="../Assets/logow.png" alt="logo" id="imglogo">
            <div id="trip-data">
                <div class="centered">
                    <h2>بيانات الرحلات</h2>
                    <button class="export" onclick="TravelToExcel(this)">تحميل excel</button>
                </div>
                <table id="tripdata">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>الإسم الرباعي</th>
                            <th>الرقم القومي</th>
                            <th>الكلية</th>
                            <th>الرحلة</th>
                            <th>الهاتف</th>
                            <th>عدد التذاكر</th>
                            <th>إجمالي السعر</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="displayTrip">
                        <!--for loop getting array data-->
                        <caption id="tdefault">! لا توجد بيانات لعرضها</caption>

                    </tbody>
                </table>
            </div>
            <div id="graduate-data">
                <div class="centered">
                    <h2>بيانات التخرج </h2>
                    <button class="export" onclick="GraduateToExcel(this)">تحميل excel</button>
                </div>
                <table id="graduatedata">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>الإسم الرباعي</th>
                            <th>الرقم القومي</th>
                            <th>إسم الكلية</th>
                            <th>رقم الهاتف</th>
                            <th><bdi>عدد التذاكر free</bdi></th>
                            <th><bdi>عدد التذاكر extra</bdi></th>
                            <th><bdi> حالة الدفع</bdi></th>
                            <th>إجمالي السعر</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="displayGraduate">
                        <!--for loop getting array data-->
                        <caption id="gdefault">! لا توجد بيانات لعرضها</caption>
                    </tbody>
                </table>
            </div>
            <div id="control">

                <form action="http://127.0.0.1:8000/api/event" method="post" name="formcontrol" id="formcontrol" enctype="multipart/form-data">

                    <div id="successmsg" class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <bdi><strong>نجح!</strong> تم التعديل بنجاح</bdi>
                    </div>
                    <div id="errormsg" class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <bdi><strong>خطأ!</strong> أعد المحاولة مرة أخرى.</bdi>
                    </div>
                    <p>: تحديد </p>
                    <div class="radioflex">
                        <input type="radio" id="trip" name="choose" value="travel">
                        <label for="trip" class="notreq">رحلة</label><br>
                    </div>
                    <div class="radioflex">
                        <input type="radio" id="gradu" name="choose" value="grad">
                        <label for="gradu" class="notreq">حفل تخرج</label><br>
                    </div>
                    <br>
                    <div id="trip-choosen">

                        <label for="trip-name"><bdi>مكان الرحلة :</bdi></label>
                        <input type="text" value=" " name="trip-name" id="trip-name">

                    </div>

                    <div id="gradu-choosen">


                        <label for="gextra-price"><bdi>سعر تذكرة التخرج Extra :</bdi></label>
                        <input type="number" min="0" value="0" name="gextra-price" id="gextra-price">
                        <label for="free_guests"><bdi>عدد الfree guests</bdi></label>
                        <input type="number" min="0" value="" name="free_guests" id="free_guests">


                        </label>
                    </div>
                    <br>
                    <label for="tripimg" class="img-btn">رفع صورة
                        <input type="file" name="tripimg" id="tripimg" accept="image/jpg " >
                    </label>
                    <label for="trip-price"><bdi>سعر التذكرة :</bdi></label>
                    <input type="number" min="0" value="0" name="trip-price" id="trip-price">
                    <label for="vod-phone"><bdi>إضافة رقم فودافون كاش :</bdi></label>
                    <input type="number" size="11" value="" title="Enter Vodafone Cash Number" pattern="^010\d{8}$" name="vod-phone" id="vod-phone">

                    <label for="etis-phone"><bdi>إضافة رقم إتصالات كاش :</bdi></label>
                    <input type="number" size="11" value="" title="Enter Etisalat Cash Number" pattern="^011\d{8}$" name="etis-phone" id="etis-phone">

                    <input type="submit" class="btnsub" value="تأكيد">
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
    <!--CDN For Excel Library-->
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <!--CDN For BootStrap Library-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
