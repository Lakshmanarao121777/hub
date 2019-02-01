<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] == "employee") {
        header("Location:emp");
    }
    else if ($_SESSION['USER_TYPE'] == "student") {
        header("Location:stu");
    }
    else {
        header("Location:../../");
    }
}
?>