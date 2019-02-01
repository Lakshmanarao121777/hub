<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
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
<style>
fieldset {border: 1px solid #ddd !important;margin-bottom: 30px;min-width: 0;	padding: 10px;	position: relative;	border-radius: 4px;background-color: #f5f5f5;padding-left: 10px !important;}
legend {font-size: 14px;font-weight: bold;margin-top: -25px;width: 35%;border: 1px solid #ddd;border-radius: 4px;padding: 5px 5px 5px 10px;background-color: #ffffff;color: #D97214;}
.table-bordered>thead>tr th{ border : 1px solid #ffffff; padding: 7px !important;background: #3f51b5;color: #ffffff;text-align: center;}
.table-bordered>thead>tr th,.table-bordered>tbody>tr td{padding: 7px !important;}
.table-striped>tbody>tr:nth-child(odd)>td,.table-striped>tbody>tr:nth-child(odd)>th {	background-color: #e8f1fb !important;color: #183f62;}
[color="blue"]{color: #D97214;}

</style>
<body>
    <?php include_once "../../php/includes/head_logobox.php";?>
    <?php include_once "../../php/includes/top_nav.php";?>
    <?php include_once "../../php/includes/sidebar_Student.php";?>
    <div class="container bg_white">
        <br>
        <div id="print-div">
            <table class="noborder" style="background-color: white;" width="100%">
                <tbody>
                    <tr class="noborder">
                        <td class="noborder"><img src="../../assets/images/logo.png" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        </td>
                        <td class="noborder"><img src="../../assets/images/jnb_logo.png" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        </td>
                        <td class="noborder"><img src="../../assets/images/ap_gov_logo.jpeg" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        <td class="noborder"><img src="../../assets/images/tg_gov_logo.jpeg" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        </td>
                        <td class="noborder"><img src="http://10.50.50.56/registrations/upload/R121777/R121777.jpg" alt="R121777" height="100" width="100">
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <fieldset>
                <font color="blue"><legend>Scholarship History (ePASS)</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <th>Application ID</th>
                            <th>Status/College</th>
                            <th>Course/Year</th>
                            <th>Amount Released(MTF/RTF)</th>
                        </tr>
                        <tr>
                            <td>201205152930</td>
                            <td><a>Sent to Treasury</a>/ AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA)</td>
                            <td>B.TECH (INTEGRATED-6Yrs)/ 1 <a>Yr</a></td>
                            <td>5956.0  /25000.0 </td>
                        </tr>
                        <tr>
                            <td>201305152930</td>
                            <td><a>Sent to Treasury</a>/ AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA)</td>
                            <td>B.TECH (INTEGRATED-6Yrs)/ 2 <a>Yr</a></td>
                            <td>5456.0  /25500.0 </td>
                        </tr>
                        <tr>
                            <td>201405152930</td>
                            <td><a>Sent to Treasury</a>/ AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA)</td>
                            <td>B.TECH (INTEGRATED-6Yrs)/ 3 <a>Yr</a></td>
                            <td>5956.0  /29000.0 </td>
                        </tr>
                        <tr>
                            <td>201505152930</td>
                            <td><a>Sent to Treasury</a>/ AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA)</td>
                            <td>B.TECH (INTEGRATED-6Yrs)/ 4 <a>Yr</a></td>
                            <td>7320.0  /29000.0 </td>
                        </tr>
                        <tr>
                            <td>201605152930</td>
                            <td><a>Sent to Treasury</a>/ AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA)</td>
                            <td>B.TECH (INTEGRATED-6Yrs)/ 5 <a>Yr</a></td>
                            <td>7320.0  /29000.0 </td>
                        </tr>
                        <tr>
                            <td>201705152930</td>
                            <td><a>Sent to Treasury</a>/ AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA </td>
                            <td>B.TECH (INTEGRATED-6Yrs)(Regular)-English/ 6 <a>Yr</a>
                            </td>
                            <td>7502.0  /21750 </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>Personal Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="1"><strong>Applicant ID:</strong></td>
                            <td colspan="1"><span class="normal">201705152930</span></td>
                            <td colspan="1"><strong>SSC Details:</strong></td>
                            <td colspan="1"><span class="normal">1214108915, <a>2012</a>, AP Regular</span></td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Applicant Name:</strong></td>
                            <td colspan="1"><span class="normal">KURAPATI LAKSHMANARAO</span></td>
                            <td colspan="1"><strong>Aadhar No:</strong></td>
                            <td colspan="1"><span class="normal">219367504638</span></td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Father Name: </strong></td>
                            <td colspan="1"><span class="normal">KURAPATI SATYANARAYANA</span></td>
                            <td colspan="1"><strong>Mother Name: </strong></td>
                            <td colspan="1"><span class="normal">KURAPATI NAGALAKSHMI</span></td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Date of Birth: </strong></td>
                            <td colspan="1"><span class="normal">18-06-1996 </span></td>
                            <td colspan="1"><strong>Gender: </strong></td>
                            <td colspan="1"><span class="normal">Male</span></td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Religion: </strong></td>
                            <td colspan="1"><span class="normal"></span></td>
                            <td colspan="1"><strong>Caste/Sub-Caste:</strong></td>
                            <td colspan="1"><span class="normal">BC-B/ Padmasali(Sl.No.-17)</span></td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Mother Tongue</strong></td>
                            <td colspan="1"><span class="normal">TELUGU </span></td>
                            <td colspan="1"><strong>Nationality: </strong></td>
                            <td colspan="1"><span class="normal"></span></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>Admission Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="2"><strong> College Code &amp; Name:</strong> </td>
                            <td colspan="6"><span class="normal">10462 &amp; AP IIIT RAJIV  KNOWLEDGE VALLEY (IDUPULAPAYA)</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Admission No:</strong></td>
                            <td colspan="1"><span class="normal"> </span></td>
                            <td colspan="1"><strong>Date of Admission:</strong></td>
                            <td colspan="1"><span class="normal">01-06-2017 </span></td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Admission Category:</strong></td>
                            <td colspan="1"><span class="normal">Regular </span></td>
                            <td colspan="1"><strong>Course/Group:</strong></td>
                            <td colspan="1"><span class="normal">B.TECH (INTEGRATED-6Yrs)(Regular)-English/ </span></td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong> Year of Study:</strong></td>
                            <td colspan="1"><span class="normal">6</span> </td>
                            <td colspan="1"><strong>Section:</strong></td>
                            <td colspan="1"><span class="normal">4</span> </td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Second Language:</strong></td>
                            <td colspan="1"><span class="normal"></span> </td>
                            <td colspan="1"><strong>Is Physically Challenged:</strong></td>
                            <td colspan="1"><span class="normal">No</span> </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>Scholarship Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="1"><strong>Scholarship Status:</strong></td>
                            <td colspan="1" style="font-family:Impact; color: #946e06; font-size:150%; "><span class="normal">Sent to Treasury</span> &nbsp;<i class="fa fa-check" aria-hidden="true"></i></td>
                            <td colspan="1"><strong>Department:</strong></td>
                            <td colspan="1"><span class="normal">BC Welfare</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Scholarship Type:</strong></td>
                            <td colspan="1"><span class="normal">College Attached Hostel(CAH)</span>
                            </td>
                            <td colspan="1"><strong>Your District Officer:</strong>
                            </td>
                            <td colspan="1"><span class="normal">DBCWO Office, Kadapa</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Fresh/Renewal:</strong></td>
                            <td colspan="1"><span class="normal">Renewal</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>Caste Certificate Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="1"><strong>Mee Seva No:</strong></td>
                            <td colspan="1"><span class="normal">SD12586220</span>
                            </td>
                            <td colspan="1"><strong>Caste:</strong></td>
                            <td colspan="1"><span class="normal">BC-B/Padmashali</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Approved Date:</strong></td>
                            <td colspan="1"><span class="normal">10-12-2012</span>
                            </td>
                            <td colspan="1"><strong>Mandal:</strong></td>
                            <td colspan="1"><span class="normal">52-REPALLE</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Applicant Name:</strong></td>
                            <td colspan="1"><span class="normal">Kurapati.Lakshmana Rao</span>
                            </td>
                            <td colspan="1"><strong>District:</strong></td>
                            <td colspan="1"><span class="normal">07-Guntur</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong>Father Name:</strong></td>
                            <td colspan="1"><span class="normal">Nagalakshmi</span>
                            </td>
                            <td colspan="1"><strong>MRO Name:</strong></td>
                            <td colspan="1"><span class="normal">T Mohana Rao</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>Ration/Income Certificate Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <th>Ration Card No:</th>
                            <td>WAP075203000579</td>
                            <th>Ration Card Slno</th>
                            <td>2854809276173</td>
                            <th>Gender:</th>
                            <td>Female</td>
                        </tr>
                        <tr>
                            <th>Member Name:</th>
                            <td>Kuurapaati Lakshmanrao</td>
                            <th>Anual income:</th>
                            <td>10000</td>
                            <th>Age:</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td colspan="1"><strong> Address: </strong> </td>
                            <td colspan="7"><span class="normal">PeteruPeteru(V), Peteru,  Repalle, Guntur</span></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>Bank Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="1"><strong>Bank Account No:</strong></td>
                            <td colspan="1"><span class="normal">62246345706</span></td>
                            <td colspan="1"><strong>Bank IFSC Code:</strong></td>
                            <td colspan="1"><span class="normal">SBHY0021280</span> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Bank Details:</strong></td>
                            <td colspan="5"><span class="normal">IDUPULAPAYA, State Bank Of Hyderabad, Kadapa Dist.</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>MTF Release Status</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <th>Month</th>
                            <th>Attendance</th>
                            <th>Eligible Status</th>
                            <th>Proceeding No</th>
                            <th>Released Amount</th>
                            <th>TBR No</th>
                            <th>TBR Date</th>
                            <th>Token No</th>
                            <th>Bank Sent Date</th>
                            <th>Amount Remitted Date</th>
                        </tr>
                        <tr>
                            <td>June/ 2017</td>
                            <td>25/ 25</td>
                            <td>Eligible</td>
                            <td>113RMP0171700028</td>
                            <td>682.0</td>
                            <td>2017000301</td>
                            <td>02-12-2017</td>
                            <td>0000039563</td>
                            <td>22-12-2017</td>
                            <td>27-12-2017</td>
                        </tr>
                        <tr>
                            <td>July/ 2017</td>
                            <td>25/ 26</td>
                            <td>Eligible</td>
                            <td>113RMP0171700028</td>
                            <td>682.0</td>
                            <td>2017000301</td>
                            <td>02-12-2017</td>
                            <td>0000039563</td>
                            <td>22-12-2017</td>
                            <td>27-12-2017</td>
                        </tr>
                        <tr>
                            <td>August/ 2017</td>
                            <td>23/ 24</td>
                            <td>Eligible</td>
                            <td>113RMP0171700028</td>
                            <td>682.0</td>
                            <td>2017000301</td>
                            <td>02-12-2017</td>
                            <td>0000039563</td>
                            <td>22-12-2017</td>
                            <td>27-12-2017</td>
                        </tr>
                        <tr>
                            <td>September/ 2017</td>
                            <td>19/ 19</td>
                            <td>Eligible</td>
                            <td>113RMP0171700028</td>
                            <td>682.0</td>
                            <td>2017000301</td>
                            <td>02-12-2017</td>
                            <td>0000039563</td>
                            <td>22-12-2017</td>
                            <td>27-12-2017</td>
                        </tr>
                        <tr>
                            <td>October/ 2017</td>
                            <td>18/ 24</td>
                            <td>Eligible</td>
                            <td>113RMP0171700048</td>
                            <td>682.0</td>
                            <td>2017000322</td>
                            <td>12-12-2017</td>
                            <td>0000039481</td>
                            <td>27-12-2017</td>
                            <td>30-12-2017</td>
                        </tr>
                        <tr>
                            <td>November/ 2017</td>
                            <td>25/ 25</td>
                            <td>Eligible</td>
                            <td>113RMP0171800459</td>
                            <td>682.0</td>
                            <td>2018-377125</td>
                            <td>26-06-2018</td>
                            <td colspan="3">Bill Status - Approved and Payment processed!</td>
                        </tr>
                        <tr>
                            <td>December/ 2017</td>
                            <td>24/ 24</td>
                            <td>Eligible</td>
                            <td>113RMP0171800459</td>
                            <td>682.0</td>
                            <td>2018-377125</td>
                            <td>26-06-2018</td>
                            <td colspan="3">Bill Status - Approved and Payment processed!</td>
                        </tr>
                        <tr>
                            <td>January/ 2018</td>
                            <td>20/ 20</td>
                            <td>Eligible</td>
                            <td>113RMP0171800459</td>
                            <td>682.0</td>
                            <td>2018-377125</td>
                            <td>26-06-2018</td>
                            <td colspan="3">Bill Status - Approved and Payment processed!</td>
                        </tr>
                        <tr>
                            <td>February/ 2018</td>
                            <td>16/ 23</td>
                            <td>Eligible</td>
                            <td>113RMP0171800459</td>
                            <td>682.0</td>
                            <td>2018-377125</td>
                            <td>26-06-2018</td>
                            <td colspan="3">Bill Status - Approved and Payment processed!</td>
                        </tr>
                        <tr>
                            <td>March/ 2018</td>
                            <td>9/ 25</td>
                            <td>Eligible</td>
                            <td>113RMC0171800648</td>
                            <td>682.0</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>April/ 2018</td>
                            <td>6/ 23</td>
                            <td>Eligible</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset class="col-md-12">
                <font color="blue"><legend>RTF Release Status</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <td colspan="1"><strong>Sanction Tution Fee:</strong></td>
                            <td colspan="1"><span class="normal">23000.0</span> </td>
                            <td colspan="1"><strong>Sanction Special Fee:</strong></td>
                            <td colspan="1"><span class="normal">6000.0</span> </td>

                            <td colspan="1"><strong>Sanction Other Fee:</strong></td>
                            <td colspan="1"><span class="normal">0.0</span> </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                            <th>Form Date</th>
                            <th>To Date</th>
                            <th>Proceeding No</th>
                            <th>Release Amount</th>
                            <th>TBR No</th>
                            <th>TBR Date</th>
                            <th>Token No</th>
                            <th>Bank Sent Date</th>
                            <th>Amount Remitted Date</th>
                        </tr>
                        <tr>
                            <td>01-06-2017</td>
                            <td>31-08-2017</td>
                            <td>113RRP0171700075</td>
                            <td>7250.0</td>
                            <td>2017000359</td>
                            <td>20-12-2017</td>
                            <td>0000041376</td>
                            <td>05-01-2018</td>
                            <td>06-01-2018</td>
                        </tr>
                        <tr>
                            <td>01-09-2017</td>
                            <td>28-02-2018</td>
                            <td>113RRP0171800466</td>
                            <td>14500.0</td>
                            <td>2018-451282</td>
                            <td>06-07-2018</td>
                            <td colspan="3">Bill Status - Approved and Payment processed!</td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>
    <?php include_once "../../php/includes/footer.php";?>
    <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
    <!--<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>-->
    <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>
    <script type="text/javascript" src="../../assets/js/Student.js"></script>
</body>
</html>
