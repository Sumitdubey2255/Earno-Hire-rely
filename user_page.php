<!-- <?php
require 'config.php';
session_start();

if(!isset($_SESSION['name'])){
   header('location:login.php');
}

$user_id = $_SESSION['id'];

// if(!isset($user_id)){
//    header('location:index.html');
// };

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:index.html');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hirer</title>
</head>
<body>
    <a href="user_profile.php"><button>Profile</button></a>
    <a href="user_update.php"><button>update</button></a>
    <a href="services.php"><button>services</button></a>
    <a href="home.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">Log Out</a>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/logo.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" >
      <link rel="preconnect" href="https://fonts.googleapis.com/" >
      <!-- <link rel="stylesheet" href="css/home.css"> -->
      <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
            --black:#FFFEEB;
            --white:#fdfff5;
            font-family: Britanica ExtraBold;
            text-decoration: none;
        }
        *{
        margin:0; 
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        outline: none; border:none;
        transition: .2s linear;
        text-transform: capitalize;

        }
        *::selection{
        background:var(--black);
        color:#fff;
        }
        /* ----------------------------for custom scroll bar--------------------------- */
        *::-webkit-scrollbar{
            width: 5px;
            height: 2px;
        }
        
        *::-webkit-scrollbar-track{
            background-color: transparent;
        }
        
        *::-webkit-scrollbar-thumb{
            background-color:#00000092;
        }
        /* --------------------------------------------------------------------------- */
        body{
            background-color: var(--black);
            background-attachment: fixed;
        }
        .logo{
            margin-top: 20px;
            margin-left: 20px;
        }
        header{
            backdrop-filter: blur(10px);
            position: fixed;
            height: 80px;
            z-index: 999;
        }
        .navbar{
            float:right;
            text-decoration: none;
            margin-top: -65px;
            margin-left: 650px;
        
        }
        .navbar a{
            margin-left: 10px;
            background-color: #111;
            padding: 10px 15px;
            font-weight: 30px;
            text-decoration: none;
            border-radius: 5px;
            color:white;
            

        }
        .navbar a:hover{
            border-style: solid;
            background-color: #FFFEEB;
            color:black;
            border-color:#111;
            transition: 50ms all ease-in-out;
            padding-top: 14px 24px;
            font-weight: 40px;
        }
        .text{
            color:black;
            font-size:25px;
            margin-top: -400px;
            margin-left: 100px;
            z-index:3;
        }
        .text p{
            font-size:large;
            margin-bottom:70px;
        }
        .text a{
            background-color:#111;
            margin-left: 80px;
            padding: 13px 18px;
            font-weight: 26px;
            text-decoration: none;
            border-radius: 50px;
            color:white;
            margin-top: 40px;
        
            

        }
        .text a:hover{
            border-style: solid;
            background-color: #FFFEEB;
            color:black;
            border-color: #111;
            transition: 50ms all ease-in-out;
            padding-top: 14px 24px;
            font-weight: 40px;
        }
        .vid1{
            height:45%;
            width: 45%;
            z-index:-1;
            margin-top: 150px;
            margin-left: 800px;
            border-radius: 50px;
        }

        .step-container{
            margin-top: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            
        }
        
        .step-container .step{
            background:#fff;
            margin:20px;
            padding:20px;
            padding-bottom: 50px;
            border-radius: .5rem;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.9);
            text-align: center;
            flex:1 1 20px;
            font-family: Britanica Regular;
        }
        
        .step-container .step span{
            font-size: 50px;
            color:black;
            
        }
        
        .step-container .step h3{
            font-size: 30px;
            color:black;
        }
        
        .step-container .step p{
            font-size: 20px;
            color:#666;
            padding:15px 0;
        }
        .btn{
            background-color: black;
            font-size: 15px;
            border-radius: 8px;
            color:white;
            padding: 10px 20px;

        }
        .btn:hover{
            border-style: solid;
            border-color: black;
            background-color: #ffffffa9;
            color:black;

        }
        .vendor .heading{
        
            font-size: 40px;
            text-align: center;
            opacity: 0.5;
            padding-top: 200px;
        }

        .vendor .box-container{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding-left: 50px;
            padding-right: 50px;
            
        }
        
        .vendor .box-container .box{
            flex:1 1 30rem;
            margin:1rem;
            overflow: hidden;
            position: relative;
            border-radius: .5rem;
            box-shadow:0 .5rem 1rem rgba(0,0,0,.9);
            height: 25rem;
            cursor: pointer;
            
        }
        
        .vendor .box-container .box img{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        
        .vendor .box-container .box .info{
            display: flex;
            flex-flow: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            top:0; left: 0;
            height: 100%;
            width: 100%;
            background:rgba(255,255,255,.8);
            text-align: center;
            transform: scale(1.3);
            opacity: 0;
        }
        
        .vendor .box-container .box:hover .info{
            transform: scale(1);
            opacity: 1 ;
            transition: 0.2s ease-in-out;
        }
        
        .vendor .box-container .box:hover img{
            transform: scale(1.3);
        }
        
        .vendor .box-container .box .info h3{
            font-size: 3rem;
            color:black;
            margin-bottom: -5px;
        }
        
        .vendor .box-container .box .info p{
            font-size: 1.7rem;
            color:#333;
            padding:1rem;
        
        }
        .clients .row{
        height: 300px;
        width:400px;
        
        }
        .clients .row .box-container .info h3{
            font-size: 60px;
            margin-left: 50px;
            min-width: 300px;
            
        }
        .clients .row .box-container{
            margin-left:-100px;
        }

        .clients .chead{
        font-size: 30px;
        margin-left:100px;
        min-width: 1200px;

        }
        .clients .row{
        display: flex;
        }

        .clients .row .divider{
        padding:0rem 1rem;
        }

        .clients .row .box-container .box img{
        height: 400px;
        width:400px;
        object-fit: cover;
        border-radius: .5rem;
        border:2rem solid #fff;
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.9);
        }

        .clients .row .box-container .box .info{
        padding:20px 0;
        }

        .clients .row .box-container .box .info h3{
        font-size: 2.5rem;
        color:black;
        }

        .clients .row .box-container .box .info p{
        font-size: 1.5rem;
        color:#060606;
        padding:800x 100px;
        font-style: italic;
        }

        .clients .row .box-container .box .info p i{
        color:black;
        padding:0 0.5rem;
        }
        .footer{
        
            color: white;
            width: 100%;
            font-size: 2rem;
            color:#fff;
            background: linear-gradient(to right,#00093c, #2d0b00);
            color: #fff;
            /* padding: 100px 0 30px; */
            margin-top: 300px;
            border-top-left-radius:105px;
            border-top-right-radius:105px;
            font-size: 13px;
            line-height: 20px;
            position:absolute;
            padding:2.5rem 1.5rem;
            /*padding: 50px 100px;*/
        }
        .row{
            width: 85%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
        }
        .col{
            flex-basis: 25%;
            padding: 10px;
        }
        .col:nth-child(2), .col:nth-child(3){
            flex-basis: 15%;
        }
        .logo{
            width: 80px;
            margin-bottom: 30px;
        }
        .col h3{
            width: fit-content;
            margin-bottom: 40px;
            position: relative;
        }
        .email{
            width: fit-content;
            border-bottom: 1px solid #ccc;
            margin: 20px 0;
        }
        .footer .col ul li {
            list-style: none;
            margin-bottom: 12px;
        }
        .footer .col ul li a{
            text-decoration: none;
            color: #fff;
        }
        form{
            padding-bottom: 15px; 
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            margin-bottom: 50px;
        }
        form .fa-regular{
            font-size: 18px;
            margin-right: 10px;
        }
        form input{
            width: 100%;
            background: transparent;
            color: #ccc;
            border: 0;
            outline: none;

        }
        form button{
            background: transparent;
            border: 0;
            outline: none;
            cursor: pointer;

        }
        form button .fa-solid{
            font-size: 16px;
            color: #ccc;
        }

        .social-icons {
            display: flex;
            margin-top: 0.5rem;
        }
        
        .social-icons a {
            width: 60px;
            height: 60px;
            border-radius: 5px;
            background: linear-gradient(to right,#00093c, #2d0b00);
            color: #fff;
            text-align: center;
            line-height: 35px;
            margin-right: 10px;
            transition: 0.3s;
        }
        
        .social-icons a:hover {
            transform: scale(1.05);
        }
        
        hr{
            width: 90%;
            border: 0;
            border-bottom: 1px solid #ccc;
            margin: 20px auto;
        }
        .copyright{
            text-align: center;
        }
        .underline{
            width: 100%;
            height: 5px;
            background: #767676;
            border-radius: 3px;
            position: absolute;
            top: 25px;
            left: 0;
            overflow: hidden;
        }
        .underline span{
            width: 15px;
            height: 100%;
            background:#fff;
            border-radius: 3px;
            position: absolute;
            top: 0;
            left: 10px;
            animation: moving 2s linear infinite;
        }
        @keyframes moving{
            0%{
                left:-20px;
            }
            100%{
                left:100%;
            } 

        }
        @media  (max-width: 700px)
        {
            footer{
                bottom: unset;
            }
            .col{
                flex-basis: 100%;
                
            }
            .col:nth-child(2), .col:nth-child(3){
                flex-basis: 100%;
            }
        }
    </style>
    
    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/Earnohire2.png" alt="">
        </div>
        <div class="navbar">
            <a href="#" class="active">Home</a>
            <a href="Knowmore.html">About Us</a>
            <a href="services.php">Services</a>
            <a href="blog_in.php">Blog</a>
            <a href="sps.php">Certified FreeLancers</a>
            <a href="user_profile.php">My Account</a>
            <a href="contact.html">Contact</a>
            <a href="home.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">Log Out</a>
        </div>
    </header>
    <header>
        
        <!-- <div class="navbar">
            <a href="#" class="active">Home</a>
            <a href="#">About us</a>
            <a href="services.php">Services</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>
            <a href="login.php">Sign in</a>
            <a href="register.php">Register</a>
        </div> -->
    </header>
    <div class="home">
     
        <video class="vid1" autoplay loop muted>
            <source src="images/freelance.mp4"  type="video/mp4"/>
            </video>
            <div class="text">
                <h1>Solution for Increasing<br> Unemployment in India<br> and Improve
                workforce</h1>
                <p>A Universal Solution for Unemployment and Encouraging importance of skills and <br>Knowledge in working sector of India. </p>
                <br>
                <a href="#">Know More</a>
                <a href="#">Explore</a>
            </div>
        </div>
            <section class="step-container">

                <div class="step">
                    <span>01</span>
                    <h3>Home Delivered <br>Services</h3>
                    <p>Receive premium services at your doorstep on one click.</p>
                    <a href="#" class="btn">learn more</a>
                </div>
            
                <div class="step">
                    <span>02</span>
                    <h3>Quality Assurance</h3>
                    <p>Service Provider has to undergo multiple verifications and quality checks to give you best service.</p>
                    <a href="#" class="btn">learn more</a>
                </div>
            
                <div class="step">
                    <span>03</span>
                    <h3>Courses</h3>
                    <p>Courses are available for the Service Providers who can learn new things or polish their knowledge.</p>
                    <a href="#" class="btn">learn more</a>
                </div>
            
            </section>
       
        <section class="vendor" id="vendor">
           
            <section class="vendor" id="vendor">

                <div class="heading">
                    <h1>Services Available</h1>
                    <img src="images/header-img.png" alt="">
                </div>
            
                <div class="box-container">
            
                    <div class="box">
                        <img src="images/ElectricalCheckup.jpg" alt="">
                        <div class="info">
                            <h3>Electrical Repairs</h3>
                            <p>Electrical repairs are important and we let user book them on one click</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <img src="images/PlumbingCheckup.jpg" alt="">
                        <div class="info">
                            <h3>Plumbing Repairs</h3>
                            <p>Plumbing repairs require a thorough inspection and we will connect you to best quality plumbers near you</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <img src="images/CateringSolutions.jpeg" alt="">
                        <div class="info">
                            <h3>Catering solutions</h3>
                            <p>There are so many options out there for catering but we help you find best deals with the help of rating system</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <img src="images/HouseKeeper.jpg" alt="">
                        <div class="info">
                            <h3>House Keepers</h3>
                            <p>Stop searching for a house keeper and Book House Keepers easily with Earno'hire. </p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <img src="images/electronicrepairs.jpeg" alt="">
                        <div class="info">
                            <h3>Computer Services</h3>
                            <p>Don't waste time visiting the stores for repairs and get your computer devices checked at home.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
            
                    <div class="box">
                        <img src="images/InteriorDesigner.jpg" alt="">
                        <div class="info">
                            <h3>Interior decorators</h3>
                            <p>Appearance of our house is very important for our mental health. Consult a Interior Decorator at Earno'hire.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
            
                </div>
            
    

        </section>
        <section class="clients" id="clients">

            <div class="heading">
                <h1>our next clients</h1>
                <img src="" alt="">
            </div>
        
            <div class="row">
        
                <div class="box-container">
                    <div class="box">
                        <img src="images/SAVE_20210914_132040.jpg" alt="">
                        <div class="info">
                            <h3>Sahyog College</h3>
                            <p> <i class="fas fa-quote-left"></i> We aim to give Sahyog College's students specialized courses and Freelance Opportunities. Students can gain Expereince and Earn Money while they are studying. <i class="fas fa-quote-right"></i> </p>
                        </div>
                 </div>
        
            </div>
        </div>
        </section>


        <div class="footer">
            <div class="row">
                <div class="col">
                    <img src="./images/Earnohire2.png" class="logo" alt="h">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Alias facilis similique ex enim culpa quam in praesentium quis
                         dolores eius?Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col">
                    <h3>Office <div class="underline"><span></span></div></h3>
                    <p>Thane station road</p>
                    <p>near talav pali</p>
                    <p>mumbai maharastra</p>
                    <p class="email">rely.co.earno_haire@gmail.com</p>
                    <h3>+91-9898500038</h3>
                </div>
                <div class="col">
                    <h3>Links <div class="underline"><span></span></div></h3>
                   <ul>
                    <li> <a href=""> Home</a></li>
                       <li> <a href="">Services</a></li>
                       <li> <a href="">About Us</a></li>
                        <li><a href="">Features</a></li>
                       <li> <a href="">Contact</a></li>
                   </ul>
                </div>
                <div class="col">
                    <h3>Newsletter <div class="underline"><span></span></div></h3>
                    <form action="">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" placeholder="Enter your Email Id" required>
                        <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </form>
                    <div class="social-icons">
                        <i class="fa fa-whatsapp"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-telegram"></i>
                        <i class="fa fa-twitter"></i>
                        
                    </div>
                </div>
            </div>
            <hr><p class="copyright">Rely Corporate @ 2023 - All Right Reserved</p>
        </div>
        
</body>
</html>