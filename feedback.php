<?php 
session_start();
  
    if ( (isset($_SESSION["Login"]) && isset($_SESSION['ID'])) || (isset($_COOKIE['member_login']) && isset($_COOKIE['random_password']) && isset($_COOKIE['random_selector'] ) )) 
    {
        require_once 'inc/config.php';
        $userID= $_SESSION['ID'];
        $email =$_SESSION['Email'];

        
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Complete Responsive Grocery Website Design Tutorial</title>
    <link rel="Icon" type="Icon" href="ico.png">

    <!-- Custom fonts for this template-->
    <link href="/ifutem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/call-of-ops-duty" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
    <script>
        function validate() {
            var email =
                document.forms.RegForm.EMail.value;
            var title =
                document.forms.RegForm.Subject.value;
            var content =
                document.forms.RegForm.Content.value;
            var rating =
                document.forms.RegForm.Rating.value;

            var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
            var regRating=/^\d{1}$/;									 // Javascript reGex for Phone Number validation.
            var regName = /\d+$/g;								 // Javascript reGex for Name validation
            
           
            if (title == "" ) {
                 error = " You Have To Write Your Proper Title. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
            if (content == "") {
                error = " PYou Have To Write Your Proper Content. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
            if(rating== ""){
                error = " Rating should be filled. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
            else if(!regRating.test(rating))
            {
                error = " Rating should be 1 until 5 only! ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }            
            return true;
        }
    </script>
    
</head>

<body class="bg-gradient-secondary">
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> groco </a>

    <nav class="navbar">
        <a href="dashboard.php">home</a>
        <a href="#features">features</a>
        <a href="#products">products</a>
        <a href="#categories">categories</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
        <a href="feedback.php">feedback</a>
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart">
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/cart-img-1.png" alt="">
            <div class="content">
                <h3>watermelon</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/cart-img-2.png" alt="">
            <div class="content">
                <h3>onion</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-trash"></i>
            <img src="image/cart-img-3.png" alt="">
            <div class="content">
                <h3>chicken</h3>
                <span class="price">$4.99/-</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
        <div class="total"> total : $19.69/- </div>
        <a href="#" class="btn">checkout</a>
    </div>

    <form action="" class="login-form">
        <h3>login now</h3>
        <input type="email" placeholder="your email" class="box">
        <input type="password" placeholder="your password" class="box">
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="register.html">create now</a></p>
        <input type="submit" value="login now" class="btn">
    </form>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<div class="home" id="home">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center " >

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" >

                        <!-- Nested Row within Card Body -->
                        <div class="row" >

                            <div class="col-lg-12 color-white">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">FEEDBACK</h1>
                                        <?php if (isset($_GET['error'])) { ?>
											<p style= "color:red;" ><?php echo $_GET['error']; ?></p>
										<?php } ?>
                                        <p style="color:red;" id="error_para" ></p>
                                    </div>

                                    <form class ="user"  action= "feed.php" id="form" name="RegForm" onsubmit="return validate()" method="post" enctype="multipart/form-data">
			

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user checking_email"
                                                name="EMail" 
                                                value="<?php echo $email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="subject" class="form-control form-control-user"
                                                name="Subject" 
                                                placeholder="Subject">
                                        </div>
                                        <div class="form-group">
                                            <input type="Content" class="form-control form-control-user"
                                               name="Content" placeholder="Content">
                                        </div>
                                        <div class="form-group">
                                            <input type="rating" class="form-control form-control-user"
                                                name="Rating" placeholder="Rating">
                                        </div>                                        

                                        <input class="btn btn-secondary btn-user btn-block" type="submit"
                                                value="Submit" name="feedback_form" />


                                    </form>
                                    
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="index.php">Already have an account?</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- home section ends -->


<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3> grocery online shopping <i class="fas fa-shopping-basket"></i> </h3>
            <p>Memudahkan kerja-kerja membeli belah adalah tugas kami.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +60 13456789 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +60 123455678 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> mohdzairi658@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Mersing, Johor - 86900 </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> features </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> products </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> categories </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> review </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> blogs </a>
        </div>

        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <input type="email" placeholder="your email" class="email">
            <input type="submit" value="subscribe" class="btn">
            <img src="image/payment.png" class="payment-img" alt="">
        </div>

    </div>

    <div class="credit"> created by <a href="https://youtu.be/lCCN_lkl3Xw"><span> mr. web designer </span></a> | all rights reserved </div>

</section>

<!-- footer section ends -->
<?php 
    }else{
        header("Location: index.php?error=Login First Before Submit Your Feedback.");
        exit();
    }
    ?>












<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="groceryonline/vendor/jquery/jquery.min.js"></script>
    <script src="groceryonline/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="groceryonline/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="groceryonline/js/sb-admin-2.min.js"></script>

</body>

</html>