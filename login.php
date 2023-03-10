<?php
require 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['lemail']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $user=mysqli_real_escape_string($conn, $_POST['user_types']);

   if ($user=='user') {
      $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'");

      if(mysqli_num_rows($select) > 0){
         $row = mysqli_fetch_assoc($select);
         // $_SESSION['user_id'] = $row['id'];
         // header('location: home.php');
         // if($row['user_type'] == 'user'){
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            header('Location: user_page.php');

      }
      else{
         $message[] = 'incorrect email or password for user!';
         echo
         "<script> alert('User Not registered'); </script>";
      }
   }else{
      $select = mysqli_query($conn, "SELECT * FROM `sp` WHERE sp_email = '$email' AND sp_password = '$pass'");
      
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
         // $_SESSION['user_id'] = $row['id'];
         // header('location: home.php');
         // if($row['user_type'] == 'service_provider'){
            $_SESSION['sp_id'] = $fetch['sp_id'];
            $_SESSION['sp_name'] = $fetch['sp_name'];
            header('Location: sp_page.php');
         // }
      }else{
         $message[] = 'incorrect email or password for Service provider!';
         echo
         "<script> alert('User Not registered'); </script>";
      }

   }
  
}
// for sp================================================================


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./images/logo.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2cdc9fa11a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
        <title>Login..</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');


            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            body{
                font-family: 'Poppins', sans-serif;
                overflow: hidden;
            }

            a{
                text-decoration: none;
                color: unset;
            }
            a:hover{
                color: #3ac6e1 !important;
            }
            .container{
                width: 100vw;
                height: 100vh;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                padding: 0 2rem;
            }
            .img{
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }
            .img img{
                width: 500px;
            }
            .video{
                margin-left:200px;
                z-index:-1;
            }

            .login-content{
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                margin-left: -200px;
            }
            .title-container{
                text-align: left;
                padding-bottom: 40px;
            }
            .title-container h1{
                color: #3ac6e1;
                font-size: 30px;
                font-weight: 600;
            }
            .title-container h2{
                font-size: 30px;
                font-weight: 600;
                text-transform: none;
                margin: 2px 0;
            }
            .title-container p{
                font-size: 15px;
                font-weight: 500;
                color: #c0c0c0;
            }
            .login-inner-content{
                padding-top: 5px;
                padding-right: 10px;
                padding-bottom: 20px;
                padding-left: 10px;
                border-radius: 10px;
                box-shadow: 0px 0px 26px -6px rgba(0,0,0,0.10);
            }
            .login-content .input-div{
                position: relative;
                display: grid;
                grid-template-columns: 7% 93%;
                margin: 5px;
                padding: 5px 0;
                border-bottom: 2px solid #d9d9d9;
            }
            .login-content .input-div.one{
                margin-top: 0;
            }

            .i{
                color: #d9d9d9;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .i i{
                transition: .3s;
            }
            .input-div > div{
                position: relative;
                height: 45px;
            }
            .input-div > div{
                position: relative;
                height: 45px;
            }
            .input-div > div > h5{
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: #999;
                font-size: 15px;
                transition: .3s;
                font-weight: 500;
            }

            .input-div .box{
                width: 100%;
                border-radius: 5px;
                color: #000;
                border: #999;;
                padding:5px 5px;
                font-size: 15px;
                margin:5px 0;
            }
            .input-div:before, .input-div:after{
                content: '';
                position: absolute;
                bottom: -2px;
                width: 0%;
                height: 2px;
                background-color: #3ac6e1;
                transition: .4s;
            }
            .input-div:before{
                right: 50%;
            }
            .input-div:after{
                left: 50%;
            }
            .input-div.focus:before, .input-div.focus:after{
                width: 50%;
            }

            .input-div.focus > div > h5{
                top: 3px;
                font-size: 10px;
                font-weight: 500;
            }
            .input-div > div > input{
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                border: none;
                outline: none;
                background: none;
                padding: 0.5rem 0.7rem;
                font-size: 15px;
                color: #555;
                font-family: 'poppins', sans-serif;
            }
            .input-div.pass{
                margin-bottom: 4px;
            }
            .login-inner-content a{
                display: block;
                text-align: right;
                color: rgb(0, 0, 0);
                margin-top: 10px;
                font-size: 10px;
                font-weight: 600;
                transition: .3s;
            }
            .btn{
                display: block;
                width: 100%;
                height: 50px;
                border-radius: 50px;
                outline: none;
                border: none;
                background-image: linear-gradient(to right, #5bdffa, #36cbe9, #5bdffa );
                background-size: 200%;
                font-size: 1.2rem;
                color: #fff;
                font-family: 'poppins',sans-serif;
                margin: 1rem 0;
                cursor: pointer;
                transition: .5s;
            }
            .btn:hover{
                background-position: right;
            }

            h5{
                font-size: 12px;
                font-weight: 600;
            }


            /* Mobile Responsive */

            @media screen and (max-width: 1050px){
                .container{
                    grid-gap: 5rem;
                }
            }
            @media screen and (max-width: 1000px){
            .title-container h2{
                font-size: 25px !important;
            }
            form{
                width: 290px;
            }
            .login-content h2{
                font-size: 2.4rem;
                margin: 8px 0;
            }
            .img img{
                width: 400px;
            }
            }
            @media screen and (max-width: 900px){
                .container{
                    grid-template-columns: 1fr;
                }
                .img{
                    display: none;

                }
                .video{
                    display:none;
                }
                .login-content{
                    justify-content: center;
                    margin-left: 0px;
                }
            }
        </style>
</head>
<body>
    <div class="container">
        <div class="video">
            <!-- <video src="a.mp4" alt="BG"> -->
            <video width="800" height="800" autoplay loop muted>
                <source src="./images/a.mp4" alt="BG" type="video/mp4" />
            </video>
        </div>
        <div class="login-content">
            <form action=""  method="post" enctype="multipart/form-data">
                <div class="title-container">
                    <h1>Login</h1>
                    <h2>Hello, Friends!</h2>
                    <p>Enter your personal detail and start journey with us.</p>
                </div>
                <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                        
                    }
                }
                ?>
                <div class="login-inner-content">
                    <div class="input-div one">
                        <div class="i">
                            <i class="far fa-user-circle"></i>
                        </div>
                        <div class="div">
                            <h5>Email</h5>
                            <input type="text" name="lemail" class="input">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-eye" onclick="show()"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input id="pswrd" type="password" name="password" class="input">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">
                            <i class="far fa-user-circle"></i>
                        </div>
                        <div class="div">
                            <!-- <h5>UserType</h5> -->
                            <select name="user_types" class="box">
                                <option  value="" disabled selected hidden>Select Type of User</option>
                                <option  value="user">User</option>
                                <option  value="service_provider">Service Provider</option>
                            </select>
                            <br/>
                        </div>
                    </div>
                    <a href="#">Forgot password / Username</a>
                </div>
                <input type="submit" class="btn" name="submit" value="Login">
                <h5>Not a member ? <a href="./register.php">Create Account</a></h5>
            </form>
        </div>
    </div>
    <script>

        const inputs = document.querySelectorAll(".input");

        function addcl(){
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl(){
            let parent = this.parentNode.parentNode;
            if(this.value == ""){
                parent.classList.remove("focus");
            }
        
        }

        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl)
        });


        // See Password

        function show() {
            var pswrd = document.getElementById('pswrd');
            var icon = document.querySelector('.fas');
            if (pswrd.type === "password") {
                pswrd.type = "text";
                icon.style.color = "#4dd8f3";
            } else{
                pswrd.type = "password";
                icon.style.color = "#d9dde4";
            }


        }
    </script>
</body>
</html>