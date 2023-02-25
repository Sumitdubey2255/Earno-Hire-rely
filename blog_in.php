<?php

    include "config.php";
    $sql = "SELECT * FROM blog";
    $query = mysqli_query($conn, $sql);

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM blog WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Blog using PHP & MySQL</title>
    <style>
        body{
            background:#FFFEEB;
        }
      .card-body{
        background:#d2cfcf5d;
        
        border-radius: .7rem;
        box-shadow:0 .5rem 1rem rgba(0,0,0,.9);
      }
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
            margin-left: 850px;
        
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
            <!-- <a href="user_profile.php">My Account</a> -->
            <a href="contact.html">Contact</a>
            <!-- <a href="home.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">Log Out</a> -->
        </div>
    </header>
    <br/>
    <br/>
    <br/>   

    <div class="container mt-5">

        <!-- Display any info -->
        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                    Post has been added successfully
                </div>
            <?php }?>
        <?php } ?>

        <!-- Create a new Post button -->
        <div class="text-center">
            <a href="blog_create.php" class="btn btn-outline-dark">+ Create a new post</a>
        </div>

        <!-- Display posts from database -->
        <div class="row">
            <?php foreach($query as $q){ ?>
                <div class="col-12 col-lg-4 d-flex justify-content-center">
                    <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                        <div class="card-body">
                            <center>
                                <?php
                            //  $select = mysqli_query($conn, "SELECT * FROM `blog_data` WHERE id = '$id'") or die('query failed');
                            //  if(mysqli_num_rows($select) > 0){
                            //     $fetch = mysqli_fetch_assoc($select);
                            //  }
                            //  if($q['img'] == ''){
                            //     echo '<img src="img/default-avatar.png" style= "width: 190px;height:190px;object-fit: cover">';
                            //  }else{
                            //     echo '<img src="upload_img/'.$q['img'].'" style= "width: 190px;height:190px;object-fit: cover">';
                            //  }
                            // ?>
                             </center>
                            
                            <h5 class="card-title" align="center"><?php echo $q['title'];?></h5>
                            <p class="card-text"><?php echo substr($q['content'], 0, 50);?>...</p>
                            <a href="view.php?id=<?php echo $q['id']?>" class="btn btn-light">Read More <span class="text-danger">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
       
    </div>

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
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
                    <!-- <div class="social-icons">
                        <i class="fa fa-whatsapp"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-telegram"></i>
                        <i class="fa fa-twitter"></i>
                        
                    </div> -->
                </div>
            </div>
            <hr><p class="copyright">Rely Corporate @ 2023 - All Right Reserved</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCT/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>


