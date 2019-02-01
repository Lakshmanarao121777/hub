<?php


if (isset($_POST['v0'])) {
    include_once "../config/Student.php";
    include_once "../dependencies/os.php";
    include_once "../dependencies/functions.php";
    $activity_student = new activity_student;
    session_start();
    if ($_POST['v0'] == "showresults") {
        $username = $_POST['v1'];
        $select_list = " * ";
        $where = " studentId='" . $username . "'";
        echo results('sem1_regular_results', $select_list, $where);
    }
    if ($_POST['v0'] == "showseating") {
        $username = $_POST['v1'];
        $select_list = " * ";
        $where = " studentId='" . $username . "'";
        echo seating('sem1_regular_seating', $select_list, $where);
    }
    if ($_POST['v0'] == 'load_notice') {
        $start = $_POST['v1'];
        $end = $_POST['v2'];
        $select_list = " * ";
        echo load_notice('notice_board', $select_list, $start, $end);
    }
    if ($_POST['v0'] == 'changepassword')  {
        $oldPass= secure_en_input($_POST['v3']);
        $newPass = secure_en_input($_POST['v2']);
        $userId = secure_en_input($_POST['v1']);
        $table_name = 'students_details';
        $where_set ="password='$newPass'";
        $where_update=" userId='$userId' and password='$oldPass'";
        echo $activity_student->UpdateTable($table_name, $where_set, $where_update);
        $table_name2='logs';
        $colms2="regBy,regDate,regIP,action,remarks";
        $values2="'$userId','$time','$ip','Password Update','".$userId." Updated his Password'";
        $activity_student->inserting($table_name2, $colms2, $values2);
    }
    if ($_POST['v0'] == 'Personal') {
        $idn = $_POST['v1'];
        $select = "*";
        $where = "userId='" . $idn . "'";
        echo showpersonal_Profile("students_details", $select, $where);
    }
    if ($_POST['v0'] == 'Acadamic') {
        $idn = $_POST['v1'];
        $select = " *";
        $where = "userId='" . $idn . "' ";
        echo showacadamic_Profile("students_academices", $select, $where);
    }
    if ($_POST['v0'] == 'getAcaCount') {
        $idn = $_POST['v1'];
        $table_name = "students_academices";
        $where = "where userId='$idn'";
        echo getCount($table_name, $where);
    }
    if ($_POST['v0'] == 'Misc') {
        $idn = $_POST['v1'];
        $select = "*";
        $where = "userId='" . $idn . "'";
        echo showachivements_Profile("students_achivements", $select, $where);
    }
    if ($_POST['v0'] == 'freshmode') {
        $count = $_POST['v1'];
        $uid = $_POST['v2'];
        for ($i = 0; $i < $count; $i++) {
            $k = $i + 3;
            $sub = $_POST['v' . $k];

            $where = "WHERE userId='" . $uid . "'";
            $uname = getDetfresh('students_details', $where, 'userName');
            $where = "WHERE subjectCode='" . $sub . "'";
            $sname = getDetfresh('r13_freshmode', $where, 'subjectName');
            $ssem = getDetfresh('r13_freshmode', $where, 'SEM');
            $sdept = getDetfresh('r13_freshmode', $where, 'Branch');
            $tabl = "r13_fm_reg";
            $col = "studentId,studentName,subjectName,subjectCode,subjectSem,department,regDate";
            $values = "'$uid','$uname','$sname','$sub','$ssem','$sdept','$time'";
            echo $activity_student->inserting("r13_fm_reg", $col, $values);
        }
    }
    if ($_POST['v0'] == 'update_profile') {
        $col = $_POST['v1'];
        $idn = $_POST['v2'];
        $val = $_POST['v3'];
        $tbl = $_POST['v4'];
        $sql = "UPDATE $tbl  SET $col='$val' where userId= '$idn' ";
        echo changepassword($sql);
    }
    if ($_POST['v0'] == 'add_achivement') {
        $atype = $_POST['v1'];
        $atitle = $_POST['v2'];
        $aarea = $_POST['v3'];
        $adis = $_POST['v4'];
        $ayear = $_POST['v5'];
        $aref = $_POST['v6'];
        $aid = $_POST['v7'];
        $tbl = "students_achivements";
        $col = "userId,achivementType,achivementYear,achivementTitle,achivementDis,achivementArea,achivementreference,regDate";
        $val = "'$aid','$atype','$ayear','$atitle','$adis','$aarea','$aref','$time'";
        echo $activity_student->inserting($tbl, $col, $val);
    }
    if ($_POST['v0'] == 'delete_achivement') {
        $sno = $_POST['v1'];
        $tbl = "students_achivements";
        $val = "sno='" . $sno . "'";
        echo deleting($tbl, $val);
    }
    if ($_POST['v0'] == 'minor_show') {
        $branch = $_POST['v1'];
        $uid = $_POST['v2'];
        $year = currentYear('students_details', 'currentYear', 'where userId="' . $uid . '" '); 
        $cbranch = currentYear('students_details', 'Department', 'where userId="' . $uid . '" ');
        $tbl = "minor_subjects";
        $val = "WHERE BranchBy='" . $branch . "'and cYear='" . $year . "' and Allowed LIKE'%" . $cbranch . "%'";
        echo show_minor($tbl, $val);
        //echo $year;
    }
    if ($_POST['v0'] == 'minor') {
        $count = $_POST['v1'];
        $uid = $_POST['v2'];
        for ($i = 0; $i < $count; $i++) {
            $k = $i + 3;
            $sub = $_POST['v' . $k];
            $cyear = currentYear('students_details', 'currentYear', 'where userId="' . $uid . '" ');
            $cdept = currentYear('students_details', 'Department', 'where userId="' . $uid . '" ');
            $uname = currentYear('students_details', 'userName', 'where userId="' . $uid . '" ');

            $sname = currentYear('minor_subjects', 'subName', 'where sno="' . $sub . '" ');
            $mBranch = currentYear('minor_subjects', 'BranchBy', 'where sno="' . $sub . '" ');
            if ($mBranch == "PHYSICS") {
                if ($i < 4) {
                    $tabl = "minor_reg";
                    $col = "userId,userName,Department,currentYear,subName,minorBranch,regDate";
                    $values = "'$uid','$uname','$cdept','$cyear','$sname','$mBranch','$time'";
                    echo $activity_student->inserting("minor_reg", $col, $values);
                }
            } else {
                if ($i < 2) {
                    $tabl = "minor_reg";
                    $col = "userId,userName,Department,currentYear,subName,minorBranch,regDate";
                    $values = "'$uid','$uname','$cdept','$cyear','$sname','$mBranch','$time'";
                    echo $activity_student->inserting("minor_reg", $col, $values);
                }
            }
        }
    }
    if ($_POST['v0'] == 'addtoacadamics') {
        $uid = $_POST['v1'];
        $name = currentYear('students_details', 'userName', 'where userId="' . $uid . '" ');
        $year = currentYear('students_details', 'currentYear', 'where userId="' . $uid . '" ');
        $branch = currentYear('students_details', 'Department', 'where userId="' . $uid . '" ');
        $status = currentYear('students_details', 'currentYear', 'where userId="' . $uid . '" ');
        $jo = currentYear('students_details', 'joining', 'where userId="' . $uid . '" ');
        $col = "userId,userName,Department,currentYear,status,joining";
        $values = "'$uid','$name','$branch','$year','$status','$jo'";
        echo $activity_student->inserting("students_academices", $col, $values);
        //echo $year;
    }
    if ($_POST['v0'] == 'load_olms') {
        $start = $_POST['v1'];
        $end = $_POST['v2']; 
        $select_list = " * ";
        $where = "userId='" . $_SESSION['USER_ID'] . "'";
        echo load_olms('students_olms', $select_list, $start, $end, $where);
    }
    if ($_POST['v0'] == 'load_leave') {
        $start = $_POST['v1'];
        $end = $_POST['v2'];
        $select_list = " * ";
        $where = "userId='" . $_SESSION['USER_ID'] . "'";
        echo load_leaves('students_olms', $select_list, $start, $end, $where);
    } 
    if ($_POST['v0'] == 'cancel_stu_olms') {
        $sno = $_POST['v1'];
        include_once "../config/DBActivityPHP.php";
        $activity_PHP = new DBActivityPHP;
        echo $activity_PHP->DeleteColum('students_olms', "sno= '$sno'");
    }
    if ($_POST['v0'] == 'save_stu_olms') {
        $sno = $_POST['v1'];
        $titles_val = $_POST['v2'];
        $reason = $_POST['v3'];
        $fdate = $_POST['v4'];
        $rdate = $_POST['v5'];
        if($fdate !="" && $titles_val!=""&& $reason!="" && $rdate !="" && strlen($titles_val) > 15 && strlen($reason) > 15){
            $sql = "UPDATE students_olms SET rdate='$rdate',fdate='$fdate',title='$titles_val',reason='$reason' where sno= '$sno' and userId='" . $_SESSION['USER_ID'] . "' ";
            echo changepassword($sql);
        }
    }
    if ($_POST['v0'] == 'load_olms_query') {
        $userId = $_POST['v1'];
        $status = $_POST['v2'];
        $branch = $_POST['v3'];
        $cyear = $_POST['v4'];
        $cclass = $_POST['v5'];
        $apdate = $_POST['v6'];
        $lvdate = $_POST['v7'];
        $cclass = "ALL";
        $dd = date_array($apdate);
        $select_list = " * ";

        $ui = "userId= '" . $userId . "' ";
        if ($status == "all") {$ss = " and status!='' ";} else if ($status == "pending") {$ss = " and status='' ";} else { $ss = " and status='$status' ";}
        if ($cyear == "ALL") {$cy = " and currentYear!='' ";} else { $cy = " and currentYear='$cyear' ";}
        if ($branch == "ALL") {$cb = " and Department!='' ";} else { $cb = " and Department='$branch' ";}
        if ($cclass == "ALL") {$cc = " and currentClass!='' ";} else { $cc = " and currentClass='$cclass' ";}
        if (sizeof($dd) == 3) {$d = $dd[2] . ':' . $dd[1] . ':' . $dd[0];
            $regDate = "and regDate LIKE '%" . $d . "'";} else { $regDate = "and regDate!=''";}
        ;
        $where = $ui . $ss . $cy . $cb . $cc . $regDate . " and fdate='$lvdate' ";
        echo load_olms_queryss('students_olms', $select_list, $where);
    }
    if ($_POST['v0'] == 'laptop_survey') {
        $uid = $_POST['v1'];
        $name = currentYear('students_details', 'userName', 'where userId="' . $uid . '" ');
        $year = currentYear('students_details', 'currentYear', 'where userId="' . $uid . '" ');
        $branch = currentYear('students_details', 'Department', 'where userId="' . $uid . '" ');
        $classe = currentYear('students_details', 'bed', 'where userId="' . $uid . '" ');
        $lap = $_POST['v2'];
        $status = $_POST['v3'];
        if ($status == "yes") {$problem = $_POST['v4'];
            $col = "userId,userName,Department,currentYear,laptop_serial,problem,currentClass,regDate,ip";
            $values = "'$uid','$name','$branch','$year','$lap','$problem','$classe','$time','$ip'";} else {
            $col = "userId,userName,Department,currentYear,laptop_serial,currentClass,regDate,ip";
            $values = "'$uid','$name','$branch','$year','$lap','$classe','$time','$ip'";}
        echo $activity_student->inserting("laptop_survey", $col, $values);
    }
    if($_POST['v0']=='summer_sem_rem_reg'){
        $count = $_POST['v1'];
        $uid = $_POST['v2'];
        for ($i = 0; $i < $count; $i++) {
            $k = $i + 3;
            $subName = $_POST['v' . $k];
            $where_set="status='Registred',regDate='$time' ";
            $where_update="userId='$uid' and sno='$subName'";
            echo $activity_student->UpdateTable("ay1819SummerSem", $where_set, $where_update);
        }
    }
    if($_POST['v0']=='cdpc_survey'){
        $openion1 = $_POST['v1'];
        $openion2 = $_POST['v2'];
        $userId = $_POST['v3'];
        $colums="userId,IsIntersted,Intersted_cat,regDate";
        $values="'$userId','$openion1','$openion2','$time'";
        echo $activity_student->inserting("cdpc_srvey", $colums, $values);
    }
    if($_POST['v0']=='dusara'){
        $parent = $_POST['v2'];
        $jdate = $_POST['v3'];
        $userId = $_POST['v1'];
        $uid=$userId;
        $gender = getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","gender");
        $currentYear = getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","currentYear");
        $branch = getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","Department");
        $pm1 = getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","pm1");
        if($parent=="yes"){
        $colums="userId,parentMobile,parent,gender,regDate,currentYear,branch,journyDate";
        $values="'$userId','$pm1','$parent','$gender','$time','$currentYear','$branch','$jdate'";}
        else{
            $jdatet = $_POST['v4'];
            $colums="userId,parentMobile,parent,gender,regDate,currentYear,branch,journyDate,journyType";
            $values="'$userId','$pm1','$parent','$gender','$time','$currentYear','$branch','$jdate','$jdatet'";
        }
        echo $activity_student->inserting("dussehra", $colums, $values);
    }
    if($_POST['v0']=='dusara_delete'){
        $parent = $_POST['v1'];
        echo $activity_student->DeleteColum("dussehra", "userId='$parent'");
    }
}
else{
 header("Location:../includes/logout.php");
}
?>