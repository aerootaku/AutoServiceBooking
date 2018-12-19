<?php

include '../../controller/action.php';
include 'session.php';
$company_name = $_SESSION['company_name'];
if(isset($_POST['accept'])){
    $id = $_GET['id'];
    $custom_query = $_GET['customer_email'];
    $tech_name = $_POST['tech_name'];
    $name = explode(" ", $tech_name);
    // get the tech ID
    $get = db_select_whereCustom('tbl_company_users', $data = array("firstname"=>$name[0], "lastname"=>$name[1]));
    if($get->rowCount()>0) {
        while ($row = $get->fetch(PDO::FETCH_ASSOC)) {
            $tech_id = $row['id'];
            $data = array("tech_id"=>$tech_id, "tech_firstname" => $name[0], "tech_lastname" => $name[1], "est_time" =>
            $_POST['est_time'],
                "status" => "Accepted");
            $where = array("id" => $id);
            $query = db_update('tbl_booking', $data, $where);
            if (isset($query)) {
            $mail = custom_query("SELECT * FROM tbl_users WHERE email = '$customer_email'");
            $techupdate = db_update('tbl_company_users', $data = array("isOnline"=>"Servicing"), $where = array("id"=>$tech_id));
         if($mail->rowCount()>0)
        {
            while($row=$mail->fetch(PDO::FETCH_ASSOC))
            {
                $id = $row['id'];
                $email = $row['email'];
                $to = $email;
                $subject = "Your Booking is Accepted";
                $message = "Congratulations, your booking was Accepted!";
                $headers = "From: no-reply@autoservice-web.xyz";
                mail($to,$subject,$message,$headers);
            }
            
        }
                $action->redirect('dashboard.php?Success');
            } else {
                $error = "There was an error in your action";
            }
        }
    }

}
if(isset($_POST['decline'])){
    $id = $_GET['id'];
    $customer_email = $_GET['customer_email'];
    $data = array("status"=>"Declined");
    $where = array("id"=>$id);
    $query = db_update('tbl_booking', $data, $where);
    if(isset($query)){
            $mail = custom_query("SELECT * FROM tbl_users WHERE email = '$customer_email'");
         if($mail->rowCount()>0)
        {
            while($row=$mail->fetch(PDO::FETCH_ASSOC))
            {
                $id = $row['id'];
                $email = $row['email'];
                $to = $email;
                $subject = "Your Booking is Declined";
                $message = "Sorry, your booking was Declined!";
                $headers = "From: no-reply@autoservice-web.xyz";
                mail($to,$subject,$message,$headers);
            }
            
        }
        $action->redirect('dashboard.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }

}
if(isset($_POST['passwordChange'])){
    $pwold = $_POST['pwold'];
    $password = $_POST['pwnew'];
    $id = $_GET['id'];

    if(password_verify($pwold, $_SESSION['declared'])){
        $new_password = password_hash($password, PASSWORD_DEFAULT);
        $query = db_update('tbl_company_users', $data = array('password'=>$new_password), $where = array("id"=>$id));
        if(isset($query)){

            $action->redirect('dashboard.php?Success');
        }
        else{
            $error = "There was an error in your action";
        }
    }
    else{
       $error = "Old password does not match in the database";
    }
}

if(isset($_POST['opening'])){
    $data = array(
            "opening"=>$_POST['opening'],
        "closing"=>$_POST['closing']
    );
    $where = array("id"=>$_GET['id']);

    $update = db_update('tbl_company_info', $data, $where);
    if(isset($update)){

        $action->redirect('dashboard.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $APP_NAME; ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= $CSS_PATH; ?>img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $CSS_PATH; ?>img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $CSS_PATH; ?>img/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?= $CSS_PATH; ?>img/favicon/manifest.json" />
    <link rel="mask-icon" href="<?= $CSS_PATH; ?>img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="theme-color" content="#ffffff" />

    <!-- fonts -->
    <link rel="stylesheet" href="<?= $CSS_PATH; ?>fonts/md-fonts/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= $CSS_PATH; ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= $CSS_PATH; ?>fonts/simple-line-icons/css/simple-line-icons.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?= $CSS_PATH; ?>libs/animate.css/animate.min.css" />
    <link rel="stylesheet" href="<?= $CSS_PATH; ?>libs/tables-datatables/dist/datatables.min.css" />
     <!-- jquery-loading -->
     <link rel="stylesheet" href="<?= $CSS_PATH; ?>libs/jquery-loading/dist/jquery.loading.min.css" />

    <!-- octadmin main style -->
    <link id="pageStyle" rel="stylesheet" href="<?= $CSS_PATH; ?>css/style.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body class="app sidebar-fixed aside-menu-off-canvas aside-menu-hidden header-fixed">
<header class="app-header navbar">
    <div class="hamburger hamburger--arrowalt-r navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <!-- end hamburger -->
    <a class="navbar-brand" href="">
        <strong><?=  $company_name ?></strong>
    </a>
    <br />

    <div class="hamburger hamburger--arrowalt-r navbar-toggler sidebar-toggler d-md-down-none mr-auto">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <!-- end hamburger -->

    <!-- end navbar-search -->

    <ul class="nav navbar-nav ">
        <!-- end nav-item -->

        <ul class="nav navbar-nav ">


            <li class="nav-item dropdown">
                <a class="btn btn-round btn-theme btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                    <span class=""><?= $_SESSION['username']; ?>
                        <i class="fa fa-arrow-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right user-menu animated flipInY ">
                    <div class="wrap">
                        <div class="dw-user-box">
                            <div class="u-img">
                                <img src="<?= $CSS_PATH; ?>img/user.png" alt="user" />
                            </div>
                            <div class="u-text">
                                <h5><?= $_SESSION['lastname'].", ". $_SESSION['firstname']; ?></h5>
                                <p class="text-muted"><?= $_SESSION['username']; ?></p>

                            </div>
                        </div>
                        <!-- end dw-user-box -->
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#changeProfile<?=
                        $_SESSION['id']; ?>">
                            <i class="fa fa-user"></i> Change Profile</a>
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#changePassword<?=
                        $_SESSION['id']; ?>">
                            <i class="fa fa-cog"></i> Change Password</a>
                        <div class="divider"></div>

                        <a class="dropdown-item" href="logout.php?logout=true">
                            <i class="fa fa-lock"></i> Logout</a>
                    </div>
                    <!-- end wrap -->
                </div>
                <!-- end dropdown-menu -->
            </li>
            <!-- end nav-item -->


        </ul>


    </ul>


</header>

    <div class="app-body">
<?php include 'include/sidebar.php'; ?>
        <!-- end sidebar -->

        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
                <li class="breadcrumb-item ">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Dashboard Owner</li>
            </ol>

            <div class="container-fluid">

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-pm-summary bg-theme">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <div class="h3 text-white">
                                                <strong>
                                                    <?php echo $_SESSION['company_name'];  ?>
                                                </strong>
                                            </div>
                                            <small class="text-white"></small>
                                        </div>

                                        <div class="float-right">
                                            <button type="button" data-toggle="modal" data-target="#operating" class="btn
                                            btn-dark">Change Operating Hours</button>
                                            <br /><hr />
                                        </div>
                                    </div>
                                    <!-- end clearfix -->

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <div class="widget-pm-summary">
                                                    <i class="mdi mdi-checkbox-multiple-marked-outline"></i>
                                                    <div class="widget-text">
                                                        <div class="h2 text-white"><?=  $count = db_count_where('tbl_customer_concern', $data  = array("company_name"=>$_SESSION['company_name']));
                                                            ?>
                                                        </div>
                                                        <small class="text-white">User Feedback</small>
                                                    </div>
                                                    <!-- end widget-text -->
                                                </div>
                                                <!-- end widget-pm-simmary -->
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end inside-col -->

                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <div class="widget-pm-summary">
                                                    <i class="mdi mdi-google-circles"></i>
                                                    <div class="widget-text">
                                                        <div class="h3 text-white"><?=  $count = db_count_where('tbl_services', $data  = array("company_name"=>$_SESSION['company_name']));
                                                            ?></div>
                                                        <small class="text-white">Services Offered</small>
                                                    </div>
                                                    <!-- end widget-text -->
                                                </div>
                                                <!-- end widget-pm-simmary -->
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end inside-col -->

                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <div class="widget-pm-summary">
                                                    <i class="mdi mdi-account-settings-variant"></i>
                                                    <div class="widget-text">
                                                        <div class="h2 text-white"><?= $count = db_count_where('tbl_company_users', $data = array ("role"=>"tech", "company_name"=>$_SESSION['company_name']))
                                                            ?></div>
                                                        <small class="text-white">Registered Technicians</small>
                                                    </div>
                                                    <!-- end widget-text -->
                                                </div>
                                                <!-- end widget-pm-simmary -->
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end inside-col -->

                                        <div class="col-md-3">
                                            <div class="card-body">
                                                <div class="widget-pm-summary">
                                                    <i class="mdi mdi-account"></i>
                                                    <div class="widget-text">
                                                        <div class="h2 text-white"><?= $count = db_count_where('tbl_company_users' , $data = array("role" => "Staff", "company_name"=> $_SESSION['company_name']));
                                                            ?></div>
                                                        <small class="text-white">Registered Staff</small>
                                                    </div>
                                                    <!-- end widget-text -->
                                                </div>
                                                <!-- end widget-pm-simmary -->
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end inside-col -->
                                    </div>
                                    <!-- end inside row -->

                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-green">
                                <div class="card-body">
                                    <!-- end clearfix -->
                                    <div class="clearfix">
                                        <h3 class="header">Customer Booking</h3>

                                    </div>

                                        <div id="tabledata" align="center"></div>

                                    <!-- end inside row -->

                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>

                    </div>
                    <!-- end row -->
                </div>
                <!-- end animated fadeIn -->
            </div>
            <!-- end container-fluid -->

        </main>
        <!-- end main -->

        <!-- end aside -->

    </div>
    <!-- end app-body -->

    <footer class="app-footer">
        <a href="#" class="text-theme"><?= $APP_NAME; ?></a>
    </footer>
    <!-- live example model -->
    <?php include 'editprofile.php'; ?>
    <?php
    $value = custom_query("SELECT * FROM tbl_booking WHERE company_name ='$company_name'");
    if($value->rowCount()>0)
    {
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
    $id = $row['id'];
    ?>
    <div id="view<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">View Attachment</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="validationCustom05">Attached Image</label>
                            <br /><hr>
                            <img src="<?= $row['attachment']; ?>" class="img img-responsive" style="width: 100%; size: auto" />
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                        </div>
                        <div class="form-group">
                            <h6><strong>Notes to Technician:</strong> </h6>
                            <p><?php echo $row['notes']; ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php }}?>
    <?php
    $value = custom_query("SELECT * FROM tbl_booking WHERE company_name ='$company_name'");
    if($value->rowCount()>0)
    {
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
    $id = $row['id'];
    ?>
    <div id="accept<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Accept Booking</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="?id=<?=$row['id']; ?>&customer_email=<?= $row['customer_email']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="clearfix">
                            <h4>Booking ID: <?= $row['booking_id']; ?></h4>
                            <span>Customer Name: <?= $row['customer_lastname']. ", ". $row['customer_firstname'];
                            ?></span><br />
                            <span>Contact No: <?= $row['customer_contact']; ?></span><br />
                            <span>Email Address: <?= $row['customer_email']; ?></span><br />
                            <span>Service Type: <?= $row['service_type']; ?></span>
                            <hr />
                            <div class="form-group">
                                <label>Assign Technician</label>
                                <select name="tech_name" class="form-control">
                                    <?php
                                    $value1 = custom_query("SELECT * FROM tbl_company_users WHERE role='Tech' AND company_name = '$company_name' and isOnline ='Online'");
                                    if($value1->rowCount()>0)
                                    {
                                    while($row1=$value1->fetch(PDO::FETCH_ASSOC))
                                    {
                                    $id = $row1['id'];
                                    ?>
                                    <option value="<?= $row1['firstname']. " ". $row1['lastname']; ?>"><?=
                                        $row1['firstname']. " ". $row1['lastname']; ?> - Service: <?=
                                        $row1['service']; ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Estimated Arrival Time</label>
                                <input type="time" class="form-control" name="est_time" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="accept">Accept</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php }}?>
    <?php
    $value = custom_query("SELECT * FROM tbl_booking WHERE company_name ='$company_name'");
        if($value->rowCount()>0)
        {
        while($row=$value->fetch(PDO::FETCH_ASSOC))
        {
        $id = $row['id'];
    ?>
    <div id="decline<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Decline <?= $row['booking_id']; ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="?id=<?=$row['id']; ?>&customer_email=<?= $row['customer_email']; ?>" method="POST" id="needs-validation" novalidate=""
                enctype="multipart/form-data">
                    <div class="modal-body">
                    <h3>Are you sure you want to decline this booking?</h3>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger" name="decline">Yes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php }} ?>

<?php
$value = custom_query("SELECT * FROM tbl_company_info");
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="operating" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Operating Hours</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate=""
                          enctype="multipart/form-data">
                        <div class="modal-body">
                           <div class="form-group">
                               <label>Opening</label>
                               <input type="time" class="form-control" value="<?= $row['opening']; ?>" name="opening" />
                           </div>

                            <div class="form-group">
                                <label>Closing</label>
                                <input type="time" class="form-control" value="<?= $row['closing']; ?>" name="closing" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" name="opening">Save Changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }} ?>
    <!-- /.modal -->
    <!-- Bootstrap and necessary plugins -->
    <script src="<?= $CSS_PATH; ?>libs/jquery/dist/jquery.min.js"></script>

    <script src="<?= $CSS_PATH; ?>libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= $CSS_PATH; ?>libs/bootstrap/bootstrap.min.js"></script>
    <script src="<?= $CSS_PATH; ?>libs/PACE/pace.min.js"></script>
    <script src="<?= $CSS_PATH; ?>libs/chart.js/dist/Chart.min.js"></script>
    <script src="<?= $CSS_PATH; ?>libs/nicescroll/jquery.nicescroll.min.js"></script>

   <!-- jquery-loading -->
   <script src="<?= $CSS_PATH; ?>libs/jquery-loading/dist/jquery.loading.min.js"></script>
    <!--toastr -->
    <script src="<?= $CSS_PATH; ?>libs/toastr/toastr.min.js"></script>
    <!-- toastr example script -->
    <script src="<?= $CSS_PATH; ?>js/toastr-example.js"></script>
    <!-- bootstrap form validation -->
    <script src="<?= $CSS_PATH; ?>js/bootstrap-form-validation.js"></script>
    <!-- dashboard-pm -example -->
    <script src="<?= $CSS_PATH; ?>js/dashboard-pm-example.js"></script>
    <!--datatables -->
    <script src="<?= $CSS_PATH; ?>libs/tables-datatables/dist/datatables.min.js"></script>

    <!-- octadmin Main Script -->
    <script src="<?= $CSS_PATH; ?>js/app.js"></script>

    <!-- datatable examples -->
    <script src="<?= $CSS_PATH; ?>js/table-datatable-example.js"></script>

    <?php if(isset($error)){
        ?>
    <script>
        $(document).ready(function () {
            Command: toastr["info"]("<?php echo $error; ?>")

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>
    <?php
    } ?>
    <?php if(isset($_GET['Success'])){

    ?>
    <script>
        $(document).ready(function () {
            Command: toastr["info"]("Your changes was saved successfully")

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>
    <?php

}  ?>

<script>
    $(document).ready(function() {
        setInterval(function () {
            $('#tabledata').load('tabledata.php')
        }, 2000);
    });
</script>
</body>

</html>