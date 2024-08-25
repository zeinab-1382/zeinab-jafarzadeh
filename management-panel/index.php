<?php
//this file is dashboard of site.

require ".././functions/helper.php";
// session_start();
//if entrance password is equal with saved password then do as follow
// if(isset($_SESSION['user'])){
// 	header('Location:http:https://zeinab-jafarzadeh.github.io/index(mainPage).php');
// } 

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
	<div class="navigation">
		<div class="navigation-icon-menu">
			<ul>
				<li data-toggle="tooltip" title="کاربران">
					<a href="#users" title=" کاربران">
						<i class="icon ti-user">
							<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
						</i>
					</a>
				</li>
			</ul>
			<ul>
				<li data-toggle="tooltip" title="ویرایش پروفایل">
					<a href="<?php echo asset('myAccount.php'); ?>" class="go-to-page">
						<i class="icon ti-settings">
						    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            </svg>
						</i>
					</a>
				</li>
				<li data-toggle="tooltip" title="خروج">
					<a href="<?php echo asset('management-panel/logout.php'); ?>" class="go-to-page">
						<i class="icon ti-power-off">
						    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5" />
                            </svg>
						</i>
					</a>
				</li>
			</ul>
		</div>
		<div class="navigation-menu-body">
			<ul id="users">
				<li>
					<a href="#">کاربران</a>
					<ul>
						<li><a href="<?php echo url('/management-panel/create.php')?>">ایجاد کاربر</a></li>
						<li><a href="<?php echo url('/management-panel/index1.php')?>">لیست کاربران</a></li>
						
					</ul>
				</li>
				<li>
		</div>
	</div>
	<!-- begin::header -->
	<div class="header">
		<!-- begin::header body -->
		<div class="header-body">
			<div class="header-body-left">
				<h3 class="page-title">داشبورد</h3>
				<!-- begin::breadcrumb -->
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page"> 
						    <a href="<?php echo asset('index2(mainPage).php'); ?>" title=" صفحه اصلی">
						        <i class="icon ti-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-house-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                    </svg>
						        </i>
				            </a>
						</li>
						
						<li class="breadcrumb-item active" aria-current="page">
						    <a href="<?php echo asset('index2(mainPage).php'); ?>" title=" صفحه اصلی">
							    صفحه اصلی
						    </a>
						</li>
					</ol>
				</nav>
				<!-- end::breadcrumb -->
			</div>
			<div class="header-body-right">
				<div class="d-flex align-items-center">
					<!-- begin::navbar navigation toggler -->
					<div class="d-xl-none d-lg-none d-sm-block navigation-toggler">
						<a href="#">
							<i class="ti-menu"></i>
						</a>
					</div>
					<!-- end::navbar navigation toggler -->

					<!-- begin::navbar toggler -->
					<div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
						<a href="#">
							<i class="ti-arrow-down"></i>
						</a>
					</div>
					<!-- end::navbar toggler -->
				</div>
			</div>

		</div>
		<!-- end::header body -->

	</div>
	<!-- end::header -->
	<!-- begin::main content -->
	<main class="main-content">
	<div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
							<!-- users that manager wants to insert -->
                            <div>
					            <h4 class="font-weight-bold m-b-10 line-height-30 primary-font">کاربران</h4>
					            <ul>
						            <li class="mb-2 font-size-13 text-primary font-weight-bold primary-font"><a href="<?php echo url('/management-panel/create.php')?>">ایجاد کاربر</a></li>
						            <li class="mb-2 font-size-13 text-primary font-weight-bold primary-font"><a href="<?php echo url('/management-panel/index1.php')?>">لیست کاربران</a></li>
					            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
							<!-- classifications of products that manager wants to insert -->
                            <div> 
								<h4 class="font-weight-bold m-b-10 line-height-30 primary-font">دسته بندی اجناس فروشگاه</h4>
                                <ul>
	                                <li class="mb-2 font-size-13 text-success font-weight-bold primary-font"><a href="<?php echo url('/management-panel/categories/createCategories.php')?>">ایجاد دسته بندی اجناس</a></li>
	                                <li class="mb-2 font-size-13 text-success font-weight-bold primary-font"><a href="<?php echo url('/management-panel/categories/index1Categories.php')?>">لیست دسته‌بندی اجناس</a></li>
	
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
								<!-- types of classifications of products that manager wants to insert -->
								<h4 class="font-weight-bold m-b-10 line-height-30 primary-font">انواع دسته بندی اجناس فروشگاه</h4>
                                <ul>
	                                <li class="mb-2 font-size-13 text-warning font-weight-bold primary-font"><a href="<?php echo url('/management-panel/subCategories/createSubCategories.php')?>">ایجاد انواع دسته بندی اجناس</a></li>
	                                <li class="mb-2 font-size-13 text-warning font-weight-bold primary-font"><a href="<?php echo url('/management-panel/subCategories/index1SubCategories.php')?>">لیست انواع دسته‌بندی اجناس</a></li>
                                </ul>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
								<!-- products that manager wants to insert -->
							    <h4 class="font-weight-bold m-b-10 line-height-30 primary-font">محصولات</h4>
                                <ul>
	                                <li class="mb-2 font-size-13 text-info font-weight-bold primary-font"><a href="<?php echo url('/management-panel/posts/createPosts.php')?>">ایجاد محصول</a></li>
	                                <li class="mb-2 font-size-13 text-info font-weight-bold primary-font"><a href="<?php echo url('/management-panel/posts/index1Posts.php')?>">لیست محصولات</a></li>
                                </ul>
                            </div>
                        </div>
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