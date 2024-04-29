<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        //auto expand textarea
        function adjust_textarea(h) {
            h.style.height = "20px";
            h.style.height = (h.scrollHeight)+"px";
        }
    </script>
    <script src="https://kit.fontawesome.com/f26a0d0320.js" crossorigin="anonymous"></script>
    <style type="text/css">
        body
        {
            background-image: url("a22.PNG");

        }
        .form-style-7{
            max-width:500px;
            margin:50px auto;
            background:#fff;
            border-radius:2px;
            padding:60px;




        }
        .form-style-7 h1{
            display: block;
            text-align: center;
            padding: 0;
            margin: 0px 0px 20px 0px;
            color: black;
            font-size:x-large;

        }
        .form-style-7 ul{
            list-style:none;
            padding:0;
            margin:0;

        }
        .form-style-7 li{
            display: block;
            padding: 15px;
            border:1px solid black;
            margin-bottom: 30px;
            border-radius: 3px;

        }
        .form-style-7 li:last-child{
            border:none;
            margin-bottom: 0px;
            text-align: center;

        }
        .form-style-7 li > label{
            display: block;
            float: left;
            margin-top: -19px;
            background: #FFFFFF;
            height: 14px;
            padding: 2px 5px 2px 5px;
            color: red;
            font-size: 14px;
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
        }
        .form-style-7 input[type="text"],
        .form-style-7 input[type="date"],
        .form-style-7 input[type="datetime"],
        .form-style-7 input[type="email"],
        .form-style-7 input[type="number"],
        .form-style-7 input[type="search"],
        .form-style-7 input[type="time"],
        .form-style-7 input[type="url"],
        .form-style-7 input[type="password"],
        .form-style-7 textarea,
        .form-style-7 select
        {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            display: block;
            outline: none;
            border: none;
            height: 25px;
            line-height: 25px;
            font-size: 16px;
            padding: 0;
            font-family: Georgia, "Times New Roman", Times, serif;
        }
        .form-style-7 input[type="text"]:focus,
        .form-style-7 input[type="date"]:focus,
        .form-style-7 input[type="datetime"]:focus,
        .form-style-7 input[type="email"]:focus,
        .form-style-7 input[type="number"]:focus,
        .form-style-7 input[type="search"]:focus,
        .form-style-7 input[type="time"]:focus,
        .form-style-7 input[type="url"]:focus,
        .form-style-7 input[type="password"]:focus,
        .form-style-7 textarea:focus,
        .form-style-7 select:focus
        {
        }
        .form-style-7 li > span{
            background: royalblue;
            display: block;
            padding: 3px;
            margin: 0 -9px -9px -9px;
            text-align: center;
            color: yellow;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;

        }
        .form-style-7 textarea{
            resize:none;
        }
        .form-style-7 input[type="submit"],
        .form-style-7 input[type="button"]{
            background: #2471FF;
            border: none;
            padding: 10px 20px 10px 20px;
            border-bottom: 3px solid #5994FF;
            border-radius: 3px;
            color: #D2E2FF;
        }
        .form-style-7 input[type="submit"]:hover,
        .form-style-7 input[type="button"]:hover{
            background: #6B9FFF;
            color:#fff;
        }
        .error
        {
            margin-top: 15px;
            color:red;
            text-align: center;

        }

    </style>
</head>
<body>

<?php

$nameErr = $NationalityErr = $genderErr = $birthdayErr =$identificationErr=$emailErr = "";
$name = $gender = $Nationality = $birthday =$identification= $email="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "الاسم متطلب اجباري";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "الجنس متطلب اجباري";
    } else {
        $gender = test_input($_POST["gender"]);
    }


    if (empty($_POST["birthday"])) {
        $birthdayErr = "تاريخ الميلاد متطلب اجباري";
    } else {
        $birthday= test_input($_POST["comment"]);
    }
    if (empty($_POST["Nationality"])) {
        $NationalityErr = "الجمسية متطلب اجباري";
    } else {
        $Nationality= test_input($_POST["Nationality"]);
    }

    if (empty($_POST["identification"])) {
        $identificationErr = "رقم الهوية/جواز السفر اجباري";
    } else {
        $identification= test_input($_POST["identification"]);
    }
    $email = test_input($_POST["email"]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailErr = "ايميلك غير صالح";
    }


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<form class="form-style-7" method="post" action="formProcessing.php">
    <ul>
        <li>

            <label for="name">الاسم الرباعي</label>
            <input type="text" name="name" maxlength="100" required>
            <span>(*) ادخل اسمك الرباعي هنا</span>
            <div class="error"><?php echo $nameErr;?></div>
        </li>
        <li style="text-align: center;">
            <form>
                <label for="gender">الجنس</label>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male" style="margin-top: auto; float:none;display: inline;">انثئ</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female" style="margin-top: auto; float:none;display: inline;">ذكر</label><br>
                <span> (*) ادخل جنسك هنا</span>
                <div class="error"><?php echo $genderErr;?> </div>
            </form>
        </li>
        <li>
            <label for="birthday">تاريخ الميلاد </label>
            <input type="date" id="birthday" name="birthday" max="2002-01-01" min="1975-01-01" required>
            <span>(*) ادخل تاريحخ ميلادك هنا (يشترط ان يكون بين 18 - 45)</span>
            <div class="error"><?php echo $birthdayErr;?> </div>
        </li>
        <li>
            <label for="Nationality">االجنسية</label>
            <select name="nationality" required>
                <option value="" disabled selected>إختر</option>
                <option value="أفغانستان">أفغانستان</option>
                <option value="ألبانيا">ألبانيا</option>
                <option value="الجزائر">الجزائر</option>
                <option value="أندورا">أندورا</option>
                <option value="أنغولا">أنغولا</option>
                <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                <option value="الأرجنتين">الأرجنتين</option>
                <option value="أرمينيا">أرمينيا</option>
                <option value="أستراليا">أستراليا</option>
                <option value="النمسا">النمسا</option>
                <option value="أذربيجان">أذربيجان</option>
                <option value="البهاما">البهاما</option>
                <option value="البحرين">البحرين</option>
                <option value="بنغلاديش">بنغلاديش</option>
                <option value="باربادوس">باربادوس</option>
                <option value="بيلاروسيا">بيلاروسيا</option>
                <option value="بلجيكا">بلجيكا</option>
                <option value="بليز">بليز</option>
                <option value="بنين">بنين</option>
                <option value="بوتان">بوتان</option>
                <option value="بوليفيا">بوليفيا</option>
                <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
                <option value="بوتسوانا">بوتسوانا</option>
                <option value="البرازيل">البرازيل</option>
                <option value="بروناي">بروناي</option>
                <option value="بلغاريا">بلغاريا</option>
                <option value="بوركينا فاسو ">بوركينا فاسو </option>
                <option value="بوروندي">بوروندي</option>
                <option value="كمبوديا">كمبوديا</option>
                <option value="الكاميرون">الكاميرون</option>
                <option value="كندا">كندا</option>
                <option value="الرأس الأخضر">الرأس الأخضر</option>
                <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
                <option value="تشاد">تشاد</option>
                <option value="تشيلي">تشيلي</option>
                <option value="الصين">الصين</option>
                <option value="كولومبيا">كولومبيا</option>
                <option value="جزر القمر">جزر القمر</option>
                <option value="كوستاريكا">كوستاريكا</option>
                <option value="ساحل العاج">ساحل العاج</option>
                <option value="كرواتيا">كرواتيا</option>
                <option value="كوبا">كوبا</option>
                <option value="قبرص">قبرص</option>
                <option value="التشيك">التشيك</option>
                <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                <option value="الدنمارك">الدنمارك</option>
                <option value="جيبوتي">جيبوتي</option>
                <option value="دومينيكا">دومينيكا</option>
                <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
                <option value="تيمور الشرقية ">تيمور الشرقية </option>
                <option value="الإكوادور">الإكوادور</option>
                <option value="مصر">مصر</option>
                <option value="السلفادور">السلفادور</option>
                <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                <option value="إريتريا">إريتريا</option>
                <option value="إستونيا">إستونيا</option>
                <option value="إثيوبيا">إثيوبيا</option>
                <option value="فيجي">فيجي</option>
                <option value="فنلندا">فنلندا</option>
                <option value="فرنسا">فرنسا</option>
                <option value="الغابون">الغابون</option>
                <option value="غامبيا">غامبيا</option>
                <option value="جورجيا">جورجيا</option>
                <option value="ألمانيا">ألمانيا</option>
                <option value="غانا">غانا</option>
                <option value="اليونان">اليونان</option>
                <option value="جرينادا">جرينادا</option>
                <option value="غواتيمالا">غواتيمالا</option>
                <option value="غينيا">غينيا</option>
                <option value="غينيا بيساو">غينيا بيساو</option>
                <option value="غويانا">غويانا</option>
                <option value="هايتي">هايتي</option>
                <option value="هندوراس">هندوراس</option>
                <option value="المجر">المجر</option>
                <option value="آيسلندا">آيسلندا</option>
                <option value="الهند">الهند</option>
                <option value="إندونيسيا">إندونيسيا</option>
                <option value="إيران">إيران</option>
                <option value="العراق">العراق</option>
                <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
                <option value="فلسطين" selected>فلسطين</option>
                <option value="إيطاليا">إيطاليا</option>
                <option value="جامايكا">جامايكا</option>
                <option value="اليابان">اليابان</option>
                <option value="الأردن">الأردن</option>
                <option value="كازاخستان">كازاخستان</option>
                <option value="كينيا">كينيا</option>
                <option value="كيريباتي">كيريباتي</option>
                <option value="الكويت">الكويت</option>
                <option value="قرغيزستان">قرغيزستان</option>
                <option value="لاوس">لاوس</option>
                <option value="لاوس">لاوس</option>
                <option value="لاتفيا">لاتفيا</option>
                <option value="لبنان">لبنان</option>
                <option value="ليسوتو">ليسوتو</option>
                <option value="ليبيريا">ليبيريا</option>
                <option value="ليبيا">ليبيا</option>
                <option value="ليختنشتاين">ليختنشتاين</option>
                <option value="ليتوانيا">ليتوانيا</option>
                <option value="لوكسمبورغ">لوكسمبورغ</option>
                <option value="مدغشقر">مدغشقر</option>
                <option value="مالاوي">مالاوي</option>
                <option value="ماليزيا">ماليزيا</option>
                <option value="جزر المالديف">جزر المالديف</option>
                <option value="مالي">مالي</option>
                <option value="مالطا">مالطا</option>
                <option value="جزر مارشال">جزر مارشال</option>
                <option value="موريتانيا">موريتانيا</option>
                <option value="موريشيوس">موريشيوس</option>
                <option value="المكسيك">المكسيك</option>
                <option value="مايكرونيزيا">مايكرونيزيا</option>
                <option value="مولدوفا">مولدوفا</option>
                <option value="موناكو">موناكو</option>
                <option value="منغوليا">منغوليا</option>
                <option value="الجبل الأسود">الجبل الأسود</option>
                <option value="المغرب">المغرب</option>
                <option value="موزمبيق">موزمبيق</option>
                <option value="بورما">بورما</option>
                <option value="ناميبيا">ناميبيا</option>
                <option value="ناورو">ناورو</option>
                <option value="نيبال">نيبال</option>
                <option value="هولندا">هولندا</option>
                <option value="نيوزيلندا">نيوزيلندا</option>
                <option value="نيكاراجوا">نيكاراجوا</option>
                <option value="النيجر">النيجر</option>
                <option value="نيجيريا">نيجيريا</option>
                <option value="كوريا الشمالية ">كوريا الشمالية </option>
                <option value="النرويج">النرويج</option>
                <option value="سلطنة عمان">سلطنة عمان</option>
                <option value="باكستان">باكستان</option>
                <option value="بالاو">بالاو</option>
                <option value="بنما">بنما</option>
                <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                <option value="باراغواي">باراغواي</option>
                <option value="بيرو">بيرو</option>
                <option value="الفلبين">الفلبين</option>
                <option value="بولندا">بولندا</option>
                <option value="البرتغال">البرتغال</option>
                <option value="قطر">قطر</option>
                <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                <option value="رومانيا">رومانيا</option>
                <option value="روسيا">روسيا</option>
                <option value="رواندا">رواندا</option>
                <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                <option value="سانت لوسيا">سانت لوسيا</option>
                <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
                <option value="ساموا">ساموا</option>
                <option value="سان مارينو">سان مارينو</option>
                <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
                <option value="السعودية">السعودية</option>
                <option value="السنغال">السنغال</option>
                <option value="صربيا">صربيا</option>
                <option value="سيشيل">سيشيل</option>
                <option value="سيراليون">سيراليون</option>
                <option value="سنغافورة">سنغافورة</option>
                <option value="سلوفاكيا">سلوفاكيا</option>
                <option value="سلوفينيا">سلوفينيا</option>
                <option value="جزر سليمان">جزر سليمان</option>
                <option value="الصومال">الصومال</option>
                <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                <option value="جنوب السودان">جنوب السودان</option>
                <option value="إسبانيا">إسبانيا</option>
                <option value="سريلانكا">سريلانكا</option>
                <option value="السودان">السودان</option>
                <option value="سورينام">سورينام</option>
                <option value="سوازيلاند">سوازيلاند</option>
                <option value="السويد">السويد</option>
                <option value="سويسرا">سويسرا</option>
                <option value="سوريا">سوريا</option>
                <option value="طاجيكستان">طاجيكستان</option>
                <option value="تنزانيا">تنزانيا</option>
                <option value="تايلاند">تايلاند</option>
                <option value="توغو">توغو</option>
                <option value="تونجا">تونجا</option>
                <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                <option value="تونس">تونس</option>
                <option value="تركيا">تركيا</option>
                <option value="تركمانستان">تركمانستان</option>
                <option value="توفالو">توفالو</option>
                <option value="أوغندا">أوغندا</option>
                <option value="أوكرانيا">أوكرانيا</option>
                <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                <option value="المملكة المتحدة">المملكة المتحدة</option>
                <option value="الولايات المتحدة">الولايات المتحدة</option>
                <option value="أوروغواي">أوروغواي</option>
                <option value="أوزبكستان">أوزبكستان</option>
                <option value="فانواتو">فانواتو</option>
                <option value="فنزويلا">فنزويلا</option>
                <option value="فيتنام">فيتنام</option>
                <option value="اليمن">اليمن</option>
                <option value="زامبيا">زامبيا</option>
                <option value="زيمبابوي">زيمبابوي</option>
            </select>
            <span>(*) حدد جنسيتك هناا</span>
            <div class="error"><?php echo $NationalityErr;?> </div>
        </li>
        <li>

            <label for="identification">رقم الهوية</label>
            <input type="number" name="identification" maxlength="100" required>
            <span>(*) ادخل رقم الهوية اذا كنت فلسطينيا/رقم الجواز اذا كان غير ذلك  </span>
            <div class="error"><?php echo $identificationErr;?> </div>
        </li>
        <li>

            <label for="phone">رقم الهاتف</label>
            <input type="number" name="phone" maxlength="100" required>
            <span>ادخل رقم الهاتف هنا  </span>
        </li>
        <li>
            <label for="email">البريد الالكتروني</label>
            <input type="email" name="email" maxlength="100" >
            <span>ادخل بريدك الالكتروني هنا</span>
            <div class="error"><?php echo $emailErr;?> </div>
        </li>
        <li>
            <label for="Residence">مكان السكن</label>
            <input type="text" name="Residence" maxlength="100">
            <span>ادخل مكان سكنك هنا</span>
        </li>
        <li>
            <input type="submit" name="submit" value=" ارسال ">
        </li>
    </ul>
</form>
</body>
</html>