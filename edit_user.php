<?php
// Include config file

session_start();
if (!isset($_SESSION['email'])) {
    header('location:http://localhost/contact_application/login.php');
}
require_once "config.php";

$record_id=$_GET['id'];
$_SESSION['record_id']=$_GET['id'];

$query="select * from contact_details where id=$record_id";
$rs_result = mysqli_query ($conn, $query);
$rows = mysqli_fetch_array($rs_result);    
if (isset($_POST['submit'])) {
    if ($_POST['email'] == '' && $_POST['mobile'] == '') {
        $error_email = "email is required";
        $error_mobile = "mobile is required";
    } else if ($_POST['email'] == '') {
        $error_email = "email is required";
    } else if ($_POST['mobile'] == '') {
        $error_mobile = "mobile is required";
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = "Please enter a valid email address";
        }
    } else {
        $user_id = $_SESSION['id'];
        if ($_POST['email'] != '') {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Please enter a valid email address";
            } else {
                $id = $_SESSION['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $work = $_POST['work'];
                $group_name = $_POST['group_name'];
                $home = $_POST['home'];

                $city = $_POST['city'];
                $picture = $_FILES['picture']['name'].date('m-d-Y_H:i:s').'jpg';
                $dob = $_POST['dob'];
                $bio = $_POST['bio'];

                $exist = "select * from contact_details where email='$email' AND user_id='$id' AND id!='$record_id'";
                $result = $conn->query($exist);
                if (($result->num_rows > 0)) {
                    $error_email = "Email already exists";
                    $exist = "select * from contact_details where mobile='$mobile' AND user_id='$id' ";
                    $result = $conn->query($exist);
                    if (($result->num_rows > 1)) {
                        $error_mobile = "Mobile number already registered";
                    }
                } else {
                    $exist = "select * from contact_details where mobile='$mobile' AND user_id='$id' AND id!='$record_id' ";
                    $result = $conn->query($exist);
                    if (($result->num_rows > 0)) {
                        $error_mobile = "Mobile number already registered";

                    } else {
                        $a=$picture;
                        if(move_uploaded_file($_FILES["picture"]["tmp_name"], "/var/www/html/contact_application/uploads/$a"));
                            $_SESSION['edited']=1;
                        $sql = "update contact_details  SET user_id='$id',name='$name', email='$email', mobile='$mobile', work='$work',home='$home',city='$city',group_name='$group_name',picture='$picture',dob='$dob',bio='$bio' where id='$record_id' ";
                        if ($conn->query($sql) === true) {
                            header("Location: http://localhost/contact_application/index.php");
                        } else {

                            echo die("Error: " . $sql . "<br>" . $conn->error);
                        }
                    }
                }
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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

    .php_error1 {
        font-size: 10px;
        width: 100%;
        color: red;
        font-size: 12px;
        position: absolute;
        top: 200px;
        left: 265px;

    }

    .php_error {
        font-size: 10px;
        width: 100%;
        color: red;
        font-size: 12px;
        position: absolute;
        top: 272px;
        left: 265px;

    }

    .img_error {
        font-size: 10px;
        width: 100%;
        color: red;
        font-size: 12px;
        position: absolute;
        top: 272px;
        left: 265px;

    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label.error {
        position: absolute;
        left: 30px;
        top: 52px;
    }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Jatinder Mahajan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>WELCOME</span></a>
            </li>

            <!-- Divider -->


            <!-- Heading -->
            <!-- <div class="sidebar-heading"> 
        Interface
    </div>

    -->
            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h5 class="text-light" style="background-color:blue;">Contact Manager</h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">




                        <li class="nav-item dropdown no-arrow mx-1">
                            <div class="font-weight-bold">

                                <div class="my-2"></div>
                                <a href="#" class="btn btn-secondary btn-icon-split"
                                    style="height: 30px; padding-bottom: 35px; margin-top:8px">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text ">Logged IN</span>
                                </a>
                            </div>





                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>




                <div class="container">
                    <div class="text-center">
                        <h1 class="h3 text-gray-800 mb-4"
                            style="border:solid;border-width:1px;border-color:blue; background-color:white; "> Edit
                            Contact!</h1>
                    </div>


                    <form class="user" id="edituser" method="post" action="" enctype="multipart/form-data">

                        <div class="form-group row">

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input class="form-control form-control-user" id="email"
                                    value="<?php echo $rows['email'];?>" name="email">
                            </div>

                            <div id="show_error" class="php_error1">
                                <?php
                                if ($error_email != '') {
                                echo $error_email;
                                }
                                
                                if ($_SESSION['message'] != '') {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                            ?>

                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="name"
                                    value="<?php echo $rows['name'];?>" name="name">
                            </div>



                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="mobile" name="mobile"
                                    value="<?php echo $rows['mobile'];?>">
                            </div>
                            <div id="show_error" class="php_error">
                                <?php
                                if ($error_mobile != '') {
                                    echo $error_mobile;
                                }
                                
                            ?>
                            </div>

                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="work" name="work"
                                    value="<?php echo $rows['work'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="home" name="home"
                                    value="<?php echo $rows['home'];?>">
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control form-control-user" style="padding:10px; height:50px;" id="group_Name" name="group_name">
                                    <option>Morning</option>
                                    <option>Afternoon</option>
                                    <option>Evening</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <select class="form-control form-control-user" id="city" name="city" style="padding:10px; height:50px;">
                                    <option value="Mohali">Mohalli</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Ambala">Ambala</option>


                                </select>
                            </div>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="date" class="form-control form-control-user" id="dob"
                                    value="<?php echo $rows['dob'];?>" name="dob">
                            </div>


                        </div>



                        <div class="form-group row">

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <textarea class="form-control form-control-user" style="height:50px;" id="bio"
                                    name="bio" value="<?php echo $rows['bio'];?>">
                                        </textarea>
                            </div>
                            <div class="col-sm-6">
                                <input type="file" accept=".png , .jpg " id="picture" name="picture"
                                    value="<?php echo $rows['picture'];?>">
                            </div>
                            <div id="show_error" class="img_error">
                            <?php
                                if ($error_image != '') {
                                    echo $error_image;
                                }
                                
                            ?>
                            </div>

                        </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block">
                            update Contact</button>

                        <br />
                        <button type="reset" class="btn btn-primary btn-user btn-block">
                            Cancel</button>

                    </form>


                </div>
                <hr>


                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
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
        $("#edituser").validate({
            // in 'rules' user have to specify all the constraints for respective fields
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "email_validation2.php",
                        type: "post",
                    }
                },
                name: {
                    required: true,
                    minlength: 3
                },

                mobile: {
                    required: true,
                    minlength: 10,
                    remote: {
                        url: "mobile_validation2.php",
                        type: "post",
                    }
                }
            },
            // in 'messages' user have to specify message as per rules
            messages: {
                name: {
                    required: "Name is required",
                },
                email: {
                    required: "Please enter email address.",
                    email: "Please enter a valid email address.",
                    remote: "Email address already registered.",
                },
                mobile: {
                    required: " mobile is required",
                    minlength: " mobile  must be consist of at least 10 characters",
                    remote: "Mobile number already registered.",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        </script>

</body>

</html>