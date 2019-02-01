<?php 
$disr="../../users/".$_SESSION['USER_ID'];
   if(file_exists($disr."/".$_SESSION['USER_ID']."_icon.png")){
      
   }
?>
<div class="sidebar_left hidden-sm" >
         <ul class="sidebar-menu">
            <li class="account">
               <img class="img_user" src="<?php echo$link;?>">
               <a href="../Student/profile">
                  <?php include_once("../../php/config/Student.php");
                   echo getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'userName'); ?>
                 </a>
            </li>
              <li class="header">MAIN NAVIGATION</li>
              <li>
                <a href="../">
                  <i class="fa fa-tachometer-alt"> </i> Dashboard</span>
                </a>
              </li>
              <li>
                <a href="../Student/stu_notice">
                  <i class="fa fa-sticky-note"> </i> <span>Notice Board</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#" class="has-dropdown">
                  <i class="fa fa-book"> </i>
                  <span>Study Circle</span>
                  <span class="pull-right-container">
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="http://10.50.50.4" target="_blank"><i class="fa fa-user"> </i> NPTEL</a></li>
                  <li><a href="../Student/rgukt_content"><i class="fa fa-user"> </i> RGUKT</a></li>
                  <li><a href="http://10.50.50.4:8080"  target="_blank"><i class="fa fa-user"> </i> Library</a></li>
                </ul>
              </li>
              <li>
                <a href="../Student/profile">
                  <i class="fa fa-user"> </i> <span> My Profile </span>
                </a>
              </li>
                  <li> 
                <a href="../Grievance">
                  <i class="fa fa-headphones-alt"> </i> <span> Grievance </span>
                </a>
              </li>
              <!--
              <li class="treeview">
                <a href="#" class="has-dropdown">
                  <i class="fa fa-comments"> </i>
                  <span>Discussion</span>
                  <span class="pull-right-container">
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="updatesoon"><i class="fa fa-pencil-alt"> </i> D-Board</a></li>
                  <li><a href="updatesoon"><i class="fa fa-user"></i> D-Messages</a></li>
                </ul>
              </li>-->
              <li class="treeview">
                <a href="../registrations">
                  <i class="fa fa-pencil-alt"> </i> <span>Registrations</span>
                </a>
              </li>
              <li>
                <a href="../Student/survey">
                  <i class="fa fa-question"> </i> <span>Online-Survey</span>
                </a>
              </li>
              <li class="treeview">
                <a href="../Student/cdpc" class="has-dropdown">
                  <i class="fa fa-box-open"> </i>
                  <span>CDPC</span>
                  <span class="pull-right-container">
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="../Student/updatesoon"><i class="fa fa-inbox"> </i> Openings</a></li>
                  <li><a href="../Student/updatesoon"><i class="fa fa-sentbox"></i> GD</a></li>
                  <li><a href="../Student/updatesoon"><i class="fa fa-draft"></i> Profile</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#" class="has-dropdown">
                  <i class="fa fa-comments"> </i>
                  <span>Online Leaves</span>
                  <span class="pull-right-container">
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="../Student/olms_apply"><i class="fa fa-pencil-alt"> </i> Apply</a></li>
                  <li><a href="../Student/olms_status"><i class="fa fa-user"></i> Status</a></li>
                </ul>
              </li>
              <li class="sidemenu_active">
                <a href="../Attendance">
                  <i class="fa fa-calendar-alt"> </i> <span>Attendance</span>
                </a>
              </li>
              <li class="treeview"> 
                <a href="../Scholorship">
                  <i class="fa fa-money-bill-alt"> </i> <span>Fee Details</span>
                </a>
              </li>
              <li>
                <a href="../Student/exam_result">
                  <i class="fa fa-id-badge"> </i> <span>Results</span>
                </a>
              </li> 
              <li>
                <a href="../Student/exam_seating">
                  <i class="fa fa-wheelchair"> </i> <span> Seating</span>
                </a>
              </li> 
              <li>
                <a href="../Student/sclub">
                  <i class="fab fa-cc-diners-club"> </i> <span>Student Clubs</span>
                </a>
              </li>
              <li>
                <a href="../Student/sports">
                  <i class="fa fa-gamepad"> </i> <span>Sports</span>
                </a>
              </li>
              <li>
                <a href="../Student/nss">
                  <i class="fa fa-hands-helping"> </i> <span>NSS</span>
                </a>
              </li>
              <li>
                <a href="../Student/updatesoon">
                  <i class="fa fa-hand-holding-heart"> </i> <span>HHO</span>
                </a>
              </li>
              <li>
                <a href="../../php/includes/logout">
                  <i class="fa fa-sign-out-alt"> </i> <span>Logout</span>
                </a>
              </li>    
          </ul>
      </div>
      