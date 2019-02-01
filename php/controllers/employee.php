<?php
if ($_POST['v0']) {
  include_once "../config/employee.php";
  include_once "../dependencies/os.php";
  include_once "../dependencies/functions.php";
  include_once "../config/DBActivityJSONChart.php";
  $payroll = new employee();
  $payrollPHP = new DBActivityPHP();
  $payrollchart = new DBActivityChart();
  if (secure_en_input($_POST['v0']) == 'addexperience') {
      $jobTitle = secure_en_input($_POST['v1']);
      $jobDesignation = secure_en_input($_POST['v2']);
      $jobFrom = secure_en_input($_POST['v3']);
      $jobTo = secure_en_input($_POST['v4']);
      $jobDiscription = secure_en_input($_POST['v5']);
      $jobCompany = secure_en_input($_POST['v6']);
      $jobWesite = secure_en_input($_POST['v7']);
      $jobCompanyAddress = secure_en_input($_POST['v8']);
      $jobuserId = secure_en_input($_POST['v9']);
      $reguserId = secure_en_input($_POST['v10']);
      $table_name = 'employee_experience';
      $colms = "userId,designation,organizationName,organizationAddress,workedFrom,workedTo,jobTitle,regDate,regBy,organizationwebsite,discription";
      $values = "'$jobuserId','$jobDesignation','$jobCompany','$jobCompanyAddress','$jobFrom','$jobTo','$jobTitle','$time','$reguserId','$jobWesite','$jobDiscription'";
      echo $payroll->inserting($table_name, $colms, $values);
      $table_name2 = 'logs';
      $colms2 = "regBy,regDate,regIP,action,remarks";
      $values2 = "'$reguserId','$time','$ip','Experience Add','" . $jobuserId . " added his Past experience at " . $jobCompany . " as a " . $jobDesignation . " with title name'";
      $payroll->inserting($table_name2, $colms2, $values2);
  }
  if (secure_en_input($_POST['v0']) == 'addcontact') {
      $contactName = secure_en_input($_POST['v1']);
      $contactMobile = secure_en_input($_POST['v2']);
      $contactEmail = secure_en_input($_POST['v3']);
      $contactType = secure_en_input($_POST['v4']);
      $userId = secure_en_input($_POST['v5']);
      $table_name = 'employee_addressbook';
      $colms = "userId,contactName,contactEmail,contactType,contactMobile,regDate";
      $values = "'$userId','$contactName','$contactEmail','$contactType','$contactMobile','$time'";
      echo $payroll->inserting($table_name, $colms, $values);
      $table_name2 = 'logs';
      $colms2 = "regBy,regDate,regIP,action,remarks";
      $values2 = "'$reguserId','$time','$ip','Contact Add','" . $jobuserId . " added a new contact with name " . $contactName . " '";
      $payroll->inserting($table_name2, $colms2, $values2);
  }
  if (secure_en_input($_POST['v0']) == 'payrollUpdateRequest') {
      $bankAccount = secure_en_input($_POST['v1']);
      $bankBranch = secure_en_input($_POST['v2']);
      $bankifsc = secure_en_input($_POST['v3']);
      $pancard = secure_en_input($_POST['v4']);
      $userId = secure_en_input($_POST['v5']);
      $table_name = 'employee_payroll_update_request';
      $colms = "userId,accountNumber,branchName,ifsc,pancard,regDate,status";
      $values = "'$userId','$bankAccount','$bankBranch','$bankifsc','$pancard','$time','Pending'";
      echo $payroll->inserting($table_name, $colms, $values);
      $table_name2 = 'logs';
      $colms2 = "regBy,regDate,regIP,action,remarks";
      $values2 = "'$userId','$time','$ip','Payroll Update Request','" . $userId . " Requested For new Paayroll Details.'";
      $payroll->inserting($table_name2, $colms2, $values2);
  }
  if (secure_en_input($_POST['v0']) == 'chanegePassword') {
      $oldPass = secure_en_input($_POST['v1']);
      $newPass = secure_en_input($_POST['v2']);
      $userId = secure_en_input($_POST['v3']);
      $table_name = 'employe_login';
      $where_set = "password='$newPass'";
      $where_update = "username='$userId' and password='$oldPass'";
      echo $payroll->UpdateTable($table_name, $where_set, $where_update);
      $table_name2 = 'logs';
      $colms2 = "regBy,regDate,regIP,action,remarks";
      $values2 = "'$reguserId','$time','$ip','Password Update','" . $jobuserId . " Updated his Password'";
      $payroll->inserting($table_name2, $colms2, $values2);
  }
  if (secure_en_input($_POST['v0']) == 'showexperience') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_experience';
      $where = "userId='$userId'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'show_office_modules') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_experience';
      $where = "userId='$userId'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showpersonal') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_details';
      $where = "userId='$userId'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showpayroll') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_details';
      $where = "userId='$userId'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showaddressbook') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_addressbook';
      $where = "userId='$userId'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showpayroll_request') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_payroll_update_request';
      $where = "userId='$userId' LIMIT 1";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showachivementsEmployee') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_achivements';
      $where = "userId='$userId'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showacadamicEmployee') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_acadamices';
      $where = "userId='$userId'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'getFullInfoEmployee') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_details';
      $where = "userId='" . $userId . "'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'getFullInfoEmployeeAchivment') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'employee_achivements';
      $where = "userId='" . $userId . "'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'getBasicInfoEmployee') {
      $userId = secure_en_input($_POST['v1']);
      $userName = secure_en_input($_POST['v2']);
      $table_name = 'employee_details';
      if ($_POST['v1'] == "") {$where = "userName LIKE '%" . $userName . "%' ";} else if ($_POST['v2'] == "") {$where = "userId LIKE'%" . $userId . "%'";} else {
          $where = "userId='" . $userId . "' or userName LIKE '%" . $userName . "%'";
      }
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'getFullInfoStu') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'students_details';
      $where = "userId='" . $userId . "'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'getFullInfoStuAchivment') {
      $userId = secure_en_input($_POST['v1']);
      $table_name = 'students_achivements';
      $where = "userId='" . $userId . "'";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'getBasicInfoStu') {
      $userId = secure_en_input($_POST['v1']);
      $userName = secure_en_input($_POST['v2']);
      $table_name = 'students_details';
      if ($_POST['v1'] == "") {$where = "userName LIKE '%" . $userName . "%' ";} else if ($_POST['v2'] == "") {$where = "userId LIKE'%" . $userId . "%'";} else {
          $where = "userId='" . $userId . "' or userName LIKE '%" . $userName . "%'";
      }
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showAllDesignations') {
      $table_name = 'designations';
      $where = "sno !=''";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showDesignation') {
      $table_name = 'designations';
      $sno = secure_en_input($_POST['v1']);
      $where = "sno !='' GROUP BY ". $sno;
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'showUserDesignation') {
      $table_name = 'employee_designations';
      $userId = secure_en_input($_POST['v1']);
      $where = "userId =' $userId ' ";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'change_designation_status') {
      $sno = secure_en_input($_POST['v1']);
      $status = secure_en_input($_POST['v2']);
      $table_name = 'designations';
      if($status=="Delete"){
          $where_update = "sno='$sno'";
          echo $payroll->DeleteColum($table_name, $where_update);
      }
      else{
          $where_set = "status='$status'";
          $where_update = "sno='$sno'";
          echo $payroll->UpdateTable($table_name, $where_set, $where_update);
      }
  }
  if (secure_en_input($_POST['v0']) == 'addDesignations') {
      $designation = secure_en_input($_POST['v1']);
      $department = secure_en_input($_POST['v2']);
      $office = secure_en_input($_POST['v3']);
      $status = secure_en_input($_POST['v4']);
      $table_name2 = 'designations';
      $colms2 = "designation,department,office,status,regDate";
      $values2 = "'$designation','$department','$office','$status','$time'";
      echo $payroll->inserting($table_name2, $colms2, $values2);
  }
  if (secure_en_input($_POST['v0']) == "activity_student_add_new_user") {
      $userId = secure_en_input($_POST['v1']);
      $password = secure_en_input($_POST['v2']);
      $userName = secure_en_input($_POST['v3']);
      $Department = secure_en_input($_POST['v4']);
      $gender = secure_en_input($_POST['v5']);
      $joining = secure_en_input($_POST['v6']);
      $status = secure_en_input($_POST['v7']);
      $currentYear = secure_en_input($_POST['v8']);
      $aadhar = secure_en_input($_POST['v9']);
      $mail = secure_en_input($_POST['v10']);
      $m1 = secure_en_input($_POST['v11']);
      $m2 = secure_en_input($_POST['v12']);
      $pm1 = secure_en_input($_POST['v13']);
      $pm2 = secure_en_input($_POST['v14']);
      $pname1 = secure_en_input($_POST['v15']);
      $pname2 = secure_en_input($_POST['v16']);
      $dob = secure_en_input($_POST['v17']);
      $cast = secure_en_input($_POST['v18']);
      $castId = secure_en_input($_POST['v19']);
      $pan = secure_en_input($_POST['v20']);
      $passport = secure_en_input($_POST['v21']);
      $rationcard = secure_en_input($_POST['v22']);
      $pname3 = secure_en_input($_POST['v23']);
      $pm3 = secure_en_input($_POST['v24']);
      $caddress = secure_en_input($_POST['v25']);
      $paddress = secure_en_input($_POST['v26']);
      $income = secure_en_input($_POST['v27']);
      $incomesource = secure_en_input($_POST['v28']);
      $blood = secure_en_input($_POST['v29']);
      $bio = secure_en_input($_POST['v30']);
      $hostel = secure_en_input($_POST['v31']);
      $cot = secure_en_input($_POST['v32']);
      $bed = secure_en_input($_POST['v33']);
      $dorm = secure_en_input($_POST['v34']);

      $colms = "userId,password,userName,Department,gender,joining,status,currentYear,aadhar,email,m1,m2,pm1,pm2,pname1,pname2,dob,cast,castId,pan,passport,rationcard,pname3,pm3,caddress,paddress,income,incomesource,blood,lastEdit,ip,bio,hostel,cot,bed,dorm";
      $values = "'$userId','$password','$userName','$Department','$gender','$joining','$status','$currentYear','$aadhar','$mail','$m1','$m2','$pm1','$pm2','$pname1','$pname2','$dob','$cast','$castId','$pan','$passport','$rationcard','$pname3','$pm3','$caddress','$paddress','$income','$incomesource','$blood','$time','$ip','$bio','$hostel','$cot','$bed','$dorm'";
      echo $payroll->inserting("students_details", $colms, $values);
      $colmsc = "regBy,regDate,regIP,action,remarks";
      $valuesc = "'$_SESSION[USER_ID]','$time','$ip','User Created','Creating new user $userId was sucessfully Completed'";
      $payroll->inserting("logs", $colmsc, $valuesc);
  }
  if (secure_en_input($_POST['v0']) == 'mess_survey_create_feedback') {
      $userId = secure_en_input($_POST['v1']);
      $startDate = secure_en_input($_POST['v2']);
      $endDate = secure_en_input($_POST['v3']);
      $openDate = secure_en_input($_POST['v4']);
      $closeDate = secure_en_input($_POST['v5']);
      $surveyName = secure_en_input($_POST['v6']);
      $sd =date_array($startDate);$startDate=$sd[2].":".$sd[1].":".$sd[0];
      $ed =date_array($endDate);$endDate = $ed[2].":".$ed[1].":".$ed[0];
      $od =date_array($openDate);$openDate =$od[2].":".$od[1].":".$od[0];
      $cd =date_array($closeDate);$closeDate=$cd[2].":".$cd[1].":".$cd[0];

      $table_name2 = 'survey_mess';
      $colms2 = "period_to,period_from,regBy,regDate,openDate,closeDate,surveyName";
      $values2 = "'$endDate','$startDate','$userId','$time','$openDate','$closeDate','$surveyName'";
      echo $payroll->inserting($table_name2, $colms2, $values2);
  }
  if (secure_en_input($_POST['v0']) == 'mess_show') {
      $table_name = 'survey_mess';
      $where = "period_to !='' and period_from !='' ";
      echo $payroll->getAllRowsValue($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'mess_emp_download') {
      $period = secure_en_input($_POST['v1']);
      $table_name = 'survey_mess_response';
      $where = "period ='$period' ";
      //echo $payroll->getAllRowsValue($table_name, $where);
      echo $payroll->getRowsValuesDownload($table_name, $where);
  }
  if (secure_en_input($_POST['v0']) == 'mess_emp_index') {
      $table_name = 'survey_mess_response';
      $where = "sno !='' ";
      print_r($payrollchart->getDistinct($table_name,$where,'period'));    
  }
  if (secure_en_input($_POST['v0']) == 'mess_emp_index_in') {
      $period = secure_en_input($_POST['v1']);
      $mess = secure_en_input($_POST['v2']);
      $table_name = 'survey_mess_response';
      $where = "mess ='$mess' and period='$period' ";
      echo $payrollchart->getCount($table_name,$where);    
  }
  if (secure_en_input($_POST['v0']) == 'mess_emp_view_in') {
      $table_name = 'survey_mess_response';
      $rating = secure_en_input($_POST['v1']);
      $mess = secure_en_input($_POST['v2']);
      $sd = secure_en_input($_POST['v3']);
      $q = secure_en_input($_POST['v4']);
      $where = "mess='$mess' and period= '$sd' and $q  = '$rating'";
      echo $payrollPHP->getCount($table_name,$where);    
  }
}
else{
  header("Location:../includes/logout.php");
}