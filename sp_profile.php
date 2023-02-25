<?php
require 'config.php';
session_start();

$sp_id = $_SESSION['sp_id'];

if(!isset($sp_id)){
   header('Location: login.php');
};

if(isset($_GET['logout'])){
   unset($sp_id);
   session_destroy();
   header('Location: login.php');
}
if(isset($_POST['submit'])){
    $message[] = 'Request Raised!';  
     echo
    "<script> alert('Username or email has already taken'); </script>";
 };
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/logo.ico">
   <title>service provider page</title>
   <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/home.css"> -->
   <!-- <link rel="stylesheet" href="../trial3(pic)/css/home.css"> -->
   <link rel="stylesheet" href="../trial3(pic)/css/footer.css">
   <!-- <style>
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


   </style> -->
</head>
<body>
    
<!-- <header>
    <a href="#" class="logo"><a href="#" class="logo"><img src="./images/Earnohire2.png"></a></a>

    <ul class="navbar">
        
        <li><a href="user_page.php" class="active">Home</a></li>
        <li><a href="Knowmore.html.#Aboutus">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li> <a href="login.php" ><i class="ri-user-fill"></i>Sign In</a></li>
        <li> <a href="register.php">Register</a></li>
            
    </ul>
</header>
      -->
    <?php
        $select_product = mysqli_query($conn, "SELECT * FROM `sp` where sp_id='$sp_id' ") or die('query failed');
        if(mysqli_num_rows($select_product) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_product)){
    ?>
    <div class=" row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
        <div class="col-md-4 text-center">
            <?php
               $select = mysqli_query($conn, "SELECT * FROM `sp` WHERE sp_id = '$sp_id'") or die('query failed');
               if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);
               }
               if($fetch['sp_image'] == ''){
                  echo '<img src="images/default-avatar.png" style= "width: 190px;height:190px;object-fit: cover">';
               }else{
                  echo '<img src="uploaded_img/'.$fetch['sp_image'].'" style= "width: 190px;height:190px;object-fit: cover">';
               }
            ?>
            <!-- <img src="images/user.jpg" class="img-fluid rounded" style= "width: 190px;height:190px;object-fit: cover"> -->
            <div>
                <br/>
                <input type="submit" name="submit" value="Complete kYC now" id="btn">
                <!-- <button class="m-4 btn btn-primary hidden" >Know more</button> -->
                <br/>
                <br/>
                <table class="table table-striped">
                <tr>
                    <th>Rating: </th>
                    <td>
                    <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    </div>
                </td></tr>
                </table>
            </div>
        </div>
        <div class="col-md-8">
            <div class="h2">Your Profile</div>
            <table class="table table-striped">
            
                <tr><th colspan="2">Your Deatils:</th></tr>
                <tr><th>Name</th><td><?php echo $fetch_product['sp_name']; ?></td></tr>
                <tr><th>Email</th><td><?php echo $fetch_product['sp_email']; ?></td></tr>
                <tr><th>Phone </th><td>86574512</td></tr>
                <tr><th>Location </th><td><?php echo $fetch_product['sp_city']; ?></td></tr>
                <tr><th>Performance</th><td><?php echo $fetch_product['profession']; ?></td></tr>
            </table>
        </div>   
                <a href="sp_update.php" class="btn">update profile</a>
                <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
                <a href="#" class="btn" id="go-back">Back</a> 
    </div> 
    
    <?php
        };
    };
    ?>
    <br/>
    <br/>
    <br/>
 <!-- -------------------------acceptance---------------------------- -->
   <div class="container">    
         <div class="shopping-cart">
            
            <h1>==============================================</h1>
            <br/>
            <h1 class="heading">Accepted Jobs</h1>
            <table>
            <thead>
                <th>user name</th>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>total price</th>
                <th>action</th>
            </thead>
            <tbody>
            <?php
                $cart_query = mysqli_query($conn, "SELECT * FROM `accepted` where sp_id='$sp_id'") or die('query failed');
                $grand_total = 0;
                if(mysqli_num_rows($cart_query) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
            ?>
            <tr>
                <td><?php echo $fetch_cart['users_name']; ?></td>
                <td><img src="images/<?php echo $fetch_cart['acc_image']; ?>" height="100" alt=""></td>
                <td><?php echo $fetch_cart['acc_name']; ?></td>
                <td><?php echo $fetch_cart['acc_price']; ?>/-</td>
                <td><?php echo $sub_total = ($fetch_cart['acc_price']); ?>/-</td>
                <td><a href="?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('You Accepted this job..');">Accepted</a></td>
            </tr>
            <?php
                $grand_total += $sub_total;
                    }
                }else{
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no Service Done Yet</td></tr>';
                }
            ?>
            <tr class="table-bottom">
                <td colspan="4">total Earnings:</td>
                <td><?php echo $grand_total; ?>/-</td>
                <td><a href="?delete_all" onclick="return confirm('clear all?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
                <!-- <td><a href="?accept_all" onclick="return confirm('Accept all?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">accept all</a></td> -->
            </tr>
            </tbody>
            </table>

            <div class="cart-btn">  
            <!-- <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a> -->
            </div>
            <a href="#" class="btn" id="go-back">Back</a>
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
   document.getElementById('go-back').addEventListener('click', () => {
   history.back();
});
</script>
</html>