<?php
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
            if ($row['status'] == "") {
                $status = "Pending";
            } else if ($row['status'] == "approved") {
            $status = "Permission Granted";
        } else if ($row['status'] == "rejected") {
            $status = "Permission Denied";
        } else if ($row['status'] == "chekedOut") {
            $status = "Student Already Out of Campus";
        } else if ($row['status'] == "chekedIn") {
            $status = "Student Already Inside the Campus";
        } else {
            $status = "Pending";
        }

        echo '
          <div class="notice_box">
            <div class="notice_img">
              <img src="../../users/' . $row['userId'] . '/' . $row['userId'] . '.jpg">
            </div>
            <div class="notice_text">
              <div class="notice_text_notice" style="font-weight:600">' . $row['title'] . '</div><div class="border-double"></div>
              <div class="notice_text_notice">' . $row['reason'] . '</div>';
        if ($row['att1'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att1']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att2'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att2']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att3'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att3']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att4'] != "") {?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT); ?>/<?php echo $row['att4']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a>

            	<?php }
        $sno = $row['sno'];if ($row['status'] == "approved") {?>
              <button onclick="olms_action_security('<?php echo $sno ?>','chekedOut')" class="btn btn-success"> Student Signed Out </button>
                <?php } else if ($row['status'] == "chekedOut") {?>
                  <button onclick="olms_action_security('<?php echo $sno ?>','chekedIn')" class="btn btn-success"> Student Signed In </button>
                <?php }

        echo '<span style="font-size:18px;font-weight:600;">Leave Status : ' . $status . '</span> <div class="border-double"></div>
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

?>