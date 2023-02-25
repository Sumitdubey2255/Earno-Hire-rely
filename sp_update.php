<?php
require 'config.php';
session_start();
$sp_id = $_SESSION['sp_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `sp` SET sp_name = '$update_name', sp_email = '$update_email' WHERE sp_id = '$sp_id'") or die('query failed');

   // update password---------------------------------------------

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn,$_POST['update_pass']);
   $new_pass = mysqli_real_escape_string($conn,$_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($conn,$_POST['confirm_pass']);

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `sp` SET sp_password = '$confirm_pass' WHERE sp_id = '$sp_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }
   // update image------------------------------------------------

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `sp` SET sp_image = '$update_image' WHERE sp_id = '$sp_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }
   // update adress-------------------------------------------------]
   $full_address=mysqli_real_escape_string($conn,$_POST['address']);
   if(!empty($full_address)){
    mysqli_query($conn, "UPDATE `sp` SET sp_address = '$full_address' WHERE sp_id = '$sp_id'") or die('query failed');
   $message[] = 'address uploaded successfully!';
   }

   // update profession-----------------------------------------
   $profession=mysqli_real_escape_string($conn,$_POST['prof']);
   if(!empty($profession)){
   mysqli_query($conn, "UPDATE `sp` SET profession = '$profession' WHERE sp_id = '$sp_id'") or die('query failed');
   $message[] = 'profession uploaded successfully!';
   }

    //  update city----------------------------------------------
    // $city=mysqli_real_escape_string($conn,$_POST['city']);
    // if(!empty($city)){
    //     mysqli_query($conn, "UPDATE `sp` SET sp_city='$city' WHERE sp_id = '$sp_id'") or die('query failed');
    // $message[] = 'address uploaded successfully!';
    // }

    // update pincode-------------------------------
   $pincode=mysqli_real_escape_string($conn,$_POST['pin']);
   if(!empty($full_address)){
    mysqli_query($conn, "UPDATE `sp` SET sp_pincode='$pincode' WHERE sp_id = '$sp_id'") or die('query failed');
   $message[] = 'address uploaded successfully!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>update profile</title>

   <link rel="icon" href="images/logo.ico">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">
   <!-- <link rel="stylesheet" href="../trial3(pic)/css/style.css"> -->

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `sp` WHERE sp_id = '$sp_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['sp_image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['sp_image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['sp_name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['sp_email']; ?>" class="box">
            <span>update profile:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['sp_password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="old password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm password" class="box">
         </div>
         <div class="inputBox">
            <!-- <input type="hidden" name="address"> -->
            <span>Full Address :</span>
            <input type="text" name="address" placeholder="your full address" class="box">
            <!-- <textarea name="address" placeholder="enter your full address" class="box" length=50></textarea> -->
            <span>City :</span>
            <!-- <input type="text" name="city" placeholder="enter your city" class="box"> -->
            <select name="city" class="box">
               <option value="" disabled selected hidden>Select city</option>
               <option value="thane">Thane</option>
               <option value="mumbai">Mumbai</option>
               <option value="delhi">Delhi</option>
               <option value="panjab">Panjab</option>
            </select>
            <span>Pin code :</span>
            <input type="text" name="pin" placeholder="enter pincode" class="box">
            
         </div>
         
      </div>
      <div class="flex">
      <div class="inputBox">
      <span>Profession :</span>
            <!-- <input type="text" name="prof" placeholder="enter your profession" class="box"> -->
            <select name="prof" class="box">
               <option value="" disabled selected hidden>Select Profession</option>
               <option value="electric">Electic</option>
               <option value="plumbing">Plumbing</option>
               <option value="household">HOuse Hold Service</option>
            </select>
      </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="#" id="go-back" class="delete-btn">go back</a>
   </form>

</div>

</body>
<script>
   document.getElementById('go-back').addEventListener('click', () => {
   history.back();
});
</script>
</html>