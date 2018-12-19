<?php

include '../../controller/action.php';
include 'session.php';

if(isset($_POST['create'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = utf8_encode($_POST['address']);
    $phone = $_POST['phone'];
    $contact = $_POST['contact'];
    $filetmp = $_FILES["logo"]["tmp_name"];
    $filename = $_FILES["logo"]["name"];
    $filepath = $_FILES["logo"]["type"];
    $logo  = "../../uploads/".$filename;
    move_uploaded_file($filetmp,$logo);
    $data = array(
            "logo"=>$logo,
            "name"=>$name,
            "description"=>$description,
            "address"=>$address,
            "phone"=>$phone,
            "contact"=>$contact,
            "opening"=>$_POST['opening'],
            "closing"=>$_POST['closing']
            );
    $query = db_insert('tbl_company_info', $data);
    if(isset($query)){

        $action->redirect('dashboard.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }

}
if(isset($_POST['edit'])){
    $id = $_GET['id'];
    $data = array("name"=>$_POST['name'], "description"=>$_POST['description'], "address"=>$_POST['address'],
        "phone"=>$_POST['phone'], "contact"=>$_POST['contact']);
    $where = array("id"=>$id);
    $query = db_update('tbl_company_info', $data, $where);
    if(isset($query)){
        $action->redirect('dashboard.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }
}
if(isset($_POST['delete'])){
    $id = $_GET['id'];
    $data = array("id"=>$id);
    $query = db_delete('tbl_company_info', $data);
    if(isset($query)){

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
if(isset($_POST['createUser'])){
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data = array("company_name"=>$_POST['company_name'], "username"=>$_POST['username'], "password"=>$new_password, "Role"=>"Admin", "email"=>$_POST['email']);
    $query = db_insert('tbl_company_users', $data);
    if(isset($query)){
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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


</head>



<body class="app sidebar-closed aside-menu-off-canvas aside-menu-hidden header-fixed sidebar-hidden">
    <header class="app-header navbar">
        <div class="hamburger hamburger--arrowalt-r navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
        <!-- end hamburger -->
        <a class="navbar-brand" href="./dashboard-sales.html">
            <strong><?=  $APP_NAME; ?></strong>

        </a>

            <div class="hamburger hamburger--arrowalt-r navbar-toggler sidebar-toggler d-md-down-none mr-auto">
                <div class="">
                    <div class=""></div>
                </div>
            </div>
        <!-- end hamburger -->

        <!-- end navbar-search -->

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

        <div class="hamburger hamburger--arrowalt-r navbar-toggler aside-menu-toggler ">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <div class="app-body">


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
                                                <strong>Company Registered</strong>
                                            </div>
                                            <small class="text-white"></small>
                                        </div>

                                        <div class="float-right">
                                            <button type="button" data-toggle="modal" data-target="#add" class="btn
                                            btn-dark">Create Company</button>
                                            <button type="button" data-toggle="modal" data-target="#addUser"
                                                    class="btn btn-dark">Create Company User</button>
                                            <a href="users.php" class="btn btn-danger">Manage Users</a>
                                            <a href="dashboard.php" class="btn btn-warning">Manage Company</a>
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
                                                        <div class="h2 text-white"><?= $count= db_count_all('tbl_company_info')
                                                            ?></div>
                                                        <small class="text-white">Registered Company</small>
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
                                                        <div class="h2 text-white"><?= $count= db_count_all('tbl_services')
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
                                                        <div class="h2 text-white"><?= $count = db_count_where('tbl_company_users', $data = array ("role"=>"tech"))
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
                                                        <div class="h2 text-white"><?= $count = db_count_all('tbl_users')
                                                            ?></div>
                                                        <small class="text-white">Registered User</small>
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
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-accent-theme">
                                <div class="card-body">
                                    <h4 class="text-theme">COMPANY INFO</h4>


                                    <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Company Description</th>
                                            <th>Company Address</th>
                                            <th>Phone Number</th>
                                            <th>Contact Number</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Company Description</th>
                                            <th>Company Address</th>
                                            <th>Phone Number</th>
                                            <th>Contact Number</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        $value = db_select_order('tbl_company_info', 'id', 'DESC');
                                        if($value->rowCount()>0)
                                        {
                                            while($row=$value->fetch(PDO::FETCH_ASSOC))
                                            {
                                                $id = $row['id'];
                                                ?>
                                                <tr>
                                                    <td><?= $row['name']; ?></td>
                                                    <td><?= $row['description']; ?></td>
                                                    <td><?= utf8_decode($row['address']); ?></td>
                                                    <td><?= $row['phone']; ?></td>
                                                    <td><?= $row['contact']; ?></td>
                                                    <td>
                                                        <a href="" data-target="#edit<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs
                                                    btn-warning" style="margin-top: -5px" title="Edit Record"><i class="icon-pencil"
                                                                                             style="color: black;"
                                                                                            ></i> </a>
                                                        <a href="" data-target="#delete<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs  btn-danger" style="margin-top: -5px" title="Delete Record" ><i class="icon-trash"
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
    $value = db_select_order('tbl_admin', 'id', 'DESC');
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
                    <h6 class="modal-title">Create New Company Record</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST" id="needs-validation" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="validationCustom05">Company Logo</label>
                        <input type="file" class="form-control" id="validationCustom05" placeholder="logo"
                               required="" name="logo" />
                        <div class="invalid-feedback">
                            Please provide a valid file.
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="validationCustom05">Company Name</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Company Name"
                                   required="" name="name" maxlength="50" />
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                        </div>
                    <div class="form-group">
                            <label for="validationCustom05">Company Description</label>
                            <input type="text" class="form-control" id="validationCustom05"
                                   placeholder="Company Description"
                                   required="" name="description" maxlength="255" />
                            <div class="invalid-feedback">
                                Please provide a valid description.
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="validationCustom05">Company Address</label>
                            <input type="text" class="form-control" id="validationCustom05"
                                   placeholder="Company Address"
                                   required="" name="address" maxlength= "120"/>
                            <div class="invalid-feedback">
                                Please provide a valid address.
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="validationCustom05">Telephone Number</label>
                            <input type="text" class="form-control" id="validationCustom05"
                                   placeholder="Telephone Number"
                                   required="" name="phone" value="(02) " maxlength="13" />
                            <div class="invalid-feedback">
                                Please provide a valid phone number.
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="validationCustom05">Mobile Number</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Mobile Number"
                                   required="" name="contact" value="+639" maxlength="13" />
                            <div class="invalid-feedback">
                                Please provide a valid contact number.
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Opening</label>
                        <input type="time" class="form-control" id="validationCustom05" placeholder="Mobile Number"
                               required="" name="opening" />
                        <div class="invalid-feedback">
                            Please provide a valid time.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Closing</label>
                        <input type="time" class="form-control" id="validationCustom05" placeholder="Mobile Number"
                               required="" name="closing" />
                        <div class="invalid-feedback">
                            Please provide a valid time.
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
    <div id="addUser" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Register Client Credentials</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="validationCustom05">Company Name</label>
                            <select name="company_name" class="form-control">
                                <?php
                                $value = db_select_order('tbl_company_info', 'id', 'DESC');
                                if($value->rowCount()>0)
                                {
                                    while($row=$value->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $id = $row['id'];
                                        ?>
                                        <option value="<?= $row['name']; ?>"><?= $row['name']; ?></option>
                                    <?php }} ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" class="form-control" id="username" name="email" required
                                   autocomplete="new-password" />
                            <div class="invalid-feedback">
                                Please provide a valid username.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required
                                   autocomplete="new-password" />
                            <div class="invalid-feedback">
                                Please provide a valid username.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   autocomplete="new-password" pattern=".{8,16}" maxlength="16" required/>
                            <div class="invalid-feedback">
                                Please provide a valid password.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="createUser">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php
    $value = db_select_order('tbl_company_info', 'id', 'DESC');
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
                    <h6 class="modal-title">EditCompany Record</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="validationCustom05">Company Name</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Company Name"
                                   required="" name="name" value="<?= $row['name']; ?>" />
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom05">Company Description</label>
                            <input type="text" class="form-control" id="validationCustom05"
                                   placeholder="Company Description"
                                   required="" name="description" value="<?= $row['description']; ?>" />
                            <div class="invalid-feedback">
                                Please provide a valid description.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom05">Company Address</label>
                            <input type="text" class="form-control" id="validationCustom05"
                                   placeholder="Company Address"
                                   required="" name="address" value="<?= utf8_decode($row['address']); ?>" />
                            <div class="invalid-feedback">
                                Please provide a valid address.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom05">Telephone Number</label>
                            <input type="text" class="form-control" id="validationCustom05"
                                   placeholder="Telephone Number"
                                   required="" name="phone" value="<?= $row['phone']; ?>" />
                            <div class="invalid-feedback">
                                Please provide a valid phone number.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom05">Mobile Number</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Mobile Number"
                                   required="" name="contact" value="<?= $row['contact']; ?>" />
                            <div class="invalid-feedback">
                                Please provide a valid contact number.
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
    $value = db_select_order('tbl_company_info', 'id', 'DESC');
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
                    <h6 class="modal-title">Delete <?= $row['name'];?> Record</h6>
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
</body>

</html>