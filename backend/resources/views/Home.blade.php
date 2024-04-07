<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAM</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="../Assets/logoo.png" type="image/jpeg" sizes="16x16">
    <!--CDN Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div></div>
        <img src="../Assets/logow.png" alt="MAM logo">
        <button id="logout" onclick="">تسجيل خروج</button>
    </nav>
    <div class="graduate">
        <div>
            <h2>MAM حجز حفلات تخرج</h2>
            <a href="../Graduate Form/graduation.html"><button><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
              </svg> بدء </button></a>
        </div>
        <img alt="graduation" loading="lazy" src="../Assets/graduates.jfif">
    </div>
    <div class="trip">
        <img alt="trip" loading="lazy" src="../Assets/medium-shot-people-traveling-together.jpg">
        <div>
            <h2>MAM حجز رحلات</h2>
            <a href="../Trip Form/trip.html"><button><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
              </svg> بدء </button></a>
        </div>
    </div>

    <script src="{{ asset('js/demo.js') }}"></script>
</body>
</html>
