<?php
require 'config.php';
session_start();

$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:index.html');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:index.html');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <link rel="icon" href="images/logo.ico">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
</body>
<script>
</script>
</html>