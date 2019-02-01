<?php
    include_once "../dependencies/functions.php";
if (isset($_POST['v0'])) {
    include_once "../config/Admin.php";
    include_once "../dependencies/os.php";
    $activity_student = new activity_student;
    session_start();
    if ($_POST['v0'] == 'stu_chip_Show') {
        $username = $_POST['v1'];
        $select_list = " * ";
        $where = "userId='" . $username . "' or userName LIKE '%" . $username . "%' or userId LIKE '%" . $username . "%' ";
        echo stu_chip_Show('students_details', $select_list, $where);
    }
    if ($_POST['v0'] == 'load_notice') {
        $start = $_POST['v1'];
        $end = $_POST['v2'];
        $select_list = " * ";
        echo load_notice('notice_board', $select_list, $start, $end);
    }
    if ($_POST['v0'] == 'load_olms') {
        $start = $_POST['v1'];
        $end = $_POST['v2'];
        $st = $_POST['v3'];
        $select_list = " * ";
        if ($st == "all") {$where = "sno!=''";} else {
            $where = "status='" . $st . "'";}

        echo load_olms('students_olms', $select_list, $start, $end, $where);
    }
    if ($_POST['v0'] == 'load_olms_update') {
        $sno = $_POST['v1'];
        $action = $_POST['v2'];
        $string = " status='" . $action . "',actionBy='" . $_SESSION['USER_ID'] . "',actionDate='" . $time . "',ip2='" . $ip . "' where sno='" . $sno . "'";
        echo load_olms_update('students_olms', $string);
    }
    if ($_POST['v0'] == 'load_olms_query') {
        $userId = $_POST['v1'];
        $status = $_POST['v2'];
        $branch = $_POST['v3'];
        $cyear = $_POST['v4'];
        $cclass = $_POST['v5'];
        $apdate = $_POST['v6'];
        $lvdate = $_POST['v7'];
        $dd = date_array($apdate);
        $d = $dd[2] . ':' . $dd[1] . ':' . $dd[0];
        $select_list = " * ";
        if ($userId == "") {$ui = " userId!='' ";} else { $ui = "userId LIKE '%" . $userId . "%' ";}
        if ($_SESSION['USER_ID'] == "WBEA" || $_SESSION['USER_ID'] == "WBPA" || $_SESSION['USER_ID'] == "WBE1" || $_SESSION['USER_ID'] == "WBE2" || $_SESSION['USER_ID'] == "WBE3" || $_SESSION['USER_ID'] == "WBE4" || $_SESSION['USER_ID'] == "WBP1" || $_SESSION['USER_ID'] == "WBP2") {$hostel = 'and (hostel="BH-1" or hostel="BH-1") ';} else if ($_SESSION['USER_ID'] == "WGEA" || $_SESSION['USER_ID'] == "WGPA" || $_SESSION['USER_ID'] == "WGE1" || $_SESSION['USER_ID'] == "WGE2" || $_SESSION['USER_ID'] == "WGE3" || $_SESSION['USER_ID'] == "WGE4" || $_SESSION['USER_ID'] == "WGP1" || $_SESSION['USER_ID'] == "WGP2") {$hostel = 'and (hostel="GH-1" or hostel="GH-1") ';} else { $hostel = 'and hostel!=""';}

        if ($_SESSION['USER_ID'] == "WBEA" || $_SESSION['USER_ID'] == "WBPA" || $_SESSION['USER_ID'] == "WBE1" || $_SESSION['USER_ID'] == "WBE2" || $_SESSION['USER_ID'] == "WBE3" || $_SESSION['USER_ID'] == "WBE4" || $_SESSION['USER_ID'] == "WBP1" || $_SESSION['USER_ID'] == "WBP2") {$gender = 'and (gender="MALE" or gender="MALE") ';} else if ($_SESSION['USER_ID'] == "WGEA" || $_SESSION['USER_ID'] == "WGPA" || $_SESSION['USER_ID'] == "WGE1" || $_SESSION['USER_ID'] == "WGE2" || $_SESSION['USER_ID'] == "WGE3" || $_SESSION['USER_ID'] == "WGE4" || $_SESSION['USER_ID'] == "WGP1" || $_SESSION['USER_ID'] == "WGP2") {$gender = 'and (gender="FEMALE" or gender="FEMALE") ';} else { $gender = 'and gender!=""';}

        if ($status == "all") {$ss = " ";} else if ($status == "pending") {$ss = " and status='' ";} else { $ss = " and status='$status' ";}

        if ($cyear == "ALL") {$cy = " and currentYear!='' ";} else if ($cyear == "ENGG-ALL") {$cy = " and (currentYear='ENGG-1' or currentYear='ENGG-2' or currentYear='ENGG-3' or currentYear='ENGG-4' ) ";} else if ($cyear == "PUC-ALL") {$cy = " and (currentYear='PUC-1' or currentYear='PUC-2' ) ";} else { $cy = " and currentYear='$cyear' ";}

        if ($branch == "ALL") {$cb = " and Department!='' ";} else if ($branch == "ENGG-ALL") {$cb = " and (Department='EC' or Department='CE' or Department='CH' or Department='ME' or Department='MM' or Department='CS') ";} else if ($branch == "PUC-ALL") {$cb = " and ( Department='PUC-1' or Department='PUC-2' ) ";} else { $cb = " and Department='$branch' ";}

        if ($cclass == "ALL") {$cc = " and currentClass!='' ";} else { $cc = " and currentClass='$cclass' ";}
        $where = $ui . $ss . $cy . $cb . $cc . $hostel . $gender . " and regDate LIKE '%" . $d . "' and fdate='$lvdate' ";
        echo load_olms_queryss('students_olms', $select_list, $where);
    }
    if (secure_en_input($_POST['v0']) == "Basic_UserDetails") {
        $username = secure_en_input($_POST['v1']);
        $hodDept = secure_en_input($_POST['v2']);
        $hodid = secure_en_input($_POST['v3']);
        $hodDesignation = secure_en_input($_POST['v4']);
        $select_list = " * ";
        $where = "userId='" . $username . "' or userName='" . $username . "' and Department= '" . $hodDept . "'";
        $yearSub = $activity_student->getColValue("students_details", "WHERE username='$username'", "year");
        echo FetchUserBasicDetails('students_details', $select_list, $where, $hodDept, $hodid, $hodDesignation, $yearSub);
    }
    if (secure_en_input($_POST['v0']) == 'register_subjects') {
        $sub_count = secure_en_input($_POST['v1']);
        $regby = secure_en_input($_POST['v2']);
        $designation = secure_en_input($_POST['v3']);
        $dept = secure_en_input($_POST['v4']);
        $studentid = secure_en_input($_POST['v' . ($sub_count + 5)]);
        $studentname = secure_en_input($_POST['v' . ($sub_count + 6)]);
        for ($i = 0; $i < $sub_count; $i++) {
            $subName = secure_en_input($_POST['v' . ($i + 5)]);
            $credits = GetCredits($subName, $dept);
            $code = GetCode($subName, $dept);
            $colums = "userId,userName,subName,credits,subjectCode,regBy,Dept,regDesignation,regDate,security";
            $values = "'$studentid','$studentname','$subName','$credits','$code','$regby','$dept','$designation','$time','$ip'";
            echo $activity_student->inserting("ay1819s1reg", $colums, $values);
        }
    }
    if (secure_en_input($_POST['v0']) == 'load_notice') {
        $start = secure_en_input($_POST['v1']);
        $end = secure_en_input($_POST['v2']);
        $select_list = " * ";
        echo load_notice('notice_board', $select_list, $start, $end);
    }

    if (secure_en_input($_POST['v0']) == "regshowdata") {
        $year = secure_en_input($_POST['v1']);
        $branch = secure_en_input($_POST['v2']);

        if ($branch == "EC") {$bc = "ece";}
        if ($branch == "CS") {$bc = "cse";}
        if ($branch == "CE") {$bc = "civil";}
        if ($branch == "CH") {$bc = "chem";}
        if ($branch == "ME") {$bc = "mech";}
        if ($branch == "MM") {$bc = "mme";}

        if ($year != "") {
            if ($year == "ENGG-1") {$y1 = $bc . "e1";}
            if ($year == "ENGG-2") {$y1 = $bc . "e2";}
            if ($year == "ENGG-3") {$y1 = $bc . "e3";}
            if ($year == "ENGG-4") {$y1 = $bc . "e4";}
            $sql = "SELECT * FROM ay1819s1reg where Dept='$branch'and regBy='$y1' GROUP BY userId ORDER BY sno DESC";
        } else {
            $sql = "SELECT * FROM ay1819s1reg where Dept='$branch' GROUP BY userId ORDER BY sno DESC";
        }
        echo showregdata($sql);
    }
    if (secure_en_input($_POST['v0']) == 'count_regshow_table') {
        $year = secure_en_input($_POST['v1']);
        $branch = secure_en_input($_POST['v3']);
        $type = secure_en_input($_POST['v2']);

        if ($year == "ENGG-1") {
            $y = "e1";
        }
        if ($year == "ENGG-2") {
            $y = "e2";
        }

        if ($year == "ENGG-3") {
            $y = "e3";
        }
        if ($year == "ENGG-4") {
            $y = "e4";
        }

        if ($branch == "EC") {
            $dep = 'ece' . $y;
        }
        if ($branch == "CS") {
            $dep = 'cse' . $y;
        }

        if ($branch == "CE") {
            $dep = 'civil' . $y;
        }
        if ($branch == "CH") {
            $dep = 'chem' . $y;
        }

        if ($branch == "ME") {
            $dep = 'mech' . $y;
        }
        if ($branch == "MM") {
            $dep = 'mme' . $y;
        }

        if ($type == "all") {
            $tabl_name = "students_details";
            $select_list = " * ";
            $where = "Department='" . $branch . "'";
            $count = count_data_reg($tabl_name, $select_list, $where, $year);
        }
        if ($type == "reg") {
            $tabl_name = "ay1819s1reg";
            $select_list = " * ";
            $where = "regBy='" . $dep . "' GROUP BY userId";
            $count = count_data_reg($tabl_name, $select_list, $where, $year);
        }
        if ($type == "un") {
            $tabl_name = "students_details";
            $select_list = " * ";
            $where = "Department='" . $branch . "'";
            $total_count = count_data_reg($tabl_name, $select_list, $where, $year);

            $tabl_name = "ay1819s1reg";
            $select_list = " * ";
            $where = "regBy='" . $dep . "' GROUP BY userId";
            $reg_count = count_data_reg($tabl_name, $select_list, $where, $year);
            $count = $total_count - $reg_count;
        }
        echo $count;
    }

    if (secure_en_input($_POST['v0']) == "course_allotment") {
        $selectFac = secure_en_input($_POST['v1']);
        $selectSub = secure_en_input($_POST['v2']);
        $selectYear = secure_en_input($_POST['v3']);
        $selectSem = secure_en_input($_POST['v4']);
        $selectDept = secure_en_input($_POST['v5']);
        $selectAy = secure_en_input($_POST['v6']);
        $table_name = "course_allotment";
        $selectFacName = $activity_student->getColValue("employee_details", "WHERE userId='$selectFac'", "userName");
        $selectSubName = $activity_student->getColValue("subjects", "WHERE subCode='$selectSub'", "subName");
        $colums = "userId,userName,subCode,subName,subDept,ayYear,sem,currentYear,regDate";
        $values = "'$selectFac','$selectFacName','$selectSub','$selectSubName','$selectDept','$selectAy','$selectSem','$selectYear','$time'";
        echo $activity_student->inserting($table_name, $colums, $values);
    }

    if (secure_en_input($_POST['v0']) == "addnewunit") {
        $subCode = secure_en_input($_POST['v1']);
        $subName = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subName");
        $unitName = secure_en_input($_POST['v2']);
        $currentYear = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subYear");
        $sem = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subSem");
        $department = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subDept");
        $userId = secure_en_input($_POST['v3']);
        $regByName = $activity_student->getColValue("employee_details", "WHERE userId='$userId'", "userName");
        $colums = "subCode,subName,unitName,sem,currentYear,department,regDate,regById,regByName";
        $values = "'$subCode','$subName','$unitName','$sem','$currentYear','$department','$time','$userId','$regByName'";
        echo $activity_student->inserting("course_distribution", $colums, $values);
    }

    if (secure_en_input($_POST['v0']) == "addnewmodule") {
        $sno = secure_en_input($_POST['v1']);
        $unitName = $activity_student->getColValue("course_distribution", "WHERE sno='$sno'", "unitName");
        $subCode = $activity_student->getColValue("course_distribution", "WHERE sno='$sno'", "subCode");
        $subName = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subName");
        $moduleName = secure_en_input($_POST['v2']);
        $currentYear = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subYear");
        $sem = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subSem");
        $Department = $activity_student->getColValue("subjects", "WHERE subCode='$subCode'", "subDept");
        $userId = secure_en_input($_POST['v3']);
        $regByName = $activity_student->getColValue("employee_details", "WHERE userId='$userId'", "userName");
        $ayYear = $activity_student->getColValue("course_allotment", "WHERE subCode='$subCode'", "ayYear");

        $colums = "unitName,moduleName,regDate,regId,regName,subCode,subName,Department,currentYear,sem,ayYear,status";
        $values = "'$unitName','$moduleName','$time','$userId','$regByName','$subCode','$subName','$Department','$currentYear','$sem','$ayYear','Pending'";
        echo $activity_student->inserting("course_modules", $colums, $values);
    }
    if (secure_en_input($_POST['v0']) == "updateModuleStatus") {
        $module_status = secure_en_input($_POST['v3']);
        $sno = secure_en_input($_POST['v1']);
        $regDate = secure_en_input($_POST['v2']);
        $uid = secure_en_input($_POST['v4']);
        $selectFacName = $activity_student->getColValue("employee_details", "WHERE userId='$uid'", "userName");
        $update_set = " status='$module_status', regDate2='$regDate', regId2='$uid', regName2='$selectFacName' ";
        $update_where = "sno='" . $sno . "'";
        echo UpdateTable("course_modules", $update_set, $update_where);
    }
    if (secure_en_input($_POST['v0']) == "DeleteModule") {
        $sno = secure_en_input($_POST['v1']);
        $delete_where = "sno='" . $sno . "'";
        echo $activity_student->DeleteColum("course_modules", $delete_where);
    }
    if (secure_en_input($_POST['v0']) == "DeleteUnit") {
        $sno = secure_en_input($_POST['v1']);
        $delete_where = "sno='" . $sno . "'";
        $unitName = $activity_student->getColValue("course_distribution", "WHERE sno='$sno'", "unitName");
        $subcode = $activity_student->getColValue("course_distribution", "WHERE sno='$sno'", "subCode");
        $delete_where2 = "subcode='$subcode' and unitName='$unitName'";
        echo $activity_student->DeleteColum("course_distribution", $delete_where);
        echo $activity_student->DeleteColum("course_modules", $delete_where2);
    }
    if (secure_en_input($_POST['v0']) == "editUnit") {
        $sno = secure_en_input($_POST['v1']);
        $newUnitname = secure_en_input($_POST['v2']);
        $unitName = $activity_student->getColValue("course_distribution", "WHERE sno='$sno'", "unitName");
        $subcode = $activity_student->getColValue("course_distribution", "WHERE sno='$sno'", "subCode");
        $update_where2 = "subCode ='$subcode' and unitName ='$unitName'";
        $update_set2 = "unitName ='$newUnitname'";
        echo $activity_student->UpdateTable("course_modules", $update_set2, $update_where2);
        $update_set = "unitName='$newUnitname'";
        $update_where = "sno ='" . $sno . "'";
        echo $activity_student->UpdateTable("course_distribution", $update_set, $update_where);
    }
    if (secure_en_input($_POST['v0']) == "activity_student_change_password") {
        $userId = secure_en_input($_POST['v1']);
        $passw = secure_en_input($_POST['v2']);
        $update_set = "password='$passw'";
        $update_where = "userId ='" . $userId . "'";
        $msg = $activity_student->update_password("students_details", $update_set, $update_where);
        if ($msg = "success") {
            $colms = "regBy,regDate,regIP,action,remarks";
            $values = "'$_SESSION[USER_ID]','$time','$ip','Password Change','The user $userId has forgot the password and update database with new one in presence of user $userId by the $_SESSION[USER_ID] .The details are verified using picture recognition with saved previous picture in database and the picture printed on the university identity card issued by the Dean office.'";
            $msg2 = $activity_student->inserting("logs", $colms, $values);
            if ($msg2 = "Sucessfull") {
                echo "success";
            } else {
                echo "updating failed";
            }
        } else {
            echo "updating failed";
        }
    }
    if (secure_en_input($_POST['v0']) == "activity_employee_change_password") {
        $userId = secure_en_input($_POST['v1']);
        $passw = secure_en_input($_POST['v2']);
        $update_set = "password='$passw'";
        $update_where = "username ='" . $userId . "'";
        $msg = $activity_student->update_password("employe_login", $update_set, $update_where);
        if ($msg = "success") {
            echo "success";
        } else {
            echo "updating failed";
        }
    }
    if (secure_en_input($_POST['v0'])=="activity_employee_change_password_getold") {
        $userId = secure_en_input($_POST['v1']);
        $msg = $activity_student->getColValue("employe_login", "username='$userId'", "password");
        echo $msg;
    }
    if (secure_en_input($_POST['v0']) == "activity_student_add_new_user") {
        $userId = secure_en_input($_POST['v1']);$password = secure_en_input($_POST['v2']);
        $userName=secure_en_input($_POST['v3']);$Department=secure_en_input($_POST['v4']);
        $gender = secure_en_input($_POST['v5']); $joining = secure_en_input($_POST['v6']);
        $status = secure_en_input($_POST['v7']);$currentYear=secure_en_input($_POST['v8']);
        $aadhar = secure_en_input($_POST['v9']);  $mail = secure_en_input($_POST['v10']);
        $m1     = secure_en_input($_POST['v11']);  $m2  = secure_en_input($_POST['v12']);
        $pm1    = secure_en_input($_POST['v13']);  $pm2 = secure_en_input($_POST['v14']);
        $pname1 = secure_en_input($_POST['v15']);$pname2= secure_en_input($_POST['v16']);
        $dob    = secure_en_input($_POST['v17']);  $cast= secure_en_input($_POST['v18']);
        $castId = secure_en_input($_POST['v19']);  $pan = secure_en_input($_POST['v20']);
        $passport=secure_en_input($_POST['v21']);$rationcard=secure_en_input($_POST['v22']);
        $pname3 = secure_en_input($_POST['v23']);  $pm3 = secure_en_input($_POST['v24']);
        $caddress=secure_en_input($_POST['v25']);$paddress=secure_en_input($_POST['v26']);
        $income = secure_en_input($_POST['v27']);$incomesource=secure_en_input($_POST['v28']);
        $blood  = secure_en_input($_POST['v29']);  $bio = secure_en_input($_POST['v30']);
        $hostel = secure_en_input($_POST['v31']);  $cot = secure_en_input($_POST['v32']);
        $bed    = secure_en_input($_POST['v33']); $dorm = secure_en_input($_POST['v34']);

        $colms = "userId,password,userName,Department,gender,joining,status,currentYear,aadhar,email,m1,m2,pm1,pm2,pname1,pname2,dob,cast,castId,pan,passport,rationcard,pname3,pm3,caddress,paddress,income,incomesource,blood,lastEdit,ip,bio,hostel,cot,bed,dorm";
        $values = "'$userId','$password','$userName','$Department','$gender','$joining','$status','$currentYear','$aadhar','$mail','$m1','$m2','$pm1','$pm2','$pname1','$pname2','$dob','$cast','$castId','$pan','$passport','$rationcard','$pname3','$pm3','$caddress','$paddress','$income','$incomesource','$blood','$time','$ip','$bio','$hostel','$cot','$bed','$dorm'";
        $msg = $activity_student->add_user("students_details", $colms,$values);
        if ($msg = "success") {
            $colmsc = "regBy,regDate,regIP,action,remarks";
            $valuesc = "'$_SESSION[USER_ID]','$time','$ip','User Created','Creating new user $userId was sucessfully Completed'";
            $msg2 = $activity_student->inserting("logs", $colmsc, $valuesc);
            if ($msg2 = "success") {
                return "success";
            } else {
                return "failed";
            }
        } else {
            return "failed";
        }
    }

}
else{
 header("Location:../includes/logout.php");
}
?>
