<?php
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
		            <img src="../../users/R121777/r121777.jpg">
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

function regStatus($stuId)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM ay1819s1reg where userId='$stuId' ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
        endwhile;
        if ($count == 0) {
            $credit = "Please Register";
        } else {
            $credit = "Registred";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $credit;
}
function GetCredits($name, $dept)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM subjects where subName='$name'and subDept='$dept' ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $credit = $row['subCredit'];
        endwhile;
        if ($count == 0) {
            $credit = "No Subject Found";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $credit;
}
function GetYear($name)
{
    include "config.inc.php";
    try {
        $credit = "";
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM students_details where username='$name' ";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $credit = $row['year'];
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $credit;
}
function GethodYear($name)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM employe_login where username='$name' ";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $credit = $row['year'];
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $credit;
}
function GetCode($name, $dept)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM subjects where subName='$name'and subDept='$dept' ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $credit = $row['subCode'];
        endwhile;
        if ($count == 0) {
            $credit = "No Subject Found";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $credit;
}
function FetchUserBasicDetails($table_name, $select_list, $where, $hodDept, $hodid, $hoddesignation, $year)
{
    include "config.inc.php";
    try {
        $pdop = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sqlp = "SELECT $select_list FROM $table_name where $where ORDER BY sno DESC ";
        $qp = $pdop->query($sqlp);
        $qp->setFetchMode(PDO::FETCH_ASSOC);
        $countp = 0;
        while ($rowp = $qp->fetch()): $countp++;
            $reg_status = regStatus($rowp["userId"]);
            if ($reg_status == "Please Register") {
                if (GethodYear($hodid) == $rowp["currentYear"]) {
                    ?>
		      	<form method="post" onsubmit='reg_sub("<?php echo $hodid; ?>","<?php echo $hoddesignation; ?>","<?php echo $hodDept; ?> ");return false; ' name=" sub_registrion" class='sub_registrion'>
		  	  		<div class="stu_reg bg_white ball">
		  			    <?php
    include "../../php/config/config.inc.php";
                    try { $y = $rowp["currentYear"];
                        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
                        $sql = "SELECT *  FROM subjects where subDept='$hodDept' and subYear='$y' ORDER BY subCode ASC ";
                        $q = $pdo->query($sql);
                        $q->setFetchMode(PDO::FETCH_ASSOC);
                        $count = 0;
                        $user_id;
                        $user_type;
                        $user_ofc;
                        $user_designation;
                        $user_department;?>
		  					  <table>
		  							<thead>
		  					    		<tr><th>Subject Code</th><th>Subject Name</th><th>Subject Type</th><th>Credits</th><th>Select</th></tr>
		  						 	</thead>
		  					    <tbody><?php
    while ($row = $q->fetch()): $count++;?>
				  					      <tr>
				      					    <td><?php if ($row['subType'] != "Free Elective") {
                                echo $row['subCode'];
                            } else {
                                echo "--";
                            }
                            ?></td>
				      					    <td><?php if ($row['subType'] != "Free Elective") {
                                echo $row['subName'];
                            } else {
                                echo "Free Elective";
                            }
                            ?></td>
				      					    <td><?php if ($row['subType'] == "Free Elective") {
                                echo "Free Elective" . " - " . $row['electiveNumber'];
                            } else {
                                echo $row['subType'];
                            }
                            ?></td>
				      					    <td><?php echo $row['subCredit']; ?></td>
				      					    <td><?php if ($row['subType'] != "Free Elective") {
                                echo "<input type='text' name='subject_name' readonly='readonly' value='" . $row['subName'] . "'>";
                            } else {echo "<select name='elective" . $row['electiveNumber'] . "'>";
                                try {
                                    $pdos = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
                                    $sqls = "SELECT * FROM subjects where subType='Free Elective' and electiveNumber='$row[electiveNumber]' ORDER  BY subType ASC ";
                                    $qs = $pdos->query($sqls);
                                    $qs->setFetchMode(PDO::FETCH_ASSOC);
                                    $counts = 0;
                                    while ($rows = $qs->fetch()): $counts++;?>
						      					          <option value="<?php echo $rows['subName']; ?>"><?php echo $rows['subName']; ?></option>
						      					          <?php endwhile;
                                } catch (PDOException $e) {
                                    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
                                }
                            }
                            echo "</select>";?>
				      					    </td>
				      					  </tr>
				      					  <?php
    endwhile;?>
		  					    </tbody>
		  			   		</table></br>
		  					   <?php
    if ($count != 0) {?><button type="submit" style="margin: 0 auto;padding:5px 15px;border-radius: 5px; border:0;color:white;background:rgba(50,200,50,0.9);font-weight: 800;font-size: 16px;color:rgba(0,0,0,.7)"> Register </button><?php } else {echo "no sub to reg";}
                    } catch (PDOException $e) {
                        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
                    }
                    ?>
		    			</div>
		    		  <div class="stu_profile bg_white ball" id="stu_profile">
		    		  		<?php
    echo '
		    	        <div class="img_box">
		    	  			<img src="http://<?php echo $link ; ?>/Registrations/upload/' . $rowp["userId"] . '/' . $rowp["userId"] . '.jpg">
		    	  		</div>
		    	  		<div class="details_box">
		    		  		' . $rowp["userName"] . '<br>
		    		  		' . $rowp["userId"] . '<br>
		    		  		' . $rowp["Department"] . '<br>
		    	  		</div><input type="hidden" name="student_id" value="' . $rowp["userId"] . ' " ><input type="hidden" name="student_name" value="' . $rowp["userName"] . ' " >';
                    ?>
		  		  	</div>
		  		  </form>
				    <div class="clear"></div><?php } else {echo "<div class='notfound'>your are not authorized to access.</div>";}} else {?>
		      <div class='notfound'>User registration for this semister is successsfuly completed.</div>
		     	<div class="stu_reg bg_white ball">
		     		</br>
		     		<b>Registred subject List:</b>
		     		<br><br>
		  			<table>
		  				<thead><tr><th>Subject Code</th> <th>Subject Name</th> <th>Credits</th>	</tr>
		  		    <tbody><?php
    include "../../php/config/config.inc.php";
                try { $sid = $rowp["userId"];
                    $pdoaa = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
                    $sqlaa = "SELECT * FROM ay1819s1reg where userId='$sid'";
                    $qaa = $pdoaa->query($sqlaa);
                    $qaa->setFetchMode(PDO::FETCH_ASSOC);
                    $countaa = 0;
                    while ($rowaa = $qaa->fetch()): $countaa++;?>
				  	            	<tr>
				  	        			<td><?php echo $rowaa['subjectCode']; ?></td>
				  	        			<td><?php echo $rowaa['subName']; ?></td>
				  	        			<td><?php echo $rowaa['credits']; ?></td>
				  			      	</tr>
				  			      	<?php
    endwhile;
                } catch (PDOException $e) {
                    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
                }
                ?>
		  		    </tbody>
		  		  </table></br>
				  </div>
			    <div class="stu_profile bg_white ball" id="stu_profile">
			  		<?php
    echo '
		        <div class="img_box">
		  			<img src="http://<?php echo $link ; ?>/Registrations/upload/' . $rowp["userId"] . '/' . $rowp["userId"] . '.jpg">
		  		</div>
		  		<div class="details_box">
			  		' . $rowp["userName"] . '<br>
			  		' . $rowp["userId"] . '<br>
			  		' . $rowp["Department"] . '<br>
		  		</div>';
                ?>
			  	</div>
			      	<?php }
        endwhile;
        if ($countp == 0) {echo "<div class='notfound'>no User Found</div>";}
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
function subCount($userid)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM ay1819s1reg where userId='$userid' ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        while ($row = $q->fetch()): $count++;
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $count;
}
function count_data_reg($table, $select, $where, $year)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table where $where";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        while ($row = $q->fetch()):
            if ($table == "students_details") { /*if(checkyear($row['userId'],$year)=="yes" )*/if ($row['currentYear'] == $year) {$count++;}} else { $count++;}
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $count;
}
function showregdata($sql)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        //$sql = "SELECT * FROM ay1819s1reg  GROUP BY userId ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        ?>
    <table>
        <thead>
          <tr>
            <th> Sno</th>
            <th> Id</th>
            <th> Name</th>
            <th> Department</th>
            <th> Year</th>
            <th> Total Subjects</th>
            <th> Status</th>
          </tr>
        </thead>
        <tbody>
        <?php
    while ($row = $q->fetch()): $count++;
            if ($row['regBy'] == "ecee1" || $row['regBy'] == "csee1" || $row['regBy'] == "cheme1" || $row['regBy'] == "civile1" || $row['regBy'] == "meche1" || $row['regBy'] == "mmee1") {
                $cyear = "ENGG-1";
            }

            if ($row['regBy'] == "ecee2" || $row['regBy'] == "csee2" || $row['regBy'] == "cheme2" || $row['regBy'] == "civile2" || $row['regBy'] == "meche2" || $row['regBy'] == "mmee2") {
                $cyear = "ENGG-2";
            }

            if ($row['regBy'] == "ecee3" || $row['regBy'] == "csee3" || $row['regBy'] == "cheme3" || $row['regBy'] == "civile3" || $row['regBy'] == "meche3" || $row['regBy'] == "mmee3") {
                $cyear = "ENGG-3";
            }

            if ($row['regBy'] == "ecee4" || $row['regBy'] == "csee4" || $row['regBy'] == "cheme4" || $row['regBy'] == "civile4" || $row['regBy'] == "meche4" || $row['regBy'] == "mmee4") {
                $cyear = "ENGG-4";
            }

            ?>
		            <tr>
		              <td><?php echo $count; ?></td>
		              <td><?php echo $row['userId']; ?></td>
		              <td><?php echo $row['userName']; ?></td>
		              <td><?php echo $row['Dept']; ?></td>
		              <td><?php echo $cyear; ?></td>
		              <td><?php echo subCount($row['userId']); ?></td>
		              <td>Registred</td>
		            </tr>
		        <?php endwhile;?>
    </tbody>
      </table>
    <?php
    if ($count == 0) {
            $credit = "Please Register";
        } else {
            $credit = "Registred";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
function stu_chip_Show($table_name, $select_list, $where, $year)
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
		          <?php echo ' <img src="http://<?php echo $link ; ?>/Registrations/upload/' . $row['userId'] . '/' . $row['userId'] . '.jpg">'; ?>
		        </div>
		        <div class="details_box">
		          <div class="details"> <?php echo $row['userName']; ?> </div>
		          <div class="details"> <?php echo $row['userId']; ?> </div>
		          <div class="details"> <?php echo $row['currentYear'] . ',' . $row['userId']; ?> </div>
		          <div class="details"> <?php echo $row['currentYear']; ?> </div>
		        </div>
		        <form action="students_details" method="GET">
		          <input type="hidden" name="userId" value="<?php echo $row['userId']; ?>">
		          <button type="submit">View More..</button>
		        </form>
		      </div>
		    <?php endwhile;
        if ($count == 0) {echo "<div class='notfound'>no User Found</div>";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
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

?>