<?php
include '../../controller/action.php';
$value = db_select_whereCustom('tbl_booking', $data = array("status"=>"Pending",
    "customer_id"=>$_SESSION['id']));
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {

        ?>
        <div class="col-md-6">
            <div class="card card-accent-theme">
                <div class="card-body">
                    <h4 class="text-theme" style="color:red; text-align: center"> Waiting to Accept</h4>
                    <hr />
                    <h5>Company Name: <strong><?= $row['company_name']; ?></strong></h5>
                    <span>Service Type: <strong><?= $row['service_type']; ?></strong></span><br />
                    <span>Service Fee: <strong><?= $row['fee']; ?></strong></span><br />
                    <span>Assigned Technician: <strong> Pending</strong></span><br />
                    <span>Estimated Arrival Time: <strong> Pending</strong></span><br />
                    <span>Status: <strong> Pending</strong></span><br />
                    <br />
                    <div align="center">
                        <div class="loader" align="center"></div>
                        <p style="text-align: center;"> Please Wait</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline btn-block btn-danger btn-round" data-toggle="modal" data-target="#cancel<?= $row['id']; ?>">Cancel</button>
                    </div>

                </div>
                <!-- end-card-body -->
            </div>
            <!-- end card -->
        </div>
    <?php }} else {
    $value1 = db_select_whereCustom('tbl_booking', $data = array("status"=>"Accepted",
        "customer_id"=>$_SESSION['id']));
    if($value1->rowCount()>0) {
        while($row1=$value1->fetch(PDO::FETCH_ASSOC))
        {

            ?>
            <div class="col-md-6">
                <div class="card card-accent-theme">
                    <div class="card-body">
                        <h4 class="text-theme" style="color:green; text-align: center"> Booking Accepted!</h4>
                        <hr />
                        <h5>Company Name: <strong><?= $row1['company_name']; ?></strong></h5>
                        <span>Service Type: <strong><?= $row1['service_type']; ?></strong></span><br />
                        <span>Service Fee: <strong><?= $row1['fee']; ?></strong></span><br />
                        <span>Assigned Technician: <strong> <?= $row1['tech_firstname'] ." ". $row1['tech_lastname'];
                        ?></strong></span><br />
                        <span>Estimated Arrival Time: <strong> <?= $row1['est_time']; ?></strong></span><br />
                        <span>Status: <strong> <?= $row1['status']; ?></strong></span><br />
                        <br />
                        <div align="center">
                            <div class="form-group">
                                <a href="chat.php?booking_id=<?= $row1['booking_id']; ?>&customer_id=<?= $row1['customer_id']; ?>&tech_id=<?= $row1['tech_id']; ?>"
                                class="btn btn-outlined btn-block btn-success
                                btn-round">Chat</a>
                                <button type="submit" class="btn btn-outlined btn-block btn-secondary btn-round"
                                        data-toggle="modal" data-target="#rate<?= $row1['id']; ?>"
                                        >Job Done</button>
                            </div>
                        </div>


                    </div>
                    <!-- end-card-body -->
                </div>
                <!-- end card -->
            </div>
        <?php }}
    } ?>
