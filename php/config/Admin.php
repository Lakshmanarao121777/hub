<?php
require "DBActivity.php";
function inserting($table_name, $colums, $values)
{
    include "config.inc.php";
    try
    {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO $table_name ($colums) VALUES ($values)";
        $pdo->exec($sql);
        echo "Sucessfull";
    } catch (PDOException $e) {
        die("<div class='notfound'> An error occured Please contact Admin for more details </div>");
    }
}
function UpdateTable($table_name, $where_set, $where_update)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE $table_name SET $where_set WHERE $where_update";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success";}
    } catch (PDOException $e) {
        die("<div class='notfound'>$table_name An error occured Please contact Admin for more details</div>");
    }
}
function DeleteColum($table_name, $update_where)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM $table_name WHERE $update_where ";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
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

				              <img src="http://'.$link.'/registrations/upload/' . $row['regBy'] . '/' . $row['regBy'] . '.jpg">
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
              <img src="http://'.$link.'/registrations/upload/' . $row['userId'] . '/' . $row['userId'] . '.jpg">
            </div>
            <div class="notice_text">
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Journey Date : <span id="olms_fdate_' . $sno . '">' . $row['fdate'] . '</span> </div>
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Return Date : <span id="olms_rdate_' . $sno . '">' . $row['rdate'] . '</span> </div>
              <div class="notice_text_notice" style="font-weight:600">' . $row['title'] . '</div><div class="border-double"></div>
              <div class="notice_text_notice">' . $row['reason'] . '</div>';
        if ($row['att1'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att1']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att2'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att2']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att3'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att3']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att4'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att4']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a>

          	<?php }
        $sno = $row['sno'];if ($row['status'] == "") {?><button onclick="olms_action('<?php echo $sno ?>','approved')" class="btn btn-success"> Approve </button>
              <button onclick="olms_action('<?php echo $sno ?>','rejected')" class="btn btn-warning"> Reject </button>
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
              <img src="http://'.$link.'/registrations/upload/' . $row['userId'] . '/' . $row['userId'] . '.jpg">
            </div>
            <div class="notice_text">
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Journey Date : <span id="olms_fdate_' . $sno . '">' . $row['fdate'] . '</span> </div>
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Return Date : <span id="olms_rdate_' . $sno . '">' . $row['rdate'] . '</span> </div>
              <div class="notice_text_notice" style="font-weight:600">' . $row['title'] . '</div><div class="border-double"></div>
              <div class="notice_text_notice">' . $row['reason'] . '</div>';
        if ($row['att1'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att1']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att2'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att2']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att3'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att3']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
        if ($row['att4'] != "") {?><a href="../olms/<?php echo $row['sno']; ?>/<?php echo $row['att4']; ?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a>

            <?php }
        $sno = $row['sno'];if ($row['status'] == "") {?><button onclick="olms_action('<?php echo $sno ?>','approved')" class="btn btn-success"> Approve </button>
              <button onclick="olms_action('<?php echo $sno ?>','rejected')" class="btn btn-warning"> Reject </button>
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
function stu_chip_Show($table_name, $select_list, $where)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select_list FROM $table_name where $where ORDER BY sno DESC ";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        while ($row = $q->fetch()): $count++;?>
						          <div class="user_chip">
						            <div class="img_box">
						              <?php echo ' <img src="http://'.$link.'/Registrations/upload/' . $row['userId'] . '/' . $row['userId'] . '.jpg">'; ?>
						            </div>
						            <div class="details_box">
						              <div class="details"> <?php echo $row['userName']; ?> </div>
						              <div class="details"> <?php echo $row['userId']; ?> </div>
						              <div class="details"> <?php echo $row['currentYear'] . ',' . $row['Department']; ?> </div>
						              <div class="details">
						                <?php if ($row['currentYear'] == "ENGG-1" || $row['currentYear'] == "ENGG-2" || $row['currentYear'] == "ENGG-3" || $row['currentYear'] == "ENGG-4" || $row['currentYear'] == "PUC-1" || $row['currentYear'] == "PUC-2") {
                echo "Active";
            } else {
                echo "In Active";
            }
            ?> <span>
						                <form action="students_details" method="GET">
						                  <input type="hidden" name="userId" value="<?php echo $row['userId']; ?>">
						                  <button type="submit">View More..</button>
						                </form></span>
						              </div>
						            </div>

						          </div>
						        <?php endwhile;
        if ($count == 0) {echo "<div class='notfound'>no User Found</div>";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
class activity_student extends DBActivity
{
    public function add_user($table_name, $colms, $values)
    {
        return $this->inserting($table_name, $colms, $values);
    }
    public function edit_user($table_name, $where_set, $where_update)
    {
        return $this->UpdateTable($table_name, $where_set, $where_update);
    }
    public function update_password($table_name, $where_set, $where_update)
    {
        return $this->UpdateTable($table_name, $where_set, $where_update);
    }
}
?>
