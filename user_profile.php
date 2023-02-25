<?php
require 'config.php';
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>My profile</title>

   <link rel="icon" href="images/logo.ico">
   <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="../trial3(pic)/css/style.css"> -->
   <link rel="stylesheet" href="css/style2.css">
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <!-- <link rel="stylesheet" href="../trial3(pic)/css/home.css"> -->
   <link rel="stylesheet" href="../trial3(pic)/css/footer.css">


</head>
<body>
<br/>
    <?php
         $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch_product = mysqli_fetch_assoc($select);
         }
      ?>
    <div class=" row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
        <div class="col-md-4 text-center"> 
            <?php
               $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
               if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);
               }
               if($fetch['image'] == ''){
                  echo '<img src="images/default-avatar.png" class="img-fluid rounded" style= "width: 190px;height:190px;object-fit: cover">';
               }else{
                  echo '<img src="uploaded_img/'.$fetch['image'].'" class="img-fluid rounded" style= "width: 190px;height:190px;object-fit: cover">';
               }
            ?>
            <!-- <img src="images/user.jpg" class="img-fluid rounded" style= "width: 190px;height:190px;object-fit: cover"> -->
            <div>
                <!-- <button class="m-4 btn btn-primary hidden" >Know more</button> -->
                <table class="table table-striped">
                <!-- <tr>
                    <th>Rating: </th>
                    <td>
                    <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    </div>
                </td></tr> -->
                </table>
            </div>
        </div>
        <div class="col-md-8">
            <div class="h2">User Profile</div>
            <table class="table table-striped">
            
                <tr><th colspan="2">User Deatils:</th></tr>
                <tr><th>Name</th><td><?php echo $fetch_product['name']; ?></td></tr>
                <tr><th>Email</th><td><?php echo $fetch_product['email']; ?></td></tr>
                <tr><th>Phone </th><td>86574512</td></tr>
                <tr><th>Location </th><td><?php echo $fetch_product['city']; ?></td></tr>
                <!-- <tr><th>Performance</th><td><?php echo $fetch_product['profession']; ?></td></tr> -->
            </table>
        </div>
         <a href="user_update.php" class="btn">update profile</a>
         <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
         <a href="#" class="btn" id="go-back">Back</a>   
    </div> 
<br/>
<!-- <div class="container"> -->
   <!-- <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $fetch['name']; ?></span></h1>
      <p>this is an user page</p>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <a href="#" class="btn" id="go-back">Back</a>
   </div> -->

<!-- </div> -->

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