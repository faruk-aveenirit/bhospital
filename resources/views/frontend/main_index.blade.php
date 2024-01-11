<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bangkok Hospital Thailand</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/frontend/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/frontend/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/frontend/css/util.css">
    <link rel="stylesheet" type="text/css" href="/frontend/css/main.css">
    <style>
        .is-invalid{
            border: 1px solid #e82e2e;
        }
    </style>
    <!--===============================================================================================-->
</head>
<body>


<div class="size1 bg0 where1-parent">
    <!-- Coutdown -->
    <div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('images/bg01.jpg');">
        <div class="wsize2 flex-w flex-c-m cd100 js-tilt">
            <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                <span class="l2-txt1 p-b-9 days">10</span>
                <span class="s2-txt4">Days</span>
            </div>

            <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                <span class="l2-txt1 p-b-9 hours">2</span>
                <span class="s2-txt4">Hours</span>
            </div>

            <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                <span class="l2-txt1 p-b-9 minutes">30</span>
                <span class="s2-txt4">Minutes</span>
            </div>

            <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                <span class="l2-txt1 p-b-9 seconds">30</span>
                <span class="s2-txt4">Seconds</span>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
        <!-- <div class="wrap-pic1">
            <img src="images/icons/logo.png" alt="LOGO">
        </div> -->

        <div>
            <p class="m1-txt1 p-b-36">
                <!-- Our website is <span class="m1-txt2">Coming Soon</span><br> -->
                <span style="font-size: 18px;">আনন্দের সাথে জানানো যাচ্ছে যে, আগামী ২৫ জানুয়ারি,
						২০২৪ ইং তারিখে বিকাল ১টা হতে ৫টা পর্যন্ত ব্যাংকক
						হসপিটাল থাইল্যান্ড এর ৪ জন বিশেষজ্ঞ ডাক্তার দ্বারা
						সম্পূর্ণ ফ্রি পরামর্শ দেওয়া হবে। যারা পরামর্শ নিতে আগ্রহী
						তাদের নিচে দেয়া Registration Form পূরণ
						করার অনুরোধ করা হল। </span>
            </p>

            <form class="contact100-form validate-form" method="POST" action="{{route('doctor.appointment.registration')}}">
                @csrf
                <div class="wrap-input100 m-b-10 validate-input" data-validate = "Full Name is required">
                    <input class="s2-txt1 placeholder0 input100 {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" placeholder="Full Name *">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-10 validate-input" data-validate ="Phone is required">
                    <input class="s2-txt1 placeholder0 input100 {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="number" name="phone" placeholder="Phone No *">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-10 validate-input" data-validate ="E-mail is required">
                    <input class="s2-txt1 placeholder0 input100 {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="E-mail Address *">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-10">
                    <input class="s2-txt1 placeholder0 input100" type="text" name="passport_number" placeholder="Passport No">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-10 validate-input" data-validate ="Doctor is required">
                    <select class="input100  select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor" style="border: none">
                        <option value="">Please Select *</option>
                        @foreach(\App\Models\Appointment::DOCTOR_SELECT as $key=>$doctor)
                            <option value="{{$key}}">{{$doctor}}</option>
                        @endforeach
                    </select>
{{--                    <input class="s2-txt1 placeholder0 input100" type="text" name="passport_number" placeholder="Passport No">--}}
                    <span class="focus-input100"></span>
                </div>

                <div class="w-full">
                    <button class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04">
                        Registration
                    </button>
                </div>
            </form>


        </div>

        <div class="flex-w">
            <a href="https://www.facebook.com/bangkokhospitaldhaka" target="_blank" class="flex-c-m size5 bg3 how1 trans-04 m-r-5">
                <i class="fa fa-facebook"></i>
            </a>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="/frontend/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/frontend/vendor/bootstrap/js/popper.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/frontend/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/frontend/vendor/countdowntime/moment.min.js"></script>
<script src="/frontend/vendor/countdowntime/moment-timezone.min.js"></script>
<script src="/frontend/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="/frontend/vendor/countdowntime/countdowntime.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var a = moment();//now
    var b = moment('2024-01-21T18:00:55');
    $('.cd100').countdown100({
        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: 0,
        endtimeMonth: 0,
        endtimeDate: 10,
        endtimeHours: 2,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: ""
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });
</script>
<!--===============================================================================================-->
<script src="/frontend/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="/frontend/js/main.js"></script>

</body>
</html>
