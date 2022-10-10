
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Online Shopping</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <script>
        function validate() {
            var email =
                document.forms.RegForm.EMail.value;
            var password =
                document.forms.RegForm.Password.value;
            var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.


            if (email == "" ) {
                 error = " Please enter your e-mail address. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
            else if (!regEmail.test(email))
            {
                error = " Please enter a valid e-mail address. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
           
            if (password == "") {
                error = " Please enter your password. ";
                  document.getElementById( "error_para" ).innerHTML = error;
                  return false;
            }
                            

            return true;
        }
    </script>
</head>
<body>
    
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

    <form action="signin.php" class="login-form" name="RegForm" onsubmit="return validate()" method="post">
        <h3>login now</h3>
        <?php if (isset($_GET['error'])) { ?>
			<p style= "color:red;" ><?php echo $_GET['error']; ?></p>
		<?php } ?>
        <p style="color:red;" id="error_para" ></p>
        <input type="email"  name="EMail"  placeholder="your email" class="box">
        <input type="password" name="Password" placeholder="your password" class="box">
        <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>Remember Me
        <p>forget your password <a href="#">click here</a></p>
        <p>don't have an account <a href="register.php">create now</a></p>
        <input type="submit" value="login now" name="login_form" class="btn">
    </form>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>fresh and <span>organic</span> products for your</h3>
        <?php if (isset($_GET['errorlogin'])) { ?>
            <p style= "color:red;" ><?php echo $_GET['errorlogin']; ?></p>
        <?php } ?>
        <a href="#" class="btn">shop now</a>
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> our <span>features</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/feature-img-1.png" alt="">
            <h3>fresh and organic</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="dashboard.php" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/feature-img-2.png" alt="">
            <h3>free delivery</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="dashboard.php" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="image/feature-img-3.png" alt="">
            <h3>easy payments</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
            <a href="dashboard.php" class="btn">read more</a>
        </div>

    </div>

</section>

<!-- features section ends -->

<!-- products section starts  -->

<section class="products" id="products">

    <h1 class="heading"> our <span>vegetable</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper" >
            <?php 
                include("inc/config.php");

            $sql = "SELECT * FROM product where Category='Vegetable' ";
            $result = mysqli_query($conn, $sql);
            ?>
                    
            <?php
                if (mysqli_num_rows($result)) 
                {

                    while ($row = mysqli_fetch_array($result)) 
                    {
                            $image = $row['Picture'];
                            $name  =$row['Name'];
                            $price =$row['Price'];
                            $quantity  =$row['Quantity'];
                            
            ?>
                    <div class="swiper-slide box">
                            <img src="<?= $image ?>" alt="">
                                <h3><?php echo $name; ?></h3>
                                <div class="price">RM <?php echo $price; ?></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <a href="dashboard.php" class="btn">add to cart</a>
                                
                        </div>
            <?php 	} 
                }?>
        </div>

    </div>

    <h1 class="heading"> our <span>fruit</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper" >
            <?php 
                include("inc/config.php");

            $sql = "SELECT * FROM product where Category='Fruit' ";
            $result = mysqli_query($conn, $sql);
            ?>
                    
            <?php
                if (mysqli_num_rows($result)) 
                {

                    while ($row = mysqli_fetch_array($result)) 
                    {
                            $image = $row['Picture'];
                            $name  =$row['Name'];
                            $price =$row['Price'];
                            $quantity  =$row['Quantity'];
                            
            ?>
                    <div class="swiper-slide box">
                            <img src="<?= $image ?>" alt="">
                                <h3><?php echo $name; ?></h3>
                                <div class="price">RM <?php echo $price; ?></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <a href="dashboard.php" class="btn">add to cart</a>
                                
                        </div>
            <?php 	} 
                }?>
        </div>

    </div>

    <h1 class="heading"> our <span>dairy product</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper" >
            <?php 
                include("inc/config.php");

            $sql = "SELECT * FROM product where Category='Dairy Product' ";
            $result = mysqli_query($conn, $sql);
            ?>
                    
            <?php
                if (mysqli_num_rows($result)) 
                {

                    while ($row = mysqli_fetch_array($result)) 
                    {
                            $image = $row['Picture'];
                            $name  =$row['Name'];
                            $price =$row['Price'];
                            $quantity  =$row['Quantity'];
                            
            ?>
                    <div class="swiper-slide box">
                            <img src="<?= $image ?>" alt="">
                                <h3><?php echo $name; ?></h3>
                                <div class="price">RM <?php echo $price; ?></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <a href="dashboard.php" class="btn">add to cart</a>
                                
                        </div>
            <?php 	} 
                }?>
        </div>

    </div>

    <h1 class="heading"> our <span>fresh meat</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper" >
            <?php 
                include("inc/config.php");

            $sql = "SELECT * FROM product where Category='Fresh Meat' ";
            $result = mysqli_query($conn, $sql);
            ?>
                    
            <?php
                if (mysqli_num_rows($result)) 
                {

                    while ($row = mysqli_fetch_array($result)) 
                    {
                            $image = $row['Picture'];
                            $name  =$row['Name'];
                            $price =$row['Price'];
                            $quantity  =$row['Quantity'];
                            
            ?>
                    <div class="swiper-slide box">
                            <img src="<?= $image ?>" alt="">
                                <h3><?php echo $name; ?></h3>
                                <div class="price">RM <?php echo $price; ?></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <a href="dashboard.php" class="btn">add to cart</a>
                                
                        </div>
            <?php 	} 
                }?>
        </div>

    </div>

</section>

<!-- products section ends -->


<!-- review section starts  -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper" >
            <?php 
                include("inc/config.php");

            $sql = "SELECT * FROM feedback ";
            $result = mysqli_query($conn, $sql);
            ?>
                    
            <?php
                if (mysqli_num_rows($result)) 
                {

                    while ($row = mysqli_fetch_array($result)) 
                    {
                            $image = $row['Picture'];
                            $content  =$row['Content'];
                            $subject =$row['Subject'];
                            $rating  =$row['Rating'];
                            $nrating= (int)$rating;
            ?>
                    <div class="swiper-slide box">
                            <img src="<?= $image ?>" alt="">
                                <h3><?php echo $subject; ?></h3>
                                <p><?php echo $content; ?></p>
                                
                            <div class="stars">
                                <h3><?php echo $rating ?><i class="fas fa-star"></i> </h3> 
                            </div>
                        </div>
            <?php 	} 
                }?>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/blog-1.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="dashboard.php" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-2.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="dashboard.php" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-3.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="dashboard.php" class="btn">read more</a>
            </div>
        </div>

    </div>

</section>

<!-- blogs section ends -->

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















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>