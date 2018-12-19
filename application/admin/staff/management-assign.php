<?php
include '../../controller/action.php';
include 'session.php';
$company_name = $_SESSION['company_name'];

if(isset($_POST['create'])){
    $query = db_update('tbl_company_users', $data = array("service"=>$_POST['service']), $where = array("id" =>
        $_POST['id']));
    if(isset($query)){

        $action->redirect('management-services.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }

}
if(isset($_POST['edit'])){
    $id = $_GET['id'];
    $data = array(
        "title"=>$_POST['title'], "category"=>$_POST['category'], "description"=>$_POST['description']
    );
    $where = array("id"=>$id);
    $query = db_update('tbl_services', $data, $where);
    if(isset($query)){
        $action->redirect('management-services.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }
}
if(isset($_POST['delete'])){
    $id = $_GET['id'];
    $data = array("id"=>$id);
    $query = db_delete('tbl_services', $data);
    if(isset($query)){

        $action->redirect('management-services.php?Success');
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


    <div class="hamburger hamburger--arrowalt-r navbar-toggler sidebar-toggler d-md-down-none mr-auto">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <!-- end hamburger -->

    <!-- end navbar-search -->

    <ul class="nav navbar-nav ">
        <li class="nav-item ">
            <a class="nav-link" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-ring-outline"></i>
                <span class="notification hertbit"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right notification-list animated flipInY nicescroll-box">

                <div class="dropdown-header">
                    <strong>Notification</strong>
                    <span class="badge badge-pill badge-theme pull-right"> new 5</span>
                </div>
                <!--end dropdown-header -->

                <div class="wrap">

                    <a href="#" class="dropdown-item">
                        <div class="message-box">
                            <div class="u-img">
                                <img src="../../img/products/product-1.jpg" alt="user" />
                            </div>
                            <!-- end u-img -->
                            <div class="u-text">
                                <div class="u-name">
                                    <strong>A New Order has Been Placed </strong>
                                </div>
                                <small>2 minuts ago</small>
                            </div>
                            <!-- end u-text -->
                        </div>
                        <!-- end message-box -->
                    </a>
                    <!-- end dropdown-item -->

                    <a href="#" class="dropdown-item">
                        <div class="message-box">
                            <div class="u-img">
                                <img src="../../img/products/product-2.jpg" alt="user" />
                            </div>
                            <div class="u-text">
                                <div class="u-name">
                                    <strong>Order Updated</strong>
                                </div>
                                <small>10 minuts ago</small>
                            </div>
                            <!-- end u-text -->
                        </div>
                        <!-- end message-box -->
                    </a>
                    <!-- end dropdown-item -->

                    <a href="#" class="dropdown-item">
                        <div class="message-box">
                            <div class="u-img">
                                <img src="../../img/products/product-3.jpg" alt="user" />
                            </div>
                            <!-- end u-img -->
                            <div class="u-text">
                                <div class="u-name">
                                    <strong>A New Order has Been Placed </strong>
                                </div>
                                <small>30 minuts ago</small>
                            </div>
                            <!-- end u-text -->
                        </div>
                        <!-- end message-box -->
                    </a>
                    <!-- end dropdown -->

                    <a href="#" class="dropdown-item">
                        <div class="message-box">
                            <div class="u-img">
                                <img src="../../img/products/product-4.jpg" alt="user" />
                            </div>
                            <!-- end u-img -->
                            <div class="u-text">
                                <div class="u-name">
                                    <strong> Order has Been Rated </strong>
                                </div>
                                <small>32 minuts ago</small>
                            </div>
                            <!-- end u-text -->
                        </div>
                        <!-- end message-box -->
                    </a>
                    <!-- end dropdown -->
                </div>
                <!-- end wrap -->

                <div class="dropdown-footer ">
                    <a href="./dashboard-project-management.html">
                        <strong>See all messages (150) </strong>
                    </a>
                </div>
                <!-- end dropdown-footer -->
            </div>
            <!-- end notification-list -->

        </li>
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
                                <img src="<?= $CSS_PATH; ?>img/users/207.jpg" alt="user" />
                            </div>
                            <div class="u-text">
                                <h5><?= $_SESSION['lastname'].", ". $_SESSION['firstname']; ?></h5>
                                <p class="text-muted"><?= $_SESSION['username']; ?></p>

                            </div>
                        </div>
                        <!-- end dw-user-box -->

                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#changePassword<?=
                        $_SESSION['id']; ?>">
                            <i class="fa fa-user"></i> Change Password</a>
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

    <div class="hamburger hamburger--arrowalt-r navbar-toggler aside-menu-toggler ">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
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
                                <h4 class="text-theme">Assign Services</h4>
                                <button type="button" data-toggle="modal" data-target="#add" class="btn
                                            btn-dark">Assign Services</button>
                                <br /><hr />

                                <table class="table table-hover dataTable table-striped w-full"
                                       data-plugin="dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Technician Name</th>
                                        <th>Service</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Technician Name</th>
                                        <th>Service</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $value = custom_query("SELECT * FROM tbl_company_users WHERE service != '' AND role = 'Tech' AND company_name = '$company_name'");
                                    if($value->rowCount()>0)
                                    {
                                        while($row=$value->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $row['id'];
                                            ?>
                                            <tr>
                                                <td><?= $row['lastname']. ", ". $row['firstname']." ".
                                                    $row['middlename']; ?></td>
                                                <td><?= $row['service']; ?></td>

                                                <td>
                                                    <a href="" data-target="#edit<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs
                                                    btn-warning" style="margin-top: -5px"><i class="icon-pencil"
                                                                                             style="color: black;"></i> </a>
                                                    <a href="" data-target="#delete<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs  btn-danger" style="margin-top: -5px"><i class="icon-trash"
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


    <aside class="aside-menu">
        <div class="aside-header bg-theme text-uppercase">Service Panel</div>
        <div class="aside-body">
            <h6 class="text-theme">Light Sidebar</h6>
            <ul class="theme-colors">
                <li class="theme-blue" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-blue.css')"></li>
                <li class="theme-green" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-green.css')"></li>
                <li class="theme-red" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-red.css')"></li>
                <li class="theme-yellow" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-yellow.css')"></li>
                <li class="theme-orange" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-orange.css')"></li>
                <li class="theme-teal" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-teal.css')"></li>
                <li class="theme-cyan" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-cyan.css')"></li>
                <li class="theme-purple" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-purple.css')"></li>
                <li class="theme-indigo" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-indigo.css')"></li>
                <li class="theme-pink" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-pink.css')"></li>
            </ul>

            <!-- <h6 class="text-theme">Social Colors</h6> -->
            <ul class="theme-colors">
                <li class="theme-facebook" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-facebook.css')"></li>
                <li class="theme-twitter" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-twitter.css')"></li>
                <li class="theme-linkedin" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-linkedin.css')"></li>
                <li class="theme-google-plus" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-google-plus.css')"></li>
                <li class="theme-flickr" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-flickr.css')"></li>
                <li class="theme-tumblr" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-tumblr.css')"></li>
                <li class="theme-xing" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-xing.css')"></li>
                <li class="theme-github" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-github.css')"></li>
                <li class="theme-html5" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-html5.css')"></li>
                <li class="theme-openid" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-openid.css')"></li>
                <li class="theme-stack-overflow" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-stack-overflow.css')"></li>
                <li class="theme-css3" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-css3.css')"></li>
                <li class="theme-dribbble" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-dribbble.css')"></li>
                <li class="theme-instagram" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-instagram.css')"></li>
                <li class="theme-pinterest" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-pinterest.css')"></li>
                <li class="theme-vk" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-vk.css')"></li>
                <li class="theme-yahoo" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-yahoo.css')"></li>
                <li class="theme-behance" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-behance.css')"></li>
                <li class="theme-dropbox" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-dropbox.css')"></li>
                <li class="theme-reddit" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-reddit.css')"></li>
                <li class="theme-spotify" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-spotify.css')"></li>
                <li class="theme-vine" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-vine.css')"></li>
                <li class="theme-foursquare" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-foursquare.css')"></li>
                <li class="theme-vimeo" onclick="swapStyleSheet('<?= $CSS_PATH; ?>css/style-vimeo.css')"></li>

            </ul>

            <h6 class="text-theme">Dark Sidebar</h6>
            <ul class="theme-colors">
                <li class="theme-blue" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-blue.css')"></li>
                <li class="theme-green" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-green.css')"></li>
                <li class="theme-red" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-red.css')"></li>
                <li class="theme-yellow" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-yellow.css')"></li>
                <li class="theme-orange" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-orange.css')"></li>
                <li class="theme-teal" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-teal.css')"></li>
                <li class="theme-cyan" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-cyan.css')"></li>
                <li class="theme-purple" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-purple.css')"></li>
                <li class="theme-indigo" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-indigo.css')"></li>
                <li class="theme-pink" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-pink.css')"></li>
            </ul>

            <!-- <h6 class="text-theme">Social Colors</h6> -->
            <ul class="theme-colors">
                <li class="theme-facebook" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-facebook.css')"></li>
                <li class="theme-twitter" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-twitter.css')"></li>
                <li class="theme-linkedin" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-linkedin.css')"></li>
                <li class="theme-google-plus" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-google-plus.css')"></li>
                <li class="theme-flickr" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-flickr.css')"></li>
                <li class="theme-tumblr" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-tumblr.css')"></li>
                <li class="theme-xing" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-xing.css')"></li>
                <li class="theme-github" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-github.css')"></li>
                <li class="theme-html5" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-html5.css')"></li>
                <li class="theme-openid" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-openid.css')"></li>
                <li class="theme-stack-overflow" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-stack-overflow.css')"></li>
                <li class="theme-css3" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-css3.css')"></li>
                <li class="theme-dribbble" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-dribbble.css')"></li>
                <li class="theme-instagram" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-instagram.css')"></li>
                <li class="theme-pinterest" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-pinterest.css')"></li>
                <li class="theme-vk" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-vk.css')"></li>
                <li class="theme-yahoo" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-yahoo.css')"></li>
                <li class="theme-behance" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-behance.css')"></li>
                <li class="theme-dropbox" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-dropbox.css')"></li>
                <li class="theme-reddit" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-reddit.css')"></li>
                <li class="theme-spotify" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-spotify.css')"></li>
                <li class="theme-vine" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-vine.css')"></li>
                <li class="theme-foursquare" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-foursquare.css')"></li>
                <li class="theme-vimeo" onclick="swapStyleSheetDark('<?= $CSS_PATH; ?>css/style-vimeo.css')"></li>

            </ul>
        </div>

    </aside>
    <!-- end aside -->

</div>
<!-- end app-body -->

<footer class="app-footer">
    <a href="#" class="text-theme"><?= $APP_NAME; ?></a>
</footer>
<!-- live example model -->
<?php
$value = db_select_order('tbl_company_users', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="changePassword<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Change Password</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="validationCustom05">Old Password</label>
                                <input type="password" class="form-control" id="validationCustom05"
                                       placeholder="Old Password"
                                       required="" name="pwold" />
                                <div class="invalid-feedback">
                                    Please provide a valid password.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">New Password</label>
                                <input type="password" class="form-control" id="validationCustom05"
                                       placeholder="New Password"
                                       required="" name="pwnew" />
                                <div class="invalid-feedback">
                                    Please provide a valid password.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="passwordChange">Save
                                changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }}?>
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Assign New Services</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="validationCustom05">Services</label>
                        <select name="service" class="form-control">
                            <?php
                            $value = db_select_order('tbl_services', 'id', 'DESC');
                            if($value->rowCount()>0)
                            {
                                while($row=$value->fetch(PDO::FETCH_ASSOC))
                                {
                                    $id = $row['id'];
                                    ?>
                                    <option value="<?= $row['title']; ?>"><?= $row['title']; ?></option>
                                <?php }} ?>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid services.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Name</label>
                        <select name="name" class="form-control">
                            <?php
                            $value = custom_query("SELECT * FROM tbl_company_users WHERE role='Tech' AND company_name = '$company_name'");
                            if($value->rowCount()>0)
                            {
                                while($row=$value->fetch(PDO::FETCH_ASSOC))
                                {
                                    $id = $row['id'];
                                    ?>
                                    <option value="<?= $row['lastname']. ", ". $row['firstname']." ".
                                    $row['middlename']; ?>"><?= $row['lastname']. ", ". $row['firstname']." ".
                                        $row['middlename']; ?></option>
                                <?php }} ?>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid services.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
$value = db_select_order('tbl_services', 'id', 'DESC');
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
                        <h6 class="modal-title">Edit Record</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="validationCustom05">Services Title</label>
                                <input type="text" class="form-control" id="validationCustom05" placeholder="Service Title"
                                       required="" name="title" value="<?= $row['title']; ?>" />
                                <div class="invalid-feedback">
                                    Please provide a valid title.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Description</label>
                                <textarea class="form-control" id="validationCustom05" placeholder="Description"
                                          required="" name="description"><?= $row['description']; ?></textarea>
                                <div class="invalid-feedback">
                                    Please provide a valid description.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Category</label>
                                <select name="category" class="form-control">
                                    <?php
                                    $value = db_select('tbl_category');
                                    if($value->rowCount()>0)
                                    {
                                        while($row=$value->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $row['id'];
                                            ?>
                                            <option value="<?= $row['title']; ?>"><?= $row['title']; ?></option>
                                        <?php }} ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid category.
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
$value = db_select_order('tbl_services', 'id', 'DESC');
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
<script src="<?= $CSS_PATH; ?>libs/tables-datatables/dist/datatables.min.js"></script>
<!--select 2 -->
<script src="<?= $CSS_PATH; ?>libs/select2/dist/js/select2.min.js"></script>

<!-- bootstrap tags input -->
<script src="<?= $CSS_PATH; ?>libs/bootstrap-tagsinput/dist/tagsinput.js"></script>

<!-- multiselect -->
<script src="<?= $CSS_PATH; ?>libs/multiselect/js/jquery.multi-select.js"></script>

<!-- typeahead -->
<script src="<?= $CSS_PATH; ?>libs/typeahead/typeahead.js"></script>

<!-- max-length -->
<script src="<?= $CSS_PATH; ?>libs/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>

<!-- bootstrap touchspin -->
<script src="<?= $CSS_PATH; ?>libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

<!-- clockpicker -->
<script src="<?= $CSS_PATH; ?>libs/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

<!-- timepicker -->
<script src="<?= $CSS_PATH; ?>libs/timepicker/dist/jquery.timepicker.min.js"></script>

<!-- datepicker -->
<script src="<?= $CSS_PATH; ?>libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- slider-range -->
<script src="<?= $CSS_PATH; ?>libs/sliderrange/dist/jquery-asRange.min.js"></script>

<!-- jquery-strength -->
<script src="<?= $CSS_PATH; ?>libs/jquery-strength/dist/password_strength.js"></script>
<script src="<?= $CSS_PATH; ?>libs/jquery-strength/dist/jquery-strength.js"></script>

<!-- jquery-knob -->
<script src="<?= $CSS_PATH; ?>libs/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- jquery-labelauty -->
<script src="<?= $CSS_PATH; ?>libs/jquery-labelauty/source/jquery-labelauty.js"></script>
<!--toastr -->
<script src="<?= $CSS_PATH; ?>libs/toastr/toastr.min.js"></script>
<!-- toastr example script -->
<script src="<?= $CSS_PATH; ?>js/toastr-example.js"></script>
<!-- bootstrap form validation -->
<script src="<?= $CSS_PATH; ?>js/bootstrap-form-validation.js"></script>
<!-- dashboard-pm -example -->
<script src="<?= $CSS_PATH; ?>js/dashboard-pm-example.js"></script>
<!--datatables -->

<!--formatter js -->
<script src="<?= $CSS_PATH; ?>libs/form-masks/dist/formatter.min.js"></script>
<!-- octadmin Main Script -->
<script src="<?= $CSS_PATH; ?>js/app.js"></script>

<!-- datatable examples -->
<script src="<?= $CSS_PATH; ?>js/table-datatable-example.js"></script>
<!-- formmasks-example -->
<script src="<?= $CSS_PATH; ?>js/form-masks-example.js"></script>

<script src="<?= $CSS_PATH; ?>js/form-plugins-example.js"></script>
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