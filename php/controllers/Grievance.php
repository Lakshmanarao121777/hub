<?php

if($_POST['v0']!=""){
	include_once "../config/DBActivityPHP.php";
	include_once "../config/DBActivityJSON.php";
	include_once "../dependencies/os.php";
	include_once "../dependencies/functions.php";
	$activity_PHP = new DBActivityPHP;
	$activity_JSON =new DBActivity;
	if($_POST['v0']=='gre_get_col_value'){
		$table_name=secure_en_input($_POST['v1']);
		$where=secure_en_input($_POST['v2']);
		$col  =secure_en_input($_POST['v3']);
		echo $department=$activity_PHP->getColValue($table_name, $where, $col);
	}
	if($_POST['v0']=='gre_insert_complaint'){
		$userId=secure_en_input($_POST['v1']);
		$subject=secure_en_input($_POST['v2']);
		$department=secure_en_input($_POST['v3']);
		$problem=secure_en_input($_POST['v4']);
		$location=secure_en_input($_POST['v5']);
		$table_name="gre_complaints";
		$colms = "userId,department,subject,problem,location,ip,regDate,status";
		$values= "'$userId','$department','$subject','$problem','$location','$ip','$time','Posted'";
		echo $activity_JSON->inserting($table_name, $colms, $values);
	}
	if($_POST['v0']=='gre_show_dept'){
		$table_name="gre_departments";
		$where='status="Active"';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_show_complaints'){
		$userId=secure_en_input($_POST['v1']);
		$table_name="gre_complaints";
		$where='userId="'.$userId.'"';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_show_complaint'){
		$sno=secure_en_input($_POST['v1']);
		$table_name="gre_complaints";
		$where='sno="'.$sno.'"';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_insert_user'){
		$userId=secure_en_input($_POST['v1']);
		$designation=secure_en_input($_POST['v3']);
		$department=secure_en_input($_POST['v2']);
		$table_name="gre_users";
		$colms = "userId,department,designation,status";
		$values= "'$userId','$department','$designation','Active'";
		echo $activity_JSON->inserting($table_name, $colms, $values);
	}
	if($_POST['v0']=='admin_show_complaints'){
		$userId=secure_en_input($_POST['v1']);
		$status=secure_en_input($_POST['v2']);
		$date  =secure_en_input($_POST['v3']);
		$table_name="gre_users";
		$where='userId="'.$userId.'"';
		$department=$activity_PHP->getColValue($table_name, $where, 'department');
		$table_name="gre_complaints";
		$where='department="'.$department.'" and status= "'.$status.'"';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='admin_show_complaint_reject'){
		$sno=secure_en_input($_POST['v1']);
		$table_name = 'gre_complaints';
		$where_update = "sno='".$sno."' ";
		$where_set ='status="Rejected"';
		echo $activity_JSON->UpdateTable($table_name, $where_set, $where_update);
	}
	if($_POST['v0']=='gre_show_users_details'){
		$userId=secure_en_input($_POST['v1']);
		$table_name = 'employee_details';
		$where = "userName LIKE '%" . $userId . "%' or userId LIKE '%" . $userId . "%' ";
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_show_users'){
		$userId=secure_en_input($_POST['v1']);
		$table_name="gre_users";
		$where='userId="'.$userId.'"';
		$department=$activity_PHP->getColValue($table_name, $where, 'department');
		$table_name="gre_users";
		$where='department="'.$department.'" and  status="Active" and designation="Technecian" ';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_show_usersCoor'){
		$userId=secure_en_input($_POST['v1']);
		$table_name="gre_users";
		$where='userId="'.$userId.'"';
		$department=$activity_PHP->getColValue($table_name, $where, 'department');
		$table_name="gre_users";
		$where='department="'.$department.'" and  status="Active" and designation="CoOrdinator" ';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_get_user_value'){
		$userId=secure_en_input($_POST['v1']);
		$table_name="gre_users";
		$where='userId="'.$userId.'"';
		$department=$activity_PHP->getColValue($table_name, $where, 'department');
		$table_name="gre_users";
		$where='department="'.$department.'" and  status="Active"';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_show_usersAsCoor'){
		$userId=secure_en_input($_POST['v1']);
		$table_name="gre_users";
		$where='userId="'.$userId.'"';
		$department=$activity_PHP->getColValue($table_name, $where, 'department');
		$table_name="gre_users";
		$where='department="'.$department.'" and  status="Active" and designation="Associate CoOrdinator" ';
		echo $activity_JSON->getRowsValues($table_name,$where);
	}
	if($_POST['v0']=='gre_change_state'){
		$sno=secure_en_input($_POST['v1']);
		$status=secure_en_input($_POST['v2']);
		$table_name = 'gre_complaints';
		$where_update = "sno='".$sno."' ";
		$where_set ='status="'.$status.'"';
		echo $activity_JSON->UpdateTable($table_name, $where_set, $where_update);
	}
	if($_POST['v0']=='gre_addtoteam_state'){
		$sno=secure_en_input($_POST['v1']);
		$userId=secure_en_input($_POST['v2']);
		$table_name = 'gre_complaints';
		$techTeam=$activity_PHP->getColValue($table_name,"sno='$sno'", 'techTeam');
		if($techTeam=="")$where_set ='techTeam="'.$techTeam.$userId.'"';
		else $where_set ='techTeam="'.$techTeam.','.$userId.'"';
		$where_update = "sno='".$sno."' ";
		
		echo $activity_JSON->UpdateTable($table_name, $where_set, $where_update);
	}
	if($_POST['v0']=='gre_delete_complaint'){
		$sno=secure_en_input($_POST['v1']);
		$table_name="gre_complaints";
		$update_where='sno="'.$sno.'"';
		echo $activity_JSON->DeleteColum($table_name, $update_where);
	}
	if($_POST['v0']=='gre_delete_user'){
		$sno=secure_en_input($_POST['v1']);
		$table_name="gre_users";
		$update_where='sno="'.$sno.'"';
		echo $activity_JSON->DeleteColum($table_name, $update_where);
	}
}
else{
 header("Location:../includes/logout.php");
}
?>