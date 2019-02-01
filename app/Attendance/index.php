<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] == "employee") {
        header("Location:emp_attendance");
    }
    else if ($_SESSION['USER_TYPE'] == "student") {
        header("Location:stu_attendance");
    }
    else {
        header("Location:../../");
    }
}
?>