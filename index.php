<?php session_start(); 
if($_SESSION){
	header("location:app");
}
?>
<!DOCTYPE html>
<html href="en">
<head>
	<title>R-Hub ::  RGUKT RKV</title>
	<link rel="shortcut icon" type="image/png" id="favicon" href="assets/images/logo.png" />
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<?php include_once("php/meta/meta.php"); ?>
</head>
<style type="text/css">
	#noticesssstit{
		display: inline-block;
    max-width:200px;
    word-wrap: break-word;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
	}
	#noticessss {
    display: inline-block;
    max-width:300px;
    word-wrap: break-word;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
	}
	.modal {display: none;position: fixed; /* Stay in place */
    z-index: 5; /* Sit on top */
    left: 0;
    top: 0;width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {background-color:#fefefe;margin:5% 25% auto;padding:20px;border:1px solid #888;width:50%;overflow-y:none;height:50%;}
.close {color: #aaa; float: right;font-size: 28px;font-weight: bold;}
.modal-content .inp{width:100%;padding:5% 10%;}
.modal-content .inp .inp_name {font-size:18px;padding:2px;margin:10px;}
.modal-content .inp .inp_value{margin:10px;font-size:20px;}
.modal-content .inp .inp_value input[type="text"]{border:1px solid gray;}
.modal-content .inp .inp_value input[type="text"]:focus{background:white;}
.close:hover,
.close:focus {color: black;text-decoration: none;cursor: pointer;}
</style>
<body>
	<div id="editDetailsStu" class="modal" style="display:none;">
		<div class="modal-content">
			<span class="close" id="close"><span class="fa fa-times"></span></span>
			<fieldset> 
				<h3><center><u>Password Recovery / Forgot Password</u> </center></h3>
				<div class="inp">
					<div class="inp_name"> Enter Your ID Number </div>
					<div class="inp_value"> <input type="text" id="forgotIdstu" autocomplete="off" /></div>
				</div>
				<center><button class="btn btn-success btn-md" onclick="forgot_send('stu')"> <span class="fa fa-check"></span> Submit</button> <button type="reset" class="btn btn-md btn-warning"><span calss="fa fa-sync"></span> Reset</button></center>
			</fieldset>
		</div>
	</div>
	<div id="editDetailsEmp" class="modal" style="display:none;">
		<div class="modal-content">
			<span class="close" id="close"><span class="fa fa-times"></span></span>
			<fieldset> 
				<h3><center><u>Password Recovery / Forgot Password</u> </center></h3>
				<div class="inp">
					<div class="inp_name"> Enter Your ID Number </div>
					<div class="inp_value"> <input type="text" id="forgotIdemp" autocomplete="off" /></div>
				</div>
				<center><button class="btn btn-success btn-md" onclick="forgot_send('emp')"> <span class="fa fa-check"></span> Submit</button> <button type="reset" class="btn btn-md btn-warning"><span calss="fa fa-sync"></span> Reset</button></center>
			</fieldset>
		</div>
	</div>
	<div class="headers">
		<div class="logo-box logo" style="width:100%">
			<img alt="RGUKT-RKV Logo" class="logo" src="assets/images/logo.png" style="position:absolute; top:5%; left:10% " title="RGUKT-RKV Logo">
            <a href="" class="logo-text text-center">
				<span class="header0 col-xs-12">Rajiv Gandhi University of Knowledge Technologies</span>
                <br>
                <span class="subtitle hidden-xs hidden-sm" style="font-size:40px;"> IIIT R K Valley :: HUB</span> 
			</a>
        </div>
	</div>
	<?php include_once("php/includes/top_nav.php"); ?>
	<div class="container">
		<!--<div class="col-3 bg m10 boder1 bb chipset" style="padding:10px 5px 10px 5px">
			<div class="col-12 chip bb">
				<div class=" col-md-3 col-sm-3 thumb">
					<img src="assets/images/thumbs/c.jpg">
				</div>
				<div class="col-md-9  col-sm-9" style="padding:0;">
					<div class="col-12">
						<div class="chip_name">Prof. V Ramachandra Raju</div>
						<div class="chip_designation">Chancellor, RGUKT</div>
						<div class="view_more pull-right"><a href="#">view more <span class="fa fa-angle-double-right"></span></a></div>
					</div>
				</div>
			</div>
			<div class="col-12 chip bb">
				<div class="thumb">
					<img src="assets/images/thumbs/vc.jpg">
				</div>
				<div class="col-9" style="padding:0;">
					<div class="col-12">
						<div class="chip_name">Prof. V Ramachandra Raju</div>
						<div class="chip_designation">Vice Chancellor, RGUKT</div>
						<div class="view_more pull-right"><a href="#">view more <span class="fa fa-angle-double-right"></span></a></div>
					</div>
				</div>
			</div>
			<div class="col-12 chip bb">
				<div class="thumb">
					<img src="assets/images/thumbs/dir.jpg">
				</div>
				<div class="col-9" style="padding:0;">
					<div class="col-12">
						<div class="chip_name">Dr. Amarendra Kumar Sandra</div>
						<div class="chip_designation">Director (I/c) RKValley, RGUKT</div>
						<div class="view_more pull-right"><a href="#">view more <span class="fa fa-angle-double-right"></span></a></div>
					</div>
				</div>
			</div>
		</div>
			<div class="col-12 chip bb">
				<div class="thumb">
					<img src="assets/images/thumbs/ao.jpg">
				</div>
				<div class="col-9" style="padding:0;">
					<div class="col-12">
						<div class="chip_name">Mrs. Ratnamala Challa</div>
						<div class="chip_designation">Administrative Officer RKValley, RGUKT</div>
						<div class="view_more pull-right"><a href="#">view more <span class="fa fa-angle-double-right"></span></a></div>
					</div>
				</div>
			</div>
			<div class="admin-cell">
				<a href="app/about/administration_index.php">Administration Page <span class="fa fa-arrow-right"> </span>
				</a>
			</div>
		</div>--->
		<div class="col-8 bg m10 notice" style="padding:0;" >
			<!--<div class="noticeheading">Recent Notices/Updates </div>
			<div class="notice_boxes">
				<div class="notices">Upadate Soon...</div>
				<div class="notices">Upadate Soon...</div>
				<div class="notices">Upadate Soon...</div>
				<div class="notices">Upadate Soon...</div>
				<div class="notices">Upadate Soon...</div>
				<div class="notices">Upadate Soon...</div>
				<div class="notices">Upadate Soon...</div>
			</div>-->
			<div class="col-md-12">
				<div class="box">
            <div class="box-header">
              <h3 class="box-title">Recent Notices:-</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table">
              	<thead>
              		<tr>
              			<th></th>
              		</tr>
              	</thead>
                <tbody id="leaves">
                	
                </tbody>
              </table>
            </div>
          </div>
        </div>
		</div>
		<div class="col-4 bg m10 boder1 login"style="padding:5px 2px 5px 2px">
			<ul class="tab">
			  <li><a href="javascript:void(0)" class="tablinks active_tab" onclick="openpanel(event,'student_login');return false;" id="defaultOpen"> Student </a></li>
			  <li><a href="javascript:void(0)" class="tablinks" onclick="openpanel(event,'employe_login')">Employe </a></li>
			</ul>
			<div id="student_login" class="tabcontent">
			  <!--<div class="login_head"><img src="assets/images/stu_login.jpg" width="100px;" height="110px;"> Student Login </div>--><br>
			  	<div class="pull-left">
			  		<form name="stu_login" method="POST" onsubmit="login('stu')" action="">
				  		<input placeholder=" Username" type="text" name="username" required autocomplet="off">
						<input placeholder="Password" type="password" name="password" required autocomplet="off">
						<center>
							<div style="width: 100%;">
								<button class="btn btn-success btn-md" type="submit"><span class="fa fa-check"></span> LogIn</button>
								<button class="btn btn-warning btn-md" type="reset"><span class="fa fa-sync"></span> Reset</button>
							</div>
						</center>
					</form> 
					<div class="clear"></div><br/>
				</div>
				<!--<div style="margin: 0;width: 100%;text-align: left;font-size: 13px;"> Forgot Password? Please <button class="btn-link" onclick="forgot('stu')"> Click here <span class="fa fa-angle-double-right"></span></button></div>-->
				<div class="clear"></div>
			</div>
			<div id="employe_login" class="tabcontent"><br>
				<div class="pull-left">
					<form name="emp_login" method="POST" onsubmit="login('emp');return false;">
						<input placeholder="Username" type="text" name="username" required autocomplet="off">
						<input placeholder="Password" type="password" name="password" required autocomplet="off">
						<div style="width: 100%;">
							<button class="btn btn-success" type="submit"> LogIn</button>
							<button class="btn btn-warning" type="reset">Reset</button>
						</div>
					</form> 
					
					<div class="clear"></div><br/>
				</div>
				<div class="clear"></div>
			</div>
			<br>
			<div id="calendar-html-output">
				<?php
				require_once 'php/dependencies/class.calendar.php';
				$phpCalendar = new PHPCalendar ();
				$calendarHTML = $phpCalendar->getCalendarHTML();
				echo $calendarHTML;
				?>
			</div>
		</div>
	</div>
	<?php include_once("php/includes/footer.php"); ?>

	<script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

<script src="assets/js/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript" src="assets/js/main.js"></script>
	<script type="text/javascript">
		Notices();
		$(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true
    })
  })
		function Notices(){
    var values=['show_notices','notice_board'];
    var msg = SendToPhp(values,'php/controllers/Student_New.php');
    var obj = JSON.parse(msg);
    var data ='';
    if((obj.Message).length > 0 ){
      var i;
      for(i in obj.Message){
          data +='<tr>';
          data += '<td><span class="label label-default">'+obj.Message[i].regBy+'</span> <span class="label label-info">'+obj.Message[i].year+'</span> <b>'+obj.Message[i].title_notice+'</b><span id="noticessss">'+obj.Message[i].notice+' </span></td>';
          data +='</tr>';
      }
    }
    else{
      data = "<tr><td colspan='1'>No records Found</td></tr>";
    }
    selectionListDisplay('leaves',data);
  }
		function openpanel(evt,cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active_tab", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active_tab";
		} 
		document.getElementById("defaultOpen").click();
		function forgot(usertype){
			if(usertype=='stu'){
				var modal = document.getElementById('editDetailsStu');
			}
			else{
				var modal = document.getElementById('editDetailsEmp');
			}

      modal.style.display = "block";
      var span = document.getElementById("close");
      span.onclick = function() {modal.style.display = "none";}
      window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
      }
		}
		function forgot_send(usertype){
			var ids=document.getElementById("forgotId"+usertype).value;
			var values = ['forgotPass',ids,usertype];
			var msg = SendToPhp(values,"php/controllers/Student_New.php");
			alert(msg);
			var obj= JSON.parse(msg);
			if(obj.Message=="success"){
				alert("A recovery mail has been sent to University Mail.Please check.");
				snackbar("A recovery mail has been sent to University Mail.Please check.");
				if(usertype=='stu'){
					document.getElementById('editDetailsStu').style.display = "none";
				}
				else{
					document.getElementById('editDetailsEmp').style.display = "none";
				}
				
			}
		}
	</script>
	<script>
		$(document).ready(function(){
			$(document).on("click", '.prev', function(event) { 
				var month =  $(this).data("prev-month");
				var year =  $(this).data("prev-year");
				getCalendar(month,year);
			});
			$(document).on("click", '.next', function(event) { 
				var month =  $(this).data("next-month");
				var year =  $(this).data("next-year");
				getCalendar(month,year);
			});
			$(document).on("blur", '#currentYear', function(event) { 
				var month =  $('#currentMonth').text();
				var year = $('#currentYear').text();
				getCalendar(month,year);
			});
		});
		function getCalendar(month,year){
			var url = "php/dependencies/calendar-ajax.php";
			$.ajax({
				url: "php/dependencies/calendar-ajax.php",
				type: "POST",
				data:'month='+month+'&year='+year,
				success: function(response){
					$("#calendar-html-output").html(response);	
				},
				error: function(){} 
			});
			
		}
	</script>
</body>
</html>
