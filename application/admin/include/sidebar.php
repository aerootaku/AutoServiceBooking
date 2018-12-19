<div class="sidebar" id="sidebar">
            <nav class="sidebar-nav" id="sidebar-nav-scroller">
                <ul class="nav">
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link" href="dashboard.php">
                            <i class="mdi mdi-gauge"></i> Dashboard </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="mdi mdi-file-presentation-box"></i> Reservation
                            <?php
                            $xid = $_SESSION['company_name'];
                            $value1 = custom_query("SELECT * FROM tbl_reservation WHERE company_name = '$xid' AND status = 'Pending'");
                            if($value1->rowCount()>0)
                            {
                                ?>
                                <span class="badge badge-main badge-boxed badge-danger">New</span>
                            <?php } ?>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="reservation.php"> Pending Reservation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reservation-finish.php"> Finished Reservation</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-title">Management</li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="mdi mdi-account-circle"></i> User Management</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="management-admin.php"> Manage Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="management-user.php"> Manage Technician</a>
                            </li>
                         </ul>

                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="mdi mdi-account-circle"></i> Services</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="management-services.php"> Manage Services</a>
                            </li>
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="management-category.php"> Manage Category</a>-->
<!--                            </li>-->
                        </ul>

                    </li>
                    <li class="divider"></li>
                    <li class="nav-title">
                        Others
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="mdi mdi-account-circle"></i> Tools</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="tools-tech-logs.php"> Technician Transaction Logs</a>
                            </li>
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="tools-user-logs.php"> User Logs</a>-->
<!--                            </li>-->
                        </ul>

                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="mdi mdi-account-circle"></i> Feedback</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="feedback-tech-rating.php"> Technician Rating & Feedback</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="feedback-user.php"> User Feedback & Concern</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </nav>

        </div>