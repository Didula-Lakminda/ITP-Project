<?php

if(!session_id())
{
     session_start();
}
//include db connection
require_once 'payment_dbConnect.php';


	if (!isset($_SESSION['customer_id'])) {
		header('Location: index.php');
	}



$con = mysqli_connect('localhost',  'root', '', 'supermarket');
if (isset($_POST['submit'])) {
    $customerId = 1;
    //$customerEmail = 'defual@gmail.com';

    $rating = $_POST['rating'];
    $customerEmail = $_POST['email'];
    $relevancy = $_POST['relevancy'];
    $comprehensive = $_POST['comprehensive'];
    $image = $_POST['image'];
    $filter = $_POST['filter'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO ratings (customerId,customerEmail,rating1,r2,r3,r4,r5,comment) VALUES('$customerId','$customerEmail','$rating','$relevancy','$comprehensive','$image','$filter','$comment')";
    $result = mysqli_query($con, $query);
    if ($result) {
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

    <link rel="stylesheet" href="C:\Users\thili\Desktop\html\CSS\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <style>
        .checked {
            color: orange;

        }

        #table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    position: absolute;
    left: 200px;
}
  
#table td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    position: relative;
    padding-top: 12px;
    padding-bottom: 12px;
   
}

#table th{
    position: relative;
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: gray;
    color: #dddddd;
}

#hd
{
    text-align: center;
}

#q1{
    position:absolute;
    left:200px;
}

.star
{
    position: absolute;
    left:220px;
}

.fa fa-star
{
    position: absolute;
}

#q2
{
    position: absolute;
    left:200px;
}

#q3
{
    position: absolute;
    left: 200px;
}

#comment
{
    position: absolute;
    left: 220px;
    width: 40%;
    height:15%;
}

.btn
{
    position: absolute;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    font-weight:bold;
    left:220px;
}

.btn2
{
    position: absolute;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    font-weight:bold;
    left:650px;
    top:1170px;
    border-radius:5px;
}

a:link, a:visited 
{
    color: #dddddd;
    display: inline-block;
}

a:hover {
    color:black;
}

#email
{
    position:absolute;
    left:200px;
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
  
.h3
{
    position:absolute;
    left:200px;
    font-size:16px;
}
#form.inputBox
{
    position:relative;
}
#text
{
    position:absolute;
    display:block;
    color:#000;
    font-weight:300;
    font-style:italic;
    padding: 5px;
    left:200px;
    top:500px;
}

#form.valid.inputBox:before
{
    content:'';
    position:absolute;
    right:12px;
    top:9px;
    width:24;
    height:24px;
    background:url('C:\xampp\htdocs\edited\html\img\valid.png');
    background-size:cover;
    z-index:1000;
}

#form.invalid.inputBox:before
{
    content:'';
    position:absolute;
    right:12px;
    top:9px;
    width:24;
    height:24px;
    background:url('C:\xampp\htdocs\edited\html\img\invalid.png');
    background-size:cover;
    z-index:1000;
}
    </style>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <?php include "include\Humberger.php"?>
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
    <form action="feedback.php" method="post" id="form">
    
    <div class="h3">

    <label for="fname"><h4>Email</h4></label>
    
    </div>
    <br>
    <br>
    <br>
    <div class="inputBox">
        <input type="text" id="email" name="email" onclick="validateEmail()" placeholder="Your email.." required>
        <span id="text"></span>
    </div>
    <br>
    <br>
    <br>
    <br>
    <h4 id="q1">How satisfied ara you with the current searching result?</h4>
    <br>
    <br>
    <div class="star">
        <span onmouseover="starmark(this)" onclick="starmark(this)" id="1one" style="font-size:40px;cursor:pointer;" class="fa fa-star checked"></span>
        <span onmouseover="starmark(this)" onclick="starmark(this)" id="2one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
        <span onmouseover="starmark(this)" onclick="starmark(this)" id="3one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
        <span onmouseover="starmark(this)" onclick="starmark(this)" id="4one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
        <span onmouseover="starmark(this)" onclick="starmark(this)" id="5one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
    </div>
    <br>
    <br>
    <br>
    <h4 id="q2">How satisfied ara you with the following aspects of the searching result?</h4>
    <br>
    <h4 id="q2">(Choose only one answer in each row)</h4>
    <br>
    <br>
    <br>
    
        <table id="table">
            <tr>
                <th>Choose a subject and give us your opinion</th>
                <th>Very dissatisfied</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>very satisfied</th>
            </tr>

            <tr>
                <td>Relevancy of the results</td>
                <td><input type="radio" name="relevancy" value="1"></td>
                <td><input type="radio" name="relevancy" value="2"></td>
                <td><input type="radio" name="relevancy" value="3"></td>
                <td><input type="radio" name="relevancy" value="4"></td>
                <td><input type="radio" name="relevancy" value="5"></td>
            </tr>

            <tr>
                <td>Comprehensive of information</td>
                <td><input type="radio" name="comprehensive" value="1"></td>
                <td><input type="radio" name="comprehensive" value="2"></td>
                <td><input type="radio" name="comprehensive" value="3"></td>
                <td><input type="radio" name="comprehensive" value="4"></td>
                <td><input type="radio" name="comprehensive" value="5"></td>
            </tr>

            <tr>
                <td>Image quality</td>
                <td><input type="radio" name="image" value="1"></td>
                <td><input type="radio" name="image" value="2"></td>
                <td><input type="radio" name="image" value="3"></td>
                <td><input type="radio" name="image" value="4"></td>
                <td><input type="radio" name="image" value="5"></td>
            </tr>

            <tr>
                <td>Filter selection</td>
                <td><input type="radio" name="filter" value="1"></td>
                <td><input type="radio" name="filter" value="2"></td>
                <td><input type="radio" name="filter" value="3"></td>
                <td><input type="radio" name="filter" value="4"></td>
                <td><input type="radio" name="filter" value="5"></td>
            </tr>

        </table>
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h4 id="q3">If you have any other suggestions or Feedback on searching, please let us know.</h4>
        <br>
        <br>
        <br>
        <input type="text" id="comment" rows="6" name="comment" placeholder="Enter your review" required><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <input type="hidden" name="rating" id="rating">
        <button onclick="result()" type="submit" name="submit"  class="btn">SEND</button><br>
        <br>
        <br>
        <button type="button"  class="btn2"><a href=Update.php>UPDATE</a></button>
        <br>
        <br>
        <br>
        <br>
        
    </form>

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
    var count;

    function starmark(item) {
        count = item.id[0];
        sessionStorage.starRating = count;
        var subid = item.id.substring(1);
        for (var i = 0; i < 5; i++) {
            if (i < count) {
                document.getElementById((i + 1) + subid).style.color = "orange";
            } else {
                document.getElementById((i + 1) + subid).style.color = "black";
            }
        }
        document.getElementById('rating').value = count;
        console.log(count);
    }

    function result() {
        //Rating : Count
        //Review : Comment(id)
        // alert("Rating : " + count + "\nReview : " + document.getElementById("comment").value);
 
    }

    function validateEmail()
    {
        var form = document.getElementById("form");
        var email = document.getElementById("email").value;
        var text = document.getElementById("text");
        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        if(email.match(pattern))
        {
            form.classList.add("valid");
            form.classList.remove("invalid");
            text.innerHTML = "Your Email Address is valid.";
            text.style.color = "#00ff00";
        }
        else
        {
            form.classList.remove("valid");
            form.classList.add("invalid");
            text.innerHTML = "Please Enter valid Email Address.";
            text.style.color = "#ff0000";
        }

        if(email == "")
        {
            form.classList.remove("valid");
            form.classList.remove("invalid");
            text.innerHTML = "";
            text.style.color = "#00ff00";
        }

    }
</script>

</html>