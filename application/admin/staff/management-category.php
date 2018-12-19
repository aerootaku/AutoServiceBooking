<?php

include '../../controller/action.php';
include 'session.php';

if(isset($_POST['create'])){
    $data = array("title"=>$_POST['title'], "description"=>$_POST['description'], "company_name"=>$_SESSION['company_name']
    );
    $query = db_insert('tbl_category', $data);
    if(isset($query)){

        $action->redirect('management-category.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }

}
if(isset($_POST['edit'])){
    $id = $_GET['id'];
    $data = array(
        "title"=>$_POST['title'], "description"=>$_POST['description']
    );
    $where = array("id"=>$id);
    $query = db_update('tbl_category', $data, $where);
    if(isset($query)){
        $action->redirect('management-category.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }
}
if(isset($_POST['delete'])){
    $id = $_GET['id'];
    $data = array("id"=>$id);
    $query = db_delete('tbl_category', $data);
    if(isset($query)){

        $action->redirect('management-category.php?Success');
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
        $query = db_update('tbl_admin', $data = array('password'=>$new_password), $where = array("id"=>$id));
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
        <strong><?=  $_SESSION['company_name']; ?></strong>
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
                        <div class="card card-accent-theme">
                            <div class="card-body">
                                <h4 class="text-theme">Manage Category</h4>
                                <button type="button" data-toggle="modal" data-target="#add" class="btn
                                            btn-dark" title="Create New Category">Create Category</button>
                                <br /><hr />

                                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $value = db_select_whereCustom('tbl_category', $data = array ("company_name"=>$_SESSION['company_name']));
                                    if($value->rowCount()>0)
                                    {
                                        while($row=$value->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $row['id'];
                                            ?>
                                            <tr>
                                                <td><?php custom_echo($row['title'], 10)  ?></td>
                                                <td><?php custom_echo($row['description'], 20) ; ?></td>
                                                <td>
                                                    <a href="" data-target="#edit<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs
                                                    btn-warning" style="margin-top: -5px" title="Edit Category"><i class="icon-pencil"
                                                                                             style="color: black;"></i> </a>
                                                    <a href="" data-target="#delete<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs  btn-danger" style="margin-top: -5px" title="Delete Category"><i class="icon-trash"
                                                                                                    style="color: white;"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>


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
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Create New Record</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="validationCustom05">Category Title</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Service Title"
                               required="" name="title" />
                        <div class="invalid-feedback">
                            Please provide a valid title.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Description</label>
                        <textarea type="text" class="form-control" id="validationCustom05" placeholder="Description"
                                  required="" name="description"></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid description.
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
$value = db_select_order('tbl_category', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="edit<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Company Record</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="validationCustom05">Category Title</label>
                                <input type="text" class="form-control" id="validationCustom05" placeholder="Service Title"
                                       required="" name="title" value="<?= $row['title']; ?>" />
                                <div class="invalid-feedback">
                                    Please provide a valid title.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Description</label>
                                <textarea type="text" class="form-control" id="validationCustom05" placeholder="Description"
                                          required="" name="description"><?= $row['description']; ?></textarea>
                                <div class="invalid-feedback">
                                    Please provide a valid description.
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }}?>
<?php
$value = db_select_order('tbl_category', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="delete<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete Record</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate=""
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            <h3>This will remove the selected item permanently</h3>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="delete">Remove</button>
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
<!--formatter js -->
<script src="<?= $CSS_PATH; ?>libs/form-masks/dist/formatter.min.js"></script>
<!-- octadmin Main Script -->
<script src="<?= $CSS_PATH; ?>js/app.js"></script>

<!-- datatable examples -->
<script src="<?= $CSS_PATH; ?>js/table-datatable-example.js"></script>
<!-- formmasks-example -->
<script src="<?= $CSS_PATH; ?>js/form-masks-example.js"></script>
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
</body>

</html>