 <?php



if (isset($_POST['v0'])) {
    include_once "../config/Security.php";
    include_once "../dependencies/os.php";
    include_once "../dependencies/functions.php";

    include_once "../config/DBActivityPHP.php";
    include_once "../config/DBActivityJSON.php";
    $activity_PHP = new DBActivityPHP;
    $activity_JSON =new DBActivity;
    if($_POST['v0'] == 'showuser'){
        $userId = $_POST['v1'];
        $table_name = 'students_olms';
        $where = 'userId ="'.$userId.'" and (( status !="Cancel" and status !="Pending") and (status ="chekedOut"  or status="approved" ))  ';
        $select =' * ';
        echo $activity_JSON-> getRowsValues($table_name, $where, $select);
    }
    if($_POST['v0'] == 'updateoutingsecurity'){
        $sno = $_POST['v1'];
        $table_name = 'students_olms';
        $where_set = 'securityOutDate ="'.$time.'" , status ="chekedOut", securityOutIp ="'.$ip.'", securityOut ="Security" ';
        $where_update =' sno ="'.$sno.'" ';
        echo $activity_JSON-> UpdateTable($table_name, $where_set, $where_update);
    }
    if($_POST['v0'] == 'updateInsecurity'){
        $sno = $_POST['v1'];
        $table_name = 'students_olms';
        $where_set = 'securityInDate ="'.$time.'" , status ="chekedIn", securityInIp ="'.$ip.'", securityOut ="Security" ';
        $where_update =' sno ="'.$sno.'" ';
        echo $activity_JSON-> UpdateTable($table_name, $where_set, $where_update);
    }
    if($_POST['v0'] == 'InsertRemarkUpdate'){
        $userId = $_POST['v1'];
        $fdate = $_POST['v2'];
        $rdate = $_POST['v3'];
        $table_name = 'students_olms';
        $userName=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'userName');
        $currentYear=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'currentYear');
        $currentClass=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'currentClass');
        $Department=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'Department');
        $hostel=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'hostel');
        $gender=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'gender');
        $remarks='User leaved campus without any Intimation to Authorities.';
        $colums ='userId,userName,currentYear,currentClass,Department,status,fdate,rdate,securityIn,securityInDate,securityInIp,hostel,gender,remarks';

        $values ="'$userId','$userName','$currentYear','$currentClass','$Department','checkedIn','$fdate','$rdate','Security','$time','$ip','$hostel','$gender','$remarks'";
        if($fdate!='' && $rdate !=''){
            echo $activity_JSON-> inserting($table_name, $colums, $values);
        }
    }





    if ($_POST['v0'] == 'load_olms_out') {
        $start = $_POST['v1'];
        $end = $_POST['v2'];
        $select_list = " * ";
        $where = "status='approved'";
        echo load_olms('students_olms', $select_list, $start, $end, $where);
    }
    if ($_POST['v0'] == 'load_olms_in') {
        $start = $_POST['v1'];
        $end = $_POST['v2'];
        $select_list = " * ";
        $where = "status='chekedOut'";
        echo load_olms('students_olms', $select_list, $start, $end, $where);
    }
    if ($_POST['v0'] == 'load_olms_update_out') {
        session_start();
        $sno = $_POST['v1'];
        $action = $_POST['v2'];
        $string = " status='" . $action . "',securityOut='" . $_SESSION['USER_ID'] . "',securityOutDate='" . $time . "',securityOutIp='" . $ip . "' where sno='" . $sno . "'";
        echo load_olms_update('students_olms', $string);

        $userId=  getColValue('students_olms', "sno='" . $sno . "'",'userId', '*');
        $string = " status='" . $action . "' where userId='" . $userId . "'";
        load_olms_update('students_details', $string);
        load_olms_update('hms_allotment', $string);
    }
    if ($_POST['v0'] == 'load_olms_update_in') {
        session_start();
        $sno = $_POST['v1'];
        $action = $_POST['v2'];
        $string = " status='" . $action . "',securityIn='" . $_SESSION['USER_ID'] . "',securityInDate='" . $time . "',securityInIp='" . $ip . "' where sno='" . $sno . "'";
        echo load_olms_update('students_olms', $string);

        $userId=  getColValue('students_olms', "sno='" . $sno . "'",'userId', '*');
        $string = " status='" . $action . "' where userId='" . $userId . "'";
        load_olms_update('students_details', $string);
        load_olms_update('hms_allotment', $string);
    }

}
else{
 header("Location:../includes/logout.php");
}
?>