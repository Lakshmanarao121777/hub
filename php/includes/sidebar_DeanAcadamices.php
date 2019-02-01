		<div class="sidebar_left hidden-sm" >
			<ul class="sidebar-menu" data-widget="tree">
			<li class="account"> 
					<img class="img_user" src="<?php echo$link;?>">
					<a href="updatesoon">
						<?php include_once("../../php/config/Student.php");
			            echo getDetfresh('employee_details',"where userId='".$_SESSION['USER_ID']."'",'userName'); ?>
			    </a>
				</li>
		        <li class="header">MAIN NAVIGATION</li>
		        <li>
		          <a href="index">
		            <i class="fa fa-gamepad"> </i> Dashboard</span>
		          </a>
		        </li>
		        <li>
		          <a href="NoticeBoard.php">
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
		          	<li><a href="http://10.50.50.64"><i class="fa fa-user"> </i> NPTEL</a></li>
		          	<li><a href="#"><i class="fa fa-user"> </i> RGUKT</a></li>
		          </ul>
		        </li>
		        <li>
		          <a href="updatesoon">
		            <i class="fa fa-user"> </i> <span> My Profile </span>
		          </a>
		        </li>
		        <li class="treeview">
		          <a href="#" class="has-dropdown">
		            <i class="fa fa-pencil-alt"> </i>
		            <span>Registrations</span>
		            <span class="pull-right-container">
		            </span>
		          </a>
		          <ul class="treeview-menu">
		          	<li><a href="registrations"><i class="fa fa-pencil-alt"> </i> Semister</a></li>
		          </ul>
		        </li>
		        <li>
		          <a href="../../php/includes/logout">
		            <i class="fa fa-sign-out-alt"> </i> <span>Logout</span>
		          </a>
		        </li>    
		    </ul>
		</div>
		