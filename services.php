<?php
   include 'config.php';
   session_start();
   $user_id = $_SESSION['id'];
   $user_name = $_SESSION['name'];

   if(isset($_POST['add_to_cart'])){

      $sv_name = $_POST['sv_name'];
      $sv_price = $_POST['sv_price'];
      $sv_image = $_POST['sv_image'];
      $sv_catagories = $_POST['sv_cata'];

      $select_cart = mysqli_query($conn, "SELECT * FROM `requests` WHERE sv_name = '$sv_name' AND user_name = '$user_name'") or die('query failed');
      
      
      if(mysqli_num_rows($select_cart) > 0){
         $message[] = 'Request already Raised!';
         
        }else{
            $select_user = mysqli_query($conn, "SELECT * FROM `user` where id='$user_id'") or die('query failed');
            if(mysqli_num_rows($select_user) > 0){
                $fetch_user = mysqli_fetch_assoc($select_user);
            }
            $city=$fetch_user['city'];

            $select_sp = mysqli_query($conn, "SELECT * FROM `sp`") or die('query failed');
            if(mysqli_num_rows($select_sp) > 0){
                while($fetch = mysqli_fetch_assoc($select_sp)){

                    $sp_id=$fetch['sp_id'];
                    $sp_city=$fetch['sp_city'];
                    $profession=$fetch['profession'];

                    if($city==$sp_city && $sv_catagories==$profession){
                        mysqli_query($conn, "INSERT INTO `requests`(user_name, user_city, sv_catagory, sv_name, price, image, all_to) 
                                            VALUES('$user_name','$city','$sv_catagories', '$sv_name', '$sv_price', '$sv_image','$sp_id');") or die('query failed');
                        $message[] = 'Request Raised!';
                    }
                }

            };
        }
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Services</title>

   <!-- custom css file link  -->
    <link rel="icon" href="images/logo.ico">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../trial3(pic)/css/footer.css">
   <style>
      html{
         font-size: 62.5%;
         overflow-x: hidden;
         scroll-padding-top: 6.5rem;
         scroll-behavior: smooth;
         }

         body{
         /* background:var(--black); */
            background: rgb(255, 251, 226);
         }
         
      header{
      width: 100%;
      /* position: fixed; */
      align-items: center;
      justify-content: space-between;
      }
      header .Logo{
      float:left;
      margin-top:15px;
      margin-left:15px;
      height:1vh;
      width:9vw;
      }
      header #navbar{
      font-family: Phonk Contrast DEMO;
      background-color: black;
      padding-top:100px;
      }
      header .button1 {
      float: right;
      margin-top: 15px;
      margin-right: 5px;
      float:right;
      font-family: Phonk Contrast DEMO;
      border-style: solid;
      border-color: black;
      border-radius: 5px;
      border-width: 2px;
      padding: 2px 10px;
      color:black;
      height: 35px;
      background: rgb(255, 251, 226);
      width: 115px;
      
      }
      header .button1:hover{
      background-color: black;
      color: white;

      }
      header i .fa{

      padding:10px;
      padding-left:10px;
      }

      #div1{
      padding-left:125px;
      padding-top:150px;
      }
      #div1 h1{

      font-size: 40pt;
      font-family:Britanica ExtraBold;
      z-index:1;
      }
      #div1 p
      {
      padding-top:50px;
      padding-bottom: 50px;
      font-family:Britanica ExtraBold;
      z-index:2;
      }
      a#knowmore{
      width: 200px;
      height: 200px;
      font-family:Albula Pro;
      background-color: black;
      color:white;
      font-size: 20px;
      padding:  15px 32px;
      margin-left: 50PX;
      border-radius: 30px;
      }

      /* =========================================================================== */
      .navbar{
      display: flex;
      flex-direction: row;
      float:right;
      margin-top: -70px;
      z-index:10;
      margin-right:30px;
      
      }
      .logo{
      display: flex;
      margin-left: 20px;

      }
      .navbar li{
      font-size: 15px;
      background-color: black;
      padding: 10px 20px;
      margin-left: 10px;
      border-radius: 5px;
      display: inline-flex;
      border-style: solid;
      
      }
      .navbar li:hover{
      background-color: #F3F3EB;
      border-color: black;
      color:black;
      }
      .navbar li a:hover{
      background-color: #F3F3EB;
      border-color: black;
      color:black;
      }
      /* ============================================Footer============================================== */
      .footer{
         color: white;
         width: 100%;
         font-size: 2rem;
      color:#fff;
      background: linear-gradient(to right,#00093c, #2d0b00);
      color: #fff;
      margin-top: 50px;
      border-top-left-radius:105px;
      border-top-right-radius:105px;
      font-size: 13px;
      line-height: 20px;

         position:absolute;
         padding:2.5rem 1.5rem;
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
      ul li {
         list-style: none;
         margin-bottom: 12px;
      }
      ul li a{
         text-decoration: none;
         color: #fff;
      }
      form{
         padding-bottom: 15px;
         display: grid;
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
         width: 35px;
         height: 35px;
         border-radius: 5px;
         background: linear-gradient(to right,#00093c, #2d0b00);
         color: #fff;
         text-align: center;
         line-height: 35px;
         margin-right: 0.5rem;
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

    /* ----------------------------------------------------------------- */
        .center{
            position: absolute;
            /* top: 50%;left: 50%;
            transform: translate(-50%,-50%); */
            top: 100%;left: 50%;
            transform: translate(-50%,-50%); 
        }
        .popup{
            width: 350px;
            height: 280px;
            padding: 30px 20px;
            background: #f5f5f5;
            border-radius: 10px;
            box-sizing: border-box;
            z-index: 2;
            text-align: center;
            opacity: 0;
            top: -20%;
            transform: translate(-50%,-50%), scale(0.5);
            transition: opacity 300ms ease-in-out,
                        top 1000ms ease-in-out,
                        transform 1000ms ease-in-out;
        }
        .popup.active{
            opacity: 1;
            top: 50%;
            transform: translate(-50%,-50%), scale(1);
            transition: transform 300ms cubic-bezier(0.18,0.89,0.43,1.19);
        }
        .popup .icon{
            margin: 5px 0px;
            width: 50px;
            height: 50px;
            border: 2px solid #34f234;
            text-align: center;
            display: inline-block;
            border-radius: 50%;
            line-height: 60px;
        }
        .popup .icon i.fa{
            font-size: 30px;
            color: #34f234;
        }
        .popup .title{
            margin: 5px 0px;
            font-size: 30px;
            font-weight: 600;
        }
        .popup .discription{
            color: #2222;
            font-size: 15px;
            padding: 5px;
        }
        .popup .dismiss{
            margin-top: 15px;
        }
        .popup .dismiss button{
            padding: 10px 20px;
            background: #111;
            color: #f5f5f5;
            border: 2px solid #111;
            font-size: 10px;
            font-weight: 600;
            outline: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 300ms ease-in-out;
        }
        .popup .dismiss button:hover{
            color: #111;
            background: #f5f5f5;
        }
        .popup>div{
            position: relative;
            top: 10px;
            opacity: 0;
        }
        .popup.active > div{
            top: 0px;
            opacity: 1;
        }
        .popup.active .icon{
            transition: all 300ms ease-in-out 250ms;
        }
        .popup.active .title{
            transition: all 300ms ease-in-out 300ms;
        }
        .popup.active .discription{
            transition: all 300ms ease-in-out 350ms;
        }
        .popup.active .dismiss{
            transition: all 300ms ease-in-out 400ms;
        }
   </style>

</head>
<body>
<!-- <header>
        <a href="#" class="logo"><a href="#" class="logo"><img src="images/Earnohire2.png"></a></a>
    
        <ul class="navbar">
            
            <li><a href="user_page.php" class="active">Home</a></li>
            <li><a href="Knowmore.html">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="sps.php">Certified FreeLancers</a></li>
            <li><a href="user_profile.php">My Account</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="home.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete_btn">Log Out</a></li>
        </ul>
    </header> -->
<br/>
<br/>
<br/>
<br/>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
      }
   }
   ?>

<div class="container">

   <div class="user-profile">
      <!-- / -->
      <!-- <?php
         $select_user = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
         };
      ?> -->

       <!-- <p> username : <span><?php echo $fetch_user['name']; ?></span> </p> -->
       <!-- <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>  -->
       <!-- <p> city : <span><?php echo $fetch_user['city']; ?></span> </p>  -->
      <div class="flex">
      <!-- <a href="home.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a> -->
       <!--  -->
      <a href="pending.php" class="btn11">Status</a>
      <a href="#" class="btn11" id="go-back">Back</a>
      </div>

   </div>
   

   <div class="products">

      <h1 class="heading">latest Services</h1>

      <div class="box-container">

         <?php
            $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_product) > 0){
               while($fetch_product = mysqli_fetch_assoc($select_product)){
         ?>
         <form method="post" class="box" action="">
            <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_product['name']; ?></div>
            <div class="name">Catagory: <?php echo $fetch_product['catagories']; ?></div>
            <div class="price"><?php echo $fetch_product['price']; ?>/-</div>
            <!-- <input type="number" min="1" name="product_quantity" value="1"> -->
            <input type="hidden" name="sv_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="hidden" name="sv_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="sv_cata" value="<?php echo $fetch_product['catagories']; ?>">
            <input type="hidden" name="sv_price" value="<?php echo $fetch_product['price']; ?>">
            <!-- <input type="submit" value="Get Service" name="add_to_cart" class="btn11"> -->
            <a href="payform.html" class="btn11">Get Service</a>
            
         <!-- <form method="post" class="box" action="services.php">
            <div class="popup center">
                <!-- <div class="icon">
                    <i class="fa fa-check"></i>
                </div> 
                <div class="title">
                    Success!
                </div>
                <!-- <div class="discription">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis velit voluptatibus quam iste quae corporis illo commodi maiores temporibus excepturi aperiam assumenda voluptatum magni, exercitationem a voluptatem delectus rerum alias.
                </div> 
                <div class="dismiss-btn">
                    <button id="dismiss" class="btn11">okey</button>
                </div>
            </div>
                <button id="open" class=" center btn11">rate</button>   
               </form> -->
         </form>
         <?php
            };
         };
         ?>
      </div>

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

<script>
     document.getElementById('open').addEventListener('click',function(){
            document.getElementsByClassName('popup')
            [0].classList.add('active');
        });
        document.getElementById('dismiss').addEventListener('click',function(){
            document.getElementsByClassName('popup')
            [0].classList.remove('active');
        });
   document.getElementById('go-back').addEventListener('click', () => {
   history.back();
});
</script>
</html>