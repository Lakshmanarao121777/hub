	<div class="footer">
		<div class="vendeor">
			Copyright &copy 2010 Rajiv Gandhi University of Knowledge Technologies, All Rights Reserved 
			<?php 
				$json_array = array();
				$json_array['page'] = $_SERVER['PHP_SELF'];
				$json_array['logdate'] = date("d-m-Y h:i:s");
				$json_array['osBrowser'] = $_SERVER['HTTP_USER_AGENT'];

			if($_SESSION){
				if($_SESSION['USER_ID']!= "admin"){
					$logfile="../../php/logs/".date("d-m-Y")."_log.json";
					if( ! file_exists($logfile))
						fopen("../../php/logs/".date("d-m-Y")."_log.json", "w");  
					$json_array['userId'] =$_SESSION['USER_ID'];
      		$array_json = json_encode($json_array);
					file_put_contents($logfile, $array_json.PHP_EOL , FILE_APPEND | LOCK_EX);
				}
			}
			?>
		</div>
		<div class="designer">
			Designed and Developed By <a href="#"><b><u>Software Development Cell </u> </b> </a>. Version : V3.0.1
		</div>
	</div>

	<div class="snackbars" id="snackbars"></div>

