<?php
require_once "functions\helper.php";
require_once "functions\Datebase.php";
require_once "functions\users-function.php";

   global $conn;
   session_start();
   $error="";    //this error shows in line 48 if we have error.

   if(isset($_POST['submit'])){
        if( 
            isset($_POST['firstName']) && !empty($_POST['firstName'])
            && isset($_POST['lastName']) && !empty($_POST['lastName'])
            && isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])
            && isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['password']) && !empty($_POST['password'])
        )
        {
            //this function defined in folder functions file users-function.
            //this function checks the length of entrance password.
            if(checkPasswordLength($_POST['password'])){
                //this function defined in folder functions file users-function.
                //this function checks that entrance email is repititive or not.
                if(checkUser($_POST['email'])){
                    $error="این ایمیل تکراری است";
                }else{
                    //this function defined in folder functions file users-function.
                    //this function creates new user.
                    createUser($_POST['firstName'],$_POST['lastName'],$_POST['phoneNumber'],$_POST['email'],$_POST['password'],$image);  
                    header('Location:https://zeinab-jafarzadeh.github.io/index2(mainPage).php');
                }
            }else{
                $error="رمز عبور شما باید حداقل 6 کاراکتر باشد";
            }
        }else{
            $error="لطفا تمام فیلدها را تکمیل کنید";
        }
   
   
   
   
    }

   




?>








<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo asset('registration.css'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration/Pink Shop</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="form">
            <h1 class="register-text">ثبت نام در سایت پینک</h1>
            <p class="text-making-userAccount">اگر حساب کاربری ندارید، ایجاد کنید</p>
            <!--input for receive first name from user-->
            <label class="label" for="firstName">:نام</label><br>
            <input class="input" name="firstName" type="text"><br>
             <!--input for receive last name from user-->
            <label class="label" for="lastName">:نام خانوادگی</label><br>
            <input class="input" name="lastName" type="text"><br>
            <!--input for receive phone number from user-->
            <label class="label" for="phoneNumber">:شماره موبایل</label><br>
            <input class="input" name="phoneNumber" type="tel" ><br>
            <!--input for receive email from user-->
            <label class="label" for="email">:ایمیل</label><br>
            <input class="input" name="email" type="email" ><br>
            <!--input for receive password from user-->
            <label class="label" for="password">:پسورد</label><br>
            <input class="input" name="password" type="password" ><br>
            <p><?php if($error !== ""){ echo $error ;} ?></p>
            <!--register button-->
            <button type="submit" name="submit" class="button_register" >ثبت نام</button>
            <div class="text">
                حساب کاربری دارید؟
                <a class="login" href="<?php echo asset('login.php'); ?>">وارد شوید</a>
            </div>

        </form>
    </div>
</body>
</html>


