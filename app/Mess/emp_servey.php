<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
    else{
      $userId =$_SESSION['USER_ID'];
    }
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
  form{width:50%;}
  select{width:100%;padding:5px;}
  .half,.full,.ee,.eee{width:48%;margin:.5%;border:1px solid gray;border-radius:3px;padding:9px;float:left;}
  .ee{width:40%;background:#eee;}
  .eee{width:58%;}
  .full{width:96%; margin:1% 2%;border:0;}th{text-align:center;}
  @media only screen and (max-width: 600px) { form{width:100%;}
  .half,.full,.ee,.eee{width:100%;margin:0;}
   }
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_employee.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="../employee/survey" title=""><em><span class="fa fa-question"></span> Survey</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-hotel"></span> Mess Survey</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-plus"></span> Create Survey</em></a></li>
    </ul>
    <br>
    <form name="serveyCreate" onsubmit="createNewServey()" method="post" class="ee">
      <fieldset>
        <legend>Create New Survey</legend>
        <div class="inp">
          <div class="inp_name"> Survey Name</div>
          <div class="inp_value"> <input type="text" name="surveyName" required="required"></div>
        </div>
        <div class="clear"></div><br>
        <input type="hidden" name="userId" value="<?php echo $userId;?>">
        <div class="inp">
          <div class="inp_name"> Select Starting Date</div>
          <div class="inp_value"> <input type="date" name="startDate" required="required"></div>
        </div>
        <div class="clear"></div><br>
        <div class="inp">
          <div class="inp_name"> Select Ending Date</div>
          <div class="inp_value"> <input type="date" name="endDate" required="required"></div>
        </div>
        <div class="clear"></div><br>
        <div class="inp">
          <div class="inp_name"> Survey open On</div>
          <div class="inp_value"> <input type="date" name="openDate" required="required"></div>
        </div>
        <div class="clear"></div><br>
        <div class="inp">
          <div class="inp_name"> Survey Close On</div>
          <div class="inp_value"> <input type="date" name="closeDate" required="required"></div>
        </div>
        <div class="clear"></div><br>
        <center><button type="submit" class="btn btn-sm btn-success"> <span class="fa fa-check"></span> Create</button> <button type="reset" class="btn btn-sm btn-warning"> <span class="fa fa-sync"></span> Reset</button></center>
      </fieldset>
    </form>    
    <div class="eee">
      <div id="chartContainer" style="height: 350px;width:100%;margin: 0px auto;"></div>
    </div> 
    <div class="clear"></div>
    <div class="full table-responsive">
      <table class="table table-condensed table-bordered table-striped table-responsive">
        <thead>
          <tr>
            <th>S No</th>
            <th>Survey</th>
            <th>From</th>
            <th>To</th>
            <th>Opens on</th>
            <th>Closes On</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id='servey_shows'>
        </tbody>
      </table>
    </div>                                                                                                                                                                                                             
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/canvasjs/canvasjs.min.js"></script>
</body>
<script type="text/javascript">
  window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
      theme: "light1", // "light2", "light2", "dark1", "dark2"
      animationEnabled: true,
      title:{
        text: "Mess Survey Details"  
      },
      subtitles: [{
        text: "From 01,Jan 2019"
      }],
      axisX: {
        lineColor: "black",
        labelFontColor: "black"
      },
      axisY2: {
            gridThickness: 0,
        title: "Number of Responseces",
        suffix: "",
        titleFontColor: "black",
        labelFontColor: "black"
      },
      legend: {
        cursor: "pointer",
        itemmouseover: function(e) {
          e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
          e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
          e.chart.render();
        },
        itemmouseout: function(e) {
          e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
          e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
          e.chart.render();
        },
        itemclick: function (e) {
          if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
          } else {
            e.dataSeries.visible = true;
          }
          e.chart.render();
        }
      },
      toolTip: {
        shared: true
      },
      data:mm()

    });
    chart.render();
    function mm(){
      var mmm= new Array();
      var messs= "MESS-1,MESS-2,MESS-3,MESS-4,MESS-5,MESS-6,MESS-7,MESS-8";
      var mess = messs.split(",");
      for(var i=0; i<8;i++)
       { 
        mmm[i]= { type: "spline",name: mess[i],markerSize: 10,axisYType: "primary",xValueFormatString: "#",yValueFormatString: "#,###",showInLegend: true,dataPoints: datapo(mess[i]) };
       }
      return mmm;
    }
    function datapo(mess){
      var values =["mess_emp_index"];
      var msg =SendToPhp(values,"../../php/controllers/employee.php");
      var obj= JSON.parse(msg);
      var i=0,ashu=0;
      var aaa = new Array();
      for(i in obj.Message){
        ashu =Number(i)+1;
        var pe=obj.Message[i].period;
        var values1=['mess_emp_index_in',pe,mess];
        var msg1 =SendToPhp(values1,"../../php/controllers/employee.php");
        var mm= Number(msg1);
        aaa[i]={ x:ashu, y:mm };
      }
      return aaa;
    }
  }
  showservey();
  function createNewServey(){
    var startDate = document.forms['serveyCreate']['startDate'].value;
    var endDate = document.forms['serveyCreate']['endDate'].value;
    var userId = document.forms['serveyCreate']['userId'].value;
    var openDate = document.forms['serveyCreate']['openDate'].value;
    var closeDate = document.forms['serveyCreate']['closeDate'].value;
    var name = document.forms['serveyCreate']['surveyName'].value;
    if(startDate!="" && endDate!="")
    {
      values = ['mess_survey_create_feedback',userId,startDate,endDate,openDate,closeDate,name];
      var msg = SendToPhp(values,"../../php/controllers/employee.php");
      var obj = JSON.parse(msg);
      if(obj.message=="success"){
        snackbar("Survey Created Successfully.");
        showservey();
      }
    }
  }
  function showservey(){
    var values = ['mess_show'];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");
    var obj = JSON.parse(msg);
    var oldadate='',ashu=0;
    var ll=(obj.Message).length;
    if((obj.Message).length != ""){
      for(var i=(ll-1);i>=0;i--){
        ashu++;
        var sno =obj.Message[i].sno;
        oldadate += '<tr>';
        oldadate +=   '<td>'+ashu+'</td>';
        oldadate +=   '<td>'+obj.Message[i].surveyName+'</td>';
        oldadate +=   '<td>'+obj.Message[i].period_from+'</td>';
        oldadate +=   '<td>'+obj.Message[i].period_to+'</td>';
        oldadate +=   '<td>'+obj.Message[i].openDate+'</td>';
        oldadate +=   '<td>'+obj.Message[i].closeDate+'</td>';
        var od=(obj.Message[i].openDate).split(":");
        var cd=(obj.Message[i].closeDate).split(":");
        var dmn = new Date();
        var month = dmn.getMonth() + 1, day = dmn.getDate(), year = dmn.getFullYear();
        var tt=((Number(od[0]) * 1)+(Number(od[1]) * 30)+(Number(od[2]) * 365));
        var cct=((Number(cd[0]) * 1)+(Number(cd[1]) * 30)+(Number(cd[2]) * 365));
        var ct= (day * 1)+(month * 30)+(year * 365);
        if( tt <= ct  ){if(cct <= ct){var ddsd='Closed';}else{var ddsd='Active';}}else{var ddsd='Not Started';}
        oldadate +=   '<td>'+ddsd+'</td><td>';
        if( tt <= ct  ){
          if(cct <= ct){
            oldadate +=   '<button class="btn btn-sm btn-primary" onclick="downloadCSV(\''+obj.Message[i].period_from+'\')"><span class="fa fa-download"></span></button> ';
          }
          oldadate +=   '<form method="post" action="emp_view"> <input type="hidden" value="'+obj.Message[i].period_from+'" name="daet" ><button type="submit" class="btn btn-sm btn-primary"><span class="fa fa-eye"></span></button></form>';

          oldadate +=   '<button class="btn btn-sm btn-primary" onclick="editSurveyCloseDate('+sno+')"><span class="fa fa-pencil-alt"></span></button>';
        }
        else{
          oldadate +=   '<button class="btn btn-sm btn-primary" onclick="editSurvey('+sno+')"><span class="fa fa-pencil-alt"></span></button>';
        }
        
        
        oldadate +=   '</td><tr></tr>';
      }
    }
    else{
      oldadate +='<tr><td colspan="6"><center> No Data Found. Please Contact Administrator or concern Department.</center></td></tr>';
    }
    selectionListDisplay("servey_shows",oldadate);
  }
  function editSurvey(sno){
    alert(sno);
  }
  function downloadCSV(dates){
    var values = ['mess_emp_download',dates];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");

    var obj = JSON.parse(msg);var i=0;
    var atteObj=[];var ashwini=0;
    for(i in obj.Message){
      ashwini=Number(i)+1;
      obj.Message[i].sno=ashwini;
    }
    JSONToCSVConvertor(obj, "Mess Feedback "+dates);
  }
  function JSONToCSVConvertor(JSONData, ReportTitle) {
    var ShowLabel=true;
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    var CSV = '';
    if (ShowLabel) {
      var row = "";
      alert(JSON.stringify(arrData));
      for (var index in arrData[0]) {
        alert(index);
        if(index != Number(index))
        {
          row += checkIndexName(index) + ',';
        }
      }
      row = row.slice(0, -1);
      CSV += row + '\r\n';
    }
    var al=arrData.length;
    for (var i = 0; i < arrData.length; i++) {
      var row = "";
      for (var index in arrData[i]) {
        if(index != Number(index)){
          row += '"' + arrData[i][index] + '",';
        }
      }
      row.slice(0, row.length - 1);
      CSV += row + '\r\n';  
    }
    if (CSV == '') {
      alert("Invalid data");
      return;
    }
    var fileName = ReportTitle.replace(/ /g, "_");
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    var link = document.createElement("a");
    link.href = uri;
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }
  function checkIndexName(indexName){
    if(indexName=="sno") return "S No";
    if(indexName=="userId") return "ID Number";
    if(indexName=="period") return "Feedback From";
    if(indexName=="mess") return "Mess";
    if(indexName=="regDate") return "Feedback Given On";
    if(indexName=="q1") return "Question 1";
    if(indexName=="q2") return "Question 2";
    if(indexName=="q3") return "Question 3";
    if(indexName=="q4") return "Question 4";
    if(indexName=="q5") return "Question 5.1";
    if(indexName=="q52") return "Question 5.2";
    if(indexName=="q53") return "Question 5.3";
    if(indexName=="q6") return "Question 6";
    if(indexName=="q7") return "Question 7";
  }
</script>
</html>
