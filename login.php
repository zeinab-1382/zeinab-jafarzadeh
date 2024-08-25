<?php

require_once "functions\helper.php";
require_once "functions\Datebase.php";
require_once "functions\users-function.php";
   global $conn;
   

   $error="";    //this error shows in line 48 if we have error.

   session_start();
   //if entrance password is equal with saved password then do as follow
   if(isset($_SESSION['user'])){
       header('Location:https://zeinab-jafarzadeh.github.io/index2(mainPage).php');
    }


   if(isset($_POST['submit'])){
        if( 
            isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['password']) && !empty($_POST['password'])
        )
        {   
            //this function defined in folder functions file users-function.
            //this function checks that entrance email is repititive or not.
            $user=checkUser($_POST['email']);
            
            //if entrance password is equal with saved password then do as follow
            if($user && password_verify($_POST['password'],$user->password)){
        
                $_SESSION['user']=$user->email;  //this session keep email and information of user and user can enter to his/her account without login
                header('Location:https://zeinab-jafarzadeh.github.io/index2(mainPage).php');
                // header(asset('index2(mainPage).php'));
                
            }else{
                $error="اطلاعات وارد شده صحیح نمی باشد";
            }
          
        }else{
            $error="لطفا تمام فیلدها را تکمیل کنید";
        }
   
   
   
   
    }

   




?>











<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo asset('login.css'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Pink Shop</title>
</head>
<body>
    <div class="container">
        <form class="form" action="login.php" method="POST">
            <h1 class="enter-text">ورود به سایت پینک</h1>
            <p class="text-userAccount">اگر حساب کاربری دارید وارد شوید</p>
            <!--input for receive email from user-->
            <label class="label" for="email">:ایمیل</label><br>
            <input class="input" name="email" type="email"><br>
            <!--input for receive password from user-->
            <label class="label" for="password">:پسورد</label><br>
            <input class="input" name="password" type="password"><br>
            <p><?php if($error !== ""){ echo $error ;} ?></p>
            <button type="submit" name="submit" class="buttonEnter">ورود</button>
            <div class="text">
                حساب کاربری ندارید؟
                <a class="register" href="<?php echo asset('registration.php'); ?>">ثبت نام کنید</a>
            </div>
    
        </form>
    </div>
</body>
</html>