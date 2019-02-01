<?php

    include_once "../dependencies/functions.php";
if (isset($_POST['v0'])) {
    session_start();
    include_once "../config/AcadamicDepartments.php";
    include_once "../dependencies/os.php";

    if (secure_en_input($_POST['v0']) == "Basic_UserDetails") {
        $username = secure_en_input($_POST['v1']);
        $hodDept = secure_en_input($_POST['v2']);
        $hodid = secure_en_input($_POST['v3']);
        $hodDesignation = secure_en_input($_POST['v4']);
        $select_list = " * ";
        $where = "userId='" . $username . "' or userName='" . $username . "' and Department= '" . $hodDept . "'";
        $yearSub = getDetfresh("students_details", "WHERE username='$username'", "year");
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
            echo inserting("ay1819s1reg", $colums, $values);
        }
    }
    if (secure_en_input($_POST['v0']) == 'stu_chip_Show') {
        $username = secure_en_input($_POST['v1']);
        $dept = secure_en_input($_POST['v2']);
        $select_list = " * ";
        $where = "(userId='" . $username . "' or userId LIKE '%" . $username . "%') and Department= '" . $dept . "'";
        $yearSub = getDetfresh("students_details", "WHERE username='$username'", "year");
        echo stu_chip_Show('students_details', $select_list, $where, $yearSub);
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
        $selectFacName = getDetfresh("employee_details", "WHERE userId='$selectFac'", "userName");
        $selectSubName = getDetfresh("subjects", "WHERE subCode='$selectSub'", "subName");
        $colums = "userId,userName,subCode,subName,subDept,ayYear,sem,currentYear,regDate";
        $values = "'$selectFac','$selectFacName','$selectSub','$selectSubName','$selectDept','$selectAy','$selectSem','$selectYear','$time'";
        echo inserting($table_name, $colums, $values);
    }

    if (secure_en_input($_POST['v0']) == "addnewunit") {
        $subCode = secure_en_input($_POST['v1']);
        $subName = getDetfresh("subjects", "WHERE subCode='$subCode'", "subName");
        $unitName = secure_en_input($_POST['v2']);
        $currentYear = getDetfresh("subjects", "WHERE subCode='$subCode'", "subYear");
        $sem = getDetfresh("subjects", "WHERE subCode='$subCode'", "subSem");
        $department = getDetfresh("subjects", "WHERE subCode='$subCode'", "subDept");
        $userId = secure_en_input($_POST['v3']);
        $regByName = getDetfresh("employee_details", "WHERE userId='$userId'", "userName");
        $colums = "subCode,subName,unitName,sem,currentYear,department,regDate,regById,regByName";
        $values = "'$subCode','$subName','$unitName','$sem','$currentYear','$department','$time','$userId','$regByName'";
        echo inserting("course_distribution", $colums, $values);
    }

    if (secure_en_input($_POST['v0']) == "addnewmodule") {
        $sno = secure_en_input($_POST['v1']);
        $unitName = getDetfresh("course_distribution", "WHERE sno='$sno'", "unitName");
        $subCode = getDetfresh("course_distribution", "WHERE sno='$sno'", "subCode");
        $subName = getDetfresh("subjects", "WHERE subCode='$subCode'", "subName");
        $moduleName = secure_en_input($_POST['v2']);
        $currentYear = getDetfresh("subjects", "WHERE subCode='$subCode'", "subYear");
        $sem = getDetfresh("subjects", "WHERE subCode='$subCode'", "subSem");
        $Department = getDetfresh("subjects", "WHERE subCode='$subCode'", "subDept");
        $userId = secure_en_input($_POST['v3']);
        $regByName = getDetfresh("employee_details", "WHERE userId='$userId'", "userName");
        $ayYear = getDetfresh("course_allotment", "WHERE subCode='$subCode'", "ayYear");

        $colums = "unitName,moduleName,regDate,regId,regName,subCode,subName,Department,currentYear,sem,ayYear,status";
        $values = "'$unitName','$moduleName','$time','$userId','$regByName','$subCode','$subName','$Department','$currentYear','$sem','$ayYear','Pending'";
        echo inserting("course_modules", $colums, $values);
    }
    if (secure_en_input($_POST['v0']) == "updateModuleStatus") {
        $module_status = secure_en_input($_POST['v3']);
        $sno = secure_en_input($_POST['v1']);
        $regDate = secure_en_input($_POST['v2']);
        $uid = secure_en_input($_POST['v4']);
        $selectFacName = getDetfresh("employee_details", "WHERE userId='$uid'", "userName");
        $update_set = " status='$module_status', regDate2='$regDate', regId2='$uid', regName2='$selectFacName' ";
        $update_where = "sno='" . $sno . "'";
        echo UpdateTable("course_modules", $update_set, $update_where);
    }
    if (secure_en_input($_POST['v0']) == "DeleteModule") {
        $sno = secure_en_input($_POST['v1']);
        $delete_where = "sno='" . $sno . "'";
        echo DeleteColum("course_modules", $delete_where);
    }
    if (secure_en_input($_POST['v0']) == "DeleteUnit") {
        $sno = secure_en_input($_POST['v1']);
        $delete_where = "sno='" . $sno . "'";
        $unitName = getDetfresh("course_distribution", "WHERE sno='$sno'", "unitName");
        $subcode = getDetfresh("course_distribution", "WHERE sno='$sno'", "subCode");
        $delete_where2 = "subcode='$subcode' and unitName='$unitName'";
        echo DeleteColum("course_distribution", $delete_where);
        echo DeleteColum("course_modules", $delete_where2);
    }
    if (secure_en_input($_POST['v0']) == "editUnit") {
        $sno = secure_en_input($_POST['v1']);
        $newUnitname = secure_en_input($_POST['v2']);
        $unitName = getDetfresh("course_distribution", "WHERE sno='$sno'", "unitName");
        $subcode = getDetfresh("course_distribution", "WHERE sno='$sno'", "subCode");
        $update_where2 = "subCode ='$subcode' and unitName ='$unitName'";
        $update_set2 = "unitName ='$newUnitname'";
        echo UpdateTable("course_modules", $update_set2, $update_where2);
        $update_set = "unitName='$newUnitname'";
        $update_where = "sno ='" . $sno . "'";
        echo UpdateTable("course_distribution", $update_set, $update_where);
    }
}
else{
 header("Location:../includes/logout.php");
}
