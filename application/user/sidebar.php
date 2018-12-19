<?php
/**
 * Created by PhpStorm.
 * User: Kio
 * Date: 4/10/2018
 * Time: 2:54 AM
 */

?>
<div class="sidebar" id="sidebar">
    <nav class="sidebar-nav" id="sidebar-nav-scroller">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="mdi mdi-home"></i> Booking </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="msg.php?readMSG">
                    <i class="mdi mdi-message"></i> Reservation Notification
                    <?php
                    $xid = $_SESSION['id'];
                    $value1 = custom_query("SELECT * FROM tbl_msg WHERE user_id = '$xid' AND status = 'Unread'");
                    if($value1->rowCount()>0)
                    {
                    ?>
                        <span class="badge badge-main badge-boxed badge-danger">New</span>
                    <?php } ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history.php">
                    <i class="mdi mdi-book"></i> Transaction History </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="inquiries.php">
                    <i class="mdi mdi-comment"></i> Feedback and Suggestions </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="mdi mdi-account-box"></i> Profile </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php?logout=true">
                    <i class="mdi mdi-exit-to-app"></i> Logout </a>
            </li>
        </ul>
    </nav>

</div>
