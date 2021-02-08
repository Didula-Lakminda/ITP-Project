<?php
$con = mysqli_connect('localhost',  'root', '', 'supermarket');
$customerId = 1;

$getDataQuery = "SELECT * FROM ratings WHERE customerId='$customerId'";
$getDataresult = mysqli_query($con, $getDataQuery);
// $getData = mysqli_fetch_array($getDataresult);


if (isset($_POST['update'])) {

    $comnt_id = $_POST['comnt_id'];
    $cmnt_update = $_POST['cmnt_update'];


    $query = "UPDATE ratings SET comment='$cmnt_update' WHERE customerEmail='$comnt_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $getDataQuery = "SELECT * FROM ratings WHERE customerId='$customerId'";
        $getDataresult = mysqli_query($con, $getDataQuery);
        echo '<script language="javascript">';
        echo 'alert("successfull")';
        echo '</script>';
    } else {
        echo mysqli_error($con);;
    }
}
if (isset($_POST['delete'])) {
    $comnt_id = $_POST['comnt_id'];

    $query = "DELETE FROM ratings WHERE customerEmail='$comnt_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $getDataQuery = "SELECT * FROM ratings WHERE customerId='$customerId'";
        $getDataresult = mysqli_query($con, $getDataQuery);
        echo '<script language="javascript">';
        echo 'alert("successfull")';
        echo '</script>';
    } else {
        echo mysqli_error($con);;
    }
}




?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>
        
#hdr
{
    position: relative;
    text-align: center;
    font-size: 35px;
    text-decoration: bold;
}

#update
{
    position: absolute;
    left: 550px;
    font-size: 25px;
    text-decoration:bold;

}


.table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    position: absolute;
    left: 300px;
    top:750px;
    border-radius:5px;
}
  
.table td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    position: relative;
    padding-top: 12px;
    padding-bottom: 12px;
    background-color:#b7d7e8;
   
}

.table th{
    position: relative;
    padding-top: 12px;
    padding-bottom: 12px;
    background-color:#87bdd8;
    color:black ;
}

.tb
{
    background-color:#F3F6FA;
    width:40%;
    height:50%;
    position:absolute;
    top:400px;
    left:400px;
}

.id
{
    position:absolute;
    left:150px;
    top:20px;
}

#len
{
    position:absolute;
    padding:5px 20px;
}

.cmt
{
    position:absolute;
    top:120px;
    left:150px;
}
.tb td
{
    position:realtive;
    background-color:gray
}

#bt
{
    position:absolute;
    background-color: #a2836e;
    color:balck;
    padding:10px 10px;
    top:250px;
    left:150px;

}

#bt2
{
    position:absolute;
    background-color: #a2836e;
    color:balck;
    padding:10px 10px;
    top:250px;
    left:300px;
}

.error-text
{
    position:absolute;
    margin:15px 0 -5px 0;
    top:83px;
    left:150px;
    background:#e74c3c;
    color:#fceae8;
    font-size:12px;
    padding:4px;
    border-radius:5px;
    display:none;
}
.footer
{
    position:relative;
    width:1449px;
    top:50px;
    right:100px;
    
}

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/3.jpg" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>Sinhala</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Sinhala</a></li>
                    <li><a href="#">Tamil</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="#">Shop</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">View Cart <i class='fa fa-shopping-cart'></i></a></li>

                    </ul>
                </li>
                <li><a href="#">About us</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Give Feedback</a></li>


                    </ul>
                </li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> SunShine@gmail.com</li>

            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>SunShine@gmail.com</li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>Sinhala</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Sinhala</a></li>
                                    <li><a href="#">Tamil</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/3.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="#">Shop</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">View Cart <i class='fa fa-shopping-cart'></i> </a></li>

                                </ul>
                            </li>
                            <li><a href="#">About</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">Give Feedback</a></li>


                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Search Experience Feedback Survey</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Feedback</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <br>
    <br>
    <br> 
    <br>
        <h4 id="update">Update your comment</h4>
    <br>

    <form action="update.php" method="post" id="form">
    <div class="tb">
        <div class="id">
            <label for="">Customer Email</label><br>
            <input type="text" id="len"  name="comnt_id" onclick="updateEmail()" required>
        </div><br>
        <div class="error-text">Please Enter Valid Email Address.</div>
        <br>
        <br>
        <div class="cmt">
            <label for="">Update Comment</label><br>
            <textarea name="cmnt_update" cols="26" rows="3" ></textarea>
        </div>
        <button type="submit"  id="bt" name="update" >Update</button>
        <button type="submit" id="bt2"name="delete">Delete</button>
        </div>
    </form>

    <br>
    
    
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 95 2/1 pattah col-11</li>
                            <li>Phone: +94 1128950437</li>
                            <li>Email: SunShine@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <p><b>Connect With us</b></p>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">

                    </div>
                </div>
            </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

<script>
    var input = document.getElementsByClassName("btn3");
    input.addEventListener("keyup", function(event) {
        if (event.keycode == 13) {
            event.preventDefault();
            document.getElementsByClassName("btn3").click();
        }
    });

    var input = document.getElementsByClassName("btn4");
    input.addEventListener("keyup", function(event) {
        if (event.keycode == 13) {
            event.preventDefault();
            document.getElementsByClassName("btn4").click();
        }
    });

</script>

<script>
    function updateEmail()
    {
        
    }
</script>

</html>