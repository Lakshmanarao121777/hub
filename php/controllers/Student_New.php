<?php
if($_POST['v0']!=""){
  include_once "../config/DBActivityPHP.php";
  include_once "../config/DBActivityJSON.php";
  include_once "../dependencies/os.php";
  include_once "../dependencies/functions.php";
  $activity_PHP = new DBActivityPHP;
  $activity_JSON =new DBActivity;
  if($_POST['v0']=='forgotPass'){
    $userId=secure_en_input(secure_input_lowercase($_POST['v1']));
    $usertype=secure_en_input($_POST['v2']);
    $to = $userId."@rguktrkv.ac.in";$word = '';
    for($i=0;$i<6;$i++){$word .= mt_rand(0,99);}
    $uname = $activity_PHP->getColValue('students_details',"userId='".$userId."'",'userName');
    $subject=' HUB Password, Recovery Password';
    $message ='<html><body> <p>Dear '.$uname. ',</p><br/> Your Password Has been Updated with temporary one.<p>Please Login into your account with below given Password. And update your Password.</p><h3>Password:'.$word.'</h3><br/>Thank You for using AIR HUB,<br>If you have any queries or any feedback please feel free to write to <a href="mailto:sdc@rguktrkv.org" >sdc@rguktrkv.org </a> .  </body></html>';
    $mm=send_mail($to, $subject, $message);
    if($mm=="success"){
      echo $activity_JSON->UpdateTable('students_details',"password='".$word."'","userId='".$userId."'");
    }
    
    //echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='getSubList'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="r13_freshmode";
    $where='studentId="'.$userId.'"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='sfss'){
    $table_name=secure_en_input($_POST['v1']);
    $year=secure_en_input($_POST['v2']);
    $dept=secure_en_input($_POST['v3']);
    $userId=secure_en_input($_POST['v4']);
    $where=/*'subYear="'.$year.'" && subDept="'.$dept.'" */'userId ="'.$userId.'" ';
    echo $activity_JSON->getRowsValues($table_name,$where);
  } 
  if($_POST['v0']=='show_notices'){
    $table_name=secure_en_input($_POST['v1']);
    $where=' sno!=""  ORDER BY sno DESC';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='sfsf'){
    $table_name='employee_designations';
    $where='office ="AcademicDepartment" && status ="ACTIVE" ';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='check_sub_reg_rem_fresh_status'){
    $userId=secure_en_input($_POST['v1']);
    $subCode=secure_en_input($_POST['v2']);
    $table_name="r13_fm_reg";
    $where='studentId="'.$userId.'" and subjectCode="'.$subCode.'"';
    echo $activity_PHP->getCount($table_name,$where);
  }
  if($_POST['v0']=='check_sub_reg_rem_rem_status'){
    $userId=secure_en_input($_POST['v1']);
    $subCode=secure_en_input($_POST['v2']);
    $table_name="r13_rm_reg";
    $where='studentId="'.$userId.'" and subjectCode="'.$subCode.'"';
    echo $activity_PHP->getCount($table_name,$where);
  }
  if($_POST['v0']=='get_col_value'){
    $table_name=secure_en_input($_POST['v1']);
    $where=$_POST['v2'];
    $col  =secure_en_input($_POST['v3']);
    echo $department=$activity_PHP->getColValue($table_name, $where, $col);
  }
  if($_POST['v0']=='get_col_valueSum'){
    $table_name=secure_en_input($_POST['v1']);
    $where=secure_en_input($_POST['v2']);
    echo $department=$activity_JSON->getRowsValues($table_name, $where);
  }
  if($_POST['v0']=='survey_aamities'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="survey_aamities";
    $where=' userId="'.$userId.'"';
    echo $activity_PHP->getCount($table_name,$where);
  }
  if($_POST['v0']=='aamities'){
    $userId=secure_en_input($_POST['v1']);
    $uni=secure_en_input($_POST['v2']);
    $uni_state=secure_en_input($_POST['v3']);
    $sport_uni=secure_en_input($_POST['v4']);
    $sport_uni_state=secure_en_input($_POST['v5']);
    $formal_show=secure_en_input($_POST['v6']);
    $formal_show_state=secure_en_input($_POST['v7']);
    $sport_show=secure_en_input($_POST['v8']);
    $sport_show_state=secure_en_input($_POST['v9']);
    $blancket=secure_en_input($_POST['v10']);
    $blancket_state=secure_en_input($_POST['v11']);
    $pillow=secure_en_input($_POST['v12']);
    $pillow_state=secure_en_input($_POST['v13']);
    $uname = $activity_PHP->getColValue('students_details',"userId='".$userId."'",'userName');
    $cY=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'currentYear');
    $gender = $activity_PHP->getColValue('students_details',"userId='".$userId."'",'gender');
    $tabl = "survey_aamities";
    $col = "userId,userName,currentYear,gender,regDate,uniform_dress,uni_state,sports_dress,sports_state,formal_shoes,formal_shoes_state,sports_shoes,sports_shoes_state,blancket,blancket_state,pillow,pillow_state";
    $values = "'$userId','$uname','$cY','$gender','$time','$uni','$uni_state','$sport_uni','$sport_uni_state','$formal_show','$formal_show_state','$sport_show','$sport_show_state','$blancket','$blancket_state','$pillow','$pillow_state'";
    echo $activity_JSON->inserting($tabl, $col, $values);
  }
  if ($_POST['v0'] == 'rem_reg') {
    $count = $_POST['v1'];
    $uid = $_POST['v2'];$i=0;
    while ($i<$count)
    {
        $k1 = $i + 3;
        $k2 = $i + 4;
        $k3 = $i + 5;
        //$sub = $_POST['v' . $k];
        $ssem = $_POST['v' . $k1];
        $sbat = $_POST['v' . $k2];
        $sub  = $_POST['v' . $k3];
        $where = "userId='" . $uid . "'";
        $uname = $activity_PHP->getColValue('students_details', $where, 'userName');
        $where = "subjectCode='" . $sub . "'";
        $sname = $activity_PHP->getColValue('r13_freshmode', $where, 'subName');
        //$ssem = $activity_PHP->getColValue('r13_freshmode', $where, 'SEM');
        
        $sdept = $activity_PHP->getColValue('students_details', "userId='" . $uid . "'", 'Department');
        $tabl = "r13_rm_reg";
        $col = "studentId,studentName,subName,subjectCode,subjectSem,department,regDate";
        $values = "'$uid','$uname','$sname','$sub','$ssem','$sdept','$sbat'";
        echo $activity_JSON->inserting($tabl, $col, $values);
        $i=$i+3;
    }
  }
  if($_POST['v0']=='getAvail_messSurvey'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="survey_mess";
    $where='sno !=""';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='messallotment_check'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="survey_mess_allotment";
    $where='userId ="'.$userId.'" limit 1';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='messallotmentDelete'){
    $sno=secure_en_input($_POST['v1']);
    $table_name="survey_mess_allotment";
    $where='sno ="'.$sno.'"';
    echo $activity_JSON->DeleteColum($table_name,$where);
  }
  if($_POST['v0']=='messallotment'){
    $userId=secure_en_input($_POST['v1']);
    $mess=secure_en_input($_POST['v2']);
    $m1=secure_en_input($_POST['v3']);
    $m2=secure_en_input($_POST['v4']);
    $m3=secure_en_input($_POST['v5']);
    $m4=secure_en_input($_POST['v6']);
    $table_name="survey_mess_allotment";
    $where='userId ="'.$userId.'" ';
    if( $activity_PHP->getCount($table_name,$where) == 0){
      $col="userId,currentMess,op1,op2,op3,op4,regDate";
      $values="'$userId','','$m1','$m2','$m3','$m4','$time'";
      echo $activity_JSON->inserting($table_name, $col, $values);
      //$whereset  = "op1='$m1',op2='$m2',op3='$m3',op4='$m4',regDate='$time'";
      //$where ="userId='$userId'";
      //echo $activity_JSON->UpdateTable($table_name, $whereset, $where);
    }

    
  }
  if($_POST['v0']=='check_messSurvey_len'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="survey_mess_response";
    $where='userId ="'.$userId.'"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='getSclValues'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="students_scholrship";
    $where='userId ="'.$userId.'"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='getChaValues'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="students_chalan";
    $where='userId ="'.$userId.'"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='check_messSurvey_feed'){
    $userId=secure_en_input($_POST['v1']);
    $period=secure_en_input($_POST['v2']);
    $table_name="survey_mess_response";
    $where='userId ="'.$userId.'" and period = "'.$period.'"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='check_messSurvey'){
    $userId=secure_en_input($_POST['v1']);
    $period=secure_en_input($_POST['v2']);
    $table_name="survey_mess_response";
    $where='userId ="'.$userId.'" and period ="'.$period.'"';
    echo $activity_PHP->getCount($table_name,$where);
  }
  if($_POST['v0']=='submit_mess_responce_history'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="survey_mess_response";
    $where='userId ="'.$userId.'"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='submit_mess_responce'){
    $userId=secure_en_input($_POST['v1']);
    $mess=secure_en_input($_POST['v2']);
    $period=secure_en_input($_POST['v3']);
    $q1=secure_en_input($_POST['v4']);
    $q2=secure_en_input($_POST['v5']);
    $q3=secure_en_input($_POST['v6']);
    $q4=secure_en_input($_POST['v7']);
    $q5=secure_en_input($_POST['v8']);
    $q6=secure_en_input($_POST['v9']);
    $q52=secure_en_input($_POST['v10']);
    $q53=secure_en_input($_POST['v11']);
    $q7=secure_en_input($_POST['v12']);
    $table_name="survey_mess_response";
    $col="userId,period,regDate,q1,q2,q3,q4,q5,q6,mess,q52,q53,q7";
    $values="'$userId','$period','$time','$q1','$q2','$q3','$q4','$q5','$q6','$mess','$q52','$q53','$q7'";
    echo $activity_JSON->inserting($table_name, $col, $values);
  }
  if($_POST['v0']=='submit_faculty_feed'){
    $userId=secure_en_input($_POST['v1']);
    $cclass=secure_en_input($_POST['v2']);
    $subname=secure_en_input($_POST['v3']);
    $subjefac=secure_en_input($_POST['v4']);
    $q1=secure_en_input($_POST['v5']);
    $q2=secure_en_input($_POST['v6']);
    $q3=secure_en_input($_POST['v7']);
    $q4=secure_en_input($_POST['v8']);
    $q5=secure_en_input($_POST['v9']);
    $q6=secure_en_input($_POST['v10']);
    $q7=secure_en_input($_POST['v11']);
    $q8=secure_en_input($_POST['v12']);
    $q9=secure_en_input($_POST['v13']);
    $q10=secure_en_input($_POST['v14']);
    $table_name="survey_faculty_ay1819s1";
    $uname = $activity_PHP->getColValue('employee_designations','userId ="'.$subjefac.'"', 'userName');
    $department = $activity_PHP->getColValue('students_details', 'userId ="'.$userId.'"', 'Department');
    $currentYear = $activity_PHP->getColValue('students_details', 'userId ="'.$userId.'"', 'currentYear');
    $col="userId,employeeId,employeeName,subName,department,currentYear,currentClass,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,regDate";
    $values="'$userId','$subjefac','$uname','$subname','$department','$currentYear','$cclass','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$time'";
    echo $activity_JSON->inserting($table_name, $col, $values);
         $activity_JSON->UpdateTable("students_details","currentClass='".$cclass."'","userId='".$userId."'" );
  }
  if($_POST['v0']=='check_sub_feedback'){
    $userId=secure_en_input($_POST['v1']);
    $subcode=secure_en_input($_POST['v2']);
    $table_name="survey_faculty_ay1819s1";
    $where='userId ="'.$userId.'" and subName = "'.$subcode.'"';
    echo $activity_PHP->getCount($table_name,$where);
  }
  if($_POST['v0']=='lonterninsert'){
    $userId=secure_en_input($_POST['v1']);
    $industryName=secure_en_input($_POST['v2']);
    $industyAddress=secure_en_input($_POST['v3']);
    $internLangth=secure_en_input($_POST['v4']);
    $joiningDate=secure_en_input($_POST['v5']);
    $hrName=secure_en_input($_POST['v6']);
    $hrMobile=secure_en_input($_POST['v7']);
    $hrEmail=secure_en_input($_POST['v8']);
    $relevingDate=secure_en_input($_POST['v9']);
    $guideName=secure_en_input($_POST['v10']);
    $guideMobile=secure_en_input($_POST['v11']);
    $guideEmail=secure_en_input($_POST['v12']);
    $table_name="longintern";
    $col="userId,industryName,industyAddress,internLangth,joiningDate,hrName, hrMobile,hrEmail,relevingDate,guideName,guideMobile,guideEmail,regDate";
    $values="'$userId','$industryName','$industyAddress','$internLangth','$joiningDate','$hrName','$hrMobile','$hrEmail','$relevingDate','$guideName','$guideMobile','$guideEmail','$time'";
    echo $activity_JSON->inserting($table_name, $col, $values);
  }
  if($_POST['v0']=='s2reg'){
    $userId=secure_en_input($_POST['v1']);
    $subCount=secure_en_input($_POST['v2']);
    $c=0;$k=0;
    $uname = $activity_PHP->getColValue('students_details',"userId='".$userId."'",'userName');
    $cY=$activity_PHP->getColValue('students_details',"userId='".$userId."'",'currentYear');
    $gender = $activity_PHP->getColValue('students_details',"userId='".$userId."'",'gender');
    $dept = $activity_PHP->getColValue('students_details',"userId='".$userId."'",'Department');
    $cclass = $activity_PHP->getColValue('students_details',"userId='".$userId."'",'currentClass');
    for($i=0;$i<$subCount;$i++){
      $k=$i+3;
      $subCode = secure_en_input($_POST['v'.$k]);
      $subName = $activity_PHP->getColValue('ay1819s2Subjects',"subCode='".$subCode."'",'subName');
      $subType = $activity_PHP->getColValue('ay1819s2Subjects',"subCode='".$subCode."'",'subType');
      $subCredit = $activity_PHP->getColValue('ay1819s2Subjects',"subCode='".$subCode."'",'subCredit');
      $tabl = "ay1819s2reg";
      $col = "userId,userName,currentYear,gender,regDate,Department,currentClass,subCode,subName,subCredit,subType";
      $values = "'$userId','$uname','$cY','$gender','$time','$dept','$cclass','$subCode','$subName','$subCredit','$subType'";
      $activity_JSON->inserting($tabl, $col, $values);
      $c++;
    }
    if($c==$subCount) {
      echo"success";
    }
  }
  if($_POST['v0']=='check_s2sub_reg'){
    $userId=secure_en_input($_POST['v1']);
    $table_name="ay1819s2reg";
    $where='userId ="'.$userId.'"';
    echo $activity_PHP->getCount($table_name,$where);
  }
  if($_POST['v0']=='delte'){
    $sno=secure_en_input($_POST['v1']);
    $table_name="ay1819s2reg";
    $where='sno ="'.$sno.'"';
    echo $activity_JSON->DeleteColum($table_name,$where);
  }
  if($_POST['v0']=='getE3E4subListCore'){
    $cYear=secure_en_input($_POST['v1']);
    $dept=secure_en_input($_POST['v2']);
    $table_name="ay1819s2Subjects";
    $where='subDept ="'.$dept.'" and subYear="'.$cYear.'" and subType="CORE"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='getE3E4subListFreeElective'){
    $cYear=secure_en_input($_POST['v1']);
    $dept=secure_en_input($_POST['v2']);
    $table_name="ay1819s2Subjects";
    $where='subDept ="'.$dept.'" and subYear="'.$cYear.'" and subType="FREE ELECTIVE"';
    echo $activity_JSON->getRowsValues($table_name,$where);
  }
  if($_POST['v0']=='getE3E4subListElective'){
    $cYear=secure_en_input($_POST['v1']);
    $dept=secure_en_input($_POST['v2']);
    $table_name="ay1819s2Subjects";
    $where='subDept ="'.$dept.'" and subYear="'.$cYear.'" and (subType!="CORE") ';
    echo $activity_JSON->getGROUP($table_name,$where,'electiveNumber');
  }
  if($_POST['v0']=='getE3E4subListElectiveSub'){
    $cYear=secure_en_input($_POST['v1']);
    $dept=secure_en_input($_POST['v2']);
    $elec=secure_en_input($_POST['v3']);
    $table_name="ay1819s2Subjects";
    $where='subDept ="'.$dept.'" and subYear="'.$cYear.'" and electiveNumber="'.$elec.'" and ( subType!="CORE") ';
    echo $activity_JSON->getRowsValues($table_name,$where,'electiveNumber');
  }
}
else{
 header("Location:../includes/logout.php");
}

?>