<?php
require "../../functions/helper.php";
require_once "../../functions/Datebase.php";
require_once "../../functions/categories-function.php";

if(isset($_GET['id'])){
   $id=$_GET['id'];
   $category = getCategoryById($id);
}
$error="";    //this error shows in line 275 if we have error.
$message="";  //this message shows in line 276 if we enter user's information
if(isset($_POST['submit'])){
	    if( 
		    isset($_POST['title']) && !empty($_POST['title'])
	    )
	    {
		    //this function defined in folder functions file categories-function.
            updateCategories($id,$_POST['title']);
			// $message="کاربر ویرایش شد";
			header('Location:https://zeinab-jafarzadeh.github.io/management-panel/categories/index1Categories.php');
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
	<link rel="shortcut icon" href="assets/media/image/favicon.png">
	<meta name="theme-color" content="#5867dd">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/bundle.css'); ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/slick/slick.css'); ?>">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/slick/slick-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo asset('management-panel/vendors/vmap/jqvmap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo asset('management-panel/assets/css/app.css'); ?>" type="text/css">
</head>
<body class="small-navigation">
	<!-- begin::header -->
	<div class="header">
		<!-- begin::header body -->
		<div class="header-body">
			<div class="header-body-left">
				<h3 class="page-title">داشبورد</h3>
				<!-- begin::breadcrumb -->
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="<?php echo asset('management-panel/index.php'); ?>"> داشبورد اصلی</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo asset('management-panel/categories/index1categories.php'); ?>"> صفحه لیست دسته بندی ها</a></li>
					</ol>
				</nav>
				<!-- end::breadcrumb -->
			</div>

		</div>
		<!-- end::header body -->

	</div>
	<!-- end::header -->
	<!-- begin::main content -->
	<main class="main-content">
		<div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش دسته بندی اجناس</h6>
                    <form method="POST" action="<?php echo asset('management-panel/categories/editCategories.php?id=').$category->id ?>">
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">عنوان دسته بندی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="title" value="<?php echo $category->title ?>">
                            </div>
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