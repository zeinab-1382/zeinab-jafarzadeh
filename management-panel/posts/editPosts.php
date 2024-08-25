<?php
require "../../functions/helper.php";
require_once "../../functions/Datebase.php";
require_once "../../functions/posts-function.php";
require_once "../../functions/categories-function.php";
require_once "../../functions/subCategories-function.php";
require_once "../../functions/users-function.php";

session_start();
if(!isset($_SESSION['user'])){
   header('Location:https://zeinab-jafarzadeh.github.io/login.php');
}

$user_id = checkUser($_SESSION['user'])->id;

$categories=getAllCategories();
$subCategories = getAllSubCategories();

if(isset($_GET['id'])){
   $id=$_GET['id'];
   
}
$post = getPostById($id);

$error="";    //this error shows in line 275 if we have error.
$message="";  //this message shows in line 276 if we enter user's information
if(isset($_POST['submit'])){
	  if( 
		  isset($_POST['title']) && !empty($_POST['title'])
		  && isset($_POST['body']) && !empty($_POST['body'])
          && isset($_POST['price']) && !empty($_POST['price'])
          && isset($_POST['size']) && !empty($_POST['size'])
          && isset($_POST['color']) && !empty($_POST['color'])
		  && isset($_POST['status']) && !empty($_POST['status'])
          && isset($_POST['category_id']) && !empty($_POST['category_id'])
          && isset($_FILES['image']) && !empty($_FILES['image']['name'])
	    )
	    {
          
           updatePost($id,$_POST['title'],$_POST['body'],$_POST['price'],$_POST['size'], $_POST['color'], $_POST['inventory'] , $_POST['status'],$_POST['category_id'], $_POST['subcategory_id'],$_FILES['image']);
           $message="ذخیره شد";
           header('Location:https://zeinab-jafarzadeh.github.io/management-panel/posts/index1Posts.php');
          
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
					    <li class="breadcrumb-item"><a href="<?php echo asset('management-panel/index.php'); ?>">رفتن به داشبورد اصلی</a></li>
					    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo asset('management-panel/posts/index1Posts.php'); ?>"> صفحه لیست محصولات</a></li>
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
                    <h6 class="card-title">ویرایش محصول</h6>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">عنوان محصول</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="title" value="<?php echo $post->title ?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label  class="col-sm-2 col-form-label">توضیحات محصول</label>
                            <div class="col-sm-10">
                               <textarea name="body"  class="form-control text-left" cols="30" rows="10" ><?php echo $post->body ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">قیمت محصول</label>
                            <div class="col-sm-10">
							    <input type="text" class="form-control text-left"  dir="rtl" name="price" value="<?php echo $post->price ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">سایز محصول</label>
                            <div class="col-sm-10">
							    <input type="text" class="form-control text-left"  dir="rtl" name="size" value="<?php echo $post->size ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">رنگ محصول</label>
                            <div class="col-sm-10">
							    <input type="text" class="form-control text-left"  dir="rtl" name="color" value="<?php echo $post->color ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">موجودی محصول</label>
                            <div class="col-sm-10">
							    <input type="text" class="form-control text-left"  dir="rtl" name="inventory" value="<?php echo $post->inventory ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="exampleFormControlSelect1">دسته بندی</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                <?php foreach($categories as $category){ ?>
                                <?php if($category->id == $post->category_id){ ?>
                                <option selected value="<?php echo $category->id  ?>"><?php echo $category->title  ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo $category->id  ?>"><?php echo $category->title  ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
						<div class="form-group">
                            <label for="exampleFormControlSelect1">نوع دسته بندی</label>
                            <select name="subcategory_id" class="form-control" id="exampleFormControlSelect1">
                                <?php foreach($subCategories as $subCategory){ ?>
                                <option value="<?php echo $subCategory->id  ?>"><?php echo $subCategory->title  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">وضعیت</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">

                                <?php if($post->status === "draft"){ ?>
                                    <option selected value="draft">پیش نویس</option>
                                <?php }else{ ?>
                                    <option value="draft">پیش نویس</option>
                                <?php } ?>


                                <?php if($post->status === "published"){ ?>
                                    <option selected value="published">منتشر شده</option>
                                <?php }else{ ?>
                                    <option value="published">منتشر شده</option>
                                <?php } ?>

                                <?php if($post->status === "archived"){ ?>
                                    <option selected value="archived">بایگانی</option>
                                <?php }else{ ?>
                                    <option value="archived">بایگانی</option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group row">
							<label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
							<input type="file" class="col-sm-10 form-control-file" id="file" name="image">
						</div>
                        <div class="form-group row">
							<button type="submit"  name="submit" class="btn btn-success btn-uppercase">
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