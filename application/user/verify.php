<?php
include '../../controller/action.php';
if($action->is_loggedin() != ''){
    $action->redirect('dashboard.php');
}

if(isset($_POST['register'])){

    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data = array("username"=> $_POST['username'], "password"=>$new_password, "firstname"=>$_POST['firstname'], "middlename"=>$_POST['middlename'],
        "lastname"=>$_POST['lastname'], "address"=>$_POST['address'], "email"=>$_POST['email'], "contact"=>$_POST['contact'], "status"=>"Pending");
    $query = db_insert('tbl_users', $data);
    if(isset($query)){
        $action->redirect('signup.php?Success');

    }
    else{
        $error = "There was an error registering your account";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="Auto Web App" />
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
    <!-- animate css -->
    <link rel="stylesheet" href="<?= $CSS_PATH; ?>libs/animate.css/animate.min.css" />

    <!-- jquery-loading -->
    <link rel="stylesheet" href="<?= $CSS_PATH; ?>libs/jquery-loading/dist/jquery.loading.min.css" />
    <!-- octadmin main style -->
    <link id="pageStyle" rel="stylesheet" href="<?= $CSS_PATH; ?>css/style-facebook.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<section class="container-pages">

    <!--        <div class="brand-logo float-left"><a class="" href="#"> --><?//= $APP_NAME; ?><!--</a></div>-->

    <div class="card pages-card col-lg-4 col-md-6 col-sm-6">
        <div class="card-body ">
            <div class="h4 text-center text-theme"><strong>Sign Up</strong></div>
            <div class="small text-center text-dark"> Create an Account </div>

            <form action="" method="POST">
                <div class="form-group">
                    <div class="input-group">
                                 <span class="input-group-addon text-theme"><i class="fa fa-user"></i>
                                </span>
                        <input type="text" id="username" name="username" class="form-control"
                               placeholder="Username" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                                <span class="input-group-addon text-theme"><i class="fa fa-envelope"></i>
                                            </span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon text-theme"><i class="fa fa-asterisk"></i></span>
                        <input type="password" id="password" name="password" class="form-control"
                               placeholder="Password"  required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon text-theme"><i class="fa fa-user"></i></span>
                        <input type="text" id="password" name="firstname" class="form-control"
                               placeholder="First Name" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon text-theme"><i class="fa fa-user"></i></span>
                        <input type="text" id="password" name="middlename" class="form-control"
                               placeholder="Middle Name" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon text-theme"><i class="fa fa-user"></i></span>
                        <input type="text" id="password" name="lastname" class="form-control"
                               placeholder="Last Name" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon text-theme"><i class="fa fa-address-book"></i></span>
                        <input type="text" id="password" name="contact" class="form-control" value="+639"
                               placeholder="Contact Number" required />
                    </div>
                </div>
                <div class="form-group form-actions">
                    <button type="submit" class="btn btn-theme login-btn" name="register">   Sign up   </button>
                </div>
            </form>
            <!-- end form -->
            <div class="text-center">
                <small>already have an account ? Please
                    <a href="index.php" class="text-theme">Login</a>
                </small>
            </div>

        </div>
        <!-- end card-body -->
    </div>
    <!-- end card -->
</section>
<!-- end section container -->

<div class="half-circle"></div>
<div class="small-circle"></div>
<!-- end mybutton -->
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
            Command: toastr["info"]("Your Information is Registered Successfully, Please Wait for email to verify" +
                " your account")

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