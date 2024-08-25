<?php
require "../../functions/helper.php";
require_once "../../functions/Datebase.php";
require_once "../../functions/categories-function.php";

$categories=getAllCategories();

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
					    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo asset('management-panel/categories/createCategories.php'); ?>"> صفحه ایجاد دسته بندی </a></li>
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
				<div class="table overflow-auto" tabindex="8">
					<table class="table table-striped table-hover">
						<thead class="thead-light">
						<tr>
							<th class="text-center align-middle text-primary">ردیف</th>
							<th class="text-center align-middle text-primary">عنوان دسته بندی</th>
							<th class="text-center align-middle text-primary">حذف</th>
							<th class="text-center align-middle text-primary">ویرایش</th>
							<th class="text-center align-middle text-primary">تاریخ ایجاد</th>
						</tr>
						</thead>
						<tbody>
						    <?php $i=1; ?>
						    <?php foreach($categories as $category){ ?>
							<tr>

								<td class="text-center align-middle"><?php echo $i++; ?></td>
								<td class="text-center align-middle"><?php echo $category->title ?></td>
								<td class="text-center align-middle">
								    <a class="btn btn-outline-info" href="<?php echo url('/management-panel/categories/deleteCategories.php?id=').$category->id; ?>">
										حذف
									</a>
								</td>
								<td class="text-center align-middle">
									<a class="btn btn-outline-info" href="<?php echo url('/management-panel/categories/editCategories.php?id=').$category->id; ?>">
										ویرایش
									</a>
								</td>
								<td class="text-center align-middle"><?php echo $category->created_at ?></td>
								
							</tr>
						<?php } ?>
					</table>
					<div style="margin: 40px !important;"
						 class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
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