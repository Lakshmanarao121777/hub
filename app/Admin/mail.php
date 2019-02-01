<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>AIR-HUB :: RGUKT-RKV</title>

	<?php include_once "../../php/meta/meta.php";?>

	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/Admin.css">

</head>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Admin.php";?>
	<div class="container bg_white">
    <?php
/* Create gmail connection */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'kurapatilakshmanarao@gmail.com';
$password = 'Lakshmi@123';
$inbox = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* Fetch emails */
$emails = imap_search($inbox, "NEW");

/* If emails are returned, cycle through each... */
if ($emails) {
    $output = '';

    /* Make the newest emails on top */
    rsort($emails);

    /* For each email... */
    foreach ($emails as $email_number) {

        $headerInfo = imap_headerinfo($inbox, $email_number);
        $structure = imap_fetchstructure($inbox, $email_number);

        /* get information specific to this email */
        $overview = imap_fetch_overview($inbox, $email_number, 0);

        /* get mesage body */
        $message = imap_qprint(imap_fetchbody($inbox, $email_number, 2));

        /*
        // If attachment found use this one
        // $message = imap_qprint(imap_fetchbody($inbox,$email_number,"1.2"));
         */

        $output .= 'Subject: ' . $overview[0]->subject . '<br />';
        $output .= 'Body: ' . $message . '<br />';
        //$output .= 'From: '.$overview[0]->from.'<br />';
        //$output .= 'Date: '.$overview[0]->date.'<br />';
        //$output .= 'CC: '.$headerInfo->ccaddress.'<br />';

        //  Attachments
        /*
        $attachments = array();
        if(isset($structure->parts) && count($structure->parts))
        {
        for($i = 0; $i < count($structure->parts); $i++)
        {
        $attachments[$i] = array(
        'is_attachment' => false,
        'filename' => '',
        'name' => '',
        'attachment' => ''
        );
        if($structure->parts[$i]->ifdparameters)
        {
        foreach($structure->parts[$i]->dparameters as $object)
        {
        if(strtolower($object->attribute) == 'filename')
        {
        $attachments[$i]['is_attachment'] = true;
        $attachments[$i]['filename'] = $object->value;
        }
        }
        }
        if($structure->parts[$i]->ifparameters)
        {
        foreach($structure->parts[$i]->parameters as $object)
        {
        if(strtolower($object->attribute) == 'name')
        {
        $attachments[$i]['is_attachment'] = true;
        $attachments[$i]['name'] = $object->value;
        }
        }
        }
        if($attachments[$i]['is_attachment'])
        {
        $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);
        if($structure->parts[$i]->encoding == 3)
        {
        $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
        }
        elseif($structure->parts[$i]->encoding == 4)
        {
        $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
        }
        }
        }
        }

        foreach($attachments as $attachment)
        {
        if($attachment['is_attachment'] == 1)
        {
        $filename = $attachment['name'];
        if(empty($filename)) $filename = $attachment['filename'];
        $file_path = 'upload/'; //  Upload folder
        $fp = fopen($file_path . $filename, "w+");
        fwrite($fp, $attachment['attachment']);
        fclose($fp);
        }
        }
         */
        //  Attachments

        /* change the status */
        $status = imap_setflag_full($inbox, $overview[0]->msgno, "\\Seen \\Flagged");
    }

    echo $output;
}

/* close the connection */
imap_close($inbox);
?>
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>