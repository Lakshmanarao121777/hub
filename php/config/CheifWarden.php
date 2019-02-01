<?php
function getDetfresh($table_name, $where, $col)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM $table_name $where";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $credit = $row["$col"];
        endwhile;
        if ($count >= 1) {
            return $credit;}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
function load_notice($table_name, $select, $start, $end)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table_name ORDER BY sno DESC LIMIT $start,$end";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            echo '
		        <div class="notice_box">
		          <div class="notice_img">

		              <img src="../../users/' . $row['regBy'] . '/' . $row['regBy'] . '.png">
		          </div>
		          <div class="notice_text">
		            <div class="notice_text_notice">' . $row['notice'] . '</div>';
            if ($row['att1'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att1']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if ($row['att2'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att2']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if ($row['att3'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att3']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if ($row['att4'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att4']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if ($row['att5'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att5']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if ($row['att6'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att6']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if ($row['att7'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att7']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if ($row['att8'] != "") {?><a href="../NoticeBoard/<?php echo $row['sno']; ?>/<?php echo $row['att8']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            echo '
		            <div class="border-double"></div>
		            <div class="notice_text_auth">From :' . $row['regBy'] . '</div>
		            <div class="notice_text_auth">Office :' . $row['office'] . '</div>
		            <div class="notice_text_auth">Date :' . $row['regDate'] . ' </div>
		          </div>
		        </div>';
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
function load_olms($table_name, $select, $start, $end, $where)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table_name where $where ORDER BY sno DESC LIMIT $start,$end";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $sno = $row['sno'];
            if ($row['status'] == "") {
                $status = "Pending";
            } else if ($row['status'] == "approved") {
            $status = "Permission Granted";
        } else if ($row['status'] == "rejected") {
            $status = "Permission Denied";
        } else if ($row['status'] == "chekedOut") {
            $status = "Your are out of campus";
        } else if ($row['status'] == "chekedIn") {
            $status = "Leave completed";
        } else if ($row['status'] == "Cancel") {
            $status = "Leave Canceled By Student";
        }

        echo '
          <div class="notice_box">
            <div class="notice_img">
              <img src="../../users/' . $row['userId'] . '/' . $row['userId'] . '.png">
            </div>
            <div class="notice_text">
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Journey Date : <span id="olms_fdate_' . $sno . '">' . $row['fdate'] . '</span> </div>
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Return Date : <span id="olms_rdate_' . $sno . '">' . $row['rdate'] . '</span> </div>
              <div class="notice_text_notice"  style="font-weight:600;padding:15 px;font-size:18px;">'.secure_de_input($row['title']).'</div>
              <div class="notice_text_notice" style="padding:10px;font-size:18px;">'.secure_de_input($row['reason']).'</div>';
              
        if ($row['att1'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att1']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att2'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att2']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att3'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att3']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att4'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att4']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a> 

          	<?php } echo'<div class="clear"></div>';
            if($row['gender']=="FEMALE"){
                  echo "<div class='clear'></div>";
                  echo "<h4><u>Parent Information</u></h4>";
                  echo'<div class="notice_text_auth">'.$row['ptype'].' : '.$row['pname'].' , '.$row['pmobile'].'</div>';
                  echo'<div class="notice_text_auth">'.$row['pauthtype'].' : '.$row['pauthid'].'</div>';
                }
        
        echo'<div class="clear"></div><br><span style="font-size:18px; font-weight:600;padding:10px;"> Leave Status : '.$status.'</span><div style="float:right;">';
        $sno = $row['sno'];
        if ($row['status'] == "") { ?>
            <button onclick="olms_action('<?php echo $sno ?>','approved')" class="btn btn-success"><span class="fa fa-check"></span> Approve </button>
            <button onclick="olms_action('<?php echo $sno ?>','rejected')" class="btn btn-danger"> <span class="fa fa-times"></span> Reject </button>
        <?php } echo'</div><div class="clear"></div><div class="border-double"></div>
              <div class="notice_text_auth">' . $row['userId'] . ',' . $row['userName'] . '</div>
              <div class="notice_text_auth">' . $row['Department'] . ',' . $row['currentYear'] . ',' . $row['currentClass'] . '</div>
              <div class="notice_text_auth">Date :' . $row['regDate'] . ' </div>
            </div>
          </div>';
        endwhile;
        if ($count == 0) {
            echo "<div class='notfound'>No Pending records Found.</div>";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
function load_olms_update($table_name, $setString)
{
    include "config.inc.php";
    try
    {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE $table_name  SET $setString ";
        $pdo->exec($sql);
        echo "Sucessfull";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
function load_olms_queryss($table_name, $select, $where)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table_name where $where ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $sno = $row['sno'];
            if ($row['status'] == "") {
                $status = "Pending";
            } else if ($row['status'] == "approved") {
            $status = "Permission Granted";
        } else if ($row['status'] == "rejected") {
            $status = "Permission Denied";
        } else if ($row['status'] == "chekedOut") {
            $status = "Your are out of campus";
        } else if ($row['status'] == "chekedIn") {
            $status = "Leave completed";
        } else if ($row['status'] == "Cancel") {
            $status = "Leave Canceled By Student";
        }

        echo '
          <div class="notice_box">
            <div class="notice_img">
              <img src="../../users/' . $row['userId'] . '/' . $row['userId'] . '.png">
            </div>
            <div class="notice_text">
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Journey Date : <span id="olms_fdate_' . $sno . '">' . $row['fdate'] . '</span> </div>
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Return Date : <span id="olms_rdate_' . $sno . '">' . $row['rdate'] . '</span> </div>
              <div class="notice_text_notice"  style="font-weight:600;padding:15 px;font-size:18px;">'.secure_de_input($row['title']).'</div>
              <div class="notice_text_notice" style="padding:10px;font-size:18px;">'.secure_de_input($row['reason']).'</div>';
        if ($row['att1'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att1']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att2'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att2']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att3'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att3']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att4'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att4']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a>

            <?php } echo'<div class="clear"></div>';
            if($row['gender']=="FEMALE"){
                  echo "<div class='clear'></div>";
                  echo "<h4><u>Parent Information</u></h4>";
                  echo'<div class="notice_text_auth">'.$row['ptype'].' : '.$row['pname'].' , '.$row['pmobile'].'</div>';
                  echo'<div class="notice_text_auth">'.$row['pauthtype'].' : '.$row['pauthid'].'</div>';
                }
        
        echo'<div class="clear"></div><br><span style="font-size:18px; font-weight:600;padding:10px;"> Leave Status : '.$status.'</span><div style="float:right;">';
        $sno = $row['sno'];
        if ($row['status'] == "") { ?>
            <button onclick="olms_action('<?php echo $sno ?>','approved')" class="btn btn-success"><span class="fa fa-check"></span> Approve </button>
            <button onclick="olms_action('<?php echo $sno ?>','rejected')" class="btn btn-danger"> <span class="fa fa-times"></span> Reject </button>
        <?php } echo'</div><div class="clear"></div><div class="border-double"></div>
              <div class="notice_text_auth">' . $row['userId'] . ',' . $row['userName'] . '</div>
              <div class="notice_text_auth">' . $row['Department'] . ',' . $row['currentYear'] . ',' . $row['currentClass'] . '</div>
              <div class="notice_text_auth">Date :' . $row['regDate'] . ' </div>
            </div>
          </div>';
        endwhile;
        if ($count == 0) {
            echo "<div class='notfound'>No Pending records Found.</div>";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}

?>
