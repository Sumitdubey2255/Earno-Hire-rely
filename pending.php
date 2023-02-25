<?php
require 'config.php';
session_start();
// $user_id = $_SESSION['id'];
$user_name = $_SESSION['name'];

// if(isset($_GET['logout'])){
//    unset($user_id);
//    session_destroy();
//    header('Location: login.php');
// };

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `requests` WHERE user_name = '$user_name'") or die('query failed');
 //    header('location:requests.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/logo.ico">
    <title>Status</title>
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
            <h1 class="heading">Status</h1>
            <table>
            <thead>
                <th>service id</th>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>total price</th>
                <th>Acceptance</th>
            </thead>
            <tbody>
            <?php
                $cart_query = mysqli_query($conn, "SELECT * FROM `requests` WHERE user_name = '$user_name'") or die('query failed');
                $grand_total = 0;
                if(mysqli_num_rows($cart_query) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
            ?>
            <tr>
                <td><?php echo $fetch_cart['id']; ?></td>
                <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                <td><?php echo $fetch_cart['sv_name']; ?></td>
                <td><?php echo $fetch_cart['price']; ?>/-</td>
                <td><?php echo $sub_total = ($fetch_cart['price']); ?>/-</td>
                <!-- <td><a href="?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('it will be remove from here..');">Accept</a></td> -->
                <td><a href="" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" value="pending">pending</a></td>
            </tr>
            <?php
                $grand_total += $sub_total;
                    }
                }else{
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No services was raised..</td></tr>';
                }
            ?>
            <tr class="table-bottom">
                <td colspan="4">grand total :</td>
                <td><?php echo $grand_total; ?>/-</td>
                <td><a href="?delete_all" onclick="return confirm('clear all?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">cancle order</a></td>
                <!-- <td><a href="?accept_all" onclick="return confirm('Accept all?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">accept all</a></td> -->
            </tr>
            </tbody>
            </table>

            <div class="cart-btn">  
            <!-- <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a> -->
            </div>
            <!-- <a href="#" class="btn" id="go-back">Back</a> -->
        </div>
<!-- previous done orders ---------------------------------------------------------- -->
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<h1>=================================================</h1>
        <div class="shopping-cart">
            <h1 class="heading">previous orders</h1>
            <table>
            <thead>
                <th>service id</th>
                <th>Earno's id</th>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>Ratings</th>
                <!-- <th>total price</th> -->
                <!-- <th>Acceptance</th> -->
            </thead>
            <tbody>
            <?php
                $cart_query = mysqli_query($conn, "SELECT * FROM `accepted` WHERE users_name = '$user_name'") or die('query failed');
                $grand_total = 0;
                if(mysqli_num_rows($cart_query) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
            ?>
            <tr class="table-bottom">
                <td><?php echo $fetch_cart['id']; ?></td>
                <td><?php echo $fetch_cart['sp_id']; ?></td>
                <td><img src="images/<?php echo $fetch_cart['acc_image']; ?>" height="100" alt=""></td>
                <td><?php echo $fetch_cart['acc_name']; ?></td>
                <td><?php echo $fetch_cart['acc_price']; ?>/-</td>
                <!-- <td><?php echo $sub_total = ($fetch_cart['acc_price']); ?>/-</td> -->
                <td><a href="?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('it will be remove from here..');">Accept</a></td>
                <!-- <td><a href="" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" value="done">done</a></td> -->
            </tr>
            <?php
                $grand_total += $sub_total;
                    }
                }else{
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">Empty..</td></tr>';
                }
            ?>
            <tr class="table-bottom">
                <!-- <td colspan="4">grand total :</td> -->
                <!-- <td><?php echo $grand_total; ?>/-</td> -->
                <!-- <td><a href="?delete_all" onclick="return confirm('clear all?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">cancle order</a></td> -->
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