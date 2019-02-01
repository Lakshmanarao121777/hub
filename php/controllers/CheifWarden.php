 <?php


if (isset($_POST['v0'])) {
    include_once "../config/CheifWarden.php";
    include_once "../dependencies/os.php";
    include_once "../dependencies/functions.php";
    session_start();
    if ($_POST['v0'] == 'stu_chip_Show') {
        $username = $_POST['v1'];
        $dept = $_POST['v2'];
        $select_list = " * ";
        $where = "(userId='" . $username . "' or userId LIKE '%" . $username . "%') and Department= '" . $dept . "'";
        $yearSub = GetYear($username);
        echo stu_chip_Show('students_details', $select_list, $where, $yearSub);
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
        
        if ($_SESSION['USER_ID'] == "WBEA" || $_SESSION['USER_ID'] == "WBPA" || $_SESSION['USER_ID'] == "WBE1" || $_SESSION['USER_ID'] == "WBE2" || $_SESSION['USER_ID'] == "WBE3" || $_SESSION['USER_ID'] == "WBE4" || $_SESSION['USER_ID'] == "WBP1" || $_SESSION['USER_ID'] == "WBP2"|| $_SESSION['USER_ID'] == "WBH1"|| $_SESSION['USER_ID'] == "WBH2") {$gender = ' and gender="MALE" ';} 

        if ($_SESSION['USER_ID'] == "WGEA" || $_SESSION['USER_ID'] == "WGPA" || $_SESSION['USER_ID'] == "WGE1" || $_SESSION['USER_ID'] == "WGE2" || $_SESSION['USER_ID'] == "WGE3" || $_SESSION['USER_ID'] == "WGE4" || $_SESSION['USER_ID'] == "WGP1" || $_SESSION['USER_ID'] == "WGP2"|| $_SESSION['USER_ID'] == "WGH1"|| $_SESSION['USER_ID'] == "WGH2") {$gender = ' and gender="FEMALE" ';}
        if ($_SESSION['USER_ID'] == "CW") {$gender = 'and gender!="" ';}
        if ($st == "all") {$where = 'userId!="" and status!="Cancel" '. $gender;} 
        else {$where = 'status="'. $st . '"'. $gender;}
        //echo $where;
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
        $dd = date_array($lvdate);
        $lvdate = $dd[2] . ':' . $dd[1] . ':' . $dd[0];
        $select_list = " * ";
        if($userId !=""){$ui = 'userId ="'.$userId.'" ' ;}
        else{$ui =' userId!="" ';}


        if ($_SESSION['USER_ID'] == "WBEA" || $_SESSION['USER_ID'] == "WBPA" || $_SESSION['USER_ID'] == "WBE1" || $_SESSION['USER_ID'] == "WBE2" || $_SESSION['USER_ID'] == "WBE3" || $_SESSION['USER_ID'] == "WBE4" || $_SESSION['USER_ID'] == "WBP1" || $_SESSION['USER_ID'] == "WBP2"|| $_SESSION['USER_ID'] == "WBH1"|| $_SESSION['USER_ID'] == "WBH2") {$hostel = ' and hostel LIKE "BH%" ';} 

        if ($_SESSION['USER_ID'] == "WGEA" || $_SESSION['USER_ID'] == "WGPA" || $_SESSION['USER_ID'] == "WGE1" || $_SESSION['USER_ID'] == "WGE2" || $_SESSION['USER_ID'] == "WGE3" || $_SESSION['USER_ID'] == "WGE4" || $_SESSION['USER_ID'] == "WGP1" || $_SESSION['USER_ID'] == "WGP2"|| $_SESSION['USER_ID'] == "WGH1"|| $_SESSION['USER_ID'] == "WGH2") {$hostel = ' and hostel LIKE "GH%"' ;}
        else { $hostel = 'and hostel!=""';}

        if ($_SESSION['USER_ID'] == "WBEA" || $_SESSION['USER_ID'] == "WBPA" || $_SESSION['USER_ID'] == "WBE1" || $_SESSION['USER_ID'] == "WBE2" || $_SESSION['USER_ID'] == "WBE3" || $_SESSION['USER_ID'] == "WBE4" || $_SESSION['USER_ID'] == "WBP1" || $_SESSION['USER_ID'] == "WBP2"|| $_SESSION['USER_ID'] == "WBH1"|| $_SESSION['USER_ID'] == "WBH2") {$gender = ' and gender="MALE" ';} 

        if ($_SESSION['USER_ID'] == "WGEA" || $_SESSION['USER_ID'] == "WGPA" || $_SESSION['USER_ID'] == "WGE1" || $_SESSION['USER_ID'] == "WGE2" || $_SESSION['USER_ID'] == "WGE3" || $_SESSION['USER_ID'] == "WGE4" || $_SESSION['USER_ID'] == "WGP1" || $_SESSION['USER_ID'] == "WGP2"|| $_SESSION['USER_ID'] == "WGH1"|| $_SESSION['USER_ID'] == "WGH2") {$gender = ' and gender="FEMALE" ';}
        if ($_SESSION['USER_ID'] == "CW") {$gender = 'and gender!="" ';}



        if ($status == "all") {$ss = ' and status !="Cancel" ';} 
        else if ($status == "pending") {$ss = ' and status=""';}
         else { $ss = ' and status="'.$status.'"';}

        if ($cyear == "ALL") {$cy = ' and currentYear!="" ';} 
        if ($cyear == "ENGG-ALL") {$cy = ' and (currentYear="ENGG-1" or currentYear="ENGG-2" or currentYear="ENGG-3" or currentYear="ENGG-4" ) ';} 
        if ($cyear == "PUC-ALL") {$cy = ' and (currentYear="PUC-1" or currentYear="PUC-2" ) ';} 
        else { $cy = ' and currentYear="'.$cyear.'" ' ;}

        if ($branch == "ALL") {$cb = ' and Department!="" ';} 
        if ($branch == "ENGG-ALL") {$cb = ' and (Department="EC" or Department="CE" or Department="CH" or Department="ME" or Department="MM" or Department="CS") ';} 
        if ($branch == "PUC-ALL") {$cb = ' and ( Department="PUC-1" or Department="PUC-2" ) ';} 
        else { $cb = ' and Department="'.$branch.'" ' ;}

        if ($cclass == "ALL") {$cc = ' and currentClass!=""';} else { $cc = ' and currentClass="'.$cclass.'" ';}
        $cc='';
        //$cb ='';

        //$where = $ui . $ss  . $cb . $cc . $hostel . $gender . " and regDate LIKE '%" . $d . "' and fdate LIKE '% $lvdate'  ";
        $where =  $ui . $ss . $cy . $gender. $hostel .$cb ;
        //echo $where;
        //echo $_SESSION['USER_ID'];
        echo load_olms_queryss('students_olms', $select_list, $where);
    }
}
else{
 header("Location:../includes/logout.php");
}
?>