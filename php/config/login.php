<?php
function logIn($table_name, $select_list, $where)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select_list FROM $table_name where $where ORDER BY sno DESC ";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $user_id;
        $user_type;
        $user_ofc;
        $user_designation;
        $user_department = "";
        $user_name;
        $email;
        $mobile;
        while ($row = $q->fetch()): $count++;

            if ($table_name == 'employe_login') {
                $user_id = $row['username'];
                $user_ofc = $row['office'];
                $user_type = 'employee';
                $user_designation = $row['designation'];
                $user_department = $row['department'];
            } else {
                $user_id = $row['userId'];
                $user_type = 'student';
                $user_name = $row['userName'];
                $email = $row['email'];
                $mobile = $row['m1'];
            }
        endwhile;
        if ($count == 1) {
            session_start();
            $_SESSION['USER_ID'] = $user_id;
            $_SESSION['USER_TYPE'] = $user_type;

            if ($user_type == 'employee') {
                $_SESSION['USER_OFFICE'] = $user_ofc;
                $_SESSION['USER_DESIGNATION'] = $user_designation;
                $_SESSION['USER_DEPARTMENT'] = $user_department;
            }
            if ($user_type == 'student') {
                $_SESSION['GRE_USERID'] = $user_id;
                $_SESSION['GRE_USERNAME'] = $user_name;
                $_SESSION['GRE_EMAIL'] = $email;
                $_SESSION['GRE_CONTACT'] = $mobile;
                $_SESSION['GRE_USERDESIGNATION'] = "student";
                $_SESSION['GRE_SUDO'] = "4";

            }

            $_SESSION['loggedAt'] = time();

            echo "Success";
        } else {
            echo "no match Found";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
