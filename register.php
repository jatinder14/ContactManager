<?php
    session_start();
    require_once "config.php";
 
    if(isset($_POST['submit'])) {
        if($_POST['email']=='' && $_POST['password']=='' && $_POST['name']==''){
            $error_email="email is required";
            $error_password="password is required";
            $error_name="name is required";
         }else if($_POST['email']=='' && $_POST['password']==''){
            $error_email="email is required";
            $error_password="password is required";
            }else if($_POST['email']=='' && $_POST['name']==''){
            $error_email="email is required";
            $error_name="name is required";
         }else if($_POST['name']=='' && $_POST['password']==''){
            $error_name="name is required";
            $error_password="password is required";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Please enter a valid email address";
            }
         }else if($_POST['email']==''){ 
           $error_email="email is required";
         }else if($_POST['name']==''){
            $error_name="name is required";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Please enter a valid email address";
            }
         } else if($_POST['password']==''){
           $error_password="password is required";
           $email=$_POST['email'];
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Please enter a valid email address";
               
            }

        }
        
        else {
            if($_POST['email']!='' ){
                $email=strtolower($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     $error_email = "Please enter a valid email address";
                    
                }else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $email=strtolower($email);
                $password = $_POST['password'];
            
                $exist="select * from users where email='$email'";
                $result=$conn->query($exist) ;
                if (!($result->num_rows > 0)) {
                    $sql="insert into users  (name, email, password) values('$name','$email','$password') ";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['register']=1;
                        header("Location: http://localhost/contact_application/login.php");
                    } else {
                        echo die("Error: " . $sql . "<br>" . $conn->error);
                        }
                }
                else{
                    $error_email="Email address already registered.";
                    $_SESSION['message']=$error_email;
                    header("Location: http://localhost/contact_application/register.php");
                    die();
                }
                }
            } 
        }
    }          
?>

<!DOCTYPE html>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Register</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->

        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            .error {
                width: 100%;
                color: red;
                font-size: 12px;


            }
            .bottom_error {
                color: red;
                background-color: white; 
                font-size: 30px; 
                width: 600px; 
                position: relative; 
                left: 350px; 
                bottom: 49px;
                border-width: 1px;
                border-style: solid;                
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
                position: relative;
                left: 18px;
                top: 1px;
            }   
        </style>
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" id="registerform"  method="post" action="" >
                                    <div class="form-group row">
                                        <input type="text" class="form-control form-control-user" id="name" placeholder="Enter name" name="name">
                                    </div>
                                    <div id="show_error" class="php_error"><?php 
                                                                                if($error_name!='')
                                                                                    echo $error_name;
                                                                            ?>
                                    </div>
                                    <div class="form-group row">
                                        <input  class="form-control form-control-user " id="email" placeholder="Email Address" name="email"  />
                                    </div>
                                    <div id="show_error" class="php_error"><?php 
                                                                                if($error_email!='')
                                                                                    echo $error_email;
                                                                                if($_SESSION['message']!=''){
                                                                                    echo $_SESSION['message'];
                                                                                    unset($_SESSION['message']);   
                                                                                }
                                                                            ?>
                                                                            
                                    </div>
                                    <div class="form-group row">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                    </div>
                                    
                                        
                                    <div class="form-group row">                                                                     
                                    </div>
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                    <hr>
                                <div class="text-center">
                                   
                                </form>
                                <hr>
                                <!-- <div class="text-center"> 
                                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                                </div>-->
                                <div class="text-center">
                                    <a class="small" href="login.php">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        <script>
            $("#registerform").validate({
                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    email: {
                      required: true,
                      email: true,
                      remote: {
                        url: "registration_validation.php",
                        type: "post",
                        }
                    },
                    name: {
                        required: true,
                        minlength:3
                    },
                    
                    password: {
                        required: true,
                        minlength: 4
                    }
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    name:{
                        required: "Name is required",
                    },
                    email: {
                        required: "Please enter email address.",
                        email: "Please enter a valid email address.",
                        remote: "Email address already registered.",
                    },
                    password: {
                        required: " Password is required",
                        minlength: " Your password must be consist of at least 5 characters"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
          
        </script>    
    </body>
</html>