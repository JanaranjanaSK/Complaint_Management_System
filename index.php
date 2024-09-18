<?php
//session for department
session_start();

if (isset($_SESSION['department'])) {
    $department = $_SESSION['department'];

   
} else {
    die("Couldn't find department in session.");
}
// Database connection
$host = "localhost";  // Your database host
$user = "root";       // Your database username
$password = "";       // Your database password
$dbname = "complaints"; // Your database name

$conn = new mysqli($host, $user, $password, $dbname);
//completed count
$count = "SELECT COUNT(*) AS count FROM complaints_detail WHERE status = '16' AND type_of_problem ='$department'";

$result = mysqli_query($conn, $count);
$row = mysqli_fetch_assoc($result);

//in progress count
$count1 = "SELECT COUNT(*) AS count1 FROM complaints_detail WHERE status IN (17,10)  AND type_of_problem='$department'";

$result1 = mysqli_query($conn, $count1);
$row1 = mysqli_fetch_assoc($result1);

//count of waiting for approval
$count2 = "SELECT COUNT(*) AS count2 FROM complaints_detail WHERE status IN (18,11)  AND type_of_problem='$department'";

$result2 = mysqli_query($conn, $count2);
$row2 = mysqli_fetch_assoc($result2);

//new task count

$count3 = "SELECT COUNT(*) AS count3 FROM complaints_detail WHERE status = '7'  AND type_of_problem='$department'";

$result3 = mysqli_query($conn, $count3);
$row3 = mysqli_fetch_assoc($result3);

?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>MKCE_CMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Material Design Icons -->
<link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>




    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- Sidebar toggle for mobile -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            
            <!-- Logo -->
            <a class="navbar-brand" href="index.html">
                
                <span class="logo-text">
                    <img src="assets/images/mkcenavlogo.png" alt="homepage" class="light-logo" />
                </span>
            </a>
            
            <!-- Toggle for mobile -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        
        <!-- Navbar items -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                </li>
                <!-- Additional items can be added here -->
            </ul>
            <a href="login.php" class="btn btn-danger">
    <i class=" fas fa-sign-out-alt" style="font-size: 15px;"></i>
</a>

    
        </div>
    </nav>
</header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Profile</span></a></li>
                        <li class="sidebar-item"> <a id="view-work-task-history" class="sidebar-link waves-effect waves-dark sidebar-link" href="worker_taskhistory.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Task History</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="worker_helpline.html" aria-expanded="false"><i class="mdi mdi-phone"></i><span class="hide-menu">Helpline</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                  
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h2 style="color: white;"><i class="mdi mdi-account"></i></h2>
                                <h3 class="text-white" id="workerName1">Name</h3>
                            
                            <h4 class="font-light text-white" style="margin-bottom: 0px;font-size: 800;" ></h4>

                            <h5 class="text-white" id="workerName" ></h5>


                                </div>
                            </div>
                        </div>
                    
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                        
                            <div class="box bg-success text-center">
                                <h2 style="color: white;"><i class="mdi mdi-receipt"></i></h2>
                                                    <h3 class="text-white" id="employmentType1">EmploymentType</h3>
                            
                            <h4 class="font-light text-white" style="margin-bottom: 0px;"></h4>
                            <h5 class="text-white" id="employmentType"></h5>


                            </div>
                            </div>
                        </div>
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h2 style="color: white;"><i class="mdi mdi-worker"></i></h3>
                                                             <h3 class="text-white">Dept</h3>
                            
                                
                                <h5 id="workerdepartment" class="text-white" ></h5>

                            </div>
                            </div>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="height:500px">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Task Analysis</h4>
                                        <h5 class="card-subtitle">Latest Overview of Task History</h5>
                                    </div>
                                </div>
                                <div class="row" style="padding-left:15%">
                                    <!-- column -->
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-checkbox-multiple-marked m-b-5 font-22"></i>
                                                    <h2 class="m-b-0 m-t-5"><?php echo $row['count'] ?></h2>
                                                    <h5 class="font-light">Task Completed</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center" >
                                                    <i class="mdi mdi-book m-b-5 font-22"></i>
                                                    <h2 class="m-b-0 m-t-5"><?php echo $row3['count3'] ?></h2>
                                                    <h5 class="font-light">New Task</h5>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-chart-bar m-b-5 font-22"></i>
                                                    <h2 class="m-b-0 m-t-5"><?php echo $row1['count1'] ?></h2>
                                                    <h5 class="font-light">Task in Progress</h5>
                                                </div>
                                            </div>
                                          
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center" >
                                                    <i class="mdi mdi-chart-arc m-b-5 font-22"></i>
                                                    <h2 class="m-b-0 m-t-5"><?php echo $row2['count2'] ?></h2>
                                                    <h5 class="font-light">Task waiting for Approval</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <b>2024 © M.Kumarasamy College of Engineering All Rights Reserved.<br>
Developed and Maintained by Technology Innovation Hub.</b>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script>
        
        $(document).ready(function() {
    $.ajax({
        url: 'fetch_data.php',
        type: 'POST',
        data: {
            department:true// Pass the department value to PHP
        },
        success: function(data) {
            var res = jQuery.parseJSON(data);
        
            console.log(res); // Ensure the data is being fetched correctly
            
            // Update the dashboard with the fetched data
            $("#workerName").html('<span style="font-weight: 900;">' + res.name + '</span>');
            $("#employmentType").html('<span style="font-weight: 900;">' + res.employment_type + '</span>');
            $("#workerdepartment").html('<span style="font-weight: 900;">' + res.department + '</span>');

            // Attach a click event to redirect when 'Task History' is clicked
            $('#view-work-task-history').click(function() {
                if (res.department) {
                    // Make an AJAX request to update the session with the new department value
                    $.ajax({
                        url: 'update_session.php',
                        type: 'POST',
                        data: { department: res.department },
                        success: function(response) {
                            console.log("Session updated: " + response);
                            // Redirect to the task history page after session update
                            var url = 'worker_taskhistory.php';
                            window.location.href = url;
                        },
                        error: function(xhr, status, error) {
                            console.error("Error updating session: " + error);
                        }
                    });
                } else {
                    console.log("No department found.");
                }
            });
        },
        error: function(xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});


</script>

</body>

</html>