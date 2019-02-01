<?php
require "DBActivity.php";
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
function results($table,$select,$where){
  include("config.inc_results.php");
    try { 
      $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      $sql = "SELECT $select FROM $table where $where ORDER BY sno DESC";
      $q = $pdo->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC); 
      $count=0;$credit;
      while ($row =$q->fetch() ): $count++; ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row['subjectName']; ?></td>
            <td><?php echo $row['creditPoint']; ?> </td>
            <td><?php echo $row['w1']; ?></td>
            <td><?php echo $row['w2']; ?></td>
            <td><?php echo $row['w3']; ?></td>
            <td><?php echo $row['w4']; ?></td>
            <td><?php echo $row['w5']; ?></td>
            <td><?php echo $row['w6']; ?></td>
            <td><?php echo $row['w7']; ?></td>
            <td><?php echo $row['w8']; ?></td>
            <td><?php echo $row['w9']; ?></td>
            <td><?php echo $row['w10']; ?></td>
            <td><?php echo $row['m1']; ?></td>
            <td><?php echo $row['m2']; ?></td>
            <td><?php echo $row['m3']; ?></td>
            <td><?php echo $row['endsem']; ?></td>
          </tr><?php
      endwhile; 
    } 
    catch (PDOException $e) {
      die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }  
}
function load_notice($table_name,$select,$start,$end){
  include("config.inc.php");
    try { 
      $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      $sql = "SELECT $select FROM $table_name ORDER BY sno DESC LIMIT $start,$end";
      $q = $pdo->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC); 
      $count=0;$credit;
      while ($row =$q->fetch() ): $count++; echo '
        <div class="notice_box">
          <div class="notice_img">
            <img src="../../users/'.$row['regBy'].'/'.$row['regBy'].'.jpg">
          </div>
          <div class="notice_text">
            <div class="notice_text_notice" style="font-weight:600">'.$row['title_notice'].'</div><div class="border-double"></div>
            <div class="notice_text_notice">'.$row['notice'].'</div>';
            if($row['att1']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att1'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if($row['att2']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att2'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if($row['att3']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att3'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if($row['att4']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att4'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if($row['att5']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att5'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if($row['att6']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att6'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if($row['att7']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att7'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            if($row['att8']!=""){ ?><a href="../NoticeBoard/<?php echo $row['sno'];?>/<?php echo $row['att8'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
            echo'
            <div class="border-double"></div>
            <div class="notice_text_auth">From :'.$row['regBy'].'</div>
            <div class="notice_text_auth">Office :'.$row['office'].'</div>
            <div class="notice_text_auth">Date :'.$row['regDate'].' </div>
          </div> 
        </div>';
      endwhile; 
    } 
    catch (PDOException $e) {
      die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }  
} 
function load_olms($table_name,$select,$start,$end,$where){
  include("config.inc.php");
      try { 
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table_name where $where ORDER BY sno DESC LIMIT $start,$end";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC); 
        $count=0;
        while ($row =$q->fetch() ): $count++; 
          $sno=$row['sno'];
          if($row['status']=="")$status="Pending";
          else if($row['status']=="approved")$status="Permission Granted";
          else if($row['status']=="rejected")$status="Permission Denied";
          else if($row['status']=="chekedOut")$status="Your are out of campus";
          else if($row['status']=="chekedIn")$status="Leave completed";
          else if($row['status']=="Cancel")$status="Leave Canceled By Student";
          echo '
          <div class="notice_box">
            <div class="notice_img">
              <img src="../../users/'.$row['userId'].'/'.$row['userId'].'.jpg">
            </div>
            <div class="notice_text">
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Journey Date : <span id="olms_fdate_'.$sno.'">'.$row['fdate'].'</span> </div>
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Return Date : <span id="olms_rdate_'.$sno.'">'.$row['rdate'].'</span> </div>
              <div class="notice_text_notice" id="olms_title_'.$sno.'" style="font-weight:600;padding:15 px;font-size:18px;">'.secure_de_input($row['title']).'</div>
              <div class="notice_text_notice" id="olms_reason_'.$sno.'" style="padding:10px;font-size:18px;">'.secure_de_input($row['reason']).'</div>';
              if($row['att1']!=""){ ?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT);?>/<?php echo $row['att1'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
              if($row['att2']!=""){ ?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT);?>/<?php echo $row['att2'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
              if($row['att3']!=""){ ?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT);?>/<?php echo $row['att3'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
              if($row['att4']!=""){ ?><a href="../Outpass/<?php echo $row['userId']."_".str_pad($row['sno'], 7,"0",STR_PAD_LEFT);?>/<?php echo $row['att4'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
              echo '<div class="clear"></div>';

              if($row['gender']=="FEMALE"){
                  echo "<div class='clear'></div>";
                  echo "<h4><u>Parent Information</u></h4>";
                  echo'<div class="notice_text_auth">'.$row['ptype'].' : '.$row['pname'].' , '.$row['pmobile'].'</div>';
                  echo'<div class="notice_text_auth">'.$row['pauthtype'].' : '.$row['pauthid'].'</div>';
                  echo "<div class='clear'></div>";
                }
                echo'<div class="clear"></div><br><span style="font-size:18px; font-weight:600;padding:10px;"> Leave Status : '.$status.'</span><div style="float:right;>';
                if($status=="Pending"){?><span <?php echo'id="olms_edit_btn_'.$sno.'"';?>><button class="btn btn-info" style="font-weight:600;" onclick="edit_stu_olms_apply('<?php echo $sno; ?>')" > <span class="fa fa-pencil-alt"></span> Edit Leave</button></span><button class="btn btn-danger" style="font-weight:600;" onclick="cancel_stu_olms_apply('<?php echo $sno; ?>')"><span class="fa fa-times"></span> Cancel Leave</button><?php }
              echo' </div><div class="clear"></div><div class="border-double"></div>
              <div class="notice_text_auth">'.$row['userId'].','.$row['userName'].'</div>
              <div class="notice_text_auth">'.$row['Department'].','.$row['currentYear'].','.$row['currentClass'].'</div>
              <div class="notice_text_auth">Date :'.$row['regDate'].' </div>
            </div> 
          </div>';
        endwhile; 
      } 
      catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
      }  
  }
function changepassword($sql)
{
  include("config.inc.php");
  try { 
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql = "update $table_name set $set where $where";
    $pdo->exec($sql);
    echo "success";
    }
  catch (PDOException $e) {
    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
  } 
}
function showpersonal_Profile($table_name,$select,$where)
{
  include("config.inc.php");
  try { 
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $sql = "SELECT $select FROM $table_name where $where";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC); 
    $count=0;$credit;
    while ($row =$q->fetch() ): $count++; 
    $img_lnk='../../users/'.$row['userId'].'/'.$row['userId'].'.jpg';
    $img ='';
    if (file_exists($img_lnk)) {
      $img .= '<img src="../../users/'.$row['userId'].'/'.$row['userId'].'.png" style="width:100px;">';
  } 
    $img .= '<form action="profile.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="userId" value="'.$row['userId'].'">
          <div class="inp">
            <div class="inp_name">Select File : </div>
            <div class="inp_value"><input type="file" name="fileToUploadPic[]" id="fileToUploadPic[]" multiple="multiple"></div>  
                 
          <input type="submit" value="Upload File" name="submit_profile" class="btn btn-success">
          <input type="reset" value="Reset" class="btn btn-warning"></div>
        </form>'; 
    echo '
      <fieldset class="br">
        <legend>Student Details</legend>
          <div class="inp">
            <div class="inp_name">ID Number : </div>
            <div class="inp_value" id="idnumber"> '.$row['userId'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Name : </div>
            <div class="inp_value"> '.$row['userName'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Gender : </div>
            <div class="inp_value" id="gender"> '.$row['gender'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Primary Mobile : </div>
            <div class="inp_value" id="m1"> +91 '.$row['m1'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."m1".'\',\''."$row[userId]".'\',\''."$row[m1]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Secondary Mobile : </div>
            <div class="inp_value" id="m2"> +91 '.$row['m2'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."m2".'\',\''."$row[userId]".'\',\''."$row[m2]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Date of Birth : </div>
            <div class="inp_value" id="dob"> '.$row['dob'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."dob".'\',\''."$row[userId]".'\',\''."$row[dob]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Primary Email : </div>
            <div class="inp_value"> '.secure_input_lowercase($row['userId']).'@rguktrkv.ac.in</div>
          </div>
          <div class="inp">
            <div class="inp_name">Seconadary Email : </div>
            <div class="inp_value" id="email"> '.$row['email'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."email".'\',\''."$row[userId]".'\',\''."$row[email]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Cast/Community : </div>
            <div class="inp_value" id="cast"> '.$row['cast'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."cast".'\',\''."$row[userId]".'\',\''."$row[cast]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Community Application ID : </div>
            <div class="inp_value" id="castId"> '.$row['castId'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."castId".'\',\''."$row[userId]".'\',\''."$row[castId]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Aadharcard Number : </div>
            <div class="inp_value" id="aadhar"> '.$row['aadhar'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."aadhar".'\',\''."$row[userId]".'\',\''."$row[aadhar]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">PAN Card Number : </div>
            <div class="inp_value" id="pan"> '.$row['pan'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."pan".'\',\''."$row[userId]".'\',\''."$row[pan]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Passport Number : </div>
            <div class="inp_value" id="passport"> '.$row['passport'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."passport".'\',\''."$row[userId]".'\',\''."$row[passport]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Rationcard Number : </div>
            <div class="inp_value" id="rationcard"> '.$row['rationcard'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."rationcard".'\',\''."$row[userId]".'\',\''."$row[rationcard]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Blood Group : </div>
            <div class="inp_value" id="blood"> '.$row['blood'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."blood".'\',\''."$row[userId]".'\',\''."$row[blood]".'\')"></span></div>
          </div>
      </fieldset>
      <fieldset>
        <legend>Profile Picture Details</legend>
        '.$img.'
      </fieldset>
      <fieldset>
        <legend>Parent(s)/Guardian Details</legend>
          <div class="inp">
            <div class="inp_name">Father Name : </div>
            <div class="inp_value" id="pname1"> '.$row['pname1'].' ';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."pname1".'\',\''."$row[userId]".'\',\''."$row[pname1]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Primary Mobile : </div>
            <div class="inp_value" id="pm1"> +91 '.$row['pm1'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."pm1".'\',\''."$row[userId]".'\',\''."$row[pm1]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Mother Name : </div>
            <div class="inp_value" id="pname2">'.$row['pname2'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."pname2".'\',\''."$row[userId]".'\',\''."$row[pname2]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Primary Mobile : </div>
            <div class="inp_value" id="pm2"> +91 '.$row['pm2'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."pm2".'\',\''."$row[userId]".'\',\''."$row[pm2]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Guardian Name : </div>
            <div class="inp_value" id="pname3">'.$row['pname3'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."pname3".'\',\''."$row[userId]".'\',\''."$row[pname3]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Primary Mobile : </div>
            <div class="inp_value"id="pm3"> +91 '.$row['pm3'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."pm3".'\',\''."$row[userId]".'\',\''."$row[pm3]".'\')"></span></div>
          </div>
      </fieldset>
      <fieldset>
        <legend>Address Details</legend>
          <div class="inp">
            <div class="inp_name">Current Address : </div>
            <div class="inp_value" style="height:75px;" id="caddress"> '.$row['caddress'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."caddress".'\',\''."$row[userId]".'\',\''."$row[caddress]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Perminent Address : </div>
            <div class="inp_value" style="height:75px;" id="paddress"> '.$row['paddress'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."paddress".'\',\''."$row[userId]".'\',\''."$row[paddress]".'\')"></span></div>
          </div>
      </fieldset>
      <fieldset>
        <legend>Income Details</legend>
          <div class="inp">
            <div class="inp_name">Family Annual Income : </div>
            <div class="inp_value" id="income"> '.$row['income'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."income".'\',\''."$row[userId]".'\',\''."$row[income]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Source of Income : </div>
            <div class="inp_value" id="incomesource"> '.$row['incomesource'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_personal(\''."incomesource".'\',\''."$row[userId]".'\',\''."$row[incomesource]".'\')"></span></div>
          </div>
      </fieldset>

      ';
    endwhile; 
  }
  catch (PDOException $e) {
    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
  } 
}
function showacadamic_Profile($table_name,$select,$where)
{
  include("config.inc.php");
  try { 
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $sql = "SELECT $select FROM $table_name where $where";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC); 
    $count=0;$credit;
    while ($row =$q->fetch() ): $count++; echo '
      <fieldset class="br">
        <legend>Acadamic Details</legend>
        <div class="inp">
            <div class="inp_name">ID Number : </div>
            <div class="inp_value"> '.$row['userId'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Name : </div>
            <div class="inp_value"> '.$row['userName'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Current Year : </div>
            <div class="inp_value"> '.$row['currentYear'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Branch : </div>
            <div class="inp_value">  '.$row['Department'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">status : </div>
            <div class="inp_value"> '.$row['status'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Joining Date : </div>
            <div class="inp_value">  '.$row['joining'].'</div>
          </div>
      </fieldset>
      <fieldset>
        <legend>SSC Details</legend>
          <div class="inp">
            <div class="inp_name">SSC Hall ticket  : </div>
            <div class="inp_value" id="sscHallTicket"> '.$row['sscHallTicket'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."sscHallTicket".'\',\''."$row[userId]".'\',\''."$row[sscHallTicket]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">SSC CGPA/Marks  : </div>
            <div class="inp_value" id="sscMarks"> '.$row['sscMarks'].'/10';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."sscMarks".'\',\''."$row[userId]".'\',\''."$row[sscMarks]".'\')"></span> </div>
          </div>
          <div class="inp">
            <div class="inp_name">SSC School Name  : </div>
            <div class="inp_value" id="sscSchoolName"> '.$row['sscSchoolName'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."sscSchoolName".'\',\''."$row[userId]".'\',\''."$row[sscSchoolName]".'\')"></span> </div>
          </div>
          <div class="inp">
            <div class="inp_name">SSC Address  : </div>
            <div class="inp_value" style="height:100%;" id="sscSchoolAddress"> '.$row['sscSchoolAddress'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."sscSchoolAddress".'\',\''."$row[userId]".'\',\''."$row[sscSchoolAddress]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">SSC Board  : </div>
            <div class="inp_value" id="sscBoard"> '.$row['sscBoard'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."sscBoard".'\',\''."$row[userId]".'\',\''."$row[sscBoard]".'\')"></span></div>
          </div>
      </fieldset> <div class="clear"></div><br/>
      <fieldset class="br">
        <legend>Inter/PUC/10+2 Details</legend>
          <div class="inp">
            <div class="inp_name">Inter/PUC/10+2 Hall ticket  : </div>
            <div class="inp_value" id="interHallTicket"> '.$row['userId'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Inter/PUC/10+2 CGPA/Marks  : </div>
            <div class="inp_value" id="interMarks"> '.$row['interMarks'].'/10';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."interMarks".'\',\''."$row[userId]".'\',\''."$row[interMarks]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Inter/PUC/10+2 Name  : </div>
            <div class="inp_value" id="interName"> '.$row['userName'].'</div>
          </div>
          <div class="inp" style="min-height:100px;">
            <div class="inp_name">Inter/PUC/10+2 Address  : </div>
            <div class="inp_value" style="min-height:100%;" id="interAddress"> IIIT RKValley RGUKT-AP, Idupulapaya, Vempally, Kadapa, AndhraPradesh, 516330</div>
          </div>
          <div class="inp">
            <div class="inp_name">Inter/PUC/10+2 Board  : </div>
            <div class="inp_value" id="interBoard"> IIIT RKValley RGUKT AP </div>
          </div>
      </fieldset>
      <fieldset>
        <legend>Hostel Details</legend>
          <div class="inp">
            <div class="inp_name">Hostel Name  : </div>
            <div class="inp_value" id="hostel"> '.$row['hostel'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."hostel".'\',\''."$row[userId]".'\',\''."$row[hostel]".'\')"></span> </div>
          </div>
          <div class="inp">
            <div class="inp_name">Hostel Room  : </div>
            <div class="inp_value" id="hostelroom"> '.$row['hostelroom'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."hostelroom".'\',\''."$row[userId]".'\',\''."$row[hostelroom]".'\')"></span> </div>
          </div>
          <div class="inp">
            <div class="inp_name">Bed Number  : </div>
            <div class="inp_value" id="bednumber"> '.$row['bednumber'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."bednumber".'\',\''."$row[userId]".'\',\''."$row[bednumber]".'\')"></span></div>
          </div>
          <div class="inp">
            <div class="inp_name">Cot Number  : </div>
            <div class="inp_value" id="cotnumber"> '.$row['cotnumber'].'';echo'<span class="fa fa-pencil-alt" onclick="edit_academic(\''."cotnumber".'\',\''."$row[userId]".'\',\''."$row[cotnumber]".'\')"></span></div>
          </div>
      </fieldset>
      ';
    endwhile; 
    if($count==0){
      echo "noresult";
    }
  }
  catch (PDOException $e) {
    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
  } 
}
function showachivements_Profile($table_name,$select,$where){
  include("config.inc.php");
  try { 
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $sql = "SELECT $select FROM $table_name where $where";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC); 
    $count=0;$credit;$uiss=$_SESSION['USER_ID'];?>
    <fieldset class="br"><form action="" method="post" onsubmit="add_achivement('<?php echo $uiss; ?>');return false" name="new_achivement" style="width:100%;">
        <legend style="width:100%;">Add New Achivement</legend>
          <div class="inp">
            <div class="inp_name">achivementType : </div>
            <div class="inp_value"><input type="text" name="achive_inp_type"></div>
          </div>
          <div class="inp">
            <div class="inp_name">Achivement Title : </div>
            <div class="inp_value"><input type="text" name="achive_inp_title"></div>
          </div>
          <div class="inp">
            <div class="inp_name">Achivement Area : </div>
            <div class="inp_value"><input type="text" name="achive_inp_area"></div>
          </div>
          <div class="inp" style="height:100px;">
            <div class="inp_name">Achivement Discription : </div>
            <div class="inp_value"><textarea name="achive_inp_dis" style="width:90%;height:99px;"></textarea></div>
          </div>
          <div class="inp">
            <div class="inp_name">Achivement Year : </div>
            <div class="inp_value"><input type="text" name="achive_inp_year"></div>
          </div>
          <div class="inp">
            <div class="inp_name">Achivement Reference : </div>
            <div class="inp_value"><input type="text" name="achive_inp_reference"></div>
          </div>
          <div class="inp">
            <div class="inp_name"><button type="submit" class="btn btn-success">Add New</button> </div>
            <div class="inp_value"><button type="reset" class="btn btn-warning">Reset</button></div>
          </div>
        </form>
      </fieldset><?php
    while ($row =$q->fetch() ): $count++; $sno=$row['sno']; echo '
      <fieldset class="br" >';?>
        <legend style="min-width:90%;"><?php echo $row['achivementTitle']; ?><span class="fa fa-trash-alt" style="float:right;cursor: pointer;" onclick="delete_achivement(<?php echo$sno;?>);return false"></span><span class="fa fa-pencil-alt" style="float:right;margin-right: 10px;cursor: pointer;" onclick="edit_achivement(<?php echo$sno;?>);return false"></span></legend><?php echo'
          <div class="inp">
            <div class="inp_name">achivementType : </div>
            <div class="inp_value"> '.$row['achivementType'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">Achivement Title : </div>
            <div class="inp_value"> '.$row['achivementTitle'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">achivementArea : </div>
            <div class="inp_value">  '.$row['achivementArea'].'</div>
          </div>
          <div class="inp" style="height:100px;">
            <div class="inp_name">achivementDis : </div>
            <div class="inp_value"> '.$row['achivementDis'].'</div>
          </div>
          <div class="inp">
            <div class="inp_name">achivementYear : </div>
            <div class="inp_value">  '.$row['achivementYear'].' </div>
          </div>
          <div class="inp" style="height:82px;">
            <div class="inp_name">achivementreference : </div>
            <div class="inp_value"> '.$row['achivementreference'].'</div>
          </div>
      </fieldset>

      ';
    endwhile; ?>
    <div style="position: fixed;right: 100px;width:100px;height: 100px;background:repeat;color: white;bottom:100px;"><span class="fa fa-pencil-alt"></span></div><?php
  }
  catch (PDOException $e) {
    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
  } 
}
function getDetfresh($table_name,$where,$col){
  include("config.inc.php");
  try{
      $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      $sql = "SELECT * FROM $table_name $where";
      $q = $pdo->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC); 
      $count=0;$credit;
      while ($row =$q->fetch() ): $count++;
        $credit=$row["$col"];
      endwhile; 
      if($count>=1)
      {
        return $credit; }   
      }
    catch(PDOException $e)
        {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
    }
function inserting($table_name,$colums,$values){
  include("config.inc.php");
    try 
    {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO $table_name ($colums) VALUES ($values)";
    $pdo->exec($sql);
        echo"Sucessfull";
                
        }
    catch(PDOException $e)
        {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
    }
function deleting($table_name,$where){
  include("config.inc.php");
    try 
    {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM $table_name WHERE $where";
    $pdo->exec($sql);
        echo"Sucessfull";
                
        }
    catch(PDOException $e)
        {
           die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
    }
function currentYear($table_name,$col,$where){
  include("config.inc.php");
  try 
    {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      $sql = "SELECT * FROM $table_name $where";
      $q = $pdo->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC); 
      $count=0;$credit;
      while ($row =$q->fetch() ): $count++;
        $credit=$row["$col"];
      endwhile; 
      if($count>=1)
      {
        return $credit; }   
      }
    catch(PDOException $e)
        {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
}
function show_minor($tbl,$val){
  include("config.inc.php");
  try 
    {
      $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      $sql = "SELECT * FROM $tbl $val";
      $q = $pdo->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC); 
      $count=0;$credit;?>
      <?php
      while ($row =$q->fetch() ): $count++;
        $credit=$row["sno"]; ?>
        <tr>
          <td><?php echo$count; ?></td>
          <td><?php echo$row['BranchBy']; ?></td>
          <td><?php echo$row['CYear']; ?></td>
          <td><?php echo$row['subName']; ?></td>
          <td><input type="checkbox" name="<?php echo 'sub'.$count; ?>" value="<?php echo $row['sno']; ?>"></td>
        </tr> 
        <?php 
      endwhile;if($count>0){ ?>

      <tr>
        <td colspan="3" style="border:0"></td>
        <td><button type="submit" class="btn btn-success"> Submit </button></td><td><button type="reset" class="btn btn-info"> Reset </button></td>
      </tr>
      <?php }
    }
    catch(PDOException $e)
        {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
}
function getCount($table_name,$where){
  include("config.inc.php");
  try{
      $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      $sql = "SELECT * FROM $table_name $where";
      $q = $pdo->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC); 
      $count=0;
      while ($row =$q->fetch() ): $count++;
      endwhile; 
      return $count;
      }   

    catch(PDOException $e)
        {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
    }
function getOlmsCount($userId,$type)
{
  include("config.inc.php");
  try 
    {
      $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      if($type=="month")
      {
        $dates=$month_original.':'.$year_original;
        $sql = "SELECT * FROM students_olms where userId='".$userId."' AND regDate LIKE '%".$dates."' and status !='Cancel' ";
      }
      if($type=="day")
      {
        $dates=$date_original.':'.$month_original.':'.$year_original;
        $sql = "SELECT * FROM students_olms where userId='".$userId."' AND regDate LIKE '%".$dates."' and status !='Cancel'  ";
      }
      $q = $pdo->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC); 
      $count=0;
      while ($row =$q->fetch() ): $count++;
      endwhile;
    }
    catch(PDOException $e)
    {
      die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $count;
}
function load_olms_queryss($table_name,$select,$where){
  include("config.inc.php");
      try { 
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table_name where $where ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC); 
        $count=0;$credit;
        while ($row =$q->fetch() ): $count++; $sno=$row['sno'];
          if($row['status']=="")$status="Pending";
          else if($row['status']=="approved")$status="Permission Granted";
          else if($row['status']=="rejected")$status="Permission Denied";
          else if($row['status']=="chekedOut")$status="Your are out of campus";
          else if($row['status']=="chekedIn")$status="Leave completed";
          else if($row['status']=="Cancel")$status="Leave Canceled By Student";
          echo '
          <div class="notice_box">
            <div class="notice_img">
              <img src="../../users/'.$row['userId'].'/'.$row['userId'].'.jpg">
            </div>
            <div class="notice_text">
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Journey Date : <span id="olms_fdate_'.$sno.'">'.$row['fdate'].'</span> </div>
              <div style="float:left;width:50%;font-weight:600;padding:10px;background:teal;color:white;font-size:16px;">Return Date : <span id="olms_rdate_'.$sno.'">'.$row['rdate'].'</span> </div>
              <div class="notice_text_notice" style="font-weight:600">'.$row['title'].'</div><div class="border-double"></div>
              <div class="notice_text_notice">'.$row['reason'].'</div>';
              if($row['att1']!=""){ ?><a href="../olms/<?php echo $row['sno'];?>/<?php echo $row['att1'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
              if($row['att2']!=""){ ?><a href="../olms/<?php echo $row['sno'];?>/<?php echo $row['att2'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
              if($row['att3']!=""){ ?><a href="../olms/<?php echo $row['sno'];?>/<?php echo $row['att3'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a><?php }
              if($row['att4']!=""){ ?><a href="../olms/<?php echo $row['sno'];?>/<?php echo $row['att4'];?>" target="_blank" class="downloadicon_notice"><span class="fa fa-download"></span></a>
              
            <?php } $sno=$row['sno'];?>
              <?php echo '<span style="font-size:18px;font-weight:600;">Leave Status : '.$status.'</span> <div class="border-double"></div>
              <div class="notice_text_auth">'.$row['userId'].','.$row['userName'].'</div>
              <div class="notice_text_auth">'.$row['Department'].','.$row['currentYear'].','.$row['currentClass'].'</div>
              <div class="notice_text_auth">Date :'.$row['regDate'].' </div>
            </div> 
          </div>';
        endwhile; 
        if($count==0){
          echo"<div class='notfound'>No Pending records Found.</div>";
        }
      } 
      catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
      }  
  }
