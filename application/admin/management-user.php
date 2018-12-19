<?php

include '../../controller/action.php';
include 'session.php';
$company_name = $_SESSION['company_name'];
if(isset($_POST['create'])){
    $filetmp = $_FILES["profile"]["tmp_name"];
    $filename = $_FILES["profile"]["name"];
    $filepath = $_FILES["profile"]["type"];
    $profile  = "../../uploads/".$filename;
    move_uploaded_file($filetmp,$profile);
    $exp = "";
    $new_password = password_hash("welcome123", PASSWORD_DEFAULT);
    foreach ($_POST['expertise'] as $key=>$value){
        $exp .= $value . ",";
    }
     $expertise = substr($exp, 0, -1);
//    exit();
    $data = array("profile"=>$profile,
        "username"=>$_POST['username'],
        "password"=>$new_password,
        "firstname"=>$_POST['firstname'],
        "middlename"=>$_POST['middlename'],
        "lastname"=>$_POST['lastname'],
        "birthday"=>$_POST['birthday'],
        "gender"=>$_POST['gender'],
        "address"=>$_POST['address'],
        "contact"=>$_POST['contact'],
        "email"=>$_POST['email'],
        "company_name"=>$_SESSION['company_name'],
        "role"=>$_POST['role'],
        "expertise"=>$expertise
    );
    $query = db_insert('tbl_company_users', $data);
    if(isset($query)){

        $action->redirect('management-user.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }

}

if(isset($_POST['edit'])){
    $id = $_GET['id'];
    $data = array(
        "firstname"=>$_POST['firstname'],
        "middlename"=>$_POST['middlename'],
        "lastname"=>$_POST['lastname'],
        "birthday"=>$_POST['birthday'],
        "address"=>$_POST['address'],
        "contact"=>$_POST['contact'],
        "email"=>$_POST['email']
    );
    $where = array("id"=>$id);
    $query = db_update('tbl_company_users', $data, $where);
    if(isset($query)){
        $action->redirect('management-user.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }
}


if(isset($_POST['assign'])){
    $id = $_GET['id'];
    $data = array(
        "isOnline"=>"Online"
    );
    $where = array("id"=>$id);
    $query = db_update('tbl_company_users', $data, $where);
    if(isset($query)){
        $action->redirect('management-user.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }
}
if(isset($_POST['offline'])){
    $id = $_GET['id'];
    $data = array(
        "isOnline"=>"Offline"
    );
    $where = array("id"=>$id);
    $query = db_update('tbl_company_users', $data, $where);
    if(isset($query)){
        $action->redirect('management-user.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }
}
if(isset($_POST['delete'])){
    $id = $_GET['id'];
    $data = array("id"=>$id);
    $query = db_delete('tbl_company_users', $data);
    if(isset($query)){

        $action->redirect('management-user.php?Success');
    }
    else{
        $error = "There was an error in your action";
    }

}


if(isset($_POST['assignService'])){
    $id = $_GET['id'];
    $data = array(
        "service"=>$_POST['services']
    );
    $where = array("id"=>$id);
    $query = db_update('tbl_company_users', $data, $where);
    if(isset($query)){
        $action->redirect('management-user.php?Success');
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
                                <h4 class="text-theme">TECHNICIAN MANAGEMENT</h4>
                                    <button type="button" data-toggle="modal" data-target="#add" class="btn
                                            btn-dark" title="Create new technician">Create New</button>
                                <a href="management-user-online.php" class="btn
                                            btn-warning" title="Create new technician">Online Technician</a>
                                <a href="management-user-offline.php" class="btn
                                            btn-danger" title="Create new technician">Offline Technician</a>
                                    <br /><hr />

                                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                                    <thead>
                                    <tr
>                                        <th>Profile</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Full Name</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Expertise</th>
                                        <th>Availability</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Full Name</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Expertise</th>
                                        <th>Availability</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $value = custom_query("SELECT * FROM tbl_company_users WHERE company_name ='$company_name' and role ='Tech'");
                                    if($value->rowCount()>0)
                                    {
                                        while($row=$value->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $row['id'];
                                            ?>
                                            <tr>
                                                <td><img src="<?= $row['profile']; ?>" class="img img-thumbnail" /> </td>
                                                <td><?php custom_echo($row['username'], 10)  ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['role']; ?></td>
                                                <td><?= $row['lastname'].", ". $row['firstname']; ?></td>
                                                <td><?= $row['birthday']; ?></td>
                                                <td><?= $row['gender']; ?></td>
                                                <td><?php custom_echo($row['address'], 10) ; ?></td>
                                                <td><?= $row['expertise']; ?></td>
                                                <td><?= $row['isOnline']; ?></td>
                                                <td>

                                                        <a href="" data-target="#assign1<?= $id; ?>"
                                                           data-toggle="modal" class="btn
                                                                    btn-xs  btn-info" style="margin-top: -5px" title="Mark as Active" ><i class="icon-settings"
                                                          style="color: white;"></i>
                                                        </a>
                                                    <a href="" data-target="#offline<?= $id; ?>"
                                                       data-toggle="modal" class="btn
                                                                    btn-xs  btn-danger" style="margin-top: -5px" title="Mark as Absent" ><i class="icon-settings"
                                                          style="color: white;"></i>
                                                    </a>
                                                    <!--
                                                    <a href="" data-target="#assign<?= $id; ?>"
                                                       data-toggle="modal" class="btn
                                                                    btn-xs  btn-info" style="margin-top: -5px"><i class="icon-flag"
                                                                  title="Assign"                                                style="color: white;"></i>
                                                    </a>
                                                -->
                                                    <a href="" data-target="#edit<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs
                                                    btn-warning" style="margin-top: -5px" title="Edit Record" ><i class="icon-pencil"
                                                                                             style="color: black;"></i> </a>
                                                    <a href="" data-target="#delete<?= $id; ?>" data-toggle="modal" class="btn
                                                    btn-xs  btn-danger" style="margin-top: -5px" title="Delete Record"><i class="icon-trash"
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
<?php
$value = db_select_order('tbl_company_users', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="assign<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Assign Services</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="validationCustom05">Service</label>
                                <select name="services" class="form-control">
                                    <?php
                                    $comp = $_SESSION['company_name'];
                                    $value1 = custom_query("SELECT * FROM tbl_services WHERE company_name = '$comp'");
                                    if($value1->rowCount()>0)
                                    {
                                        while($row1=$value1->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $row1['id'];
                                            ?>
                                            <option value="<?= $row1['title']; ?>"><?= $row1['title']; ?></option>
                                        <?php }} ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid services.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="assignService">Save
                                changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }}?>
<?php
$value = db_select_order('tbl_company_users', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="offline<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Absent Technician</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <p>Mark this technician as absent?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary" name="offline">Yes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }}?>
<?php
$value = db_select_order('tbl_company_users', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="assign1<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Present Technician</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <p>Mark this technician as active?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary" name="assign">Yes</button>
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
                <h6 class="modal-title">Create New Record</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="validationCustom05">User Profile</label>
                        <input type="file" class="form-control" id="validationCustom05" placeholder="profile"
                               required="" name="profile" />
                        <div class="invalid-feedback">
                            Please provide a valid file.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Username</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Username"
                               required="" name="username" />
                        <span class="">
                            Auto password: welcome123
                        </span>
                        <div class="invalid-feedback">
                            Please provide a valid username.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Email</label>
                        <input type="email" class="form-control" id="validationCustom05" placeholder="Email"
                               required="" name="email" />
                        <div class="invalid-feedback">
                            Please provide a valid email.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">First Name</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="First Name"
                               required="" name="firstname" />
                        <div class="invalid-feedback">
                            Please provide a valid name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Middle Name</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Middle Name"
                               required="" name="middlename" />
                        <div class="invalid-feedback">
                            Please provide a valid name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Last Name</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Last Name"
                               required="" name="lastname" />
                        <div class="invalid-feedback">
                            Please provide a valid name.
                        </div>
                    </div
>                    <div class="form-group">
                        <label for="validationCustom05">Birthday</label>
                        <input type="date" class="form-control" id="validationCustom05" placeholder="birthday"
                               required="" name="birthday" />
                        <div class="invalid-feedback">
                            Please provide a valid name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Gender</label>
                        <select name="gender" class="form-control" id="validationCustom05">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid description.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Company Address</label>
                        <textarea class="form-control" id="validationCustom05"
                               placeholder="Address"
                                  required="" name="address"></textarea>
                        <div class="invalid-feedback">
                            Please provide a valid address.
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="validationCustom05">Role</label>
                        <select name="role" class="form-control" id="validationCustom05">
                            <option value="Tech">Technician</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid description.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Mobile Number</label>
                        <input type="text" onkeypress="enterNumber()" class="form-control" id="inputPhone2" placeholder="Mobile Number"
                              value="+639" pattern="12,13" maxlength="13"  name="contact" required=" " />
                        <div class="invalid-feedback">
                            Please provide a valid contact number.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Expertise</label>
                        <select name="expertise[]" class="form-control" multiple>
                            <option value="Tires">Tires</option>
                            <option value="Over Hauling">Over Hauling</option>
                            <option value="Change Oil">Change Oil</option>
                            <option value="Tune Up">Tune Up</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid expertise.
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
$value = db_select_order('tbl_company_users', 'id', 'DESC');
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
                                <label for="validationCustom05">Email</label>
                                <input type="email" class="form-control" id="validationCustom05" placeholder="Email"
                                       required="" name="email" value="<?= $row['email']; ?>" />
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">First Name</label>
                                <input type="text" class="form-control" id="validationCustom05" placeholder="First Name"
                                       required="" name="firstname" value="<?= $row['firstname']; ?>" />
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Middle Name</label>
                                <input type="text" class="form-control" id="validationCustom05" placeholder="Middle Name"
                                       required="" name="middlename" value="<?= $row['middlename']; ?>" />
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Last Name</label>
                                <input type="text" class="form-control" id="validationCustom05" placeholder="Last Name"
                                       required="" name="lastname" value="<?= $row['lastname']; ?>" />
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Birthday</label>
                                <input type="date" class="form-control" id="validationCustom05" placeholder="birthday"
                                       required="" name="birthday" value="<?= $row['birthday']; ?>" />
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Company Address</label>
                                <textarea class="form-control" id="validationCustom05"
                                          placeholder="Address"
                                          required="" name="address"><?= $row['address']; ?></textarea>
                                <div class="invalid-feedback">
                                    Please provide a valid address.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Mobile Number</label>
                                <input type="text" class="form-control" id="inputPhone2" placeholder="Mobile Number"
                                       required="" name="contact" value="<?= $row['contact']; ?>"   />
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
$value = db_select_order('tbl_company_users', 'id', 'DESC');
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