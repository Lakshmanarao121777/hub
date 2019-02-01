<?php

if($_POST['v0']!=""){
	include_once "../config/DBActivityPHP.php";
	include_once "../config/DBActivityJSON.php";
	include_once "../dependencies/os.php";
	include_once "../dependencies/functions.php";
$activity_PHP = new DBActivityPHP;
$activity_JSON =new DBActivity;
	if($_POST['v0']=='markingAtt_stu'){
		$userId=secure_en_input($_POST['v1']);
		$date=date("Y-m-d");
		$table_name="students_attendance";
		$count=$activity_PHP -> getCount($table_name,"userId='$userId' and date='$date' ");
		if($count==0){
			$currentYear=$activity_PHP->getColValue("students_details", "userId='$userId'" ,'currentYear');
			$gender=$activity_PHP->getColValue("students_details", "userId='$userId'" , 'gender');
			$branch=$activity_PHP->getColValue("students_details", "userId='$userId'" ,'Department');
			$name=$activity_PHP->getColValue("students_details", "userId='$userId'" ,'userName');
			if(date("H:i")>="08:00"&&date("H:i")<="11:00"){
				$colms = "userId,s1time,s1Ip,currentYear,branch,gender,date,userName";
			}
			if(date("H:i")>="11:30"&&date("H:i")<="13:00"){
				$colms = "userId,s2time,s2Ip,currentYear,branch,gender,date,userName";
			}
			if(date("H:i")>="13:30"&&date("H:i")<="15:30"){
				$colms = "userId,s3time,s3Ip,currentYear,branch,gender,date,userName";
			}
			if(date("H:i")>="15:30"&&date("H:i")<="17:30"){
				$colms = "userId,s4time,s4Ip,currentYear,branch,gender,date,userName";
			}
			if(date("H:i")>="20:00"&&date("H:i")<="20:45"){
				$colms = "userId,s5time,s5Ip,currentYear,branch,gender,date,userName";
			}
			$values= "'$userId','$time','$ip','$currentYear','$branch','$gender','$date','$name'";
			echo $activity_JSON->inserting($table_name, $colms, $values);
		}
		else{
			if(date("H:i")>="08:00"&&date("H:i")<="11:00"){
				$where_set = "s1time='$time',s1Ip='$ip'";
			}
			if(date("H:i")>="11:00"&&date("H:i")<="13:00"){
				$where_set = "s2time='$time',s2Ip='$ip'";
			}
			if(date("H:i")>="13:30"&&date("H:i")<="15:30"){
				$where_set = "s3time='$time',s3Ip='$ip'";
			}
			if(date("H:i")>="15:30"&&date("H:i")<="17:30"){
				$where_set = "s4time='$time',s4Ip='$ip'";
			}
			if(date("H:i")>="20:00"&&date("H:i")<="20:45"){
				$where_set = "s5time='$time',s5Ip='$ip'";
			}
			$where_update= "userId='$userId' and date='$date'";
			echo $activity_JSON->UpdateTable($table_name, $where_set, $where_update);
		}
	}
	if($_POST['v0']=='updateClasss'){
		$userId=secure_en_input($_POST['v1']);
		$abcc=secure_en_input($_POST['v2']);
		$where_set = "currentClass='$abcc'";
		$where_update= "userId='$userId'";
		$table_name ="students_details";
		echo $activity_JSON->UpdateTable($table_name, $where_set, $where_update);
	}
	if($_POST['v0']=='StatAtt_stu'){
		$userId=secure_en_input($_POST['v1']);
		$date=date("Y-m-d");
		$table_name="students_attendance";
		$where = "userId='$userId'";
		echo $activity_JSON->getRowsValues($table_name, $where);
	}
	if($_POST['v0']=='auth_stu_cr'){
		$userId=secure_en_input($_POST['v1']);
		$crClass=$activity_PHP->getColValue("students_details", "userId='$userId'" , 'currentClass');
		$date=date("Y-m-d");
		$isCR  = $activity_PHP->getColValue("students_details", "userId='$userId'","isAttendanceCr");
    if ($isCR=="Yes") {
			$table_name="students_attendance";
			$where = "currentClass='$crClass' and date='$date'";
			echo $activity_JSON->getRowsValues($table_name, $where);
		}
		else{
			echo "Your are not allowed.";
		}
	}
	if($_POST['v0']=='auth_stu_cr_auth1'){
		$userId=secure_en_input($_POST['v1']);
		$ses = secure_en_input($_POST['v2']);
		$stuId=secure_en_input($_POST['v3']);
		$table_name="students_attendance";
		$date=date("Y-m-d");
		if($ses=="s1"){
			$where_set = "s1appTime='$time',s1appIp='$ip',s1appBy='$userId' ";
		}
		if($ses=="s2"){
			$where_set = "s2appTime='$time',s2appIp='$ip',s2appBy='$userId' ";
		}
		if($ses=="s3"){
			$where_set = "s3appTime='$time',s3appIp='$ip',s3appBy='$userId' ";
		}
		if($ses=="s4"){
			$where_set = "s4appTime='$time',s4appIp='$ip',s4appBy='$userId' ";
		}
		if($ses=="s5"){
			$where_set = "s5appTime='$time',s5appIp='$ip',s5appBy='$userId' ";
		}
		$where_update= "userId='$stuId' and date='$date'";
		echo $activity_JSON->UpdateTable($table_name, $where_set, $where_update);
	}
	if($_POST['v0']=='auth_stu_cr_auth2'){
		$userId=secure_en_input($_POST['v1']);
		$ses = secure_en_input($_POST['v2']);
		$stuId=secure_en_input($_POST['v3']);
		$table_name="students_attendance";
		$date=date("Y-m-d");
		if($ses=="s1"){
			$where_set = "s1time='',s1Ip='' ";
		}
		if($ses=="s2"){
			$where_set = "s2time='',s2Ip='' ";
		}
		if($ses=="s3"){
			$where_set = "s3time='',s3Ip='' ";
		}
		if($ses=="s4"){
			$where_set = "s4time='',s4Ip='' ";
		}
		if($ses=="s5"){
			$where_set = "s5time='',s5Ip='' ";
		}
		$where_update= "userId='$stuId' and date='$date'";
		echo $activity_JSON->UpdateTable($table_name, $where_set, $where_update);
	}
	if($_POST['v0']=="generateReport"){
		$date=date_array(secure_en_input($_POST['v1']));
		$userId=secure_en_input($_POST['v2']);
		$odate=$date[0].'-'.$date[1].'-'.$date[2];
		$date=$odate;
		$isCR  = $activity_PHP->getColValue("students_details", "userId='$userId'","isAttendanceCr");
		$crClass=$activity_PHP->getColValue("students_details", "userId='$userId'" , 'currentClass');
    if ($isCR=="Yes") {
			$table_name="students_attendance";
			$where = "currentClass='$crClass' and date='$date'";
			echo $activity_JSON->getRowsValues($table_name, $where);
		}
		else{
			echo "Your are not allowed.";
		}
	}
	if($_POST['v0']=="downloadReport"){
		$date=date_array(secure_en_input($_POST['v1']));
		$userId=secure_en_input($_POST['v2']);
		$odate=$date[0].'-'.$date[1].'-'.$date[2];
		$date=$odate;
		$isCR  = $activity_PHP->getColValue("students_details", "userId='$userId'","isAttendanceCr");
		$crClass=$activity_PHP->getColValue("students_details", "userId='$userId'" , 'currentClass');
    	if ($isCR=="Yes") {
			$table_name="students_attendance";
			$where = "currentClass='$crClass' and date='$date'";
			//echo $activity_JSON->getRowsValues($table_name, $where);
			echo $activity_JSON->getRowsValuesDownload($table_name, $where);
		}
		else{
			echo "Your are not allowed.";
		}
	}
}
else{
 header("Location:../includes/logout.php");
}
?>