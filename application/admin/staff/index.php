<?php

include '../../controller/action.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($action->loginOwner($username, $password)){
        //success
    }
    else {
        $error = "Invalid username / password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="AUTO SERVICE WEB APP" />
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
    <link id="pageStyle" rel="stylesheet" href="<?= $CSS_PATH; ?>css/style.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
    <section class="container-pages">
       
        <div class="brand-logo float-left"><a class="" href="#"> <?= $APP_NAME; ?></a></div>
              
        <div class="pages-tag-line text-white">  
            <div class="h4">Auto Service Web App!</div>
            <small>Delivering easy auto service in your home</small>
        </div>

        <div class="card pages-card col-lg-4 col-md-6 col-sm-6">
            <div class="card-body ">
                <div class="h4 text-center text-theme"><strong>Company Login</strong></div>
                <div class="small text-center text-dark"> Login to Account </div>
               
                    <form action="" method="post" id="needs-validation" novalidate="">
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
                                <span class="input-group-addon text-theme"><i class="fa fa-asterisk"></i></span>
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="Password" autocomplete="new-password" required />

                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <button type="submit" class="btn btn-theme login-btn" name="login">Login</button>
                        </div>
                    </form>
              
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </section>
    <!-- end section container -->
    <div class="half-circle"></div>
    <div class="small-circle"></div>

         <!-- end mybutton -->

    <div id="copyright"><a href="#">&copy; <?= $APP_NAME; ?> </div>
   
         <!-- Bootstrap and necessary plugins -->
    <script href="<?= $CSS_PATH; ?>libs/jquery/dist/jquery.min.js"></script>
    <script href="<?= $CSS_PATH; ?>libs/popper.js/dist/umd/popper.min.js"></script>
    <script href="<?= $CSS_PATH; ?>libs/bootstrap/bootstrap.min.js"></script>
    <script href="<?= $CSS_PATH; ?>libs/PACE/pace.min.js"></script>
    <script href="<?= $CSS_PATH; ?>libs/chart.js/dist/Chart.min.js"></script>
    <script href="<?= $CSS_PATH; ?>libs/nicescroll/jquery.nicescroll.min.js"></script>

    <script href="<?= $CSS_PATH; ?>libs/jquery-knob/dist/jquery.knob.min.js"></script>

        
    <!-- jquery-loading -->
    <script href="<?= $CSS_PATH; ?>libs/jquery-loading/dist/jquery.loading.min.js"></script>
    <!-- octadmin Main Script -->
    <script href="<?= $CSS_PATH; ?>js/app.js"></script>

    <!-- bootstrap form validation -->
    <script src="<?= $CSS_PATH; ?>js/bootstrap-form-validation.js"></script>


</body>

</html>