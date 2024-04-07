<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignLog</title>
	<!--CDN For BootStrap Library-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/signlog.css')}}">
    <link rel="icon" href="Assets/logoo.png" type="image/jpeg" sizes="16x16">
    <!--CDN Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="containerr">
		<div class="forms-container">
			<div class="signin-signup">
				<!-- signin form -->
				<form action="" method="post" name="sign-in-form" id="sign-in-form">
					<h2 class="title">تسجيل دخول</h2>
					<div id="signin-message-invalid" class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						<bdi><strong>خطأ!</strong> كلمة المرور او الايميل غير صحيح</bdi>
					</div>
					<div id="signin-message-danger" class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						<bdi><strong>خطأ!</strong> </bdi>
					</div>
					<label class="input-field user">
						<input type="text" placeholder="إسم المستخدم" name="user_name" pattern="[a-zA-Z0-9]{3,}" required/>
					</label>
					<label class="input-field pass">
                        <input type="password" placeholder="كلمة المرور" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
					</label>
					<input type="submit" value="تسجيل دخول" id="btnin" class="btn solid" />
				</form>
				<!-- signup form -->
				<form action="http://127.0.0.1:8000/api/register" method="post" name="sign-up-form" id="sign-up-form">
					<h2 class="title">إنشاء حساب</h2>
					<div id="signup-message-war" class="alert alert-warning alert-dismissible fade show">
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						<bdi><strong>تحذير!</strong> لقد قمت بإنشاء حساب من قبل. </bdi>
					</div>
					<div id="signup-message-dang" class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						<bdi><strong>خطأ!</strong> لقد قمت بإنشاء حساب من قبل. </bdi>
					</div>
					<label class="input-field user">
                        <input type="text" placeholder="إسم المستخدم" name="user_name" pattern="[a-zA-Z0-9]{3,}" title="minimun 3 character" required/>
                    </label>
					<label class="input-field user">
						<input type="text" placeholder="الاإسم رباعي (بالإنجليزية)" name="name" id="fn" minlength="11" title="Please Enter Your Full Name." required>
                    </label>
					<label class="input-field user">
						<input type="number" placeholder="الرقم القومي" name="nid" id="sn" size="14" pattern="[0-9]{14}" title="Please Enter Your National ID (14 digits)." required>
                    </label>
					<label class="input-field ema">
                        <input type="email" placeholder="البريد الإلكتروني" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Email Must Contain @" required/>
					</label>
					<label class="input-field build">
						<input type="text" placeholder="إسم الكلية أو المعهد" name="University" id="un"  title="Please Enter Your University Name" minlength="3">
                    </label>
					<label class="input-field ph">
						<input type="text" placeholder="رقم الهاتف للتواصل" name="phone" id="phone" title="Enter Your Phone Number (11 digits), Support 010, 011, 012, and 015." required pattern="^01[0-2,5]\d{8}$">
                    </label>
					<label class="input-field pass">
                        <input type="password" id="pass" placeholder="كلمة المرور" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                    </label>
                    <label class="input-field pass">
                        <input type="password" id="match" placeholder="تأكيد كلمة المرور" title="Password Not Matched!" required/>
                    </label>
                    <p id="matched">كلمة المرور غير مطابقة</p>
					<input type="submit" class="btn" id="btnup" value="إنشاء حساب" />
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h2>انت جديد هنا ؟</h2>
					<p>
						اذا كان ليس لديك حساب يمكنك إنشاء حساب من هنا وإنضم لنا
                    </p>
					<button class="btn transparent" id="sign-up-btn">
						إنشاء حساب
					</button>
				</div>
				<img  src="Assets/Sign up-cuate (1).png" class="image" alt="" />
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h2>لديك حساب بالفعل ؟</h2>
					<p>
						اذا كان لديك بالفعل يمكنك الدخول والحجز معنا الآن
					</p>
					<button class="btn transparent" id="sign-in-btn">
						تسجيل دخول
					</button>
				</div>
				<img src="Assets/Tablet login-cuate (1).png"  class="image" alt="" />
			</div>
		</div>
	</div>

    <script src="{{ asset('js/signlog.js') }}"></script>
	<!--CDN For BootStrap Library-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
