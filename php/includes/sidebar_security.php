		<div class="sidebar_left hidden-sm" >
			<ul class="sidebar-menu">
				<li class="account">
					<img class="img_user" src="<?php echo$link;?>">
					<a href="../employee/profile">
						<?php include_once("../../php/config/Student.php");
			          echo getDetfresh('employee_details',"where userId='".$_SESSION['USER_ID']."'",'userName'); ?>
			        </a>
				</li>
		        <li class="header">MAIN NAVIGATION</li>
		        <li>
		          <a href="./">
		            <i class="fa fa-tachometer-alt"> </i> Dashboard</span>
		          </a>
		        </li>
		        <li>
		          <a href="../../php/includes/logout">
		            <i class="fa fa-sign-out-alt"> </i> <span>Logout</span>
		          </a>
		        </li>    
		    </ul>
		</div>
		