<?php if(isset($_POST['profileChange'])){

    $id = $_GET['id'];
    $query = db_update('tbl_company_users', $data = array("firstname"=>$_POST['firstname'], "middlename"=>$_POST['middlename'], "lastname"=>$_POST['lastname'],
        "email"=>$_POST['email'], "contact"=>$_POST['contact'], "birthday"=>$_POST['birthday'], "address"=>$_POST['address']), $where = array("id"=>$id));

}
if(isset($_POST['passwordChange'])){
    $pwold = $_POST['pwold'];
    $password = $_POST['pwnew'];
    $id = $_GET['id'];

    if(password_verify($pwold, $_SESSION['declared'])){
        $new_password = password_hash($password, PASSWORD_DEFAULT);
        $query = db_update('tbl_company_users', $data = array('password'=>$new_password), $where = array("id"=>$id));
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

<?php
$value = db_select_order('tbl_company_users', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="changeProfile<?= $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Change Profile</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="validationCustom05">First Name</label>
                                <input type="text" class="form-control" id="validationCustom05"
                                       placeholder="Enter Firstname" value="<?= $row['firstname']; ?>"
                                       required="" name="firstname" />
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Middle Name</label>
                                <input type="text" class="form-control" id="validationCustom05"
                                       placeholder="Enter Middlename" value="<?= $row['middlename']; ?>"
                                       required="" name="middlename" />
                                <div class="invalid-feedback">
                                    Please provide a valid entry.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Last Name</label>
                                <input type="text" class="form-control" id="validationCustom05"
                                       placeholder="Enter Last name" value="<?= $row['lastname']; ?>"
                                       required="" name="lastname" />
                                <div class="invalid-feedback">
                                    Please provide a valid entry.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Email</label>
                                <input type="email" class="form-control" id="validationCustom05"
                                       placeholder="Enter Email" value="<?= $row['email']; ?>"
                                       required="" name="email" />
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Contact</label>
                                <input type="text" class="form-control" id="validationCustom05"
                                       placeholder="Contact" value="<?= $row['contact']; ?>"
                                       required="" name="contact" />
                                <div class="invalid-feedback">
                                    Please provide a valid text.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Birthday</label>
                                <input type="date" class="form-control" id="validationCustom05"
                                       placeholder="Birthday" value="<?= $row['birthday']; ?>"
                                       required="" name="birthday" />
                                <div class="invalid-feedback">
                                    Please provide a valid date.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Address</label>
                                <textarea class="form-control" id="validationCustom05"
                                          placeholder="Address" required="" name="address"><?= $row['address'];
                                    ?></textarea>
                                <div class="invalid-feedback">
                                    Please provide a valid address.
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="profileChange">Save
                                changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }}?>  <!-- edit profile -->