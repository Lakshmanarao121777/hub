<?php

if($_POST['v0']){
  include_once "../config/payroll.php";
  include_once "../dependencies/os.php";
  include_once "../dependencies/functions.php";
  $payroll = new payroll();
  if (secure_en_input($_POST['v0']) == 'apply_leave') {
    $userId = secure_en_input($_POST['v1']);
    $fromDate = secure_en_input($_POST['v2']);
    $toDate = secure_en_input($_POST['v3']);
    $reason = secure_en_input($_POST['v4']);
    $table_name = 'emp_leaves';
    $colms = "userId,fromDate,toDate,reason,regDate,status";
    $values = "'$userId','$fromDate','$toDate','$reason','$time','Pending'";
    echo $payroll->inserting($table_name, $colms, $values);
  }
  if (secure_en_input($_POST['v0']) == 'show_leave_user') {
    $userId = secure_en_input($_POST['v1']);
    $table_name = 'emp_leaves';
    $where = "userId='$userId'";
    echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'show_leave_admin') {
    //$userId = secure_en_input($_POST['v1']);
    $table_name = 'emp_leaves';
    $where = "userId !=''";
    echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'cancel_leave_user') {
    $sno = secure_en_input($_POST['v1']);
    $table_name = 'emp_leaves';
    $where_set = "remarks='Leave canceled by the user.',status='Cancled',actionDate='$time'   ";
    $where_update = "sno='$sno'";
    echo $payroll->UpdateTable($table_name, $where_set, $where_update);
  }
  if (secure_en_input($_POST['v0']) == 'reject_leave_user') {
    $sno = secure_en_input($_POST['v1']);
    $table_name = 'emp_leaves';
    $where_set = "remarks='Leave rejected by the admin.',status='Rejected',actionDate='$time'   ";
    $where_update = "sno='$sno'";
    echo $payroll->UpdateTable($table_name, $where_set, $where_update);
  }
  if (secure_en_input($_POST['v0']) == 'approve_leave_user') {
    $sno = secure_en_input($_POST['v1']);
    $table_name = 'emp_leaves';
    $where_set = "remarks='Leave Approved by the admin.',status='Approved',actionDate='$time'   ";
    $where_update = "sno='$sno'";
    echo $payroll->UpdateTable($table_name, $where_set, $where_update);
  }
  if (secure_en_input($_POST['v0']) == 'show_paystatement_user') {
    $userId = secure_en_input($_POST['v1']);
    $date = $_POST['v2'];
    $table_name = 'emp_pay_statements';
    $where = "EMPID='$userId' and MMYY='$date' ";
    echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'show_paystatement_getuserDetails') {
    $userId = secure_en_input($_POST['v1']);
    $table_name = 'employee_details';
    $where = "userId='$userId'";
    echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'show_notice_user') {
    //$userId = secure_en_input($_POST['v1']);
    $table_name = 'emp_pay_notice';
    $where = "noticeBody!='' ORDER BY sno DESC";
    echo $payroll->getAllRowsValue($table_name, $where);
  }
}
else{
 header("Location:../includes/logout.php");
}



