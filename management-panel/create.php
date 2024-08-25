<?php
//this file is for creating a user in site.

require ".././functions/helper.php";
require_once "../functions/Datebase.php";
require_once ".././functions/users-function.php";

 $error="";    //this error shows in line 275 if we have error.
 $message="";  //this message shows in line 276 if we enter user's information
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

				  if(!empty($_FILES['image'])){
					   //this function defined in folder functions file users-function.
					   //this function saves images
					   $image = uploadImage($_FILES['image'] ,  'users-image');
				    }
				  //this function defined in folder functions file users-function.
				  //this function creates new user.
				  createUser($_POST['firstName'],$_POST['lastName'],$_POST['phoneNumber'],$_POST['email'],$_POST['password'], $image);  
				//   $message="کاربر ذخیره شد";
				header('Location:https://zeinab-jafarzadeh.github.io/management-panel/index1.php');
			  }
		  }else{
			  $error="رمز عبور شما باید حداقل 6 کاراکتر باشد";
		  }
	  }else{
		  $error="لطفا تمام فیلدها را تکمیل کنید";
	  }
 
 
 
 
  }


?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> قالب مدیریتی </title>
	<!-- <link rel="shortcut icon" href="assets/media/image/favicon.png"> -->
	<meta name="theme-color" content="#5867dd">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/bundle.css'); ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/slick/slick.css'); ?>">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/slick/slick-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/vmap/jqvmap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo asset('management-panel/assets/css/app.css'); ?>" type="text/css">
</head>
<body class="small-navigation">
	<main class="main-content">

		<div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد کاربر</h6>
                    <form method="POST" action="<?php echo asset('management-panel/create.php'); ?>" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="firstName">
                            </div>
                        </div>
						<div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="lastName" >
                            </div>
                        </div>
						<div class="form-group row">
                            <label  class="col-sm-2 col-form-label">موبایل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="phoneNumber">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">ایمیل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="email" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">پسورد</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
							<label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
							<input type="file" class="col-sm-10 form-control-file" id="file" name="image">
						</div>
                        <div class="form-group row">
							<button type="submit" name="submit" class="btn btn-success btn-uppercase">
								<i class="ti-check-box m-r-5"></i> ذخیره
							</button>
                          
                        </div>
						<p style="color:red;"><?php if($error !== ""){ echo $error ;} ?></p>
					    <p style="color:green;"><?php if($message !== ""){ echo $message ;} ?></p>
                    </form>
                </div>
            </div>
        </div>
		
        </div>

	</main>
	<script src="<?php echo asset('management-panel/vendors/bundle.js'); ?>"></script>
	<script src="<?php echo asset('management-panel/vendors/slick/slick.min.js'); ?>"></script>
	<script src="<?php echo asset('management-panel/vendors/vmap/jquery.vmap.min.js'); ?>"></script>
	<script src="<?php echo asset('management-panel/assets/js/app.js'); ?>"></script>
</body>
</html>