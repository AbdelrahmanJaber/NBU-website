<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>NBU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap">
      <div class="site-navbar-top">
        <div class="container py-3">
          <div class="row align-items-center">
            <div class="col-6">
              <div class="d-flex mr-auto">
                <a href="#" class="d-flex align-items-center mr-4">

                  <span class="d-none d-md-inline-block"><img src="images/nbulogoo.jpg.png"alt="nbulogoo.jpg" style="width:80px;height: 35px;"></span>
                </a>

              </div>
            </div>
            <div class="col-6 text-right">
              <div class="mr-auto">
                <a href="#" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                <a href="#" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="p-2 pl-0"><span class="icon-linkedin"></span></a>
                <a href="#" class="p-2 pl-0"><span class="icon-instagram"></span></a>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-2">
              <h1 class="my-0 site-logo"><a href="\ProjectFinal\NBUlogin.html">NBU</a></h1>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu main-menu js-clone-nav d-none d-lg-block">

                    <li class="has-children">
                      <a href="#" class="nav-link">تسجيل الدخول</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="\ProjectFinal\NBUlogin.html" class="nav-link">NBU</a></li>
                        <li><a href="\ProjectFinal\IRBLogin.html" class="nav-link">IRB</a></li>
                        <li><a href="\ProjectFinal\MOHLogin.html" class="nav-link">MOH</a></li>
                      </ul>
                    </li>
                    <li><a href="#site-footer" class="nav-link">معلومات الاتصال</a></li>
                    <li><a href="https://goo.gl/maps/SUjyz4GERz6UqQEq6" target="_blank" style="text-decoration: none">أعثر علينا</a></li>
                    <li><a href="#gallery-section" class="nav-link">فورم التطوع</a></li>
                    <li><a href="#MOH" class="nav-link">وزارة الصحة</a></li>
                    <li><a href="#IRB" class="nav-link">لجنة الرقابة</a></li>
                    <li><a href="#classes-section" class="nav-link"> NBUما هي ال</a></li>

                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-blocks-cover overlay" style="background-image: url(images/topimage.png);" data-aos="fade" data-stellar-background-ratio="0.5"id="home-section">
      <div class="container">
        <div class="row align-items-center text-center justify-content-center">
          <div class="col-md-8">
           
            <h1 class="font-weight-bold">NBUمرحبا بكم في </h1>
            <p class="sub-text mb-4 d-block">نحافظ على النزاهة.القيم.الاخلاق</p>
             <a data-fancybox data-ratio="2" href="https://www.youtube.com/embed/O2YS5dyexQU" class="d-inline-flex align-items-center">
              <span class="play-button d-block mr-3">
                <span class="icon-play"></span>
              </span>
              <span class="text-white">شاهد الفيديو</span>
            </a>
          </div>
        </div>
      </div>
    </div>  

    
    <section class="site-section" id="classes-section">

      <div class="clearfix mb-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-7 text-left heading-wrap">

              <h2 class="mt-0">(NBU)وحدة النجاح </h2>
              <p>دائما معكم</p>

            </div>
            <div class="col-md-5 align-self-center text-md-right">
              <a href="#" class="btn btn-primary customPrevBtn">السابق</a>
              <a href="#" class="btn btn-primary customNextBtn">التالي</a>
            </div>
          </div>
        </div>
      </div>

      <div class="owl-carousel centernonloop">
        <div  class="item-class">
          <img src="images/a24.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a2.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a3.PNG" alt="" class="img-fluid">
        </div>
        <div class="item-class">
          <img src="images/a4.PNG" alt="" class="img-fluid">
        </div>
        <div class="item-class">
          <img src="images/a5.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a6.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a6.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a7.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a8.PNG" alt="" class="img-fluid">
        </div>
        <div class="item-class">
          <img src="images/a9.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a10.PNG" alt="" class="img-fluid">
        </div>

        <div  class="item-class">
          <img src="images/a12.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a13.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/aa13.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a14.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a15.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a16.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a17.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a18.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a19.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a20.PNG" alt="" class="img-fluid">
        </div>
        <div  class="item-class">
          <img src="images/a21.PNG" alt="" class="img-fluid">
        </div>

        <div  class="item-class">
          <img src="images/a23.PNG" alt="" class="img-fluid">
        </div>


      </div>

    </section> <!-- .section -->

    <section class="site-section" id="IRB">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="text-left heading-wrap mb-5">
              <img src="images/a22.PNG" alt="Image" class="img-overlap-1">
              <img src="images/IRBlogoo.jpg" alt="Image" class="img-overlap-2">
             </div>
          </div>
          <div class="col-md-6 position-relative align-self-center" style="text-align: right">
            <h1 class="mt-0 mb-5">IRB</h1>
            <p><b>ضمن إطار تحضيرات وحدة التكافؤ الحيوي في جامعة النجاح الوطنية، أنشأت اللجنة المؤسسية الأخلاقية ووحدة التكافؤ الحيوي في جامعة النجاح الوطنية نظام اللجنة المؤسسية الأخلاقية (لجنة أخلاقيات البحث العلمي في جامعة النجاح الوطنية) (IRB)، والذي من أهدافه الموافقة على إجراء الدراسات الدوائية السريرية التي ستقوم بها وحدة التكافؤ الحيوي في الجامعة.</b> </p>

          </div>
        </div>
      </div>
    </section>
    <section class="site-section" id="MOH">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="text-left heading-wrap mb-5" >
              <div style="text-align: right">
              <h2 class="mt-0 mb-5">MOH</h2>
              <p><b>تسعى الادارة العامة لصحة العامة الى تعزيز وحماية صحة المواطنين والتاسيس لمجتمع صحي من خلال تقديم الخدمات الصحية الوقائية والعلاجية لكافة شرائح المجتمع ضمن المعايير العالمية و باحدث الاساليب العلمية  والمبنية على الابحاث و المعرفة والمهارات اللازمة بكوادر مؤهلة وبمشاركة فاعلة من الاطراف ذات العلاقة والمجتمع لمواكبة التطور والاحتياج للمجتمع. </b> </p>

              </div>
            </div>
          </div>
          <div class="col-md-6 position-relative align-self-center" >
            <img src="images/mooh.png" alt="Image" class="img-overlap-1">
            <img src="images/qqq.jpg" alt="Image" class="img-overlap-2">
          </div>
        </div>
      </div>
    </section>


<!-- هاد الخاص بالدراسات وفورم التسجيل -->
    <section class="site-section" id="gallery-section">
      <div class="container">

        <div class="row">
          <div class="col-12 heading-wrap text-center mb-5">
            <h2 class="mb-5">الدراسة الحالية</h2>


          </div>
        </div>



<!--        studies-->
<div id="show_study_text" style="margin-top: 15px">

  <?php
if(isset($_SESSION["study_text"])){
    echo '<p style="font-size: 18px ; color: black ; border: 2px solid #79b7e7 ; padding:7px ; margin-top: 0px;text-align: right;"><b>'.$_SESSION["study_text"].'</b></p>';
    echo"<p style='text-align: center;font-size: 22px'><a href='/ProjectFinal/formFile.php'>سجل الان</a></p>";
}

  ?>

</div>
        </div>
      </div>
    </section>


<!--    خاص بارسال ايميل -->
    <section class="site-section element-animate" id="contact-section">
      <div class="mb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>أرسل لنا</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <form action="#" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">الاسم</label>
                  <input type="text" id="name" class="form-control ">
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">رقم الهاتف</label>
                  <input type="text" id="phone" class="form-control ">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">البريد الالكتروني</label>
                  <input type="email" id="email" class="form-control ">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">اكتب رسالة</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary">
                </div>
              </div>
            </form>
          </div>
          
          <div class="col-lg-6 pl-2 pl-lg-5">

            <div class="col-md-8 mx-auto contact-form-contact-info">
              <h4 class="mb-5">سيتم ارسال هاذا البريد الى nbu@najah.edu</h4>
                <p class="d-flex">
                  <span class="ion-ios-location icon mr-5"></span>
                  <span>لمزيد من المعلومات</span>
                </p>

                <p class="d-flex">
                  <span class="ion-ios-telephone icon mr-5"></span>
                  <span> يمكنك الاتصال على الارقام بالاسفل او ترك بريدك الالكتروني ليتم التواصل معك</span>
                </p>



          </div>
        </div>
      </div>
      </div>
    </section>

    <!--    الfooter  -->
    <footer class="site-footer" id="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-12">
                <h3 class="footer-heading mb-4">عنواننا</h3>
                <p>فلسطين/نابلس/جامعة النجاح الوطنية/الحرم الجديد/المراكز العلمية-الطابق الرابع/وحدة النجاح للابحاث الحيوية والسريرية (NBU)</p>
              </div>
            </div>
            

            
          </div>
          <div class="col-lg-4">
           
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">ارقامنا للتواصل</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">+97092345113</a></li>
                  <li><a href="#">+97092345115</a></li>
                  <li><a href="#">0598045018</a></li>
                  <li><a href="#">3463463463</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">رقم الهاتف النقال</a></li>
                  <li><a href="#">+970592055079</a></li>
                  <li><a href="#">رقم الفاكس</a></li>
                  <li><a href="#">+97092355043</a></li>
                </ul>
              </div>
            </div>
            
          </div>
          

          <div class="col-lg-4 mb-5 mb-lg-0">

            <div class="mb-5">
              <h3 class="footer-heading mb-2">تواصل معنا عبر الايميل</h3>
              <p>ادخل ايميلك حيث سيتم الرد عليك من خلال رسالة</p>

              <form action="#" method="post" class="form-subscribe">
                <div class="input-group mb-3">

                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="ادخل ايميلك" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="button-addon2">ارسال</button>
                  </div>
                </div>
              </form>

            </div>




          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">

            <p><a href="#"> للاستفسار عن حقوقي كمتطوع :- د.حسن فيتان</a></p>
            <br>
            <p><a href="#">للاستفسارات الطبية المتعلقة بالدراسة:- د.قصي عبدة د.يوسف الهمشري</a></p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/main.js"></script>
     
  </body>
</html>