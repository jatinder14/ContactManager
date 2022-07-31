<!DOCTYPE html>
<html lang="en">
<?php
    session_start();    
    if (isset($_POST['submit'])) {
            if($_POST['email']=='' && $_POST['password']==''){
                $error_email="email is required";
                $error_password="password is required";
 
                 
             }   
            else if($_POST['email']==''){
               $error_email="email is required";
                
            }
            else if($_POST['password']==''){
               $error_password="password is required";
               $email=$_POST['email'];
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_email = "Please enter a valid email address";
                   
}

            }
            
            else{
                if($_POST['email']!='' ){
                    $email=$_POST['email'];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                         $error_email = "Please enter a valid email address";
                        
    }
    
                else{
                
            
             require_once "config.php";
             $email = $_POST['email'];
             $password = $_POST['password'];
             $exist="select * from users where email='$email' and password='$password'";
             $result=$conn->query($exist) ;
             $rows = mysqli_fetch_array($result);
             if ($result->num_rows > 0) {
                $_SESSION["email"]=$rows['email'];
                $_SESSION["password"]=$rows['password'];
                $_SESSION['id']=$rows['id'];
                $_SESSION['name']=$rows['name'];
                header("Location: http://localhost/contact_application/index.php");
                                        } 
                                        
        else { 
                $register="click on <a href='register.php'>Register</a>";
                
                $_SESSION['message']="<center><b>user does not exist  $register</b></center></div>";
                header("Location: http://localhost/contact_application/index.php");
                exit;
                      
                 
            }
                                    }
                       } }          }
    ?>
   
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            .error {
                font-size: 10px;
                width: 100%;
                color: red;
                font-size: 12px;


            }
                     

            .bottom_error{
                color: red;
                background-color: white; 
                font-size: 30px; 
                width: 600px; 
                position: relative; 
                left: 350px; 
                bottom: 49px;
                border-width: 1px;
                border-style: solid;
                border: re
                
            }

            .php_error {
                font-size: 10px;
                width: 100%;
                color: red;
                font-size: 12px;
                position: relative;
                top: -24px;
                left: 18px;


            }
            .form-group {
                margin-bottom: 22px;
            }
            .form-group label.error {
                position: absolute;
                left: 77px;
            }
        </style>
    </head>

    <body class="bg-gradient-primary">
        <div class="container style='position:fixed;' ">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <?php
                                                 if(isset($_SESSION['register'])){
                                                    echo "<center><p class='alert alert-successful text-success' >You have been sucessfully registered <br/> please login !!</p></center>";
                                                    unset( $_SESSION['register']);
                                                    
                                    
                                                }
                                        ?>
                                        <form class="user" id='loginform'  method="post" action="">
                                        <div class="form-group">
                                                <input  class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..."   name="email">
                                            </div>
                                            <div id="show_error" class="php_error"><?php 
                                                                                        if($error_email!='')
                                                                                        echo $error_email;  
                                                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                            </div>
                                            <div id="show_error" class="php_error"><?php 
                                                                                   if($error_password!='')
                                                                                     echo $error_password;  
                                            
                                                                                ?>
                                            </div>
                                            <input type="submit" name='submit' id="submit" class="btn btn-primary btn-user btn-block">
                                            <hr>
                                        </form>
                                        <!--<div class="text-center">
                                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                                        </div>
                                            -->
                                        
                                        <div class="text-center">
                                            <a class="small" href="register.php">Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_error">
           <?php 
           if($_SESSION['message']!=''){
            echo $_SESSION['message'];
            unset($_SESSION['message']);   
        }
          

           ?>
        
        </div>
        <!-- Including app.js jQuery Script -->
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        <script>
            $("#loginform").validate({
                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 4
                    }
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    email: {
                        required: "Email Address is required",

                        //required: "email is invalid ! Please enter a valid email",
                    },
                    password: {
                        required: " Password is required",
                        minlength: " Your password must be consist of at least 5 characters"
                    }
                }
            });
        </script>
    </body>
</html>