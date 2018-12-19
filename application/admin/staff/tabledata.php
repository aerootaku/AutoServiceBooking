<?php
/**
 * Created by PhpStorm.
 * User: Kio
 * Date: 4/7/2018
 * Time: 4:03 PM
 */


include '../../controller/action.php';
include 'session.php';
$company_name = $_SESSION['company_name'];
?>
<?php
$value = custom_query("SELECT * FROM tbl_booking WHERE company_name ='$company_name' and status='Pending'");
if($value->rowCount()>0)
{
    ?>
<table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Customer Contact #</th>
                                        <th>Customer Email</th>
                                        <th>Service Type</th>
                                        <th>Attachment</th>
                                        <th>Assigned Technician</th>
                                        <th>Booking Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Customer Contact #</th>
                                        <th>Customer Email</th>
                                        <th>Service Type</th>
                                        <th>Attachment</th>
                                        <th>Assigned Technician</th>
                                        <th>Booking Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
<?php
                                        while($row=$value->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $row['id'];
                                            ?>
                                            <tr>
                                                <td><?= $row['customer_lastname'].", ". $row['customer_firstname']; ?></td>
                                                <td><?= $row['customer_contact']; ?></td>
                                                <td><?= $row['customer_email']; ?></td>
                                                <td><?= $row['service_type']; ?></td>
                                                <td><a href="<?= $row['attachment']; ?>">Attachment</a> </td>
                                                <td><?= $row['tech_lastname'].", ". $row['tech_firstname']; ?></td>
                                                <td><?= $row['status']; ?></td>
                                                <td>
                                                    <a href="" data-target="#view<?= $id; ?>" data-toggle="modal"
                                                       class="btn
                                                    btn-sm
                                                    btn-info" style="margin-top: -5px"><i class="icon-eye"
                                                                                             style="color: white;
" title="View" ></i> </a>
                                                    <a href="" data-target="#accept<?= $id; ?>" data-toggle="modal"
                                                       class="btn
                                                    btn-sm
                                                    btn-success" style="margin-top: -5px"><i class="icon-check"
                                                                                             style="color: white;" title="Accept"></i>
                                                    </a>
                                                    <a href="" data-target="#decline<?= $id; ?>" data-toggle="modal"
                                                       class="btn
                                                    btn-sm
                                                    btn-danger" style="margin-top: -5px"><i class="icon-close"
                                                                                             style="color:
                                                                                            white;" title="Decline"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }}  else {

                                        echo "<p style='color:red'>NO AVAILABLE BOOKING RIGHT NOW</p>";
                                    } ?>
</tbody>
</table>
