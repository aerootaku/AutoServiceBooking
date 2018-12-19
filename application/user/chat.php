<?php

include '../../system/config.php';
include '../../system/constant.php';
$booking_id = $_GET['booking_id'];
$customer_id = $_GET['customer_id'];
$tech_id = $_GET['tech_id'];
if(isset($_POST['send'])){

    $text = $_POST['text'];

    $query = db_insert('tbl_chat', $data = array("booking_id"=>$booking_id, "tech_id"=>$tech_id,
        "customer_id"=>$customer_id, "text"=>$text, "class"=>"User")); //class = user if user and class = tech if
    // technician.
    if(isset($query)){
       $url = 'chat.php?booking_id='.$_GET['booking_id'].'&customer_id='.$_GET['customer_id'].'&tech_id='
           .$_GET['tech_id'];
       redirect($url);
    }
    else{
        $error = "There was an error updating your profile information";
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
    <script>
        $(document).ready(function(){
            setInterval(function() {
                $("#refresh").load("chat.php #refresh");
            }, 1000);
        });
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body class="app sidebar-fixed sidebar-minimized aside-menu-off-canvas aside-menu-hidden header-fixed footer-fixed">
<header class="app-header navbar">
    <div class="hamburger hamburger--arrowalt-r navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <!-- end hamburger -->
    <a class="navbar-brand" href="dashboard.php">
        <strong><?= $APP_NAME; ?></strong>
    </a>

    <!-- end hamburger -->
    <!-- end navbar-search -->

</header>
<!-- end header -->

<div class="app-body">
    <!-- end sidebar -->
<?php include 'sidebar.php'; ?>
    <main class="main">

        <div class="message-content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <h5 class="text-theme float-left">Message</h5>
                            <div class="h3">
                                <i class="fa fa-comments-o float-right text-theme"></i>
                            </div>
                        </div>
                        <div class="chat">
                            <div id="check"></div> <!--periodically check-->

                        </div>

                    </div>
                    <!-- end card-body -->
                    <div class="card-footer">
                        <form class="form-row" action="?booking_id=<?= $booking_id; ?>&tech_id=<?= $tech_id;
                        ?>&customer_id=<?= $customer_id; ?>" method="POST">
                        <div class="col-md-10 mb-3">
                          <textarea class="form-control" rows="3" name="text" placeholder="Type here..."></textarea>
                        </div>
                        <div class="col-md-2 mb-3">
                            <button class="btn btn-theme btn-block" type="submit" name="send">
                                <i class="fa fa-paper-plane"> Send</i>
                            </button>
                            <br /><br />
                            <a class="btn btn-danger btn-block" href="dashboard-pending.php">
                                Back
                            </a>
                        </div>
                        </form>
                    </div>
                    <!-- end card-footer -->

                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end message-content -->
    </main>
    <!-- end main -->

</div>
<!-- end app-body -->



<!-- Bootstrap and necessary plugins -->
<script src="<?= $CSS_PATH; ?>libs/jquery/dist/jquery.min.js"></script>
<script src="<?= $CSS_PATH; ?>libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= $CSS_PATH; ?>libs/bootstrap/bootstrap.min.js"></script>
<script src="<?= $CSS_PATH; ?>libs/PACE/pace.min.js"></script>
<script src="<?= $CSS_PATH; ?>libs/chart.js/dist/Chart.min.js"></script>
<script src="<?= $CSS_PATH; ?>libs/nicescroll/jquery.nicescroll.min.js"></script>

<!-- jquery-loading -->
<script src="<?= $CSS_PATH; ?>libs/jquery-loading/dist/jquery.loading.min.js"></script>
<!-- octadmin Main Script -->
<script src="<?= $CSS_PATH; ?>js/app.js"></script>
<?php
$url = 'chat-content.php?booking_id='.$_GET['booking_id'].'&customer_id='.$_GET['customer_id'].'&tech_id='
    .$_GET['tech_id'];
?>
<script>
    $(document).ready(function() {
        setInterval(function () {
            $('#check').load('<?= $url; ?>')
        }, 2000);
    });
</script>
</body>

</html>