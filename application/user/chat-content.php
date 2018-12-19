<?php
include '../../system/config.php';
include '../../system/constant.php';
?>
<ul id="chatList">
        <?php
        $_SESSION['booking_id'] = $_GET['booking_id'];
        $_SESSION['customer_id'] = $_GET['customer_id'];
        $_SESSION['tech_id'] = $_GET['tech_id'];
        $booking_id = $_SESSION['booking_id'];
        $customer_id = $_SESSION['customer_id'];
        $tech_id = $_SESSION['tech_id'];
        $value = custom_query("SELECT * FROM (SELECT * FROM tbl_chat WHERE booking_id = '$booking_id' AND customer_id = '$customer_id' AND 
tech_id = 
'$tech_id' ORDER BY id DESC LIMIT 5) as ch ORDER BY id ASC");
        if($value->rowCount()>0)
        {
            while($row=$value->fetch(PDO::FETCH_ASSOC))
            {
                $class = $row['class'];
                if($class == 'User'){ $type = 'you'; }
                else{ $type='other'; }
                ?>
                <li class='<?= $type; ?>'>
                    <div class="date">
                        <?= $row['dtcreated']; ?>
                    </div>
                    <div class="message">
                        <p>
                            <?= $row['text']; ?>
                        </p>
                    </div>
                </li>
            <?php }} ?>
<!-- end chat -->
</ul>
