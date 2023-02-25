<?php
include 'config.php';
session_start();
$sp_id=$_SESSION['sp_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
   <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <link rel="stylesheet" href="css/home.css">

    
</head>
<body>
<header>
        <a href="#" class="logo"><a href="#" class="logo"><img src="images/Earnohire2.png"></a></a>
    
        <ul class="navbar">
            
            <li><a href="user_page.php" class="active">Home</a></li>
            <li><a href="Knowmore.html">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="sps.php">Certified FreeLancers</a></li>
            <li><a href="user_profile.php">My Account</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="home.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">Log Out</a></li>
        </ul>
    </header>
     
    <?php
        $select_product = mysqli_query($conn, "SELECT * FROM `sp`") or die('query failed');
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
                  echo '<img src="images/default-avatar.png" class="img-fluid rounded" style= "width: 190px;height:190px;object-fit: cover">';
               }else{
                  echo '<img src="uploaded_img/'.$fetch['sp_image'].'" class="img-fluid rounded" style= "width: 190px;height:190px;object-fit: cover">';
               }
            ?>
            <!-- <img src="images/user.jpg" class="img-fluid rounded" style= "width: 190px;height:190px;object-fit: cover"> -->
            <div>
                <button class="m-4 btn btn-primary hidden" >Know more</button>
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
            <div class="h2">FreeLancer's Profile</div>
            <table class="table table-striped">
            
                <tr><th colspan="2">Minimal Deatils:</th></tr>
                <tr><th>Name</th><td><?php echo $fetch_product['sp_name']; ?></td></tr>
                <tr><th>Email</th><td><?php echo $fetch_product['sp_email']; ?></td></tr>
                <tr><th>Phone </th><td>86574512</td></tr>
                <tr><th>Location </th><td><?php echo $fetch_product['sp_city']; ?></td></tr>
                <tr><th>Performance</th><td><?php echo $fetch_product['profession']; ?></td></tr>
            </table>
        </div>   
    </div> 
    <?php
        };
    };
    ?>
</body>
</html>