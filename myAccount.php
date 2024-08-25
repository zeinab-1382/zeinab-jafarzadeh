<?php
require_once "./functions/helper.php";
require_once "functions\Datebase.php";
require_once "functions\users-function.php";

session_start();

if (!isset($_SESSION['user'])) {
    header('Location:https://zeinab-jafarzadeh.github.io/login.php');
}


$error = "";    //this error shows in line 275 if we have error.
$message = "";  //this message shows in line 276 if we enter user's information

if (isset($_POST['submit1'])) {

    if (
        isset($_POST['firstName']) && !empty($_POST['firstName'])
        && isset($_POST['lastName']) && !empty($_POST['lastName'])
        // && isset($_POST['homeaddress']) && !empty($_POST['homeaddress'])
        // && isset($_POST['postcode']) && !empty($_POST['postcode'])
    ) {
        updateInfoUser($_POST['firstName'], $_POST['lastName'], $_POST['homeaddress'], $_POST['postcode']);
        $message = "کاربر ویرایش شد";
        // header('Location:index1.php');
    } else {
        $error = "تمام فیلدها را تکمیل کنید";
    }

}

$error1 = "";    //this error shows in line 275 if we have error.
$message1 = "";  //this message shows in line 276 if we enter user's information

if (isset($_POST['submit2'])) {
    if (
        isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])
        && isset($_POST['password']) && !empty($_POST['password'])
        // && isset($_POST['homeaddress']) && !empty($_POST['homeaddress'])
        // && isset($_POST['postcode']) && !empty($_POST['postcode'])
    ) {
        updateInfoUserr($_POST['phoneNumber'], $_POST['password']);
        $message1 = "کاربر ویرایش شد";
        // header('Location:index1.php');
    } else {
        $error1 = "تمام فیلدها را تکمیل کنید";
    }

}




// if(isset($_POST['submit3'])){
//     deleteUser($_POST['id'],$_POST['firstName'],$_POST['lastName'],$_POST['phoneNumber'],$_POST['email'],$_POST['password'],$_FILES['image']);
//     header('Location:index(mainPage).php');
// }


?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo asset('myAccount.css'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account/Pink Shop</title>
</head>

<body class="show-trackOrders show-ExitFromUserAccount">
    <!--show-formInformation show-trackOrders show-ExitFromUserAccount-->
    <!--Header of "My Account" page-->
    <header class="header">
        <div class="container1">
            <div class="left-nav">
                <div class="fa fa-profile">
                    <a href="<?php echo asset('index2(mainPage).php'); ?>">
                        <!-- home icon -->
                        <i class="bi bi-house-fill">
                            <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor"
                                class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
            <!--name of shop-->
            <div class="right-nav">
                <div class="pink">pink فروشگاه اینترنتی</div>
            </div>
        </div>

    </header>
    <!--buttons(user account - follow orders - exit from user account) of "My Account" page-->
    <div class="container2">
        <!--profile account button-->
        <button onclick="myFunction1()" class="btn-profile-account">
            حساب کاربری
            <i class="bi bi-person-square">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-square" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path
                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                </svg>
            </i>
        </button>
        <!--profile account button-->
        <button onclick="myFunction2()" class="btn-order-follow">
            پیگیری سفارشات
            <i class="bi bi-card-checklist">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-card-checklist" viewBox="0 0 16 16">
                    <path
                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                    <path
                        d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                </svg>
            </i>
        </button>
        <!--exit button-->
        <button onclick="myFunction3()" class="btn-exit">
            خروج از حساب کاربری
            <i class="bi bi-arrow-bar-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5" />
                </svg>
            </i>
        </button>

    </div>
    <hr class="hr">
    <!--personal information-->
    <div class="container3">
        <!--text of personal information-->
        <div class="personal-information-text">
            اطلاعات شخصی
        </div>
        <!--text of personal information2-->
        <div class="personal-information-tex2">
            اطلاعات شخصی خود را وارد کنید
        </div>
        <form method="POST" action="" class="form1">
            <!--input for receive first name from user-->
            <label class="label" for="firstName">:نام</label><br>
            <input class="input" name="firstName" type="text"><br>
            <!--input for receive last name from user-->
            <label class="label" for="lastName">:نام خانوادگی</label><br>
            <input class="input" name="lastName" type="text"><br>
            <!--input for receive address from user-->
            <label for="address" class="label">:آدرس منزل/محل کار</label><br>
            <textarea name="homeaddress" class="address textarea"></textarea><br>
            <!--input for receive post code from user-->
            <label class="label" for="postCode">:کدپستی</label><br>
            <input class="input" name="postcode" type="numeric">
            <!-- error and massage for form -->
            <p style="color:red;"><?php if ($error !== "") {
                echo $error;
            } ?></p>
            <p style="color:green;"><?php if ($message !== "") {
                echo $message;
            } ?></p>
            <button type="submit" name="submit1" class="btn-update-personalInformation">بروزرسانی اطلاعات</button>
        </form>
        <!-- <hr class="hr1"> -->
        <!--updating email and password (user information)-->
        <div class="user-information-text">اطلاعات کاربری</div>
        <form method="POST" action="" class="form2">
            <!--input for updating email from user-->
            <label for="phoneNumber" class="label1">:شماره موبایل</label><br>
            <input type="tel" name="phoneNumber" class="input"><br>
            <!--input for updating password from user-->
            <label for="password" class="label1">:پسورد</label><br>
            <input type="password" name="password" class="input">
            <p style="color:red;"><?php if ($error1 !== "") {
                echo $error1;
            } ?></p>
            <p style="color:green;"><?php if ($message1 !== "") {
                echo $message1;
            } ?></p>
            <button class="btn-update-userInformation" type="submit" name="submit2">بروزرسانی اطلاعات کاربری</button>
        </form>
    </div>

    <div>
        <?php ?>
    </div>
    <!--track orders-->
    <div class="container4">
        <div class="text1">
            پیگیری سفارش
        </div><br>
        <div class="text2">
            شما می توانید از طریق این صفحه سفارش خود را پیگیری کنید
        </div>
        <div class="background-post">
            <img src="<?php echo asset('./photoes/post-site-picture.png'); ?>" alt="" class="image">
            <a href="https://tracking.post.ir/">
                <button type="submit" class="btn-enterPostSite" name="submit2">
                    ورود به سایت اداره پست
                </button>
            </a>
        </div>
    </div>

    <!--Exit from user account-->
    <div class="container5">
        برای خروج از حساب کاربری، بر روی دکمه زیر کلیک کنید
        <button class="button-exit" type="submit" name="submit3">خروج</button>
    </div>





    <!--Footer part-->
    <footer class="footer-container">
        <div class="footer-connection">
            <div class="footer-text1">:راه های ارتباطی با پینک شاپ</div>
            <!--telephone-->
            <div class="tell">
                <a href="tel:+98021-56389645">
                    <i class="bi bi-telephone-fill">
                        <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16" style="color: #ffffff;">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                    </i>
                </a>
            </div>
            <!--instagram-->
            <div class="instagram">
                <a href="http://instagram.com/{@zeynab_jafarzadeh82}/">
                    <i class="bi bi-instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16" style="color: #ffffff;">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </i>
                </a>
            </div>
            <!--telegram-->

            <div class="telegram">
                <a href="https://t.me/@Z_jafarzadeh26">
                    <i class="bi bi-telegram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor"
                            class="bi bi-telegram" viewBox="0 0 16 16" style="color: #ffffff;">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09" />
                        </svg>
                    </i>
                </a>
            </div>
        </div>
        <div class="footer-text2">
            <p class="footer-text3">.اعتماد شما اعتبار ماست</p>
            <p>ما در پینک شاپ تمام تلاش خود را انجام می دهیم تا <br>محصولی با کیفیت و قیمت مناسب را در سریع ترین زمان
                ممکن برای مشتریان خود فراهم کنیم</p>
        </div>
    </footer>



    <script src="<?php echo asset('myAccount.js'); ?>"></script>
</body>

</html>