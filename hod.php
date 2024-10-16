<?php
include("db.php");
$sql = "
SELECT cd.*, faculty.faculty_name, faculty.department, faculty.faculty_contact, faculty.faculty_mail
FROM complaints_detail cd
JOIN faculty ON cd.faculty_id = faculty.faculty_id
WHERE cd.status = '2'
";
$sql1 = "
SELECT cd.*, faculty.faculty_name, faculty.department, faculty.faculty_contact, faculty.faculty_mail
FROM complaints_detail cd
JOIN faculty ON cd.faculty_id = faculty.faculty_id
WHERE cd.status IN (4, 6, 7, 10, 11, 13, 14, 15, 17, 18)
";
$sql2 = "
SELECT cd.*, faculty.faculty_name, faculty.department, faculty.faculty_contact, faculty.faculty_mail
FROM complaints_detail cd
JOIN faculty ON cd.faculty_id = faculty.faculty_id
WHERE cd.status = '16'
";
$sql3 = "
SELECT cd.*, faculty.faculty_name, faculty.department, faculty.faculty_contact, faculty.faculty_mail
FROM complaints_detail cd
JOIN faculty ON cd.faculty_id = faculty.faculty_id
WHERE cd.status IN (5, 19, 20)
";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
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
    <title>MIC</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="css/dboardstyles.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

    <style>
        .table-container {
            -ms-overflow-style: none;
        }

        .table-container {
            overflow: auto;
            width: 100%;
            height: 100%;

        }

        .fixed-size-table {
            width: 100%;
            table-layout: fixed;
        }

        .fixed-size-table th,
        .fixed-size-table td {
            width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .nav-tabs .nav-link {
            color: #0033cc;
        }

        .nav-tabs .nav-link.active {
            background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%);
            color: white;
        }
    </style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="https://www.mkce.ac.in">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10" style="padding-left:0px; border-left:0px;">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" width="50px" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
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
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="edit-profile.html" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Edit Profile</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Errorpages/error-404.html" class="sidebar-link"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu"> Basic Details </span></a></li>
                                <li class="sidebar-item"><a href="Errorpages/error-404.html" class="sidebar-link"><i class="mdi mdi-book-multiple"></i><span class="hide-menu"> Academic Details </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Errorpages/error-404.html" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Change password</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="hod.php" aria-expanded="false"><i class="mdi mdi-comment-text"></i><span class="hide-menu">Feedback Corner</span></a>
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
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Feedback Approval</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Feedback Corner</li>
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form class="zmdi-format-valign-top">
                                <div class="card-body">
                                    <h4 class="card-title">Complaint Details</h4>
                                    <div class="card">
                                        <ul class="nav nav-tabs mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#dashboard"
                                                    role="tab" aria-selected="true"><span class="hidden-sm-up"></span>
                                                    <span class="hidden-xs-down"><i
                                                            class="mdi mdi-view-grid"></i><b>&nbsp Dashboard</b></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#pending"
                                                    role="tab" aria-selected="false"><span class="hidden-sm-up"></span>
                                                    <span class="hidden-xs-down"><i
                                                            class="fas fa-clock"></i><b>&nbsp Pending ( <?php $query2 = "SELECT COUNT(*) as pending FROM complaints_detail WHERE  status ='2'";
                                                                                                        $output2 = mysqli_query($conn, $query2);
                                                                                                        $row2 = mysqli_fetch_assoc($output2);
                                                                                                        $pendingCount = $row2['pending'];
                                                                                                        echo $pendingCount;
                                                                                                        ?> ) </b></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#approved" role="tab"
                                                    aria-selected="false"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down"><i
                                                            class="fas fa-check"></i><b>&nbsp Approved ( <?php $query2 = "SELECT COUNT(*) as approved FROM complaints_detail WHERE (status ='4' or status ='6' or status='7' or status='10' or status='11' or status='13' or status='14' or status='15' or status='17' or status='18')";
                                                                                                            $output2 = mysqli_query($conn, $query2);
                                                                                                            $row2 = mysqli_fetch_assoc($output2);
                                                                                                            $pendingCount = $row2['approved'];
                                                                                                            echo $pendingCount;
                                                                                                            ?>
                                                            ) </b></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#completed" role="tab"
                                                    aria-selected="false"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down"><i
                                                            class="mdi mdi-check-all"></i><b>&nbsp Completed ( <?php $query2 = "SELECT COUNT(*) as completed FROM complaints_detail WHERE  status ='16'";
                                                                                                                $output2 = mysqli_query($conn, $query2);
                                                                                                                $row2 = mysqli_fetch_assoc($output2);
                                                                                                                $pendingCount = $row2['completed'];
                                                                                                                echo $pendingCount;
                                                                                                                ?> )</b></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#rejected" role="tab"
                                                    aria-selected="false"><span class="hidden-sm-up"></span> <span
                                                        class="hidden-xs-down"><i
                                                            class="mdi mdi-close-circle"></i><b>&nbsp Rejected ( <?php $query2 = "SELECT COUNT(*) as rejected FROM complaints_detail WHERE (status ='5' or status ='19' or status='20')";
                                                                                                                    $output2 = mysqli_query($conn, $query2);
                                                                                                                    $row2 = mysqli_fetch_assoc($output2);
                                                                                                                    $pendingCount = $row2['rejected'];
                                                                                                                    echo $pendingCount;
                                                                                                                    ?> )</b></span></a>
                                            </li>
                                        </ul>
                                        <!-------------------------dashboard------------------------------>
                                        <div class="tab-content tabcontent-border">
                                            <div class="tab-pane p-20 active show" id="dashboard" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <!-- <div class="card-header"> -->
                                                        <h4 class="card-title m-b-0"><b></b></h4><br>

                                                        <br>
                                                        <div class="row">
                                                            <!-- Pending -->
                                                            <div class="col-12 col-md-3" style="margin-bottom: 40px">
                                                                <div class="cir">
                                                                    <div class="bo">
                                                                        <div class="content1">
                                                                            <div class="stats-box text-center p-3" style="background-color:orange;">
                                                                                <i class="fas fa-clock"></i>
                                                                                <h1 class="font-light text-white">
                                                                                    <?php $query2 = "SELECT COUNT(*) as pending FROM complaints_detail WHERE  status ='2'";
                                                                                    $output2 = mysqli_query($conn, $query2);
                                                                                    $row2 = mysqli_fetch_assoc($output2);
                                                                                    $pendingCount = $row2['pending'];
                                                                                    echo $pendingCount;
                                                                                    ?>
                                                                                </h1>
                                                                                <small class="font-light">Pending</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Faculty infra Pending -->
                                                            <div class="col-12 col-md-3">
                                                                <div class="cir">
                                                                    <div class="bo">
                                                                        <div class="content1">
                                                                            <div class="stats-box text-center p-3" style="background-color:red;">
                                                                                <i class="fas fa-exclamation"></i>
                                                                                <h1 class="font-light text-white">
                                                                                    <?php $query2 = "SELECT COUNT(*) as pending FROM complaints_detail WHERE  status ='1'";
                                                                                    $output2 = mysqli_query($conn, $query2);
                                                                                    $row2 = mysqli_fetch_assoc($output2);
                                                                                    $pendingCount = $row2['pending'];
                                                                                    echo $pendingCount;
                                                                                    ?>
                                                                                </h1>
                                                                                <small class="font-light">Faculty Incharge Pending</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Approved -->
                                                            <div class="col-12 col-md-3">
                                                                <div class="cir">
                                                                    <div class="bo">
                                                                        <div class="content1">
                                                                            <div class="stats-box text-center p-3" style="background-color:rgb(14, 86, 239);">
                                                                                <i class="fas fa-check"></i>
                                                                                <h1 class="font-light text-white">
                                                                                    <?php $query2 = "SELECT COUNT(*) as approved FROM complaints_detail WHERE (status ='4' or status ='6' or status='7' or status='10' or status='11' or status='13' or status='14' or status='15' or status='17' or status='18')";
                                                                                    $output2 = mysqli_query($conn, $query2);
                                                                                    $row2 = mysqli_fetch_assoc($output2);
                                                                                    $pendingCount = $row2['approved'];
                                                                                    echo $pendingCount;
                                                                                    ?>
                                                                                </h1>
                                                                                <small class="font-light">Approved</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Completed -->
                                                            <div class="col-12 col-md-3">
                                                                <div class="cir">
                                                                    <div class="bo">
                                                                        <div class="content1">
                                                                            <div class="stats-box text-center p-3" style="background-color:rgb(70, 160, 70);">
                                                                                <i class="mdi mdi-check-all"></i>
                                                                                <h1 class="font-light text-white">
                                                                                    <?php $query2 = "SELECT COUNT(*) as completed FROM complaints_detail WHERE status ='16'";
                                                                                    $output2 = mysqli_query($conn, $query2);
                                                                                    $row2 = mysqli_fetch_assoc($output2);
                                                                                    $pendingCount = $row2['completed'];
                                                                                    echo $pendingCount;
                                                                                    ?>
                                                                                </h1>
                                                                                <small class="font-light">Completed</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Rejected -->
                                                            <!-- <div class="col-12 col-md-3">
                                                                <div class="cir">
                                                                    <div class="bo">
                                                                        <div class="content1">
                                                                            <div class="stats-box text-center p-3" style="background-color:;">
                                                                                <i class="mdi mdi-close-circle"></i>
                                                                                <h1 class="font-light text-white">
                                                                                    <?php $query2 = "SELECT COUNT(*) as rejected FROM complaints_detail WHERE (status ='5' or status ='19' or status='20')";
                                                                                    $output2 = mysqli_query($conn, $query2);
                                                                                    $row2 = mysqli_fetch_assoc($output2);
                                                                                    $pendingCount = $row2['rejected'];
                                                                                    echo $pendingCount;
                                                                                    ?>
                                                                                </h1>
                                                                                <small class="font-light">Rejected</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-------------------------pending tab---------------------------->
                                            <div class="tab-pane p-20" id="pending" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4>
                                                                    Feedback Options
                                                                    <button type="button" style="float:right;"
                                                                        class="btn btn-success btnapproveall">Approve
                                                                        All</button><br>
                                                                </h4>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="table-container">
                                                                    <table id="myTable1" class="table table-bordered table-striped fixed-size-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center" class="pending status"
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>S.No</b>
                                                                                </th>
                                                                                
                                                                                <th class="text-center"
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Faculty Name</b>
                                                                                </th>
                                                                                <th class="text-center"
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Problem Description</b>
                                                                                </th>
                                                                                <th class="text-center"
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Date Registered</b>
                                                                                </th>
                                                                                <th class="text-center"
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Picture</b>
                                                                                </th>
                                                                                <th class="text-center"
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Action</b>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $id = 1;
                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td class="text-center">
                                                                                        <?php echo $id; ?>
                                                                                    </td>

                                                                                    <td class="text-center">
                                                                                        <?php echo $row['faculty_name']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                    <button type="button"
                                                                                            value='<?php echo $row['id']; ?>'
                                                                                            class="btn btn-success ml-5 viewcomplaint"
                                                                                            data-toggle="modal" 
                                                                                            data-target="#complaintDetailsModal">View More</button>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                        <?php echo $row['date_of_reg']; ?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                        <button type="button"
                                                                                            class="btn showImage"
                                                                                            value="<?php echo $row['id']; ?>"
                                                                                            data-toggle="modal"
                                                                                            data-target="#imageModal1"
                                                                                            data-task-id='<?php echo htmlspecialchars($row['id']); ?>'>
                                                                                            <i class="fas fa-image" style="font-size: 25px;"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                        <button type="button"
                                                                                            value="<?php echo $row['id']; ?>"
                                                                                            id="detail_id"
                                                                                            class="btn btn-success btnapprove"><i class="fas fa-check"></i></button>
                                                                                        <button type="button"
                                                                                            value="<?php echo $row['id']; ?>"
                                                                                            class="btn btn-danger btnreject"
                                                                                            data-toggle="modal"
                                                                                            data-target="#rejectreason"><i class="fas fa-times"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                <?php
                                                                                $id++;
                                                                            }
                                                                                ?>
                                                                                </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!------------------view problem description modal-->
                                            

                                                <!-- Image Modal For Pending -->
                                                <div id="imageModal1" class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">View Image</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="modalImage" src="" alt="Image Preview" style="max-width: 100%; display: none;" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!------------reject  reason modal----->
                                                <div class="modal fade" id="rejectreason" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Reason for rejection</h5>
                                                                <button type="button" class="btn" data-dismiss="modal"
                                                                    aria-label="Close"><i class="mdi mdi-close"></i>
                                                                </button>
                                                            </div>
                                                            <form id="rejectdetails">
                                                                <div class="modal-body" style="font-size:larger;">
                                                                    <textarea class="form-control"
                                                                        placeholder="Enter reason"
                                                                        name="textaria"
                                                                        style="width:440px;height: 180px;" required></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--------------approved tab-------------------->
                                            <div class="tab-pane p-20" id="approved" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <!-- <div class="card-header"> -->
                                                            <div class="card-body">
                                                                <div class="table-container">
                                                                    <table id="myTable2" class="table table-bordered table-striped fixed-size-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>S.No</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Problem id</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Faculty Name</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Problem Description</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Date Registered</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Image</b>
                                                                                </th>
                                                                                <th style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;"
                                                                                    class="col-2"><b>Status</b></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $id = 1;
                                                                            while ($row = mysqli_fetch_assoc($result1)) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo $id; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['id']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['faculty_name']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button type="button"
                                                                                            value='<?php echo $row['id']; ?>'
                                                                                            class="btn btn-success ml-5 viewcomplaint"
                                                                                            data-toggle="modal" 
                                                                                            data-target="#complaintDetailsModal">View More</button>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['date_of_reg']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button type="button"
                                                                                            value="<?php echo $row['id']; ?>"
                                                                                            class="btn btn-success viewimgappr"
                                                                                            data-toggle="modal"
                                                                                            data-target="#viewimgappr"
                                                                                            data-image-id='<?php echo htmlspecialchars($row['id']); ?>'>
                                                                                            View</button>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        // Define the status messages array
                                                                                        $statusMessages = [
                                                                                            1 => 'Pending',
                                                                                            2 => 'Approved by infra',
                                                                                            3 => 'Rejected by infra',
                                                                                            4 => 'Forwaded to Manager',
                                                                                            6 => 'Sent to principal for approval',
                                                                                            7 => 'Assigned to worker',
                                                                                            10 => 'Work in progress',
                                                                                            11 => 'Waiting for approval',
                                                                                            13 => 'Sent to infra for completion',
                                                                                            14 => 'Waiting to be Reassigned',
                                                                                            15 => 'Work is Reassigned',
                                                                                            17 => 'Work in Progress',
                                                                                            18 => 'Waiting for Approval',
                                                                                        ];

                                                                                        // Get the status from the row and display the corresponding message
                                                                                        $status = $row['status'];
                                                                                        $statusMessage = $statusMessages[$status] ?? 'Unknown status';

                                                                                        // Output the status message
                                                                                        echo $statusMessage;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                                $id++;
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!------------------view problem description modal-->
                                                <!-- Complaint Details Modal -->
                            <div class="modal fade" id="complaintDetailsModal" tabindex="-1" role="dialog" aria-labelledby="complaintDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content" style="border-radius: 8px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); background-color: #f9f9f9;">

                                        <!-- Modal Header with bold title and cleaner button -->
                                        <div class="modal-header" style="background-color: #007bff; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 15px;">
                                            <h5 class="modal-title" id="complaintDetailsModalLabel" style="font-weight: 700; font-size: 1.4em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                                📋 Complaint Details
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; font-size: 1.2em;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <!-- Modal Body with reduced padding -->
                                        <div class="modal-body" style="padding: 15px; font-size: 1.1em; color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

                                            <!-- Complaint Info Section with minimized spacing -->
                                            <ol class="list-group list-group-numbered" style="margin-bottom: 0;">
                                                <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Faculty Name</div>
                                                        <b><span id="faculty_name" style="color: #555;"></span></b>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Mobile Number</div>
                                                        <b><span id="faculty_contact" style="color: #555;"></span></b>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">E-mail</div>
                                                        <b><span id="faculty_mail" style="color: #555;"></span></b>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Venue Name</div>
                                                        <b><span id="venue_name" style="color: #555;"></span></b>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Type of Problem</div>
                                                        <b><span id="type_of_problem" style="color: #555;"></span></b>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start" style="padding: 10px; background-color: #fff;">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold" style="font-size: 1.2em; font-weight: 600; color: #007bff;">Problem Description</div>
                                                        <div class="alert alert-light" role="alert" style="border-radius: 6px; background-color: #f1f1f1; padding: 15px; color: #333;">
                                                            <span id="problem_description"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>

                                        <!-- Modal Footer with reduced padding -->
                                        <div class="modal-footer" style="border-top: none; justify-content: center; padding: 10px;">
                                            <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" style="border-radius: 25px; padding: 10px 30px; font-size: 1.1em; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                <!-- Image Modal For Approved -->
                                                <div id="viewimgappr" class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">View Image</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="imgapr" src="" alt="Image Preview" style="max-width: 100%; display: none;" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-----------completed tab----------->
                                            <div class="tab-pane p-20" id="completed" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <!-- <div class="card-header"> -->
                                                            <div class="card-body">
                                                                <div class="table-container">
                                                                    <table id="myTable3" class="table table-bordered table-striped fixed-size-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>S.No</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Problem id</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Faculty Name</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Problem Description</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Date Registered</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b> Before Image</b>
                                                                                </th>
                                                                                <th style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>After Image</b>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $id = 1;
                                                                            while ($row = mysqli_fetch_assoc($result2)) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo $id; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['id']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['faculty_name']; ?>
                                                                                    </td>
                                                                                    <td>

                                                                                        <button type="button"
                                                                                            value="<?php echo $row['id']; ?>"
                                                                                            class="btn btn-success ml-5 viewcomplaint"
                                                                                            data-toggle="modal" id="seeproblemcomp"
                                                                                            data-target="#complaintDetailsModal">View More</button>

                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['date_of_reg']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <center>
                                                                                            <button type="button"
                                                                                                value="<?php echo $row['id']; ?>"
                                                                                                class="btn btn-success viewimgcomp"
                                                                                                data-toggle="modal"
                                                                                                data-target="#viewimgcomp"
                                                                                                data-img-id='<?php echo htmlspecialchars($row['id']); ?>'>
                                                                                                View</button>
                                                                                        </center>
                                                                                    </td>
                                                                                    <td>
                                                                                        <center>
                                                                                            <button type="button"
                                                                                                value="<?php echo htmlspecialchars($row['id']); ?>"
                                                                                                class="btn btn-success viewafterimgcomp"
                                                                                                data-toggle="modal"
                                                                                                data-target="#aftercomp"
                                                                                                data-imgs-id='<?php echo htmlspecialchars($row['id']); ?>'>
                                                                                                View</button>
                                                                                        </center>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                                $id++;
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!------------------view problem description modal---------------->
                                                
                                                <!-- Image Modal For Completed -->
                                                <div id="viewimgcomp" class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">View Image</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="imgcomp" src="" alt="Image Preview" style="max-width: 100%; display: none;" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-----------after image modal------------>
                                                <div id="aftercomp" class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">View Image</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="afterimgcomp" src="" alt="Image Preview" style="max-width: 100%; display: none;" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!----------rejected tab------->
                                            <div class="tab-pane p-20" id="rejected" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <!-- <div class="card-header"> -->
                                                            <div class="card-body">
                                                                <div class="table-container">
                                                                    <table id="myTable4" class="table table-bordered table-striped fixed-size-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>S.No</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Problem id</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Faculty Name</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Problem Description</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Date Registered</b>
                                                                                </th>
                                                                                <th
                                                                                    style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Image</b>
                                                                                </th>
                                                                                <th style="background-color: #7460ee; background: linear-gradient(to bottom right, #cc66ff 1%, #0033cc 100%); color: white;">
                                                                                    <b>Status</b>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $id = 1;
                                                                            while ($row = mysqli_fetch_assoc($result3)) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo $id; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['id']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['faculty_name']; ?>
                                                                                    </td>
                                                                                    <td>

                                                                                        <button type="button"
                                                                                            value="<?php echo $row['id']; ?>"
                                                                                            class="btn btn-success ml-5 viewcomplaint"
                                                                                            data-toggle="modal" id="seeproblemrej"
                                                                                            data-target="#complaintDetailsModal">View More</button>

                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $row['date_of_reg']; ?>
                                                                                    </td>
                                                                                    <td>

                                                                                        <button type="button"
                                                                                            value="<?php echo $row['id']; ?>"
                                                                                            class="btn btn-success viewimgrej"
                                                                                            data-toggle="modal"
                                                                                            data-target="#viewimgrej"
                                                                                            data-imga-id='<?php echo htmlspecialchars($row['id']); ?>'>
                                                                                            View
                                                                                        </button>


                                                                                    </td>
                                                                                    <td class="col-1">
                                                                                        <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-danger btnrejectmodal" data-toggle="modal"
                                                                                            data-target="#problemrejected" id="rejectedfeedback">Rejected Reason</button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php
                                                                                $id++;
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!------------------view problem description modal---------------->
                                                <!-- Complaint Details Modal -->
                            
                                                <!-- Image Modal For Rejected -->
                                                <div id="viewimgrej" class="modal fade" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">View Image</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img id="imgrej" src="" alt="Image Preview" style="max-width: 100%; display: none;" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!------------problem rejected modal-------------->
                                            <div class="modal fade" id="problemrejected" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Reason
                                                                for Rejection</h5>
                                                            <button type="button" class="btn" data-dismiss="modal"
                                                                aria-label="Close"><i class="mdi mdi-close"></i>
                                                            </button>
                                                        </div>
                                                        <form id="addnewdetails">
                                                            <div class="modal-body" style="font-size:larger;">
                                                                <textarea type="text" id="pdrej2" value="" style="width:440px;height: 180px; resize: none;" disabled>
                                                                </textarea>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            <b>
                2024 © M.Kumarasamy College of Engineering All Rights Reserved.<br>
                Developed and Maintained by Technology Innovation Hub.
            </b>
        </footer>
    </div>
    </div>


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>

    <script>

                    //Tool Tip
                    $(function() {
                // Initialize the tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // You can also set options manually if needed
                $('.btnreject').tooltip({
                    placement: 'top',
                    title: 'Reject'
                });
            });

            $(function() {
                // Initialize the tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // You can also set options manually if needed
                $('.btnapprove').tooltip({
                    placement: 'top',
                    title: 'Accept'
                });
            });

            $(function() {
                // Initialize the tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // You can also set options manually if needed
                $('.showImage').tooltip({
                    placement: 'top',
                    title: 'Before'
                });
            });


        $(document).ready(function() {
            $('#myTable1').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
            $('#myTable4').DataTable();
            //  table.ajax.reload()
        });

        $(document).on('click', '.btnapprove', function(e) {
            e.preventDefault();

            var update_id = $(this).val();

            alertify.confirm('Confirmation', 'Are you sure you want to approve this complaint?',
                function() {
                    $.ajax({
                        type: "POST",
                        url: "hodbackend.php",
                        data: {
                            'update_status': true,
                            'update_id': update_id
                        },
                        success: function(response) {
                            var res = jQuery.parseJSON(response);
                            if (res.status == 500) {
                                alertify.error(res.message);
                            } else {
                                alertify.success('Complaint Approved successfully!');
                                $('#myTable1').load(location.href + " #myTable1");
                                $('#myTable2').load(location.href + " #myTable2");
                                $('#myTable3').load(location.href + " #myTable3");
                            }
                        }
                    });
                },
                function() {
                    alertify.error('Approval canceled');
                });
        });

        $(document).on('click', '.btnapproveall', function(e) {
            e.preventDefault();


            if (confirm('Are you sure you want to Approve all complaints?')) {
                var updated_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "hodbackend.php",
                    data: {
                        'updated_status': true,
                        'updated_id': updated_id
                    },
                    success: function(response) {

                        var res = jQuery.parseJSON(response);
                        if (res.status == 500) {
                            alert(res.message);
                        } else {
                            $('#myTable1').load(location.href + " #myTable1");
                            $('#myTable2').load(location.href + " #myTable2");
                            $('#myTable3').load(location.href + " #myTable3");
                            // table.ajax.reload()
                        }
                    }
                });
            }
        });

        $('#rejectdetails').on('submit', function(e) {
            e.preventDefault();

            if (confirm('Are you sure you want to reject this complaint?')) {
                var formdata1 = new FormData(this);
                var reject_id = $('.btnreject').val();

                formdata1.append("reject_status", true);
                formdata1.append("reject_id", reject_id);

                $.ajax({
                    type: "POST",
                    url: "hodbackend.php",
                    data: formdata1,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                            $('#rejectreason').modal('hide');
                            $('#rejectdetails')[0].reset();
                            $('#myTable1').load(location.href + " #myTable1");
                            $('#myTable4').load(location.href + " #myTable4");
                            table.ajax.reload()

                        } else if (res.status == 500) {
                            alertify.error('Complaint Rejected!');
                            $('#rejectreason').modal('hide');
                            $('#rejectdetails')[0].reset();
                            console.error("Error:", res.message);
                            alert("Something Went wrong.! try again")
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", error);
                        alert("An error occurred: " + error);
                    }
                });
            }
        });
        // pending tab
        $(document).on('click', '#seeproblem', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            console.log(user_id)
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'seedetails': true,
                    'user_id': user_id
                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res)
                    if (res.status == 500) {
                        alert(res.message);
                    } else {
                        $('#pd').val(res.data.problem_description);
                        $('#probdesc').modal('show');
                    }
                }
            });
        });


        //<!--------------approved tab prob desc ajax------------>
        $(document).on('click', '#seeproblemapr', function(e) {
            e.preventDefault();
            var user_idapr = $(this).val();
            console.log(user_idapr)
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'seedetailsapr': true,
                    'user_idapr': user_idapr
                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res)
                    if (res.status == 500) {
                        alert(res.message);
                    } else {
                        $('#pdapr').val(res.data.problem_description);
                        $('#probdescappr').modal('show');
                    }
                }
            });
        });

        //<!-------completed tab prob desc ajax--------------->
        $(document).on('click', '#seeproblemcomp', function(e) {
            e.preventDefault();
            var user_idcomp = $(this).val();
            console.log(user_idcomp)
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'seedetailscomp': true,
                    'user_idcomp': user_idcomp

                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res)
                    if (res.status == 500) {
                        alert(res.message);
                    } else {
                        $('#pdcomp').val(res.data.problem_description);
                        $('#probdesccomp').modal('show');
                    }
                }
            });
        });
        //<!------------------rejected tab probdesc ajax------------->

        $(document).on('click', '#seeproblemrej', function(e) {
            e.preventDefault();
            var user_idrej1 = $(this).val();
            console.log(user_idrej1)
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'seedetailsrej': true,
                    'user_idrej1': user_idrej1

                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res)
                    if (res.status == 500) {
                        alert(res.message);
                    } else {
                        $('#pdrej').val(res.data.problem_description);
                        $('#probdescrej').modal('show');
                    }
                }
            });
        });

        //<!------------------rejected tab feedback ajax------------->

        $(document).on('click', '#rejectedfeedback', function(e) {
            e.preventDefault();
            var user_idrej = $(this).val();
            console.log(user_idrej)
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'seefeedback': true,
                    'user_idrej': user_idrej

                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    console.log(res)
                    if (res.status == 500) {
                        alert(res.message);
                    } else {
                        $('#pdrej2').val(res.data.feedback);
                        $('#problemrejected').modal('show');
                    }
                }
            });
        });

        //<!------------------pending tab image------------->

        $(document).on('click', '.showImage', function() {
            var task_id = $(this).data('task-id');
            $('#task_id').val(task_id);

            // Fetch the image from the server
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'get_image': true,
                    'task_id': task_id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalImage').attr('src', response.data.images).show();
                    } else {
                        $('#modalImage').hide();
                        alert(response.message);
                    }
                    $('#imageModal1').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while retrieving the image.');
                }
            });
        });

        //<!------------------approved tab image------------->

        $(document).on('click', '.viewimgappr', function() {
            var task_id = $(this).data('image-id');
            $('#task_id').val(task_id);

            // Fetch the image from the server
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'get_image': true,
                    'task_id': task_id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        $('#imgapr').attr('src', response.data.images).show();
                    } else {
                        $('#imgapr').hide();
                        alert(response.message);
                    }
                    $('#viewimgapr').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while retrieving the image.');
                }
            });
        });

        //<!------------------completed tab image------------->

        $(document).on('click', '.viewimgcomp', function() {
            var task_id = $(this).data('img-id');
            $('#task_id').val(task_id);

            // Fetch the image from the server
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'get_image': true,
                    'task_id': task_id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        $('#imgcomp').attr('src', response.data.images).show();
                    } else {
                        $('imgcomp').hide();
                        alert(response.message);
                    }
                    $('#viewimgcomp').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while retrieving the image.');
                }
            });
        });

        //<!------------------completed  after tab image------------->

        $(document).on('click', '.viewafterimgcomp', function() {
            var task_id = $(this).data('imgs-id');
            $('#task_id').val(task_id);

            // Fetch the image from the server
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'after_image': true,
                    'task_id': task_id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        $('#afterimgcomp').attr('src', response.data.after_photo).show();
                    } else {
                        $('afterimgcomp').hide();
                        alert(response.message);
                    }
                    $('#viewimgaftercomp').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while retrieving the image.');
                }
            });
        });

        //<!------------------rejected tab image------------->

        $(document).on('click', '.viewimgrej', function() {
            var task_id = $(this).data('imga-id');
            $('#task_id').val(task_id);

            // Fetch the image from the server
            $.ajax({
                type: "POST",
                url: "hodbackend.php",
                data: {
                    'get_image': true,
                    'task_id': task_id
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == 200) {
                        $('#imgrej').attr('src', response.data.image).show();
                    } else {
                        $('#imgrej').hide();
                        alert(response.message);
                    }
                    $('#viewimgrej').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while retrieving the image.');
                }
            });
        });




        //new model comp details
        //jquerry for view complaint
        $(document).on("click", ".viewcomplaint", function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                console.log(user_id);
                $.ajax({
                    type: "POST",
                    url: "hodbackend.php",
                    data: {
                        view_complaint: true,
                        user_id: user_id,
                    },
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        console.log(res);
                        if (res.status == 500) {
                            alert(res.message);
                        } else {
                            //$('#student_id2').val(res.data.uid);
                            $("#id").val(res.data.id);
                            $("#type_of_problem").text(res.data.type_of_problem);
                            $("#problem_description").text(res.data.problem_description);
                            $("#faculty_name").text(res.data.faculty_name);
                            $("#faculty_mail").text(res.data.faculty_mail);
                            $("#faculty_contact").text(res.data.faculty_contact);
                            $("#block_venue").text(res.data.block_venue);
                            $("#venue_name").text(res.data.venue_name);
                            $("#complaintDetailsModal").modal("show");
                        }
                    },
                });
            });
    </script>
</body>

</html>