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
    <title>Document</title>
    <!--1️⃣ code CSS below -->

<style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Koulen&family=Lato&family=Nunito&family=Playfair+Display:ital@1&family=Prata&family=Raleway:ital,wght@1,100&family=Roboto&family=Roboto+Condensed&family=Teko&display=swap');

        .btn{

        font-family: Roboto, sans-serif;
        font-weight: 100;
        font-size: 29px;
        color: #878080;
        background: linear-gradient(90deg, #ffffff 0%, #edfac9 100%);
        padding: 10px 30px;
        border: solid #bac6d1 2px;
        box-shadow: rgb(0, 0, 0) 0px 0px 0px 0px;
        border-radius: 50px;
        transition : 1181ms;
        transform: translateY(0);
        display: flex;
        flex-direction: row;
        align-items: center;
        cursor: pointer;
        }

        .btn:hover{

        transition : 1181ms;
        padding: 10px 46px;
        transform : translateY(-0px);
        background: linear-gradient(90deg, #ffffff 0%, #edfac9 100%);
        color: #1e1e1f;
        border: solid 2px #0066cc00;
        }
    /* --------------------------------------- */
    *{margin: 0;
        padding: 0;
        font-family: Britanica ExtraBold;
        box-sizing: border-box;
        
    }
    .formmain{
        width: 80%;
    }
    .container{
        margin-top: 100px;
        width:37%;
        height:600px;
        position: absolute;color:#fff;  
        text-align:center;
        margin-left: 35%;
        border-radius: 20px;
    background-color: black;

    }
    .container .form1{
        
        text-align: center;
        padding-top:50px;
        color:aqua;
        
    }
    h3{

        padding-top: 0;
    }
    .btn11{
        width:200px;
        padding:15px 0;
        text-align: center;
        margin:20px 10px;
        border-radius:25px;
        font-weight: bold;
        border:2px solid aqua;
        background: transparent;
        top: 50px;left:15px;
        transition:transform(-50%,-50%);
        color:#fff;
        cursor:pointer;
        position: relative;
        overflow: hidden;
        z-index:2;
        font-size: 20px;
    }
    span
    {
        background: aqua;
        height:100%;
        width:0%;
        border-radius: 20px;
        position:absolute;
        left:0;
        bottom:0;
        z-index:-1;
        transition:0.5s;
    }
    .btn11:hover span{
        width:100%;
        
    }
    .btn11:hover{
        color:black;
    }
    .inpfield{
        margin-top: 15px;
        font-size: 25px;
        padding:2%;
        border-radius:5px;
        text-align: center;
        
    }

    a{
        color:rgb(252, 252, 252);
    }
</style>
</head>
<body>
    
<!-- <button class="btn"></button> -->
<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
      }
   }
   ?>

   
      <div class="container">  <?php
            $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if(mysqli_num_rows($select_product) > 0){
                $fetch_product = mysqli_fetch_assoc($select_product);
            }
         ?>
      <form method="post" class="box" action="">
    
        <br><br>
        <h3> You have selected cash on Services..</h3>
        <h3>If you agree with service you can proceed the payment at Location.</h3>
        <h3>For any query you can communicate with us..</h3><br><br>
        <h3>Terms And Conditions Apply</h3>
        <!-- <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_product['name']; ?></div>
            <div class="name">Catagory: <?php echo $fetch_product['catagories']; ?></div>
            <div class="price"><?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="sv_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="hidden" name="sv_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="sv_cata" value="<?php echo $fetch_product['catagories']; ?>">
            <input type="hidden" name="sv_price" value="<?php echo $fetch_product['price']; ?>"> -->
        <button  name="add_to_cart" class="btn11"><span></span>Get Service</button>
</form>
      </div>


</body>
</html>