<?php session_start();
if (!$_SESSION) {
    header("Location:../php/includes/logout.php");
} else {
    if ($_SESSION["USER_TYPE"] != "") {
        if ($_SESSION["USER_TYPE"] == "employee") {
            if( $_SESSION["USER_ID"] == "cw"||$_SESSION["USER_ID"] == "WBP1"||$_SESSION["USER_ID"] == "WBP2"||$_SESSION["USER_ID"] == "WBPA"||$_SESSION["USER_ID"] == "WGP1"||$_SESSION["USER_ID"] == "WGP2"||$_SESSION["USER_ID"] == "WGPA"||$_SESSION["USER_ID"] == "WBEA"||$_SESSION["USER_ID"] == "WBE1"||$_SESSION["USER_ID"] == "WBE2"||$_SESSION["USER_ID"] == "WGEA"||$_SESSION["USER_ID"] == "cw"||$_SESSION["USER_ID"] == "WBE3"||$_SESSION["USER_ID"] == "WBE4"|| $_SESSION["USER_ID"] == "WGEA"||$_SESSION["USER_ID"] == "WGE1"||$_SESSION["USER_ID"] == "WGE2"||$_SESSION["USER_ID"] == "WGE3"||$_SESSION["USER_ID"] == "WGE4"||$_SESSION["USER_ID"] == "WBH1"||$_SESSION["USER_ID"] == "WBH2"||$_SESSION["USER_ID"] == "WGH1"||$_SESSION["USER_ID"] == "WGH2"){
                header("Location:ChiefWarden");
            }
            else if($_SESSION["USER_ID"] == "security"){
                header("Location:Security");
            }
            else{
                header("Location:employee");
            }
        } else {
            header("Location:Student");
        }
    }
    else {
        header("Location:../php/includes/logout.php");
    }
}
