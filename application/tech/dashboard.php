<?php

include '../../controller/action.php';
include 'session.php';


?>
<?php
// check if there is an existing booking


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
    <style>
        .loader {
            border: 10px solid #f3f3f3;
            border-radius: 50%;
            border-top: 10px solid #005adb;
            width: 80px;
            height: 80px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .img-edited {
            max-width: 100%;
            height: auto;
            width: auto\9; /* ie8 */
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body class="app sidebar-fixed aside-menu-off-canvas aside-menu-hidden header-fixed">
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
    <?php include 'sidebar.php'; ?>
    <!-- end sidebar -->
    <!--check booking-->
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb bc-colored bg-theme" id="breadcrumb">
            <li class="breadcrumb-item ">
                <a href="./blank-page.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Layouts</a>
            </li>
            <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <div class="container">

            <div class="animated fadeIn">
                <div class="row">
                    <div id="check"></div>
                </div>


            </div>
            <!-- end animated fadeIn -->
        </div>
        <!-- end container-fluid -->

    </main>
    <!-- end main -->

</div>
<!-- end app-body -->

<?php
$value = db_select_order('tbl_services', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="book<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Book This Service?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>&company_name=<?= $row['company_name'];
                    ?>&service_type=<?= $row['title']; ?>&fee=<? $row['fee']; ?>"
                          method="POST"
                          id="needs-validation"
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <h5><?= $row['company_name']; ?></h5>
                                <span>Service: <?= $row['title']; ?></span><br />
                                <span>Category: <?= $row['category']; ?></span><br />
                                <span>Fee: <?= $row['fee']; ?></span>
                            </div>
                            <hr />
                            <div class="form-group">
                                <label for="validationCustom05">Attachment</label>
                                <input type="file" class="form-control" id="validationCustom05"
                                       placeholder="Service Image to Fix"
                                       required="" name="attachment" accept="image/x-png,image/gif,image/jpeg" />
                                <div class="invalid-feedback">
                                    Please provide a valid file
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label for="validationCustom01">Note's to company</label>
                                    <textarea class="form-control" id="validationCustom01"
                                              placeholder="Hey! is there anything else you want to say with us?" name="notes"></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a valid notes
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-rounded"
                                    data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-rounded" name="BookService">Book
                                Service</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }}?>
<?php
$value = db_select_order('tbl_booking', 'id', 'DESC');
if($value->rowCount()>0)
{
while($row=$value->fetch(PDO::FETCH_ASSOC))
{
$id = $row['id'];
?>
<div id="cancel<?=$id;?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure you want to cancel?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="?id=<?=$row['id']; ?>"
                  method="POST"
                  id="needs-validation"
                  enctype="multipart/form-data">
                <div class="modal-body">
                    <p>This will cancel the current transaction?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded"
                            data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-info btn-rounded" name="cancel">Yes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php }} ?>
<?php
$value = db_select_order('tbl_booking', 'id', 'DESC');
if($value->rowCount()>0)
{
while($row=$value->fetch(PDO::FETCH_ASSOC))
{
$id = $row['id'];
?>
        <div id="rate<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Services is completed?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?booking_id=<?= $row['booking_id']; ?>&tech_firstname=<?= $row['tech_firstname'];
                    ?>&tech_lastname=<?= $row['tech_lastname']; ?>&company_name=<?= $row['company_name'];
                    ?>&customer_id=<?= $row['customer_id']; ?>&tech_id=<?= $row['tech_id']; ?>"
                          method="POST"
                          id="needs-validation"
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            <h5>Please Rate the technician before ending this transaction</h5>
                            <br />
                            <div class="form-group" align="center">
                                <label>Rating</label>
                                <select id="example-fontawesome" name="rating" autocomplete="off">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Feedback</label>
                                <textarea class="form-control" name="feedback" placeholder="Feedback"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-rounded"
                                    data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info btn-rounded" name="sendFeedback">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
<?php }} ?>
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
<!--Rating -->
<script src="<?= $CSS_PATH; ?>libs/rating/jquery.barrating.min.js"></script>
<!-- octadmin Main Script -->
<script src="<?= $CSS_PATH; ?>js/app.js"></script>

<!-- datatable examples -->
<script src="<?= $CSS_PATH; ?>js/table-datatable-example.js"></script>
<script src="<?= $CSS_PATH; ?>js/barrating-example.js"></script>
<?php if(isset($error)){
    ?>
    <script>
        $(document).ready(function () {
            Command: toastr["danger"]("<?php echo $error; ?>")

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
            Command: toastr["success"]("Booking Success! You will receive an email notification in a few seconds")

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-full-width",
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

}  ?>
<script>
    $(document).ready(function() {
        setInterval(function () {
            $('#check').load('check.php')
        }, 2000);
    });
</script>
</body>

</html>