<?php

if (isset($_POST['v0'])) {
    include_once "../config/DeanAcademics.php";
    include_once "../dependencies/os.php";
    include_once "../dependencies/functions.php";
    if ($_POST['v0'] == "regshowdata") {
        $year = $_POST['v1'];
        $branch = $_POST['v2'];
        $select = " * ";
        if ($year == "ENGG-1") {$y1 = 'ecee1';
            $y2 = 'cheme1';
            $y3 = 'civile1';
            $y4 = 'csee1';
            $y5 = 'meche1';
            $y6 = 'mmee1';}
        if ($year == "ENGG-2") {$y1 = 'ecee2';
            $y2 = 'cheme2';
            $y3 = 'civile2';
            $y4 = 'csee2';
            $y5 = 'meche2';
            $y6 = 'mmee2';}
        if ($year == "ENGG-3") {$y1 = 'ecee3';
            $y2 = 'cheme3';
            $y3 = 'civile3';
            $y4 = 'csee3';
            $y5 = 'meche3';
            $y6 = 'mmee3';}
        if ($year == "ENGG-4") {$y1 = 'ecee4';
            $y2 = 'cheme4';
            $y3 = 'civile4';
            $y4 = 'csee4';
            $y5 = 'meche4';
            $y6 = 'mmee4';}
        if ($year == $branch) {
            $where = "sno!=''  GROUP BY userId ";
        } else if ($year == "" && $branch != "") {
            $where = "Dept='$branch' GROUP BY userId ";
        } else if ($year != "" && $branch == "") {
            $where = "(regBy='$y1'or regBy='$y2'or regBy='$y3'or regBy='$y4' or regBy='$y5'or regBy='$y6') GROUP BY userId ";
        } else {
            $where = " Dept='$branch' and (regBy='$y1'or regBy='$y2' or regBy='$y3' or regBy='$y4' or regBy='$y5'or regBy='$y6') GROUP BY userId ";
        }
        echo showregdata('ay1819s1reg', $select, $where);
    }
    if ($_POST['v0'] == 'stu_chip_Show') {
        $username = $_POST['v1'];
        $select_list = " * ";
        $where = "(userId='" . $username . "' or userName='" . $username . "' or userId LIKE '%" . $username . "%') ";
        $yearSub = GetYear($username);
        echo stu_chip_Show('students_details', $select_list, $where, $yearSub);
    }
    if ($_POST['v0'] == 'count_da_table') {
        $year = $_POST['v1'];
        $branch = $_POST['v2'];
        $type = $_POST['v3'];

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
            $count = count_da($tabl_name, $select_list, $where, $year);
        }
        if ($type == "reg") {
            $tabl_name = "ay1819s1reg";
            $select_list = " * ";
            $where = "regBy='" . $dep . "' GROUP BY userId";
            $count = count_da($tabl_name, $select_list, $where, $year);
        }
        if ($type == "un") {
            $tabl_name = "students_details";
            $select_list = " * ";
            $where = "Department='" . $branch . "'";
            $total_count = count_da($tabl_name, $select_list, $where, $year);

            $tabl_name = "ay1819s1reg";
            $select_list = " * ";
            $where = "regBy='" . $dep . "' GROUP BY userId";
            $reg_count = count_da($tabl_name, $select_list, $where, $year);
            $count = $total_count - $reg_count;
        }
        echo $count;
    }
    if ($_POST['v0'] == "exportTable") {
        $table_name = "ay1819s1reg";
        $batch = $_POST['v1'];
        $branch = $_POST['v2'];
        $filename = $branch . "_" . $batch . ".csv";
        if ($branch == "total") {$where = "where currentYear='$batch' ORDER BY userId DESC";} else { $where = "where Dept='$branch' && currentYear='$batch' ORDER BY userId DESC";}
        $colms = array('S.No', 'ID Number', 'Student Name', 'Subject Name', 'Credits', 'Branch', 'Year', 'Gender', 'Semister');
        $rows = array('count', 'userId', 'userName', 'subName', 'CreditPoint', 'Dept', 'currentYear', 'gender', 'sem');
        echo exportTables($table_name, $where, $filename, $colms, $rows);
    }
}
else{
 header("Location:../includes/logout.php");
}
