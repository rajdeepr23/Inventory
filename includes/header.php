<?php require('config.php'); 
session_start();?>
<?php
    if (!isset($_SESSION['emp_id'])){
    header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Inventory Management System</title>

    <link rel="stylesheet" href="assests/materialize_colors.css">

    <link rel="stylesheet" href="assests/bootstrap.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="assests/style4.css">
    <script src="assests/jquery%20mini.js"></script>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <div class="sidebar-header">
                <a href="index.php">
                    <h3 class="text-center">HERTZSOFT</h3>
                    <strong><img src="http://www.clker.com/cliparts/D/g/o/A/G/X/black-and-white-globe-md.png" alt="" height="40%" width="40%" alt=""></strong>
                </a>
            </div>

            <ul class="list-unstyled components mb-0">
                <li>
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="sales.php">
                        <i class="fas fa-briefcase"></i>
                        <span>Sales</span>
                    </a>
                </li>

                <li>
                    <?php if($_SESSION['emp_designation'] != 'Executive'){ ?>
                    <a href="purchase.php">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Purchase</span>
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="expense.php"><i class="fa fa-credit-card" aria-hidden="true"></i>
                        <span>Expense</span>
                    </a>
                </li>
                <li>
                    <a href="products.php"><i class="fa fa-cubes" aria-hidden="true"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li>
                    <a href="customer.php"><i class="fa fa-users" aria-hidden="true"></i>
                        <span>Customers</span></a>
                </li>
                <li>
                    <a href="vendor.php"><i class="fa fa-industry" aria-hidden="true"></i>
                        <span>Vendors</span></a>
                </li>
                <li>
                    <a href="employee.php?"><i class="fa fa-laptop" aria-hidden="true"></i>
                        <span>Employees</span></a>
                </li>
                <!--            </ul>-->
            </ul>

            <?php if($_SESSION['emp_designation'] == 'admin'){ ?>
            <ul class="list-unstyled components">

                <li><a href="trash.php"><i class="fa fa-trash" aria-hidden="true"></i>
                        <span>Trash</span></a>
                </li>
                
                <li><a href="notifications.php"><i class="fa fa-bell" aria-hidden="true"></i>
                        <span>All Notifications</span></a>
                </li>


            </ul>
            <?php } ?>


        </nav>


        <!------------------- Page Content  -------------------->

        <div id="content">
            <!--navbar-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <a><span id="sidebarCollapse" class="btn btn-dark">
                            <i class="fas fa-align-center"></i>
                        </span></a>


                    <div class="dropdown d-flex align-items-center">

                        <a href="#" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-user-circle fa-2x mr-1" aria-hidden="true"></i></a>

                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <?php echo strtoupper($_SESSION['emp_first_name']." ".$_SESSION['emp_last_name']."-". $_SESSION['emp_designation']); ?>



                            <i class="fa fa-chevron-down" style="cursor:hand;" data-toggle="dropdown" aria-hidden="true"></i>

                        </a>


                        <div class="dropdown-menu profiledrop dropdown-menu mt-2">
                            <a href="#" class="dropdown-item">View Account</a>
                            <!--                            <a href="#" class="dropdown-item">Notifications</a>-->
                            <a href="login.php?logout" class="dropdown-item">Logout</a>

                        </div>




                        <div class="dropleft">
                            <a href="#" id="notification_icon" class="mx-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-bell  mr-1" aria-hidden="true"></i></a>
                            <div class="dropdown-menu noti_div"></div>
                        </div>


                    </div>








                </div>
            </nav>
      
