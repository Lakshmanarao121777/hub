<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
    else{
      $userId =$_SESSION['USER_ID'];
      include_once "../../php/config/DBActivityPHP.php";
      $designation = new DBActivityPHP();
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
  .half,.full,.ee,.eee{width:49%;margin:.5%;border:1px solid gray;border-radius:3px;padding:0px;float:left;}
  .ee{width:40%;background:#efe;}
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
      <li class="./"><a href="./" title=""><em><span class="fa fa-hotel"></span> Mess Survey</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-eye"></span> Survey Details</em></a></li>
    </ul>
    <br>
    <?php 
    $daet = $_POST['daet']; 
    $perof=$designation->getColValue("survey_mess", "period_from='$daet'", "period_from").' to '.$designation->getColValue("survey_mess", "period_from='$daet'", "period_to");
    $perop=$designation->getColValue("survey_mess", "period_from='$daet'", "openDate").' to '.$designation->getColValue("survey_mess", "period_from='$daet'", "closeDate");
    ?>
    <?php for($i=0;$i<8;$i++){ $k=$i+1;?>
      <fieldset class="half">
        <legend>Survey Details </legend>
        <div class="inp">
          <div class="inp_name"> <b>Survey Name :</b> </div>
          <div class="inp_value"> <?php echo $daet; ?></div>
        </div>
        <div class="inp">
          <div class="inp_name"> <b>Survey for Peroid of : </b> </div>
          <div class="inp_value"><?php echo$perof;  ?> </div>
        </div>
        <div class="inp">
          <div class="inp_name"> <b>Survey Opens : </b> </div>
          <div class="inp_value"> <?php echo$perop;  ?> </div>
        </div>
        <div class="inp">
          <div class="inp_name"> <b>Avg. Rating : </b></div>
          <div class="inp_value" id="<?php echo'avg'.$i; ?>"> </div>
        </div>
        <div class="inp">
          <div class="inp_name"> <b>Total Participents : </b></div>
          <div class="inp_value">  <?php echo$designation->getCount("survey_mess_response", "period='$daet' and mess='MESS-".$k."'");  ?>  </div>
        </div>
        <div class="inp">
          <div class="inp_name"> <b>Mess Name/Number : </b></div>
          <div class="inp_value"> Mess-<?Php echo $k;?> </div>
        </div>
        <div class="full">
          <div id="<?php echo'chartContainer'.$i; ?>" style="height: 230px;width:100%;"></div>
        </div>
      </fieldset>   
      
    <?php } ?>                       
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/canvasjs/canvasjs.min.js"></script>
</body>
<script type="text/javascript">
  cha('<?php echo $daet; ?>');
  function cha (givenDate) {
    var messsa= "MESS-1,MESS-2,MESS-3,MESS-4,MESS-5,MESS-6,MESS-7,MESS-8";
    var messa = messsa.split(",");
    for(var kmm=0;kmm<messa.length;kmm++){
      var con ="chartContainer"+kmm;
      var messnum=messa[kmm];
      var chart = new CanvasJS.Chart(con, {
        theme: "light1", // "light2", "light2", "dark1", "dark2"
        animationEnabled: true,
        title:{text: "Mess Survey Details" },
        subtitles: [{text: givenDate}],
        axisX: {lineColor: "black",title: "Questions",labelFontColor: "black"},
        axisY2: {gridThickness: 1,title: "Number of Responseces",suffix: "",titleFontColor: "black",labelFontColor: "black"},
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
            } 
            else {e.dataSeries.visible = true;}
            e.chart.render();
          }
        },
        toolTip: {shared: true},
        data:mm(messnum,givenDate)
      });
      chart.render();
    }

  }
  function mm(m,s){
      var mmm= new Array();
      var messs= "Bad,Below average,Average,Above Average,Good";
      var mess = messs.split(",");
      for(var i=0; i<mess.length;i++)
       { 
        mmm[i]= { type: "spline"/*"stepLine"*/,name: mess[i],markerSize: 10,axisYType: "secondary",xValueFormatString: "#",yValueFormatString: "#,###",showInLegend: true,dataPoints: datapo(mess[i],m,s) };
       }
      return mmm;
    }
    function datapo(rating,mess,serveyDate){
      var ashu=0;
      var q= "q1,q2,q3,q4,q5,q52,q53,q6,q7";
      var qa = q.split(",");
      var aaa = new Array();
      for(var ii=0;ii<qa.length;ii++){
        ashu =Number(ii)+1;var qn=qa[ii];
        var values1=['mess_emp_view_in',rating,mess,serveyDate,qn];
        var msg1 =SendToPhp(values1,"../../php/controllers/employee.php");
        var mm= Number(msg1);
        aaa[ii]={ x:ashu, y:mm };
      }
      return aaa;
    }
  //showservey();
  
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
        oldadate +=   '<td></td>';
        oldadate +=   '<td><!--<button class="btn btn-sm btn-primary" onclick="editSurvey('+sno+')"><span class="fa fa-pencil-alt"></span></button> --><button class="btn btn-sm btn-primary" onclick="downloadCSV(\''+obj.Message[i].period_from+'\')"><span class="fa fa-download"></span></button> <button class="btn btn-sm btn-primary" onclick="seeData(\''+obj.Message[i].period_from+'\')"><span class="fa fa-eye"></span></button></td>';
        oldadate += '</tr>';
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
  function seeData(dates){
    var values = ['mess_emp_download',dates];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");
    var obj = JSON.parse(msg);var i=0;
    var atteObj=[];var ashwini=0;
    for(i in obj.Message){
      
    }
    alert(msg);
  }
  function JSONToCSVConvertor(JSONData, ReportTitle) {
    var ShowLabel=true;
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    var CSV = '';
    //CSV += ReportTitle + '\r\n\n';
    if (ShowLabel) {
      var row = "";
      for (var index in arrData[0]) {
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
    if(indexName=="sno") return "S No";if(indexName=="userId") return "ID Number";
    if(indexName=="period") return "Feedback From";if(indexName=="mess") return "Mess";
    if(indexName=="regDate") return "Feedback Given On";if(indexName=="q1") return"Question-1";
    if(indexName=="q2") return "Question - 2";if(indexName=="q3") return "Question - 3";
    if(indexName=="q4") return "Question - 4";if(indexName=="q5") return "Question - 5.1";
    if(indexName=="q52") return "Question - 5.2";if(indexName=="q53") return "Question - 5.3";
    if(indexName=="q6") return "Question - 6";if(indexName=="q7") return "Question - 7";
  }
</script>
</html>
