<?php
    session_start();
    $state = $_SESSION['state'];
    $full_name = $_SESSION['full_name'];
    $image = $_SESSION['image'];
    $admin = $_SESSION['admin'];
    $parts = explode(" ", $full_name); 
    if(count($parts) > 2){
        $full_name = $parts[0] . '.' . strtoupper((strtolower($parts[1]) == 'el' && isset($parts[2])) ? $parts[2][0] : $parts[1][0]);
    }

    if (isset($_POST['logout'])) {
        $state = false;
        $image = false;
        $_SESSION['state']=false;
        $_SESSION['image']=false;
        $_SESSION['admin']=false;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe-Store</title>
    <link  rel ="stylesheet" href="style/style.css">
    <link  rel ="stylesheet" href="style/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="left">
                    <a href="" class="active">
                        <h1 class="logo">PlASHOE</h1>
                    </a>
                    <ul class="links">
                        <li>
                            <a href="./pages/men.html">MEN</a>
                        </li>
                        <li>
                            <a href="./pages/women.html">WOMEN</a>
                        </li>
                        <li>
                            <a href="./pages/collection.html">COLLECTION</a>
                        </li>
                        <li>
                            <a href="./pages/lookbook.html">LOOKBOOK</a>
                        </li>
                        <li>
                            <a href="./pages/sale.html">SALE</a>
                        </li>
                    </ul>
                </div>
                <?php 
                    echo ($state && $admin) 
                        ? "<div class='center username' style='width: max-content; padding: 0 10px; background: rgb(255, 69, 69);'>Hello {$full_name}</div>" 
                        : ($state 
                            ? "<div class='center username' style='width: max-content; padding: 0 10px; background: rgb(69, 255, 69);'>Hello {$full_name}</div>" 
                            : ""
                        ); 
                ?>
                <ul class="right">
                    <li>
                        <a href="./pages/story.html">OUR STORY</a>
                    </li>
                    <li>
                        <a href="./pages/contact.html">CONTACT</a>
                    </li>
                    <li class="cartIcon">
                        <div class="icon">
                            <span class="numberOfProduct">5</span>
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                    </li>
                    <li class="log">
                        <form method="POST" class="logout">
                            <?php echo ($state) ? "<button name='logout' style='background: red;color: white;border-radius: 10px;padding: 10px 15px;font-weight: bold;'>out</button>" : ""; ?>
                        </form>
                    </li>
                    <li>
                        <span class="state <?php echo ($state) ? 'isLogin' : 'isLogout'; ?>"></span>
                        <a href="<?php echo ($state) ? './user/profile.php' : './user/login.php'; ?>"><i class="fa-regular fa-user"></i></a>
                    </li>
                    <?php 
                        if ($image) {
                            echo '<img src="' . substr($image, 3) . '" style="width: 50px;border-radius: 50%;height: 50px;" alt="User Image">';
                        }
                    ?>
                    <?php echo (!$state) ? "<li><a href='user/admin.php'>admin</a></li>" : ""; ?>
                </ul>
            </div>
        </nav>
    </header>

    <div class="landing">
        <div class="container">
            <div class="text">
                <h1>Love the Planet <br> we walk on</h1>
                <p>Bibendum fermentum, aenean donec pretium aliquam blandit <br> tempor imperdiet arcu arcu ut nunc in dictum mauris at ut.</p>
                <button class="mainButton">SHOP MEN</button>
                <button class="mainButton">SHOP WOMEN</button>
            </div>
        </div>
    </div>

    <div class="logs">
        <div class="container1">
            <p>As seen in:</p>
            <img src="./images/logs/recycled-shoe-store-featured-in-logo-5.svg" alt="">
            <img src="./images/logs/recycled-shoe-store-featured-in-logo-4.svg" alt="">
            <img src="./images/logs/recycled-shoe-store-featured-in-logo-3.svg" alt="">
            <img src="./images/logs/recycled-shoe-store-featured-in-logo-2.svg" alt="">
            <img src="./images/logs/recycled-shoe-store-featured-in-logo-1.svg" alt="">
        </div>
    </div>

    <div class="container2">
        <hr>
    </div>

    <div class="about">
        <div class="container1">
            <div>
                
                <img src="./images/img/recycled-shoe-store-home-about-image.jpg" alt="">
            </div>
            <div class="text">
                <p class="mainColor">About Us</p>
                <h1>Selected materials <br> designed for comfort <br> and sustainability</h1>
                <p class="p">
                    Nullam auctor faucibus ridiculus dignissim sed et 
                    <br>
                    auctor sed eget auctor nec sed elit nunc, magna non 
                    <br>
                    urna amet ac neque ut quam enim pretium risus 
                    <br>
                    gravida ullamcorper adipiscing at ut magna.
                </p>
                <span class="animetion">READ MORE</span>
            </div>
        </div>
    </div>

    <!-- --------------------------------------- -->


    <div class="made">
        <div class="container">
            <div class="title">
                <h1>See how your shoes are made</h1>
                <p>
                    Urna, felis enim orci accumsan urna blandit egestas mattis egestas feugiat viverra ornare donec 
                    <br>
                    adipiscing semper aliquet integer risus leo volutpat nulla enim ultrices
                </p>
            </div>
            <div class="content">
                <div class="left">
                    <div class="boxT">
                        <p class="mainColor">01</p>
                        <h1>Pet canvas</h1>
                        <p>Morbi eget bibendum sit <br> adipiscing morbi ac nisl vitae <br> maecenas nulla cursus</p>
                    </div>
                    <div class="box">
                        <p class="mainColor">01</p>
                        <h1>Pet canvas</h1>
                        <p>Morbi eget bibendum sit <br> adipiscing morbi ac nisl vitae <br> maecenas nulla cursus</p>
                    </div>
                </div>
                <div class="center">
                    <img src="./images/img/recycled-shoe-store-how-shoes-are-made-image.png" alt="">
                </div>
                <div class="right">
                    <div class="boxT">
                        <p class="mainColor">01</p>
                        <h1>Pet canvas</h1>
                        <p>Morbi eget bibendum sit <br> adipiscing morbi ac nisl vitae <br> maecenas nulla cursus</p>
                    </div>
                    <div class="box">
                        <p class="mainColor">01</p>
                        <h1>Pet canvas</h1>
                        <p>Morbi eget bibendum sit <br> adipiscing morbi ac nisl vitae <br> maecenas nulla cursus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- --------------------------------------- -->


    <div class="bestSales">
        <div class="container1">
            <div class="title">
                <h1>Our Best Seller</h1>
                <span class="animetion">VIEW ALL BEST SELLERS</span>
            </div>
            <div class="products">
                <div class="product sale" onclick="getProducts(1)" id="1">
                    <div class="img">
                        <img src="./images/products/1.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale" onclick="getProducts(2)" id="2">
                    <div class="img">
                        <img src="./images/products/2.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product " onclick="getProducts(3)" id="3"> 
                    <div class="img">
                        <img src="./images/products/3.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale" onclick="getProducts(4)" id="4">
                    <div class="img">
                        <img src="./images/products/4.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product " onclick="getProducts(5)" id="5">
                    <div class="img">
                        <img src="./images/products/5.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale" onclick="getProducts(6)" id="6">
                    <div class="img">
                        <img src="./images/products/6.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="category">
        <div class="container">
            <div class="left">
                <section class="content">
                    <h1>MEN</h1>
                    <a href="./pages/men.html">
                        <button>SHOP MEN</button>
                    </a>
                </section>
            </div>
            <div class="right">
                <section class="content">
                    <h1>WOMEN</h1>
                    <a href="./pages/women.html">
                        <button>SHOP WOMEN</button>
                    </a>
                </section>
            </div>
        </div>
    </div>


    <div class="bestSales">
        <div class="container1">
            <div class="title">
                <h1>New Arrivals</h1>
                <span class="animetion">VIEW ALL NEW ARRIVALS</span>
            </div>
            <div class="products">
                <div class="product sale" onclick="getProducts(7)" id="7">
                    <div class="img buy" >
                        <img src="./images/products/2.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                            $ <s>64.99</s>
                            $ <span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product" onclick="getProducts(8)" id="8">
                    <div class="img " >
                        <img src="./images/products/3.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale" onclick="getProducts(9)" id="9">
                    <div class="img">
                        <img src="./images/products/4.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale"onclick="getProducts(10)" id="10">
                    <div class="img">
                        <img src="./images/products/1.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale" onclick="getProducts(11)" id="11">
                    <div class="img">
                        <img src="./images/products/2.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product "onclick="getProducts(12)" id="12">
                    <div class="img">
                        <img src="./images/products/3.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale"onclick="getProducts(13)" id="13">
                    <div class="img">
                        <img src="./images/products/4.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product " onclick="getProducts(14)" id="14">
                    <div class="img">
                        <img src="./images/products/5.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="product sale" onclick="getProducts(15)" id="15">
                    <div class="img">
                        <img src="./images/products/6.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>Women’s Green Training</p>
                        <p>
                             $<s>64.99</s>
                             $<span>49.99</span>
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our">
        <div class="container">
            <div class="left">
                <p>
                    Eu eget felis erat mauris aliquam mattis lacus, arcu leo 
                    <br>
                    aliquam sapien pulvinar laoreet vulputate sem aliquet 
                    <br> 
                    phasellus egestas felis, est, vulputate morbi massa 
                    <br> 
                    mauris vestibulum dui odio.
                </p>
                <div class="imgs">
                    <div class="img">
                        <img src="./images/logs/recycled-shoe-badge-1.svg" alt="">
                    </div>
                    <div class="img">
                        <img src="./images/logs/recycled-shoe-badge-2.svg" alt="">
                    </div>
                    <div class="img">
                        <img src="./images/logs/recycled-shoe-badge-3.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="img">
                    <img src="./images/img/recycled-shoe-store-recycled-circle-iamge.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="speak">
        <div class="container1">
            <h1 class="title">Our Customers speak for us</h1>
            <div class="boxs">
                <div class="box">
                    <div class="stars">
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                    </div>
                    <p>“Felis semper duis massa scelerisque <br> ac amet porttitor ac tellus venenatis <br> aliquam varius mauris integer”</p>
                    <div class="user">
                        <div class="img">
                            <img src="./images/img/recycled-shoe-store-customer-avatar-image-2.jpg" alt="">
                        </div>
                        <p>	Julia Keys</p>
                    </div>
                </div>
                <div class="box">
                    <div class="stars">
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                    </div>
                    <p>“Felis semper duis massa scelerisque <br> ac amet porttitor ac tellus venenatis <br> aliquam varius mauris integer”</p>
                    <div class="user">
                        <div class="img">
                            <img src="./images/img/recycled-shoe-store-customer-avatar-image-3.jpg" alt="">
                        </div>
                        <p>	Julia Keys</p>
                    </div>
                </div>
                <div class="box">
                    <div class="stars">
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                        <i class="fa-solid fa-star gold"></i>
                    </div>
                    <p>“Felis semper duis massa scelerisque <br> ac amet porttitor ac tellus venenatis <br> aliquam varius mauris integer”</p>
                    <div class="user">
                        <div class="img">
                            <img src="./images/img/recycled-shoe-store-customer-avatar-image-1.jpg" alt="">
                        </div>
                        <p>	Julia Keys</p>
                    </div>
                </div>
            </div>
            <p class="foot">4.8 average rating from 1814 reviews</p>
        </div>
    </div>

    <div class="better">
        <div class="text">
            <h1>Better for People & the Planet</h1>
            <p>Ut eget at et aliquam sit quis nisl, pharetra et ac pharetra est dictum in vulputate</p>
            <a href="./pages/men.html">
                <button class="mainButton">SHOP MEN</button>
            </a>
            <a href="./pages/women.html">
                <button class="mainButton">Shop WOMEN</button>
            </a>
        </div>
    </div>

    <div class="logsFooter">
        <div class="container2">
            <p>
                <i class="fas fa-lock"></i>
                Secure Payment
            </p>
            <p>
                <i class="fas fa-truck"></i>
                Secure Payment
            </p>
            <p>
                <i class="fas fa-sync-alt"></i>
                Secure Payment
            </p>
        </div>
    </div>

    <div class="container2">
        <hr>
    </div>

    <div class="footer">
        <div class="container1">
            <div class="col1">
                <h1>PLASHOE</h1>
                <p>Praesent eget tortor sit risus <br> egestas nulla pharetra ornare <br> quis bibendum est bibendum <br> sapien proin nascetur</p>
                <div class="icons">
                    <div class="links">
                        <a target="_blank" href=""><i class="fa-brands fa-facebook fs-2 me-2"></i></a>
                        <a target="_blank" href=""><i class="fa-brands fa-github fs-2 me-2"></i></a>
                        <a target="_blank" href=""><i class="fa-brands fa-linkedin fs-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col2">
                <h1>SHOP</h1>
                <p>Shop Men</p>
                <p>Shop Women</p>
                <p>LookBook</p>
                <p>Gift Card</p>
                <p>Sale</p>
            </div>
            <div class="col3">
                <h1>About</h1>
                <p>Our Story</p>
                <p>Our Materials</p>
                <p>Our Value</p>
                <p>Sustainability</p>
                <p>Manufacture</p>
            </div>
            <div class="col2">
                <h1>Need Help?</h1>
                <p>FAQs</p>
                <p>Shipping & Returns</p>
                <p>Shoe Care</p>
                <p>Size Chart</p>
                <p>Contact Us</p>
            </div>
        </div>
    </div>


    <div class="dev">
        <div class="container1">
            <p>© 2024 Recycled Shoe Store. Powered by Recycled Shoe Store.</p>
            <div class="img">
                <img src="./images/img/payment-icons.png" alt="">
            </div>
        </div>
    </div>

    

    <div class="cart close">
        <div class="title">
            <p>Shopping Cart</p>
            <p class="delete">x</p>
        </div>
        <div class="cards">

        </div>
    </div>


    <div class="shodow"></div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script/main.js"></script>
</body>
</html>