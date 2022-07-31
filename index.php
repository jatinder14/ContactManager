<?php
// Include config file
    session_start();

    require_once "config.php";
    if(!isset($_SESSION['email']))
    {
    header('location:http://localhost/contact_application/login.php');
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

    <title>Home Page</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <style>
    .body {
        font-family: Arial, Helvetica, sans-serif;
    }

    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
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
                    <ul class="navbar-nav ml-auto"> <li class="nav-item dropdown no-arrow mx-1">
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
                <!-- End of Topbar -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <a href="index.php" class="btn btn-warning btn-icon-split" style="float: left;">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>


                        <span class="text">View Conatcts</span>
                    </a>

                    <a href="add_new_contact.php" class="btn btn-primary btn-icon-split" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Add New Contact</span>
                    </a>
                    <br /><br />

                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if(isset($_SESSION['delete'])){
                    echo "<p class='alert alert-successful text-success' >Contact deleted successfully  !!</p>";
                    unset( $_SESSION['delete']);

        
                    }
                    if(isset($_SESSION['edited'])){
                        echo "<p class='alert alert-successful text-success' >Contact details updated successfully !!</p>";
                        unset( $_SESSION['edited']);
                        
        
                    }
                    if(isset($_SESSION['added'])){
                        echo "<center><p class='alert alert-successful text-success' > New contact added successfully !!</p></center>";
                        unset( $_SESSION['added']);
                        
        
                    }
                ?>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Picture</th>
                                            <th>Email</th>
                                            <th>Mobile</th>

                                            <th>City</th>
                                            <th>Date of Birth</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php     
                                                $id=$_SESSION['id'];
                                                $query="select * from contact_details where user_id=$id";
                                                $rs_result = mysqli_query ($conn, $query);
                                                $s=1;    


                                                while ($rows = mysqli_fetch_array($rs_result)) {    
                                                // Display each field of the records.    
                                        ?>


                                        <tr>
                                            <!-- FETCHING DATA FROM EACH
ROW OF EVERY COLUMN -->

                                            <td><?php echo $s++;?></td>
                                            <td><?php echo $rows['name'];?></td>
                                            <td><img src="<?php echo "uploads/".$rows['picture'];?>" alt="image"
                                                    height="auto" width="90px" id="myImg<?php  echo $s; ?>">

                                                <!-- The Modal -->
                                                <div id="myModal" class="modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content" id="img01">
                                                    <div id="caption"></div>
                                                </div>

                                                <script>
                                                // Get the modal
                                                var modal = document.getElementById("myModal");

                                                // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                var img = document.getElementById("myImg<?php echo $s; ?>");
                                                var modalImg = document.getElementById("img01");
                                                var captionText = document.getElementById("caption");
                                                img.onclick = function() {
                                                    modal.style.display = "block";
                                                    modalImg.src = this.src;
                                                    captionText.innerHTML = this.alt;
                                                }

                                                // Get the <span> element that closes the modal
                                                var span = document.getElementsByClassName("close")[0];

                                                // When the user clicks on <span> (x), close the modal
                                                span.onclick = function() {
                                                    modal.style.display = "none";
                                                }
                                                </script>

                                            </td>



                                            <td><?php echo $rows['email'];?></td>
                                            <td><?php echo $rows['mobile'];?></td>

                                            <td><?php echo $rows['city'];?></td>
                                            <td style="width:135px;"><?php echo $rows['dob'];?></td>

                                            <?php $userid=$rows['id'];
?>
                                            <td style="width:140px;"><a
                                                    href="edit_user.php?id=<?php echo $userid; ?>"><button id="edit"
                                                        name="edit"
                                                        style="background-color:blue; color:white;">edit</button></a>||<a
                                                    href="delete_user.php?id=<?php echo $userid ;?>"><button id="delete"
                                                        name="delete"
                                                        style="background-color:red; color:white;">delete</button></a>
                                            </td>


                                        </tr>



                                        <?php     
};    
?>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>