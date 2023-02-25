<?php
require 'config.php';
session_start();
$user_id = $_SESSION['id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

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
         mysqli_query($conn, "UPDATE `user` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }
// update image------------------------------------------------------------

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

   // upadate address----------------------------------------------------
   $full_address=mysqli_real_escape_string($conn,$_POST['address']);
   if(!empty($full_address)){
      mysqli_query($conn, "UPDATE `user` SET address = '$full_address' WHERE id = '$user_id'") or die('query failed');
      $message[] = 'address uploaded successfully!';
   }

   // update pincode--------------------------------------------
   $pincode=mysqli_real_escape_string($conn,$_POST['pin']);
   if(!empty($pincode) ){
   mysqli_query($conn, "UPDATE `user` SET address = '$full_address', pin_code='$pincode' WHERE id = '$user_id'") or die('query failed');
   $message[] = 'pincode uploaded successfully!';
   }

   // update city-------------------------------------------------
   // $city=mysqli_real_escape_string($conn,$_POST['city']);
   // if(!empty($full_address) || !empty($pincode) ){
   //    mysqli_query($conn, "UPDATE `user` SET address = '$full_address', pin_code='$pincode' WHERE id = '$user_id'") or die('query failed');
   //    // mysqli_query($conn, "UPDATE `user` SET address = '$full_address', city='$city', pin_code='$pincode' WHERE id = '$user_id'") or die('query failed');
   //    $message[] = 'address uploaded successfully!';
   // }
   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>update profile</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">

   <link rel="icon" href="images/logo.ico">
</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
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
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="old password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm password" class="box">
         </div>
         <div class="inputBox">
            <span>Full Address :</span>
            <input type="text" name="address" placeholder="your full address" class="box">
            <span>City :</span>
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