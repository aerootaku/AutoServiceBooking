<?php
include '../../controller/action.php';

$value = db_select_whereCustom('tbl_booking', $data = array("status"=>"Accepted",
    "tech_id"=>$_SESSION['id']));
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {

        ?>
        <div class="col-md-6">
            <div class="card card-accent-theme">
                <div class="card-body">
                    <h4 class="text-theme" style="color: darkgreen; text-align: center"> Ongoing
                        Booking</h4>
                    <hr />
                    <h6>Customer Name: <strong><?= $row['customer_firstname']. " ". $row['customer_lastname'];
                            ?></strong></h6>
                    <span>
                                            Image Attached <br />
                                            <img src="<?= $row['attachment']; ?>" class="img img-responsive
                                        img-edited"/>
                                        </span><br />
                    <span>Service Type: <strong><?= $row['service_type']; ?></strong></span><br />
                    <span>Service Fee: <strong><?= $row['fee']; ?></strong></span><br />
                    <span>Estimated Arrival Time: <strong> <?= $row['est_time']; ?></strong></span><br />
                    <span>Status: <strong> Ongoing</strong></span><br />
                    <br />
                    <div align="center">
                        <div class="loader" align="center"></div>
                        <p style="text-align: center;">Service in progress</p>
                    </div>
                    <div class="form-group">
                        <a href="chat.php?booking_id=<?= $row['booking_id']; ?>&customer_id=<?=
                        $row['customer_id']; ?>&tech_id=<?= $row['tech_id']; ?>"
                           class="btn btn-outlined btn-block btn-success
                                btn-round">Chat</a>
                    </div>

                </div>
                <!-- end-card-body -->
            </div>
            <!-- end card -->
        </div>
    <?php }} else {
    ?>
    <div class="col-md-6">
        <div class="card card-accent-theme">
            <div class="card-body">
                <h4 class="text-theme" style="color:#1681ff; text-align: center"> Hi! <?=
                    $_SESSION['firstname'] . " ". $_SESSION['lastname']; ?></h4>
                <hr />
                <img src="<?= $CSS_PATH; ?>img/sad.png" class="img img-edited img-responsive" />
                <br /><br />
                <h6 style="text-align: center;">We're Sorry but there isn't any booking for you
                    at the moment. Please wait till we made it possible for you
                </h6>
                <br />

            </div>
            <!-- end-card-body -->
        </div>
        <!-- end card -->
    </div>
    <?php
} ?>