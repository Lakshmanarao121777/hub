<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
    $stuId = $_SESSION["USER_ID"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
form {width:100%;}
.cc{background:green;color:white;font-weight: 600;}
  .inp{width:100%;text-align:center;border:1px solid gray;border-top:0;}
  .inp .inp_name{width:10%;padding:0;text-align:center;}
  .inp .inp_value{width:70%;padding:0;border-left:2px solid gray;border-right:2px solid gray;text-align:center;}
@media screen only(max-width: 768px){
  .cc{background:green;color:white;font-weight: 600;}
  .inp{width:100%;text-align:center;border:1px solid gray;border-top:0;}
  .inp .inp_name{min-width:15%;padding:0;text-align:center;}
  .inp .inp_value{width:70%;padding:0;border-left:2px solid gray;border-right:2px solid gray;text-align:center;}
}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-pencil-alt"> </span> Registrations</em></a></li>
      <li><a href="stu_remedial" title=""><em><span class="fa fa-book"> </span> Regular Semister</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> AY18-19 Remedial Sem-1</em></a></li>
    </ul>
    <h1 align='center'>CONDITIONS FOR REMEDIAL REGISTRATION</h1><ul>
    <li>You must select studied year and batch for each subject. </li>
    <li>Select subjects for registration excluding freshmode registered subjects.</li>
    <li>Regular students may register maximum of 3 courses for SEM-1 EXCEPT FRESHMODE registered subjects for AY1819 SEM1</li>
    <li>You may pay fee of Rs. 200/- for each registered subject under remedial mode.</li>
    </ul>
    <h1 align='center'>REMEDIAL REGISTRATION FORM</h1>
    <br>
    <div id="dis" style="width:90%;margin:10px 5%;"></div>
    <br>
    <div id="disold" style="width:90%;margin:10px 5%;"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
  getSubList("<?php echo $stuId; ?>");
  getRegSubList("<?php echo $stuId; ?>");
    function getColValuess(table,wheresql,col){
      var values=["get_col_value",table,wheresql,col];
      var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
      return msg;
    }
    function getRegSubList(userId){
      var values =['getSubList',userId];
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      var i=0,oldDate='',ashu=0,ln=0,k=0;
      var obj = JSON.parse(msg);
      if( (obj.Message).length > 0){
        for(i in obj.Message){
          if(i==0){
            oldDate += '<table class="table table-condensed table-active table-responsive table-bordered table-hover table-primary"><thead class="table-header table-dark"><tr><th>S.No</th><th>ID No</th><th> Subject Code </th><th> Subject Name</th><th> Registration Type</th><th>Sem</th><th> Status </th></tr></thead><tbody>';
          }
          ashu =Number(i)+1;
          oldDate += "<tr>";
          oldDate += "<td>"+ashu+"</td>";
          oldDate += "<td>"+obj.Message[i].studentId+"</td>";
          oldDate += "<td>"+obj.Message[i].subjectCode+"</td>";
          oldDate += "<td>"+obj.Message[i].subjectName+"</td>";
          var fm=checkFMStatus(obj.Message[i].studentId,obj.Message[i].subjectCode);
          if(fm==true) fm="Freshmode";else fm="";
          var rm=checkRMStatus(obj.Message[i].studentId,obj.Message[i].subjectCode);
          if(rm==true) rm="Remedial mode";else rm= "";
          if(fm=="") var fm=rm;
          oldDate += "<td>"+fm+"</td>";
          oldDate += "<td></td>";var kk="";
          if(fm!="" || rm != "") kk= "Registred";else kk="";
          oldDate += "<td>"+kk+"</td>";
          oldDate += "</tr>";
          if((k+1)==(obj.Message).length){
            if(ashu>0){
              oldDate +="</tbody></table>";
            }
            else{
              oldDate +="<div class='notfound'> You have no Remedials (or) You have already Registred</div>";
            }
          }
          k++;
        }
      }
      selectionListDisplay("disold",oldDate);
    }
    function getSubList(userId){
      var values =['getSubList',userId];
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      var i=0,oldDate='',ashu=0,ln=0,k=0;
      var obj = JSON.parse(msg);
      if( (obj.Message).length > 0){
        for(i in obj.Message){
          if( (!checkFMStatus(obj.Message[i].studentId,obj.Message[i].subjectCode)) && (!checkRMStatus(obj.Message[i].studentId,obj.Message[i].subjectCode)) ){
          ln++;
          if(ln==1){
            oldDate += '<form action="" method="post" class="summer_sum_reg" onsubmit="sumremreg(\'<?php echo $stuId; ?>\');return false;">';
            oldDate += '<table class="table table-condensed table-active table-responsive table-bordered table-hover table-primary"><thead class="table-header table-dark"><tr><th>S.No</th><th>ID No</th><th> Subject Code </th><th> Subject Name</th><th> Select Year and Sem</th><th>Select Batch</th><th>Action </th></tr></thead><tbody>';
          }
          ashu =Number(i)+1;
          oldDate += "<tr>";
          oldDate += "<td>"+ashu+"</td>";
          oldDate += "<td>"+obj.Message[i].studentId+"</td>";
          oldDate += "<td>"+obj.Message[i].subjectCode+"</td>";
          oldDate += "<td>"+obj.Message[i].subjectName+"</td>";
          oldDate += "<td><select name='sem'>";
          oldDate += "  <option value=''>Select Exact Semester of this sub</option><option value='E1S1'>Engg-1 SEM-1</option><option value='E1S2'>Engg-1 SEM-2</option><option value='E2S1'>Engg-2 SEM-1</option><option value='E2S2'>Engg-2 SEM-2</option><option value='E3S1'>Engg-3 SEM-1</option><option value='E3S2'>Engg-3 SEM-2</option><option value='E4S1'>Engg-4 SEM-1</option><option value='E4S2'>Engg-4 SEM-2</option>";
          oldDate += "</select></td>"
          oldDate += "<td><select name='batch'>";
          oldDate += "  <option value=''>Select exact Batch for this sub</option><option value='R09'>R09 Batch</option><option value='R10'>R10 Batch</option><option value='R11'>R11 Batch</option><option value='R12'>R12 Batch</option><option value='R13'>R13 Batch</option><option value='R14'>R14 Batch</option><option value='R15'>R09 Batch</option><option value='R16'>R16 Batch</option>";
          oldDate += "</select></td>"
          oldDate += "<td><input type='checkbox' name='remsubCode' value='"+obj.Message[i].subjectCode+"'/></td>";
          oldDate += "</tr>";
          }
          if((k+1)==(obj.Message).length){
            if(ashu>0){
              oldDate +="<tr style='border:0;'><td colspan='7'><center><button class='btn btn-success btn-md' type='submit'><span class='fa fa-check'></span> Register </button> &nbsp<button class='btn btn-warning btn-md' type='reset'><span class='fa fa-sync'></span> Re-Set </button></center> </td></tr></tbody></table></form>";
            }
            else{
              oldDate +="<div class='notfound'> You have no Remedials (or) You have already Registred</div>";
            }
          }
          k++;
        }
      }
      //selectionListDisplay("dis",oldDate);
    }
    function checkFMStatus(userId,subCode){
      var values =['check_sub_reg_rem_fresh_status',userId,subCode];
      var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
      if(msg != 0){return true;}else{return false;}
    }
    function checkRMStatus(userId,subCode){
      var values =['check_sub_reg_rem_rem_status',userId,subCode];
      var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
      if(msg != 0){return true;}else{return false;}
    }
    function sumremreg(stuId){
      var form_data=$(".summer_sum_reg").serialize();
      var res = (form_data.replace("+","")).split("&");
      var values=[];
      for (var i=0;i<=(res.length+2);i++){
        if(i==0) { values[i]="rem_reg"; }
        else if(i==1) { values[i]=(res.length); }
        else if(i==2) { values[i]=stuId; }
        else{
          values[i]=res[i-3];
          var ress = values[i].split("=");
          kk = ress[1];
          var jj=kk.replace("+","");
          values[i]=jj;
        }
      }
      var lakshman=[];var co=0;
      for(var ashu=0;ashu<values.length;ashu++){
        if(values[ashu]!=""){
          lakshman[co]=values[ashu];
          co++;
        }
      }
      //lakshman[1]=((lakshman.length)/3)-1;
      lakshman[1]=lakshman.length-3;
      //alert(lakshman);
      var cYear=getColValuess("students_details","userId='"+stuId+"'","currentYear");
      if(cYear =="ENGG-1"||cYear =="ENGG-2"||cYear =="ENGG-3"||cYear =="ENGG-4"||cYear =="PUC-2"){
        if(lakshman[1]<=12){
          if( lakshman.length %3 == 0){
            if(checkforNoNull(lakshman)){
              var msg=SendToPhp(lakshman,"../../php/controllers/Student_New.php");
              window.loaction.href="ay1819remedial";
            }
            else{
              alert("Please select relevant Year and Sem from given field and Batch from given field");
            }
          }
          else{
            alert("Please select relevant Year and Sem from given field and Batch from given field");
          } 
        }
        else{
          alert("You can only register for Maximum of three subjects only");
        }
      }
      else{
        if( lakshman.length %3 == 0){
          if(checkforNoNull(lakshman)){
            var msg=SendToPhp(lakshman,"../../php/controllers/Student_New.php");
            window.loaction.href="ay1819remedial";
          }
          else{
            alert("Please select relevant Year and Sem from given field and Batch from given field");
          }
        }
        else{
          alert("Please select relevant Year and Sem from given field and Batch from given field");
        } 
      }
    }
    function checkforNoNull(vlues){
      var tr=true;
      for (var i=0;i<vlues.length;i++){
        if(vlues[i]=="") tr=false;
      }
      return tr;
    }
  </script>
</body>
</html>