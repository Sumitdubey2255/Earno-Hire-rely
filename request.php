<?php
include 'config.php';
session_start();
$sp_id = $_SESSION['sp_id'];
$sp_name = $_SESSION['sp_name'];
$user_name = $_SESSION['name'];
$user_id = $_SESSION['id'];

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
// to fetch the data from another table to get the columns..

    $select_user = mysqli_query($conn, "SELECT * FROM `requests` WHERE user_name = '$user_name'") or die('query failed');
    if(mysqli_num_rows($select_user) > 0){
    $fetch_user = mysqli_fetch_assoc($select_user);
    $sv_name= $fetch_user['sv_name'];
    $sv_price= $fetch_user['price'];
    $sv_image= $fetch_user['image'];
    $sv_all_to=$fetch_user['all_to'];

    }

    
    if($sp_id==$sv_all_to){
//    insert data in another table which show request is accepted by the service provider..
   mysqli_query($conn, "INSERT INTO `accepted` ( users_id, sp_id, users_name, acc_name, acc_price, acc_image) 
                VALUES('$user_id','$sp_id','$user_name', '$sv_name', '$sv_price', '$sv_image');") or die('query failed');

//    removing data from request bcz it was accepted..
   mysqli_query($conn, "DELETE FROM `requests` WHERE id = '$remove_id'") or die('query failed');
//    header('location:requests.php');
    }
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `requests` WHERE user_name = '$user_name'") or die('query failed');
//    header('location:requests.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/logo.ico">
    <title>service requests</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
      }
   }
   ?>
    <div class="container">
        <div class="shopping-cart">
            <h1 class="heading">Requests</h1>
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
                $cart_query = mysqli_query($conn, "SELECT * FROM `requests` WHERE user_name = '$user_name'") or die('query failed');
                $grand_total = 0;
                if(mysqli_num_rows($cart_query) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
                        if($sp_id==$fetch_cart['all_to']){
            ?>
            <tr>
                <td><?php echo $fetch_cart['user_name']; ?></td>
                <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                <td><?php echo $fetch_cart['sv_name']; ?></td>
                <td><?php echo $fetch_cart['price']; ?>/-</td>
                <td><?php echo $sub_total = ($fetch_cart['price']); ?>/-</td>
                <td><a href="?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('it will be Your resposiblity to finish work as soon as posible..');">Accept</a></td>
            </tr>
            <?php
                $grand_total += $sub_total;
                        }
                    }
                }else{
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no request availbable</td></tr>';
                }
            ?>
            <tr class="table-bottom">
                <td colspan="4">Total revenu will be:</td>
                <td><?php echo $grand_total; ?>/-</td>
                <td><a href="?delete_all" onclick="return confirm('clear all?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
                <!-- <td><a href="?accept_all" onclick="return confirm('Accept all?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">accept all</a></td> -->
            </tr>
            </tbody>
            </table>

            <div class="cart-btn">  
            <!-- <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a> -->
            </div>
            <a href="#" class="btn11" id="go-back">Back</a>
        </div>
    </div>
</body>

<script>
   document.getElementById('go-back').addEventListener('click', () => {
   history.back();
});
</script>
</html> 