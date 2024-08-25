<?php
require_once "./functions/helper.php";
// require_once "./functions/helper.php";
require_once "./functions/Datebase.php";
require_once "./functions/posts-function.php";
require_once "./functions/categories-function.php";
require_once "./functions/subCategories-function.php";
require_once "./functions/users-function.php";


$posts = getAllPosts();


?>


<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo asset('home(mainPage).css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('slideShowProduct.css'); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pink webSite</title>
</head>

<body class="">
    <header>
        <div class="container">
            <nav class="header-nav-left"> <!--left navigation header-->
                <!-- cart icon -->
                <div class="fa fa-cart-icon icon-cart">
                    <i class="bi bi-cart3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-cart3" viewBox="0 0 16 16" style="color: #ffffff;">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>

                        <a href="#cart"></a>
                        <span class="cart-counter">0</span>
                    </i>

                </div>
                <!-- profile for each costumor -->
                <div class="enter-membership">
                    <p>
                        <a href="<?php echo asset('login.php'); ?>">عضویت/ورود</a>
                    </p>
                </div>
                <div class="fa fa-profile">
                    <a href="login.html">
                        <i class="bi bi-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16" style="color: #ffffff;">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                        </i>
                    </a>
                </div>
                <!--name of shop-->
                <div class="pink">pink فروشگاه اینترنتی</div>
            </nav>
            <nav class="header-nav-right"> <!--right navigation header-->
                <!-- search box for products -->
                <div class="search-box1 fa fa-magnifier">
                    <input class="search-box" type="text" placeholder="جست و جو کنید">
                    <i class="bi bi-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16" style="color: #ffffff; ">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </i>
                </div>
                <!-- classification of clothes -->
                <div class="classification">
                    <button onclick="functionMeno()" class="classification1">دسته بندی پوشاک</button>
                    <!-- دسته بندی پوشاک -->
                </div>
        </div>
        </nav>
    </header>
    </div>



    <!-- cart tab -->
    <div class="cartTab">
        <h1>سبد خرید شما</h1>
        <div class="listCart">
            <div class="item">
                <div class="image">
                    <img src="<?php echo asset('./photoes/woman-clothes.jpg') ?>" alt="">
                </div>
                <div class="name">
                    نام
                </div>
                <div class="totalPrice">
                    5000تومان0
                </div>
                <div class="quantity">
                    <span class="minus">
                        << /span>
                            <span>1</span>
                            <span class="plus">></span>
                </div>
            </div>


        </div>
        <!--buttons of cart tab-->
        <div class="button-close-checkOut">
            <button class="close">بستن</button>
            <button class="checkOut">پرداخت</button>

        </div>
    </div>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 2</div>
            <img src="<?php echo asset('./photoes/man-clothes.jpg'); ?>" style="width:60%">
            <div class="text">pink فروشگاه اینترنتی</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 2</div>
            <img src="<?php echo asset('./photoes/woman-clothes.jpg'); ?>" style="width:60%">
            <div class="text">pink فروشگاه اینترنتی</div>
        </div>
    </div>

    <!--products of our shopping-->
    <!-- <div class="listProduct">
        <div class="item">
            <img src="./photoes/man-clothes.jpg" alt="">
            <h2>نام محصول</h2>
            <div class="price">50000تومان</div>
            <button class="addCart"></button>
        </div>
     </div>  -->



    <!--slides : men products -->
    <div class="product-container">

        <?php foreach ($posts as $post) { ?>
            <!-- if category_id == 5 means that men clothes in our query -->
            <?php if ($post->category_id == 5) { ?>
                <!--product-->
                <div class="product-card">
                    <div class="product-image">
                        <!-- <span class="discount-tag">50% off</span> -->
                        <img src="<?php echo asset("functions/images/posts-image/" . $post->image); ?>" class="product-thumb"
                            alt="">
                        <button class="card-btn">افزودن به سبد خرید</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand"><?php echo $post->title ?></h2>
                        <p class="product-short-des"><?php echo $post->body ?></p>
                        <p class="product-short-des"><?php echo $post->size ?></p>
                        <p class="product-short-des"><?php echo $post->color ?></p>
                        <span class="price"><?php echo $post->price ?></span>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>

    <!--slides : men products -->
    <div class="product-container">

        <?php foreach ($posts as $post) { ?>
            <!-- if category_id == 6 means that women clothes in our query -->
            <?php if ($post->category_id == 6) { ?>
                <!--product-->
                <div class="product-card">
                    <div class="product-image">
                        <!-- <span class="discount-tag">50% off</span> -->
                        <img src="<?php echo asset("functions/images/posts-image/" . $post->image); ?>" class="product-thumb"
                            alt="">
                        <button class="card-btn">افزودن به سبد خرید</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand"><?php echo $post->title ?></h2>
                        <p class="product-short-des"><?php echo $post->body ?></p>
                        <p class="product-short-des"><?php echo $post->size ?></p>
                        <p class="product-short-des"><?php echo $post->color ?></p>
                        <span class="price"><?php echo $post->price ?></span>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>



    <!--slides : men products -->
    <div class="product-container">

        <?php foreach ($posts as $post) { ?>
            <!-- if category_id == 7 means that boyish clothes in our query -->
            <?php if ($post->category_id == 7) { ?>
                <!--product-->
                <div class="product-card">
                    <div class="product-image">
                        <!-- <span class="discount-tag">50% off</span> -->
                        <img src="<?php echo asset("functions/images/posts-image/" . $post->image); ?>" class="product-thumb"
                            alt="">
                        <button class="card-btn">افزودن به سبد خرید</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand"><?php echo $post->title ?></h2>
                        <p class="product-short-des"><?php echo $post->body ?></p>
                        <p class="product-short-des"><?php echo $post->size ?></p>
                        <p class="product-short-des"><?php echo $post->color ?></p>
                        <span class="price"><?php echo $post->price ?></span>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>





    <!--slides : men products -->
    <div class="product-container">

        <?php foreach ($posts as $post) { ?>
            <!-- if category_id == 8 means that girlish clothes in our query -->
            <?php if ($post->category_id == 8) { ?>
                <!--product-->
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo asset("functions/images/posts-image/" . $post->image); ?>" class="product-thumb"
                            alt="">
                        <button class="card-btn">افزودن به سبد خرید</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand"><?php echo $post->title ?></h2>
                        <p class="product-short-des"><?php echo $post->body ?></p>
                        <p class="product-short-des"><?php echo $post->size ?></p>
                        <p class="product-short-des"><?php echo $post->color ?></p>
                        <span class="price"><?php echo $post->price ?></span>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

    </div>








    <!-- meno of classification text(men , women and childish clothes)-->
    <div class="Slideshow-meno-products" id="Slideshow-meno-products">
        <!-- men clothes link page -->
        <a href="<?php echo asset('men-clothes.php'); ?>">
            <div class="link-menClothes">
                لباس های مردانه
            </div>
        </a>
        <br>
        <hr class="hr1">
        <!-- women clothes link page -->
        <a href="<?php echo asset('woman-clothes.php'); ?>">
            <div class="link-womenClothes">
                لباس های زنانه
            </div>
        </a>
        <br>
        <hr class="hr1">
        <!-- childish clothes link page -->
        <a href="<?php echo asset('childish-clothes.php'); ?>">
            <div class="link-childishClothes">
                لباس های بچگانه
            </div>
        </a>
    </div>



    <!--Footer part-->
    <footer class="footer-container">
        <div class="footer-connection">
            <div class="footer-text1">:راه های ارتباطی با پینک شاپ</div>
            <!--telephone-->
            <div class="tell">
                <a href="tel:+98021-56389645">
                    <i class="bi bi-telephone-fill">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
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
            <p>ما در پینک شاپ تمام تلاش خود را انجام می دهیم تا <br>.محصولی با کیفیت و قیمت مناسب را در سریع ترین زمان
                ممکن برای مشتریان خود فراهم کنیم</p>
        </div>
    </footer>




    <script src="<?php echo asset('home(mainPage).js'); ?> "></script>
</body>

</html>