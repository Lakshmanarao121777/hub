<?php
function check_usertype()
{
    if ($_SESSION["USER_TYPE"] == "employee") {
        /*if ($_SESSION["USER_OFFICE"] == "Director") {?><script>window.location.href="app/Director";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "AO") {?><script>window.location.href="app/AO";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "admin") {?><script>window.location.href="app/Admin";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "DeanAcademics") {?><script>window.location.href="app/DeanAcademics";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "Examcell") {?><script>window.location.href="app/ExamSection";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "CW") {?><script>window.location.href="app/CheifWarden";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "Security") {?><script>window.location.href="app/Security";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "AcadamicDepartments") { ?><script>window.location.href="app/AcadamicDepartments";</script><?php }
        if ($_SESSION["USER_OFFICE"] == "Payroll") {?><script>window.location.href="app/payroll";</script><?php } */
        ?>
		<script>window.location.href="app/employee";</script>
	    <?php
    } else {?>
		<script>window.location.href="app/Student";</script>
	<?php }

}