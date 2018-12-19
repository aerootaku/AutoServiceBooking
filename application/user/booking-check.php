<?php
/**
 * Created by PhpStorm.
 * User: Kio
 * Date: 4/9/2018
 * Time: 11:51 PM
 */
$check =  isExists('tbl_booking', $data = array("status"=>"Pending", "customer_id"=>$_SESSION['id']));
if($check == 1) {
     $_SESSION['booked'] = 'True';
}
else {
    $check1 =  isExists('tbl_booking', $data = array("status"=>"Accepted", "customer_id"=>$_SESSION['id']));
     if($check1 == 1){
          $_SESSION['booked'] = 'Accepted';
     }
     else {
         $_SESSION['booked'] = '';
     }
}
